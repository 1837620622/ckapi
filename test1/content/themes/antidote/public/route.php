<?php

use JsonDb\JsonDb\Db;
use system\library\Json;
use system\library\Route;
use system\theme\Method;

require_once __DIR__ . DIRECTORY_SEPARATOR . 'functions.php';

// 注册主题API路由
$route = Route::rule('/api/[{action}]', function ($param) {
	Api::initialize();
	$return = call_user_func(['Api', $param['action']]);
	Json::echo($return);
});

// 注册站点分类路由
$route = Route::rule('/sort/[{id}]', function ($param) {
	(new Method)->__load('sort', ['id' => $param['id']]);
	exit;
});

// 注册站点详情路由
$route = Route::rule('/site/[{id}]', function ($param) {
	(new Method)->__load('site', ['site_id' => $param['id']]);
	exit;
});

// 注册站点进入路由
$route = Route::rule('/goto/[{id}]', function ($param) {
	(new Method)->__load('goto', ['site_id' => $param['id']]);
	exit;
});

// 注册搜索路由
$route = Route::rule('/search/[{keyword}]', function ($param) {
	(new Method)->__load('search', ['keyword' => $param['keyword']]);
	exit;
});

class Api
{
	/**
	 * @var \system\theme\Method
	 */
	public static $theme;

	public static function initialize()
	{
		self::$theme = new \system\theme\Method;
	}

	public static function getLinks()
	{
		return self::$theme->getSites();
	}

	public static function site_love()
	{
		$site_id = $_POST['id'];
		$expires_or_options = time() + (10 * 365 * 24 * 60 * 60);
		$update = false;
		if (isset($_COOKIE['site_love'])) {
			$site_love = explode('|', $_COOKIE['site_love']);
			if (!in_array($site_id, $site_love)) {
				$find = Db::name('site')->find($site_id)['fields'][THEME];
				$love = ($find['love'] ?? 0) + 1;
				$update = Db::name('site')->merge('fields')->where('id', $site_id)->update([
					'fields' => [THEME => ['love' => $love]]
				]);
				$site_love[] = $site_id;
				$site_love = implode('|', $site_love);
				setcookie('site_love', $site_love, $expires_or_options, '/');
			} else {
				return [
					'code' => 201,
					'msg' => '您已赞过！'
				];
			}
		} else {
			$find = Db::name('site')->find($site_id)['fields'][THEME];
			$love = ($find['love'] ?? 0) + 1;
			$update = Db::name('site')->merge('fields')->where('id', $site_id)->update([
				'fields' => [THEME => ['love' => $love]]
			]);
			setcookie('site_love', $site_id, $expires_or_options, '/');
		}
		return $update ? [
			'code' => 200,
			'love' => $love
		] : ['code' => 201];
	}

	private static function json($code, $message, $data = null)
	{
		return [
			'code' => $code,
			'msg' => $message,
			'message' => $message,
			'data' => $data
		];
	}

	public static function site_info()
	{
		$url = self::addProtocol(trim(rtrim($_POST['url'], '/')));
		$site_info = site_info($url);
		if (is_string($site_info)) {
			return self::json(201, $site_info . '，请手动填写');
		}
		if (!empty($site_info['title'])) {
			$site_info['title'] = trim(explode('-', $site_info['title'])[0]);
		}
		return self::json(200, '获取成功', $site_info);
	}

	/**
	 * 给无http://或https://前缀的链接加上默认http://
	 */
	private static function addProtocol($url, $protocol = null)
	{
		if (!empty($url)) {
			$protocol = $protocol ? $protocol : 'http://';
			if (!preg_match("/^(http:\/\/|https:\/\/)/i", $url)) {
				return $protocol . $url;
			}
		}
		return $url;
	}

	/**
	 * 检测是否外链到本站
	 */
	private static function checkExternalLink($url)
	{
		$text = \network\http\get($url);
		return stripos($text, $_SERVER['HTTP_HOST']);
	}

	public static function apply_add()
	{
		if (!self::$theme->options->apply) {
			return self::json(500, '本站已关闭申请收录权限');
		}
		if (strtolower($_POST['captcha']) != strtolower($_SESSION['antidote_captcha'])) {
			return self::json(400, '验证码错误');
		}

		$title = explode('-', $_POST['title'])[0];
		$title = explode('_', $title)[0];
		$title = htmlentities(trim($title));

		$sortId = $_POST['sortId'];
		$qq = htmlentities($_POST['qq']);
		$url = htmlentities(self::addProtocol(trim($_POST['url'])));
		$keywords = htmlentities($_POST['keywords']);
		$description = htmlentities($_POST['description']);
		$favicon = $_POST['favicon'] ? htmlentities($_POST['favicon']) : '';
		$icp = $_POST['icp'] ? htmlentities($_POST['icp']) : '';
		if (!$title || !$sortId || !$url) {
			return self::json(400, '名称、分类、域名缺一不可');
		}
		$find = Db::name('site')->where(['url' => $url])->find();
		if ($find) {
			return $find['status'] ? self::json(400, '该站点已存在！') : self::json(400, '已提交申请，请耐心等待审核');
		}
		$find = Db::name('site')->where(['url' => $url])->find();
		if ($find) {
			return self::json(400, '该站点已提交过申请');
		}
		$insert = [
			'sort_id' => $sortId,
			'title' => $title,
			'url' => $url,
			'rel' => 'nofollow',
			'order' => time(),
			'fields' => ['antidote' => [
				'keywords' => $keywords,
				'description' => $description,
				'qq' => $qq,
				'favicon' => $favicon,
				'icp' => $icp
			]]
		];
		if (self::$theme->options->auto_apply && self::checkExternalLink($url)) {
			$insert['status'] = 1;
			$result = Db::name('site')->insert($insert);
			$tip = '，检测到贵站已有本站友链，审核通过！';
			$email = '已自动通过审核';
		} else {
			$insert['status'] = 0;
			$result = Db::name('site')->insert($insert);
			$tip = '，请添加本站友链，等待审核！';
			$email = '请登录管理后台查看详情';
		}
		if ($result) {
			if (self::$theme->options->email_notice) {
				$sort = Db::name('sort')->find($sortId);
				$a = element('a')->attr(['href' => $url, 'target' => '_blank'])->get($url);
				$qq = element('a')->attr(['href' => 'http://wpa.qq.com/msgrd?v=3&uin=' . $qq . '&site=qq&menu=yes', 'target' => '_blank'])->get($qq);
				$content = element('p')->get('站点分类：' . $sort['title']);
				$content .= element('p')->get('站点标题：' . $title);
				$content .= element('p')->get('站点链接：' . $a);
				$content .= element('p')->get('站点介绍：', $description);
				$content .= element('p')->get('站点关键词：', $keywords);
				$content .= element('p')->get('ICP备案号：', $icp);
				$content .= element('p')->get('站长QQ：' . $qq);
				send_mail('站点申请', '收到站点申请，' . $email, $content);
			}
			return self::json(200, '申请成功' . $tip);
		}
		return self::json(400, '申请失败，请联系站长');
	}
}
