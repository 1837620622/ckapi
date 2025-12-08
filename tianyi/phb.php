<?php
include('../tianyi.php');
?>

<?php @$phb = intval(file_get_contents("../api/tongji/jiekou/phb.dat")); ?>
<?php @$phbx = intval(file_get_contents("../api/tongji/jinri/".date("Y-m-d")."/phb.dat")); ?>

<!doctype html>
<html lang="zh">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>QR排行榜 - <?php echo $ming; ?>API</title>
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
<legend>QR排行榜</legend>
</fieldset>
<blockquote class="layui-elem-quote">本接口总调用：<?php echo $phb; ?>次·今日调用：<?php echo $phbx; ?>次</blockquote>
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

QRSpeed排行榜词库(如有疑问请联进首页官方群联系创始人)<br/><br/>
<body><textarea id="text" style="width:100%;background-color:#CDCDCD;background-image:linear-gradient(90deg,#6694ed 0%,);color:#FF0000;border-radius:5px" rows="15" >
增加
金:$读 <?php echo $ming; ?>API/QR排行榜/%群号%/金币 %QQ% 0$
<?php echo $ming; ?>API♧QR排行榜\n
━━━━━━━━━\n
用户:@%昵称%\n
━━━━━━━━━\n
增加100金币成功！\n
━━━━━━━━━\n
Tips:<?php echo $ming; ?>API技术支持
$写 <?php echo $ming; ?>API/QR排行榜/%群号%/金币 %QQ% [%金%+100]$

减少
金:$读 <?php echo $ming; ?>API/QR排行榜/%群号%/金币 %QQ% 0$
<?php echo $ming; ?>API♧QR排行榜\n
━━━━━━━━━\n
用户:@%昵称%\n
━━━━━━━━━\n
已扣除您的100金币！\n
━━━━━━━━━\n
Tips:<?php echo $ming; ?>API技术支持
$写 <?php echo $ming; ?>API/QR排行榜/%群号%/金币 %QQ% [%金%-100]$

查询
金:$读 <?php echo $ming; ?>API/QR排行榜/%群号%/金币 %QQ% 0$
<?php echo $ming; ?>API♧QR排行榜\n
━━━━━━━━━\n
用户:@%昵称%\n
━━━━━━━━━\n
您的金币余额为：%金%\n
━━━━━━━━━\n
Tips:<?php echo $ming; ?>API技术支持

排行榜
S:$访问 file:///sdcard/QR/QRDic/data/<?php echo $ming; ?>API/QR排行榜/%群号%/金币$
<?php echo $ming; ?>API♧QR排行榜\n
━━━━━━━━━\n
用户:@%昵称%\n
━━━━━━━━━\n
$访问 SETPOST {} http://<?php echo $_SERVER['HTTP_HOST'];?>/api/phb.php msg=%S%&name=金币&id=5&qq=%QQ%$
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