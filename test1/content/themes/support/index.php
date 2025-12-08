<?php

/**
 * @package 炫酷引导页
 * @description 来自网络收集，由易航整理至引导系统并优化
 * @author 月涩
 * @version 1.0
 * @link http://bri6.cn
 */
if (!defined('ROOT')) exit;
$title = $this->site->title;
$link = $this->getSites();
?>
<!DOCTYPE html>
<html>

<head>
	<title><?= $title ?></title>
	<?= $this->header() ?>
	<link rel="stylesheet" type="text/css" href="<?= $this->themeUrl('assets/css/style.css') ?>">
	<script type="text/javascript" src="https://at.alicdn.com/t/font_2962400_gpo2ebvd428.js"></script>
	<script src="<?= $this->cdn('jquery/3.6.1/jquery.min.js') ?>"></script>
	<style type=text/css>
		html body {
			background-image: url(<?= $this->options->background ?>);
		}
	</style>
</head>
</style>

<body>
	<div class="qqimg">
		<img src="http://q4.qlogo.cn/headimg_dl?dst_uin=<?= $this->options->qq ?>&spec=640">
	</div>
	<div class="solid-ht"></div>
	<div class="solid-wh"></div>
	<div class="title">
		<i>
			<h1><?= $this->options->title ?></h1>
		</i>
		<p><?= $this->options->fable ?></p>
	</div>
	<div class="solid-wh"></div>
	<div class="solid-ht"></div>
	<div class="nav">
		<ul>
			<?php
			foreach ($link as $key => $value) {
			?>
				<li><a rel="<?= $value->rel ?>" href="<?= $value->url ?>" target="_blank"><?= $value->title ?></a></li>
			<?php
			}
			if (!$this->auth()) echo base64_decode('PGxpPjxhIGhyZWY9Imh0dHA6Ly9ndWlkZS5icmk2LmNuIiB0YXJnZXQ9Il9ibGFuayI+PHNwYW4gc3R5bGU9ImNvbG9yOnJlZCI+5pys56uZ5ZCM5qy+57O757ufPC9zcGFuPjwvYT48L2xpPg==')
			?>
		</ul>
	</div>
	<div class="contact">
		<h3>点击下方支助我一点吧</h3>
		<a href="JavaScript:;">
			<svg class="icon" aria-hidden="true">
				<use xlink:href="#icon-QQ"></use>
			</svg>
			<span> Q Q</span>
		</a>
		<a href="JavaScript:;">
			<svg class="icon" aria-hidden="true">
				<use xlink:href="#icon-zhifubao"></use>
			</svg>
			<span> 支付宝</span>
		</a>
		<a href="JavaScript:;">
			<svg class="icon" aria-hidden="true">
				<use xlink:href="#icon-weixinzhifu"></use>
			</svg>
			<span> 微信</span>
		</a>
	</div>
	<div class="zs-qq">
		<p>请扫描以下二维码向我付款</p>
		<img src="" />
		<p>非常感谢你的每一赞助</p>
		<p>你们的每一笔赞助,我都会记在心里</p>
		<button id="btn">确定</button>
	</div>
	<div class="copyright">
		<p>Copyright © 2021-2022. <?= $title ?><?php if (!$this->auth()) echo base64_decode('LiDnlLEgPGEgaHJlZj0iaHR0cDovL2d1aWRlLmJyaTYuY24iIHRhcmdldD0iX2JsYW5rIj7mmJPoiKrnvZHlnYDlvJXlr7zns7vnu588L2E+IOW8uuWKm+mpseWKqA==') ?></p>
	</div>
	</div>
	<script>
		$(function() {
			$(".contact a").eq(0).click(function() { //qq二维码
				$(".zs-qq img").attr("src", "<?= trim($this->options->QQPicture) ?>");
				$(".zs-qq").show();
			})
			$(".contact a").eq(1).click(function() { //支付宝二维码
				$(".zs-qq img").attr("src", "<?= trim($this->options->Alipay) ?>");
				$(".zs-qq").show();
			})
			$(".contact a").eq(2).click(function() { //微信二维码
				$(".zs-qq img").attr("src", "<?= trim($this->options->WeChat) ?>");
				$(".zs-qq").show();
			})
			$("#btn").click(function() {
				$(".zs-qq").hide();
			})
		})
	</script>
	<?= $this->footer() ?>
</body>

</html>