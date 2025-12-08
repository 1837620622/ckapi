<?php
include('../tianyi.php');
?>

<?php @$hlx_login = intval(file_get_contents("../api/tongji/jiekou/hlx_login.dat")); ?>
<?php @$hlx_loginx = intval(file_get_contents("../api/tongji/jinri/".date("Y-m-d")."/hlx_login.dat")); ?>

<!doctype html>
<html lang="zh">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>葫芦侠登录 - <?php echo $ming; ?>API</title>
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
<legend>葫芦侠登录API</legend>
</fieldset>
<blockquote class="layui-elem-quote">本接口总调用：<?php echo $hlx_login; ?>次·今日调用：<?php echo $hlx_loginx; ?>次</blockquote>
</div>
<div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
<ul class="layui-tab-title" style="text-align: center!important;">
<li class="layui-this">API文档</li><li>错误码参照</li><li>示例代码</li>
</ul>
<div class="layui-tab-content">
<div class="layui-tab-item layui-show">
<p class="simpleTable">
<span class="layui-badge layui-bg-black">接口地址：</span>
<span class="url" data-clipboard-text="http://<?php echo $_SERVER['HTTP_HOST'];?>/api/hlx_login.php">http://<?php echo $_SERVER['HTTP_HOST'];?>/api/hlx_login.php</span>
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
<span class="url" data-clipboard-text="http://<?php echo $_SERVER['HTTP_HOST'];?>/api/hlx_login.php?phone=[手机号]&key=[密码]">http://<?php echo $_SERVER['HTTP_HOST'];?>/api/hlx_login.php?phone=[手机号]&key=[密码]</span>
</p>
<p class="linep">请求参数说明：</p> 
<table class="layui-table" lay-size="sm"> 
<thead>
<tr><th>名称</th><th>类型</th><th>必填</th><th>说明</th></tr>
</thead>
<tbody>
<tr><td>phone</td><td>Int</td><td>是</td><td>手机号</td></tr>
<tr><td>key</td><td>String</td><td>是</td><td>账号密码</td></tr>
<tr><td>type</td><td>String</td><td>否</td><td>返回格式，默认json可选text</td></tr>
<tr><td>hh</td><td>String</td><td>否</td><td>换行符号(默认\n)</td></tr>
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
<tr><td>data</td><td>Array</td><td>账号信息</td></tr>
<tr><td>nick</td><td>String</td><td>昵称</td></tr>
<tr><td>id</td><td>Int</td><td>账号id</td></tr>
<tr><td>birthday</td><td>String</td><td>生日</td></tr>
<tr><td>gender</td><td>String</td><td>性别</td></tr>
<tr><td>level</td><td>Int</td><td>账号等级</td></tr>
<tr><td>password</td><td>String</td><td>是否需要设置密码</td></tr>
<tr><td>userinfo</td><td>String</td><td>是否需要设置用户信息</td></tr>
<tr><td>avater</td><td>String</td><td>头像链接</td></tr>
<tr><td>key</td><td>String</td><td>葫芦侠md5加密密钥</td></tr>
<tr><td>session_key</td><td>String</td><td>session_key</td></tr>
</tbody>
</table>
<p class="linep">返回示例：</p>
<pre class="layui-code">自己测试</pre>
</div>
<div class="layui-tab-item">
<p class="linep">错误码格式说明：</p>
<table class="layui-table" lay-size="sm">
<thead>
<tr><th>名称</th><th>说明</th></tr>
</thead>
<tbody>
<tr><td>1</td><td>成功</td></tr>
<tr><td>-1</td><td>密码为空</td></tr>
<tr><td>-2</td><td>手机号错误</td></tr>
<tr><td>-3</td><td>账号或密码错误</td></tr>
<tr><td>-4</td><td>账号不存在</td></tr>
<tr><td>-5</td><td>参数不能为空</td></tr>
<tr><td>-6</td><td>未知错误</td></tr>
</tbody>
</table>
</div>
<div class="layui-tab-item">
<p class="linep">QRspeed机器人词库示例：</p>
<pre class="layui-code"><a style="color:#fd4b5c;text-decoration:none；" target="_blank">葫芦侠登录
<?php echo $ming; ?>API葫芦侠登录\n
━━━━━━━━━\n
用户:@%昵称%\n
━━━━━━━━━\n
葫芦侠登录 [手机号] [密码]\n
━━━━━━━━━\n
PS：建议私聊机器人查询哦！\n
━━━━━━━━━\n
请求示例：http://<?php echo $_SERVER['HTTP_HOST'];?>/tianyi/hlx_login.php\n
━━━━━━━━━\n
Tips:<?php echo $ming; ?>API技术支持

葫芦侠登录 .*
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/hlx_login.php?phone=%参数1%&key=%参数2%&type=text$</per>
</div>
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