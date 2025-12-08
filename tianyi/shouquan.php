<?php
include('../tianyi.php');
?>

<!doctype html>
<html lang="zh">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>QR/SQV8授权系统 - <?php echo $ming; ?>API</title>
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
<legend>QR/SQV8授权系统</legend>
</fieldset>
<blockquote class="layui-elem-quote">本接口没有调用统计</blockquote>
</div>
<div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
<ul class="layui-tab-title" style="text-align: center!important;">
<li class="layui-this">API文档</li><li>错误码参照</li><li>示例代码</li>
</ul>
<div class="layui-tab-content">
<div class="layui-tab-item layui-show">
<p class="simpleTable">
<span class="layui-badge layui-bg-black">接口地址：</span>
<span class="url" data-clipboard-text="http://<?php echo $_SERVER['HTTP_HOST'];?>/">http://<?php echo $_SERVER['HTTP_HOST'];?>/</span>
</p>
<p class="simpleTable">
<span class="layui-badge layui-bg-green">返回格式：</span>
<span class="url" data-clipboard-text="本API无返回数据,直接输出">直接输出</span>
</p>
<p class="simpleTable">
<span class="layui-badge">请求方式：</span>
<span class="url" data-clipboard-text="GET">GET/POST</span>
</p>
<p class="simpleTable">
<span class="layui-badge layui-bg-blue">请求示例：</span>
<span class="url" data-clipboard-text="http://<?php echo $_SERVER['HTTP_HOST'];?>请看下方示例">http://<?php echo $_SERVER['HTTP_HOST'];?>/请看下方示例</span>
</p>
   
 <p class="linep">请求参数说明：</p> 
  <table class="layui-table" lay-size="sm"> 
   <thead> 
<tr> 
 <th>名称</th> 
 <th>必填</th> 
 <th>类型</th> 
 <th>说明</th> 
</tr> 
   </thead> 
   <tbody> 
<tr>
<td>hh</td>
<td>否</td>
<td>未知</td>
<td>换行符号(默认\n)</td>
   
</tr>
<tr>
  </table> 

  <p class="linep">返回示例：</p>
<pre class="layui-code">本API无返回数据,请看下方示例</pre>

QRSpeed/SQV8授权系统词库(如有疑问请联进首页官方群联系创始人)<br/><br/>
<body><textarea id="text" style="width:100%;background-color:#CDCDCD;background-image:linear-gradient(90deg,#6694ed 0%,);color:#FF0000;border-radius:5px" rows="15" >
添加授权 [0-9]+ [0-9]+ .*
A:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/shouquan/udtxc.php?qq=%QQ%$
如果:%QQ%==3189402257|%A%==是代理
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/shouquan/grant.php?key=tianyi719&robot=%参数1%&qq=%参数2%&time=%参数3%$
返回
如果尾
你不是我的作者或代理

删除授权 [0-9]+
A:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/shouquan/udtxc.php?qq=%QQ%$
如果:%QQ%==3189402257|%A%==是代理
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/shouquan/delete.php?key=tianyi719&robot=%参数1%$
返回
如果尾
你不是我的作者或代理

更换授权 [0-9]+ [0-9]+
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/shouquan/cyme.php?key=tianyi719&robot=%参数1%&robot1=%参数2%&qq=%QQ%$

检测授权 [0-9]+
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/shouquan/ection.php?robot=%参数1%$

查询授权 [0-9]+
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/shouquan/Inquire.php?robot=%参数1%$

我的授权
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/shouquan/autho.php?qq=%QQ%$

授权列表
A:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/shouquan/udtxc.php?qq=%QQ%$
如果:%QQ%==3189402257|%A%==是代理
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/shouquan/colum.php$
返回
如果尾
你不是我的作者或代理

查看主人 [0-9]+
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/shouquan/thost.php?robot=%参数1%$

清空授权
A:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/shouquan/udtxc.php?qq=%QQ%$
如果:%QQ%==3189402257|%A%==是代理
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/shouquan/deletio.php?key=tianyi719$
返回
如果尾
你不是我的作者或代理

添加代理 [0-9]+
如果:%QQ%==3189402257
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/shouquan/genera.php?key=tianyi719&qq=%参数1%$
返回
如果尾
你不是我的作者

