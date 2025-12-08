<?php
/**
 * ========================================
 * 用户认证系统
 * ========================================
 * 作者: 传康kk
 * 功能: 处理用户登录和密码验证
 */

// ========================================
// Session配置和启动
// ========================================

// 设置session保存路径到当前项目目录
$sessionPath = __DIR__ . '/sessions';
if (!is_dir($sessionPath)) {
    mkdir($sessionPath, 0755, true);
}

// 确保session目录有正确的权限
if (is_dir($sessionPath)) {
    chmod($sessionPath, 0755);
}

// 设置session保存路径
session_save_path($sessionPath);

// 设置session参数
ini_set('session.gc_probability', 1);
ini_set('session.gc_divisor', 100);
ini_set('session.gc_maxlifetime', 3600); // 1小时

// 启动session会话（带错误处理）
if (session_status() === PHP_SESSION_NONE) {
    if (!@session_start()) {
        // 如果启动失败，尝试使用默认路径
        session_save_path('');
        if (!@session_start()) {
            die('Session初始化失败，请联系系统管理员');
        }
    }
}

// 定义访问密码
// 访问密码从环境变量读取(不要写死在源码里);未设置时用默认值
define('ACCESS_PASSWORD', getenv('ACCESS_PASSWORD') ?: 'CKNB');

/**
 * ========================================
 * 检查用户是否已登录
 * ========================================
 */
function isUserLoggedIn() {
    return isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true;
}

/**
 * ========================================
 * 验证密码
 * ========================================
 */
function verifyPassword($inputPassword) {
    return $inputPassword === ACCESS_PASSWORD;
}

/**
 * ========================================
 * 设置用户登录状态
 * ========================================
 */
function setUserLoggedIn() {
    $_SESSION['authenticated'] = true;
    $_SESSION['login_time'] = time();
    $_SESSION['last_activity'] = time();
}

/**
 * ========================================
 * 用户退出登录
 * ========================================
 */
function logoutUser() {
    if (session_status() === PHP_SESSION_ACTIVE) {
        session_unset();
        session_destroy();
    }
}

/**
 * ========================================
 * 检查session是否过期（可选功能）
 * ========================================
 */
function isSessionExpired($timeout = 3600) { // 默认1小时过期
    if (!isset($_SESSION['last_activity'])) {
        return true;
    }
    
    if ((time() - $_SESSION['last_activity']) > $timeout) {
        return true;
    }
    
    $_SESSION['last_activity'] = time(); // 更新最后活动时间
    return false;
}

/**
 * ========================================
 * 处理登录请求
 * ========================================
 */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'login') {
    $password = $_POST['password'] ?? '';
    
    if (verifyPassword($password)) {
        setUserLoggedIn();
        
        // 获取重定向目标页面
        $redirect = $_POST['redirect'] ?? 'index.php';
        
        // 重定向到目标页面
        header('Location: ' . $redirect);
        exit;
    } else {
        $loginError = '密码错误，请重新输入！';
    }
}

/**
 * ========================================
 * 处理退出登录请求
 * ========================================
 */
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    logoutUser();
    header('Location: auth.php');
    exit;
}

/**
 * ========================================
 * 如果用户已登录，重定向到首页
 * ========================================
 */
if (isUserLoggedIn() && !isSessionExpired()) {
    $redirect = $_GET['redirect'] ?? 'index.php';
    header('Location: ' . $redirect);
    exit;
}

// 如果session过期，清除session数据
if (isSessionExpired()) {
    logoutUser();
    // 重新启动session以避免后续错误
    if (session_status() === PHP_SESSION_NONE) {
        @session_start();
    }
}

/**
 * ========================================
 * 获取当前页面URL（用于登录后重定向）
 * ========================================
 */
$currentPage = $_GET['redirect'] ?? 'index.php';
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>系统登录 - PHP舆情监控分析系统</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* ======================================== */
        /* 登录页面样式 */
        /* ======================================== */
        
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Microsoft YaHei', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .login-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(15px);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        
        .login-header {
            margin-bottom: 30px;
        }
        
        .login-title {
            color: #2c3e50;
            font-weight: bold;
            margin-bottom: 10px;
            font-size: 1.8rem;
        }
        
        .login-subtitle {
            color: #6c757d;
            font-size: 1rem;
        }
        
        .login-icon {
            font-size: 4rem;
            color: #667eea;
            margin-bottom: 20px;
        }
        
        .form-control {
            border-radius: 10px;
            border: 2px solid #e9ecef;
            padding: 12px 15px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        
        .btn-login {
            background: linear-gradient(45deg, #667eea, #764ba2);
            border: none;
            border-radius: 10px;
            padding: 12px 30px;
            font-size: 1rem;
            font-weight: 500;
            color: white;
            width: 100%;
            transition: all 0.3s ease;
        }
        
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
            color: white;
        }
        
        .error-message {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            border-radius: 8px;
            padding: 10px;
            margin-bottom: 20px;
            font-size: 0.9rem;
        }
        
        .password-input-group {
            position: relative;
            margin-bottom: 20px;
        }
        
        .password-toggle {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            background: none;
            color: #6c757d;
            cursor: pointer;
            padding: 5px;
        }
        
        .password-toggle:hover {
            color: #495057;
        }
        
        .system-info {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e9ecef;
            color: #6c757d;
            font-size: 0.85rem;
        }
        
        @media (max-width: 576px) {
            .login-container {
                margin: 20px;
                padding: 30px 25px;
            }
            
            .login-icon {
                font-size: 3rem;
            }
            
            .login-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <!-- 登录头部 -->
        <div class="login-header">
            <div class="login-icon">
                <i class="bi bi-shield-lock"></i>
            </div>
            <h1 class="login-title">系统登录</h1>
            <p class="login-subtitle">请输入访问密码进入系统</p>
        </div>

        <!-- 错误信息显示 -->
        <?php if (isset($loginError)): ?>
            <div class="error-message">
                <i class="bi bi-exclamation-triangle"></i>
                <?php echo htmlspecialchars($loginError); ?>
            </div>
        <?php endif; ?>

        <!-- 登录表单 -->
        <form method="POST" action="">
            <input type="hidden" name="action" value="login">
            <input type="hidden" name="redirect" value="<?php echo htmlspecialchars($currentPage); ?>">
            
            <div class="password-input-group">
                <input 
                    type="password" 
                    class="form-control" 
                    id="password" 
                    name="password" 
                    placeholder="请输入访问密码" 
                    required 
                    autofocus
                >
                <button type="button" class="password-toggle" onclick="togglePassword()">
                    <i class="bi bi-eye" id="passwordToggleIcon"></i>
                </button>
            </div>
            
            <button type="submit" class="btn btn-login">
                <i class="bi bi-box-arrow-in-right"></i>
                登录系统
            </button>
        </form>

        <!-- 系统信息 -->
        <div class="system-info">
            <div>PHP舆情监控分析系统</div>
            <div class="mt-1">版本 1.0.0 | 作者: 传康kk</div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // ========================================
        // 密码显示/隐藏切换功能
        // ========================================
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('passwordToggleIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.className = 'bi bi-eye-slash';
            } else {
                passwordInput.type = 'password';
                toggleIcon.className = 'bi bi-eye';
            }
        }

        // ========================================
        // 回车键快速登录
        // ========================================
        document.getElementById('password').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                this.closest('form').submit();
            }
        });

        // ========================================
        // 页面加载完成后自动聚焦密码输入框
        // ========================================
        window.addEventListener('load', function() {
            document.getElementById('password').focus();
        });
    </script>
</body>
</html> 