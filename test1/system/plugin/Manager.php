<?php

namespace system\plugin;

use JsonDb\JsonDb\Db;

class Manager
{

	private static $plugin_list = [];

	static public function initialize()
	{
		$plugin_options = Db::name('plugins')->select();
		foreach ($plugin_options as $value) {
			self::$plugin_list[$value['plugin']] = $value;
		}
	}

	/**
	 * 注册插件
	 */
	static public function register()
	{
		// 获取插件列表
		$plugins = \system\admin\Server::isAuth() ? self::activeList() : [];
		foreach ($plugins as $key => $value) {
			// 载入插件文件
			self::loadFile($key);
			// 加载插件的options属性
			self::loadOptions($key);
		}
	}

	/**
	 * 载入插件文件
	 */
	static public function loadFile($plugin_dir)
	{
		$plugin_file = self::pluginFile($plugin_dir);
		if (file_exists($plugin_file)) {
			include_once $plugin_file;
		} else {
			return false;
		}
	}

	public static function options($plugin_dir)
	{
		return isset(self::$plugin_list[$plugin_dir]['options']) ? self::$plugin_list[$plugin_dir]['options'] : [];
	}

	/**
	 * 加载插件的options属性
	 * @param $plugins 插件目录名称
	 */
	public static function loadOptions($plugin_dir)
	{
		$plugin_class = self::pluginClass($plugin_dir);
		// 如果插件存在options属性
		if (property_exists($plugin_class, 'options')) {
			// 插件options属性赋值
			$plugin_class::$options = (object) array_to_object(self::options($plugin_dir));
		}
	}

	/**
	 * 保存插件设置
	 * @param $plugin 要保存设置的插件
	 * @param array $set 要保存的设置
	 */
	static public function saveSet($plugin, $set)
	{
		$options = Db::name('plugins')->where('plugin', $plugin)->find();
		if ($options) {
			if (isset($options['options'])) {
				$options = array_merge($options['options'], $set);
			} else {
				$options = $set;
			}
			return Db::name('plugins')->where('plugin', $plugin)->update([
				'options' => $options
			]);
		} else {
			return Db::name('plugins')->insert([
				'plugin' => $plugin,
				'options' => $set
			]);
		}
	}

	/**
	 * 获取插件列表
	 * @param bool $status 是否只获取正常状态的插件
	 * @param bool $annotate 是否获取插件注解信息
	 * @return array
	 */
	static public function getList($annotate = false)
	{
		if (!is_dir(PLUGINS_ROOT)) {
			return [];
		}
		$dirArray = scan_dir(PLUGINS_ROOT)->dirs();
		// 过滤空目录文件
		foreach ($dirArray as $key => $value) {
			$plugin_exists = file_exists(self::pluginFile($value));
			if ($plugin_exists === false) {
				unset($dirArray[$key]);
			}
		}
		// 添加插件信息
		$data = [];
		foreach ($dirArray as $value) {
			$data[$value] = self::getInfo($value, $annotate);
		}
		return $data;
	}

	/**
	 * 获取激活插件列表
	 */
	static public function activeList()
	{
		if (!\system\admin\Server::isAuth()) return [];
		$plugin_list = [];
		foreach (self::$plugin_list as $key => $value) {
			if (empty($value['status'])) continue;
			$plugin_file = self::pluginFile($key);
			if (!file_exists($plugin_file)) continue;
			$plugin_list[$key] = $value;
		}
		return $plugin_list;
	}

	/**
	 * 获取指定插件信息
	 * @param string $plugin 插件目录名称
	 * @param bool $comment 是否获取插件注解
	 * @return array
	 */
	static public function getInfo($plugin_dir, $comment = false)
	{
		$plugin_class = self::pluginClass($plugin_dir);
		$status = 0;
		if (!empty(self::$plugin_list[$plugin_dir])) {
			if (!empty(self::$plugin_list[$plugin_dir]['status'])) {
				$status = 1;
			}
		}
		$plugin_info = [
			'class' => $plugin_class,
			'name' => $plugin_dir,
			'status' => $status,
			'register' => isset(self::$plugin_list[$plugin_dir]) ? true : false,
			'data' => isset(self::$plugin_list[$plugin_dir]) ? self::$plugin_list[$plugin_dir] : null
		];
		if ($comment && self::loadFile($plugin_dir) !== false && class_exists($plugin_class)) {
			$reflection = new \ReflectionClass($plugin_class);
			$plugin_comment = $reflection->getDocComment();
			$plugin_annotate = parse_annotate($plugin_comment);
			$plugin_info = array_merge($plugin_annotate, $plugin_info);
			$plugin_info['description'] = isset($plugin_info['description']) ? $plugin_info['description'] : (isset($plugin_info[0]) ? $plugin_info[0] : null);
			$plugin_info['title'] = isset($plugin_info['title']) ? $plugin_info['title'] : (isset($plugin_info['package']) ? $plugin_info['package'] : null);
		}
		return $plugin_info;
	}

	/**
	 * 通过插件目录名获取插件文件绝对路径
	 */
	static function pluginFile($plugin_dir)
	{
		return PLUGINS_ROOT . $plugin_dir  . DIRECTORY_SEPARATOR . 'Plugin.php';
	}

	/**
	 * 通过插件目录名获取插件完整类名
	 * @param $plugin_dir 插件目录名称
	 */
	static function pluginClass($plugin_dir)
	{
		$plugin_class = '\content\plugins\\' . $plugin_dir . '\Plugin';
		return $plugin_class;
	}

	/**
	 * 触发一个钩子
	 *
	 * @param string $hook 钩子的名称
	 * @param mixed $data 钩子的入参
	 * @return mixed
	 */
	static function trigger($method, $arg = [])
	{
		$plugins = self::activeList();
		// 循环调用开始
		foreach ($plugins as $key => $value) {
			self::method($key, $method, $arg);
		}
	}

	static function method($plugin_dir, $method, $arg = [])
	{
		$plugin_class = self::pluginClass($plugin_dir);
		if (method_exists($plugin_class, $method)) {
			return call_user_func_array([$plugin_class, $method], $arg);
		}
	}
}
