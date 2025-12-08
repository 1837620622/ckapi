<?= $this->header() ?>
<?= $this->load($this->themeUrl('assets/dist/css/zui.min.css')) ?>
<?= $this->load($this->cdn('jquery/1.11.0/jquery.min.js')) ?>
<?= $this->load($this->themeUrl('assets/css/style.css')) ?>
<meta name="keywords" content="<?= $this->site->keywords ?>">
<meta name="description" content="<?= $this->site->description ?>">
<script>
    window.Navigator = {
        themeUrl: '<?= $this->themeUrl('', false) ?>'
    }
</script>