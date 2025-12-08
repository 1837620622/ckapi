<?php
$sort = $this->getSort();
?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
	<title>网站提交 | <?= $this->site->title ?></title>
	<base href="<?= $this->themeUrl ?>/" />
	<?= $this->header() ?>
	<?= $this->require('modules/head.php') ?>
</head>

<body class="io-grey-mode">
	<div id="loading">
		<div class="loader">一个有范的导航</div>
	</div>
	<div class="page-container">
		<?php $this->require('modules/aside.php', ['sort' => $sort]) ?>
		<div class="main-content flex-fill page">
			<?php $this->require('modules/header.php') ?>
			<div style="margin-top: 0px !important;" id="content" class="container my-4 my-md-5">
				<div id="tougao-form" class="tougao-form">
					<h1 style="margin-top: 0px !important;" id="comments-list-title" class="comments-title h5 mx-1 my-4"><i class="iconfont icon-tougao mr-2"></i>站点推荐</h1>
					<div class="panel panel-tougao card">
						<div class="card-body">
							<form class="i-tougao" method="post" data-type="sites" action="/contribute">
								<input type="hidden" class="form-control" value="sites" name="tougao_type">
								<!-- <div class="my-2">
											<label for="tougao_sites_ico">网站图标:</label>
											<input type="hidden" value="" id="tougao_sites_ico" class="tougao-sites" name="tougao_sites_ico">
											<div class="upload_img">
												<div class="show_ico">
													<img id="show_sites_ico" class="show-sites" src="assets/images/add.png" alt="网站图标">
													<i id="remove_sites_ico" class="iconfont icon-close-circle remove-ico remove-sites" data-id="" data-type="ico" style="display: none;"></i>
												</div>
												<input type="file" id="upload_sites_ico" class="upload-sites" name="tougao_ico" data-type="ico" accept="image/*" onchange="uploadImg(this)">
											</div>
										</div> -->
								<div class="row row-sm">
									<div class="col-sm-6 my-2">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="iconfont icon-category icon-fw" aria-hidden="true"></i></span>
											</div>
											<select name='tougao_cat' id='tougaocategorg_sites' class='form-control'>
												<option value='0' selected='selected'>选择分类 *</option>
												<?php
												$sort_list = $this->getSort();
												foreach ($sort_list as $key => $value) {
												?>
													<option class="level-0" value="<?= $value->id ?>"><?= $value->title ?></option>
												<?php
												}
												?>
											</select>
										</div>
									</div>
									<div class="col-sm-6 my-2">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="iconfont icon-name icon-fw" aria-hidden="true"></i></span>
											</div>
											<input type="text" class="form-control" value="" name="tougao_title" placeholder="网站名称 *" maxlength="30">
										</div>
									</div>
									<div class="col-sm-6 my-2">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="iconfont icon-url icon-fw" aria-hidden="true"></i></span>
											</div>
											<input type="text" class="form-control" value="" name="tougao_sites_link" placeholder="网站链接 *">
										</div>
									</div>
									<div class="col-sm-6 my-2 ">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="iconfont icon-point icon-fw" aria-hidden="true"></i></span>
											</div>
											<input type="text" class="form-control sites_keywords" value="" name="tougao_sites_keywords" placeholder="网站关键字，请用英语逗号分隔" maxlength="100">
										</div>
									</div>
									<!-- <div class="col-sm-6 my-2">
												<div class="input-group">
													<div class="input-group-prepend">
														<span class="input-group-text"><i class="iconfont icon-tishi icon-fw" aria-hidden="true"></i></span>
													</div>
													<input type="text" class="form-control" value="" name="tougao_sites_sescribe" placeholder="网站描述" maxlength="50">
												</div>
											</div> -->
									<div class="col-sm-12 my-2">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">
													<i class="iconfont icon-url icon-fw" aria-hidden="true"></i>
												</span>
											</div>
											<input type="url" class="form-control" value="" name="tougao_sites_favicon" placeholder="网站图标链接">
										</div>
									</div>
									<div class="col-12 my-2">
										<label style="vertical-align:top" for="tougao_content">网站介绍:</label>
										<textarea class="form-control text-sm" rows="6" cols="55" name="tougao_content"></textarea>
									</div>
								</div>
							</form>
							<button class="btn btn-danger custom_btn-d text-sm col-12 custom-submit">提交</button>
						</div>
					</div>
				</div>
			</div>
			<script>
				var current_type = 'sites';

				function currentType(file) {
					current_type = $(file).data('type');
				};
				$('.custom-submit').click(function() {
					$('#' + current_type).children('form').submit();
				});

				$('.i-tougao').submit(function() {
					if (checkText($(this).find('.sites_keywords').val())) {
						return false;
					}
					var tg_type = $(this).data('type');

					var is_publish = '';
					if ($("#is_publish")[0]) {
						is_publish = document.getElementById('is_publish').checked ? 'on' : '0';
					}
					var fileM = document.querySelector("#upload_" + tg_type + "_ico");
					var fileObj = fileM.files[0];

					var myform = $(this)[0];
					var formData = new FormData(myform);
					formData.append('ico', fileObj);
					formData.append('action', 'contribute_post');
					formData.append('_ajax_nonce', '89de589778');
					formData.append('tcaptcha_ticket', $('#tcaptcha_ticket').val());
					formData.append('tcaptcha_randstr', $('#tcaptcha_randstr').val());
					formData.append('is_publish', is_publish);
					$.ajax({
						url: theme.ajaxurl,
						type: 'POST',
						dataType: 'json',
						data: formData,
						cache: false,
						processData: false,
						contentType: false
					}).done(function(result) {
						if (result.status == 1) {
							$(':input', '.i-tougao').not(':button, :submit, :reset, :hidden').val('').removeAttr('checked').removeAttr('selected');
							$(".show-" + tg_type).attr("src", theme.addico);
							$(".tougao-" + tg_type).val('');
							$(".remove-" + tg_type).data('id', '').hide();
							$(".upload-" + tg_type).val("").parent().removeClass('disabled');
						}
						showAlert(result);
					}).fail(function(result) {
						showAlert(JSON.parse('{"status":3,"msg":"网络连接错误！"}'));
					});
					return false;
				});

				function checkText(text) {
					var reg = /[\u3002|\uff1f|\uff01|\uff0c|\u3001|\uff1b|\uff1a|\u201c|\u201d|\u2018|\u2019|\uff08|\uff09|\u300a|\u300b|\u3008|\u3009|\u3010|\u3011|\u300e|\u300f|\u300c|\u300d|\ufe43|\ufe44|\u3014|\u3015|\u2026|\u2014|\uff5e|\ufe4f|\uffe5]/;
					if (reg.test(text)) {
						showAlert(JSON.parse('{"status":3,"msg":"关键词请使用英语逗号分隔。"}'));
						return true;
					} else {
						return false;
					}
				};

				function uploadImg(file) {
					var tg_type = $(file).parents(".i-tougao").data('type');
					var doc_id = file.getAttribute("data-type");
					if (file.files != null && file.files[0] != null) {
						if (!/\.(jpg|jpeg|png|JPG|PNG)$/.test(file.files[0].name)) {
							$("#show_" + tg_type + "_" + doc_id).attr("src", theme.addico);
							$("#upload_" + tg_type + "_" + doc_id).val("");
							$("#remove_" + tg_type + "_" + doc_id).hide();
							showAlert(JSON.parse('{"status":3,"msg":"图片类型只能是jpeg,jpg,png！"}'));
							return false;
						}
						if (file.files[0].size > (64 * 1024)) {
							$("#show_" + tg_type + "_" + doc_id).attr("src", theme.addico);
							$("#upload_" + tg_type + "_" + doc_id).val("");
							$("#remove_" + tg_type + "_" + doc_id).hide();
							showAlert(JSON.parse('{"status":3,"msg":"图片大小不能超过64kb"}'));
							return false;
						}
						var reader = new FileReader();
						reader.readAsDataURL(file.files[0]);
						reader.onload = function(arg) {
							var image = new Image();
							image.src = arg.target.result;
							image.onload = function() {
								$("#show_" + tg_type + "_" + doc_id).attr("src", image.src);
								$("#remove_" + tg_type + "_" + doc_id).show();
							};
							image.onerror = function() {
								$("#show_" + tg_type + "_" + doc_id).attr("src", theme.addico);
								$("#upload_" + tg_type + "_" + doc_id).val("");
								$("#remove_" + tg_type + "_" + doc_id).hide();
								showAlert(JSON.parse('{"status":3,"msg":"只能上传图片！"}'));
								return false;
							}
						}
					} else {
						$("#show_" + tg_type + "_" + doc_id).attr("src", theme.addico);
						$("#upload_" + tg_type + "_" + doc_id).val("");
						$("#remove_" + tg_type + "_" + doc_id).hide();
						showAlert(JSON.parse('{"status":2,"msg":"请选择文件！"}'));
						return false;
					}
				};
				$('.remove-ico').click(function() {
					var tg_type = $(this).parents(".i-tougao").data('type');
					var doc_id = $(this).data('type');
					$("#show_" + tg_type + "_" + doc_id).attr("src", theme.addico);
					$("#remove_" + tg_type + "_" + doc_id).hide();
					$("#upload_" + tg_type + "_" + doc_id).val("");
				});
			</script>
			<?php $this->include('modules/footer.php') ?>
		</div><!-- main-content end -->
	</div><!-- page-container end -->
	<?php $this->include('modules/search-modal.php') ?>
</body>

</html>