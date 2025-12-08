<?php

/**
 * Antidote即解药，大方优雅的响应式模板，双栏设计，支持多个广告，有排行榜单
 *
 * @package Antidote
 * @author OZDAO
 * @version 1.3
 * @link http://nav.ouzero.com
 */

use JsonDb\JsonDb\Db;

if ($this->options('click_time_order_site') && !empty($_SERVER['HTTP_REFERER'])) {
	(function () use ($theme) {
		if (spider_detection()) return;
		$referer = $_SERVER['HTTP_REFERER'];
		if (!preg_match('/[a-zA-z]+\:\/\/[^\s]/', $referer)) return;
		$referer = rtrim($referer, '/');
		$removeProtocolUrl = removeProtocol($referer);

		$parse_url = parse_url($referer);
		$host = $parse_url['host'];

		$url_list = [
			'http://' . $removeProtocolUrl,
			'http://' . $removeProtocolUrl . '/',
			'https://' . $removeProtocolUrl,
			'https://' . $removeProtocolUrl . '/',
			'http://' . $host . '/',
			'http://' . $host,
			'https://' . $host . '/',
			'https://' . $host
		];

		// halt($url_list);

		$site_find = Db::name('site')->where('sort_id', '!=', $theme->options('auto_collect_sort_id'))->where('url', $url_list)->find();

		if (empty($site_find) || !is_array($site_find)) return;

		if (!$site_find['status']) return;

		if ($site_find['fields'][$theme->themeName]['off_click_time_order_site']) return;

		Db::name('site')->where('id', $site_find['id'])->update(['order' => time()]);
	})();
}

if ($theme->options('auto_collect_sort_id') != 0 && !empty($_SERVER['HTTP_REFERER'])) {
	(function () use ($theme) {
		if (spider_detection()) return;
		$referer = $_SERVER['HTTP_REFERER'];
		$parse_url = parse_url($referer);
		$host = $parse_url['host'];
		$auto_collect_excluded_domain = explode('||', $theme->options('auto_collect_excluded_domain'));
		$auto_collect_excluded_domain[] = DOMAIN;
		foreach ($auto_collect_excluded_domain as $value) {
			if ($host == trim($value)) return;
		}

		$url_list = [
			'http://' . $host . '/',
			'https://' . $host . '/',
			'http://' . $host,
			'https://' . $host
		];

		$site_find = Db::name('site')->where('sort_id', $theme->options('auto_collect_sort_id'))->where('url', $url_list)->find();
		if (is_array($site_find) && $site_find['status'] != 0) {
			Db::name('site')->where('id', $site_find['id'])->update(['order' => time()]);
		}
	})();
}

$this->include('module/header.php');

$qq_contact_link = 'http://wpa.qq.com/msgrd?v=3&uin=' . $this->options('qq') . '&site=qq&menu=yes';
?>
<div class="banner" data-src="<?= empty($this->options('index_banner')) ? TEMPLATE_URL . 'assets/images/banner.jpg' : $this->options('index_banner') ?>">
	<ul class="search-type">
		<li class="title">搜索</li>
		<li class="item active" data-type="this">本站</li>
		<li class="item" data-type="baidu">百度</li>
		<li class="item" data-type="sogou">搜狗</li>
		<li class="item" data-type="360">360</li>
		<li class="item" data-type="bing">必应</li>
	</ul>
	<form class="search-form" action="<?= $this->buildUrl('search') ?>" method="get">
		<input class="search-input" placeholder="请输入关键词..." name="keyword" required="required">
		<button type="submit" class="search-btn">本站搜索</button>
	</form>
</div>

<?php

if (is_numeric($this->options('home_site_row_limit'))) {
	$home_site_row_height = (($this->options('home_site_row_limit') * 40) + 16) . 'px';
?>
	<style>
		.card>.site_list {
			max-height: <?= $home_site_row_height ?>;
		}
	</style>
<?php
}

if ($this->options('auto_collect_sort_id')) {
?>
	<style>
		.auto_collect_sort_card_body>a:first-child {
			animation: change 1.5s linear 0s infinite;
		}

		@keyframes change {
			0% {
				color: #ff00f9;
			}

			25% {
				color: #ff0000;
			}

			50% {
				color: #0572c8;
			}

			75% {
				color: #00fc00;
			}

			100% {
				color: #ff8600;
			}
		}
	</style>
<?php
}

