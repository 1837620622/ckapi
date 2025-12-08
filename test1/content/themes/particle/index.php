<?php

/**
 * @package 科幻粒子
 * @description 这是一款由易航网络收集的科幻粒子引导页
 * @author 易航
 * @version 1.0
 * @link http://bri6.cn
 */
if (!defined('ROOT')) exit;
$title = $this->site->title;
$link = $this->getSites();
$friend = $this->getFriend();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title><?= $title ?></title>
	<?= $this->header() ?>
	<!-- 引入部分css -->
	<link rel="stylesheet" type="text/css" href="<?= $this->themeUrl('assets/css/normalize.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= $this->themeUrl('assets/css/demo.css') ?>">
	<!--必要样式-->
	<link rel="stylesheet" type="text/css" href="<?= $this->themeUrl('assets/css/component.css') ?>">
	<!--[if IE]><script src="<?= $this->themeUrl('assets/css/html5.js') ?>"></script><![endif]-->

	<style type="text/css">
		#Layer1 {
			position: absolute;
			width: 100%;
			z-index: 2;
			top: 60%;
		}

		.STYLE3 {
			font-size: medium
		}

		.footer {
			text-align: center;
			margin-top: 100px;
			position: relative;
			bottom: 10px;
		}
	</style>

</head>

<body>

	<div class="container demo-1">
		<div class="content">
			<div id="large-header" class="large-header" style="background-image: url(<?= $this->site->background ?>);">
				<canvas id="demo-canvas" width="1590" height="711"></canvas>
				<h1 class="main-title"><?= $title ?><br><span class="STYLE3"><?= $this->site->description ?></span></h1>
			</div>
			<div id="Layer1">
				<nav class="codrops-demos">
					<?php
					foreach ($link as $value) {
						$a = element('a');
						$a->attr([
							'href' => $value->url,
							'target' => '_blank',
							'rel' => $value->rel
						]);
						$a->innerHTML($value->title);
						echo $a->get();
					}
					if (!$this->auth()) {
						$a = element('a');
						$a->attr([
							'href' => 'http://guide.bri6.cn',
							'target' => '_blank'
						]);
						echo $a->get('<span style="color:red">本站同款系统</span>');
					}
					?>
				</nav>
				<!-- 底部 -->
				<div class="footer">
					<!-- 友情连接 -->
					<div>
						<nav class="codrops-demos">
							<?php
							foreach ($friend as $value) {
								$a = element('a');
								$a->attr([
									'href' =>  $value->url,
									'target' => '_blank'
								]);
								$a->innerHTML($value->title);
								echo $a->get();
							}
							?>
						</nav>
					</div>
					<!-- 备案号底部 -->
					<p><?= $this->site->copyright ?><?= $this->auth() ? null : base64_decode('LiDnlLEgPGEgaHJlZj0iaHR0cDovL2d1aWRlLmJyaTYuY24iIHRhcmdldD0iX2JsYW5rIj7mmJPoiKrnvZHlnYDlvJXlr7zns7vnu588L2E+IOW8uuWKm+mpseWKqA==') ?></p>
					<p><?= $this->site->icp ?></p>
				</div>
			</div>

		</div>
	</div>

	<!-- <script src="<?= $this->themeUrl('assets/js/ac.js') ?>"></script> -->
	<script src="<?= $this->themeUrl('assets/js/TweenLite.min.js') ?>"></script>
	<script src="<?= $this->themeUrl('assets/js/EasePack.min.js') ?>"></script>
	<script src="<?= $this->themeUrl('assets/js/rAF.js') ?>"></script>
	<script src="<?= $this->themeUrl('assets/js/demo-1.js') ?>"></script>
	<?= $this->footer() ?>
</body>

</html>