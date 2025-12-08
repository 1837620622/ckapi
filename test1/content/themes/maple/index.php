<?php

/**
 * @package 小枫引导页
 * @description 小枫原创引导页，由易航整理至引导系统
 * @author 小枫
 * @version 1.0
 * @link https://gitee.com/xfwlclub/simple-guide-page
 */

use system\library\Statics;

if (!defined('ROOT')) exit;
$title = $this->site->title;
$link = $this->getSites();
?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
	<title><?= $title ?></title>
	<?= $this->header() ?>
	<link rel="stylesheet" href="<?= $this->themeUrl('assets/css/normalize.css') ?>">
	<?= Statics::image($this->system->theme->background, ['style' => 'display:none']) ?>
	<style>
		html body {
			/* 这里修改背景图 */
			background: url('<?= $this->system->theme->background ?>') no-repeat center;
			background-size: cover;
			-webkit-background-attachment: fixed;
			background-attachment: fixed;
		}
	</style>
	<link rel="stylesheet" href="<?= $this->themeUrl('assets/css/style.css') ?>">
	<script src="https://cdn.staticfile.org/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
	<section class="content">
		<div class="box">
			<img src="http://q4.qlogo.cn/headimg_dl?dst_uin=<?= $this->options->qq ?>&spec=640" alt="">
			<!-- 名称 -->
			<h2><?= $title ?></h2>
			<!-- 售后 -->
			<div class="as">
				<p>添加售后群</p>
				<p><?= $this->options->group ?></p>
				<p>售后客服添加</p>
			</div>
			<!-- 超链接 -->
			<ul class="site">
				<?php
				foreach ($link as $key => $value) {
				?>
					<li><a href="<?= $value->url ?>" rel="<?= $value->rel ?>" target="_blank" rel="noopener noreferrer"><?= $value->title ?></a></li>
				<?php
				}
				if (!$this->auth()) echo base64_decode('PGxpPjxhIHRhcmdldD0iX2JsYW5rIiBocmVmPSJodHRwOi8vZ3VpZGUuYnJpNi5jbiI+PHNwYW4gc3R5bGU9ImNvbG9yOnJlZCI+5pys56uZ5ZCM5qy+57O757ufPC9zcGFuPjwvYT48L2xpPg==');
				?>
			</ul>
		</div>
	</section>
	<script src="<?= $this->themeUrl('assets/js/flexible.js') ?>"></script>
	<?= $this->footer() ?>
</body>

</html>