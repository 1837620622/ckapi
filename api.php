<?php
// ============================================================
// API 接口文件 - 用于管理网站配置信息
// 支持PHP 7.0+ 版本
// ============================================================

include("./tianyi.php");

// ------------------------------------------------------------
// 设置响应头和字符编码
// ------------------------------------------------------------
header("Content-Type: text/plain; charset=utf-8");

// ------------------------------------------------------------
// 获取并过滤请求参数
// ------------------------------------------------------------
$data = $_REQUEST;
$key = isset($data["key"]) ? trim($data["key"]) : "";
$do = isset($data["do"]) ? trim($data["do"]) : "";
$get = isset($data["get"]) ? trim($data["get"]) : "";
$msg = isset($data["msg"]) ? trim($data["msg"]) : "";

// ------------------------------------------------------------
// 密钥验证
// ------------------------------------------------------------
if ($key !== $apikey) {
    die("密钥不正确");
}

// ------------------------------------------------------------
// 操作类型判断
// ------------------------------------------------------------
if ($do !== "get") {
    die("操作类型错误，请使用 do=get");
}

// ------------------------------------------------------------
// 配置修改通用函数
// 参数: $oldValue - 原值, $newValue - 新值, $successMsg - 成功提示
// 返回: 无（直接输出结果并终止）
// ------------------------------------------------------------
function updateConfig($oldValue, $newValue, $successMsg) {
    $configFile = "./tianyi.php";
    $info = file_get_contents($configFile);
    if ($info === false) {
        die("读取配置文件失败");
    }
    $info = str_replace($oldValue, $newValue, $info);
    $result = file_put_contents($configFile, $info);
    if ($result === false) {
        die("写入配置文件失败");
    }
    die($successMsg);
}

// ------------------------------------------------------------
// 根据 get 参数执行相应操作
// ------------------------------------------------------------
switch ($get) {
    // 修改网站名称
    case "ggsitename":
        if (empty($msg)) {
            die("请求参数错误：msg 不能为空");
        }
        updateConfig($ming, $msg, "网站名称修改成功！");
        break;
    
    // 获取网站名称
    case "sitename":
        die("获取类型：获取网站名称\n获取内容：" . $ming);
        break;
    
    // 修改邮箱
    case "ggemail":
        if (empty($msg)) {
            die("请求参数错误：msg 不能为空");
        }
        updateConfig($youxiang, $msg, "邮箱修改成功！");
        break;
    
    // 获取邮箱
    case "email":
        die("获取类型：获取网站站长邮箱\n获取内容：" . $youxiang);
        break;
    
    // 修改客服QQ
    case "ggkefu":
        if (empty($msg)) {
            die("请求参数错误：msg 不能为空");
        }
        updateConfig($kefu, $msg, "客服QQ修改成功！");
        break;
    
    // 获取客服QQ
    case "kefu":
        die("获取类型：获取网站站长QQ号\n获取内容：" . $kefu);
        break;
    
    // 修改群号
    case "ggxiaoyu":
        if (empty($msg)) {
            die("请求参数错误：msg 不能为空");
        }
        updateConfig($xiaoyu, $msg, "群号修改成功！");
        break;
    
    // 获取群号
    case "xiaoyu":
        die("获取类型：获取网站官方群号\n获取内容：" . $xiaoyu);
        break;
    
    // 修改群链接
    case "ggqun":
        if (empty($msg)) {
            die("请求参数错误：msg 不能为空");
        }
        updateConfig($qun, $msg, "群链接修改成功！");
        break;
    
    // 获取群链接
    case "qun":
        die("获取类型：获取网站官方群链接\n获取内容：" . $qun);
        break;
    
    // 未知操作
    default:
        die("未知的 get 参数：" . htmlspecialchars($get));
}
?>