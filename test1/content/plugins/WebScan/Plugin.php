<?php

namespace content\plugins\WebScan;

/**
 * @package 网站防火墙
 * @description 防止站点被攻击和注入非法代码
 * @author 易航
 * @version 1.0
 * @link http://bri6.cn
 */
class Plugin
{

	public static $options;

	//拦截开关(1为开启，0关闭)
	public static $webscan_switch = 1;
	//提交方式拦截(1开启拦截,0关闭拦截,post,get,cookie,referre选择需要拦截的方式)
	public static $webscan_post = 1;
	public static $webscan_get = 1;
	public static $webscan_cookie = 1;
	public static $webscan_referre = 1;
	//后台白名单,后台操作将不会拦截,添加"|"隔开白名单目录下面默认是网址带 admin  /dede/ 放行
	// global $webscan_white_directory;
	//url白名单,可以自定义添加url白名单,默认是对phpcms的后台url放行
	//写法：比如phpcms 后台操作url index.php?m=admin php168的文章提交链接post.php?job=postnew&step=post ,dedecms 空间设置edit_space_info.php
	// public static $webscan_white_url = [
	// 	'shopedit.php' => 'my=edit_submit',
	// 	'/shopedit.php' => 'my=add_submit',
	// 	'message.php' => 'my=add_submit',
	// 	'/message.php' => 'my=edit_submit',
	// 	'article.php' => 'my=add_submit',
	// 	'/article.php' => 'my=edit_submit',
	// 	'/uset.php' => 'mod=site_n',
	// 	'/ajax.php' => 'act=set',
	// 	'/ajax_shop.php' => 'act=batchaddgoods'
	// ];
	public static $webscan_white_url = [];
	//get拦截规则
	public static $getfilter = "\\<.+javascript:window\\[.{1}\\\\x|<.*=(&#\\d+?;?)+?>|<.*(data|src)=data:text\\/html.*>|\\b(alert\\(|confirm\\(|expression\\(|prompt\\(|benchmark\s*?\(.*\)|sleep\s*?\(.*\)|\\b(group_)?concat[\\s\\/\\*]*?\\([^\\)]+?\\)|\bcase[\s\/\*]*?when[\s\/\*]*?\([^\)]+?\)|load_file\s*?\\()|<[a-z]+?\\b[^>]*?\\bon([a-z]{4,})\s*?=|^\\+\\/v(8|9)|\\b(and|or)\\b\\s*?([\\(\\)'\"\\d]+?=[\\(\\)'\"\\d]+?|[\\(\\)'\"a-zA-Z]+?=[\\(\\)'\"a-zA-Z]+?|>|<|\s+?[\\w]+?\\s+?\\bin\\b\\s*?\(|\\blike\\b\\s+?[\"'])|\\/\\*.*\\*\\/|<\\s*script\\b|\\bEXEC\\b|UNION.+?SELECT\s*(\(.+\)\s*|@{1,2}.+?\s*|\s+?.+?|(`|'|\").*?(`|'|\")\s*)|UPDATE\s*(\(.+\)\s*|@{1,2}.+?\s*|\s+?.+?|(`|'|\").*?(`|'|\")\s*)SET|INSERT\\s+INTO.+?VALUES|(SELECT|DELETE)@{0,2}(\\(.+\\)|\\s+?.+?\\s+?|(`|'|\").*?(`|'|\"))FROM(\\(.+\\)|\\s+?.+?|(`|'|\").*?(`|'|\"))|(CREATE|ALTER|DROP|TRUNCATE)\\s+(TABLE|DATABASE)|<.*(iframe|frame|style|embed|object|frameset|meta|xml)";
	//post拦截规则
	public static $postfilter = "<.*=(&#\\d+?;?)+?>|<.*data=data:text\\/html.*>|\\b(alert\\(|confirm\\(|expression\\(|prompt\\(|benchmark\s*?\(.*\)|sleep\s*?\(.*\)|\\b(group_)?concat[\\s\\/\\*]*?\\([^\\)]+?\\)|\bcase[\s\/\*]*?when[\s\/\*]*?\([^\)]+?\)|load_file\s*?\\()|<[^>]*?\\b(onerror|onmousemove|onload|onclick|onmouseover)\\b|\\b(and|or)\\b\\s*?([\\(\\)'\"\\d]+?=[\\(\\)'\"\\d]+?|[\\(\\)'\"a-zA-Z]+?=[\\(\\)'\"a-zA-Z]+?|>|<|\s+?[\\w]+?\\s+?\\bin\\b\\s*?\(|\\blike\\b\\s+?[\"'])|\\/\\*.*\\*\\/|<\\s*script\\b|\\bEXEC\\b|UNION.+?SELECT\s*(\(.+\)\s*|@{1,2}.+?\s*|\s+?.+?|(`|'|\").*?(`|'|\")\s*)|UPDATE\s*(\(.+\)\s*|@{1,2}.+?\s*|\s+?.+?|(`|'|\").*?(`|'|\")\s*)SET|INSERT\\s+INTO.+?VALUES|(SELECT|DELETE)(\\(.+\\)|\\s+?.+?\\s+?|(`|'|\").*?(`|'|\"))FROM(\\(.+\\)|\\s+?.+?|(`|'|\").*?(`|'|\"))|(CREATE|ALTER|DROP|TRUNCATE)\\s+(TABLE|DATABASE)|<.*(iframe|frame|style|embed|object|frameset|meta|xml)";
	//cookie拦截规则
	public static $cookiefilter = "benchmark\s*?\(.*\)|sleep\s*?\(.*\)|load_file\s*?\\(|\\b(and|or)\\b\\s*?([\\(\\)'\"\\d]+?=[\\(\\)'\"\\d]+?|[\\(\\)'\"a-zA-Z]+?=[\\(\\)'\"a-zA-Z]+?|>|<|\s+?[\\w]+?\\s+?\\bin\\b\\s*?\(|\\blike\\b\\s+?[\"'])|\\/\\*.*\\*\\/|<\\s*script\\b|\\bEXEC\\b|UNION.+?SELECT\s*(\(.+\)\s*|@{1,2}.+?\s*|\s+?.+?|(`|'|\").*?(`|'|\")\s*)|UPDATE\s*(\(.+\)\s*|@{1,2}.+?\s*|\s+?.+?|(`|'|\").*?(`|'|\")\s*)SET|INSERT\\s+INTO.+?VALUES|(SELECT|DELETE)@{0,2}(\\(.+\\)|\\s+?.+?\\s+?|(`|'|\").*?(`|'|\"))FROM(\\(.+\\)|\\s+?.+?|(`|'|\").*?(`|'|\"))|(CREATE|ALTER|DROP|TRUNCATE)\\s+(TABLE|DATABASE)";

