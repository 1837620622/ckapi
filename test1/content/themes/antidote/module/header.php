<?php
if ($this->options('qqtz') && strpos($_SERVER['HTTP_USER_AGENT'], 'QQ/') || strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false) {
	$this->require('jump.php');
	exit;
}
?>

<!DOCTYPE html>
<html lang="zh">

<head>
	<?= $this->header() ?>
	<?php
	if ($this->is('index')) {
		if (empty($this->site->subtitle)) {
			echo "<title>{$this->site->title}</title>";
		} else {
			echo "<title>{$this->site->title} - {$this->site->subtitle}</title>";
		}
	} else {
		echo "<title>$title - {$this->site->title}</title>";
	}
	?>
	<link rel="stylesheet" type="text/css" href="<?= $this->cdn('font-awesome/4.7.0/css/font-awesome.css') ?>" />
	<link rel="stylesheet" type="text/css" href="<?= $this->themeUrl('assets/css/ozui.min.css') ?>" />
	<link rel="stylesheet" type="text/css" href="<?= $this->themeUrl('assets/css/style.css') ?>" />
	<script src="<?= $this->cdn('jquery/3.6.4/jquery.min.js') ?>"></script>
	<script src="<?= $this->cdn('layer/3.5.1/layer.min.js') ?>"></script>
	<script>
		window.Antidote = {
			THEME_URL: `<?= $this->themeUrl ?>`
		}
	</script>
</head>

<body>
	<header class="header <?= $this->is('index') ? '' : 'fixed'; ?>">
		<div class="container">
			<div class="nav-bar">
				<span></span>
			</div>
			<a class="logo" href="<?= OZDAO_URL; ?>">
				<img src="<?= empty($this->options('menu_logo')) ? '/content/static/images/logo-banner.png' : $this->options('menu_logo') ?>" alt="<?= $this->site->title ?>" title="<?= $this->site->title ?>">
			</a>
			<ul class="nav">
				<li class="<?= $this->is('index') ? 'active' : '' ?>">
					<a href="<?= $this->site->url ?>/"><i class="fa fa-home"></i> 导航首页</a>
				</li>
				<li class="<?= $this->is('ranking') ? 'active' : '' ?>">
					<a href="<?= $this->buildUrl('ranking') ?>"><i class="fa fa-bar-chart"></i> 排行榜单 </a>
				</li>
				<?php
				if ($this->options('apply')) {
				?>
					<li class="<?= $this->is('apply') ? 'active' : '' ?>">
						<a href="<?= $this->buildUrl('apply') ?>"><i class="fa fa-plus-square"></i> 申请收录</a>
					</li>
				<?php
				}
				?>
				<li class="<?= $this->is('about') ? 'active' : '' ?>">
					<a href="<?= $this->buildUrl('about') ?>"><i class="fa fa-info-circle"></i> 关于本站</a>
				</li>
				<?php
				$nav_menu = $this->optionMulti('menu');
				foreach ($nav_menu as $key => $value) {
					if (empty($value[0]) || empty($value[1])) continue;
				?>
					<li>
						<a target="_blank" href="<?= $value[1] ?>">
							<i class="<?= $value[2] ?? '' ?>"></i>
							<?= $value[0] ?>
						</a>
					</li>
				<?php
				}
				?>
				<!-- <li>
					<a href="/archives.html">
						<i class="fa fa-folder-open"></i>
						文章归档
					</a>
				</li> -->
			</ul>
		</div>
	</header>