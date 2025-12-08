<?php
require_once 'functions.php';
ob_start();
//定义系统根目录
define('OZDAO_ROOT', str_replace('\\', '/', dirname(__FILE__)) . '/');
//网站固定地址
define('OZDAO_URL', getRealUrl());
//模板地址
define('TEMPLATE_URL', $this->themeUrl . '/');
//图片地址
define('IMAGES_URL', TEMPLATE_URL . 'assets/images/');