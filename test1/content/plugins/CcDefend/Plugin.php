<?php

namespace content\plugins\CcDefend;

/**
 * CC攻击防护
 *
 * @package 防CC模块
 * @author 易航
 * @version 1.0
 * @link http://bri6.cn
 */
class Plugin
{

	public static $options;

	public static function config(\system\plugin\Form $form)
	{
		$description = '
		<span>CC防护类型说明：<span><br>
		<span>滑动验证码：用户首次访问需要验证全局滑动验证码，验证通过后才能访问（推荐）<span><br>
		<span>自动验证：用户首次访问进行全局JS脚本自动验证<span><br>
		';
		$type = $form->select('CC防护类型', 'type', [
			'slide' => '滑动验证码',
			'auto' => '自动验证',
		], 'slide', $description);
		$form->create($type);

		$spider_visit = $form->switcher('搜索引擎收录', 'spider_visit', 1, '关闭后搜索引擎爬虫也会出现验证页面，影响搜索引擎的收录');
		$form->create($spider_visit);
	}

	public static function route()
	{
		if (self::$options->spider_visit && self::check_spider()) {
			return;
		}
		if (self::$options->type == 'slide') {
			return self::cc_defender_slide();
		}
		if (self::$options->type == 'auto') {
			return self::cc_defender();
		}
	}

	public static function cc_defender_slide()
	{
		$iptoken = md5(self::x_real_ip() . date('Ymd')) . md5(time() . rand(11111, 99999));
		if (isset($_GET['defender_type']) && $_GET['defender_type'] == 'slide') {
			$defender_key = addslashes($_GET['defender_key']);
			$defender_hash = addslashes($_GET['defender_hash']);
			if ($defender_key == NULL || $defender_hash == NULL) {
				echo '验证失败！';
			} else {
				if (md5($defender_key) == $defender_hash) {
					setcookie('sec_defend', $defender_key, time() + 60 * 60 * 1000, '/');
					echo 'success';
				} else {
					echo '验证失败！';
				}
			}
			exit;
		} else if ((!isset($_COOKIE['sec_defend']) || !substr($_COOKIE['sec_defend'], 0, 32) === substr($iptoken, 0, 32))) {
			if (!isset($_COOKIE['sec_defend_time'])) {
				$_COOKIE['sec_defend_time'] = 0;
			}
			$sec_defend_time = $_COOKIE['sec_defend_time'] + 1;
			$x = new Hieroglyphy();
			$setCookie = $x->HieroglyphyString($iptoken);
			header('Content-type:text/html;charset=utf-8');
			if ($sec_defend_time >= 10) {
				exit('浏览器不支持COOKIE或者不正常访问！');
			}
			echo '<html lang="zh-cn"><head><meta charset="UTF-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no"><title>滑动验证</title><style>.slideBox{position:fixed;top:0;right:0;bottom:0;left:0;text-align:center;font-size:0;white-space:nowrap;overflow:auto}.slideBox:after{content:\'\';display:inline-block;height:100vh;vertical-align:middle}.slider{display:inline-block;vertical-align:middle;text-align:center;font-size:13px;white-space:normal}.slider::before{content:\'人机身份验证，请完成以下操作\';font-size:16px;display:inline-block;margin-bottom:30px}</style></head><body><div class="slideBox"><div class="slider"></div></div><script>window.slideValue=' . $setCookie . '</script><script type="text/javascript" src="/content/plugins/CcDefend/assets/js/slide.js?version=' . VERSION . '"></script></body></html>';
			exit;
		}
	}

	public static function cc_defender()
	{
		$iptoken = md5(self::x_real_ip() . date('Ymd')) . md5(time() . rand(11111, 99999));
		if ((!isset($_COOKIE['sec_defend']) || !substr($_COOKIE['sec_defend'], 0, 32) === substr($iptoken, 0, 32))) {
			if (!isset($_COOKIE['sec_defend_time'])) {
				$_COOKIE['sec_defend_time'] = 0;
			}
			$sec_defend_time = $_COOKIE['sec_defend_time'] + 1;
			$x = new Hieroglyphy();
			$setCookie = $x->HieroglyphyString($iptoken);
			header('Content-type:text/html;charset=utf-8');
			if ($sec_defend_time >= 10) {
				exit('浏览器不支持COOKIE或者不正常访问！');
			}
			echo '<html><head><meta http-equiv="pragma" content="no-cache"><meta http-equiv="cache-control" content="no-cache"><meta http-equiv="content-type" content="text/html;charset=utf-8"><title>正在加载中</title><script>function setCookie(name,value){var exp = new Date();exp.setTime(exp.getTime() + 60*60*1000);document.cookie = name + "="+ escape (value).replace(/\\+/g, \'%2B\') + ";expires=" + exp.toGMTString() + ";path=/";}function getCookie(name){var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");if(arr=document.cookie.match(reg))return unescape(arr[2]);else return null;}var sec_defend_time=getCookie(\'sec_defend_time\')||0;sec_defend_time++;setCookie(\'sec_defend\',' . $setCookie . ');setCookie(\'sec_defend_time\',sec_defend_time);if(sec_defend_time>1)window.location.href="./index.php";else window.location.reload();</script></head><body></body></html>';
			exit(0);
		}
	}

