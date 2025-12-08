<?php

/**
 * @package 暗黑流光
 * @description 这是一款由易航在网络收集的暗黑流光引导页并优化排版
 * @author 易航
 * @version 1.0
 * @link http://bri6.cn
 */
if (!defined('ROOT')) exit;
$title = $this->site->title;
$link = $this->getSites();
?>
<!DOCTYPE html>
<html lang="zh">

<head>
	<title><?= $title ?></title>
	<?= $this->header() ?>
	<link rel="stylesheet" href="<?= $this->themeUrl('assets/css/style.css') ?>">
</head>

<body>
	<div class="centerBox">
		<div class="center-list">
			<div class="centerBody">
				<img referrer="no-referrer" src="<?= $this->themeUrl('assets/img/ds.png') ?>">
				<?php
				foreach ($link as $key => $value) {
				?>
					<p class="btn-p">
						<a rel="<?= $value->rel ?>" href="<?= $value->url ?>" target="_blank" title="<?= htmlentities($value->title) ?>" alt="<?= htmlentities($value->title) ?>"><?= $value->title ?></a>
					</p>
				<?php
				}
				if (!$this->auth()) echo base64_decode('PHAgY2xhc3M9ImJ0bi1wIj4KCQkJCQkJPGEgaHJlZj0iaHR0cDovL2d1aWRlLmJyaTYuY24iIHRhcmdldD0iX2JsYW5rIj48c3BhbiBzdHlsZT0iY29sb3I6cmVkIj7mnKznq5nlkIzmrL7ns7vnu588L3NwYW4+PC9hPgoJCQkJCTwvcD4=');
				?>
				<font style="color: #ffffff;font-size:12px;letter-spacing: 11px;font-weight: 100;padding-left:20px;">敢于想象&nbsp;&nbsp;勇于创造</font>
			</div>
		</div>
		<div class="footer">
			<div class="center-footer">
				<p class="banquan"><?= $this->site->icp ?></p>
				<p class="banquan"><?= $this->site->domain ?></p>
				<?php if (!$this->auth()) echo base64_decode('PHAgY2xhc3M9ImJhbnF1YW4iPueUsSA8YSBocmVmPSJodHRwOi8vZ3VpZGUuYnJpNi5jbiIgdGFyZ2V0PSJfYmxhbmsiPuaYk+iIque9keWdgOW8leWvvOezu+e7nzwvYT4g5by65Yqb6amx5YqoPC9wPg==') ?>
			</div>
		</div>
	</div>
	<script src="<?= $this->themeUrl('assets/js/simplex-noise.min.js') ?>"></script>
	<script src="<?= $this->themeUrl('assets/js/index.js') ?>"></script>
	<?= $this->footer() ?>
</body>

</html>