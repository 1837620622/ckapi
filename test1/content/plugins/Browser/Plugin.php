<?php

namespace content\plugins\Browser;

/**
 * 开启后通过QQ微信打开本站将自动跳转浏览器
 *
 * @package QQ微信防红
 * @author 易航
 * @version 1.0
 * @link http://bri6.cn
 */
class Plugin
{

	public static function render()
	{
		if (self::check()) {
			header("Content-type:text/html;charset=utf-8");
			require_once('transfer.php');
			exit;
		}
	}

	public static function check()
	{
		if ((strpos($_SERVER['HTTP_USER_AGENT'], 'QQ/') !== false || strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false)) {
			return true;
		}
	}

}
