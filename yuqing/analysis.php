<?php
/**
 * ========================================
 * 舆情分析页面
 * ========================================
 * 作者: 传康kk
 * 功能: 数据分析、聚类、可视化
 */

// ========================================
// Session配置和登录验证检查
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

// 检查用户是否已登录
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    // 如果未登录，重定向到登录页面，并传递当前页面作为登录后的跳转目标
    header('Location: auth.php?redirect=' . urlencode($_SERVER['REQUEST_URI']));
    exit;
}

// 检查session是否过期（1小时）
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > 3600) {
    session_unset();
    session_destroy();
    header('Location: auth.php?redirect=' . urlencode($_SERVER['REQUEST_URI']));
    exit;
}

// 更新最后活动时间
$_SESSION['last_activity'] = time();

require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>舆情分析 - <?php echo SYSTEM_NAME; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <!-- 图表库 -->
    <script src="https://cdn.jsdelivr.net/npm/echarts@5.4.3/dist/echarts.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/wordcloud@1.2.2/src/wordcloud2.js"></script>
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Microsoft YaHei', sans-serif;
        }
        
        .main-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            margin: 20px auto;
            padding: 30px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
        }
        
        .analysis-card {
            background: #fff;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            border: 1px solid #e9ecef;
        }
        
        .chart-container {
            height: 400px;
            position: relative;
        }
        
        .wordcloud-container {
            height: 300px;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            background: #f8f9fa;
        }
        
        .cluster-item {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            border-left: 4px solid #007bff;
        }
        
        .cluster-title {
            font-weight: bold;
            color: #495057;
            margin-bottom: 10px;
        }
        
        .cluster-keywords {
            color: #6c757d;
            font-size: 0.9rem;
            margin-bottom: 8px;
        }
        
        .cluster-items {
            font-size: 0.85rem;
        }
        
        .sentiment-positive { color: #28a745; }
        .sentiment-negative { color: #dc3545; }
        .sentiment-neutral { color: #6c757d; }
        
        .nav-pills .nav-link.active {
            background: linear-gradient(45deg, #667eea, #764ba2);
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 25px;
        }
        
        .stats-card {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            border-radius: 12px;
            padding: 20px;
            text-align: center;
        }
        
        .stats-number {
            font-size: 2rem;
            font-weight: bold;
        }
        
        .loading-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            z-index: 1000;
        }
        
        @media (max-width: 768px) {
            .main-container {
                margin: 10px;
                padding: 20px;
            }
            
            .chart-container {
                height: 300px;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="main-container">
            <!-- 页面头部 -->
            <div class="text-center mb-4">
                <h1 class="text-primary">
                    <i class="bi bi-graph-up-arrow"></i>
                    舆情数据分析
                </h1>
                <p class="text-muted">深度分析热点数据，发现舆情趋势和规律</p>
                <div class="btn-group mb-3">
                    <a href="index.php" class="btn btn-outline-primary">
                        <i class="bi bi-house"></i> 返回首页
                    </a>
                    <button class="btn btn-primary" onclick="refreshAnalysis()">
                        <i class="bi bi-arrow-clockwise"></i> 刷新分析
                    </button>
                    <a href="auth.php?action=logout" class="btn btn-outline-danger" onclick="return confirm('确定要退出登录吗？')">
                        <i class="bi bi-box-arrow-right"></i> 退出登录
                    </a>
                </div>
            </div>

            <!-- 分析统计卡片 -->
            <div class="stats-grid" id="analysisStats">
                <div class="stats-card">
                    <div class="stats-number" id="totalTopics">-</div>
                    <div>识别主题</div>
                </div>
                <div class="stats-card">
                    <div class="stats-number" id="totalClusters">-</div>
                    <div>聚类数量</div>
                </div>
                <div class="stats-card">
                    <div class="stats-number" id="avgSentiment">-</div>
                    <div>平均情感</div>
                </div>
                <div class="stats-card">
                    <div class="stats-number" id="trendingKeywords">-</div>
                    <div>热门关键词</div>
                </div>
            </div>

            <!-- 分析标签页 -->
            <ul class="nav nav-pills justify-content-center mb-4" id="analysisTabs">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="pill" href="#overview">概览分析</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="pill" href="#clustering">聚类分析</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="pill" href="#sentiment">情感分析</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="pill" href="#trends">趋势分析</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="pill" href="#keywords">关键词云</a>
                </li>
            </ul>

            <!-- 标签页内容 -->
            <div class="tab-content">
                <!-- 概览分析 -->
                <div class="tab-pane fade show active" id="overview">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="analysis-card">
                                <h5><i class="bi bi-pie-chart"></i> 平台分布</h5>
                                <div class="chart-container" id="platformChart"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="analysis-card">
                                <h5><i class="bi bi-bar-chart"></i> 热度分布</h5>
                                <div class="chart-container" id="hotChart"></div>
                            </div>
                        </div>
                    </div>
                    <div class="analysis-card">
                        <h5><i class="bi bi-graph-up"></i> 时间趋势</h5>
                        <div class="chart-container" id="timeChart"></div>
                    </div>
                </div>

                <!-- 聚类分析 -->
                <div class="tab-pane fade" id="clustering">
                    <div class="analysis-card">
                        <h5><i class="bi bi-diagram-3"></i> 主题聚类结果</h5>
                        <div class="mb-3">
                            <button class="btn btn-outline-primary btn-sm" onclick="performClustering()">
                                <i class="bi bi-cpu"></i> 重新聚类
                            </button>
                            <select class="form-select d-inline-block w-auto ms-2" id="clusterMethod">
                                <option value="kmeans">K-Means聚类</option>
                                <option value="keyword">关键词聚类</option>
                                <option value="similarity">相似度聚类</option>
                            </select>
                        </div>
                        <div id="clusterResults">
                            <div class="text-center py-4">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="visually-hidden">分析中...</span>
                                </div>
                                <p class="mt-2">正在进行聚类分析...</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 情感分析 -->
                <div class="tab-pane fade" id="sentiment">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="analysis-card">
                                <h5><i class="bi bi-emoji-smile"></i> 情感分布</h5>
                                <div class="chart-container" id="sentimentChart"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="analysis-card">
                                <h5><i class="bi bi-graph-up-arrow"></i> 情感趋势</h5>
                                <div class="chart-container" id="sentimentTrendChart"></div>
                            </div>
                        </div>
                    </div>
                    <div class="analysis-card">
                        <h5><i class="bi bi-list-ul"></i> 情感详情</h5>
                        <div id="sentimentDetails"></div>
                    </div>
                </div>

                <!-- 趋势分析 -->
                <div class="tab-pane fade" id="trends">
                    <div class="analysis-card">
                        <h5><i class="bi bi-graph-up"></i> 热度变化趋势</h5>
                        <div class="chart-container" id="heatTrendChart"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="analysis-card">
                                <h5><i class="bi bi-trophy"></i> 热门事件排行</h5>
                                <div id="topEvents"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="analysis-card">
                                <h5><i class="bi bi-lightning"></i> 突发事件检测</h5>
                                <div id="emergingEvents"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 关键词云 -->
                <div class="tab-pane fade" id="keywords">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="analysis-card">
                                <h5><i class="bi bi-cloud"></i> 关键词云图</h5>
                                <div class="wordcloud-container" id="wordcloudContainer"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="analysis-card">
                                <h5><i class="bi bi-list-ol"></i> 热词排行</h5>
                                <div id="keywordRanking"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // 全局变量
        let analysisData = null;
        let charts = {};

        // 页面初始化
        document.addEventListener('DOMContentLoaded', function() {
            initAnalysis();
        });

        // 初始化分析
        function initAnalysis() {
            refreshAnalysis();
        }

        // 刷新分析
        function refreshAnalysis() {
            showLoading();
            
            fetch('api.php?action=getAnalysisData', {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest' // 标识为AJAX请求
                }
            })
                .then(response => response.json())
                .then(data => {
                    if (data.code === 200) {
                        analysisData = data.data;
                        updateAnalysisStats();
                        renderAllCharts();
                        performClustering();
                    } else {
                        console.error('分析数据获取失败:', data.message);
                    }
                })
                .catch(error => {
                    console.error('网络错误:', error);
                });
        }

        // 显示加载状态
        function showLoading() {
            const containers = ['platformChart', 'hotChart', 'timeChart', 'sentimentChart'];
            containers.forEach(id => {
                const container = document.getElementById(id);
                if (container) {
                    container.innerHTML = '<div class="loading-overlay"><div class="spinner-border text-primary"></div></div>';
                }
            });
        }

        // 更新分析统计
        function updateAnalysisStats() {
            if (!analysisData) return;
            
            document.getElementById('totalTopics').textContent = analysisData.stats.topics || '-';
            document.getElementById('totalClusters').textContent = analysisData.stats.clusters || '-';
            document.getElementById('avgSentiment').textContent = analysisData.stats.sentiment || '-';
            document.getElementById('trendingKeywords').textContent = analysisData.stats.keywords || '-';
        }

        // 渲染所有图表
        function renderAllCharts() {
            renderPlatformChart();
            renderHotChart();
            renderTimeChart();
            renderSentimentChart();
            renderSentimentTrendChart();
            renderHeatTrendChart();
            renderWordCloud();
            updateSentimentDetails();
            updateTopEvents();
            updateEmergingEvents();
            updateKeywordRanking();
        }

        // 平台分布饼图
        function renderPlatformChart() {
            const chart = echarts.init(document.getElementById('platformChart'));
            const option = {
                tooltip: {
                    trigger: 'item',
                    formatter: '{a} <br/>{b}: {c} ({d}%)'
                },
                legend: {
                    orient: 'vertical',
                    left: 'left'
                },
                series: [{
                    name: '平台分布',
                    type: 'pie',
                    radius: '50%',
                    data: analysisData?.platforms || [],
                    emphasis: {
                        itemStyle: {
                            shadowBlur: 10,
                            shadowOffsetX: 0,
                            shadowColor: 'rgba(0, 0, 0, 0.5)'
                        }
                    }
                }]
            };
            chart.setOption(option);
            charts.platformChart = chart;
        }

        // 热度分布柱状图
        function renderHotChart() {
            const chart = echarts.init(document.getElementById('hotChart'));
            const option = {
                tooltip: {
                    trigger: 'axis',
                    axisPointer: {
                        type: 'shadow'
                    }
                },
                grid: {
                    left: '3%',
                    right: '4%',
                    bottom: '3%',
                    containLabel: true
                },
                xAxis: {
                    type: 'category',
                    data: analysisData?.hotness?.categories || []
                },
                yAxis: {
                    type: 'value'
                },
                series: [{
                    name: '热度',
                    type: 'bar',
                    data: analysisData?.hotness?.values || [],
                    itemStyle: {
                        color: new echarts.graphic.LinearGradient(0, 0, 0, 1, [
                            {offset: 0, color: '#83bff6'},
                            {offset: 0.5, color: '#188df0'},
                            {offset: 1, color: '#188df0'}
                        ])
                    }
                }]
            };
            chart.setOption(option);
            charts.hotChart = chart;
        }

        // 时间趋势图
        function renderTimeChart() {
            const chart = echarts.init(document.getElementById('timeChart'));
            const option = {
                tooltip: {
                    trigger: 'axis'
                },
                legend: {
                    data: ['热点数量', '平均热度']
                },
                grid: {
                    left: '3%',
                    right: '4%',
                    bottom: '3%',
                    containLabel: true
                },
                xAxis: {
                    type: 'category',
                    boundaryGap: false,
                    data: analysisData?.timeline?.times || []
                },
                yAxis: {
                    type: 'value'
                },
                series: [
                    {
                        name: '热点数量',
                        type: 'line',
                        stack: 'Total',
                        data: analysisData?.timeline?.counts || []
                    },
                    {
                        name: '平均热度',
                        type: 'line',
                        stack: 'Total',
                        data: analysisData?.timeline?.avgHeat || []
                    }
                ]
            };
            chart.setOption(option);
            charts.timeChart = chart;
        }

        // 情感分布图
        function renderSentimentChart() {
            const chart = echarts.init(document.getElementById('sentimentChart'));
            const option = {
                tooltip: {
                    trigger: 'item'
                },
                legend: {
                    top: '5%',
                    left: 'center'
                },
                series: [{
                    name: '情感分布',
                    type: 'pie',
                    radius: ['40%', '70%'],
                    avoidLabelOverlap: false,
                    itemStyle: {
                        borderRadius: 10,
                        borderColor: '#fff',
                        borderWidth: 2
                    },
                    label: {
                        show: false,
                        position: 'center'
                    },
                    emphasis: {
                        label: {
                            show: true,
                            fontSize: '40',
                            fontWeight: 'bold'
                        }
                    },
                    labelLine: {
                        show: false
                    },
                    data: analysisData?.sentiment?.distribution || []
                }]
            };
            chart.setOption(option);
            charts.sentimentChart = chart;
        }

        // 情感趋势图
        function renderSentimentTrendChart() {
            const chart = echarts.init(document.getElementById('sentimentTrendChart'));
            const option = {
                tooltip: {
                    trigger: 'axis'
                },
                legend: {
                    data: ['正面', '负面', '中性']
                },
                grid: {
                    left: '3%',
                    right: '4%',
                    bottom: '3%',
                    containLabel: true
                },
                xAxis: {
                    type: 'category',
                    boundaryGap: false,
                    data: analysisData?.sentiment?.timeline || []
                },
                yAxis: {
                    type: 'value'
                },
                series: [
                    {
                        name: '正面',
                        type: 'line',
                        data: analysisData?.sentiment?.positive || [],
                        itemStyle: { color: '#28a745' }
                    },
                    {
                        name: '负面',
                        type: 'line',
                        data: analysisData?.sentiment?.negative || [],
                        itemStyle: { color: '#dc3545' }
                    },
                    {
                        name: '中性',
                        type: 'line',
                        data: analysisData?.sentiment?.neutral || [],
                        itemStyle: { color: '#6c757d' }
                    }
                ]
            };
            chart.setOption(option);
            charts.sentimentTrendChart = chart;
        }

        // 热度趋势图
        function renderHeatTrendChart() {
            const chart = echarts.init(document.getElementById('heatTrendChart'));
            const option = {
                tooltip: {
                    trigger: 'axis',
                    axisPointer: {
                        type: 'cross',
                        label: {
                            backgroundColor: '#6a7985'
                        }
                    }
                },
                legend: {
                    data: Object.keys(analysisData?.heatTrend || {})
                },
                grid: {
                    left: '3%',
                    right: '4%',
                    bottom: '3%',
                    containLabel: true
                },
                xAxis: {
                    type: 'category',
                    boundaryGap: false,
                    data: analysisData?.heatTrend?.timeline || []
                },
                yAxis: {
                    type: 'value'
                },
                series: generateHeatTrendSeries()
            };
            chart.setOption(option);
            charts.heatTrendChart = chart;
        }

        // 生成热度趋势系列
        function generateHeatTrendSeries() {
            if (!analysisData?.heatTrend) return [];
            
            const series = [];
            const colors = ['#5470c6', '#91cc75', '#fac858', '#ee6666', '#73c0de', '#3ba272', '#fc8452', '#9a60b4', '#ea7ccc'];
            let colorIndex = 0;
            
            Object.keys(analysisData.heatTrend).forEach(platform => {
                if (platform !== 'timeline') {
                    series.push({
                        name: platform,
                        type: 'line',
                        data: analysisData.heatTrend[platform],
                        itemStyle: { color: colors[colorIndex % colors.length] }
                    });
                    colorIndex++;
                }
            });
            
            return series;
        }

        // 渲染词云
        function renderWordCloud() {
            const container = document.getElementById('wordcloudContainer');
            if (!analysisData?.keywords) return;
            
            container.innerHTML = '';
            
            WordCloud(container, {
                list: analysisData.keywords,
                gridSize: Math.round(16 * container.offsetWidth / 1024),
                weightFactor: function (size) {
                    return Math.pow(size, 2.3) * container.offsetWidth / 1024;
                },
                fontFamily: 'Microsoft YaHei, sans-serif',
                color: function (word, weight) {
                    return (weight === 12) ? '#f02222' : '#c09292';
                },
                rotateRatio: 0.5,
                backgroundColor: '#f8f9fa'
            });
        }

        // 执行聚类分析
        function performClustering() {
            const method = document.getElementById('clusterMethod')?.value || 'kmeans';
            const container = document.getElementById('clusterResults');
            
            container.innerHTML = `
                <div class="text-center py-4">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">聚类分析中...</span>
                    </div>
                    <p class="mt-2">正在使用${method}进行聚类分析...</p>
                </div>
            `;
            
            fetch(`api.php?action=clustering&method=${method}`, {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest' // 标识为AJAX请求
                }
            })
                .then(response => response.json())
                .then(data => {
                    if (data.code === 200) {
                        displayClusterResults(data.data.clusters);
                    } else {
                        container.innerHTML = `<div class="alert alert-danger">聚类分析失败: ${data.message}</div>`;
                    }
                })
                .catch(error => {
                    container.innerHTML = `<div class="alert alert-danger">网络错误: ${error.message}</div>`;
                });
        }

        // 显示聚类结果
        function displayClusterResults(clusters) {
            const container = document.getElementById('clusterResults');
            let html = '';
            
            clusters.forEach((cluster, index) => {
                html += `
                    <div class="cluster-item">
                        <div class="cluster-title">聚类 ${index + 1} (${cluster.count}个项目)</div>
                        <div class="cluster-keywords">关键词: ${cluster.keywords.join(', ')}</div>
                        <div class="cluster-items">
                            ${cluster.items.slice(0, 3).map(item => `• ${item.title}`).join('<br>')}
                            ${cluster.items.length > 3 ? `<br>... 还有${cluster.items.length - 3}个项目` : ''}
                        </div>
                    </div>
                `;
            });
            
            container.innerHTML = html || '<div class="alert alert-info">暂无聚类结果</div>';
        }

        // 更新情感详情
        function updateSentimentDetails() {
            const container = document.getElementById('sentimentDetails');
            if (!analysisData?.sentiment?.details) {
                container.innerHTML = '<div class="alert alert-info">暂无情感分析详情</div>';
                return;
            }
            
            let html = '';
            analysisData.sentiment.details.forEach(item => {
                const sentimentClass = item.sentiment === 'positive' ? 'sentiment-positive' : 
                                     item.sentiment === 'negative' ? 'sentiment-negative' : 'sentiment-neutral';
                const sentimentText = item.sentiment === 'positive' ? '正面' : 
                                     item.sentiment === 'negative' ? '负面' : '中性';
                
                html += `
                    <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                        <div class="flex-grow-1">
                            <div class="fw-bold">${item.title}</div>
                            <small class="text-muted">${item.platform}</small>
                        </div>
                        <div>
                            <span class="badge ${sentimentClass}">${sentimentText}</span>
                            <small class="text-muted ms-2">${item.score}%</small>
                        </div>
                    </div>
                `;
            });
            
            container.innerHTML = html;
        }

        // 更新热门事件
        function updateTopEvents() {
            const container = document.getElementById('topEvents');
            if (!analysisData?.topEvents) {
                container.innerHTML = '<div class="alert alert-info">暂无热门事件数据</div>';
                return;
            }
            
            let html = '<ol class="list-group list-group-numbered">';
            analysisData.topEvents.forEach(event => {
                html += `
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">${event.title}</div>
                            <small class="text-muted">${event.platform}</small>
                        </div>
                        <span class="badge bg-primary rounded-pill">${event.hotNum}</span>
                    </li>
                `;
            });
            html += '</ol>';
            
            container.innerHTML = html;
        }

        // 更新突发事件
        function updateEmergingEvents() {
            const container = document.getElementById('emergingEvents');
            if (!analysisData?.emergingEvents) {
                container.innerHTML = '<div class="alert alert-info">暂无突发事件检测</div>';
                return;
            }
            
            let html = '';
            analysisData.emergingEvents.forEach(event => {
                html += `
                    <div class="alert alert-warning py-2">
                        <div class="fw-bold">${event.title}</div>
                        <small class="text-muted">增长率: +${event.growth}% | ${event.platform}</small>
                    </div>
                `;
            });
            
            container.innerHTML = html || '<div class="alert alert-success">暂无突发事件</div>';
        }

        // 更新关键词排行
        function updateKeywordRanking() {
            const container = document.getElementById('keywordRanking');
            if (!analysisData?.keywordRanking) {
                container.innerHTML = '<div class="alert alert-info">暂无关键词排行</div>';
                return;
            }
            
            let html = '<ol class="list-group list-group-flush">';
            analysisData.keywordRanking.forEach((keyword, index) => {
                html += `
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span>${keyword.word}</span>
                        <span class="badge bg-primary rounded-pill">${keyword.count}</span>
                    </li>
                `;
            });
            html += '</ol>';
            
            container.innerHTML = html;
        }

        // 响应式图表调整
        window.addEventListener('resize', function() {
            Object.values(charts).forEach(chart => {
                if (chart && typeof chart.resize === 'function') {
                    chart.resize();
                }
            });
            
            // 重新渲染词云
            if (document.getElementById('wordcloudContainer').offsetWidth > 0) {
                renderWordCloud();
            }
        });
    </script>
</body>
</html> 