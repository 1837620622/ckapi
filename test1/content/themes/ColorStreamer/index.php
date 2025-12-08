<?php

/**
 * @package 彩色流光
 * @description 来自网络收集
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
<html lang="zh">

<head>
	<meta name="sogou_site_verification" content="q50guNJF5S" />
	<title><?= $title ?></title>
	<meta name="keywords" content="<?= $this->site->keywords ?>">
	<meta name="description" content="<?= $description ?>">
	<?= $this->header() ?>
	<link rel="stylesheet" type="text/css" href="<?= $this->themeUrl('assets/css/h.9c69ed6c.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= $this->themeUrl('assets/css/nekotora.99cf6f8c.css') ?>">
	<style>
		.find .links .item span {
			/* overflow: hidden; */
			white-space: nowrap;
			text-overflow: ellipsis;
		}
	</style>
	<script async src=""></script>
	<script>
		function a() {
			dataLayer.push(arguments)
		}
		window.dataLayer = window.dataLayer || [], a("js", new Date), a("config", "UA-137340638-1");
	</script>
</head>

<body>

	<nav style="display: none;">
		<a href="http://wall.52yimen.cn/">峰峰二中表白墙</a>
		<a href="http://note.youdao.com/s/dbI5ol3T">峰峰二中影视站</a>
		<a href="http://me.52yimen.cn/">个人介绍</a>
		<a href="https://jq.qq.com/?_wv=1027&k=NY3NwOLE">QQ群</a>
	</nav>

	<body data-phone-cc-input="1">

		<body>
			<!-- <link href="css/toastr.css" rel="stylesheet"> -->
			<!-- <link href="css/style.css" rel="stylesheet"> -->
			<!-- <link href="css/toastr.min.css" rel="stylesheet"> -->
			<!-- <script src="js/toastr.min.js"></script> -->
			<style>
				.toast-bottom-center {
					position: absolute;
					left: 30px;
					right: 10px;
					top: 20px;
				}
			</style>

			<div class="background">
				<canvas id="startrack"></canvas>
				<div class="cover"></div>
			</div>
			<div class="main">
				<div class="ch intro">
					<div class="container">
						<div class="hello">
							<h1 id="slogan">思考中...</h1>
							<h2>
								<div class="circle"> <span></span> <span></span>
									<span></span>
								</div><?= $title ?>
							</h2>
						</div>
					</div>
				</div>
				<div class="ch about">
					<div class="container">
						<h2 class="chtitle"><?= $title ?></h2>
						<div class="clear">
							<div class="introduct">
								<img class="avatar"  referrer="no-referrer" src="<?= $this->themeUrl('assets/images/zhaoxi.jpg') ?>">
								<?= $description ?>
							</div>
							<ul class="skill clear">
								<li>
									<p>HTML5/CSS3</p>
									<div class="progress">
										<div style="width:30%;"></div>
										<span>制作网站程度的能力</span>
									</div>
								</li>
								<li>
									<p>JavaScript/Typescript</p>
									<div class="progress">
										<div style="width:55%;"></div>
										<span>使用现代轮子程度的能力</span>
									</div>
								</li>
								<li>
									<p>PHP</p>
									<div class="progress">
										<div style="width:30%;"></div>
										<span>赞美最好的语言程度的能力</span>
									</div>
								</li>
								<li>
									<p>数字设计</p>
									<div class="progress">
										<div style="width:80%;">
										</div><span>让自己舒服程度的能力</span>
									</div>
								</li>
								<li>
									<p>世界</p>
									<div class="progress">
										<div style="width:20%;"></div>
										<span>观测世界程度的能力</span>
									</div>
								</li>
								<li>
									<p>搞事情</p>
									<div class="progress">
										<div style="width:82%;"></div>
										<span>让事情发生程度的能力</span>
									</div>
								</li>
								<li>
									<p>魔法</p>
									<div class="progress">
										<div style="width:90%;"></div>
										<span>和普通人相同程度的能力</span>
									</div>
								</li>
								<li>
									<p>MoePower</p>
									<div class="progress">
										<div style="width:99%;"></div>
										<span>成为萌二程度的能力</span>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="find ch">
					<div class="container links">
						<h2 class="chtitle">我生活的<span>地方</span></h2>
						<div class="clear">
							<?php
							foreach ($link as $key => $value) {
							?>
								<a href="<?= $value->url ?>" target="_blank" rel="<?= $value->rel ?>">
									<div class="item">
										<div class="bg" style="background-color:<?= isset($value->fields->color) ? $value->fields->color : '#0f88eb' ?>"></div>
										<div class="inner"><i class="<?= isset($value->fields->icon) ? $value->fields->icon : null ?>"></i>
											<span><?= $value->title ?></span>
										</div>
									</div>
								</a>
							<?php
							}
							?>
							<!-- <a href="https://jq.qq.com/?_wv=1027&k=aOfnapLc" target="_blank">
								<div class="item">
									<div class="bg" style="background-color:#28a9e0"></div>
									<div class="inner"> <i class="icon-qq"></i>
										<span>QQ</span>
									</div>
								</div>
							</a> -->
						</div>
					</div>
				</div>
				<div class="gate ch" style="display: none;">
					<div class="container links">
						</li> <a href="http://wall.52yimen.cn/">峰峰二中表白墙</a>
						<a href="http://note.youdao.com/s/dbI5ol3T">峰峰二中影视站</a>
						<a href="http://www.52yimen.cn/">忆梦</a>
						<a href="https://jq.qq.com/?_wv=1027&k=NY3NwOLE">官方QQ群</a>
						</ul>
					</div>
				</div>
			</div>

			<div class="footer ch">
				<div class="container">
					<h3>倚梦清风</h3>
					<p>蘑菇森林的尽头，新世界的起点</p>
					<p class="c">© 2021-2023 <a href="<?= $this->site->url ?>"><?= $title ?></a> All Rights Reserved<?php if (!$this->auth()) echo base64_decode('LiDnlLEgPGEgcmVsPSJjb3B5cmlnaHQiIGhyZWY9Imh0dHA6Ly9ndWlkZS5icmk2LmNuIj7mmJPoiKrnvZHlnYDlvJXlr7zns7vnu588L2E+IOW8uuWKm+mpseWKqA==') ?></p>
				</div>
			</div>
			</div>
			<script src="<?= $this->themeUrl('assets/js/page.3a0791a3.js') ?>"></script>
			<!-- <script type="text/javascript" src="js/stats.js" charset="UTF-8"></script> -->
		</body>

</html>