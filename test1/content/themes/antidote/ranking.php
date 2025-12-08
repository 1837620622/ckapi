<?php $this->include('module/header.php', ['title' => '排行磅单']) ?>
<div class="container">
	<div class="card board">
		<span class="icon"><i class="fa fa-map-signs fa-fw"></i></span>
		<?php echoBoard('排行磅单'); ?>
	</div>
	<div class="ranking">
		<div class="oz-md-4 oz-sm-6 oz-md-12">
			<div class="card">
				<div class="card-head"><i>Day</i>日浏览榜</div>
				<div class="card-body">
					<?php echoSiteRanking(site_ranking('day', 30), 'day'); ?>
				</div>
			</div>
			<?php
			$advert_list = getAdverts('ranking_day');
			foreach ($advert_list as $key => $value) {
				echoAd($value);
			}
			?>
		</div>
		<div class="oz-md-4 oz-sm-6 oz-md-12">
			<div class="card">
				<div class="card-head"><i>Month</i>月浏览榜</div>
				<div class="card-body">
					<?php echoSiteRanking(site_ranking('month', 30), 'month'); ?>
				</div>
			</div>
			<?php
			$advert_list = getAdverts('ranking_month');
			foreach ($advert_list as $key => $value) {
				echoAd($value);
			}
			?>
			<?php // echoAd($ads[1]); ?>
		</div>
		<div class="oz-md-4 oz-sm-6 oz-md-12">
			<div class="card">
				<div class="card-head"><i>Total</i>总浏览榜</div>
				<div class="card-body">
					<?php echoSiteRanking(site_ranking('total', 30), 'total'); ?>
				</div>
			</div>
			<?php
			$advert_list = getAdverts('ranking_total');
			foreach ($advert_list as $key => $value) {
				echoAd($value);
			}
			?>
			<?php // echoAd($ads[2]); ?>
		</div>
	</div>
</div>

<?php
$this->include('module/footer.php');
?>