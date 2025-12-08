<?php

use system\library\Json;

if (!defined('ROOT'))
	exit;
$title = $theme->site->title;
if (isset($_GET['submit']) == 'post') {
	if (isset($_REQUEST['authcode'])) {
		if (strtolower($_REQUEST['authcode']) == $_SESSION['authcode']) {
			$status = isset($theme->options->embody) ? $theme->options->embody : 0;
			if (!$status) {
				exit('{"code": "400", "msg": "网站已关闭收录"}');
			}
			$subtitle = $_POST['name'] . '向您提交了收录申请：';
			$content = <<<HTML
			站点标题：{$_POST['name']}<br>
			站点URL：{$_POST['url']}<br>
			站点图标：{$_POST['icon']}<br>
			申请分类：{$_POST['group_id']}<br>
			HTML;
			$sendEmail = send_mail('申请收录', $subtitle, $content);
			if ($sendEmail) {
				Json::echo([
					'code' => 200,
					'msg' => '申请提交成功'
				]);
			} else {
				Json::echo([
					'msg' => '申请提交失败，请联系站长进行申请'
				]);
			}
		} else {
			exit('{"code": "-6", "msg": "验证码错误"}');
		}
	}
	exit();
}
?>
<!DOCTYPE html>
<html lang="zh">

<head>
	<title>申请收录 - <?= $title ?></title>
	<?= $theme->header() ?>
	<link href="https://cdn.lylme.com/admin/lyear/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdn.lylme.com/admin/lyear/css/style.min.css" rel="stylesheet">
	<style>
		#loading {
			position: absolute;
			left: 0;
			top: 0;
			height: 100vh;
			width: 100vw;
			z-index: 100;
			display: none;
			align-items: center;
			justify-content: center;
			color: #bbb;
			font-size: 16px
		}

		#loading>img {
			height: 18px;
			width: 18px
		}

		.lylme-wrapper {
			position: relative
		}

		.lylme-form {
			display: flex !important;
			min-height: 100vh;
			align-items: center !important;
			justify-content: center !important
		}

		.lylme-form:after {
			content: '';
			min-height: inherit;
			font-size: 0
		}

		.lylme-center {
			background: rgba(255, 255, 255, 0.9);
			min-width: 29.25rem;
			padding: 30px;
			border-radius: 20px;
			margin: 2.85714em
		}

		.form-control {
			background-color: rgba(255, 255, 255, 0.1);
			border: 1px solid #ccc;
		}

		.lylme-header {
			margin-bottom: 1.5rem !important
		}

		.lylme-center .has-feedback.feedback-left .form-control-feedback {
			left: 0;
			right: auto;
			width: 38px;
			height: 38px;
			line-height: 38px;
			z-index: 4;
			color: #dcdcdc
		}

		.lylme-center .has-feedback.feedback-left.row .form-control-feedback {
			left: 15px
		}

		.code {
			height: 38px
		}

		.apply_gg {
			margin: 20px 0;
			font-size: 15px;
			line-height: 2
		}

		.home {
			text-decoration: none;
			color: #bbb;
			line-height: 2
		}

		li {
			list-style-type: none
		}

		ol,
		ul {
			padding-left: 10px
		}
	</style>
</head>

<body>
	<div id="loading"><img src="https://cdn.lylme.com/admin/lyear/img/loading.gif" /> &nbsp;正在获取....</div>
	<div class="row lylme-wrapper"
		style="background-image:  url(<?= $theme->site->background ?>);background-size: cover;">s
		<div class="lylme-form">
			<div class="lylme-center">
				<?php if (isset($theme->options->embody) && $theme->options->embody == 2) {
					exit('<div class="lylme-header text-center"><h2>网站已关闭收录</h2></div>' . $theme->options->embody_notice . '</div>');
				}
				?>
				<div class="lylme-header text-center">
					<h2>申请收录</h2>
				</div>
				<div class="apply_gg">
					<?= isset($theme->options->embody_notice) ? $theme->options->embody_notice : null ?>
				</div>
				<div class="form-group">
					<label>*URL链接地址:</label>
					<!-- <div class="input-group"> -->
					<input type="text" class="form-control" name="url" placeholder="完整链接或域名" required>
					<!-- <span class="input-group-btn"> -->
					<!-- <button class="btn btn-default" onclick="get_url()" type="button">自动获取</button> -->
					<!-- </span> -->
					<!-- </div> -->
				</div>
				<div class="form-group has-feedback feedback-left row">
					<div class="col-xs-12">
						<label>* 选择分组:</label>
						<select title="分组" class="form-control" name="group_id" required>
							<option value="">请选择</option>
							<?php
							$sort = $theme->getSort();
							foreach ($sort as $key => $value) {
								?>
								<option value="<?= $value->title ?>"><?= $value->title ?></option>
								<?php
							}
							?>
						</select>
						<span class="mdi mdi-folder form-control-feedback" aria-hidden="true"></span>
					</div>
				</div>
				<div class="form-group has-feedback feedback-left row">
					<div class="col-xs-12">
						<label>* 网站名称:</label>
						<input type="text" class="form-control" id="title" name="name" value="" required
							placeholder="网站名称">
						<span class="mdi mdi-format-title form-control-feedback" aria-hidden="true"></span>
						<small class="help-block">填写网站名称</small>
					</div>
				</div>
				<div class="form-group">
					<label>网站图标:</label>
					<!-- <div class="input-group"> -->
					<input type="text" id="icon" class="form-control" name="icon" placeholder="填写图标的URL地址">
					<!-- </div> -->
					<small
						class="help-block">填写图标的<code>URL</code>地址，如：<code>http://www.bri6.cn/favicon.ico</code></small>
				</div>
				<div class="form-group has-feedback feedback-left row">
					<label>* 验证码:</label>
					<div class="input-group">
						<div class="col-xs-8">
							<input type="text" name="authcode" class="form-control" placeholder="验证码" required>
							<span class="mdi mdi-check form-control-feedback" aria-hidden="true"></span>
						</div>
						<div class="col-xs-4">
							<img id="captcha_img" title="验证码" src='api/validatecode' class="pull-right code"
								onclick="recode()" />
						</div>
					</div>
				</div>
				<div class="form-group">
					<button class="btn btn-primary btn-block" onclick="submit()">提交</button>
				</div>
				<center>
					<p><a href="../" class="home">返回首页</a></p>
					<!-- <a href="/apply" title="申请收录">申请收录</a>|<a href="/sitemap.xml" title="网站地图">网站地图</a>|<a href="/about" title="关于本站">关于本站</a> -->
					<br>Copyright ©<?= date('Y') ?> <a href="/"><?= $title ?></a> All Rights Reserved.
					<!-- <p>本网站由<a href="https://www.upyun.com/?utm_source=lianmeng&amp;utm_medium=referral" target="_blank"><img src="//cdn.lylme.com/img/upyun_logo5.png" height="30px"></a>提供CDN加速/云存储服务</p> -->
				</center>
			</div>
		</div>
	</div>
	<script src="<?= $this->cdn('jquery/3.5.1/jquery.min.js') ?>"
		type="application/javascript"></script>
	<script src="<?= $this->cdn('layer/3.1.1/layer.min.js') ?>"
		type="application/javascript"></script>
	<script src="<?= $this->cdn('sweetalert/2.1.2/sweetalert.min.js') ?>"
		type="application/javascript"></script>
	<script src="<?= $theme->themeUrl('assets/js/embody.js') ?>" type="application/javascript"></script>
	<?= $theme->footer() ?>
</body>

</html>