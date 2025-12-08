<footer class="footer text-center bg-white">
	<div class="container"><span id="hitokoto"></span></div>
	<?= date('Y'); ?> <a href="<?= $this->site->url; ?>"><?= $this->site->title ?></a><?php if (!$this->auth()) echo base64_decode('LueUsSA8YSBzdHlsZT0iY29sb3I6IzMyODBmYyIgaHJlZj0iaHR0cDovL2d1aWRlLmJyaTYuY24iIHRhcmdldD0iX2JsYW5rIj7mmJPoiKrnvZHlnYDlvJXlr7zns7vnu588L2E+IOW8uuWKm+mpseWKqA==') ?>
</footer>
<?= $this->footer() ?>