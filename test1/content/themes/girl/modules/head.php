<link rel="stylesheet" type="text/css" href="//cdn.staticfile.org/bootstrap/5.1.3/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?= $this->themeUrl('assets/css/public.css') ?>" />
<script src="<?= $this->cdn('hls.js/1.2.4/hls.min.js') ?>" type="text/javascript"></script>
<script src="<?= $this->cdn('dplayer/1.27.0/DPlayer.min.js') ?>" type="text/javascript"></script>
<script src="<?= $this->cdn('jquery/3.6.0/jquery.min.js') ?>" type="text/javascript"></script>
<style>
	body {
		background-color: <?= $this->options->background_color ?>;
	}
</style>
<?= $this->header() ?>