<?php

use JsonDb\JsonDb\Db;
use system\library\Request;

$site = $this->getSite($site_id);
if (empty($site) || $site->status != 1) response404();
$total_view = $site->fields->total_view ?? 0;
$month_view = $site->fields->{date('Y_m') . '_view'} ?? 0;
// $month_view = month_view($site->id);
$day_view = $site->fields->{date('Y_m_d') . '_view'} ?? 0;
// $day_view = day_view($site->id);
$star = isset($site->fields->star) ? ($site->fields->star == 'auto' ? getStarNum($total_view) : $site->fields->star) : getStarNum($total_view);
$sort = $this->getSort($site->sort_id);
$domain = getDomain($site->url);

if (isset($_COOKIE['site_view'])) {
	$site_view = explode('|', $_COOKIE['site_view']);
	if (!in_array($site_id, $site_view)) {
		$day_view++;
		$month_view++;
		$total_view++;
		Db::name('site')->merge('fields')->where('id', $site_id)->update([
			'fields' => [$this->themeName => [
				date('Y_m_d_') . 'view' => $day_view,
				date('Y_m_') . 'view' => $month_view,
				'total_view' => $total_view
			]]
		]);
		$site_view[] = $site_id;
		$site_view = implode('|', $site_view);
		setcookie('site_view', $site_view, time() + 60 * 60 * 24);
	}
} else {
	$day_view++;
	$month_view++;
	$total_view++;
	Db::name('site')->merge('fields')->where('id', $site_id)->update([
		'fields' => [$this->themeName => [
			date('Y_m_d_') . 'view' => $day_view,
			date('Y_m_') . 'view' => $month_view,
			'total_view' => $total_view
		]]
	]);
	$site_view = $site_id;
	setcookie('site_view', $site_view, time() + 60 * 60 * 24);
}

$this->include('module/header.php', ['title' => strip_tags($site->title)]);

