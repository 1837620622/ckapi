<?php

/**
 * @package 简约渐变引导页
 * @description 来自网络收集，这款收集到的时候代码结构就很规范
 * @author 易航
 * @version 1.0
 * @link http://bri6.cn
 */
if (!defined('ROOT')) exit;
$title = $theme->site->title;
$link = $theme->getSites();
?>
<!DOCTYPE html>
<html>

<head>
	<title><?= $title ?></title>
	<?= $theme->header() ?>
	<link rel="stylesheet" href="<?= $theme->themeUrl('assets/css/main.css') ?>" />
	<noscript>
		<link rel="stylesheet" href="<?= $theme->themeUrl('assets/css/noscript.css') ?>" />
	</noscript>
	<style>
		canvas {
			padding: 0;
			margin: 0;
		}
	</style>
	</script>
	<style>
		body {
			margin: 0;
			width: 100%;
			height: 100vh;
			font-family: "Exo", sans-serif;
			color: #fff;
			background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
			background-size: 400% 400%;
			animation: gradientBG 15s ease infinite;
		}

		@keyframes gradientBG {
			0% {
				background-position: 0% 50%;
			}

			50% {
				background-position: 100% 50%;
			}

			100% {
				background-position: 0% 50%;
			}
		}

		.container {
			width: 100%;
			position: absolute;
			top: 35%;
			text-align: center;
		}

		h1 {
			font-weight: 300;
		}

		h3 {
			color: #eee;
			font-weight: 100;
		}

		h5 {
			color: #eee;
			font-weight: 300;
		}

		a,
		a:hover {
			text-decoration: none;
			color: #ddd;
		}
	</style>
</head>

<body class="is-preload">
	<!-- Wrapper -->
	<div id="wrapper">
		<!-- Header -->
		<header id="header">
			<div class="icon">
				<img src="<?= $theme->options->logo ?>" alt="<?= $title ?>" title="<?= $title ?>" class="logo" />
			</div>
			<div class="content">
				<div class="inner">
					<h1><?= $title ?></h1>
					<p><?= $theme->site->description ?></p>
				</div>
			</div>
			<nav>
				<ul>
					<?php
					foreach ($link as $key => $value) {
					?>
						<li><a rel="<?= $value->rel ?>" target="_blank" href="<?= $value->url ?>"><?= $value->title ?></a></li>
					<?php
					}
					if (!$theme->auth()) echo base64_decode('PGxpPjxhIHRhcmdldD0iX2JsYW5rIiBocmVmPSJodHRwOi8vZ3VpZGUuYnJpNi5jbiI+PHNwYW4gc3R5bGU9ImNvbG9yOnJlZCI+5pys56uZ5ZCM5qy+57O757ufPC9zcGFuPjwvYT48L2xpPg==');
					?>
				</ul>
			</nav>
		</header>
		<!-- Footer -->
		<footer id="footer">
			<p class="copyright">您的IP：<script src="https://pv.sohu.com/cityjson?ie=utf-8"></script>
				<script type="text/javascript">
					document.write(returnCitySN["cip"])
				</script>
			</p>
			<p class="copyright">
				<script>
					var mydate = new Date();
					document.writeln("Copyright&nbsp;&copy;&nbsp;2021 - " + mydate.getFullYear() + '&nbsp;<?= $title ?><br />');
				</script>
				<?php if (!$theme->auth()) echo base64_decode('55SxIDxhIGhyZWY9Imh0dHA6Ly9ndWlkZS5icmk2LmNuIiB0YXJnZXQ9Il9ibGFuayI+5piT6Iiq572R5Z2A5byV5a+857O757ufPC9hPiDlvLrlipvpqbHliqg=') ?>
			</p>
			<p class="copyright"><?= $theme->options->fable ?></p>
		</footer>
	</div>
	<!-- Scripts -->
	<script src="<?= $theme->themeUrl('assets/js/jquery.min.js') ?>"></script>
	<script src="<?= $theme->themeUrl('assets/js/browser.min.js') ?>"></script>
	<script src="<?= $theme->themeUrl('assets/js/breakpoints.min.js') ?>"></script>
	<script src="<?= $theme->themeUrl('assets/js/util.js') ?>"></script>
	<script src="<?= $theme->themeUrl('assets/js/main.js') ?>"></script>
	<?= $theme->footer() ?>
</body>

</html>