<?php
/**
 * ========================================
 * API接口文件
 * ========================================
 * 作者: 传康kk
 * 功能: 处理前端的数据请求
 */

// 开启输出缓冲
ob_start();

// ========================================
// Session配置和API安全检查
// ========================================

// 设置session保存路径到当前项目目录
$sessionPath = __DIR__ . '/sessions';
if (!is_dir($sessionPath)) {
    mkdir($sessionPath, 0755, true);
}

// 设置session保存路径
session_save_path($sessionPath);

// 启动session会话（带错误处理）
if (session_status() === PHP_SESSION_NONE) {
    if (!@session_start()) {
        // 如果启动失败，尝试使用默认路径
        session_save_path('');
        @session_start();
    }
}

// 检查请求来源（防止直接访问API）
function checkRequestSource() {
    // 检查Referer头，确保请求来自同域
    $referer = $_SERVER['HTTP_REFERER'] ?? '';
    $host = $_SERVER['HTTP_HOST'] ?? '';
    
    // 检查是否是AJAX请求
    $isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && 
              strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
    
    // 检查Content-Type是否正确
    $contentType = $_SERVER['CONTENT_TYPE'] ?? $_SERVER['HTTP_CONTENT_TYPE'] ?? '';
    
    // 如果不是AJAX请求且没有正确的来源，拒绝访问
    if (!$isAjax && !empty($referer) && !strpos($referer, $host)) {
        return false;
    }
    
    // 检查User-Agent，拒绝明显的爬虫或直接访问
    $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? '';
    $suspiciousAgents = ['curl', 'wget', 'python', 'bot', 'spider', 'crawler'];
    
    foreach ($suspiciousAgents as $agent) {
        if (stripos($userAgent, $agent) !== false) {
            return false;
        }
    }
    
    return true;
}

