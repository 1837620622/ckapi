<?php
/**
 * ========================================
 * 舆情监控系统主页
 * ========================================
 * 作者: 传康kk
 * 功能: 实时展示各平台热点数据
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
    <title><?php echo SYSTEM_NAME; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* ======================================== */
        /* 自定义样式 */
        /* ======================================== */
        
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
        
        .header-section {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #e9ecef;
        }
        
        .header-title {
            color: #2c3e50;
            font-weight: bold;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }
        
        .header-subtitle {
            color: #6c757d;
            font-size: 1.1rem;
        }
        
        .platform-card {
            background: #fff;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            border: 1px solid #e9ecef;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .platform-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }
        
        .platform-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #f8f9fa;
        }
        
        .platform-name {
            display: flex;
            align-items: center;
            font-size: 1.3rem;
            font-weight: bold;
            color: #495057;
        }
        
        .platform-icon {
            font-size: 1.5rem;
            margin-right: 10px;
        }
        
        .update-time {
            color: #6c757d;
            font-size: 0.9rem;
        }
        
        .hot-item {
            display: flex;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #f8f9fa;
            transition: background-color 0.2s ease;
        }
        
        .hot-item:hover {
            background-color: #f8f9fa;
            border-radius: 6px;
            padding-left: 10px;
            padding-right: 10px;
        }
        
        .hot-item:last-child {
            border-bottom: none;
        }
        
        .hot-rank {
            background: linear-gradient(45deg, #FF6B6B, #FF8E8E);
            color: white;
            font-weight: bold;
            min-width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            font-size: 0.9rem;
        }
        
        .hot-rank.top3 {
            background: linear-gradient(45deg, #FFD700, #FFA500);
        }
        
        .hot-content {
            flex: 1;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .hot-title {
            color: #2c3e50;
            text-decoration: none;
            font-weight: 500;
            line-height: 1.4;
            flex: 1;
            margin-right: 10px;
        }
        
        .hot-title:hover {
            color: #3498db;
            text-decoration: underline;
        }
        
        .hot-num {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
            white-space: nowrap;
        }
        
        .loading-spinner {
            text-align: center;
            padding: 40px;
            color: #6c757d;
        }
        
        .search-section {
            background: #fff;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }
        
        .control-panel {
            background: #fff;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }
        
        .platform-filter {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 15px;
        }
        
        .platform-filter .btn {
            border-radius: 20px;
            font-size: 0.9rem;
        }
        
        .stats-section {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 25px;
        }
        
        .stats-card {
            background: #fff;
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }
        
        .stats-number {
            font-size: 2rem;
            font-weight: bold;
            color: #495057;
        }
        
        .stats-label {
            color: #6c757d;
            margin-top: 5px;
        }
        
        @media (max-width: 768px) {
            .main-container {
                margin: 10px;
                padding: 20px;
            }
            
            .hot-content {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .hot-num {
                margin-top: 5px;
                align-self: flex-end;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="main-container">
            <!-- ======================================== -->
            <!-- 页面头部 -->
            <!-- ======================================== -->
            <div class="header-section">
                <h1 class="header-title">
                    <i class="bi bi-graph-up-arrow"></i>
                    <?php echo SYSTEM_NAME; ?>
                </h1>
                <p class="header-subtitle">实时监控各大平台热点动态，把握舆情趋势</p>
                <small class="text-muted">
                    版本 <?php echo VERSION; ?> | 作者: <?php echo AUTHOR; ?> | 更新时间: <span id="updateTime">--</span>
                </small>
            </div>

            <!-- ======================================== -->
            <!-- 控制面板 -->
            <!-- ======================================== -->
            <div class="control-panel">
                <div class="row">
                    <div class="col-md-6">
                        <button class="btn btn-primary" onclick="refreshAllData()">
                            <i class="bi bi-arrow-clockwise"></i> 刷新数据
                        </button>
                        <button class="btn btn-success" onclick="toggleAutoRefresh()">
                            <i class="bi bi-play-circle"></i> <span id="autoRefreshText">开启自动刷新</span>
                        </button>
                        <a href="analysis.php" class="btn btn-warning">
                            <i class="bi bi-graph-up-arrow"></i> 数据分析
                        </a>
                    </div>
                    <div class="col-md-6 text-end">
                        <select class="form-select d-inline-block w-auto me-2" id="refreshInterval">
                            <option value="30">30秒刷新</option>
                            <option value="60" selected>1分钟刷新</option>
                            <option value="180">3分钟刷新</option>
                            <option value="300">5分钟刷新</option>
                        </select>
                        <a href="auth.php?action=logout" class="btn btn-outline-danger btn-sm" onclick="return confirm('确定要退出登录吗？')">
                            <i class="bi bi-box-arrow-right"></i> 退出登录
                        </a>
                    </div>
                </div>
            </div>

            <!-- ======================================== -->
            <!-- 搜索功能 -->
            <!-- ======================================== -->
            <div class="search-section">
                <div class="row">
                    <div class="col-md-8">
                        <div class="input-group">
                            <input type="text" class="form-control" id="searchKeyword" placeholder="输入关键词搜索热点内容...">
                            <button class="btn btn-outline-primary" onclick="searchHotData()">
                                <i class="bi bi-search"></i> 搜索
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-outline-secondary w-100" onclick="clearSearch()">
                            <i class="bi bi-x-circle"></i> 清除搜索
                        </button>
                    </div>
                </div>
                <div class="platform-filter">
                    <small class="text-muted me-2">搜索平台:</small>
                    <button class="btn btn-sm btn-outline-primary active" data-platform="all">全部</button>
                    <?php foreach (HOT_TYPES as $type => $name): ?>
                    <button class="btn btn-sm btn-outline-secondary" data-platform="<?php echo $type; ?>">
                        <?php echo getPlatformIcon($type) . ' ' . $name; ?>
                    </button>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- ======================================== -->
            <!-- 统计信息 -->
            <!-- ======================================== -->
            <div class="stats-section" id="statsSection">
                <div class="stats-card">
                    <div class="stats-number" id="totalPlatforms">-</div>
                    <div class="stats-label">监控平台</div>
                </div>
                <div class="stats-card">
                    <div class="stats-number" id="totalItems">-</div>
                    <div class="stats-label">热点条目</div>
                </div>
                <div class="stats-card">
                    <div class="stats-number" id="updateCount">0</div>
                    <div class="stats-label">更新次数</div>
                </div>
                <div class="stats-card">
                    <div class="stats-number" id="onlinePlatforms">-</div>
                    <div class="stats-label">在线平台</div>
                </div>
            </div>

            <!-- ======================================== -->
            <!-- 热点数据展示区域 -->
            <!-- ======================================== -->
            <div id="hotDataContainer">
                <div class="loading-spinner">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">加载中...</span>
                    </div>
                    <p class="mt-3">正在获取最新热点数据...</p>
                </div>
            </div>
        </div>
    </div>

    <!-- ======================================== -->
    <!-- JavaScript 脚本 -->
    <!-- ======================================== -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // ========================================
        // 全局变量
        // ========================================
        let autoRefreshTimer = null;
        let isAutoRefresh = false;
        let updateCounter = 0;
        let selectedPlatforms = ['all'];

        // ========================================
        // 页面初始化
        // ========================================
        document.addEventListener('DOMContentLoaded', function() {
            // 初始化搜索框回车事件
            document.getElementById('searchKeyword').addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    searchHotData();
                }
            });

            // 初始化平台筛选按钮
            initPlatformFilter();

            // 加载初始数据
            refreshAllData();
        });

        // ========================================
        // 平台筛选初始化
        // ========================================
        function initPlatformFilter() {
            const filterButtons = document.querySelectorAll('.platform-filter .btn[data-platform]');
            
            filterButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    const platform = this.dataset.platform;
                    
                    if (platform === 'all') {
                        // 选择全部
                        filterButtons.forEach(b => b.classList.remove('active'));
                        this.classList.add('active');
                        selectedPlatforms = ['all'];
                    } else {
                        // 选择特定平台
                        const allBtn = document.querySelector('.platform-filter .btn[data-platform="all"]');
                        allBtn.classList.remove('active');
                        
                        this.classList.toggle('active');
                        
                        // 更新选中的平台
                        selectedPlatforms = Array.from(document.querySelectorAll('.platform-filter .btn.active'))
                            .map(btn => btn.dataset.platform)
                            .filter(p => p !== 'all');
                        
                        if (selectedPlatforms.length === 0) {
                            allBtn.classList.add('active');
                            selectedPlatforms = ['all'];
                        }
                    }
                });
            });
        }

        // ========================================
        // 刷新所有数据
        // ========================================
        function refreshAllData() {
            showLoading();
            
            fetch('api.php?action=getAllData', {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest' // 标识为AJAX请求
                },
                timeout: 30000 // 30秒超时
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.text(); // 先获取文本
            })
            .then(text => {
                try {
                    const data = JSON.parse(text); // 手动解析JSON
                    if (data.code === 200) {
                        displayHotData(data.data.platforms);
                        updateStats(data.data.platforms);
                        updateCounter++;
                        document.getElementById('updateCount').textContent = updateCounter;
                        document.getElementById('updateTime').textContent = new Date().toLocaleString();
                    } else {
                        showError('获取数据失败: ' + (data.message || '未知错误'));
                    }
                } catch (e) {
                    console.error('JSON解析错误:', e);
                    console.error('响应内容:', text);
                    showError('数据解析失败，请刷新重试');
                }
            })
            .catch(error => {
                console.error('网络请求错误:', error);
                showError('网络连接失败，请检查网络连接后重试');
            });
        }

        // ========================================
        // 搜索热点数据
        // ========================================
        function searchHotData() {
            const keyword = document.getElementById('searchKeyword').value.trim();
            
            if (!keyword) {
                alert('请输入搜索关键词');
                return;
            }

            showLoading();
            
            const platforms = selectedPlatforms.includes('all') ? [] : selectedPlatforms;
            const params = new URLSearchParams({
                action: 'search',
                keyword: keyword,
                platforms: platforms.join(',')
            });

            fetch('api.php?' + params, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest' // 标识为AJAX请求
                },
                timeout: 30000
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.text();
            })
            .then(text => {
                try {
                    const data = JSON.parse(text);
                    if (data.code === 200) {
                        displaySearchResults(data.data.results, keyword);
                    } else {
                        showError('搜索失败: ' + (data.message || '未知错误'));
                    }
                } catch (e) {
                    console.error('JSON解析错误:', e);
                    console.error('响应内容:', text);
                    showError('搜索结果解析失败，请重试');
                }
            })
            .catch(error => {
                console.error('搜索请求错误:', error);
                showError('搜索请求失败，请检查网络连接');
            });
        }

        // ========================================
        // 清除搜索
        // ========================================
        function clearSearch() {
            document.getElementById('searchKeyword').value = '';
            refreshAllData();
        }

        // ========================================
        // 显示热点数据
        // ========================================
        function displayHotData(allData) {
            const container = document.getElementById('hotDataContainer');
            let html = '';

            Object.keys(allData).forEach(platform => {
                const platformData = allData[platform];
                html += createPlatformCard(platform, platformData);
            });

            container.innerHTML = html;
        }

        // ========================================
        // 创建平台卡片
        // ========================================
        function createPlatformCard(platform, platformData) {
            const icon = getPlatformIcon(platform);
            
            let itemsHtml = '';
            platformData.data.forEach((item, index) => {
                const rank = index + 1;
                const rankClass = rank <= 3 ? 'top3' : '';
                const hotNum = formatHotNum(item.hotNum);
                const url = item.url || '#';
                
                itemsHtml += `
                    <div class="hot-item">
                        <div class="hot-rank ${rankClass}">${rank}</div>
                        <div class="hot-content">
                            <a href="${url}" target="_blank" class="hot-title">${item.title}</a>
                            <span class="hot-num">${hotNum}</span>
                        </div>
                    </div>
                `;
            });

            return `
                <div class="platform-card">
                    <div class="platform-header">
                        <div class="platform-name">
                            <span class="platform-icon">${icon}</span>
                            ${platformData.name}
                        </div>
                        <div class="update-time">
                            <i class="bi bi-clock"></i> ${platformData.update_time}
                            <span class="badge bg-primary ms-2">${platformData.count}条</span>
                        </div>
                    </div>
                    <div class="hot-items">
                        ${itemsHtml}
                    </div>
                </div>
            `;
        }

        // ========================================
        // 显示搜索结果
        // ========================================
        function displaySearchResults(results, keyword) {
            const container = document.getElementById('hotDataContainer');
            
            if (results.length === 0) {
                container.innerHTML = `
                    <div class="text-center py-5">
                        <i class="bi bi-search" style="font-size: 3rem; color: #6c757d;"></i>
                        <h4 class="mt-3 text-muted">未找到相关内容</h4>
                        <p class="text-muted">关键词"${keyword}"没有匹配的热点内容</p>
                    </div>
                `;
                return;
            }

            let html = `
                <div class="alert alert-info">
                    <i class="bi bi-info-circle"></i>
                    搜索关键词"<strong>${keyword}</strong>"，找到 <strong>${results.length}</strong> 条相关内容
                </div>
            `;

            results.forEach((item, index) => {
                const rank = index + 1;
                const rankClass = rank <= 3 ? 'top3' : '';
                const hotNum = formatHotNum(item.hotNum);
                const url = item.url || '#';
                const icon = getPlatformIcon(item.platform_type);
                
                html += `
                    <div class="platform-card">
                        <div class="hot-item">
                            <div class="hot-rank ${rankClass}">${rank}</div>
                            <div class="hot-content">
                                <a href="${url}" target="_blank" class="hot-title">${item.title}</a>
                                <div>
                                    <span class="badge bg-secondary me-2">${icon} ${item.platform}</span>
                                    <span class="hot-num">${hotNum}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            });

            container.innerHTML = html;
        }

        // ========================================
        // 更新统计信息
        // ========================================
        function updateStats(allData) {
            const totalPlatforms = Object.keys(allData).length;
            let totalItems = 0;
            let onlinePlatforms = 0;

            Object.values(allData).forEach(platform => {
                totalItems += platform.count;
                if (platform.count > 0) onlinePlatforms++;
            });

            document.getElementById('totalPlatforms').textContent = totalPlatforms;
            document.getElementById('totalItems').textContent = totalItems;
            document.getElementById('onlinePlatforms').textContent = onlinePlatforms;
        }

        // ========================================
        // 自动刷新控制
        // ========================================
        function toggleAutoRefresh() {
            if (isAutoRefresh) {
                stopAutoRefresh();
            } else {
                startAutoRefresh();
            }
        }

        function startAutoRefresh() {
            const interval = parseInt(document.getElementById('refreshInterval').value) * 1000;
            
            autoRefreshTimer = setInterval(refreshAllData, interval);
            isAutoRefresh = true;
            
            document.getElementById('autoRefreshText').innerHTML = '<i class="bi bi-pause-circle"></i> 停止自动刷新';
            document.querySelector('button[onclick="toggleAutoRefresh()"]').className = 'btn btn-warning';
        }

        function stopAutoRefresh() {
            if (autoRefreshTimer) {
                clearInterval(autoRefreshTimer);
                autoRefreshTimer = null;
            }
            
            isAutoRefresh = false;
            document.getElementById('autoRefreshText').innerHTML = '<i class="bi bi-play-circle"></i> 开启自动刷新';
            document.querySelector('button[onclick="toggleAutoRefresh()"]').className = 'btn btn-success';
        }

        // ========================================
        // 工具函数
        // ========================================
        function showLoading() {
            document.getElementById('hotDataContainer').innerHTML = `
                <div class="loading-spinner">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">加载中...</span>
                    </div>
                    <p class="mt-3">正在获取最新数据...</p>
                </div>
            `;
        }

        function showError(message) {
            document.getElementById('hotDataContainer').innerHTML = `
                <div class="alert alert-danger text-center">
                    <i class="bi bi-exclamation-triangle"></i>
                    <strong>错误:</strong> ${message}
                    <br><br>
                    <button class="btn btn-primary" onclick="refreshAllData()">重新加载</button>
                </div>
            `;
        }

        function formatHotNum(hotNum) {
            if (!hotNum || hotNum === '') return '-';
            
            // 确保hotNum是字符串类型
            const hotNumStr = String(hotNum);
            const num = parseInt(hotNumStr.replace(/[^\d]/g, ''));
            if (isNaN(num)) return hotNumStr;
            
            if (num >= 100000000) {
                return (num / 100000000).toFixed(1) + '亿';
            } else if (num >= 10000) {
                return (num / 10000).toFixed(1) + '万';
            } else {
                return num.toLocaleString();
            }
        }

        function getPlatformIcon(platform) {
            const icons = {
                'bilibilisearch': '🎬',
                'wangyisearch': '📰',
                'wangyivideo': '📺',
                'xinlang': '🌐',
                'kuaishou': '📱',
                'douyin': '🎵',
                'tieba': '💬',
                'baidu': '🔍',
                'weibo': '🌟',
                'toutiao': '📰'
            };
            return icons[platform] || '📊';
        }

        // ========================================
        // 页面关闭时清理定时器
        // ========================================
        window.addEventListener('beforeunload', function() {
            if (autoRefreshTimer) {
                clearInterval(autoRefreshTimer);
            }
        });
    </script>
</body>
</html> 