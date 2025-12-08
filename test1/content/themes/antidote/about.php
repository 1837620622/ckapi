<?php

use JsonDb\JsonDb\Db;

$this->include('module/header.php', ['title' => '关于本站']) ?>
<div class="container">
	<div class="card board">
		<span class="icon"><i class="fa fa-map-signs fa-fw"></i></span>
		<?php echoBoard('关于本站'); ?>
	</div>
	<div class="card">
		<div class="card-head"><i class="fa fa-bullhorn fa-fw"></i> 最新公告</div>
		<div class="card-body content">
			<ul class="oz-timeline">
				<li class="oz-timeline-item">
					<div class="oz-timeline-time"><?= date('Y-m-d H:i:s') ?></div>
					<div class="oz-timeline-main">
						<?= $this->options->notice ?>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<div class="card">
		<div class="card-head"><i class="fa fa-info-circle fa-fw"></i>本站简介</div>
		<div class="card-body content">
			<p>本站名称：<?= $this->site->title ?></p>
			<p>本站关键词：<?= $this->site->keywords ?></p>
			<p>本站描述：<?= $this->site->description ?></p>
			<p>本站域名：<?= $this->site->domain ?></p>
		</div>
	</div>
	<div class="card">
		<div class="card-head"><i class="fa fa-pie-chart fa-fw"></i>网站统计</div>
		<div class="card-body content">
			<p>开设分类：<strong><?= Db::name('sort')->where('status', 1)->count() ?></strong> 个</p>
			<p>收录站点：<strong><?= Db::name('site')->where('status', 1)->count() ?></strong> 个</p>
			<p>待审核站点：<strong><?= Db::name('site')->where('status', '0')->count() ?></strong> 个</p>
			<p>本站已稳定运行了 <strong>
					<script>
						var urodz = new Date(<?= strtotime($this->site->create_date) * 1000; ?>);
						var now = new Date();
						var ile = now.getTime() - urodz.getTime();
						var dni = Math.floor(ile / (1000 * 60 * 60 * 24));
						document.write(+dni)
					</script>
				</strong> 天。
			</p>
		</div>
	</div>
	<div class="card">
		<div class="card-head"><i class="fa fa-telegram fa-fw"></i>联系方式</div>
		<div class="card-body content">
			<p>
				站长QQ：<a href="http://wpa.qq.com/msgrd?v=3&uin=<?= $this->options->qq ?>&site=qq&menu=yes" target="_blank">
					<?= $this->options->qq ?>
				</a>
			</p>
			<p>交流Ｑ群：<a href="<?= $this->options('qq_group_url') ?>" target="_blank" rel="nofollow"><?= $this->options('qq_group') ?></a>
			</p>
			<p>站长邮箱：<a href="mailto:<?= $this->options->email ?>"><?= $this->options->email ?></a></p>
		</div>
	</div>
</div>

<?php $this->include('module/footer.php') ?>