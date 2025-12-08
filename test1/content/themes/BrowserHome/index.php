<?php

/**
 * @package 简约浏览器主页
 * @description 来自网络收集
 * @author 易航
 * @version 1.0
 * @link http://bri6.cn
 */

use system\library\Statics;

if (!defined('ROOT')) exit;
$title = $this->site->title;
$link = $this->getSites();
?>
<!DOCTYPE html>
<html>

<head>
	<?= $this->header() ?>
	<script src="<?= $this->options->icon_cdn ?>"></script>
	<link rel="stylesheet" href="<?= $this->themeUrl('assets/css/index.css') ?>">
	<?= Statics::image($this->site->background, ['style' => 'display:none']) ?>
	<style>
		body {
			background-image: url('<?= $this->site->background ?>') !important;
		}
	</style>
</head>

<body oncontextmenu="return false" onselectstart="return false" ondragstart="return false">
	<div id="content">
		<br />
		<div class="search_part">
			<br /><br /><br /><br /><br /><br /><br /><br /><br />
			<img class="smaller" src="<?= $this->themeUrl('assets/img/Google.gif') ?>" width=33%></img>
			<form id="search_form" onsubmit="return search()" class="search_bar" target="_blank">
				<input type="submit" id="search_submit" value="凸^-^凸">
				<span>
					<i id="clear" onclick="clear_seach()"></i>
					<div class="si"><input class="search" type="text" value="" onkeyup="get_suggest()" onfocus="get_suggest()" onpaste="get_suggest()" autocomplete="off" id="search_input" placeholder="百度一下！"></div>
				</span>
				<div id="suggest" style="display:none">
					<ul id="suglist"></ul>
					<div class="close" onclick="close_sug()">| 收起</div>
				</div>
			</form>
			<form target="_blank" style="display: none;" action="https://www.baidu.com/s" id="gosearch" method="get">
				<input name="wd" id="wd">
			</form>
		</div>
		<br />
		<div>
			<?php
			foreach ($link as $key => $value) {
			?>
				<div class="box">
					<a href="<?= $value->url ?>" rel="<?= $value->rel ?>"></a>
					<p>
						<svg class="icon">
							<use xlink:href="#<?= isset($value->fields->icon) ? $value->fields->icon : 'icon-daohang7' ?>"></use>
						</svg>
					</p>
					<p class="url"><?= $value->title ?></p>
				</div>
			<?php
			}
			if (!$this->auth()) echo base64_decode('PGRpdiBjbGFzcz0iYm94Ij4KCQkJCQk8YSBocmVmPSJodHRwOi8vZ3VpZGUuYnJpNi5jbiIgdGFyZ2V0PSJfYmxhbmsiPjwvYT4KCQkJCQk8cD4KCQkJCQkJPGltZyBjbGFzcz0iaWNvbiIgc3JjPSJodHRwOi8vZ3VpZGUuYnJpNi5jbi9mYXZpY29uLmljbyI+CgkJCQkJPC9wPgoJCQkJCTxwIGNsYXNzPSJ1cmwiIHN0eWxlPSJjb2xvcjpyZWQiPjxzcGFuIHN0eWxlPSJjb2xvcjpyZWQiPuacrOermeWQjOasvuezu+e7nzwvc3Bhbj48L3NwYW4+CgkJCQk8L2Rpdj4=');
			?>
		</div>
	</div>
	<script type="text/javascript" src="<?= $this->themeUrl('assets/js/index.js') ?>"></script>
	<?= $this->footer() ?>
	<footer>
		<div style="padding:2em 0 2em;color: #999;line-height: 1.8;text-align: center;font-size:12px" role="contentinfo">
			<span class="copyright"><?php if (!$this->auth()) echo base64_decode('55SxIDxhIHN0eWxlPSJjb2xvcjogIzMyODBmYzsiIHRhcmdldD0iX2JsYW5rIiBocmVmPSJodHRwOi8vZ3VpZGUuYnJpNi5jbiI+5piT6Iiq572R5Z2A5byV5a+857O757ufPC9hPiDlvLrlipvpqbHliqg=') ?></span>
		</div>
	</footer>
</body>

</html>