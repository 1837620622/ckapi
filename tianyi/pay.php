<?php
include('../tianyi.php');
?>

<?php @$pay = intval(file_get_contents("../api/tongji/jiekou/pay.dat")); ?>
<?php @$payx = intval(file_get_contents("../api/tongji/jinri/".date("Y-m-d")."/pay.dat")); ?>

<!doctype html>
<html lang="zh">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>QQ群收款 - <?php echo $ming; ?>API</title>
<meta name="keywords" content=""/>
<meta name="description" content="">    
<link rel="stylesheet" href="./assets/css/layer.css">
<script src="https://ku.oioweb.cn/LayUI/2.5.4/layui.all.js"></script>
<style>.url{word-break:break-all;cursor:pointer;margin-left:5px;color:#777;border:none;border-radius:0;border-bottom:2px solid #5FB878;}.simpleTable{line-height:20px;padding-bottom:16px;}.linep{font-size:14px;font-weight:700;color:#555;padding-left:14px;height:16px;line-height:16px;margin-bottom:18px;position:relative;margin-top:15px;}.linep:before{content:'';width:4px;height:16px;background:#00aeff;border-radius:2px;position:absolute;left:0;top:0;}::-webzit-scrollbar{width:9px;height:9px}::-webzit-scrollbar-track-piece{background-color:#ebebeb;-webzit-border-radius:4px}::-webzit-scrollbar-thumb:vertical{height:32px;background-color:#ccc;-webzit-border-radius:4px}::-webzit-scrollbar-thumb:horizontal{width:32px;background-color:#ccc;-webzit-border-radius:4px}</style>
</head>
<body>
<div class="layui-container">
<div class="layui-row">
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
<legend>QQ群收款API</legend>
</fieldset>
<blockquote class="layui-elem-quote">本接口总调用：<?php echo $pay; ?>次·今日调用：<?php echo $payx; ?>次</blockquote>
</div>
<div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
<ul class="layui-tab-title" style="text-align: center!important;">
<li class="layui-this">API文档</li><li>错误码参照</li><li>示例代码</li>
</ul>
<div class="layui-tab-content">
<div class="layui-tab-item layui-show">
<p class="simpleTable">
<span class="layui-badge layui-bg-black">接口地址：</span>
<span class="url" data-clipboard-text="http://<?php echo $_SERVER['HTTP_HOST'];?>/api/pay.php">http://<?php echo $_SERVER['HTTP_HOST'];?>/api/pay.php</span>
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
<span class="url" data-clipboard-text="http://<?php echo $_SERVER['HTTP_HOST'];?>/api/pay.php?title=吉云&pskey=[看参数说明]&je=0.01&group=1021329052&qq=3189402257&uin=417338270&select=1">http://<?php echo $_SERVER['HTTP_HOST'];?>/api/pay.php?title=吉云&pskey=[看参数说明]&je=0.01&group=1021329052&qq=3189402257&uin=417338270&select=1</span>
</p>
<p class="linep">请求参数说明：</p> 
<table class="layui-table" lay-size="sm"> 
<thead>
<tr><th>名称</th><th>类型</th><th>必填</th><th>说明</th></tr>
</thead>
<tbody>
<tr><td>title</td><td>String</td><td>是</td><td>发起收款的标题</td></tr>
<tr><td>type</td><td>String</td><td>否</td><td>返回格式，默认json，可选text</td></tr>
<tr><td>pskey</td><td>String</td><td>是</td><td>tenpay.com的pskey</td></tr>
<tr><td>je</td><td>Int</td><td>是</td><td>金额，最大2000，最小0.01</td></tr>
<tr><td>group</td><td>Int</td><td>是</td><td>群号</td></tr>
<tr><td>qq</td><td>Int</td><td>是</td><td>付款对象</td></tr>
<tr><td>uin</td><td>Int</td><td>是</td><td>操作者账号</td></tr>
<tr><td>payid</td><td>Int</td><td>是</td><td>订单号，查询，取消，催收时必须</td></tr>
<tr><td>select</td><td>Int</td><td>是</td><td>类型，1为发起，2为查询，3为收，4为取消</td></tr>
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
<tr><td>money</td><td>Int</td><td>发起金额</td></tr>
<tr><td>uin</td><td>Int</td><td>操作者QQ</td></tr>
<tr><td>payuin</td><td>Int</td><td>付款者QQ</td></tr>
<tr><td>payid</td><td>Int</td><td>订单号</td></tr>
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
<tr><td>-1</td><td>收款标题错误</td></tr>
<tr><td>-2</td><td>付款者QQ错误</td></tr>
<tr><td>-3</td><td>群号错误</td></tr>
<tr><td>-4</td><td>收款金额错误</td></tr>
<tr><td>-5</td><td>操作者QQ错误</td></tr>
<tr><td>-6</td><td>pskey错误</td></tr>
<tr><td>-7</td><td>收款金额过大</td></tr>
<tr><td>-8</td><td>查询订单状态失败，未知状态</td></tr>
<tr><td>-9</td><td>订单号错误</td></tr>
<tr><td>-10</td><td>请求参数错误</td></tr>
<tr><td>-11</td><td>未知错误</td></tr>
<tr><td>-12</td><td>请求参数错误</td></tr>
<tr><td>-13</td><td>收款金额大于1000，需要添加银行卡完善身份信息</td></tr>
<tr><td>-14</td><td>select参数错误</td></tr>
</tbody>
</table>
</div>
<div class="layui-tab-item">
<p class="linep">QRSpeed机器人词库示例：</p>
<pre class="layui-code"><a style="color:#fd4b5c;text-decoration:none；" target="_blank">赞助 .*
P:%Json%
P:@P[pskey]
P:@P[tenpay.com]
A:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/pay.php?title=<?php echo $ming; ?>API&pskey=%P%&je=%参数1%&group=%群号%&qq=%QQ%&uin=%Robot%&select=1$
状:@A[code]
订:@A[pay_id]
如果:%状%==1
@%昵称%\n
感谢你的赞助\n
赞助者QQ:@A[pay_uin]\n
赞助金额:@A[money]\n
订单号:%订%\n
发起时间:%时间Y-M-d HH:mm%
$调用 [60*1000] 收款检测$
$写 <?php echo $ming; ?>API/%群号%/群收款/%QQ% 订单号 %订%$
返回
如果尾
@%昵称% 赞助失败，请稍后再试

[内部]收款检测
P:%Json%
P:@P[pskey]
P:@P[tenpay.com]
A:$读 <?php echo $ming; ?>API/%群号%/群收款/%QQ% 订单号 0$
B:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/pay.php?uin=%Robot%&pskey=%P%&payid=%A%&select=2$
状:@B[code]
C:@B[text]
如果:%状%!=1
%C%
返回
如果尾
如果:%C%==已支付
@%昵称% 赞助成功！
返回
如果尾
如果:%C%==未支付
A:$读 <?php echo $ming; ?>API/%群号%/群收款/%QQ% 订单号 0$
B:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/pay.php?uin=%Robot%&pskey=%P%&payid=%A%&select=4$
@%昵称% 订单超时，已经取消了！
返回
如果尾
$调用 [60*1000] 收款检测$</per>
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