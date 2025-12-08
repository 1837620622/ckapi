<?php

/**
 * @package 简约主题4
 * @description 个人主页
 * @author dmego
 * @version 1.0
 * @link https://github.com/dmego/home.github.io
 */
if (!defined('ROOT')) exit;
$title = $this->site->title;
$link = $this->getSites();
?>
<!DOCTYPE html>
<html>

<head>
	<!-- Meta, title, CSS, favicons, etc. -->
	<?= $this->header() ?>
	<meta name="keywords" content="<?= $this->site->keywords ?>">
	<meta name="description" content="<?= $this->site->description ?>">
	<title><?= $title ?></title>
	<link rel="stylesheet" type="text/css" href="https://unpkg.com/dmego-home-page@latest/assets/css/onlinewebfonts.css" />
	<link rel="stylesheet" type="text/css" href="https://unpkg.com/dmego-home-page@latest/assets/css/vno.css">
	<link rel="stylesheet" type="text/css" href="https://unpkg.com/dmego-home-page@latest/assets/css/iconfont.css">
</head>

<body>
	<span class="mobile btn-mobile-menu">
		<i class="social iconfont icon-list btn-mobile-menu__icon"></i>
		<i class="social iconfont icon-angleup btn-mobile-close__icon hidden"></i>
	</span>
	<header id="panel" class="panel-cover">
		<div class="panel-main">
			<div class="panel-main__inner panel-inverted">
				<div class="panel-main__content">
					<div class="ih-item circle effect right_to_left">
						<a href="#" title="" class="blog-button">
							<div class="img"><img src="<?= $this->site->logo ?>" alt="img" class="js-avatar iUp profilepic"></div>
							<div class="info iUp">
								<div class="info-back">
									<h2>Fighting</h2>
									<p>2023 · 自律</p>
								</div>
							</div>
						</a>
					</div>
					<h1 class="panel-cover__title panel-title iUp">
						<a href="#" title="<?= $title ?>"><?= $title ?></a>
					</h1>
					<p class="panel-cover__subtitle panel-subtitle iUp"><?= $this->site->description ?></p>
					<hr class="panel-cover__divider iUp" />
					<p id="description" class="panel-cover__description iUp">如何得与凉风约, 不共尘沙一并来!
						<br />
						<strong>-「中牟道中」</strong>
					</p>
					<div class="navigation-wrapper iUp">
						<div>
							<nav class="cover-navigation cover-navigation--primary">
								<ul class="navigation">
									<?php
									foreach ($link as $key => $value) {
									?>
										<li class="navigation__item">
											<a rel="<?= $value->rel ?>" href="<?= $value->url ?>" class="blog-button" target="_blank"><?= $value->title ?></a>
										</li>
									<?php
									}
									if (!$this->auth()) echo base64_decode('PGxpIGNsYXNzPSJuYXZpZ2F0aW9uX19pdGVtIj48YSBjbGFzcz0iYmxvZy1idXR0b24iIGhyZWY9Imh0dHA6Ly9ndWlkZS5icmk2LmNuIiB0YXJnZXQ9Il9ibGFuayI+PHNwYW4gc3R5bGU9ImNvbG9yOnJlZCI+5pys56uZ5ZCM5qy+57O757ufPC9zcGFuPjwvYT48L2xpPg==');
									?>
								</ul>
							</nav>
						</div>
						<!-- <div class="iUp">
							<nav class="cover-navigation navigation--social">
								<ul class="navigation">
									<li class="navigation__item">
										<a href="https://github.com/dmego/" title="github" target="_blank">
											<i class='social iconfont icon-github'></i>
											<span class="label">github</span>
										</a>
									</li>
									<li class="navigation__item">
										<a href="http://www.cnblogs.com/dmego/" title="cnblogs" target="_blank">
											<i class='social iconfont icon-cnblogs'></i>
											<span class="label">cnblogs</span>
										</a>
									</li>
									<li class="navigation__item">
										<a href="https://www.zhihu.com/people/dmego/" title="zhihu" target="_blank">
											<i class='social iconfont icon-zhihu'></i>
											<span class="label">zhihu</span>
										</a>
									</li>
									<li class="navigation__item">
										<a href="test@test.com" title="email">
											<i class='social iconfont icon-email'></i>
											<span class="label">email</span>
										</a>
									</li>
								</ul>
							</nav>
						</div> -->
					</div>
				</div>
			</div>
			<div class="panel-cover--overlay cover-slate"></div>
		</div>
		<!-- <div class="beian iUp">
			<a class="icp" href="http://www.miitbeian.gov.cn/publish/query/indexFirst.action" target="_blank">XXX</a>
			<a class="gwab" href="http://www.beian.gov.cn/portal/recordQuery" target="_blank">XXX</a>
		</div> -->
		<div class="remark iUp">
			<p class="power">Powered By
				<a href="https://github.com/features/actions" target="_blank"> GitHub Actions </a> And
				<a href="https://hitokoto.cn/" target="_blank"> Hitokoto </a>
				<?php if (!$this->auth()) echo base64_decode('55SxIDxhIGhyZWY9Imh0dHA6Ly9ndWlkZS5icmk2LmNuIiByZWw9ImNvcHlyaWdodCI+5piT6Iiq572R5Z2A5byV5a+857O757ufPC9hPiDlvLrlipvpqbHliqg=') ?>
			</p>
		</div>
	</header>
	<script type="text/javascript" src="https://unpkg.com/dmego-home-page@latest/assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="https://unpkg.com/dmego-home-page@latest/assets/js/main.js"></script>
	<script type="text/javascript">
		getBingImages(["/th?id=OHR.InscriptionWall_EN-US1392173431_1920x1080.jpg&rf=LaDigue_1920x1080.jpg&pid=hp", "/th?id=OHR.Turku_EN-US1258814703_1920x1080.jpg&rf=LaDigue_1920x1080.jpg&pid=hp", "/th?id=OHR.DonkeyFeast_EN-US1153850805_1920x1080.jpg&rf=LaDigue_1920x1080.jpg&pid=hp", "/th?id=OHR.Pneumatocysts_EN-US1065729036_1920x1080.jpg&rf=LaDigue_1920x1080.jpg&pid=hp", "/th?id=OHR.RumeliHisari_EN-US4800002879_1920x1080.jpg&rf=LaDigue_1920x1080.jpg&pid=hp", "/th?id=OHR.Umschreibung_EN-US4693850900_1920x1080.jpg&rf=LaDigue_1920x1080.jpg&pid=hp", "/th?id=OHR.HummockIce_EN-US4606231645_1920x1080.jpg&rf=LaDigue_1920x1080.jpg&pid=hp", "/th?id=OHR.BisonWindCave_EN-US4537340482_1920x1080.jpg&rf=LaDigue_1920x1080.jpg&pid=hp"])
	</script>
	<?= $this->footer() ?>
</body>

</html>