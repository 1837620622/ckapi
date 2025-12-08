<!DOCTYPE html>
<html lang="zh-cn">

<head>
	<title>字符查找器 - <?= $this->site->title ?></title>
	<?php $this->include('modules/head.php') ?>
	<?= $this->load($this->themeUrl('assets/js/filter.js')) ?>
</head>

<body data-new-gr-c-s-check-loaded="14.980.0">
	<?php $this->include('modules/header.php') ?>
	<div id="content" data-customize="true" data-CustomTheme="true" class="default-bg">
		<!--内容-->
		<div class="main-index">
			<div class="container content-box link-page">
				<div class="input-control">
					<input id="str1" type="text" class="form-control" placeholder="A">
					<label for="str1" class="input-control-icon-left"></label>
				</div>
				<p></p>
				<div class="input-control">
					<input id="str2" type="text" class="form-control" placeholder="B">
					<label for="str2" class="input-control-icon-left"></label>
				</div>
				<p></p>
				<button class="btn btn-primary" type="button" onclick="btn_onclick()">查找</button>
				<p></p>
				<p id="results"></p>
			</div>
		</div>
	</div>
	<?php $this->include('modules/footer.php') ?>
</body>

</html>