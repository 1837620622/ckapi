<?php
include('../tianyi.php');
?>

<?php @$ACG = intval(file_get_contents("../api/tongji/jiekou/ACG.dat")); ?>
<?php @$ACGx = intval(file_get_contents("../api/tongji/jinri/".date("Y-m-d")."/ACG.dat")); ?>

<!doctype html>
<html lang="zh">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>随机ACG图片 - <?php echo $ming; ?>API</title>
<meta name="keywords" content=""/>
<meta name="description" content="">    
<link rel="stylesheet" href="./assets/css/layer.css">
<script src="https://ku.oioweb.cn/LayUI/2.5.4/layui.all.js"></script>
<style>.url{word-break:break-all;cursor:pointer;margin-left:5px;color:#777;border:none;border-radius:0;border-bottom:2px solid #5FB878;}.simpleTable{line-height:20px;padding-bottom:16px;}.linep{font-size:14px;font-weight:700;color:#555;padding-left:14px;height:16px;line-height:16px;margin-bottom:18px;position:relative;margin-top:15px;}.linep:before{content:'';width:4px;height:16px;background:#00aeff;border-radius:2px;position:absolute;left:0;top:0;}::-webkit-scrollbar{width:9px;height:9px}::-webkit-scrollbar-track-piece{background-color:#ebebeb;-webkit-border-radius:4px}::-webkit-scrollbar-thumb:vertical{height:32px;background-color:#ccc;-webkit-border-radius:4px}::-webkit-scrollbar-thumb:horizontal{width:32px;background-color:#ccc;-webkit-border-radius:4px}</style>
</head>
<body>
<div class="layui-container">
<div class="layui-row">
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
<legend>随机ACG图片API</legend>
</fieldset>
<blockquote class="layui-elem-quote">本接口总调用：<?php echo $ACG; ?>次·今日调用：<?php echo $ACGx; ?>次</blockquote>
</div>
<div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
<ul class="layui-tab-title" style="text-align: center!important;">
<li class="layui-this">API文档</li><li>错误码参照</li><li>示例代码</li>
</ul>
<div class="layui-tab-content">
<div class="layui-tab-item layui-show">
<p class="simpleTable">
<span class="layui-badge layui-bg-black">接口地址：</span>
<span class="url" data-clipboard-text="http://<?php echo $_SERVER['HTTP_HOST'];?>/api/ACG.php">http://<?php echo $_SERVER['HTTP_HOST'];?>/api/ACG.php</span>
</p>
<p class="simpleTable">
<span class="layui-badge layui-bg-green">返回格式：</span>
<span class="url" data-clipboard-text="请看返回示例">请看返回示例</span>
</p>
<p class="simpleTable">
<span class="layui-badge">请求方式：</span>
<span class="url" data-clipboard-text="GET">GET</span>
</p>
<p class="simpleTable">
<span class="layui-badge layui-bg-blue">请求示例：</span>
<span class="url" data-clipboard-text="http://<?php echo $_SERVER['HTTP_HOST'];?>/api/ACG.php">http://<?php echo $_SERVER['HTTP_HOST'];?>/api/ACG.php</span>
</p>
<p class="linep">请求参数说明：</p> 
<table class="layui-table" lay-size="sm"> 
<thead>
<tr><th>名称</th><th>类型</th><th>必填</th><th>说明</th></tr>
</thead>
<tbody>
<tr><td>type</td><td>String</td><td>否</td><td>返回格式，默认json可选text,js,image,jump</td></tr>
<tr><td>size</td><td>String</td><td>否</td><td>图片大小，默认large(大)，可选small(小),mw1024(宽为1024),mw690(宽为690),bmiddle(宽为440),thumb180(高,宽为180),thumbnail(宽为120,高为67),square(头像)</td></tr>
</tbody>
</table>
<p class="linep">系统级错误：</p>
<table class="layui-table" lay-size="sm">
<thead>
<tr><th>名称</th><th>说明</th></tr>
</thead>
<tbody>
<tr><td>400</td><td>请求错误！</td></tr>
<tr><td>403</td><td>请求被服务器拒绝！</td></tr>
<tr><td>405</td><td>客户端请求的方法被禁止！</td></tr>
<tr><td>408</td><td>请求时间过长！</td></tr>
<tr><td>500</td><td>服务器内部出现错误！</td></tr>
<tr><td>501</td><td>服务器不支持请求的功能，无法完成请求！</td></tr>
<tr><td>503</td><td>系统维护中！</td></tr>
</tbody>
</table>
<p class="linep">返回参数说明：</p> 
<table class="layui-table" lay-size="sm"> 
<thead>
<tr><th>名称</th><th>类型</th><th>说明</th></tr>
</thead>
<tbody>
<tr><td>code</td><td>Int</td><td>状态码</td></tr>
<tr><td>text</td><td>String</td><td>返回提示</td></tr>
<tr><td>data</td><td>Array</td><td>返回数据</td></tr>
<tr><td>url</td><td>String</td><td>图片直链</td></tr>
<tr><td>width</td><td>Int</td><td>图片宽</td></tr>
<tr><td>height</td><td>Int</td><td>图片高</td></tr>
</tbody>
</table>
<p class="linep">返回示例：</p>
<pre class="layui-code"><?php
//header("Content-Type:text/html;charset=UTF-8");
$result = file_get_contents("http://".$_SERVER['HTTP_HOST']."/api/ACG.php");
echo $result;
?></pre>
</div>
<div class="layui-tab-item">
<p class="linep">错误码格式说明：</p>
<table class="layui-table" lay-size="sm">
<thead>
<tr><th>名称</th><th>说明</th></tr>
</thead>
<tbody>
<tr><td>1</td><td>获取成功</td></tr>
</tbody>
</table>
</div>
<div class="layui-tab-item">
<p class="linep">机器人词库示例：</p>
<pre class="layui-code"><a style="color:#fd4b5c;text-decoration:none；" target="_blank">随机ACG图片
<?php echo $ming; ?>API随机ACG图片\n
━━━━━━━━━\n
用户:@%昵称%\n
━━━━━━━━━\n
±img=$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/ACG.php?type=text$±
━━━━━━━━━\n
请求示例：http://<?php echo $_SERVER['HTTP_HOST'];?>/tianyi/ACG.php\n
━━━━━━━━━\n
Tips:<?php echo $ming; ?>API技术支持</per>
</div>
</div>
</div>
</div>
<script src="./assets/css/clipboard.min.js"></script>
<script>
    layui.use('<?php echo $ming; ?>API', function(){ //加载code模块
        layui.code(); //引用code方法
    });
    var clipboard = new ClipboardJS('.url');
    clipboard.on('success', function(e) {
        layer.msg('复制成功！');
    });
    clipboard.on('error', function(e) {
        layer.msg('复制成功！');
    });
</script>
<script type="text/javascript" src="./assets/css/main.js"></script>
</body>
</html>