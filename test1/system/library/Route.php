<?php

namespace system\library;

class Route
{
	private static $path = null;

	public static function initialize()
	{
		self::$path = empty($_GET['s']) ? '/index' : $_GET['s'];
		self::$path = explode('.', self::$path)[0];
	}

	public static function rule($route, $Callback = false, $httpMethod = '*')
	{
		$dispatcher = \FastRoute\simpleDispatcher(function (\FastRoute\RouteCollector $r) use ($route, $httpMethod) {
			return $r->addRoute($httpMethod, $route, null);
		});
		$httpMethod = $_SERVER['REQUEST_METHOD'];
		$routeInfo = $dispatcher->dispatch($httpMethod, self::$path);
		if ($routeInfo[0] == \FastRoute\Dispatcher::FOUND && $Callback) {
			return $Callback($routeInfo[2]);
		}
		return false;
	}

	public static function dispatch($dispatcher)
	{
		$dispatcher = \FastRoute\simpleDispatcher($dispatcher);
		$httpMethod = $_SERVER['REQUEST_METHOD'];
		return $dispatcher->dispatch($httpMethod, self::$path);
	}
}