	public static function render()
	{
		// $this->webscan_error();
		$webscan_white_directory = self::$options->directory;
		//referer获取
		$webscan_referer = empty($_SERVER['HTTP_REFERER']) ? array() : array('HTTP_REFERER' => $_SERVER['HTTP_REFERER']);
		if (self::$webscan_switch && self::webscan_white($webscan_white_directory, self::$webscan_white_url)) {
			if (self::$webscan_get) {
				foreach ($_GET as $key => $value) {
					self::webscan_StopAttack($key, $value, self::$getfilter, "GET");
				}
			}
			if (self::$webscan_post) {
				foreach ($_POST as $key => $value) {
					self::webscan_StopAttack($key, $value, self::$postfilter, "POST");
				}
			}
			if (self::$webscan_cookie) {
				foreach ($_COOKIE as $key => $value) {
					self::webscan_StopAttack($key, $value, self::$cookiefilter, "COOKIE");
				}
			}
			if (self::$webscan_referre) {
				foreach ($webscan_referer as $key => $value) {
					self::webscan_StopAttack($key, $value, self::$postfilter, "REFERRER");
				}
			}
		}
	}

	public static function config(\system\plugin\Form $form)
	{
		$directory = $form->input('目录白名单', 'directory', 'admin', 'text', '操作目录将不会拦截，添加"|"隔开白名单目录');
		$form->create($directory);
		return $form;
	}

	/**
	 * 参数拆分
	 */
	public static function webscan_arr_foreach($arr)
	{
		static $str;
		static $keystr;
		if (!is_array($arr)) {
			return $arr;
		}
		foreach ($arr as $key => $val) {
			$keystr = $keystr . $key;
			if (is_array($val)) {
				self::webscan_arr_foreach($val);
			} else {
				$str[] = $val . $keystr;
			}
		}
		return implode($str);
	}

	/**
	 * 攻击检查拦截
	 */
	public static function webscan_StopAttack($StrFiltKey, $StrFiltValue, $ArrFiltReq, $method)
	{
		$StrFiltValue = self::webscan_arr_foreach($StrFiltValue);
		if (preg_match("/" . $ArrFiltReq . "/is", $StrFiltValue)) {
			require_once 'html.php';
			exit;
		}
		if (preg_match("/" . $ArrFiltReq . "/is", $StrFiltKey)) {
			require_once 'html.php';
			exit;
		}
	}

	/**
	 * 拦截目录白名单
	 */
	public static function webscan_white($webscan_white_name, $webscan_white_url = array())
	{
		$url_path = $_SERVER['SCRIPT_NAME'];
		$url_var = $_SERVER['QUERY_STRING'];
		if (preg_match("/" . $webscan_white_name . "/is", $url_path) && !empty($webscan_white_name)) {
			return false;
		}
		foreach ($webscan_white_url as $key => $value) {
			if (!empty($url_var) && !empty($value)) {
				if (stristr($url_path, $key) && stristr($url_var, $value)) {
					return false;
				}
			} elseif (empty($url_var) && empty($value)) {
				if (stristr($url_path, $key)) {
					return false;
				}
			}
		}

		return true;
	}

	/**
	 *   关闭用户错误提示
	 */
	private static function webscan_error()
	{
		if (ini_get('display_errors')) {
			ini_set('display_errors', '0');
		}
		error_reporting(0);
	}
}
