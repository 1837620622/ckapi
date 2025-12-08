<?php
if (spider_detection()) response404();
$site = $this->getSite($site_id);
if (empty($site->url)) {
	$title = '链接错误，正在返回……';
	$url = '/';
} else {
	$title = '页面跳转中，请稍候……';
	$url = $site->url;
	$url = strstr($url, '?') ? (trim($url, '&') . '&' .  $this->site->domain) : ($url . '?' .  $this->site->domain);
}
?>
<!DOCTYPE html>
<html lang="zh">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<meta name="referrer" content="always">
	<title><?= $title; ?></title>
	<style type="text/css">
		html,
		body {
			width: 100%;
			height: 100%;
			padding: 0;
			margin: 0;
			background: #000;
		}

		.flex-container {
			width: 100%;
			height: 100%;
			position: relative;
			display: -webkit-box;
			display: -ms-flexbox;
			display: flex;
			-ms-flex-wrap: wrap;
			flex-wrap: wrap;
			-webkit-box-pack: center;
			-ms-flex-pack: center;
			justify-content: center;
			-webkit-box-align: center;
			-ms-flex-align: center;
			align-items: center;
			flex-direction: column;
		}

		.heart {
			position: relative;
			font-size: 0;
			width: 138px;
		}

		[class*="heart-piece-"] {
			position: absolute;
			top: -5px;
			width: 10px;
			height: 10px;
			border-radius: 5px;
		}

		.heart-piece-4 {
			-webkit-animation: piece-4 1.0s infinite;
			animation: piece-4 1.0s infinite;
		}

		.heart-piece-3,
		.heart-piece-5 {
			-webkit-animation: piece-3 1.0s infinite;
			animation: piece-3 1.0s infinite;
		}

		.heart-piece-2,
		.heart-piece-6 {
			-webkit-animation: piece-2 1.0s infinite;
			animation: piece-2 1.0s infinite;
		}

		.heart-piece-1,
		.heart-piece-7 {
			-webkit-animation: piece-1 1.0s infinite;
			animation: piece-1 1.0s infinite;
		}

		.heart-piece-0,
		.heart-piece-8 {
			-webkit-animation: piece-0 1.0s infinite;
			animation: piece-0 1.0s infinite;
		}

		.heart-piece-0 {
			left: 0;
			-webkit-animation-delay: 0s;
			animation-delay: 0s;
			background-color: #57f1f1;
		}

		.heart-piece-1 {
			left: 16px;
			-webkit-animation-delay: 0.05s;
			animation-delay: 0.05s;
			background-color: #3ed6d6;
		}

		.heart-piece-2 {
			left: 32px;
			-webkit-animation-delay: 0.1s;
			animation-delay: 0.1s;
			background-color: #42c3e0;
		}

		.heart-piece-3 {
			left: 48px;
			-webkit-animation-delay: 0.15s;
			animation-delay: 0.15s;
			background-color: #07ead5;
		}

		.heart-piece-4 {
			left: 64px;
			-webkit-animation-delay: 0.2s;
			animation-delay: 0.2s;
			background-color: #42c3e0;
		}

		.heart-piece-5 {
			left: 80px;
			-webkit-animation-delay: 0.25s;
			animation-delay: 0.25s;
			background-color: #07ead5;
		}

		.heart-piece-6 {
			left: 96px;
			-webkit-animation-delay: 0.3s;
			animation-delay: 0.3s;
			background-color: #42c3e0;
		}

		.heart-piece-7 {
			left: 112px;
			-webkit-animation-delay: 0.35s;
			animation-delay: 0.35s;
			background-color: #3ed6d6;
		}

		.heart-piece-8 {
			left: 128px;
			-webkit-animation-delay: 0.4s;
			animation-delay: 0.4s;
			background-color: #57f1f1;
		}

		@-webkit-keyframes piece-4 {

			0%,
			10%,
			90%,
			100% {
				height: 10px;
				top: -5px;
			}

			45%,
			55% {
				height: 94px;
				top: -23px;
			}
		}

		@keyframes piece-4 {

			0%,
			10%,
			90%,
			100% {
				height: 10px;
				top: -5px;
			}

			45%,
			55% {
				height: 94px;
				top: -23px;
			}
		}

		@-webkit-keyframes piece-3 {

			0%,
			10%,
			90%,
			100% {
				height: 10px;
				top: -5px;
			}

			45%,
			55% {
				height: 90px;
				top: -31px;
			}
		}

		@keyframes piece-3 {

			0%,
			10%,
			90%,
			100% {
				height: 10px;
				top: -5px;
			}

			45%,
			55% {
				height: 90px;
				top: -31px;
			}
		}

		@-webkit-keyframes piece-2 {

			0%,
			10%,
			90%,
			100% {
				height: 10px;
				top: -5px;
			}

			45%,
			55% {
				height: 80px;
				top: -37px;
			}
		}

		@keyframes piece-2 {

			0%,
			10%,
			90%,
			100% {
				height: 10px;
				top: -5px;
			}

			45%,
			55% {
				height: 80px;
				top: -37px;
			}
		}

		@-webkit-keyframes piece-1 {

			0%,
			10%,
			90%,
			100% {
				height: 10px;
				top: -5px;
			}

			45%,
			55% {
				height: 60px;
				top: -31px;
			}
		}

		@keyframes piece-1 {

			0%,
			10%,
			90%,
			100% {
				height: 10px;
				top: -5px;
			}

			45%,
			55% {
				height: 60px;
				top: -31px;
			}
		}

		@-webkit-keyframes piece-0 {

			0%,
			10%,
			90%,
			100% {
				height: 10px;
				top: -5px;
			}

			45%,
			55% {
				height: 30px;
				top: -15px;
			}
		}

		@keyframes piece-0 {

			0%,
			10%,
			90%,
			100% {
				height: 10px;
				top: -5px;
			}

			45%,
			55% {
				height: 30px;
				top: -15px;
			}
		}

		.text {
			margin-top: 120px;
			font-size: 20px;
			color: #6cc;
		}
	</style>
</head>

<body>
	<div class="flex-container">
		<div class="heart">
			<div class="heart-piece-0"></div>
			<div class="heart-piece-1"></div>
			<div class="heart-piece-2"></div>
			<div class="heart-piece-3"></div>
			<div class="heart-piece-4"></div>
			<div class="heart-piece-5"></div>
			<div class="heart-piece-6"></div>
			<div class="heart-piece-7"></div>
			<div class="heart-piece-8"></div>
		</div>
		<div class="text">页面跳转中，请稍候……</div>
	</div>
	<a style="display: none;" id="url" href="<?= $url ?>" rel="nofollow"></a>
	<script>
		setTimeout(() => {
			document.getElementById('url').click();
		}, 2000);
	</script>
</body>

</html>