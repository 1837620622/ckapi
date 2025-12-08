<?php

use JsonDb\JsonDb\Db;

$this->require('module/header.php', ['title' => '搜索「' . $keyword . '」的结果']);
$sites = $this->getLikeSites("%$keyword%");
?>
<div class="container">
	<div id="main">
		<div class="card board">
			<span class="icon"><i class="fa fa-map-signs fa-fw"></i></span>
			<?php echoBoard('搜索「' . $keyword . '」的结果'); ?>
		</div>
		<div class="card">
			<div class="card-head">
				<i class="fa fa-search fa-fw"></i>搜索「<?= $keyword; ?>」的站点结果
			</div>
			<div class="card-body">
				<?php echoSites($sites); ?>
			</div>
		</div>
		<?php
		$advert_list = getAdverts('search_header');
		foreach ($advert_list as $key => $value) {
			echoAd($value);
		}
		?>
		<!-- <div class="card">
			<div class="card-head">
				<i class="fa fa-search fa-fw"></i>搜索「<?php // echo $keyword; 
														?>」的文章结果
			</div>
			<div class="card-body">
				<?php // echoPosts($posts); 
				?>
			</div>
		</div> -->
		<?php // echoAd($ads[1]); 
		?>
	</div>
	<div id="side">
		<div class="card">
			<div class="card-head"><i class="fa fa-random fa-fw"></i>随机站点推荐</div>
			<div class="card-body">
				<div class="rand-site">
					<?php
					// $length = is_pc() ? 21 : 24;
					$site_list = Db::name('site')->limit(0, 16)->shuffle()->select();
					foreach ($site_list as $key => $value) {
						$site_list[$key]['fields'] = isset($value['fields'][$this->themeName]) ? $value['fields'][$this->themeName] : (object) [];
					}
					$site_list = array_to_object($site_list);
					echoSites($site_list, false, true);
					?>
				</div>
			</div>
		</div>
		<?php
		$advert_list = getAdverts('search_footer');
		foreach ($advert_list as $key => $value) {
			echoAd($value);
		}
		?>
		<!-- <div class="card">
			<div class="card-head"><i class="fa fa-random fa-fw"></i>随机文章推荐</div>
			<div class="card-body">
				<?php // echoPosts($DATA->getRandPosts(5), true); 
				?>
			</div>
		</div> -->
		<?php // echoAd($ads[3]); 
		?>
	</div>
</div>

<?php
$this->include('module/footer.php');
?>