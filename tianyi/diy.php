<?php
include('../tianyi.php');
?>

<!doctype html>
<html lang="zh">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>DIY名片 - <?php echo $ming; ?>API</title>
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
<legend>DIY名片</legend>
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
 <td>无需参数</td>
 <td>否</td>
 <td>String</td>
 <td>复制下方词库</td>
   
</tr>
<tr>
  </table> 

  <p class="linep">返回示例：</p>
<pre class="layui-code">本API无返回数据,请看下方示例</pre>

QRSpeed♧DIY名片词库(如有疑问请联进首页官方群联系创始人)<br/><br/>
<body><textarea id="text" style="width:100%;background-color:#CDCDCD;background-image:linear-gradient(90deg,#6694ed 0%,);color:#FF0000;border-radius:5px" rows="15" >
&&接口扶持者：<?php echo $ming; ?>
&&扶持者QQ：<?php echo $kefu; ?>
&&官方群：<?php echo $xiaoyu; ?>
&&原创：时晨API
&&原创QQ：31488277

DIY名片
<?php echo $ming; ?>API♧DIY名片\n
━━━━━━━━━\n
用户:@%昵称%\n
━━━━━━━━━\n
特效设置 头像设置\n
点赞设置 提交名片\n
我的模板 等待更新\n
申请名片码\n
━━━━━━━━━\n
请求示例：http://<?php echo $_SERVER['HTTP_HOST'];?>/tianyi/diy.php\n
━━━━━━━━━\n
Tips:<?php echo $ming; ?>API技术支持

特效设置
<?php echo $ming; ?>API♧DIY名片\n
━━━━━━━━━\n
用户:@%昵称%\n
━━━━━━━━━\n
1.星星\n
2.渐变\n
3.花花\n
4.超酷涂鸦\n
5.唯美\n
6.炫酷\n
7.黑暗\n
8.动漫\n
9.可爱\n
10.潮流派\n
11.可爱夏日\n
12.梦幻星河\n
13.浪漫花语\n
14.奇幻卡牌\n
15.甜甜爱情\n
16.宇宙流浪\n
17.梦境随想\n
18.暗黑史诗\n
19.暮色霓虹\n
20.波光之梦\n
21.情牵\n
22.长相思令\n
23.朦胧花火\n
回复设置特效+内容即可！\n
━━━━━━━━━\n
Tips:<?php echo $ming; ?>API技术支持

设置特效(星星|渐变|花花|超酷涂鸦|唯美|炫酷|黑暗|动漫|可爱|潮流派|可爱夏日|梦幻星河|浪漫花语|奇幻卡牌|甜甜爱情|宇宙流浪|梦境随想|暗黑史诗|暮色霓虹|波光之梦|情牵|长相思令|朦胧花火)
$写 <?php echo $ming; ?>API/DIY名片/特效 %QQ% %括号1%$
<?php echo $ming; ?>API♧DIY名片\n
━━━━━━━━━\n
用户:@%昵称%\n
━━━━━━━━━\n
设置特效%括号1%成功！\n
━━━━━━━━━\n
下一步设置头像！\n
━━━━━━━━━\n
Tips:<?php echo $ming; ?>API技术支持
$调用 1 头像设置$

头像设置
<?php echo $ming; ?>API♧DIY名片\n
━━━━━━━━━\n
用户:@%昵称%\n
━━━━━━━━━\n
1.居中\n
2.跟随\n
3.隐藏\n
回复:设置头像+内容即可！\n
━━━━━━━━━\n
Tips:<?php echo $ming; ?>API技术支持

设置头像(居中|跟随|隐藏)
$写 <?php echo $ming; ?>API/DIY名片/头像 %QQ% %括号1%$
<?php echo $ming; ?>API♧DIY名片\n
━━━━━━━━━\n
用户:@%昵称%\n
━━━━━━━━━\n
设置头像%括号1%成功！\n
━━━━━━━━━\n
下一步设置点赞！\n
━━━━━━━━━\n
Tips:<?php echo $ming; ?>API技术支持
$调用 1 点赞设置$

点赞设置
<?php echo $ming; ?>API♧DIY名片\n
━━━━━━━━━\n
用户:@%昵称%\n
━━━━━━━━━\n
1.普通\n
2.全屏\n
3.隐藏\n
回复:设置点赞+内容即可！\n
━━━━━━━━━\n
Tips:<?php echo $ming; ?>API技术支持