	public static function x_real_ip()
	{
		$ip = $_SERVER['REMOTE_ADDR'];
		if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && preg_match_all('#\\d{1,3}\\.\\d{1,3}\\.\\d{1,3}\\.\\d{1,3}#s', $_SERVER['HTTP_X_FORWARDED_FOR'], $matches)) {
			foreach ($matches[0] as $xip) {
				if (!preg_match('#^(10|172\\.16|192\\.168)\\.#', $xip)) {
					$ip = $xip;
				} else {
					continue;
				}
			}
		} else {
			if (isset($_SERVER['HTTP_CLIENT_IP']) && preg_match('/^([0-9]{1,3}\\.){3}[0-9]{1,3}$/', $_SERVER['HTTP_CLIENT_IP'])) {
				$ip = $_SERVER['HTTP_CLIENT_IP'];
			} else {
				if (isset($_SERVER['HTTP_CF_CONNECTING_IP']) && preg_match('/^([0-9]{1,3}\\.){3}[0-9]{1,3}$/', $_SERVER['HTTP_CF_CONNECTING_IP'])) {
					$ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
				} else {
					if ((isset($_SERVER['HTTP_X_REAL_IP']) && preg_match('/^([0-9]{1,3}\\.){3}[0-9]{1,3}$/', $_SERVER['HTTP_X_REAL_IP']))) {
						$ip = $_SERVER['HTTP_X_REAL_IP'];
					}
				}
			}
		}
		return $ip;
	}

	public static function check_spider()
	{
		$useragent = strtolower($_SERVER['HTTP_USER_AGENT']);
		if (stripos($useragent, 'baiduspider') !== false) {
			return 'baiduspider';
		}
		if (stripos($useragent, '360spider') !== false) {
			return '360spider';
		}
		if (stripos($useragent, 'soso') !== false) {
			return 'soso';
		}
		if (stripos($useragent, 'bing') !== false) {
			return 'bing';
		}
		if (stripos($useragent, 'yahoo') !== false) {
			return 'yahoo';
		}
		if (stripos($useragent, 'sohu-search') !== false) {
			return 'Sohubot';
		}
		if (stripos($useragent, 'sogou') !== false) {
			return 'sogou';
		}
		if (stripos($useragent, 'youdaobot') !== false) {
			return 'YoudaoBot';
		}
		if (stripos($useragent, 'yodaobot') !== false) {
			return 'YodaoBot';
		}
		if (stripos($useragent, 'robozilla') !== false) {
			return 'Robozilla';
		}
		if (stripos($useragent, 'msnbot') !== false) {
			return 'msnbot';
		}
		if (stripos($useragent, 'lycos') !== false) {
			return 'Lycos';
		}
		if (!stripos($useragent, 'ia_archiver') === false) {
		} else {
			if (!stripos($useragent, 'iaarchiver') === false) {
				return 'alexa';
			}
		}
		if (stripos($useragent, 'robozilla') !== false) {
			return 'Robozilla';
		}
		if (stripos($useragent, 'sitebot') !== false) {
			return 'SiteBot';
		}
		if (stripos($useragent, 'mj12bot') !== false) {
			return 'MJ12bot';
		}
		if (stripos($useragent, 'gosospider') !== false) {
			return 'gosospider';
		}
		if (stripos($useragent, 'gigabot') !== false) {
			return 'Gigabot';
		}
		if (stripos($useragent, 'yrspider') !== false) {
			return 'YRSpider';
		}
		if (stripos($useragent, 'gigabot') !== false) {
			return 'Gigabot';
		}
		if (stripos($useragent, 'jikespider') !== false) {
			return 'jikespider';
		}
		if (stripos($useragent, 'etaospider') !== false) {
			return 'EtaoSpider';
		}
		if (stripos($useragent, 'foxspider') !== false) {
			return 'FoxSpider';
		}
		if (stripos($useragent, 'docomo') !== false) {
			return 'DoCoMo';
		}
		if (stripos($useragent, 'yandexbot') !== false) {
			return 'YandexBot';
		}
		if (stripos($useragent, 'sinaweibobot') !== false) {
			return 'SinaWeiboBot';
		}
		if (stripos($useragent, 'catchbot') !== false) {
			return 'CatchBot';
		}
		if (stripos($useragent, 'surveybot') !== false) {
			return 'SurveyBot';
		}
		if (stripos($useragent, 'dotbot') !== false) {
			return 'DotBot';
		}
		if (stripos($useragent, 'purebot') !== false) {
			return 'Purebot';
		}
		if (stripos($useragent, 'ccbot') !== false) {
			return 'CCBot';
		}
		if (stripos($useragent, 'mlbot') !== false) {
			return 'MLBot';
		}
		if (stripos($useragent, 'adsbot-google') !== false) {
			return 'AdsBot-Google';
		}
		if (stripos($useragent, 'ahrefsbot') !== false) {
			return 'AhrefsBot';
		}
		if (stripos($useragent, 'spbot') !== false) {
			return 'spbot';
		}
		if (stripos($useragent, 'augustbot') !== false) {
			return 'AugustBot';
		}
		return false;
	}

	public static function render()
	{
		// CC防护说明
		// 滑动验证码：全局开启滑动验证码，验证通过后才能访问
		// 高：全局使用防CC，会影响网站APP和对接软件的正常使用
		// 中：会影响搜索引擎的收录，建议仅在正在受到CC攻击且防御不佳时开启
		// 低：用户首次访问进行验证（推荐）
	}
}