删除代理 [0-9]+
如果:%QQ%==3189402257
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/shouquan/rational.php?key=tianyi719&qq=%参数1%$
返回
如果尾
你不是我的作者

查询代理 [0-9]+
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/shouquan/udtxc.php?qq=%参数1%$

代理列表
如果:%QQ%==3189402257
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/shouquan/gener.php$
返回
如果尾
你不是我的作者

添加云黑 [0-9]+
A:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/shouquan/udtxc.php?qq=%QQ%$
如果:%QQ%==3189402257|%A%==是代理
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/shouquan/generaa.php?key=tianyi719&qq=%参数1%$
返回
如果尾
你不是我的作者或代理

删除云黑 [0-9]+
A:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/shouquan/udtxc.php?qq=%QQ%$
如果:%QQ%==3189402257|%A%==是代理
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/shouquan/rationall.php?key=tianyi719&qq=%参数1%$
返回
如果尾
你不是我的作者或代理

查询云黑 [0-9]+
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/shouquan/udtxcc.php?qq=%参数1%$

云黑列表
A:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/shouquan/udtxc.php?qq=%QQ%$
如果:%QQ%==3189402257|%A%==是代理
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/shouquan/generr.php$
返回
如果尾
你不是我的作者或代理

获取主人
A:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/shouquan/thost.php?robot=%Robot%$
如果:%A%==%QQ%
是主人
返回
如果尾
不是主人

清空云黑
A:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/shouquan/udtxc.php?qq=%QQ%$
如果:%QQ%==3189402257|%A%==是代理
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/shouquan/deletioo.php?key=tianyi719$
返回
如果尾
你不是我的作者或代理

清空代理
如果:%QQ%==3189402257
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/shouquan/deletiooo.php?key=tianyi719$
返回
如果尾
你不是我的作者

添加卡密 .*
A:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/shouquan/udtxc.php?qq=%QQ%$
如果:%QQ%==3189402257|%A%==是代理
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/shouquan/heath.php?key=tianyi719&time=%参数1%&qq=%QQ%$
返回
如果尾
你不是我的作者或代理！

删除卡密 .*
A:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/shouquan/udtxc.php?qq=%QQ%$
如果:%QQ%==3189402257|%A%==是代理
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/shouquan/teama.php?key=tianyi719&card=%参数1%$
返回
如果尾
你不是我的作者或代理！

使用卡密 .*
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/shouquan/keuse.php?key=tianyi719&card=%参数1%&robot=%参数2%&qq=%参数3%$

卡密列表
A:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/shouquan/udtxc.php?qq=%QQ%$
如果:%QQ%==3189402257|%A%==是代理
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/shouquan/table.php$
返回
如果尾
你不是我的作者或代理！

清空卡密
A:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/shouquan/udtxc.php?qq=%QQ%$
如果:%QQ%==3189402257|%A%==是代理
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/shouquan/elcar.php?key=tianyi719$
B:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/mail/mail.php?address=3189402257@qq.com&name=<?php echo $ming; ?>配置的卡密被人清空通知&certno=清空者QQ：%QQ%
返回
如果尾
你不是我的作者或代理！

菜单
A:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/shouquan/ection.php?robot=%Robot%$
如果:%A%==0
<?php echo $ming; ?>API官方授权机\n
━━━━━━━━━\n
用户:@%昵称%\n
━━━━━━━━━\n
机器人未授权\n
━━━━━━━━━\n
Tips:<?php echo $ming; ?>API技术支持
返回
如果尾
<?php echo $ming; ?>API官方授权机\n
━━━━━━━━━\n
成员操作●主人操作\n
代理操作●等待更新\n
━━━━━━━━━\n
Tips:<?php echo $ming; ?>API技术支持

