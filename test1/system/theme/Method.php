<?php

namespace system\theme;

use JsonDb\JsonDb\Db;
use system\admin\Server;
use system\library\Statics;

class Method
{
	private $mod;

	public $site;
	public $options;
	public $system;
	public string $themeUrl;
	public string $themeName;

	public function __construct(string $theme = THEME)
	{
		$GLOBALS['theme_method'] = $this;
		$this->themeName = $theme;
		$this->system = array_to_object(options());
		$this->site = array_to_object(options('site'));
		$this->site->domain = DOMAIN;
		$this->site->protocol = request('scheme');
		$this->site->url = $this->site->protocol . '://' . DOMAIN;
		$this->site->background = empty(options('theme.background')) ? Statics::backgroundImage() : options('theme.background');
		$this->options = (object) Manager::options($this->themeName);
		$this->themeUrl = $this->site->url . '/content/themes/' . $theme;
		$this->site->baseUrl = $this->site->url . (options('system.rewrite') ? '/' : '/index.php?s=/');
	}

	/**
	 * 加载主题文件
	 *
	 * @param string $mod
	 * @param array $params
	 * @return mixed
	 */
	public function __load(string $mod, array $params = [])
	{
		$__themeFile__ = Manager::getFile($mod, $this->themeName);

		if ($__themeFile__) {
			$this->mod = $mod;

			// 触发插件默认实现方法
			if ($this->auth()) \system\plugin\Manager::trigger('render');

			// 获取主题公共文件
			$publicFile = Manager::getFile('public/common', $this->themeName);
			// 引入主题公共文件
			if ($publicFile) include_once $publicFile;
			unset($publicFile);

			$theme = $this;

			extract($params); // 赋值变量

			// 引入请求的主题文件
			$__require__ = require_once $__themeFile__;

			// 数据统计
			page_trace();

			return $__require__;
		} else {
			response404();
		}
	}

	public function is(string $name): bool
	{
		return $this->mod == $name;
	}

	/**
	 * 生成前台主题URL
	 *
	 * @param string $name URL名称
	 * @param array|null $param URL参数
	 * @return string
	 */
	public function buildUrl(string $name, array $param = null): string
	{
		if ($this->themeName !== THEME) {
			$param['theme'] = $this->themeName;
		}

		$name = ltrim($name, '/');

		$scheme = \system\library\Request::scheme();

		if (options('system.rewrite')) {
			$url = $scheme . '://' . DOMAIN . '/' . $name . '.html';
		} else {
			$url = $scheme . '://' . DOMAIN . '/index.php?s=/' . $name;
		}

		if ($param) {
			$param = http_build_query($param);
			$url = strstr($url, '?') ? trim($url, '&') . '&' . $param : $url . '?' . $param;
		}

		return $url;
	}

	/**
	 * 通过自有函数输出HTML头部信息
	 *
	 * @return string
	 */
	public function header()
	{
		// '<meta name="referrer" content="no-referrer" />';
		$header = '<meta charset="UTF-8">
		<meta http-equiv="content-language" content="zh-cn" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<link rel="shortcut icon" href="' . $this->site->favicon . '" />
		<meta name="keywords" content="' . $this->site->keywords . '" />
		<meta name="description" content="' . $this->site->description . '" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<script>
    		window.SYSTEM = {
    			TITLE: `' . $this->site->title . '`,
				THEME_URL: `' . $this->themeUrl . '`,
				BASE_URL: `' . $this->site->baseUrl . '`,
    		}
		</script>';
		?>
		<meta charset="UTF-8">
		<meta http-equiv="content-language" content="zh-cn" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<link rel="shortcut icon" href="<?= $this->site->favicon ?>" />
		<meta name="keywords" content="<?= $this->site->keywords ?>" />
		<meta name="description" content="<?= $this->site->description ?>" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<script>
			window.SYSTEM = {
				TITLE: `<?= $this->site->title ?>`,
				THEME_URL: `<?= $this->themeUrl ?>`,
				BASE_URL: `<?= $this->site->baseUrl ?>`,
			}
			console.log('\n' + ' %c 易航网址导航系统 V<?= VERSION ?> %c http://guide.bri6.cn ' + '\n', 'color: #fadfa3; background: #030307; padding:5px 0;', 'background: #fadfa3; padding:5px 0;');
		</script>
		<?php
		// 触发插件header方法
		\system\plugin\Manager::trigger('header');
		return null;
	}

	public function footer(): ?string
	{
		// 触发插件footer方法
		\system\plugin\Manager::trigger('footer');
		return null;
	}

	public function options(?string $value = null, mixed $default = null): mixed
	{
		if (is_null($value)) return $this->options;

		return isset($this->options->$value) ? $this->options->$value : $default;
	}

	public function optionMulti(string $name, string $line = "\r\n", string $separator = '||'): array
	{
		if (empty($this->options->$name)) return [];

		$custom = [];
		$customArr = explode($line, $this->options->$name);

		foreach ($customArr as $value) {
			if ($separator) {
				$custom[] = explode($separator, $value);
			} else {
				$custom[] = $value;
			}
		}

		return $custom;
	}

