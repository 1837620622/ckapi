<?php

namespace system\admin;

class View
{

	/**
	 * 一键生成后台卡片form表单
	 *
	 * @param string $title 表单标题
	 * @param string $action 提交到api的方法
	 * @param array $param 附带GET参数
	 * @param array  $content 表单内容
	 * @param string  $button 表单提交按钮文字
	 * @return string
	 */
	public static function form($title, $action, $param = null, $content = [], $button = '提交', $function = 'return')
	{
		return self::card($title, Form::form($action, $param, $content, $button));
	}

	/**
	 * 动态创建card卡片
	 *
	 * @param string $title 卡片标题
	 * @param $content 卡片内容
	 * @return string
	 */
	static function card($title = null, $content = null)
	{
		if (is_string($content)) {
			$row = <<<HTML
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<header class="card-header d-flex justify-content-between">
							<div class="card-title">{$title}</div>
							<ul class="card-actions">
								<li><a href="javascript:void(0)" class="card-btn-close"><i class="mdi mdi-close"></i></a></li>
								<li><a href="javascript:void(0)" class="card-btn-slide"><i class="mdi mdi-chevron-up"></i></a></li>
								<li><a href="javascript:void(0)" class="card-btn-fullscreen"><i class="mdi mdi-fullscreen"></i></a></li>
							</ul>
						</header>
						<div class="card-body">
							{$content}
						</div>
					</div>
				</div>
			</div>
			HTML;
			return $row;
		} else {
?>
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<header class="card-header d-flex justify-content-between">
							<div class="card-title"><?= $title ?></div>
							<ul class="card-actions">
								<li><a href="javascript:void(0)" class="card-btn-close"><i class="mdi mdi-close"></i></a></li>
								<li><a href="javascript:void(0)" class="card-btn-slide"><i class="mdi mdi-chevron-up"></i></a></li>
								<li><a href="javascript:void(0)" class="card-btn-fullscreen"><i class="mdi mdi-fullscreen"></i></a></li>
							</ul>
						</header>
						<div class="card-body">
							<?= $content() ?>
						</div>
					</div>
				</div>
			</div>
		<?php
		}
	}

	public static function table(string $toolbar = '<a data-url="?mod=create" class="btn btn-primary mb-1 me-1 layer_iframe"><span class="mdi mdi-plus" aria-hidden="true"></span> 新增</a>', $html = null)
	{
		global $title;
		?>
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<header class="card-header d-flex justify-content-between">
						<div class="card-title"><?= $title ?></div>
						<ul class="card-actions">
							<li><a href="javascript:void(0)" class="card-btn-close"><i class="mdi mdi-close"></i></a></li>
							<li><a href="javascript:void(0)" class="card-btn-slide"><i class="mdi mdi-chevron-up"></i></a></li>
							<li><a href="javascript:void(0)" class="card-btn-fullscreen"><i class="mdi mdi-fullscreen"></i></a></li>
						</ul>
					</header>
					<div class="card-body">
						<div id="toolbar" class="toolbar-btn-action">
							<?= $toolbar ?>
							<!-- <a href="?mod=create" class="btn btn-primary mb-1 me-1 layer_iframe"><span class="mdi mdi-plus" aria-hidden="true"></span> 新增</a> -->
							<!-- <button id="btn_edit" type="button" class="btn btn-success mb-1 me-1"><span class="mdi mdi-check" aria-hidden="true"></span> 启用</button> -->
							<!-- <button id="btn_edit" type="button" class="btn btn-warning mb-1 me-1"><span class="mdi mdi-block-helper" aria-hidden="true"></span> 禁用</button> -->
							<!-- <button id="btn_delete" type="button" class="btn btn-danger mb-1 me-1"><span class="mdi mdi-window-close" aria-hidden="true"></span> 删除</button> -->
						</div>
						<?= $html ?>
						<!-- <div id="toggle"></div> -->
						<table id="table"></table>
					</div>
				</div>
			</div>
		</div>
		<?php require_once ADMIN_ROOT . 'modules/footer.php' ?>
		<script src="assets/js/bootstrap-table/options.js"></script>
		<script src="assets/js/bootstrap-table/table.js"></script>
<?php
	}

	/**
	 * 后台页面安全检查
	 * @access public
	 * @return array
	 */
	public static function safeCheck()
	{
		$result = [];
		if (strpos($_SERVER["SERVER_SOFTWARE"], "kangle") !== false && function_exists("pcntl_exec")) {
			$result[] = '<li class="list-group-item"><span class="btn-sm btn-danger">高危</span>&nbsp;当前主机为kangle且开启了php的pcntl组件，会被黑客入侵，请联系主机商修复或更换主机</li>';
		}
		if (function_exists('glob')) {
			if (strpos($_SERVER["SERVER_SOFTWARE"], "kangle") !== false && count(glob("/vhs/kangle/etc/*")) > 1) {
				$result[] = '<li class="list-group-item"><span class="btn-sm btn-danger">高危</span>&nbsp;当前主机为kangle且未设置open_basedir防跨站，会被黑客入侵，请联系主机商修复或更换主机</li>';
			}
			$suffix = glob(ROOT . "*.zip");
			$suffix2 = glob(ROOT . "*.7z");
			$suffix3 = glob(ROOT . "*.rar");
			if ($suffix && count($suffix) > 0 || $suffix2 && count($suffix2) > 0 || $suffix3 && count($suffix3) > 0) {
				$result[] = '<li class="list-group-item"><span class="btn-sm btn-warning">提示</span>&nbsp;网站根目录存在压缩包文件，可能会被人恶意获取并泄露数据库密码，请及时删除</li>';
			}
		}
		$admin = Admin::info();
		if (empty($admin['pwd'])) {
			$result[] = '<li class="list-group-item"><span class="btn-sm btn-danger">重要</span>&nbsp;网站管理员密码过于简单，请不要使用0或空字符当做密码</li>';
		} else if ($admin['pwd'] == '123456') {
			$result[] = '<li class="list-group-item"><span class="btn-sm btn-danger">重要</span>&nbsp;请及时修改默认管理员密码 <a href="admin.php?mod=pwd">点此修改</a></li>';
		} else if (strlen($admin['pwd']) < 6 || is_numeric($admin['pwd']) && strlen($admin['pwd']) <= 10 || $admin['pwd'] == $admin["qq"]) {
			$result[] = '<li class="list-group-item"><span class="btn-sm btn-danger">重要</span>&nbsp;网站管理员密码过于简单，请不要使用较短的纯数字或自己的QQ号当做密码</li>';
		} else if ($admin['user'] == $admin['pwd']) {
			$result[] = '<li class="list-group-item"><span class="btn-sm btn-danger">重要</span>&nbsp;网站管理员用户名与密码相同，极易被黑客破解，请及时修改密码</li>';
		}
		if (empty($result)) {
			$result[] = '<li class="list-group-item"><span class="btn-sm btn-success">正常</span>&nbsp;暂未发现网站安全问题</li>';
		}
		return $result;
	}
}
