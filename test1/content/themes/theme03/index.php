<?php

/**
 * 来自网络收集
 *
 * @package 动态视频引导页
 * @author 易航
 * @version 1.0
 * @link http://bri6.cn
 */
if (!defined('ROOT')) exit;
$title = $this->site->title;
$link = $this->getSites();
$description = $this->site->description;
?>
<!DOCTYPE html>
<html>

<head>
	<title><?= $title ?></title>
	<?= $this->header() ?>
	<?= $this->load($this->themeUrl('assets/css/index.css')) ?>
</head>

<body style="background-image: url(<?= $this->site->background ?>)">
	<div class="Vidage" id="Vidage">
		<div class="Vidage__image"></div>
	</div>
	<div id="wrapper">
		<header id="header">
			<div class="logo"><img src="<?= $this->site->logo ?>" style="max-width:150px;max-height:100px;border-radius: 50%;" class="logo"></div>
			<div class="content">
				<div class="inner xxxpan-text">
					<h1>⭐<?= $title ?>⭐</h1>
					<p>⭐⭐ <?= $description ?> ⭐⭐</p>
				</div>
			</div>
			<nav>
				<div class="Vidage">
					<div class="Vidage__image"></div>
					<video id="VidageVideo" class="Vidage__video" preload="metadata" loop="" autoplay="" muted="">
						<?= isset($this->options->background) ? '<source src="' . $this->options->background . '">' : null ?>
						<source src="<?= $this->site->background ?>">
						<source src="https://s7.huoying666.com/video/20210527/f1abdbf33b1b07d96a0ba00640a5db9a/16221293575533c31498e6a09e.MP4_pre.mp4">
					</video>
				</div>
				<ul>
					<?php
					foreach ($link as $key => $value) {
					?>
						<li><a href="<?= $value->url ?>" target="_blank" rel="<?= $value->rel ?>"><?= $value->title ?></a></li>
					<?php
					}
					if (!$this->auth()) echo base64_decode('PGxpPjxhIGhyZWY9Imh0dHA6Ly9ndWlkZS5icmk2LmNuIiB0YXJnZXQ9Il9ibGFuayI+PHNwYW4gc3R5bGU9ImNvbG9yOiByZWQ7Ij7mnKznq5nlkIzmrL7ns7vnu588L3NwYW4+PC9hPjwvbGk+');
					?>
				</ul>
			</nav>
		</header>
		<footer id="footer">
			<p class="copyright">Copyright © 2020-2022 <?= $title ?> All rights reserved<?php if (!$this->auth()) echo base64_decode('LiDnlLEgPGEgaHJlZj0iaHR0cDovL2d1aWRlLmJyaTYuY24iIHJlbD0iY29weXJpZ2h0Ij7mmJPoiKrnvZHlnYDlvJXlr7zns7vnu588L2E+IOW8uuWKm+mpseWKqA==') ?></p>
		</footer>
	</div>
	<?= $this->footer() ?>
</body>

</html>