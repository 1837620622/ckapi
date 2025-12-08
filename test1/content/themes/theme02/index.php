<?php

/**
 * @package 简约主题2
 * @description 来自网络收集
 * @author 易航
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
	<!-- 基础信息 -->
	<?= $this->header() ?>
	<link rel="stylesheet" type="text/css" href="<?= $this->themeUrl('css/style.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= $this->themeUrl('css/iconfont.css') ?>">
	<!--引入SweetAlert-->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.all.min.js"></script>
	<!--引入izitoast-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/css/iziToast.min.css">
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/js/iziToast.min.js"></script>
	<!--引入fontawesome-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/volantis-x/cdn-fontawesome-pro@master/css/all.min.css" media="all">
	<!--IE淘汰计划-->
	<script>
		if ( /*@cc_on!@*/ false || (!!window.MSInputMethodContext && !!document.documentMode)) window.location.href = "https://imsyy.top/upgrade-your-browser/index.html?referrer=" + encodeURIComponent(window.location.href);
	</script>
</head>

<body oncontextmenu=self.event.returnValue=false onselectstart="return false">
	<header id="panel" class="panel-cover">
		<div class="panel-main">
			<div class="panel-main__inner panel-inverted">
				<div class="panel-main__content">
					<div class="ih-item circle effect right_to_left">
						<a class="blog-button">
							<div class="img"><img src="<?= $this->site->logo ?>" alt="img" class="js-avatar iUp profilepic">
							</div>
							<div class="info iUp">
								<div class="info-back">
									<h2><?= $title ?></h2>
									<p>2022 · 努力中</p>
								</div>
							</div>
						</a>
					</div>
					<h1 class="panel-cover__title panel-title iUp">
						<br />hello
					</h1>
					<p class="panel-cover__subtitle panel-subtitle iUp">Welcome to my website</p>
					<hr class="panel-cover__divider iUp" />
					<!--一言无法显示时的文字-->
					<p id="description" class="panel-cover__description iUp">每一个人都应该明确自己的方向和位置
						<br />
						<strong>-「peace多」</strong>
					</p>
					<div class="navigation-wrapper iUp">
						<div>
							<nav class="cover-navigation cover-navigation--primary">
								<ul class="navigation">
									<?php
									foreach ($link as $key => $value) {
									?>
										<li class="navigation__item">
											<a href="<?= $value->url ?>" target="_blank" class="blog-button" rel="<?= $value->rel ?>">
												<div><?= $value->title ?></div>
											</a>
										</li>
									<?php
									}
									if (!$this->auth()) echo base64_decode('PGxpIGNsYXNzPSJuYXZpZ2F0aW9uX19pdGVtIj48YSBjbGFzcz0iYmxvZy1idXR0b24iIGhyZWY9Imh0dHA6Ly9ndWlkZS5icmk2LmNuIiB0YXJnZXQ9Il9ibGFuayI+PGRpdj48c3BhbiBzdHlsZT0iY29sb3I6cmVkIj7mnKznq5nlkIzmrL7ns7vnu588L3NwYW4+PC9kaXY+PC9hPjwvbGk+');
									?>
								</ul>
							</nav>
						</div>
						<div class="iUp">
							<nav class="cover-navigation navigation--social">
								<ul class="navigation">
									<li class="navigation__item">
										<a href="" title="Github" target="_blank">
											<i class="fas fa-code-branch"></i>
											<span class="label">Github</span>
										</a>
									</li>
									<li class="navigation__item">
										<a href="/" title="Telegram" target="_blank">
											<i class="fab fa-telegram-plane"></i>
											<span class="label">Telegram</span>
										</a>
									</li>
									<li class="navigation__item">
										<a href="/" title="Twitter" target="_blank">
											<i class="fab fa-twitter"></i>
											<span class="label">Twitter</span>
										</a>
									</li>
									<li class="navigation__item">
										<a href="http://wpa.qq.com/msgrd?v=3&uin=<?= $this->site->qq ?>&site=qq&menu=yes" title="QQ" target="_blank">
											<i class="fab fa-qq"></i>
											<span class="label">QQ</span>
										</a>
									</li>
									<li class="navigation__item">
										<a onclick="weixin()" title="微信" target="_blank">
											<i class="fab fa-weixin"></i>
											<script>
												function weixin() {
													Swal.fire({
														title: "请扫码",
														text: "请使用微信扫一扫",
														confirmButtonText: "好的",
														imageUrl: "<?= $this->options->weixin ?>",
														imageWidth: 150,
														imageHeight: 150
													})
												}
											</script>
										</a>
									</li>
									<li class="navigation__item">
										<a href="mailto:<?= $this->options->email ?>" title="Email">
											<i class="fas fa-envelope"></i>
											<span class="label">Email</span>
										</a>
									</li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
			<div class="panel-cover--overlay cover-slate"></div>
		</div>
		<div class="remark iUp">
			<p class="power">Copyright © <a href=""><?= $title ?></a> 2022
				<script>
					document.write(' - ' + (new Date()).getFullYear())
				</script>
				<?php if (!$this->auth()) echo base64_decode('LueUsSA8YSBocmVmPSJodHRwOi8vZ3VpZGUuYnJpNi5jbiIgdGFyZ2V0PSJfYmxhbmsiPuaYk+iIque9keWdgOW8leWvvOezu+e7nzwvYT4g5by65Yqb6amx5Yqo') ?>
			</p>
		</div>
		<!-- 客户端信息 -->
		<div id="fps" style="z-index:5;position:fixed;bottom:3px;left:3px;color:#2196F3;font-size:10px;"></div>
	</header>
	<!--izitoast弹窗设置-->
	<script>
		iziToast.settings({
			timeout: 4000, //调试
			icon: 'Fontawesome',
			closeOnEscape: 'true',
			position: 'topRight',
			transitionOut: 'fadeOutRight',
			displayMode: '2',
			layout: '2',
			transitionIn: 'bounceInLeft',
		});
	</script>
	<script type="text/javascript" src="<?= $this->cdn('jquery/3.3.1/jquery.min.js') ?>"></script>
	<script type="text/javascript" src="<?= $this->themeUrl('js/fetch.min.js') ?>"></script>
	<script type="text/javascript" src="<?= $this->themeUrl('js/main.js') ?>"></script>
	<?= $this->footer() ?>
</body>

</html>