if (options('sponsor')) {
?>
	<style>
		.tp_advertising {
			width: 100%;
			display: flex;
			justify-content: space-between;
			background: #fff;
			position: relative;
			box-shadow: 0 0 3px rgba(0, 0, 0, .2);
		}

		.tp_advertising p {
			color: #fff;
			font-size: 14px;
			line-height: 22px;
			background: #6F8EC5;
			position: absolute;
			bottom: 0;
			right: 0;
			margin: 0;
			padding: 0 8px;
			border-top-left-radius: 10px;
			opacity: .3;
		}

		.tp_advertising div {
			width: 16.66%;
			position: relative;
			z-index: 1;
		}

		.tp_advertising a {
			font-size: 12px;
			line-height: 22px;
			text-align: center;
			display: block;
			text-decoration: none;
			white-space: nowrap;
		}

		.tp_advertising a:hover {
			font-weight: bold;
			font-size: 14px;
			text-shadow: 0px 0px 1px rgba(0, 0, 0, .5);
		}

		.tp_1 a {
			color: #FF0033;
		}

		.tp_2 a {
			color: #9400D3;
		}

		.tp_3 a {
			color: #00BFFF;
		}

		.tp_4 a {
			color: #FF1493;
		}

		.tp_5 a {
			color: #FF4500;
		}

		.tp_6 a {
			color: #5fb878;
		}
	</style>
	<div class="tp_advertising">
		<p>网站赞助广告商</p>
		<?php
		$advert_list = (array) getAdverts('index_top');
		// halt($advert_list);
		if (!empty($advert_list)) {
			$result = array_chunk($advert_list, ceil(count($advert_list) / 6));
			for ($i = 0; $i < 5; $i++) {
				if (empty($result[$i])) {
					$result[$i] = [];
					$data = new class
					{
						public $url =  '/';
						public $title = '网站赞助';
					};
					for ($s = 0; $s < 7; $s++) {
						$result[$i][$s] = $data;
					}
				}
			}
			foreach ($result as $key => $value) {
				if ($key <= 4) {
					for ($i = 0; $i < 7; $i++) {
						if (empty($value[$i])) {
							$value[$i] = new class
							{
								public $url =  '/';
								public $title = '网站赞助';
							};
						}
					}
		?>
					<div class="tp_<?= $key + 1 ?>">
						<?php
						foreach ($value as $k => $v) {
						?>
							<a href="<?= $v->url ?>" target="_blank"><?= $v->title ?></a>
						<?php
						}
						?>
					</div>
			<?php
				}
			}
		} else {
			?>
			<div class="tp_1">
				<a href="/" target="_blank">网站赞助</a>
				<a href="/" target="_blank">网站赞助</a>
				<a href="/" target="_blank">网站赞助</a>
				<a href="/" target="_blank">网站赞助</a>
				<a href="/" target="_blank">网站赞助</a>
				<a href="/" target="_blank">网站赞助</a>
			</div>
			<div class="tp_2">
				<a href="/" target="_blank">网站赞助</a>
				<a href="/" target="_blank">网站赞助</a>
				<a href="/" target="_blank">网站赞助</a>
				<a href="/" target="_blank">网站赞助</a>
				<a href="/" target="_blank">网站赞助</a>
				<a href="/" target="_blank">网站赞助</a>
			</div>
			<div class="tp_3">
				<a href="/" target="_blank">网站赞助</a>
				<a href="/" target="_blank">网站赞助</a>
				<a href="/" target="_blank">网站赞助</a>
				<a href="/" target="_blank">网站赞助</a>
				<a href="/" target="_blank">网站赞助</a>
				<a href="/" target="_blank">网站赞助</a>
			</div>
			<div class="tp_4">
				<a href="/" target="_blank">网站赞助</a>
				<a href="/" target="_blank">网站赞助</a>
				<a href="/" target="_blank">网站赞助</a>
				<a href="/" target="_blank">网站赞助</a>
				<a href="/" target="_blank">网站赞助</a>
				<a href="/" target="_blank">网站赞助</a>
			</div>
			<div class="tp_5">
				<a href="/" target="_blank">网站赞助</a>
				<a href="/" target="_blank">网站赞助</a>
				<a href="/" target="_blank">网站赞助</a>
				<a href="/" target="_blank">网站赞助</a>
				<a href="/" target="_blank">网站赞助</a>
				<a href="/" target="_blank">网站赞助</a>
			</div>
		<?php
		}
		?>
	</div>
<?php
}

