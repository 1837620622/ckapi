<?php

use system\library\Json;
use system\library\Route;

// 注册主题开发API路由
$route = Route::rule('/api/[{action}]', function ($param) {
    Api::initialize();
    $return = call_user_func(['Api', $param['action']]);
    Json::echo($return);
});

class Api
{
    /**
     * @return \system\theme\Method
     */
    public static $theme;

    public static function initialize()
    {
        self::$theme = new \system\theme\Method;
    }

    public static function getSites()
    {
        return self::$theme->getSites();
    }
}