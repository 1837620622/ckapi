<!DOCTYPE html>
<html lang="zh">

<head>
	<title>随机小姐姐图片 - <?= $this->site->title ?></title>
	<?php $this->include('modules/head.php') ?>
	<style>
		.main {
			align-items: center;
		}
	</style>
</head>

<body>
	<div class="main">
		<img id="img">
	</div>
	<div class="btn-g">
		<a href="<?= $this->buildUrl('index') ?>" class="btn btn-primary">首页</a>
		<?php if (!$this->auth()) echo base64_decode('PGEgaHJlZj0iaHR0cDovL2d1aWRlLmJyaTYuY24iIGNsYXNzPSJidG4gYnRuLWRhbmdlciIgdGFyZ2V0PSJfYmxhbmsiPuacrOermeWQjOasvuezu+e7nzwvYT4='); ?>
		<button id="switch" class="btn btn-primary">连续</button>
		<button type="button" class="btn btn-primary" id="next">切换</button>
		<select id="sort" class="form-select" style="width:auto;">
			<?php
			$list = explode(PHP_EOL, $this->options->image_list);
			foreach ($list as $key => $value) {
				$video = explode('||', $value);
				$url = isset($video[0]) ? trim($video[0]) : null;
				$title = isset($video[1]) ? trim($video[1]) : $url;
			?>
				<option value="<?= $url ?>"><?= $title ?></option>
			<?php
			}
			?>
		</select>
	</div>
	<?php $this->include('modules/footer.php') ?>
	<script src="<?= $this->themeUrl('assets/js/image.js') ?>" type="text/javascript"></script>
</body>

</html>