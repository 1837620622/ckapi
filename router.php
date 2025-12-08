<?php
// ============================================================
// 高性能路由器 - 优化请求处理，减少响应时间
// ============================================================

// ------------------------------------------------------------
// 设置执行时间限制和错误报告
// ------------------------------------------------------------
set_time_limit(30);
ini_set('display_errors', 0);
error_reporting(0);

// ------------------------------------------------------------
// 快速静态文件处理
// 静态文件直接返回，不经过 PHP 解析
// ------------------------------------------------------------
$requestUri = $_SERVER['REQUEST_URI'];
$filePath = __DIR__ . parse_url($requestUri, PHP_URL_PATH);

// 静态文件扩展名列表
$staticExtensions = ['css', 'js', 'png', 'jpg', 'jpeg', 'gif', 'ico', 'svg', 'woff', 'woff2', 'ttf', 'eot'];
$extension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

// 如果是静态文件且存在，直接返回
if (in_array($extension, $staticExtensions) && is_file($filePath)) {
    return false; // 让内置服务器处理静态文件
}

// ------------------------------------------------------------
// 设置响应头缓存
// ------------------------------------------------------------
header('X-Content-Type-Options: nosniff');
header('Connection: keep-alive');
header('Keep-Alive: timeout=5, max=100');

// ------------------------------------------------------------
// 健康检查端点 - 快速响应
// 用于负载均衡器和监控
// ------------------------------------------------------------
if ($requestUri === '/health' || $requestUri === '/health/') {
    header('Content-Type: application/json');
    echo json_encode(['status' => 'ok', 'time' => time()]);
    exit;
}

// ------------------------------------------------------------
// 根路径处理
// ------------------------------------------------------------
if ($requestUri === '/' || $requestUri === '/index.php') {
    include __DIR__ . '/index.php';
    exit;
}

// ------------------------------------------------------------
// API 路由处理
// ------------------------------------------------------------
if (strpos($requestUri, '/api/') === 0) {
    $apiFile = __DIR__ . parse_url($requestUri, PHP_URL_PATH);
    if (is_file($apiFile)) {
        include $apiFile;
        exit;
    }
}

// ------------------------------------------------------------
// 默认文件处理
// ------------------------------------------------------------
if (is_file($filePath)) {
    if ($extension === 'php') {
        include $filePath;
        exit;
    }
    return false;
}

// ------------------------------------------------------------
// 目录索引处理
// ------------------------------------------------------------
if (is_dir($filePath)) {
    $indexFile = rtrim($filePath, '/') . '/index.php';
    if (is_file($indexFile)) {
        include $indexFile;
        exit;
    }
    $indexHtml = rtrim($filePath, '/') . '/index.html';
    if (is_file($indexHtml)) {
        return false;
    }
}

// ------------------------------------------------------------
// 404 处理
// ------------------------------------------------------------
http_response_code(404);
if (is_file(__DIR__ . '/404.html')) {
    include __DIR__ . '/404.html';
} else {
    echo '404 Not Found';
}
exit;