设置点赞(普通|全屏|隐藏)
$写 <?php echo $ming; ?>API/DIY名片/点赞 %QQ% %括号1%$
<?php echo $ming; ?>API♧DIY名片\n
━━━━━━━━━\n
用户:@%昵称%\n
━━━━━━━━━\n
设置点赞%括号1%成功！\n
━━━━━━━━━\n
PS：现在需要你发送提交名片+图片\n
━━━━━━━━━\n
Tips:<?php echo $ming; ?>API技术支持

我的模板
1:$读 <?php echo $ming; ?>API/DIY名片/点赞 %QQ% 普通$
2:$读 <?php echo $ming; ?>API/DIY名片/头像 %QQ% 居中$
3:$读 <?php echo $ming; ?>API/DIY名片/特效 %QQ% 星星$
<?php echo $ming; ?>API♧DIY名片\n
━━━━━━━━━\n
用户:@%昵称%\n
━━━━━━━━━\n
账号:%QQ%\n
点赞:%1%点赞\n
头像:%2%头像\n
特效:%3%特效\n
━━━━━━━━━\n
Tips:<?php echo $ming; ?>API技术支持

申请名片码
a:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/diy/qrlogin/qrewm_qzone.php$
@%昵称%\n
请使用手机QQ扫码登录\n
如出现异地登录属正常现象\n
当前登录地址：腾讯云\n
±img=@a[picurl]±
当前登录：DIY名片
$写 <?php echo $ming; ?>API/DIY名片/扫码登录/%QQ% qrsig @a[qrsig]$
$调用 10 验证登录$

验证登录
Y:$读 <?php echo $ming; ?>API/DIY名片/扫码登录/%QQ% qrsig 0$
B:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/diy/qrlogin/qrlogin_vip.php?qrsig=%Y%$
D:@B[code]
如果:%D%==2
$调用 100 验证登录$
返回
如果尾
如果:%D%==68
拒绝登录
返回
如果尾
如果:%D%==1
二维码已经失效
返回
如果尾
如果:%D%==3
$调用 100 验证登录$
返回
如果尾
如果:%D%==0
[账号]：@B[uin]\n
[昵称]：@B[name]\n
[提示]：登录成功
$写 <?php echo $ming; ?>API/DIY名片/扫码登录/获取/%QQ%/cookie vip %B%$
$调用 1 特效设置$

提交名片
如果:%IMG0%==
请携带图片
返回
如果尾
r:$图片链接 %IMG0%$
1:$读 <?php echo $ming; ?>API/DIY名片/点赞 %QQ% 普通$
2:$读 <?php echo $ming; ?>API/DIY名片/头像 %QQ% 居中$
3:$读 <?php echo $ming; ?>API/DIY名片/特效 %QQ% 星星$
d:$读 <?php echo $ming; ?>API/DIY名片/扫码登录/获取/%QQ%/cookie vip 0$
q:@d[uin]
s:@d[skey]
p:@d[pskey]
$调用 0 提示$
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/diy/diy.php?skey=%s%&pskey=%p%&uin=%q%&url=%r%&dz=%1%&tx=%2%&lottie=%3%$

上传代码(.*)
1:$读 <?php echo $ming; ?>API/DIY名片/点赞 %QQ% 普通$
2:$读 <?php echo $ming; ?>API/DIY名片/头像 %QQ% 居中$
3:$读 <?php echo $ming; ?>API/DIY名片/特效 %QQ% 星星$
d:$读 <?php echo $ming; ?>API/DIY名片/扫码登录/获取/%QQ%/cookie vip 0$
q:@d[uin]
s:@d[skey]
p:@d[pskey]
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/diy/adiy.php?skey=%s%&pskey=%p%&uin=%q%&data=%括号1%&dz=%1%&tx=%2%&lottie=%3%$

提示
<?php echo $ming; ?>API♧DIY名片\n
━━━━━━━━━\n
用户:@%昵称%\n
━━━━━━━━━\n
请等待一分钟时间，谢谢！\n
━━━━━━━━━\n
Tips:<?php echo $ming; ?>API技术支持</textarea><button id="copy" style="width:100%;background-color:#FFFFFF;background-image:linear-gradient(90deg,#6694ed 0%,);color:#000000;border-radius:5px" onclick=copy()>点我复制</button>
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
<tr><td>无</td><td>无</td><td>无</td></tr>
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