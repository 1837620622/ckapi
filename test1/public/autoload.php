<?php
// 自动载入类
class AutoLoader
{

	private static $loadedClasses = [];

	// 向PHP注册在自动载入函数
	public static function register()
	{
		spl_autoload_register(array(new self, 'autoload'));
		spl_autoload_extensions('.php');
	}

	// 根据类名载入所在文件
	public static function autoload($class_name)
	{
		// 类名重复检测
		if (in_array($class_name, self::$loadedClasses)) return;
		// DIRECTORY_SEPARATOR：目录分隔符，linux上就是 ’/’  windows上是 ’\’
		$class_file = str_replace('\\', DIRECTORY_SEPARATOR, ROOT . $class_name) . '.php';
		if (file_exists($class_file)) {
			self::$loadedClasses[] = $class_name;
			require_once $class_file;
			if (method_exists($class_name, 'initialize')) {
				$method = new ReflectionMethod($class_name, 'initialize');
				if ($method->isStatic()) {
					$class_name::initialize();
				}
			}
		}
		// print_r(self::$loadedClasses);
	}
}

// 系统库自动载入
AutoLoader::register();

// composer库自动载入
require_once SYSTEM_ROOT . 'vendor/autoload.php';