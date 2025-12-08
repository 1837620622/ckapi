<?php

namespace system\admin;

use JsonDb\JsonDb\Db;

class Admin
{

	private static $admin_info = [];

	/**
	 * 系统管理员检测
	 * @access public
	 * @return bool
	 */
	public static function auth()
	{
		if (empty($_SESSION['admin'])) return false;
		$info = self::info();
		if (empty($info)) return false;
		return $info;
	}

	/**
	 * 获取当前管理员信息
	 * @access public
	 * @return array|null 成功则以数组形式返回管理员信息
	 */
	public static function info()
	{
		$user = $_SESSION['admin']['user'];
		$pwd = $_SESSION['admin']['pwd'];
		if (!isset(self::$admin_info[$user])) {
			$find = Db::name('admin')->where([
				'user' => $user,
				'pwd' => $pwd,
				'status' => 1
			])->find();
			self::$admin_info[$user] = $find ? $find : false;
		}
		return self::$admin_info[$user];
	}

	/**
	 * 后台admin页面检查是否为管理员
	 * @access public
	 * @return string|true 不是管理员则返回跳转到登录页面的JS代码
	 */
	public static function check($type = 'html')
	{
		if (!self::auth()) {
			if ($type == 'html') {
				$referrer = urlencode($_SERVER['REQUEST_URI']);
				exit("<script language='javascript'>window.location.href='./login.php?referrer=$referrer';</script>");
			}
			if ($type == 'json') {
				\system\library\Json::echo(['message' => '请先登录后再进行操作']);
			}
		}
		return true;
	}
}
