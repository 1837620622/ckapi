<div id="side">
	<?php
	if ($this->options('auto_collect_sort_id')) {
	?>
		<div class="card">
			<div class="card-head"><i class="fa fa-plus-square fa-fw"></i>自动收录方法</div>
			<style>
				.automatic_indexing_method {
					font-size: 14px !important;
				}

				.automatic_indexing_method>input {
					padding: 5px 8px;
					font-size: 15px;
					border: 1px solid #ced4da;
					border-radius: 0.25rem;
					width: 100%;
					color: darkgray;
					margin: 5px 0;
				}
			</style>
			<div class="card-body automatic_indexing_method">
				<p>做上本站链接后点击自动排本站第一</p>
				<input type="text" class="form-control" readonly value="<?= $this->site->title ?>：<?= $this->site->url ?>/">

				<p>一键复制下方链接代码：</p>
				<input type="text" class="form-control" readonly value="<a href='<?= $this->site->url ?>/' target='_blank'><?= $this->site->title ?></a>">

				<p>http网站需要在head头部中加入：</p>
				<input type="text" class="form-control" readonly value="<meta content=&quot;referrer&quot; name=&quot;always&quot;>">
			</div>
		</div>
	<?php
	}
	?>
	<div class="card">
		<div class="card-head"><i class="fa fa-line-chart fa-fw"></i>今日TOP10</div>
		<div class="card-body">
			<?php echoSiteRanking(site_ranking('day', 10), 'day') ?>
		</div>
	</div>
	<div class="card">
		<div class="card-head"><i class="fa fa-coffee fa-fw"></i>最新收录</div>
		<div class="card-body">
			<div class="side-latest oz-timeline">
				<?php echoLatestSites(getLatestSites(5)); ?>
			</div>
		</div>
	</div>
	<div class="card">
		<div class="card-head"><i class="fa fa-pie-chart fa-fw"></i>热度统计</div>
		<div class="card-body side-statistic">
			<?php echoStatistics() ?>
		</div>
	</div>
	<!-- <div class="card">
			<div class="card-head"><i class="fa fa-folder-open fa-fw"></i>文章分类</div>
			<div class="card-body">
				<?php //  echoPostSorts($DATA->getPostSorts()); 
				?>
			</div>
		</div> -->
	<!-- <div class="card">
			<div class="card-head"><i class="fa fa-leaf fa-fw"></i>最新文章</div>
			<div class="card-body">
				<?php // echoPosts($DATA->getLatestPosts(10), true); 
				?>
			</div>
		</div> -->
	<?php
	$advert_list = getAdverts('index_footer');
	foreach ($advert_list as $key => $value) {
		echoAd($value);
	}
	?>
	<?php
	if (!spider_detection()) {
	?>
		<div class="card">
			<div class="card-head"><i class="fa fa-telegram fa-fw"></i>联系方式</div>
			<div class="card-body content">
				<p>站长QQ：<a href="http://wpa.qq.com/msgrd?v=3&uin=<?= $this->options->qq; ?>&site=qq&menu=yes" target="_blank"><?= $this->options->qq ?></a></p>
				<p>交流Ｑ群：<a href="<?= $this->options->qq_group_url ?>" rel="nofollow" target="_blank"><?= $this->options->qq_group ?></a></p>
				<p>站长邮箱：<a href="mailto:<?= $this->options->email ?>"><?= $this->options->email ?></a></p>
			</div>
		</div>
	<?php
	}
	?>
</div>