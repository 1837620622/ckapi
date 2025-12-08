<!doctype html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<script src="api.php"></script>
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="theme-color" content="#fd4b5c">
<script src="api.php"></script>
<title>网站添加梅花</title>
</head>
<style type="text/css">
h3:hover {box-shadow:0px 0px 8px #D1D1D1;}
</style><div style="box-shadow:5px 5px 25px 0 rgba(46,61,73,.2);border-radius:15px;font-size:13px;width:950px;font-family:微软雅黑,'Helvetica Neue',Arial,sans-serif;margin:10px auto 0px;border:0px solid #eee;max-width:100%;"><div style="width:100%;background-color:#3174ed;background-image:linear-gradient(90deg,#3174ed 0%,#FA8BFF 35%,#3fd9fb 88%);color:#FFFFFF;border-radius:15px 15px 0 0;">
<h2 style="font-size:15px;word-break:break-all;padding:20px 32px;margin:0;text-align:center">网站添加梅花</h2>
</div>
<div style="margin:0px auto;width:90%">
<h3 style="-webkit-transition:all.2s cubic-bezier(0,0,0,0.48);-moz-transition:all.2s ease;border:.0625rem solid #fafafa;background:#fafafa repeating-linear-gradient(-45deg,#fff,#fff 1.125rem,transparent 1.125rem,transparent 2.25rem);margin:15px 0px;padding:20px;border-radius:5px;font-size:14px;color:#333;">
网站添加梅花
<ul>
<li>GET/POST</li>
</ul>
<hr>
<br/>
<a style="color:#fd4b5c;text-decoration:none;"></a><br/>
参数：<br/>
<li>暂无</li>
返回数据：<br/>
<div style="width:100%;background-color:#000;background-image:linear-gradient(90deg,#6694ed 0%,);color:#FFFFFF;border-radius:5px">
暂无
<br/>
</div>
<hr>
<br/>
复制下方dic<br/><br/>
<body><textarea id="text" style="width:100%;background-color:#CDCDCD;background-image:linear-gradient(90deg,#6694ed 0%,);color:#FF0000;border-radius:5px" rows="15" >
代码1
<script src="http://<?php echo $_SERVER['HTTP_HOST'];?>/api/php/meihua/api.php">

代码2
<script src='http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/php/meihua/api.php'></script>
</textarea><button id="copy" style="width:100%;background-color:#FFFFFF;background-image:linear-gradient(90deg,#6694ed 0%,);color:#000000;border-radius:5px" onclick=copy()>点我复制</button>
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
alert("复制完成")
}
</script>
<br/>
<hr>
示例：<br/>
<a style="color:#fd4b5c;text-decoration:none；" href="index.php" target="_blank">上方复制即可</a>
</h3>
</div>
</div>
</html>