$site_list = $this->getSites();

?>
<div class="container">
	<ul class="sort">
		<li><a href="#置顶站点" class="move"><span>置顶推荐</span> <i class="fa fa-thumbs-o-up fa-fw"></i></a></li>
		<?php echoSideSorts($this->getSort()); ?>
	</ul>
	<div id="main">
		<div class="card board">
			<span class="icon" style="background: url(<?= $this->themeUrl('assets/images/notice.png') ?>) no-repeat 50% 50%/85%;height: 100%; width: 100px;"></span>
			<!-- <span class="icon"><i class="fa fa-bullhorn fa-fw"></i></span> -->
			<marquee scrollamount="4" behavior="scroll" onmouseover="this.stop()" onmouseout="this.start()">
				<span style="color: #FF0000;font-size: 13px;font-weight: bold;"><?= $this->options->notice ?></span>
			</marquee>
		</div>
		<!--网站统计 start-->
		<div class="card" style="padding: 5px;font-size: 13px;font-weight: bold;color: #535b5f;background-color: #ffffff;text-align: center;">
			<p>
				<span>共计收录:</span>
				<font color="red"><?= count($site_list) ?> 个</font>
				<span> - </span>
				<span>已稳定运行了:</span>
				<font color="green"><?= (new DateTime($this->site->create_date))->diff(new DateTime(DATE))->days; ?> 天</font>
			</p>
			<?php
			if ($this->options('stats_display')) {
			?>
				<p>
					<span>今日浏览:</span>
					<span style="color: #ff7f00;"><?= visits_data(DATE) ?> 次</span>
					<span> - </span>
					<span>昨日访问人数:</span>
					<span style="color: #007bff;"><?= ip_data(date('Y-m-d', strtotime('-1 days'))) ?> 位</span>
				<p>
				<?php
			}
				?>
		</div>
		<!--网站统计 end-->
		<?php
		if ($this->options('home_text_advert')) {
		?>
			<style>
				.txtguanggao {
					width: 100%;
					overflow: hidden;
					display: block;
					box-shadow: 0 1px 2px 0 rgba(0, 0, 0, .05);
				}

				.txtguanggao a {
					width: calc((100% - 20px) / 4);
					float: left;
					border-radius: 3.5px;
					line-height: 35.35px;
					height: 35.35px;
					text-align: center;
					font-size: 14px;
					color: #fff;
					display: inline-block;
					background-color: rgb(255, 153, 159);
					margin: 2.5px;
					transition: 0.1s;
				}

				.txtguanggao a:nth-child(1) {
					background-color: #dc3545;
				}

				.txtguanggao a:nth-child(2) {
					background-color: #007bff;
				}

				.txtguanggao a:nth-child(3) {
					background-color: #28a745;
				}

				.txtguanggao a:nth-child(4) {
					background-color: #ff7f00;
				}

				a {
					text-decoration: none;
				}

				.txtguanggao a:hover {
					opacity: 0.8;
				}

				@media screen and (max-width: 1000px) {
					.txtguanggao a {
						width: calc((100% - 10px) / 2);
					}
				}
			</style>
			<div class="card" style="padding: 10px;">
				<div class="txtguanggao">
					<?php
					$text_advert_list = (array) getAdverts('index_text');
					if (empty($text_advert_list)) {
					?>
						<a href="<?= $qq_contact_link ?>" target="_blank" class="dh">文字广告位</a>
						<a href="<?= $qq_contact_link ?>" target="_blank" class="dh">文字广告位</a>
						<a href="<?= $qq_contact_link ?>" target="_blank" class="dh">文字广告位</a>
						<a href="<?= $qq_contact_link ?>" target="_blank" class="dh">文字广告位</a>
					<?php
					} else {
						// 定义颜色数组
						$colors = ['#dc3545', '#007bff', '#28a745', '#ff7f00'];
						foreach ($text_advert_list as $key => $value) {
							// 计算当前颜色索引
							$colorIndex = $key % count($colors);
							$color = $colors[$colorIndex];
							echo element('a')->attr([
								'style' => "background-color: $color",
								'href' => $value->url,
								'target' => '_blank',
								'class' => 'dh'
							])->get($value->title);
						}
					}
					?>
				</div>
			</div>
		<?php
		}
		?>
		<div id="置顶站点" class="card">
			<div class="card-head">
				<i class="fa fa-thumbs-o-up fa-fw"></i>
				<font style="color:red;">置顶站点：<?= $this->options('top_price') ?></font>
				<a href="<?= $qq_contact_link ?>" class="more">置顶 <i class="fa fa-plus-square" aria-hidden="true"></i></a>
			</div>
			<div class="card-body">
				<?php
				foreach ($site_list as $key => $value) {
					if (isset($value->fields->top) && $value->fields->top == 1) {
						echoSite($value, true);
					}
				}
				?>
			</div>
			<?php
			$advert_list = getAdverts('index_header');
			foreach ($advert_list as $key => $value) {
				echoAd($value);
			}
			?>
		</div>
		<?php
		$sorts = $this->getSortSites();
		foreach ($sorts as $sort) { ?>
			<div id="<?= $sort->title; ?>" class="card">
				<div class="card-head">
					<i class="<?= isset($sort->fields->icon) ? $sort->fields->icon : null ?>"></i><?= $sort->title; ?>
					<?php
					if ($sort->id == $this->options('auto_collect_sort_id')) {
						$auto_collect_sort_title = $sort->title;
					?>
						<a href="javascript:auto_collect_sort_description();">查看说明</a>
					<?php
					}
					?>
					<a href="<?= $this->buildUrl('sort/' . $sort->id) ?>" class="more">
						<?= $this->options('home_site_row_limit') ? '全部 >' : '<i class="fa fa-ellipsis-h fa-fw"></i>' ?>
					</a>
				</div>
				<div class="site_list card-body <?= ($sort->id == $this->options('auto_collect_sort_id') ? 'auto_collect_sort_card_body' : null) ?>">
					<?php echoSites($sort->sites); ?>
				</div>
			</div>
		<?php } ?>
	</div>
	<?php $this->include('module/aside.php') ?>
