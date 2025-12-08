<?php
// 注册主题API路由

use system\library\Route;

$route = Route::rule('/api/[{action}]', function ($param) {
    $action = $param['action'];
    if ($action == 'validatecode') {
        include_once THEME_ROOT . 'api/validatecode.php';
        exit;
    }
});