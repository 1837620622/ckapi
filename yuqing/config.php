<?php
/**
 * ========================================
 * 系统配置文件
 * ========================================
 * 作者: 传康kk
 * 功能: 实时舆情监控系统配置
 */

// ========================================
// API配置信息
// ========================================
define('API_BASE_URL', 'https://support.lidunbd.com:40001/api/check/hotList');

// 支持的热点类型配置
define('HOT_TYPES', [
    'bilibilisearch' => '哔哩哔哩搜索',
    'wangyisearch' => '网易搜索', 
    'wangyivideo' => '网易视频',
    'xinlang' => '新浪',
    'kuaishou' => '快手',
    'douyin' => '抖音',
    'tieba' => '百度贴吧',
    'baidu' => '百度热搜',
    'weibo' => '新浪微博',
    'toutiao' => '头条热点'
]);

// ========================================
// 系统配置信息
// ========================================
define('SYSTEM_NAME', 'PHP舆情监控分析系统');
define('VERSION', '1.0.0');
define('AUTHOR', '传康kk');
define('CONTACT', 'Vx:1837620622 邮箱:2040168455@qq.com');

// 时区设置
date_default_timezone_set('Asia/Shanghai');

// 错误报告设置（生产环境建议关闭）
error_reporting(E_ALL);
ini_set('display_errors', 1);

// ========================================
// 热点数据获取类
// ========================================
class HotDataFetcher {
    private $baseUrl;
    private $timeout;
    
    /**
     * 构造函数
     */
    public function __construct($timeout = 30) {
        $this->baseUrl = API_BASE_URL;
        $this->timeout = $timeout;
    }
    
    /**
     * 获取指定平台的热点数据
     */
    public function fetchHotData($hotType) {
        $url = $this->baseUrl . '?hotType=' . $hotType;
        
        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, $this->timeout);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36');
            
            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $error = curl_error($ch);
            curl_close($ch);
            
            if ($error) {
                throw new Exception('CURL错误: ' . $error);
            }
            
            if ($httpCode !== 200) {
                throw new Exception('HTTP错误: ' . $httpCode);
            }
            
            $data = json_decode($response, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new Exception('JSON解析错误: ' . json_last_error_msg());
            }
            
            return $data;
            
        } catch (Exception $e) {
            writeLog('获取热点数据失败 - ' . $hotType . ': ' . $e->getMessage(), 'ERROR');
            return [];
        }
    }
    
    /**
     * 获取所有平台的热点数据
     */
    public function fetchAllHotData() {
        $allData = [];
        
        foreach (HOT_TYPES as $type => $name) {
            $data = $this->fetchHotData($type);
            
            if (!empty($data)) {
                $allData[$type] = [
                    'name' => $name,
                    'data' => $data,
                    'count' => count($data),
                    'update_time' => date('Y-m-d H:i:s')
                ];
            }
            
            // 避免请求过于频繁
            usleep(500000); // 0.5秒延迟
        }
        
        return $allData;
    }
    
    /**
     * 搜索热点数据
     */
    public function searchHotData($keyword, $platforms = []) {
        $results = [];
        $searchPlatforms = empty($platforms) ? array_keys(HOT_TYPES) : $platforms;
        
        foreach ($searchPlatforms as $type) {
            $data = $this->fetchHotData($type);
            
            foreach ($data as $item) {
                if (stripos($item['title'], $keyword) !== false) {
                    $item['platform'] = HOT_TYPES[$type];
                    $item['platform_type'] = $type;
                    $results[] = $item;
                }
            }
        }
        
        return $results;
    }
}

// ========================================
// 工具函数
// ========================================

/**
 * 记录日志
 */
function writeLog($message, $level = 'INFO') {
    $timestamp = date('Y-m-d H:i:s');
    $logMessage = "[{$timestamp}] [{$level}] {$message}" . PHP_EOL;
    
    if (!is_dir('logs')) {
        mkdir('logs', 0755, true);
    }
    
    file_put_contents('logs/system.log', $logMessage, FILE_APPEND | LOCK_EX);
}

/**
 * 输出JSON响应
 */
function jsonResponse($data, $code = 200, $message = 'success') {
    // 清理任何之前的输出
    if (ob_get_level()) {
        ob_clean();
    }
    
    // 设置响应头
    header('Content-Type: application/json;charset=utf-8');
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type, X-Requested-With');
    header('Cache-Control: no-cache, must-revalidate');
    
    // 设置HTTP状态码
    http_response_code($code >= 200 && $code < 300 ? 200 : $code);
    
    $response = [
        'code' => $code,
        'message' => $message,
        'data' => $data,
        'timestamp' => time(),
        'datetime' => date('Y-m-d H:i:s')
    ];
    
    $json = json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    
    if (json_last_error() !== JSON_ERROR_NONE) {
        // JSON编码失败，输出错误信息
        $errorResponse = [
            'code' => 500,
            'message' => 'JSON编码失败: ' . json_last_error_msg(),
            'data' => null,
            'timestamp' => time(),
            'datetime' => date('Y-m-d H:i:s')
        ];
        $json = json_encode($errorResponse, JSON_UNESCAPED_UNICODE);
    }
    
    echo $json;
    exit;
}

/**
 * 安全的POST数据获取
 */
function getPost($key, $default = '') {
    return isset($_POST[$key]) ? trim($_POST[$key]) : $default;
}

/**
 * 安全的GET数据获取
 */
function getGet($key, $default = '') {
    return isset($_GET[$key]) ? trim($_GET[$key]) : $default;
}

/**
 * 格式化热度数字
 */
function formatHotNum($hotNum) {
    if (empty($hotNum) || !is_numeric($hotNum)) {
        return '-';
    }
    
    $num = intval($hotNum);
    if ($num >= 100000000) {
        return round($num / 100000000, 1) . '亿';
    } elseif ($num >= 10000) {
        return round($num / 10000, 1) . '万';
    } else {
        return number_format($num);
    }
}

/**
 * 获取平台图标
 */
function getPlatformIcon($type) {
    $icons = [
        'bilibilisearch' => '🎬',
        'wangyisearch' => '📰',
        'wangyivideo' => '📺',
        'xinlang' => '🌐',
        'kuaishou' => '📱',
        'douyin' => '🎵',
        'tieba' => '💬',
        'baidu' => '🔍',
        'weibo' => '🌟',
        'toutiao' => '📰'
    ];
    
    return isset($icons[$type]) ? $icons[$type] : '📊';
}

/**
 * 创建必要的目录
 */
if (!is_dir('logs')) {
    mkdir('logs', 0755, true);
}
if (!is_dir('cache')) {
    mkdir('cache', 0755, true);
}
?> 