</div>

<div class="card links">
	<div class="card-head"><i class="fa fa-link fa-fw"></i>友情链接 申请友链：<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?= $this->options->qq ?>&site=qq&menu=yes" rel="nofollow"><img border="0" src="http://wpa.qq.com/pa?p=2:5133948:51" alt="点击这里给我发消息" title="点击这里给我发消息" /></a></a></div>
	<div class="card-body">
		<?php if (!spider_detection()) echoLinks($this->getFriend()); ?>
	</div>
</div>

<?php
if ($theme->options('auto_collect_sort_id') != 0 && !empty($_SERVER['HTTP_REFERER'])) {
	(function () use ($theme, $auto_collect_sort_title) {
		if (spider_detection()) return;

		$referer = $_SERVER['HTTP_REFERER'];
		$parse_url = parse_url($referer);
		$host = $parse_url['host'];

		$auto_collect_excluded_domain = explode('||', $theme->options('auto_collect_excluded_domain'));
		$auto_collect_excluded_domain[] = DOMAIN;
		foreach ($auto_collect_excluded_domain as $value) {
			if ($host == trim($value)) return;
		}

		$http_url = 'http://' . $host . '/';
		$https_url = 'https://' . $host . '/';
		$site_find = Db::name('site')->where('sort_id', $theme->options('auto_collect_sort_id'))->where('url', [$http_url, $https_url])->find();
		if (!empty($site_find)) return;

		$url = $parse_url['scheme'] . '://' . $host . '/';
		$site_info = site_info($url, ['icp' => false]);
		if (!is_array($site_info)) {
			if ($theme->options('apply')) {
				showAlert('加入失败', "网址 [{$url}] 加入{$auto_collect_sort_title}失败，{$site_info}，请手动前往收录页面提交站点！", '/apply.html');
			} else {
				showAlert('加入失败', "网址 [{$url}] 加入{$auto_collect_sort_title}失败，{$site_info}，请联系网站管理员！");
			}
			return;
		}

		$referer_link_check = false;
		if (!in_array(rtrim($referer, '/'), [$http_url, $https_url])) {
			$referer_content = \network\http\get($referer);
			// 创建一个DOMDocument对象
			$dom = new DOMDocument();
			// 由于HTML可能不规范，使用@抑制警告
			@$dom->loadHTML($referer_content);
			// 获取所有的 <a> 标签
			$links = $dom->getElementsByTagName('a');
			// 标记是否找到链接
			$referer_link_check = false;
			// 遍历所有的 <a> 标签，检查 href 属性
			foreach ($links as $link) {
				// 确保 $link 是 DOMElement
				if ($link instanceof DOMElement) {
					if (stripos($link->getAttribute('href'), DOMAIN)) {
						$referer_link_check = true;
						break;
					}
				}
			}
		}
		if (empty($site_info['title'])) {
			$site_info['title'] = $host;
		}

		$title = explode('-', $site_info['title'])[0];
		$title = explode('_', $title)[0];
		$title = explode('|', $title)[0];
		$title = trim($title);

		$referer_site_data = [
			'sort_id' => $theme->options('auto_collect_sort_id'),
			'title' => htmlentities($title),
			'url' => htmlentities($url),
			'rel' => 'nofollow',
			'order' => time(),
			'status' => 0,
			'fields' => ['antidote' => [
				'keywords' => htmlentities($site_info['keywords']),
				'description' => htmlentities($site_info['description']),
				'favicon' => htmlentities($site_info['favicon']),
				'icp' => htmlentities($site_info['icp'])
			]]
		];
		if ($site_info['link'] || $referer_link_check) {
			$referer_site_data['status'] = 1;
			$insert = Db::name('site')->insert($referer_site_data);
			if ($insert) {
				showAlert('加入成功', "站点 [{$site_info['title']}] 加入{$auto_collect_sort_title}成功，请刷新页面查看！", '/');
			}
		} else {
			$insert = Db::name('site')->insert($referer_site_data);
			if ($insert) {
				showAlert('等待审核', "未检测到您的站点 [{$url}] 添加了本站链接，请等待本站管理员审核！");
			}
		}
		if (!$insert) {
			if ($theme->options('apply')) {
				showAlert('加入失败', "站点 [{$$site_info['title']}] 加入{$auto_collect_sort_title}失败，请手动前往收录页面提交站点！", '/apply.html');
			} else {
				showAlert('加入失败', "站点 [{$$site_info['title']}] 加入{$auto_collect_sort_title}失败，请联系网站管理员！");
			}
		}
	})();
}

