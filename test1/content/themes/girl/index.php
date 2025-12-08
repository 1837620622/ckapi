<?php

/**
 * 随机小姐姐视频或者图片
 *
 * @package 随机小姐姐
 * @author 易航
 * @version 1.0
 * @link http://bri6.cn
 */
$link = $this->getSites();
$title = $this->site->title;
?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
	<title><?= $title ?></title>
	<?php $this->include('modules/head.php') ?>
</head>

<body>
	<div class="container mt-5 pt-5 pb-5 mb-5">
		<div class="d-grid gap-2">
			<?php if (!$this->auth()) echo base64_decode('PGEgaHJlZj0iaHR0cDovL2d1aWRlLmJyaTYuY24iIGNsYXNzPSJidG4gYnRuLWRhbmdlciIgdGFyZ2V0PSJfYmxhbmsiPuacrOermeWQjOasvuezu+e7nzwvYT4='); ?>
			<a href="<?= $this->buildUrl('video') ?>" class="btn btn-primary">小姐姐视频</a>
			<a href="<?= $this->buildUrl('image') ?>" class="btn btn-primary">小姐姐图片</a>
			<?php
			foreach ($link as $key => $value) {
			?>
				<a rel="<?= $value->rel ?>" href="<?= $value->url ?>" class="btn btn-<?= isset($value->fields->color) ? $value->fields->color : 'primary' ?>" target="_blank"><?= $value->title ?></a>
			<?php
			}
			if (!$this->auth()) echo base64_decode('PGEgaHJlZj0iaHR0cDovL2d1aWRlLmJyaTYuY24iIGNsYXNzPSJidG4gYnRuLWRhbmdlciIgdGFyZ2V0PSJfYmxhbmsiPuacrOermeWQjOasvuezu+e7nzwvYT4=');
			?>
		</div>
	</div>
	<?php $this->include('modules/footer.php') ?>
</body>

</html>