if (!empty($site->fields->qq)) {
	$site_qq = $site->fields->qq;
	$site_qq = "<a rel=\"nofollow\" title=\"$site_qq\" href=\"http://wpa.qq.com/msgrd?v=3&uin=$site_qq&site=qq&menu=yes\" target=\"_blank\">$site_qq</a>";
} else {
	$site_qq = '暂无';
}
?>
<div class="container">
	<div id="main">
		<div class="card board">
			<span class="icon"><i class="fa fa-map-signs fa-fw"></i></span>
			<?php echoBoard($site->title, $sort); ?>
		</div>
		<div class="card">
			<div class="card-body">
				<div class="site-main">
					<span class="title"><?= $site->title; ?></span>
					<span class="oz-xs-12 oz-sm-6 oz-lg-6">站点域名：<?= $domain; ?></span>
					<span class="oz-xs-12 oz-sm-6 oz-lg-6">站点星级：<img class="lazy-load" src="<?= TEMPLATE_URL; ?>assets/images/star/<?= $star ?>.png" alt=""></span>
					<span class="oz-xs-12 oz-sm-6 oz-lg-6">收录时间：<?= $site->create_time ?></span>
					<span class="oz-xs-12 oz-sm-6 oz-lg-6">备案信息：<a title="<?= $site->fields->icp ?? '暂无' ?>" href="http://icp.chinaz.com/<?= $domain; ?>" target="_blank"><?= $site->fields->icp ?? '暂无' ?></a></span>
					<span class="oz-xs-6 oz-sm-6 oz-lg-6">站长ＱＱ：<?= $site_qq ?></span>
					<span class="oz-xs-6 oz-sm-6 oz-lg-6">所属分类：<a href="<?= $this->buildUrl('sort/' . $sort->id) ?>"><?= $sort->title ?></a></span>
					<span class="oz-xs-6 oz-sm-6 oz-lg-6">日浏览数：<?= convertNum($day_view); ?>次</span>
					<span class="oz-xs-6 oz-sm-6 oz-lg-6">月浏览数：<?= convertNum($month_view); ?>次</span>
					<span class="oz-xs-6 oz-sm-6 oz-lg-6">总浏览数：<?= convertNum($total_view); ?>次</span>
					<span class="oz-xs-6 oz-sm-6 oz-lg-6">百度权重：<img class="lazy-load" src="https://baidurank.aizhan.com/api/br?domain=<?= $domain; ?>&style=images"></span>
					<span class="oz-xs-6 oz-sm-6 oz-lg-6">移动权重：<img class="lazy-load" src="https://baidurank.aizhan.com/api/mbr?domain=<?= $domain; ?>&style=images"></span>
					<span class="oz-xs-6 oz-sm-6 oz-lg-6">搜狗权重：<img class="lazy-load" src="https://sogourank.aizhan.com/api/mbr?domain=<?= $domain; ?>"></span>
				</div>
				<div class="site-side">
					<div class="snapshot">
						<img class="lazy-load" src="<?= $this->themeUrl('assets/images/loading.gif') ?>" data-src="https://s0.wp.com/mshots/v1/<?= $site->url ?>?w=1280&h=960" alt="">
					</div>
					<a href="<?= $this->buildUrl('goto/' . $site->id) ?>" target="_blank" class="oz-btn oz-btn-lg oz-btn-block oz-bg-orange">
						<i class="fa fa-telegram fa-fw" aria-hidden="true"></i> 网站直达
					</a>
					<?php
					$site_love = empty($_COOKIE['site_love']) ? '' : $_COOKIE['site_love'];
					$site_love = explode('|', $site_love);
					if (in_array($site_id, $site_love)) {
					?>
						<button class="oz-btn oz-btn-lg oz-btn-block oz-bg-blue" style="pointer-events: none; cursor: not-allowed; opacity: 0.8;">
							<i class="fa fa-thumbs-up fa-fw active" aria-hidden="true"></i>
							<span>已赞 [<?= $site->fields->love ?? 0 ?>]</span>
						</button>
					<?php
					} else {
					?>
						<button class="oz-btn oz-btn-lg oz-btn-block oz-bg-blue" onclick="addLove(this, <?= $site->id; ?>)">
							<i class="fa fa-thumbs-o-up fa-fw" aria-hidden="true"></i>
							<span>点赞 [<?= $site->fields->love ?? 0 ?>]</span>
						</button>
					<?php
					}
					?>
				</div>
			</div>
		</div>

		<div class="card">
			<div class="card-head"><i class="fa fa-map-pin fa-fw" aria-hidden="true"></i> 快捷查询：</div>
			<div class="card-body">
				<?php
				$quick_query_list = [
					['网站SEO报告', 'http://report.chinaz.com/' . $domain, '//report.chinaz.com/favicon.ico'],
					['SEO综合查询', 'http://seo.chinaz.com/' . $domain, '//seo.chinaz.com/favicon.ico'],
					['综合权重查询', 'http://rank.chinaz.com/all/' . $domain, '//rank.chinaz.com/favicon.ico'],
					['Whois查询', 'http://whois.chinaz.com/?DomainName=' . $domain, '//whois.chinaz.com/favicon.ico'],
					['Alexa排名查询', 'http://alexa.chinaz.com/' . $domain, '//alexa.chinaz.com/favicon.ico'],
					['PR查询', 'http://pr.chinaz.com/?PRAddress=' . $domain, '//pr.chinaz.com/favicon.ico'],
					// ['网站测速', 'http://tool.chinaz.com/speedtest.aspx?host=' . $domain, '//tool.chinaz.com/favicon.ico'],
					['ICP备案查询', 'http://icp.chinaz.com/' . $domain, '//icp.chinaz.com/favicon.ico'],
					['友链检测', 'http://link.chinaz.com/' . $domain, '//link.chinaz.com/favicon.ico'],
					['百度权重查询', 'http://rank.chinaz.com/?host=' . $domain, '//rank.chinaz.com/favicon.ico'],
					['网站安全检测', 'http://tool.chinaz.com/webscan/?host=' . $domain, '//tool.chinaz.com/favicon.ico'],
					['百度收录查询', 'http://www.baidu.com/s?wd=site:' . $domain, '//www.baidu.com/favicon.ico'],
					['百度搜索', 'http://www.baidu.com/s?wd=' . urlencode($site->title), '//www.baidu.com/favicon.ico'],

				];
				foreach ($quick_query_list as $key => $value) {
				?>
					<a href="<?= $value[1] ?>" target="_blank" title="<?= $value[0] ?>" alt="<?= $value[0] ?>" class="site-item" rel="nofollow">
						<span class="icon">
							<img class="lazy-load" src="<?= $this->themeUrl('assets/images/loading.gif') ?>" data-src="<?= $value[2] ?>" alt="">
						</span>
						<span class="name"><?= $value[0] ?></span>
					</a>
				<?php
				}
				?>
			</div>
		</div>

		<?php
		'<div>
			<a href="//whois.chinaz.com/?DomainName=<?= $domain ?>" target="_blank">Whois查询</a> |
			<a href="//seo.chinaz.com/?host=<?= $domain; ?>" target="_blank">SEO综合查询</a> |
			<a href="//alexa.chinaz.com/?Domain=<?= $domain; ?>" target="_blank">Alexa排名查询</a> |
			<a href="//pr.chinaz.com/?PRAddress=<?= $domain; ?>" target="_blank">PR查询</a> |
			<a href="//tool.chinaz.com/speedtest.aspx?host=<?= $domain; ?>" target="_blank">网站测速</a> |
			<a href="//icp.chinaz.com/?s=<?= $domain; ?>" target="_blank">ICP备案查询</a> |
			<a href="//link.chinaz.com/?wd=<?= $domain; ?>" target="_blank">友情链接检测</a> |
			<a href="//rank.chinaz.com/?host=<?= $domain; ?>" target="_blank">百度权重查询</a> |
			<a href="//tool.chinaz.com/webscan/?host=<?= $domain; ?>" target="_blank">网站安全检测</a> |
			<a href="http://www.baidu.com/s?wd=site%3A<?= $domain; ?>" target="_blank">百度收录查询</a>
		</div>'
		?>

		<div class="card">
			<div class="card-head">
				<i class="fa fa-feed fa-fw" aria-hidden="true"></i> 站点信息
			</div>
			<div class="card-body content">
				<p><b>链接：</b><?= $site->url ?></p>
				<p><b>标题：</b><?= $site->title ?></p>
				<p><b>关键词：</b><?= $site->fields->keywords ?? '暂无'; ?></p>
				<p><b>描述：</b><?= $site->fields->description ?? '暂无'; ?></p>
			</div>
			</span>
		</div>
		<?php
		if ($sort->id == $this->options('auto_collect_sort_id')) {
		?>
			<div class="card">
				<div class="card-head"> <i class="fa fa-bell" aria-hidden="true"></i> <?= $this->site->title ?>版权说明 </div>
				<div class="card-body content">
					<p>1、本网站的数据通过互联网被动抓取取得，版权归属于原网站所有</p>
					<p>2、<?= $this->site->title ?>仅提供原网站信息的展现，并不代表本站认可被展示网站的内容或立场，且不承担任何相关法律责任</p>
					<p>3、<?= $this->site->title ?>拒绝接受违法信息。若发现任何违法内容，请 <a href="http://wpa.qq.com/msgrd?v=3&amp;uin=<?= $this->options('qq') ?>&amp;site=qq&amp;menu=yes">点击立即举报</a></p>
					<p>
						<font style="color:red">特别提醒：</font>
						<span>本页面并非“<?= $site->title ?>”官网，其内容由<?= $this->site->title ?>从互联网收集，仅供展示用途。若有与“<?= $site->title ?>”相关的业务需求，请访问其官方网站获取联系方式。<?= $this->site->title ?>与“<?= $site->title ?>”不存在任何关联关系，对于“<?= $site->title ?>”网站中提供的信息，请用户自行判断其真实性</span>
					</p>
				</div>
			</div>
		<?php
		}
		?>
		<?php
		if ($this->options('apply')) {
		?>
			<div class="card">
				<div class="card-head">
					<i class="fa fa-plus-square fa-fw" aria-hidden="true"></i> 申请收录的好处
				</div>
				<div class="card-body content" style="font-weight: bold;">
					<p>收录可以为您的网站带来诸多益处，比如：</p>
					<p>提升网站权重和排名，提高搜索引擎可见度。</p>
					<p>优化您的网站名称和关键词，使其出现在搜索结果的第一页。</p>
					<p>通过<?= $this->site->title ?>的分类目录平台，为您的网站带来大量流量。</p>
					<p>即使您的网站被搜索引擎屏蔽，<?= $this->site->title ?>也会永久缓存您的网站信息，让用户通过本页面访问您的网站。</p>
					<p style="color:#000000;">如果您希望您的网站被百度收录，我们建议您将<?= $this->site->title ?>添加到您的网站首页作为友情链接，这将有助于提升您网站在搜索引擎中的排名。以下是友情链接代码：</p>
					<p style="color: #008000;font-weight: bold;">&lt;a href="http://<?= $this->site->domain ?>" rel="friend" target="_blank"&gt;<?= $this->site->title ?>&lt;/a&gt;</p>
				</div>
			</div>
		<?php
		}
		?>
		<?php
		$advert_list = getAdverts('site_footer');
		foreach ($advert_list as $key => $value) {
			echoAd($value);
		}
		?>
		<div class="card">
			<div class="card-head">
				<i class="fa fa-magnet fa-fw" aria-hidden="true"></i> 相关站点
			</div>
			<div class="card-body">
				<?php
				$length = Request::isPc() ? 21 : 24;
				$site_list = Db::name('site')->where(['sort_id' => $sort->id, 'status' => 1])->limit(0, $length)->shuffle()->select();
				foreach ($site_list as $key => $value) {
					$site_list[$key]['fields'] = isset($value['fields'][$this->themeName]) ? $value['fields'][$this->themeName] : (object) [];
				}
				$site_list = array_to_object($site_list);
				echoSites($site_list);
				?>
			</div>
			</span>
		</div>
	</div>
	<?php $this->include('module/aside.php') ?>
</div>
<?php $this->include('module/footer.php') ?>