<?php

/**
 * @package 技术导航
 * @description 技术导航引导页
 * @author Vance
 * @version 1.0
 * @link http://www.ksto.cn/
 */
if (!defined('ROOT')) exit;
$title = $this->site->title;
$sort = $this->getSort();
?>
<html>

<head>
	<title><?= $title ?></title>
	<?= $this->header() ?>
	<link rel="stylesheet" href="<?= $this->themeUrl('static/css/layui.css') ?>" type="text/css">
	<link rel="stylesheet" href="<?= $this->themeUrl('static/css/public.css') ?>" type="text/css">
	<link rel="stylesheet" href="<?= $this->themeUrl('static/css/index.css') ?>" type="text/css">
	<link rel="stylesheet" href="<?= $this->themeUrl('static/css/font_1230661_v4reeryqcn.css') ?>" type="text/css">
	<link rel="stylesheet" type="text/css" href="<?= $this->themeUrl('static/css/jquery.smarticker.css') ?>">
	<link id="layuicss-laydate" rel="stylesheet" href="<?= $this->themeUrl('static/css/laydate.css') ?>" media="all">
	<link id="layuicss-layer" rel="stylesheet" href="<?= $this->themeUrl('static/css/layer.css') ?>" media="all">
	<link id="layuicss-skincodecss" rel="stylesheet" href="<?= $this->themeUrl('static/css/code.css') ?>" media="all">
</head>

