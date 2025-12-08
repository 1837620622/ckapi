<?php

/**
 * 所长导航，很有范的导航主题
 *
 * @package 所长导航
 * @author liutongxu
 * @version 1.0
 * @link https://github.com/liutongxu/liutongxu.github.io
 */

$sort = $this->getSort();
?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
	<title>首页 - <?= $this->site->title ?></title>
	<?= $this->require('modules/head.php') ?>
</head>

<body class="io-grey-mode">
	<div id="loading">
		<div class="loader">一个有范的导航</div>
	</div>
	<div class="page-container">
		<?php $this->require('modules/aside.php', ['sort' => $sort]) ?>
		<div class="main-content flex-fill">
			<?php $this->require('modules/header.php') ?>
			<div id="content" class="content-site customize-site">
				<?php
				foreach ($sort as $key => $value) {
				?>
					<div class="d-flex flex-fill">
						<h4 class="text-gray text-lg mb-4">
							<i class="site-tag iconfont icon-tag icon-lg mr-1" id="term-<?= $value->id ?>"></i>
							<?= $value->title ?>
						</h4>
						<div class="flex-fill"></div>
						<!-- <a class='btn-move text-xs' href='#'>more+</a> -->
					</div>
					<div class="row ">
						<?php
						$site = $this->getSites($value->id);
						foreach ($site as $k => $v) {
							if (empty($v->fields->favicon)) {
								$parse_url = parse_url($v->url);
								$v->fields->favicon = $parse_url['scheme'] . '://' . $parse_url['host'] . '/favicon.ico';
							}
						?>
							<div class="url-card col-6  col-sm-6 col-md-4 col-xl-5a col-xxl-6a   ">
								<div class="url-body default">
									<a rel="<?= $v->rel ?>" href="<?= $v->url ?>" target="_blank" data-id="<?= $v->id ?>" data-url="<?= $v->url ?>" class="card no-c  mb-4 site-<?= $v->id ?>" data-toggle="tooltip" data-placement="bottom" title="<?= $v->fields->description ?? '' ?>">
										<div class="card-body">
											<div class="url-content d-flex align-items-center">
												<div class="url-img rounded-circle mr-2 d-flex align-items-center justify-content-center">
													<img class="lazy" src="<?= $v->fields->favicon ?>" data-src="<?= $v->fields->favicon ?>" onerror="javascript:this.src='assets/images/ico/wangzhi2.png'" alt="GitHub">
												</div>
												<div class="url-info flex-fill">
													<div class="text-sm overflowClip_1">
														<strong><?= $v->title ?></strong>
													</div>
													<p class="overflowClip_1 m-0 text-muted text-xs"><?= $v->fields->description ?? '' ?></p>
												</div>
											</div>
										</div>
									</a>
									<a href="<?= $v->url ?>" class="togo text-center text-muted is-views" data-id="<?= $v->id ?>" data-toggle="tooltip" data-placement="right" title="直达" rel="nofollow"><i class="iconfont icon-goto"></i></a>
								</div>
							</div>
						<?php
						}
						?>
					</div>
				<?php
				}
				?>
				<h4 class="text-gray text-lg mb-4">
					<i class="iconfont icon-book-mark-line icon-lg mr-2" id="friendlink"></i>友情链接
				</h4>
				<div class="friendlink text-xs card">
					<div class="card-body">
						<?php
						$friends = $this->getFriend();
						foreach ($friends as $key => $value) {
						?>
							<a rel="<?= $value->rel ?>" href="<?= $value->url ?>" title="<?= $value->title ?>" target="_blank"><?= $value->title ?></a>
						<?php
						}
						?>
					</div>
				</div>
			</div>
			<?php $this->include('modules/footer.php') ?>
		</div><!-- main-content end -->
	</div><!-- page-container end -->
	<?php $this->include('modules/search-modal.php') ?>
</body>

</html>