<?php
// ============================================================
// 模板渲染文件 - 根据搜索关键词展示接口列表
// 支持PHP 7.0+ 版本
// ============================================================

// ------------------------------------------------------------
// 读取接口配置文件
// ------------------------------------------------------------
$data = file_get_contents("./jiekou.json");
if ($data === false) {
    die("读取接口配置文件失败");
}

// ------------------------------------------------------------
// 使用正则表达式匹配接口数据
// 匹配格式: {"标题":"xxx","小标题":"xxx","地址":"xxx","状态":"xxx"}
// ------------------------------------------------------------
$result = preg_match_all('/{"标题":"(.*?)","小标题":"(.*?)","地址":"(.*?)","状态":"(.*?)"}/', $data, $v);

// ------------------------------------------------------------
// 获取颜色配置（本地生成，避免自我请求导致超时）
// ------------------------------------------------------------
$yanse = sprintf('#%06X', mt_rand(0, 0xFFFFFF));

// ------------------------------------------------------------
// 获取并验证搜索参数
// ------------------------------------------------------------
$second = isset($_REQUEST["msg"]) ? trim($_REQUEST["msg"]) : "";
if (empty($second)) {
    // 如果没有搜索参数，可以选择显示全部或提示
    // die("请输入搜索关键词");
}

// ------------------------------------------------------------
// 计算搜索词长度（使用 mb_strlen 支持中文）
// ------------------------------------------------------------
$z = mb_strlen($second, 'UTF-8');

// ------------------------------------------------------------
// 遍历匹配结果，根据相似度筛选接口
// ------------------------------------------------------------
for ($i = 0; $i < $result; $i++) {
    $first = $v[1][$i];  // 接口标题
    
    // ------------------------------------------------------------
    // 匹配逻辑优化：使用 mb_stripos 进行包含匹配
    // 支持中文，不区分大小写
    // ------------------------------------------------------------
    $isMatch = false;
    
    if (empty($second)) {
        // 如果搜索词为空，显示所有
        $isMatch = true;
    } else {
        // 如果标题包含搜索词，则匹配
        if (mb_stripos($first, $second) !== false) {
            $isMatch = true;
        }
    }
    
    // 如果匹配成功，则输出卡片
    if ($isMatch) {
        // 提取接口信息
        $name = htmlspecialchars($v[1][$i], ENT_QUOTES, 'UTF-8');     // 接口名称（转义防止XSS）
        $dz = htmlspecialchars($v[2][$i], ENT_QUOTES, 'UTF-8');       // 接口介绍
        $js = htmlspecialchars($v[3][$i], ENT_QUOTES, 'UTF-8');       // 接口地址
        $Status = $v[4][$i];                                           // 接口状态
        
        // ------------------------------------------------------------
        // 根据状态生成不同样式的卡片
        // ------------------------------------------------------------
        switch ($Status) {
            case "正常":
                echo '<!--分割--><div class="col-sm-4"><a target="_blank" class="block block-link-hover2 ribbon ribbon-modern ribbon-success" href="' . $js . '" style="border-radius:10px;filter:alpha(Opacity=50); background-color:' . $yanse . '"><div class="ribbon-box font-w600">正常</div><div class="block-content"><div class="h4 push-5">' . $name . '</div><p class="text-muted">' . $dz . '</p></div></a></div><!--分割-->';
                break;
                
            case "维护":
                echo '<!--分割--><div class="col-sm-4"><a target="_blank" class="block block-link-hover2 ribbon ribbon-modern ribbon-danger" href="' . $js . '" style="border-radius:10px;filter:alpha(Opacity=50); background-color:' . $yanse . '"><div class="ribbon-box font-w600">维护</div><div class="block-content"><div class="h4 push-5">' . $name . '</div><p class="text-muted">' . $dz . '</p></div></a></div><!--分割-->';
                break;
                
            case "停更":
                echo '<!--分割--><div class="col-sm-4"><a target="_blank" class="block block-link-hover2 ribbon ribbon-modern ribbon-warning" href="' . $js . '" style="border-radius:10px;filter:alpha(Opacity=50); background-color:' . $yanse . '"><div class="ribbon-box font-w600">停更</div><div class="block-content"><div class="h4 push-5">' . $name . '</div><p class="text-muted">' . $dz . '</p></div></a></div><!--分割-->';
                break;
                
            case "付费":
                echo '<!--分割--><div class="col-sm-4"><a target="_blank" class="block block-link-hover2 ribbon ribbon-modern ribbon-primary" href="' . $js . '" style="border-radius:10px;filter:alpha(Opacity=50); background-color:' . $yanse . '"><div class="ribbon-box font-w600">付费</div><div class="block-content"><div class="h4 push-5">' . $name . '</div><p class="text-muted">' . $dz . '</p></div></a></div><!--分割-->';
                break;
        }
    }
}
?>