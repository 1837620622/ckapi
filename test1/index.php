<?php
/*
 * @Author        : 易航
 * @Url           : http://guide.bri6.cn
 * @Date          : 2022-10-10 00:00:00
 * @LastEditTime  : 2024-08-10 00:00:00
 * @Email         : 2136118039@qq.com
 * @Project       : 易航网址导航系统
 * @Description   : 一款极其优雅的易航网址导航系统
 * @Read me       : 感谢您使用易航网址导航系统，系统源码有详细的注释，支持二次开发。
 * @Remind        : 使用盗版系统会存在各种未知风险。支持正版，从我做起！
*/

require_once 'public/common.php';

// 获取主题，默认值为 THEME 常量
$theme = $_GET['theme'] ?? THEME;

// 注册插件
system\plugin\Manager::register();

// 注册插件路由
system\plugin\Manager::trigger('route');

define('LOAD_THEME', true);

// 加载主题自定义路由
system\theme\Manager::needFile('public/route', $theme);

// 注册主题路由
$register = system\library\Route::rule('/[{mod}]', function ($param) use ($theme) {
    // 初始化主题方法并载入主题文件
    $method = new system\theme\Method($theme);
    return $method->__load($param['mod']);
});

// 如果主题路由注册失败则响应404错误
if (!$register) response404();