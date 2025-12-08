<?php
// ============================================================
// IP 查询接口 - 获取访客真实IP地址
// 支持PHP 7.0+ 版本
// ============================================================

include("./API.php");
tongji("ip");

// ------------------------------------------------------------
// 设置响应头
// ------------------------------------------------------------
header('Content-Type: text/html; charset=utf-8');

// ------------------------------------------------------------
// 获取访客IP地址函数
// 优先级：HTTP_X_FORWARDED_FOR > HTTP_CLIENT_IP > REMOTE_ADDR
// 返回：IP地址字符串
// ------------------------------------------------------------
function getClientIP() {
    static $realip = null;
    
    // 如果已经获取过，直接返回缓存值
    if ($realip !== null) {
        return $realip;
    }
    
    // 从 $_SERVER 超全局变量获取IP
    if (isset($_SERVER)) {
        if (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
            // 可能包含多个IP，取第一个
            $ips = explode(',', $_SERVER["HTTP_X_FORWARDED_FOR"]);
            $realip = trim($ips[0]);
        } elseif (!empty($_SERVER["HTTP_CLIENT_IP"])) {
            $realip = $_SERVER["HTTP_CLIENT_IP"];
        } else {
            $realip = isset($_SERVER["REMOTE_ADDR"]) ? $_SERVER["REMOTE_ADDR"] : "";
        }
    } else {
        // 从环境变量获取IP
        if (getenv("HTTP_X_FORWARDED_FOR")) {
            $ips = explode(',', getenv("HTTP_X_FORWARDED_FOR"));
            $realip = trim($ips[0]);
        } elseif (getenv("HTTP_CLIENT_IP")) {
            $realip = getenv("HTTP_CLIENT_IP");
        } else {
            $realip = getenv("REMOTE_ADDR") ?: "";
        }
    }
    
    return $realip;
}

// ------------------------------------------------------------
// 输出IP地址
// ------------------------------------------------------------
echo getClientIP();
?>