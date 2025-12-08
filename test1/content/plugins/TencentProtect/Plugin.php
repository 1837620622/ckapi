<?php

namespace content\plugins\TencentProtect;

/**
 * @package 反腾讯网址安全检测
 * @description 屏蔽腾讯电脑管家网址安全检测
 * @author 易航
 * @version 1.0
 * @link http://bri6.cn
 */
class Plugin
{
	public static function render()
	{
		if (stripos($_SERVER['HTTP_USER_AGENT'], 'Baiduspider') !== false || stripos($_SERVER['HTTP_USER_AGENT'], '360Spider') !== false || stripos($_SERVER['HTTP_USER_AGENT'], 'YisouSpider') !== false || stripos($_SERVER['HTTP_USER_AGENT'], 'Sogou web spider') !== false || stripos($_SERVER['HTTP_USER_AGENT'], 'Sogou inst spider') !== false || stripos($_SERVER['HTTP_USER_AGENT'], 'Googlebot/') !== false || stripos($_SERVER['HTTP_USER_AGENT'], 'bingbot/') !== false || stripos($_SERVER['HTTP_USER_AGENT'], 'Bytespider') !== false) {
			return;
		}
		if (!empty($_SERVER['HTTP_REFERER'])) {
			if (stripos($_SERVER['HTTP_REFERER'], '.tr.com') !== false || stripos($_SERVER['HTTP_REFERER'], '.wsd.com') !== false || stripos($_SERVER['HTTP_REFERER'], '.oa.com') !== false || stripos($_SERVER['HTTP_REFERER'], '.cm.com') !== false || stripos($_SERVER['HTTP_REFERER'], '/membercomprehensive/') !== false || stripos($_SERVER['HTTP_REFERER'], 'www.internalrequests.org') !== false) {
				$_SESSION['txprotectblock'] = true;
				exit('Click to continue!' . DATE);
			}
		}
		//HEADER特征屏蔽
		if (!isset($_SERVER['HTTP_ACCEPT']) || empty($_SERVER['HTTP_USER_AGENT']) || stripos(strtolower($_SERVER['HTTP_USER_AGENT']), "manager") !== false || stripos($_SERVER['HTTP_USER_AGENT'], 'ozilla') !== false && stripos($_SERVER['HTTP_USER_AGENT'], 'Mozilla') === false || stripos($_SERVER['HTTP_USER_AGENT'], "Windows NT 6.1") !== false && $_SERVER['HTTP_ACCEPT'] == '*/*' || stripos($_SERVER['HTTP_USER_AGENT'], "Windows NT 5.1") !== false && $_SERVER['HTTP_ACCEPT'] == '*/*' || stripos($_SERVER['HTTP_ACCEPT'], "vnd.wap.wml") !== false && stripos($_SERVER['HTTP_USER_AGENT'], "Windows NT 5.1") !== false || isset($_COOKIE['ASPSESSIONIDQASBQDRC']) || stripos($_SERVER['HTTP_USER_AGENT'], "Alibaba.Security.Heimdall") !== false || stripos($_SERVER['HTTP_USER_AGENT'], 'wechatdevtools/') !== false || stripos($_SERVER['HTTP_USER_AGENT'], 'libcurl/') !== false || stripos($_SERVER['HTTP_USER_AGENT'], 'python') !== false || stripos($_SERVER['HTTP_USER_AGENT'], 'Go-http-client') !== false || stripos($_SERVER['HTTP_USER_AGENT'], 'HeadlessChrome') !== false || @$_SESSION['txprotectblock'] == true) {
			exit('Click to continue!' . DATE);
		}
		if (stripos($_SERVER['HTTP_USER_AGENT'], 'Coolpad Y82-520') !== false && $_SERVER['HTTP_ACCEPT'] == '*/*' || stripos($_SERVER['HTTP_USER_AGENT'], 'Mac OS X 10_12_4') !== false && $_SERVER['HTTP_ACCEPT'] == '*/*' || stripos($_SERVER['HTTP_USER_AGENT'], 'iPhone OS') !== false && stripos($_SERVER['HTTP_USER_AGENT'], 'baiduboxapp/') === false && $_SERVER['HTTP_ACCEPT'] == '*/*' || stripos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false && $_SERVER['HTTP_ACCEPT'] == '*/*' || stripos($_SERVER['HTTP_ACCEPT_LANGUAGE'], 'en') !== false && stripos($_SERVER['HTTP_ACCEPT_LANGUAGE'], 'zh') === false || stripos($_SERVER['HTTP_USER_AGENT'], 'iPhone') !== false && stripos($_SERVER['HTTP_USER_AGENT'], 'en-') !== false && stripos($_SERVER['HTTP_USER_AGENT'], 'zh') === false || stripos($_SERVER['HTTP_USER_AGENT'], 'iPhone OS 9_1') !== false && $_SERVER['HTTP_CONNECTION'] == 'close') {
			exit('您当前浏览器不支持或操作系统语言设置非中文，无法访问本站！');
		}
	}
}