<?php

/**
 * 来自网络收集
 *
 * @package 动态白云
 * @author 沐沐
 * @version 1.0
 * @link https://github.com/mlandjx/start
 */
if (!defined('ROOT')) exit;
$title = $this->site->title;
$link = $this->getSites();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<?= $this->header() ?>
	<meta http-equiv="pragma" content="no-cache">
	<meta http-equiv="cache-control" content="no-cache">
	<meta http-equiv="expires" content="0">
	<title><?= $title ?></title>
	<meta name="keywords" content="<?= $this->site->keywords ?>">
	<meta name="description" content="<?= $this->site->description ?>">
	<?= $this->load($this->themeUrl('assets/css/index.css')) ?>
</head>

<body>
	<div class="tp-content">
		<?php
		foreach ($link as $key => $value) {
		?>
			<a href="<?= $value->url ?>" rel="<?= $value->rel ?>" target="_blank"><img referrer="no-referrer" src="<?= isset($value->fields->icon) ? $value->fields->icon : $this->themeUrl('assets/img/icon.png', false) ?>" /><?= $value->title ?></a>
		<?php
		}
		if (!$this->auth()) echo base64_decode('PGEgaHJlZj0iaHR0cDovL2d1aWRlLmJyaTYuY24vIiB0YXJnZXQ9Il9ibGFuayI+PGltZyBzcmM9Imh0dHA6Ly9ndWlkZS5icmk2LmNuL2Zhdmljb24uaWNvIiAvPjxzcGFuIHN0eWxlPSJjb2xvcjogcmVkOyI+5pys56uZ5ZCM5qy+57O757ufPC9zcGFuPjwvYT4=');
		?>
	</div>
	<p class="copyright">© 2023 - <?= $this->site->domain ?><?php if (!$this->auth()) echo base64_decode('LiDnlLEgPGEgc3R5bGU9ImNvbG9yOiAjMmY5MGI5OyIgaHJlZj0iaHR0cDovL2d1aWRlLmJyaTYuY24vIiByZWw9ImNvcHlyaWdodCI+5piT6Iiq572R5Z2A5byV5a+857O757ufPC9hPiDlvLrlipvpqbHliqg=') ?></p>
	<script type="text/javascript" src="<?= $this->themeUrl('assets/js/ThreeWebGL.js') ?>"></script>
	<script type="text/javascript" src="<?= $this->themeUrl('assets/js/ThreeExtras.js') ?>"></script>
	<script type="text/javascript" src="<?= $this->themeUrl('assets/js/Detector.js') ?>"></script>
	<script type="text/javascript" src="<?= $this->themeUrl('assets/js/RequestAnimationFrame.js') ?>"></script>
	<script id="vs" type="x-shader/x-vertex">
		varying vec2 vUv;
		void main() {
			vUv = uv;
			gl_Position = projectionMatrix * modelViewMatrix * vec4(position, 1.0);
		}
	</script>
	<script id="fs" type="x-shader/x-fragment">
		uniform sampler2D map;
		uniform vec3 fogColor;
		uniform float fogNear;
		uniform float fogFar;
		varying vec2 vUv;
		void main() {
			float depth = gl_FragCoord.z / gl_FragCoord.w;
			float fogFactor = smoothstep(fogNear, fogFar, depth);
			gl_FragColor = texture2D(map, vUv);
			gl_FragColor.w *= pow(gl_FragCoord.z, 20.0);
			gl_FragColor = mix(gl_FragColor, vec4(fogColor, gl_FragColor.w), fogFactor);
		}
	</script>
	<script type="text/javascript" src="<?= $this->themeUrl('assets/js/index.js') ?>"></script>
	<?= $this->footer() ?>
</body>

</html>