<?php
/*
 * @Author        : 易航
 * @Url           : http://guide.bri6.cn
 * @Date          : 2022-10-10 00:00:00
 * @LastEditTime  : 2024-07-28 00:00:00
 * @Email         : 2136118039@qq.com
 * @Project       : 易航网址导航系统
 * @Description   : 一款极其优雅的易航网址导航系统
 * @Read me       : 感谢您使用易航网址导航系统，系统源码有详细的注释，支持二次开发。
 * @Remind        : 使用盗版系统会存在各种未知风险。支持正版，从我做起！
*/
include_once 'public/common.php';
$site = options('site');
?>
<!DOCTYPE html>
<html lang="zh">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="keywords" content="<?= $site['keywords'] ?>">
	<meta name="description" content="<?= $site['description'] ?>">
	<title>404 - <?= $site['title'] ?></title>
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-touch-fullscreen" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="default">
	<link href="<?= cdn('twitter-bootstrap/5.1.3/css/bootstrap.min.css') ?>" rel="stylesheet">
	<link href="<?= LightYearV5('css/materialdesignicons.min.css') ?>" rel="stylesheet">
	<link href="<?= LightYearV5('css/style.min.css') ?>" rel="stylesheet">
	<style>
		body {
			background: #f4f5fa;
		}

		[data-theme|='translucent'],
		[data-theme|='dark'] {
			background: transparent;
			color: #fff;
		}

		.error-page {
			height: 100%;
			position: fixed;
			width: 100%;
		}

		.error-body {
			padding-top: 5%;
		}

		.error-body h1 {
			font-size: 210px;
			line-height: 210px;
			color: #cacaca;
		}
	</style>
</head>

<body>
	<section class="error-page">
		<div class="error-box">
			<div class="error-body text-center">
				<h1>404</h1>
				<h5 class="mb-5 mt-3 text-gray">很抱歉，但是那个页面看起来已经不存在了。</h5>
				<a href="/" class="btn btn-primary">返回首页</a>
			</div>
		</div>
	</section>
</body>

</html>