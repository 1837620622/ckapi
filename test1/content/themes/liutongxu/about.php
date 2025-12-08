<!DOCTYPE html>
<html lang="zh-CN">

<head>
	<title>关于 - <?= $this->site->title ?></title>
	<?= $this->require('modules/head.php') ?>
</head>

<body class="io-grey-mode">
	<div id="loading">
		<div class="loader">一个有范的导航</div>
	</div>
	<div class="page-container">
		<?php $this->require('modules/aside.php') ?>
		<div class="main-content flex-fill">
			<?php $this->require('modules/header.php') ?>
			<div id="content" class="content-site customize-site">
				<div class="placeholder" style="height:74px"></div>
				<div id="content" class="container my-4 my-md-5">
					<div class="panel card">
						<div class="card-body">
							<div class="panel-header mb-4">
								<h1 class="h3">关于</h1>
							</div>
							<div class="panel-body mt-2">
								<?= $this->options('about') ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php $this->include('modules/footer.php') ?>
		</div><!-- main-content end -->
	</div><!-- page-container end -->
	<?php $this->include('modules/search-modal.php') ?>
</body>

</html>