function showAlert($title, $content, $location = false)
{
	if ($location) {
		$yes =
			"yes: function() {
				location.href = '{$location}'
			}";
	} else {
		$yes = '';
	}
	echo "<script>
        layer.open({
            type: 0,
            title: '{$title}',
            content: '{$content}',
            $yes
        });
    </script>";
}


if ($this->options('auto_collect_sort_id') != 0) {
?>
	<style>
		.auto_collect_sort_description {
			padding: 10px;
			max-width: 700px;
		}

		.auto_collect_sort_description>pre {
			width: 100%;
			border: none;
			resize: none;
			outline: none;
			text-align: center;
			background: #000;
			color: #00FF00;
			line-height: normal;
			padding: 7px;
			border-radius: 3px;
			white-space: unset;
			font-weight: bold;
		}
	</style>
	<script>
		function auto_collect_sort_description() {
			layer.open({
				type: 1,
				title: '<?= $auto_collect_sort_title ?>说明',
				area: ['auto'], //宽高
				content: '<div class="auto_collect_sort_description"><p style="color: #000;">在贵站添加本站链接或友链后，从贵站访问本站即可自动将贵站加入<?= $auto_collect_sort_title ?>区域，如已加入再次从贵站访问本站将会自动排在第一名，一键添加本站链接代码</p><pre><?= htmlentities("<a href=\"{$this->site->url}\" rel=\"friend\" target=\"_blank\">{$this->site->title}</a>") ?></pre><p style="color: #000;">如果贵站开启了HTTPS，则需在head头部中加入以下代码</p><pre><?= htmlentities('<meta name="referrer" content="always">') ?></pre><p>网站标题：<?= $this->site->title ?></p><p>网站地址：<?= $this->site->url ?></p><p>网站图标：<?= $this->site->url ?>/favicon.ico</p><p>网站描述：<?= $this->site->description ?></p></div>'
			});
		}
	</script>
<?php
}
?>

<?php $this->include('module/footer.php') ?>