<?php
if (!$this->options('apply')) response404();
$this->include('module/header.php', ['title' => '申请收录']);
?>
<div class="container">
	<div class="card board">
		<span class="icon"><i class="fa fa-map-signs fa-fw"></i></span>
		<?php echoBoard('申请收录'); ?>
	</div>
	<div class="card">
		<div class="card-head"><i class="fa fa-plus-square fa-fw"></i>申请收录</div>
		<div class="card-body content">
			<?php // echo $page['content']; 
			?>
			<div>
				<?php
				if ($this->options('apply_content')) {
					echo $this->options('apply_content') . '<hr style="margin: 6px">';
				}
				?>
				<p>网站标题：<?= $this->site->title ?></p>
				<p>网站地址：<?= $this->site->url ?></p>
				<p>网站图标：<?= $this->site->url ?>/favicon.ico</p>
				<p>网站描述：<?= $this->site->description ?></p>
				<p>网站关键词：<?= $this->site->keywords ?></p>
			</div>
			<form id="apply-add" method="post" onsubmit="return false" style="margin-top: 8px">
				<div class="oz-form-group">
					<label class="oz-form-label">网址</label>
					<label class="oz-form-field" style="width: 100%;">
						<input type="text" name="url" id="url" placeholder="输入域名即可点击获取站点信息 [必填]">
					</label>
					<button class="oz-btn oz-bg-blue" id="get_site_info">获取站点信息</button>
					<!-- <label class="oz-form-field oz-btn oz-bg-blue" id="get_site_info">
						一键获取站点信息
					</label> -->
				</div>
				<div class="oz-form-group">
					<label class="oz-form-label">分类</label>
					<label class="oz-form-field">
						<select name="sortId" id="sortId">
							<option value="">请选择站点分类 [必选]</option>
							<?php
							$sorts = $this->getSort();
							foreach ($sorts as $sort) {
								if ($sort->id != $this->options('auto_collect_sort_id')) {
									echo "<option value='{$sort->id}'>{$sort->title}</option>";
								}
							}
							?>
						</select>
					</label>
				</div>
				<div class="oz-form-group">
					<label class="oz-form-label">标题</label>
					<label class="oz-form-field">
						<input type="text" name="title" id="title" placeholder="请输入站点标题 [必填]">
					</label>
				</div>
				<div class="oz-form-group">
					<label class="oz-form-label">描述</label>
					<label class="oz-form-field">
						<input type="text" name="description" id="description" placeholder="请输入站点描述 [必填]">
					</label>
				</div>
				<div class="oz-form-group">
					<label class="oz-form-label">关键词</label>
					<label class="oz-form-field">
						<input type="text" name="keywords" id="keywords" placeholder="请输入站点关键词 [必填]">
					</label>
				</div>
				<div class="oz-form-group">
					<label class="oz-form-label">图标链接</label>
					<label class="oz-form-field">
						<input type="url" name="favicon" id="favicon" placeholder="请输入站点图标链接 [非必填]" value="">
					</label>
				</div>
				<div class="oz-form-group">
					<label class="oz-form-label">ICP备案号</label>
					<label class="oz-form-field">
						<input type="text" name="icp" id="icp" placeholder="请输入站点ICP备案号 [非必填]" value="">
					</label>
				</div>
				<div class="oz-form-group">
					<label class="oz-form-label">QQ</label>
					<label class="oz-form-field">
						<input type="number" name="qq" id="qq" placeholder="请输入站长QQ号 [非必填]">
					</label>
				</div>
				<div class="oz-form-group">
					<label class="oz-form-label">验证码</label>
					<label class="oz-form-field" style="flex: auto;">
						<input type="text" name="captcha" id="captcha" placeholder="请输入验证码 [必填]">
					</label>
					<img id="captchaImage" src="<?= $this->themeUrl('module/captcha.php', false) ?>" onclick="this.src='<?= $this->themeUrl('module/captcha.php', false) ?>?'+Math.random();" alt="">
				</div>
				<div class="oz-center" style="margin-bottom: 8px">
					<button class="oz-btn oz-bg-blue" type="submit" onclick="addApply()" style="margin-right: 10px">
						<i class="fa fa-telegram fa-fw" aria-hidden="true"></i> 立即提交
					</button>
					<button class="oz-btn oz-bg-red" type="reset"><i class="fa fa-refresh fa-fw" aria-hidden="true"></i>
						重置输入
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
	$('#get_site_info').click(function() {
		if (checkInput([{
				id: 'url',
				msg: '请输入网址'
			}])) {
			$.ajax({
				type: "POST",
				url: window.SYSTEM.BASE_URL + "api/site_info",
				data: {
					url: $('#url').val(),
				},
				dataType: "json",
				beforeSend: () => {
					layer.load(2)
				},
				success: function(response) {
					layer.closeAll('loading');
					layer.msg(response.msg);
					if (response.data) {
						$('#url').val(response.data.url);
						$('#title').val(response.data.title);
						$('#keywords').val(response.data.keywords);
						$('#description').val(response.data.description);
						$('#favicon').val(response.data.favicon);
						$('#icp').val(response.data.icp);
					}
				},
				error: () => {
					layer.closeAll('loading')
					layer.alert('系统错误，请检查网络或联系管理员')
				}
			});
		}
	});
</script>

<?php $this->include('module/footer.php') ?>