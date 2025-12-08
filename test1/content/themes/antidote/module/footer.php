<ul class="suspend">
	<li class="back-top" onclick="backTop()">
		<i class="fa fa-chevron-up"></i>
		<span class="more">返回顶部</span>
	</li>
	<li>
		<a href="http://wpa.qq.com/msgrd?v=3&uin=<?= $this->options->qq ?>&site=qq&menu=yes" rel="nofollow" target="_blank">
			<i class="fa fa-qq"></i>
			<span class="more"><?= $this->options->qq ?></span>
		</a>
	</li>
	<li>
		<a href="mailto:<?= $this->options->email ?>" target="_blank">
			<i class="fa fa-envelope"></i>
			<span class="more"><?= $this->options->email ?></span>
		</a>
	</li>
	<?php
	if (!empty(options('WeChat_QR_code'))) {
	?>
		<li>
			<i class="fa fa-weixin"></i>
			<span class="more weixin"><img src="<?= $this->options->WeChat_QR_code ?>" alt="微信二维码"></span>
		</li>
	<?php
	}
	?>
</ul>
<footer class="footer" style="text-align: center;">
	<p>
		<span>Copyright © <?= substr($this->site->create_date, 0, 4) ?> - <?= date('Y'); ?></span>
		<a href="<?= $this->site->url ?>"><?= $this->site->title ?></a>
		<span>All Rights Reserved.</span>
	</p>
	<?php if (!$this->auth()) echo base64_decode('PHA+UG93ZXJlZCBCeSA8YSBocmVmPSJodHRwOi8vbmF2LmJyaTYuY24iIHRhcmdldD0iX2JsYW5rIj7mmJPoiKrnvZHlnYDlr7zoiKrns7vnu588L2E+LjwvcD4=') ?>
	<p><a href="https://beian.miit.gov.cn/" target="_blank"><?= $this->site->icp ?></a><p>
	<?php
	if ($this->options('stats_display')) {
		?>
		<p>今日浏览量：<span style="color: #ff7f00;"><?= visits_data(DATE) ?></span>丨昨日访问人数：<span style="color: #ff7f00;"><?= ip_data(date('Y-m-d', strtotime('-1 days'))) ?></span><p>
		<?php
	}
	?>
</footer>
<script src="<?= $this->themeUrl('assets/js/main.js') ?>"></script>
<?php $this->footer() ?>
</body>

</html>