<?php

namespace system\library;

class Request
{

	/**
	 * 当前URL地址中的scheme参数
	 * @access public
	 * @return string
	 */
	public static function scheme(): string
	{
		return self::isSsl() ? 'https' : 'http';
	}

	/**
	 * 当前是否ssl
	 * @access public
	 * @return bool
	 */
	public static function isSsl(): bool
	{
		if (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 443) {
			return true;
		} elseif (isset($_SERVER['HTTPS']) && (strtolower($_SERVER['HTTPS']) == 'on' || $_SERVER['HTTPS'] == '1')) {
			return true;
		} elseif (isset($_SERVER['HTTP_X_CLIENT_SCHEME']) && $_SERVER['HTTP_X_CLIENT_SCHEME'] == 'https') {
			return true;
		} elseif (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
			return true;
		} elseif (isset($_SERVER['REQUEST_SCHEME']) && $_SERVER['REQUEST_SCHEME'] == 'https') {
			return true;
		} elseif (isset($_SERVER['HTTP_EWS_CUSTOME_SCHEME']) && $_SERVER['HTTP_EWS_CUSTOME_SCHEME'] == 'https') {
			return true;
		}
		return false;
	}

	/**
	 * 判断是否移动端请求
	 * @access public
	 * @return bool
	 */
	public static function isMobile(): bool
	{
		$useragent = strtolower($_SERVER['HTTP_USER_AGENT']);
		$ualist = array('android', 'midp', 'nokia', 'mobile', 'iphone', 'ipod', 'blackberry', 'windows phone');
		if ((dstrpos($useragent, $ualist) || strexists($_SERVER['HTTP_ACCEPT'], "VND.WAP") || strexists(($_SERVER['HTTP_VIA'] ?? ''), "wap"))) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * 判断是否电脑端请求
	 * @access public
	 * @return bool
	 */
	public static function isPc(): bool
	{
		return (self::isMobile() ? false : true);
	}

	/**
	 * 获取用户IP地址
	 * @access public
	 * @param ?int $type
	 * @return string
	 */
	public static function ip(?int $type = null): string
	{
		if (is_null($type)) {
			$type = options('system.ip_type') ? options('system.ip_type') : 3;
		}
		$ip = $_SERVER['REMOTE_ADDR'];
		if ($type <= 1 && isset($_SERVER['HTTP_X_FORWARDED_FOR']) && preg_match_all('#\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}#s', $_SERVER['HTTP_X_FORWARDED_FOR'], $matches)) {
			foreach ($matches[0] as $xip) {
				if (filter_var($xip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
					$ip = $xip;
					break;
				}
			}
		} elseif ($type <= 1 && isset($_SERVER['HTTP_CLIENT_IP']) && filter_var($_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif ($type <= 2 && isset($_SERVER['HTTP_CF_CONNECTING_IP']) && filter_var($_SERVER['HTTP_CF_CONNECTING_IP'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
			$ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
		} elseif ($type <= 2 && isset($_SERVER['HTTP_X_REAL_IP']) && filter_var($_SERVER['HTTP_X_REAL_IP'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
			$ip = $_SERVER['HTTP_X_REAL_IP'];
		}
		return $ip;
	}
	/**
	 * 获取用户IP地址归属地
	 * @access public
	 * @param string $ip IP地址
	 * @return ?string
	 */
	public static function ipCity($ip): ?string
	{
		if ($ip == '127.0.0.1') return '本机地址';
		$url = 'http://whois.pconline.com.cn/ipJson.jsp?json=true&ip=';
		$city = \network\http\get($url . $ip)->body();
		$city = mb_convert_encoding($city, "UTF-8", "GB2312");
		$city = json_decode($city, true);
		if (!empty($city['city'])) {
			$location = $city['pro'] . $city['city'];
		} else if (!empty($city['pro'])) {
			$location = $city['pro'];
		} else if (!empty($city['addr'])) {
			$location = $city['addr'];
		} else {
			$location = null;
		}
		return $location;
	}
}
