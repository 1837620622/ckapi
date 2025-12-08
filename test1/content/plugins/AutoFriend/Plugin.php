<?php

namespace content\plugins\AutoFriend;

use JsonDb\JsonDb\Db;

/**
 * @package 自动审核友链
 * @description 通过对方站点进入本站首页后将自动添加对方友链
 * @author 易航
 * @version 1.0
 * @link http://bri6.cn
 */
class Plugin
{

	public static $options;

	public static function config(\system\plugin\Form $form)
	{
		$friend_notice = $form->select('友链加入自动通知', 'friend_notice', [1 => '开启', 0 => '关闭'], 1);
		$form->create($friend_notice);

		$excluded_site = $form->textarea('排除站点', 'excluded_site', "www.baidu.com || m.baidu.com || cn.bing.com", '要排除的站点，||分割代表一个');
		$form->create($excluded_site);

		return $form->html;
	}

	public static function sendEmail($title, $description, $url)
	{
		$content = [
			'标题' => $title,
			'简介' => $description,
			'网址' => $url
		];
		$html = '';
		foreach ($content as $key => $value) {
			$html .= '<p>' . $key . '：' . $value . '</p>' . PHP_EOL;
		}
		$html = '<p>对方站点信息</p>' . $html;
		$subtitle = '站点 ' . $title . ' 添加了您的友链';
		send_mail('友链加入通知', $subtitle, $html);
	}

	public static function footer()
	{
		$route = \system\library\Route::rule('/index', function () {
			return true;
		});
		if ($route !== true) return;
		if (empty($_SERVER['HTTP_REFERER'])) return;
		if (empty($_SERVER['HTTP_USER_AGENT'])) $_SERVER['HTTP_USER_AGENT'] = '';
		if (strpos($_SERVER['HTTP_USER_AGENT'], 'Baiduspider') !== false || strpos($_SERVER['HTTP_USER_AGENT'], '360Spider') !== false || strpos($_SERVER['HTTP_USER_AGENT'], 'YisouSpider') !== false || strpos($_SERVER['HTTP_USER_AGENT'], 'Sogou web spider') !== false || strpos($_SERVER['HTTP_USER_AGENT'], 'Sogou inst spider') !== false || strpos($_SERVER['HTTP_USER_AGENT'], 'Googlebot/') !== false || strpos($_SERVER['HTTP_USER_AGENT'], 'bingbot/') !== false || strpos($_SERVER['HTTP_USER_AGENT'], 'Bytespider') !== false) {
			return;
		}
		// 分解url，scheme是传输协议，host是域名
		$parse_url = parse_url($_SERVER['HTTP_REFERER']);
		$domain = $parse_url['host'] . ($parse_url['port'] ? ':' . $parse_url['port'] : null);
		$url = $parse_url['scheme'] . '://' . $domain;
		$excluded_site = self::$options->excluded_site;
		$pai_chu_site = explode(PHP_EOL, $excluded_site);
		if (!is_array($pai_chu_site)) $pai_chu_site = [];
		$pai_chu_site[] = DOMAIN;
		foreach ($pai_chu_site as $key => $value) {
			if ($domain == trim($value)) return;
		}
		$find = Db::name('friends')->where('url', ['http://' . $domain, 'https://' . $domain])->find();
		if ($find) {
			if ($find['status'] == 0) return;
			Db::name('friends')->where('id', $find['id'])->update([
				'order' => time(),
			]);
			return;
		}
		$url_data = \network\http\get($url)->body();
		$preg_match = preg_match('/<a.+href="http[s]?:\/\/' . DOMAIN . '/ims', $url_data);
		if (!$preg_match) {
			self::alert("未检测到贵站 [$url] 添加了本站友链", '加入失败');
			return;
		}
		$meta = self::getSiteMeta($url_data);
		$title = explode('-', $meta['title'])[0];
		if ((empty($title)) || (strlen($title) >= 30)) {
			self::alert("站点 [$url] 标题过长或无标题", '加入失败');
			return;
		}
		$insert = Db::name('friends')->insert([
			'title' => $title,
			'description' => $meta['description'] ?? '',
			'keywords' => $meta['keywords'] ?? '',
			'url' => $url,
			'rel' => 'nofollow',
			'status' => 1
		]);
		if (self::$options->friend_notice) {
			self::sendEmail($title, $meta['description'] ?? '', $meta['keywords'] ?? '');
		}
		if ($insert) {
			self::alert("站点 [$title] 加入友链成功，请刷新页面查看", '加入成功');
		} else {
			self::alert('站点 [' . $title . '] 加入友链失败，请联系网站管理员', '加入失败');
		}
	}

	/**
	 * 插件通用header方法
	 */
	public static function header()
	{
		echo '
		<!--允许带入头部信息-->
		<meta name="referrer" content="always">
		';
	}

	/**
	 * HTML调用弹窗
	 * @param $content 弹窗内容
	 * @param $title 弹窗标题
	 */
	private static function alert($content, $title = '信息')
	{
		$alert = <<<HTML
		<script>
			if (window.layer) {
				layer.alert('{$content}', {
					title: '{$title}'
				});
			} else {
				alert('{$content}');
			}
		</script>
		HTML;
		echo $alert;
	}

	/**
	 * 获取指定站点META信息
	 * @param $url 要获取信息的站点URL
	 */
	private static function getSiteMeta($data)
	{
		$meta = array();
		if (empty($data)) return;
		#Title
		preg_match('/<TITLE>([\w\W]*?)<\/TITLE>/si', $data, $matches);
		if (!empty($matches[1])) {
			$meta['title'] = $matches[1];
		} else {
			$meta['title'] = '';
		}

		#Keywords
		preg_match('/<meta\s+name="keywords"\s+content="([\w\W]*?)"/si', $data, $matches);
		if (empty($matches[1])) {
			preg_match("/<meta\s+name='keywords'\s+content='([\w\W]*?)'/si", $data, $matches);
		}
		if (empty($matches[1])) {
			preg_match('/<meta\s+content="([\w\W]*?)"\s+name="keywords"/si', $data, $matches);
		}
		if (empty($matches[1])) {
			preg_match('/<meta\s+http-equiv="keywords"\s+content="([\w\W]*?)"/si', $data, $matches);
		}
		if (!empty($matches[1])) {
			$meta['keywords'] = $matches[1];
		} else {
			$meta['keywords'] = '';
		}

		#Description
		preg_match('/<meta\s+name="description"\s+content="([\w\W]*?)"/si', $data, $matches);
		if (empty($matches[1])) {
			preg_match("/<meta\s+name='description'\s+content='([\w\W]*?)'/si", $data, $matches);
		}
		if (empty($matches[1])) {
			preg_match('/<meta\s+content="([\w\W]*?)"\s+name="description"/si', $data, $matches);
		}
		if (empty($matches[1])) {
			preg_match('/<meta\s+http-equiv="description"\s+content="([\w\W]*?)"/si', $data, $matches);
		}
		if (!empty($matches[1])) {
			$meta['description'] = $matches[1];
		} else {
			$meta['description'] = '';
		}

		return $meta;
	}
}
