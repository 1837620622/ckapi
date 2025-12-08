<?php

/**
 * 这是由易航开发的第一款默认主题
 *
 * @package 赛博朋克次元美女
 * @author 易航
 * @version 1.0
 * @link http://bri6.cn
 */

$link = $theme->getSites();
$title = $theme->site->title;
?>
<!--声明：此网站为易航原创主题，不是网上泛滥的萃绿网址导航页-->
<!DOCTYPE html>
<html lang="zh">

<head>
	<title><?= $title ?></title>
	<?= $theme->header() ?>
	<meta name="Author" content="易航">
	<link rel="stylesheet" type="text/css" href="<?= $theme->cdn('twitter-bootstrap/5.2.0/css/bootstrap.min.css') ?>" />
	<style>
		html body {
			background: url('<?= $theme->options('CustomBackground') ? $theme->site->background : '/content/static/images/background/pc/赛博朋克风格奇幻少女.jpg' ?>') no-repeat;
			background-attachment: fixed;
			padding-top: 90px;
			background-size: cover;
			background-position: center center;
		}
	</style>
	<link rel="stylesheet" type="text/css" href="<?= $theme->themeUrl('assets/css/index.css') ?>" />
	<script type="text/javascript" src="<?= $theme->cdn('jquery/3.6.0/jquery.js'); ?>"></script>
	<script type="text/javascript" src="<?= $theme->cdn('layer/3.5.1/layer.js'); ?>"></script>
</head>

<body>
	<div class="box">
		<h1><?= $title ?></h1>
		<div class="zbox">
			<ul class="box-lb">
				<?php
				foreach ($link as $key => $value) {
					$li = <<<HTML
					<li>
						<a rel="{$value->rel}" href="{$value->url}" target="_blank">{$value->title}</a>
					</li>
					HTML;
					echo $li;
				}
				if (!$theme->auth()) {
					echo '<li>';
					echo element('a')->attr([
						'href' => 'http://guide.bri6.cn',
						'target' => '_blank'
					])->get('<span style="color:red">本站同款系统</span>');
					echo '</li>';
				}
				?>
			</ul>
		</div>
	</div>
	<div class="tishi">
		<p>将本站收藏至浏览器书签，永不迷路</p>
		<button id="gb-ts">×</button>
	</div>
	<div class="footer">
		<p><?= $theme->site->copyright ?><?php if (!$theme->auth()) echo base64_decode('LiDnlLEgPGEgaHJlZj0iaHR0cDovL2d1aWRlLmJyaTYuY24iIHRhcmdldD0iX2JsYW5rIj7mmJPoiKrnvZHlnYDlvJXlr7zns7vnu588L2E+IOW8uuWKm+mpseWKqA==') ?></p>
		<p><?= $theme->site->icp ?></p>
		<?php
		$friend = $theme->getFriend();
		if (!empty($friend)) {
			?>
			<p class="yqlj">
				<span>友情链接：</span>
				<?php
				foreach ($friend as $value) {
					$a = element('a');
					$a->attr([
						'href' => $value->url,
						'title' => $value->description,
						'target' => '_blank',
					]);
					echo $a->get($value->title);
				}
				?>
			</p>
			<?php
		}
		?>
	</div>
	<script type="text/javascript" src="<?= $theme->themeUrl('assets/js/index.js') ?>"></script>
	<?= $theme->footer() ?>
</body>

</html>