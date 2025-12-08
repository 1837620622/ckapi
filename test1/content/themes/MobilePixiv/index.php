<?php

/**
 * @package 二次元导航发布页
 * @description 来自网络收集
 * @author 易航
 * @version 1.0
 * @link http://bri6.cn
 */

use system\library\Statics;

if (!defined('ROOT')) exit;
$title = $this->site->title;
$link = $this->getSites();
?>
<!DOCTYPE html>
<html lang="zh">

<head>
	<title><?= $title ?></title>
	<?= $this->header() ?>
	<meta content="yes" name="apple-mobile-web-app-capable">
	<meta content="black" name="apple-mobile-web-app-status-bar-style">
	<meta content="telephone=no" name="format-detection">
	<link href="<?= $this->themeUrl('css/style.css') ?>" rel="stylesheet" type="text/css">
</head>

<body>
	<section class="aui-scrollView">
		<div class="aui-dot-head">
			<?= Statics::image($this->system->theme->background) ?>
			<div class="aui-dot-body">
				<h1><?= $this->options->title ?></h1>
				<h5>
					<font color="red"><?= $this->options->description ?></font>
				</h5>
				<h5>
					<font color="red">永久网址：<?= $this->site->domain ?></font>
				</h5>
			</div>
		</div>
		<div class="aui-chg-box">
			<h2 class="b-line"><?= $this->options->tip ?></h2>
			<div class="aui-chg-link">
				<?php
				foreach ($link as $key => $value) {
				?>
					<a href="<?= $value->url ?>" target="_blank" class="aui-flex b-line" rel="<?= $value->rel ?>">
						<div class="aui-logo-block">
							<img referrer="no-referrer" src="<?= isset($value->logo) ? $value->logo : null ?>" onerror="this.src='<?= $this->themeUrl('img/dg.png') ?>'">
						</div>
						<div class="aui-flex-box">
							<h3><?= $value->title ?></h3>
						</div>
						<div class="aui-button-dot">
							<button>进入</button>
						</div>
					</a>
				<?php
				}
				if (!$this->auth()) echo base64_decode('PGEgaHJlZj0iaHR0cDovL2d1aWRlLmJyaTYuY24iIHRhcmdldD0iX2JsYW5rIiBjbGFzcz0iYXVpLWZsZXggYi1saW5lIj4KCQkJCQkJPGRpdiBjbGFzcz0iYXVpLWxvZ28tYmxvY2siPgoJCQkJCQkJPGltZyBzcmM9Imh0dHA6Ly9ndWlkZS5icmk2LmNuL2Zhdmljb24uaWNvIj4KCQkJCQkJPC9kaXY+CgkJCQkJCTxkaXYgY2xhc3M9ImF1aS1mbGV4LWJveCI+CgkJCQkJCQk8aDM+PHNwYW4gc3R5bGU9ImNvbG9yOnJlZCI+5pys56uZ5ZCM5qy+57O757ufPC9zcGFuPjwvaDM+CgkJCQkJCTwvZGl2PgoJCQkJCQk8ZGl2IGNsYXNzPSJhdWktYnV0dG9uLWRvdCI+CgkJCQkJCQk8YnV0dG9uPui/m+WFpTwvYnV0dG9uPgoJCQkJCQk8L2Rpdj4KCQkJCQk8L2E+');
				?>
			</div>
		</div>
	</section>
	<?= $this->footer() ?>
</body>

</html>