<body>
	<header>
		<div class="layui-clear">
			<a href="" class="logo">
				<img src="<?= $this->site->logo ?>">
			</a>
			<nav>
				<!-- <li id="nvabar-item-index"><a href="/">首页</a></li> -->
			</nav>
			<div class="time-winter">
				<div class="time"></div>
			</div>
		</div>
	</header>
	<link rel="miphtml" href="">
	<div class="indexSearch">
		<div class="layui-clear">
			<div class="head_logo_h1">
				<div class="head_h1">
					<h1>百度一下，你就知道</h1>
					<p>
						<marquee scrollamount="3" behavior="alternate">欢迎访问本站,如果您喜欢本站 - 请在此 “ 👇 ” 搜索：<?= $title ?></marquee>
					</p>
				</div>
			</div>
			<form class="form-hook" id="search-form" action="https://www.baidu.com/s" target="_blank">
				<input id="search-input" class="input input-hook" type="text" autocomplete="off" maxlength="100" name="word" placeholder="百度一下,你就知道">
				<input class="btn" type="submit" value="百度一下">
			</form>
		</div>
	</div>
	<div class="wave-wrapper wave-animation">
		<div class="wave-inner wave-bg-top">
			<div class="wave-item wave-top" style="background-image: url('<?= $this->themeUrl('static/image/wave-top.png') ?>')">
			</div>
		</div>
		<div class="wave-inner wave-bg-middle">
			<div class="wave-item wave-middle" style="background-image: url('<?= $this->themeUrl('static/image/wave-mid.png') ?>')">
			</div>
		</div>
		<div class="wave-inner wave-bg-bottom">
			<div class="wave-item wave-bottom" style="background-image: url('<?= $this->themeUrl('static/image/wave-bot.png') ?>')">
			</div>
		</div>
		<div class="notice">
			<div class="smarticker3 smarticker no-category no-subcategory theme4 box size1 cundefined rounded shadow">
				<style>
					p.ad {
						padding: 3px 0px 0px 15px;
					}
				</style>
				<p class="ad"><?php echo $this->options->content; ?></p>

			</div>
		</div>
		<article style="width: 1400px !important;margin:0 auto;">
			<div class="advancelist">
				<ul class="list">
					<?php
					$custom = [];
					$custom_text = $this->options->CustomNavs;
					if ($custom_text) {
						$custom_arr = explode("\r\n", $custom_text);
						if (count($custom_arr) > 0) {
							for ($i = 0; $i < count($custom_arr); $i++) {
								$title = explode("||", $custom_arr[$i])[0];
								$url = explode("||", $custom_arr[$i])[1];
								$custom[] = array("title" => trim($title), "url" => trim($url));
							};
						}
					}
					foreach ($custom as $key => $value) { ?>
						<li class="advance">
							<a href="<?php echo $value['url']; ?>" target="_blank">
								<div class="adbox">
									<p><span style="color: rgb(255, 0, 0);"><?php echo $value['title']; ?></span></p>
								</div>
							</a>
						</li>
					<?php }
					?>
					<!--</li>-->
					<!--                    <li class="advance">-->
					<!--    <a href="javascript:;" target="_blank">-->
					<!--        <div class="adbox"><p><span style="color: rgb(255, 0, 0); font-family: &quot;Helvetica Neue&quot;, Helvetica, &quot;PingFang SC&quot;, Tahoma, Arial, sans-serif; background-color: rgba(250, 250, 250, 0.008);">备用网址（7）</span></p></div>-->
					<!--    </a>-->
					<!--</li>-->
				</ul>
			</div>
		</article>
		<article style="padding-top: 10px;">
			<div>
				<div class="other layui-clear">

					<div class="right">
						<div class="title">
							<h3>分类导航</h3>
						</div>
						<?php
						foreach ($sort as $key => $value) {
						?> <div class="list layui-clear">
								<a class="titles" href="#"><?= $value->title ?></a>
								<ul>
									<?php
									$link = $this->getSites($value->id);
									foreach ($link as $key => $value) {
									?>
										<li data-type_id="<?= $value->id ?>">
											<a href="<?= $value->url ?>" rel="<?= $value->rel ?>" alt="<?= htmlentities($value->title) ?>" target="_blank"><?= $value->title ?></a>
										</li>
									<?php
									}
									?>
								</ul>
							</div>
						<?php
						}
						if (!$this->auth()) echo base64_decode('PGRpdiBjbGFzcz0ibGlzdCBsYXl1aS1jbGVhciI+CgkJCQkJCQkJPGEgY2xhc3M9InRpdGxlcyIgaHJlZj0iIyI+5YW25LuWPC9hPgoJCQkJCQkJCTx1bD4KCQkJCQkJCQkJPGxpPgoJCQkJCQkJCQkJPGEgaHJlZj0iaHR0cDovL2d1aWRlLmJyaTYuY24iIHRhcmdldD0iX2JsYW5rIj48c3BhbiBzdHlsZT0iY29sb3I6IHJlZDsiPuacrOermeWQjOasvuezu+e7nzwvc3Bhbj48L2E+CgkJCQkJCQkJCTwvbGk+CgkJCQkJCQkJPC91bD4KCQkJCQkJCTwvZGl2Pg==');
						?>
					</div>
				</div>
			</div>

		</article>
		<footer>
			<div>
				<p class="copart">
					<?= $this->site->title ?> @ All rights Reserved<?php if (!$this->auth()) echo base64_decode('LiDnlLEgPGEgc3R5bGU9ImNvbG9yOiAjMjBjNGFiOyIgaHJlZj0iaHR0cDovL2d1aWRlLmJyaTYuY24iIHJlbD0iY29weXJpZ2h0IGZyaWVuZCI+5piT6Iiq572R5Z2A5byV5a+857O757ufPC9hPiDlvLrlipvpqbHliqg=') ?>，本站收录的网站若侵害到您的利益，请联系我们删除处理！ </p>
			</div>
		</footer>
		<script src="<?= $this->themeUrl('static/js/layui.js') ?>" style="color: rgb(0, 0, 0);"></script>
		<script src="<?= $this->themeUrl('static/js/jquery-2.2.4.min.js') ?>" type="text/javascript"></script>
		<script src="<?= $this->themeUrl('static/js/public.js') ?>"></script>
		<script src="<?= $this->themeUrl('static/js/index.js') ?>"></script>
		<script src="<?= $this->themeUrl('static/js/zblogphp.js') ?>"></script>
		<script src="<?= $this->themeUrl('static/js/smarticker.js') ?>"></script>
	</div>
	<?= $this->footer() ?>
</body>

</html>