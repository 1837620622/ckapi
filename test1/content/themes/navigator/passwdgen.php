<!DOCTYPE html>
<!--
Thanks to panpanxiong3's password generator:
https://github.com/panpanxiong3/Front-end-effect-link/tree/master/js/%E5%AF%86%E7%A0%81%E7%94%9F%E6%88%90%E5%99%A8
-->
<html lang="zh">

<head>
	<title>密码生成器 - <?= $this->site->title ?></title>
	<?= $this->header() ?>
	<?= $this->load($this->themeUrl('assets/css/passwdgen.css')) ?>
	<!--图标库-->
	<link rel='stylesheet' href='<?= $this->cdn('font-awesome/5.11.2/css/all.min.css') ?>'>
	<!--字体库-->
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Montserrat&amp;display=swap'>
	<style>
		body {
			min-height: 100vh;
		}
		.container {
			height: auto;
		}
		footer {
			color: white;
		}
		footer a {
			margin: 0 5px;
			font-size: 1rem;
		}
	</style>
</head>

<body>
	<div class="container">
		<h2 class="title">密码生成器</h2>
		<div class="result">
			<div class="result__title field-title">生成的密码</div>
			<div class="result__info right">点击复制</div>
			<div class="result__info left">复制</div>
			<div class="result__viewbox" id="result"></div>
			<button id="copy-btn" style="--x: 0; --y: 0"><i class="far fa-copy"></i></button>
		</div>
		<div class="length range__slider" data-min="4" data-max="32">
			<div class="length__title field-title" data-length='0'>长度：</div>
			<input id="slider" type="range" min="4" max="32" value="16" />
		</div>

		<div class="settings">
			<span class="settings__title field-title">settings</span>
			<div class="setting">
				<input type="checkbox" id="uppercase" checked />
				<label for="uppercase">包含大写</label>
			</div>
			<div class="setting">
				<input type="checkbox" id="lowercase" checked />
				<label for="lowercase">包含小写</label>
			</div>
			<div class="setting">
				<input type="checkbox" id="number" checked />
				<label for="number">包括数字</label>
			</div>
			<div class="setting">
				<input type="checkbox" id="symbol" />
				<label for="symbol">包括符号</label>
			</div>
		</div>

		<button class="btn generate" id="generate">生成密码</button>
		<footer><?= date('Y'); ?> <a href="<?= $this->site->url; ?>"><?= $this->site->title ?></a><?php if (!$this->auth()) echo base64_decode('LueUsSA8YSBocmVmPSJodHRwOi8vZ3VpZGUuYnJpNi5jbiIgdGFyZ2V0PSJfYmxhbmsiPuaYk+iIque9keWdgOW8leWvvOezu+e7nzwvYT4g5by65Yqb6amx5Yqo') ?></footer>
	</div>
	<?= $this->load($this->themeUrl('assets/js/passwdgen.js')) ?>
</body>

</html>