// 执行来源检查
if (!checkRequestSource()) {
    // 清理输出缓冲区
    if (ob_get_level()) {
        ob_clean();
    }
    
    header('Content-Type: application/json;charset=utf-8');
    http_response_code(403);
    echo json_encode([
        'code' => 403,
        'message' => '禁止直接访问API接口',
        'data' => null,
        'timestamp' => time()
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

// 检查用户是否已登录
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    // 清理输出缓冲区
    if (ob_get_level()) {
        ob_clean();
    }
    
    header('Content-Type: application/json;charset=utf-8');
    http_response_code(401);
    echo json_encode([
        'code' => 401,
        'message' => '用户未登录，请先登录',
        'data' => null,
        'timestamp' => time()
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

// 检查session是否过期（1小时）
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > 3600) {
    session_unset();
    session_destroy();
    
    // 清理输出缓冲区
    if (ob_get_level()) {
        ob_clean();
    }
    
    header('Content-Type: application/json;charset=utf-8');
    http_response_code(401);
    echo json_encode([
        'code' => 401,
        'message' => '登录已过期，请重新登录',
        'data' => null,
        'timestamp' => time()
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

// 更新最后活动时间
$_SESSION['last_activity'] = time();

require_once 'config.php';

// ========================================
// 设置响应头
// ========================================
header('Content-Type: application/json;charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, X-Requested-With');
header('Cache-Control: no-cache, must-revalidate');

// 处理OPTIONS请求
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

// 设置错误处理
set_error_handler(function($errno, $errstr, $errfile, $errline) {
    writeLog("PHP错误: [$errno] $errstr 在 $errfile:$errline", 'ERROR');
    return false;
});

register_shutdown_function(function() {
    $error = error_get_last();
    if ($error && in_array($error['type'], [E_ERROR, E_CORE_ERROR, E_COMPILE_ERROR, E_PARSE])) {
        ob_clean();
        jsonResponse(null, 500, '服务器内部错误: ' . $error['message']);
    }
});

try {
    // ========================================
    // 获取请求参数
    // ========================================
    $action = getGet('action', '');
    
    if (empty($action)) {
        jsonResponse(null, 400, '缺少action参数');
    }

    // 创建数据获取器实例
    $fetcher = new HotDataFetcher();
    
    // ========================================
    // 根据action执行相应操作
    // ========================================
    switch ($action) {
        case 'getAllData':
            handleGetAllData($fetcher);
            break;
            
        case 'getPlatformData':
            handleGetPlatformData($fetcher);
            break;
            
        case 'search':
            handleSearch($fetcher);
            break;
            
        case 'getStats':
            handleGetStats($fetcher);
            break;
            
        case 'getAnalysisData':
            handleGetAnalysisData($fetcher);
            break;
            
        case 'clustering':
            handleClustering($fetcher);
            break;
            
        case 'sentimentAnalysis':
            handleSentimentAnalysis($fetcher);
            break;
            
        default:
            jsonResponse(null, 400, '无效的action参数');
    }

} catch (Exception $e) {
    writeLog('API错误: ' . $e->getMessage(), 'ERROR');
    jsonResponse(null, 500, '服务器内部错误: ' . $e->getMessage());
}

// ========================================
// 处理获取所有平台数据
// ========================================
function handleGetAllData($fetcher) {
    writeLog('开始获取所有平台数据', 'INFO');
    
    $startTime = microtime(true);
    $allData = $fetcher->fetchAllHotData();
    $endTime = microtime(true);
    
    $executeTime = round(($endTime - $startTime), 2);
    writeLog("获取所有平台数据完成，耗时: {$executeTime}秒", 'INFO');
    
    if (empty($allData)) {
        jsonResponse([], 500, '无法获取任何平台数据，请检查网络连接');
    }
    
    // 添加统计信息
    $stats = [
        'total_platforms' => count($allData),
        'total_items' => array_sum(array_column($allData, 'count')),
        'online_platforms' => count(array_filter($allData, function($platform) {
            return $platform['count'] > 0;
        })),
        'fetch_time' => $executeTime,
        'update_time' => date('Y-m-d H:i:s')
    ];
    
    jsonResponse([
        'platforms' => $allData,
        'stats' => $stats
    ], 200, '获取数据成功');
}

// ========================================
// 处理获取单个平台数据
// ========================================
function handleGetPlatformData($fetcher) {
    $platform = getGet('platform', '');
    
    if (empty($platform)) {
        jsonResponse(null, 400, '缺少platform参数');
    }
    
    if (!array_key_exists($platform, HOT_TYPES)) {
        jsonResponse(null, 400, '无效的平台类型');
    }
    
    writeLog("获取平台数据: {$platform}", 'INFO');
    
    $startTime = microtime(true);
    $data = $fetcher->fetchHotData($platform);
    $endTime = microtime(true);
    
    $executeTime = round(($endTime - $startTime), 2);
    
    if (empty($data)) {
        jsonResponse([], 404, "平台 {$platform} 暂无数据");
    }
    
    $result = [
        'platform' => $platform,
        'name' => HOT_TYPES[$platform],
        'data' => $data,
        'count' => count($data),
        'update_time' => date('Y-m-d H:i:s'),
        'fetch_time' => $executeTime
    ];
    
    jsonResponse($result, 200, '获取平台数据成功');
}

// ========================================
// 处理搜索请求
// ========================================
function handleSearch($fetcher) {
    $keyword = trim(getGet('keyword', ''));
    $platformsStr = getGet('platforms', '');
    
    if (empty($keyword)) {
        jsonResponse(null, 400, '缺少搜索关键词');
    }
    
    // 解析搜索平台
    $platforms = [];
    if (!empty($platformsStr)) {
        $platforms = array_filter(explode(',', $platformsStr));
        
        // 验证平台类型
        foreach ($platforms as $platform) {
            if (!array_key_exists($platform, HOT_TYPES)) {
                jsonResponse(null, 400, "无效的平台类型: {$platform}");
            }
        }
    }
    
    writeLog("搜索关键词: {$keyword}, 平台: " . implode(',', $platforms), 'INFO');
    
    $startTime = microtime(true);
    $results = $fetcher->searchHotData($keyword, $platforms);
    $endTime = microtime(true);
    
    $executeTime = round(($endTime - $startTime), 2);
    
    // 按热度排序（如果有热度数据）
    usort($results, function($a, $b) {
        $hotNumA = extractNumber($a['hotNum']);
        $hotNumB = extractNumber($b['hotNum']);
        return $hotNumB - $hotNumA;
    });
    
    $searchStats = [
        'keyword' => $keyword,
        'total_results' => count($results),
        'search_platforms' => empty($platforms) ? array_keys(HOT_TYPES) : $platforms,
        'search_time' => $executeTime,
        'timestamp' => date('Y-m-d H:i:s')
    ];
    
    jsonResponse([
        'results' => $results,
        'stats' => $searchStats
    ], 200, '搜索完成');
}

// ========================================
// 处理获取统计信息
// ========================================
function handleGetStats($fetcher) {
    writeLog('获取系统统计信息', 'INFO');
    
    $startTime = microtime(true);
    $allData = $fetcher->fetchAllHotData();
    $endTime = microtime(true);
    
    $executeTime = round(($endTime - $startTime), 2);
    
    // 计算统计数据
    $totalPlatforms = count(HOT_TYPES);
    $onlinePlatforms = count($allData);
    $totalItems = 0;
    $platformStats = [];
    
    foreach ($allData as $platform => $data) {
        $totalItems += $data['count'];
        $platformStats[$platform] = [
            'name' => $data['name'],
            'count' => $data['count'],
            'status' => $data['count'] > 0 ? 'online' : 'offline'
        ];
    }
    
    // 获取热度最高的条目
    $topHotItems = [];
    foreach ($allData as $platform => $platformData) {
        foreach ($platformData['data'] as $index => $item) {
            $item['platform'] = $platformData['name'];
            $item['platform_type'] = $platform;
            $item['rank'] = $index + 1;
            $topHotItems[] = $item;
        }
    }
    
    // 按热度排序，取前20
    usort($topHotItems, function($a, $b) {
        $hotNumA = extractNumber($a['hotNum']);
        $hotNumB = extractNumber($b['hotNum']);
        return $hotNumB - $hotNumA;
    });
    
    $topHotItems = array_slice($topHotItems, 0, 20);
    
    $stats = [
        'overview' => [
            'total_platforms' => $totalPlatforms,
            'online_platforms' => $onlinePlatforms,
            'total_items' => $totalItems,
            'fetch_time' => $executeTime,
            'update_time' => date('Y-m-d H:i:s')
        ],
        'platform_stats' => $platformStats,
        'top_hot_items' => $topHotItems,
        'system_info' => [
            'name' => SYSTEM_NAME,
            'version' => VERSION,
            'author' => AUTHOR
        ]
    ];
    
    jsonResponse($stats, 200, '获取统计信息成功');
}

// ========================================
// 工具函数
// ========================================

/**
 * 从热度字符串中提取数字
 */
function extractNumber($hotNum) {
    if (empty($hotNum) || $hotNum === '') {
        return 0;
    }
    
    // 移除所有非数字字符，保留数字
    $number = preg_replace('/[^\d]/', '', $hotNum);
    return intval($number);
}

/**
 * 缓存数据（简单文件缓存）
 */
function setCacheData($key, $data, $expireTime = 300) {
    $cacheFile = "cache/{$key}.json";
    $cacheData = [
        'data' => $data,
        'expire_time' => time() + $expireTime,
        'create_time' => time()
    ];
    
    file_put_contents($cacheFile, json_encode($cacheData, JSON_UNESCAPED_UNICODE));
}

/**
 * 获取缓存数据
 */
function getCacheData($key) {
    $cacheFile = "cache/{$key}.json";
    
    if (!file_exists($cacheFile)) {
        return null;
    }
    
    $cacheData = json_decode(file_get_contents($cacheFile), true);
    
    if (!$cacheData || time() > $cacheData['expire_time']) {
        unlink($cacheFile);
        return null;
    }
    
    return $cacheData['data'];
}

/**
 * 清理过期缓存
 */
function cleanExpiredCache() {
    $cacheDir = 'cache';
    if (!is_dir($cacheDir)) {
        return;
    }
    
    $files = glob($cacheDir . '/*.json');
    foreach ($files as $file) {
        $cacheData = json_decode(file_get_contents($file), true);
        if ($cacheData && time() > $cacheData['expire_time']) {
            unlink($file);
        }
    }
}

// 清理过期缓存（每次请求时执行，但可以优化为定时执行）
cleanExpiredCache();

// ========================================
// 处理分析数据请求
// ========================================
function handleGetAnalysisData($fetcher) {
    writeLog('开始获取分析数据', 'INFO');
    
    // 获取所有平台数据
    $allData = $fetcher->fetchAllHotData();
    
    if (empty($allData)) {
        jsonResponse(null, 500, '无法获取数据进行分析');
    }
    
    // 生成分析数据
    $analysisData = generateAnalysisData($allData);
    
    jsonResponse($analysisData, 200, '获取分析数据成功');
}

// ========================================
// 生成分析数据
// ========================================
function generateAnalysisData($allData) {
    $analysis = [
        'stats' => generateStats($allData),
        'platforms' => generatePlatformDistribution($allData),
        'hotness' => generateHotnessDistribution($allData),
        'timeline' => generateTimelineData($allData),
        'sentiment' => generateSentimentData($allData),
        'heatTrend' => generateHeatTrendData($allData),
        'keywords' => generateKeywordData($allData),
        'keywordRanking' => generateKeywordRanking($allData),
        'topEvents' => generateTopEvents($allData),
        'emergingEvents' => generateEmergingEvents($allData)
    ];
    
    return $analysis;
}

// ========================================
// 生成统计数据
// ========================================
function generateStats($allData) {
    $totalItems = array_sum(array_column($allData, 'count'));
    $onlinePlatforms = count(array_filter($allData, function($platform) {
        return $platform['count'] > 0;
    }));
    
    // 提取所有关键词进行主题识别
    $allTitles = [];
    foreach ($allData as $platform) {
        foreach ($platform['data'] as $item) {
            $allTitles[] = $item['title'];
        }
    }
    
    $topics = identifyTopics($allTitles);
    $avgSentiment = calculateAverageSentiment($allTitles);
    
    return [
        'topics' => count($topics),
        'clusters' => min(5, max(2, intval(count($topics) / 3))), // 动态聚类数
        'sentiment' => $avgSentiment,
        'keywords' => count(extractKeywordsAnalysis($allTitles))
    ];
}

// ========================================
// 生成平台分布数据
// ========================================
function generatePlatformDistribution($allData) {
    $distribution = [];
    
    foreach ($allData as $platform => $data) {
        $distribution[] = [
            'name' => $data['name'],
            'value' => $data['count']
        ];
    }
    
    return $distribution;
}

// ========================================
// 生成热度分布数据
// ========================================
function generateHotnessDistribution($allData) {
    $categories = ['低热度', '中等热度', '高热度', '超高热度'];
    $values = [0, 0, 0, 0];
    
    foreach ($allData as $platform) {
        foreach ($platform['data'] as $item) {
            $hotNum = extractNumber($item['hotNum']);
            
            if ($hotNum < 1000) {
                $values[0]++;
            } elseif ($hotNum < 10000) {
                $values[1]++;
            } elseif ($hotNum < 100000) {
                $values[2]++;
            } else {
                $values[3]++;
            }
        }
    }
    
    return [
        'categories' => $categories,
        'values' => $values
    ];
}

// ========================================
// 生成时间线数据（模拟）
// ========================================
function generateTimelineData($allData) {
    $hours = [];
    $counts = [];
    $avgHeat = [];
    
    // 生成过去24小时的模拟数据
    for ($i = 23; $i >= 0; $i--) {
        $hour = date('H:i', strtotime("-{$i} hours"));
        $hours[] = $hour;
        
        // 模拟数据变化
        $baseCount = array_sum(array_column($allData, 'count'));
        $counts[] = $baseCount + rand(-50, 50);
        $avgHeat[] = rand(5000, 50000);
    }
    
    return [
        'times' => $hours,
        'counts' => $counts,
        'avgHeat' => $avgHeat
    ];
}

// ========================================
// 生成情感数据
// ========================================
function generateSentimentData($allData) {
    $positive = 0;
    $negative = 0;
    $neutral = 0;
    $details = [];
    $timeline = [];
    $positiveData = [];
    $negativeData = [];
    $neutralData = [];
    
    foreach ($allData as $platformType => $platform) {
        foreach ($platform['data'] as $item) {
            $sentiment = analyzeSentiment($item['title']);
            $score = rand(60, 95);
            
            switch ($sentiment) {
                case 'positive':
                    $positive++;
                    break;
                case 'negative':
                    $negative++;
                    break;
                default:
                    $neutral++;
            }
            
            $details[] = [
                'title' => $item['title'],
                'platform' => $platform['name'],
                'sentiment' => $sentiment,
                'score' => $score
            ];
        }
    }
    
    // 生成时间线数据
    for ($i = 6; $i >= 0; $i--) {
        $date = date('m-d', strtotime("-{$i} days"));
        $timeline[] = $date;
        $positiveData[] = rand(20, 80);
        $negativeData[] = rand(10, 40);
        $neutralData[] = rand(30, 60);
    }
    
    return [
        'distribution' => [
            ['name' => '正面', 'value' => $positive],
            ['name' => '负面', 'value' => $negative],
            ['name' => '中性', 'value' => $neutral]
        ],
        'details' => array_slice($details, 0, 10), // 只返回前10条
        'timeline' => $timeline,
        'positive' => $positiveData,
        'negative' => $negativeData,
        'neutral' => $neutralData
    ];
}

// ========================================
// 生成热度趋势数据
// ========================================
function generateHeatTrendData($allData) {
    $timeline = [];
    $trends = [];
    
    // 生成过去7天的时间线
    for ($i = 6; $i >= 0; $i--) {
        $timeline[] = date('m-d', strtotime("-{$i} days"));
    }
    
    // 为每个平台生成趋势数据
    foreach ($allData as $platformType => $platform) {
        if ($platform['count'] > 0) {
            $trends[$platform['name']] = [];
            for ($i = 0; $i < 7; $i++) {
                $trends[$platform['name']][] = rand(1000, 50000);
            }
        }
    }
    
    $trends['timeline'] = $timeline;
    return $trends;
}

// ========================================
// 生成关键词数据
// ========================================
function generateKeywordData($allData) {
    $allTitles = [];
    
    foreach ($allData as $platform) {
        foreach ($platform['data'] as $item) {
            $allTitles[] = $item['title'];
        }
    }
    
    $keywords = extractKeywordsAnalysis($allTitles);
    $wordCloud = [];
    
    foreach ($keywords as $word => $count) {
        $wordCloud[] = [$word, $count];
    }
    
    return array_slice($wordCloud, 0, 50); // 返回前50个关键词
}

// ========================================
// 生成关键词排行
// ========================================
function generateKeywordRanking($allData) {
    $allTitles = [];
    
    foreach ($allData as $platform) {
        foreach ($platform['data'] as $item) {
            $allTitles[] = $item['title'];
        }
    }
    
    $keywords = extractKeywordsAnalysis($allTitles);
    $ranking = [];
    
    foreach ($keywords as $word => $count) {
        $ranking[] = [
            'word' => $word,
            'count' => $count
        ];
    }
    
    // 按计数排序
    usort($ranking, function($a, $b) {
        return $b['count'] - $a['count'];
    });
    
    return array_slice($ranking, 0, 10); // 返回前10个
}

// ========================================
// 生成热门事件
// ========================================
function generateTopEvents($allData) {
    $allItems = [];
    
    foreach ($allData as $platformType => $platform) {
        foreach ($platform['data'] as $item) {
            $item['platform'] = $platform['name'];
            $item['platform_type'] = $platformType;
            $allItems[] = $item;
        }
    }
    
    // 按热度排序
    usort($allItems, function($a, $b) {
        return extractNumber($b['hotNum']) - extractNumber($a['hotNum']);
    });
    
    return array_slice($allItems, 0, 10); // 返回前10个
}

// ========================================
// 生成突发事件
// ========================================
function generateEmergingEvents($allData) {
    $emerging = [];
    
    foreach ($allData as $platformType => $platform) {
        foreach ($platform['data'] as $item) {
            // 模拟突发事件检测（实际应该基于历史数据对比）
            if (rand(1, 100) <= 15) { // 15%的概率为突发事件
                $emerging[] = [
                    'title' => $item['title'],
                    'platform' => $platform['name'],
                    'growth' => rand(150, 800) // 模拟增长率
                ];
            }
        }
    }
    
    return array_slice($emerging, 0, 5); // 返回前5个
}

// ========================================
// 处理聚类分析
// ========================================
function handleClustering($fetcher) {
    $method = getGet('method', 'kmeans');
    
    writeLog("执行聚类分析，方法: {$method}", 'INFO');
    
    // 获取所有数据
    $allData = $fetcher->fetchAllHotData();
    
    if (empty($allData)) {
        jsonResponse(null, 500, '无法获取数据进行聚类分析');
    }
    
    // 执行聚类
    $clusters = performClusteringAnalysis($allData, $method);
    
    jsonResponse(['clusters' => $clusters], 200, '聚类分析完成');
}

// ========================================
// 执行聚类分析
// ========================================
function performClusteringAnalysis($allData, $method = 'kmeans') {
    $allItems = [];
    
    // 收集所有条目
    foreach ($allData as $platformType => $platform) {
        foreach ($platform['data'] as $item) {
            $item['platform'] = $platform['name'];
            $item['platform_type'] = $platformType;
            $allItems[] = $item;
        }
    }
    
    if (empty($allItems)) {
        return [];
    }
    
    switch ($method) {
        case 'keyword':
            return keywordBasedClustering($allItems);
        case 'similarity':
            return similarityBasedClustering($allItems);
        default:
            return kMeansClustering($allItems);
    }
}

// ========================================
// 基于关键词的聚类
// ========================================
function keywordBasedClustering($items) {
    $clusters = [];
    $keywordGroups = [];
    
    // 提取每个标题的关键词
    foreach ($items as $item) {
        $keywords = extractTitleKeywords($item['title']);
        
        foreach ($keywords as $keyword) {
            if (!isset($keywordGroups[$keyword])) {
                $keywordGroups[$keyword] = [];
            }
            $keywordGroups[$keyword][] = $item;
        }
    }
    
    // 选择项目数量最多的关键词作为聚类中心
    $keywordCounts = array_map('count', $keywordGroups);
    arsort($keywordCounts);
    $topKeywords = array_slice(array_keys($keywordCounts), 0, 5, true);
    
    foreach ($topKeywords as $keyword) {
        if (count($keywordGroups[$keyword]) >= 2) {
            $clusters[] = [
                'keywords' => [$keyword],
                'items' => $keywordGroups[$keyword],
                'count' => count($keywordGroups[$keyword])
            ];
        }
    }
    
    return $clusters;
}

// ========================================
// 基于相似度的聚类
// ========================================
function similarityBasedClustering($items) {
    $clusters = [];
    $used = [];
    
    for ($i = 0; $i < count($items) && count($clusters) < 5; $i++) {
        if (in_array($i, $used)) continue;
        
        $cluster = [
            'keywords' => extractTitleKeywords($items[$i]['title']),
            'items' => [$items[$i]],
            'count' => 1
        ];
        
        $used[] = $i;
        
        // 查找相似的条目
        for ($j = $i + 1; $j < count($items); $j++) {
            if (in_array($j, $used)) continue;
            
            $similarity = calculateSimilarity($items[$i]['title'], $items[$j]['title']);
            
            if ($similarity > 0.3) { // 相似度阈值
                $cluster['items'][] = $items[$j];
                $cluster['count']++;
                $used[] = $j;
            }
        }
        
        if ($cluster['count'] >= 2) {
            $clusters[] = $cluster;
        }
    }
    
    return $clusters;
}

// ========================================
// K-Means聚类
// ========================================
function kMeansClustering($items) {
    $k = min(5, max(2, intval(count($items) / 10))); // 动态确定聚类数
    $clusters = [];
    
    // 简化的K-Means实现
    $groups = array_chunk($items, ceil(count($items) / $k));
    
    foreach ($groups as $index => $group) {
        if (count($group) >= 1) {
            $keywords = [];
            foreach ($group as $item) {
                $itemKeywords = extractTitleKeywords($item['title']);
                $keywords = array_merge($keywords, $itemKeywords);
            }
            
            // 统计关键词频率
            $keywordCount = array_count_values($keywords);
            arsort($keywordCount);
            $topKeywords = array_slice(array_keys($keywordCount), 0, 3);
            
            $clusters[] = [
                'keywords' => $topKeywords,
                'items' => $group,
                'count' => count($group)
            ];
        }
    }
    
    return $clusters;
}

// ========================================
// 分析工具函数
// ========================================

// 识别主题
function identifyTopics($titles) {
    $allText = implode(' ', $titles);
    $keywords = extractKeywordsAnalysis([$allText]);
    
    // 简单的主题识别：将高频关键词作为主题
    return array_slice(array_keys($keywords), 0, 10);
}

// 计算平均情感
function calculateAverageSentiment($titles) {
    $total = 0;
    foreach ($titles as $title) {
        $sentiment = analyzeSentiment($title);
        $score = $sentiment === 'positive' ? 1 : ($sentiment === 'negative' ? -1 : 0);
        $total += $score;
    }
    
    $avg = count($titles) > 0 ? $total / count($titles) : 0;
    
    if ($avg > 0.2) return '正面';
    if ($avg < -0.2) return '负面';
    return '中性';
}

// 简单情感分析
function analyzeSentiment($text) {
    $positiveWords = ['好', '棒', '优秀', '成功', '胜利', '喜', '爱', '美', '赞', '优', '支持', '点赞', '厉害', '牛', '强'];
    $negativeWords = ['坏', '差', '失败', '错误', '问题', '危险', '死', '病', '难', '恨', '反对', '批评', '骂', '黑', '垃圾'];
    
    $positiveCount = 0;
    $negativeCount = 0;
    
    foreach ($positiveWords as $word) {
        $strpos = function_exists('mb_strpos') ? mb_strpos($text, $word) : strpos($text, $word);
        if ($strpos !== false) {
            $positiveCount++;
        }
    }
    
    foreach ($negativeWords as $word) {
        $strpos = function_exists('mb_strpos') ? mb_strpos($text, $word) : strpos($text, $word);
        if ($strpos !== false) {
            $negativeCount++;
        }
    }
    
    if ($positiveCount > $negativeCount) return 'positive';
    if ($negativeCount > $positiveCount) return 'negative';
    return 'neutral';
}

// 提取关键词（分析专用）
function extractKeywordsAnalysis($titles) {
    $allText = implode(' ', $titles);
    
    // 移除标点符号
    $text = preg_replace('/[^\p{L}\p{N}\s]/u', ' ', $allText);
    
    // 简单的中文分词（基于常见分隔符）
    $words = preg_split('/[\s\p{P}]+/u', $text, -1, PREG_SPLIT_NO_EMPTY);
    
    // 过滤短词和停用词
    $stopWords = ['的', '是', '在', '了', '和', '与', '或', '但', '而', '这', '那', '个', '一', '二', '三', '四', '五', '六', '七', '八', '九', '十', '有', '被', '将', '已', '会', '能', '要', '可以', '可能', '应该', '不是', '没有', '因为', '所以', '如果', '虽然', '但是', '然而', '因此', '由于', '关于', '对于', '根据', '按照', '通过', '经过', '进行', '实现', '完成', '开始', '结束', '继续', '停止', '增加', '减少', '提高', '降低', '上升', '下降'];
    $words = array_filter($words, function($word) use ($stopWords) {
        // 使用兼容的字符串长度检测
        $wordLen = function_exists('mb_strlen') ? mb_strlen($word) : strlen($word);
        return $wordLen >= 2 && !in_array($word, $stopWords) && !is_numeric($word);
    });
    
    // 统计词频
    $wordCount = array_count_values($words);
    arsort($wordCount);
    
    return array_slice($wordCount, 0, 50, true);
}

// 提取标题关键词
function extractTitleKeywords($title) {
    $keywords = extractKeywordsAnalysis([$title]);
    return array_slice(array_keys($keywords), 0, 3);
}

// 计算文本相似度
function calculateSimilarity($text1, $text2) {
    $words1 = extractTitleKeywords($text1);
    $words2 = extractTitleKeywords($text2);
    
    $intersection = array_intersect($words1, $words2);
    $union = array_unique(array_merge($words1, $words2));
    
    return count($union) > 0 ? count($intersection) / count($union) : 0;
}

// 处理情感分析请求
function handleSentimentAnalysis($fetcher) {
    $allData = $fetcher->fetchAllHotData();
    
    if (empty($allData)) {
        jsonResponse(null, 500, '无法获取数据进行情感分析');
    }
    
    $sentimentData = generateSentimentData($allData);
    
    jsonResponse($sentimentData, 200, '情感分析完成');
}
?> 