	public function getSort(?int $id = null, array $fields = [], bool $object = true, bool $cache = true): array|object
	{
		static $sortList = [];
		$cacheKey = "sort_{$id}";

		if ($cache && isset($sortList[$cacheKey])) {
		} else {
			$sortList[$cacheKey] = get_sort($id);
		}
		return is_numeric($id) ? $this->convertField($sortList[$cacheKey], $object) : $this->convertFields($sortList[$cacheKey], $fields, $object);
	}

	public function getSite(int $id, bool $object = true): array|object
	{
		$site = Db::name('site')->find($id);
		if (empty($site)) return null;

		$site['fields'] = $site['fields'][$this->themeName] ?? [];

		return $object ? (object) array_to_object($site) : (array) $site;
	}

	public function getSites(?int $sortId = null, array $fields = [], bool $object = true, bool $cache = true): array
	{
		static $siteList = [];
		$cacheKey = "sites_{$sortId}";

		if ($cache && isset($siteList[$cacheKey])) {
		} else {
			$siteList[$cacheKey] = get_sites($sortId);
		}

		return $this->convertFields($siteList[$cacheKey], $fields, $object);
	}

	/**
	 * 通过关键词获取站点
	 *
	 * @param string $keyword
	 * @param array $fields
	 * @param int|null $length
	 * @param int $offset
	 * @return array
	 */
	public function getLikeSites(string $keyword, array $fields = ['title', 'url'], ?int $length = null, int $offset = 0): array
	{
		$fields = implode('|', $fields);
		$select = Db::name('site')->where('status', 1)->limit($offset, $length)->whereLike($fields, $keyword);
		$data = $select->select();
		return $this->convertFields($data);
	}

	public function convertField(array $data, bool $object = true): array|object
	{
		if ($object) {
			$data['fields'] = $data['fields'][$this->themeName] ?? (object) [];
		} else {
			$data['fields'] = $data['fields'][$this->themeName] ?? [];
		}
		return $object ? array_to_object($data) : $data;
	}

	public function convertFields(array $data, array $fields = [], bool $object = true): array
	{
		foreach ($data as $key => $value) {
			if (!empty($value['failure_time'])) {
				$expirationTime = strtotime($value['failure_time']);
				if ($expirationTime <= time()) {
					unset($data[$key]);
					continue;
				}
			}

			if ($object) {
				$data[$key]['fields'] = $value['fields'][$this->themeName] ?? (object) [];
			} else {
				$data[$key]['fields'] = $value['fields'][$this->themeName] ?? [];
			}

			if (!empty($fields) && is_array($fields)) {
				foreach ($fields as $fieldKey => $fieldValue) {
					if (!isset($value['fields'][$this->themeName][$fieldKey]) || $value['fields'][$this->themeName][$fieldKey] != $fieldValue) {
						unset($data[$key]);
					}
				}
			}
		}

		return $object ? (array) array_to_object($data) : $data;
	}

	/**
	 * 获取所有站点，并根据分类进行分组
	 *
	 * @return array
	 */
	public function getSortSites(): array
	{
		$list = $this->getSort();
		foreach ($list as $value) {
			$value->sites = $this->getSites($value->id);
		}
		return $list;
	}

	public function getFriend(): array
	{
		$friend = get_friend();
		return (array) array_to_object($friend);
	}

	/**
	 * include引入主题文件
	 *
	 * @param string $path
	 * @param array $params
	 */
	public function include(string $path, array $params = [])
	{
		$__path__ = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $path);
		extract($params);
		return include_once THEME_PATH . $this->themeName . DIRECTORY_SEPARATOR . $__path__;
	}

	/**
	 * require引入主题文件
	 *
	 * @param string $path
	 * @param array $params
	 */
	public function require(string $path, array $params = [])
	{
		$__path__ = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $path);
		extract($params); // 赋值变量
		return require_once THEME_PATH . $this->themeName . DIRECTORY_SEPARATOR . $__path__;
	}

	/**
	 * 输出CDN
	 *
	 * @param string|null $path
	 * @return string
	 */
	public function cdn(?string $path): string
	{
		return cdn($path);
	}

	/**
	 * 输出主题资源路径
	 *
	 * @param string|null $path
	 * @param bool $version
	 * @return string
	 */
	public function themeUrl(?string $path, bool $version = true): string
	{
		$versionStr = $version ? "?version={$this->info('version')}" : '';
		$url = $this->site->url . '/content/themes/' . $this->themeName . "/$path" . $versionStr;
		return $url;
	}

	public function load(string $file, array $attr = []): string
	{
		return Statics::load($file, $attr);
	}

	public function auth(): bool
	{
		return Server::isAuth();
	}

	public function info(?string $name = null): array|string|null
	{
		static $info = null;
		if (is_null($info)) $info = Manager::getInfo($this->themeName);
		if (is_null($name)) return $info;
		if (isset($info[$name])) return $info[$name];
		return null;
	}
}