主人操作
A:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/shouquan/ection.php?robot=%Robot%$
如果:%A%==0
<?php echo $ming; ?>API官方授权机\n
━━━━━━━━━\n
用户:@%昵称%\n
━━━━━━━━━\n
机器人未授权\n
━━━━━━━━━\n
Tips:<?php echo $ming; ?>API技术支持
返回
如果尾
<?php echo $ming; ?>API官方授权机\n
━━━━━━━━━\n
用户:@%昵称%\n
━━━━━━━━━\n
添加授权 [机器人QQ] [主人QQ] [月数]\n
删除授权 [机器人QQ]\n
授权列表\n
清空授权\n
添加代理 [QQ号]\n
删除代理 [QQ号]\n
代理列表\n
添加云黑 [QQ号]\n
删除授权 [QQ号]\n
云黑列表\n
清空云黑\n
清空代理\n
添加卡密 [月数]\n
删除卡密 [卡密]\n
卡密列表\n
清空卡密\n
━━━━━━━━━\n
Tips:<?php echo $ming; ?>API技术支持

代理操作
A:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/shouquan/ection.php?robot=%Robot%$
如果:%A%==0
<?php echo $ming; ?>API官方授权机\n
━━━━━━━━━\n
用户:@%昵称%\n
━━━━━━━━━\n
机器人未授权\n
━━━━━━━━━\n
Tips:<?php echo $ming; ?>API技术支持
返回
如果尾
<?php echo $ming; ?>API官方授权机\n
━━━━━━━━━\n
用户:@%昵称%\n
━━━━━━━━━\n
添加授权 [机器人QQ] [主人QQ] [月数]\n
删除授权 [机器人QQ]\n
授权列表\n
清空授权\n
添加云黑 [QQ号]\n
删除授权 [QQ号]\n
云黑列表\n
清空云黑\n
添加卡密 [月数]\n
删除卡密 [卡密]\n
卡密列表\n
清空卡密\n
━━━━━━━━━\n
Tips:<?php echo $ming; ?>API技术支持

成员操作
A:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/shouquan/ection.php?robot=%Robot%$
如果:%A%==0
<?php echo $ming; ?>API官方授权机\n
━━━━━━━━━\n
用户:@%昵称%\n
━━━━━━━━━\n
机器人未授权\n
━━━━━━━━━\n
Tips:<?php echo $ming; ?>API技术支持
返回
如果尾
<?php echo $ming; ?>API官方授权机\n
━━━━━━━━━\n
用户:@%昵称%\n
━━━━━━━━━\n
更换授权 [老机器人QQ] [新机器人QQ]\n
检测授权 [机器人QQ]\n
查询授权 [机器人QQ]\n
我的授权\n
查看主人 [机器人QQ]\n
查询代理 [QQ号]\n
使用卡密 [卡密] [机器人QQ] [主人QQ]\n
━━━━━━━━━\n
Tips:<?php echo $ming; ?>API技术支持

.*
A:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/shouquan/udtxcc.php?qq=%QQ%$
如果:%A%==是云黑
$踢 %群号% %QQ%$
<?php echo $ming; ?>API官方授权机\n
━━━━━━━━━\n
用户:@%昵称%\n
━━━━━━━━━\n
你是云黑，我要把你踢出群！\n
━━━━━━━━━\n
Tips:<?php echo $ming; ?>API技术支持
返回
如果尾</textarea><button id="copy" style="width:100%;background-color:#FFFFFF;background-image:linear-gradient(90deg,#6694ed 0%,);color:#000000;border-radius:5px" onclick=copy()>点我复制</button>
</body>
</html>
<script>
function copy()
{
var text=document.getElementById("text");
var copy=document.getElementById("copy");
text.select();
document.execCommand("copy");
copy.focus();
alert("复制成功！")
}
</script>
<br/>
<hr>
点我返回首页<br/>
<a style="color:#fd4b5c;text-decoration:none；" href="index.php" target="_blank">©Copyright 2020-2021 <?php echo $ming; ?>API All Rights Reserved</a>
</h3>
</div>
</div>
</html>

   




</div>
<div class="layui-tab-item">
<p class="linep">错误码格式说明：</p>
<table class="layui-table" lay-size="sm">
<thead>
<tr><th>名称</th><th>类型</th><th>说明</th></tr>
</thead>
<tbody>
<tr><td>无</td><td>无</td><td>无</td>
</tbody>
</table>



</div>
<div class="layui-tab-item">
<p class="linep">代码示例：</p>
<pre class="layui-code"><a style="color:#fd4b5c;text-decoration:none；" target="_blank">请看首页下方示例</a></per>
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