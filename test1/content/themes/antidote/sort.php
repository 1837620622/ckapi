<?php
$sort = $this->getSort($id);
$this->require('module/header.php', ['title' => $sort->title]);
?>
<div class="container">
	<ul class="sort">
		<li><a href="<?= OZDAO_URL; ?>"><span>返回首页</span> <i class="fa fa-home fa-fw"></i></a></li>
		<?php echoSideSorts($this->getSort(), $sort->id); ?>
	</ul>
	<div id="main">
		<div class="card board">
			<span class="icon"><i class="fa fa-map-signs fa-fw"></i></span>
			<?php echoBoard($sort->title); ?>
		</div>
		<div class="card">
			<div class="card-head">
				<i class="<?php // echo $sort['icon']; 
							?> fa-fw"></i><?= $sort->title; ?>
			</div>
			<div class="card-body">
				<?php echoSites($this->getSites($id)); ?>
			</div>
		</div>
		<?php // echoPaging($siteNum, $nowPage, $CONFIG['sitePaging']); ?>
		<?php // echoAd($ads[0]); ?>
	</div>
	<div id="side">
		<div class="card">
			<div class="card-head"><i class="fa fa-bar-chart fa-fw"></i>分类总TOP10</div>
			<div class="card-body">
				<?php echoSiteRanking(site_ranking('total', 10, 0, $id), 'total'); ?>
			</div>
		</div>
		<?php // echoAd($ads[1]); ?>
	</div>
</div>

<?php
$this->include('module/footer.php');
?>