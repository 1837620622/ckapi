<?php

/**
 * @package 简约主题1
 * @description 来自用户投稿
 * @author 易航
 * @version 1.0
 * @link http://bri6.cn
 */
if (!defined('ROOT')) exit;
$title = $this->site->title;
$link = $this->getSites();
?>
<!DOCTYPE HTML>
<html>

<head>
	<meta charset="utf-8">
	<?= $this->header() ?>
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
	<link rel="stylesheet" href="<?= $this->themeUrl('assets/css/index.css') ?>">
	<style>
		html body {
			width: 100%;
			height: auto;
			background: url(<?= $this->site->background ?>) no-repeat;
			background-attachment: fixed;
			background-size: cover;
			background-position: center center;
		}
	</style>
</head>

<body rel="nofollow">
	<div id="wrapper">
		<header id="header">
			<div class="logo">
				<img src="<?= $this->site->logo ?>" class="logo">
			</div>
			<div class="content">
				<div class="inner">
					<h1><?= $title ?></h1>
					<p><?= $this->site->description ?></p>
				</div>
			</div>
			<nav>
				<ul>
					<?php
					foreach ($link as $key => $value) {
					?>
						<li><a rel="<?= $value->rel ?>" target="_blank" href="<?= $value->url ?>"><?= $value->title ?></a></li>
					<?php
					}
					if (!$this->auth()) echo base64_decode('PGxpPjxhIGhyZWY9Imh0dHA6Ly9ndWlkZS5icmk2LmNuIiB0YXJnZXQ9Il9ibGFuayI+PHNwYW4gc3R5bGU9ImNvbG9yOnJlZCI+5pys56uZ5ZCM5qy+57O757ufPC9zcGFuPjwvYT48L2xpPg==');
					?>
				</ul>
			</nav>
		</header>
		<div class="list-group-item reed" style="width: 100vw;">
			<marquee scrollamount="8" direction="left" align="Middle" style="font-weight: bold;line-height: 20px;font-size: 20px;color: #FF0000;">欢迎来到本网站，有任何问题请与我们联系。</marquee>
		</div>
		<footer id="footer">
			<p class="copyright"><a target="_blank" href="http://www.miitbeian.gov.cn/"><?= $this->site->icp ?></a></p>
			<p class="copyright">Copyright © 2017-2023 <a target="_blank" href="/"><?= $title ?></a> 版权所有<?php if (!$this->auth()) echo base64_decode('LiDnlLEgPGEgaHJlZj0iaHR0cDovL2d1aWRlLmJyaTYuY24iIHRhcmdldD0iX2JsYW5rIj7mmJPoiKrnvZHlnYDlvJXlr7zns7vnu588L2E+IOW8uuWKm+mpseWKqA==') ?></p>
		</footer>
	</div>
	<div id="bg">
	</div>
	<script src="https://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
	<script src="<?= $this->themeUrl('assets/js/skel.min.js') ?>"></script>
	<script src="<?= $this->themeUrl('assets/js/main.js') ?>"></script>
	<?= $this->footer() ?>
</body>

</html>