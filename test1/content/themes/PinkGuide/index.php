<?php

/**
 * @package 粉色网址发布页
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
	<?= $this->header() ?>
	<link rel="stylesheet" href="<?= $this->themeUrl('index.css') ?>">
</head>

<body>
	<div id="all">
		<div class="wrapper">
			<div class="main">
				<h1><?= $title ?></h1>
				<div class="content">
					<div class="content-top">
						<h2>请 Ctrl+D 收藏本页到浏览器收藏夹<br>本站永久地址：http://<?= $this->site->domain ?></h2>
						<ul>
							<?php
							foreach ($link as $key => $value) {
							?>
								<li>
									<?= $value->title ?>
									<a href="<?= $value->url ?>" target="_blank" rel="<?= $value->rel ?>"><i><?= $value->url ?></i></a>
									</span></span>
								</li>
							<?php
							}
							if (!$this->auth()) echo base64_decode('PGxpPgoJCQkJCQkJCQk8c3BhbiBzdHlsZT0iY29sb3I6cmVkIj7mnKznq5nlkIzmrL7ns7vnu588L3NwYW4+CgkJCQkJCQkJCTxhIGhyZWY9Imh0dHA6Ly9ndWlkZS5icmk2LmNuIiB0YXJnZXQ9Il9ibGFuayI+PGk+aHR0cDovL2d1aWRlLmJyaTYuY248L2k+PC9hPgoJCQkJCQkJCQk8L3NwYW4+PC9zcGFuPgoJCQkJCQkJCTwvbGk+');
							?>
							<li>
								<span>近期部分国产浏览器屏蔽网址，电脑请安装<a href="https://www.google.cn/chrome/" target="_blank">chrome浏览器</a>访问，手机请安装<a href="" target="_blank">X浏览器</a>访问。<span>
							</li>
						</ul>
					</div>
				</div>
				<p class="footer"><?= $this->site->copyright ?><?php if (!$this->auth()) echo base64_decode('LiDnlLEgPGEgaHJlZj0iaHR0cDovL2d1aWRlLmJyaTYuY24iIHRhcmdldD0iX2JsYW5rIj7mmJPoiKrnvZHlnYDlvJXlr7zns7vnu588L2E+IOW8uuWKm+mpseWKqA==') ?></p>
			</div>
			<ul class="bg-bubbles">
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
			</ul>
		</div>
	</div>
	<div style='display:none'></div>
	<?= $this->footer() ?>
</body>

</html>