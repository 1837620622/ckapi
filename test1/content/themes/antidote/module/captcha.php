<?php
require_once $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'common.php';
$_vc = new system\library\Captcha();
$_vc->doimg();
$_SESSION['antidote_captcha'] = $_vc->getCode();