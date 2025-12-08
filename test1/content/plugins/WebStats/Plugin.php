<?php

namespace content\plugins\WebStats;

use JsonDb\JsonDb\Db;
use system\library\Json;
use system\library\Route;

/**
 * @package 网站统计
 * @description 网站用户数据统计
 * @author 易航
 * @version 1.0
 * @link http://bri6.cn
 */
class Plugin
{

	public static function register()
	{
		// 创建 JSON 数据表 stats
		Db::name('stats')->tableCreate();
	}

	public static function route()
	{
		// 注册统计路由
		Route::rule('/stats/{time:\d+}', function ($param) {
			self::api($param['time']);
			exit;
		});
	}

	public static function page()
	{
		$sort = Db::name('stats')->select();
		$list = ['all' => '所有设备'];
		foreach ($sort as $key => $value) {
			$list[$value['device']] = $value['device'];
		}

		$sort_select = \system\library\FormBuilder::select('sort_select', $list, 'all', [
			'class' => 'form-control selectpicker',
			'style' => 'width: 100%;padding:6px 0px;',
			'onchange' => 'sort_select(this)'
		]);
		$sort_select = element('div')->attr(['class' => 'float-right mb-1'])->get($sort_select);
		$buttons = $sort_select;
?>
		<div id="toolbar" class="toolbar-btn-action">
			<?= $buttons ?>
		</div>
		<table id="table"></table>
		<script src="assets/js/bootstrap-table/options.js"></script>
		<script src="assets/js/bootstrap-table/table.js"></script>
		<script>
			BootstrapTable.options.table = 'stats';
			BootstrapTable.options.operate.status = false;
			BootstrapTable.options.operate.update = false;
			BootstrapTable.options.operate.delete = false;
			BootstrapTable.table_options.queryParams = (params) => {
				params.select_field = 'device';
				params.select_value = $('[name=sort_select]').val();
				return params;
			}
			BootstrapTable.table_options.sortName = 'create_time';
			BootstrapTable.table_options.sortOrder = 'desc';
			BootstrapTable.columns = [{
					field: 'ip',
					align: 'center',
					title: 'IP',
					sortable: true,
					titleTooltip: '用户IP'
				},
				{
					field: 'url',
					align: 'center',
					title: '浏览页面',
					titleTooltip: '用户访问页面',
					sortable: true,
					formatter: function(value, row) {
						if (typeof value == 'string') {
							return value;
						} else if (value.length == 1) {
							return value[0];
						} else {
							return `<a role="button" tabindex="0" class="btn btn-info btn-sm" data-bs-html="true" data-bs-container="body" data-bs-toggle="popover" data-bs-content="${value.join('<br />')}">查看</a>`;
						}
					}
				},
				{
					field: "visits",
					title: '浏览量',
					titleTooltip: '用户浏览次数',
					align: "center",
					sortable: true,
				},
				{
					field: 'time',
					title: '浏览时间',
					titleTooltip: '用户浏览时间',
					align: 'center',
					sortable: true,
					formatter: function(seconds) {
						if (seconds < 60) {
							var time = seconds + '秒';
						} else {
							const minutes = Math.floor(seconds / 60);
							const remainingSeconds = seconds % 60;
							var time = minutes + '分' + remainingSeconds + '秒';
						}
						return time;
					}
				},
				{
					field: 'referrer',
					title: '来源',
					titleTooltip: '来源页面',
					align: 'center',
					sortable: true,
					formatter: function(value) {
						return value ? value : '直接访问';
					}
				},
				{
					field: 'date',
					title: '日期',
					align: 'center',
					sortable: true,
				},
				{
					field: 'ip_city',
					title: '地址',
					align: 'center',
					sortable: true,
				},
				{
					field: 'device',
					title: '设备',
					titleTooltip: '用户浏览设备',
					align: 'center',
					sortable: true,
					formatter: function(value, row) {
						return `<span class="badge bg-info" title="${row.user_agent}" data-bs-toggle="tooltip" data-bs-placement="top">${value}</span>`;
					}
				},
				{
					field: 'update_time',
					align: 'center',
					title: '状态',
					// visible: false,
					sortable: true,
					formatter: function(value) {
						// 将时间字符串转换为 Date 对象
						const targetDate = new Date(value);
						// 获取当前时间
						const now = new Date();
						// 计算时间差（毫秒）
						const timeDifference = now.getTime() - targetDate.getTime();
						// 将时间差转换为秒
						const secondsDifference = timeDifference / 1000;
						// 判断是否超过 10 秒
						if (secondsDifference > 10) {
							return `<span class="badge bg-secondary">离线</span>`;
						} else {
							return `<span class="badge bg-success">在线</span>`;
						}
					}
				},
				{
					field: 'create_time',
					align: 'center',
					title: '创建时间',
					visible: false,
					sortable: true
				},
			]
			BootstrapTable.init();

			function sort_select(self) {
				$('table').bootstrapTable('refresh');
			}

			// setInterval(() => {
			// 	if (document.visibilityState != 'visible') return;
			// 	$('table').bootstrapTable('refresh', {
			// 		silent: true
			// 	});
			// }, 3000);
		</script>
<?php
	}

	public static function api()
	{
		if (empty($_POST['url']) || empty($_POST['device'])) {
			Json::echo(['code' => 403]);
		}

		if (isset($_POST['referrer'])) {
			$url_host = parse_url($_POST['referrer'], PHP_URL_HOST);
			if (empty($url_host) || $url_host == DOMAIN) {
				$referrer = null;
			} else {
				$referrer = $_POST['referrer'];
			}
		} else {
			$referrer = null;
		}

		$ip = request('ip');

		$url = trim($_POST['url']);
		$device = $_POST['device'];
		$time = $_POST['time'];

		$where = [
			'ip' => $ip,
			'user_agent' => $_SERVER['HTTP_USER_AGENT'],
			'date' => DATE,
			// 'url' => $url
		];

		$find = Db::name('stats')->where($where)->find();
		if ($find) {
			$find['url'] = is_array($find['url']) ? $find['url'] : [$find['url']];
			if (!in_array($url, $find['url'])) {
				$find['url'][] = $url;
				$update_data = ['url' => $find['url']];
			} else {
				$update_data = null;
			}
			if ($time) {
				Db::name('stats')->where($where)->inc('time', 3)->update($update_data);
			} else {
				Db::name('stats')->where($where)->inc('visits')->update($update_data);
			}
		} else {
			$Db_ip_city = Db::name('stats')->where('ip', $ip)->value('ip_city');
			$ip_city = empty($Db_ip_city) ? request('ipCity', $ip) : $Db_ip_city;
			Db::name('stats')->insert([
				'ip' => $ip,
				'ip_city' => $ip_city,
				'user_agent' => $_SERVER['HTTP_USER_AGENT'],
				'date' => DATE,
				'url' => [$url],
				'referrer' => $referrer,
				'device' => $device,
				'visits' => 1,
				'time' => 1,
			]);
		}

		Json::echo(['code' => 200]);
	}

	public static function footer()
	{
		echo '<script src="/content/plugins/WebStats/assets/js/main.js"></script>';
	}
}
