<?php
include('../../../tianyi.php');
?>

<!doctype html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="三合一收款码API">
<meta name="keywords" content="三合一收款码API">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="theme-color" content="#fd4b5c">
<title>三合一收款码 - <?php echo $ming; ?>API</title>
</head>
<style type="text/css">
h3:hover {box-shadow:0px 0px 8px #D1D1D1;}
</style>
<div style="box-shadow: 5px 5px 25px 0 rgba(46,61,73,.2);border-radius:15px;font-size:13px;width:950px;font-family:微软雅黑,'Helvetica Neue',Arial,sans-serif;margin:10px auto 0px;border:0px solid #eee;max-width:100%;">
    <div style="width:100%;background-color: #3174ed;background-image: linear-gradient(90deg, #3174ed 0%, #FA8BFF 35%, #3fd9fb 88%);color:#FFFFFF;border-radius:15px 15px 0 0;">
        <h2 style="font-size:15px;word-break:break-all;padding:20px 32px;margin:0;text-align:center">三合一收款码 - API</h2>
    </div>
    <div style="margin:0px auto;width:90%">
        <h3 style="-webkit-transition: all .2s cubic-bezier(0, 0, 0, 0.48);-moz-transition: all .2s ease;border:.0625rem solid #fafafa;background:#fafafa repeating-linear-gradient(-45deg,#fff,#fff 1.125rem,transparent 1.125rem,transparent 2.25rem);margin:15px 0px;padding:20px;border-radius:5px;font-size:14px;color:#333;">
		# 三合一收款码API请求方式 #
		<ul>
		<li>Method: GET</li>
		</ul>
		<hr>
		# 请求地址 #<br/>
		<a style="color:#fd4b5c;text-decoration:none;">http://<?php echo $_SERVER['HTTP_HOST']; ?>/api/wztz/api.php</a><br/>
		# 参数 #<br/>
		<li>biaoti //收款码标题(必填)</li> 
		<li>touxiang //获取QQ头像(必填)</li> 
		<li>nicheng //收款人昵称(必填)</li> 
		<li>qq //QQ收款码链接(必填)</li> 
		<li>vx //微信收款码链接(必填)</li> 
		<li>zfb //支付宝收款码链接(必填)</li> 
		<hr>
		# 返回数据 #<br/>
		<div style="width:100%;background-color: #000;background-image: linear-gradient(90deg, #6694ed 0%,);color:#FFFFFF;border-radius:5px;word-wrap:break-word;word-break:break-all;">
		直接跳转收款码<br/>
		</div>
		<hr>
		# 备注 #<br/>
		接口演示<br/>
		<a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/api/data/skm/api.php?biaoti=<?php echo $ming; ?>收款码&touxiang=3189402257&nicheng=<?php echo $ming; ?>&qq=https://i.qianbao.qq.com/wallet/sqrcode.htm?m=tenpay&f=wallet&ac=CAEQn7yOgA0Yl-PM-gU%3D_xxx_sign&n=%E9%80%80%7E&u=3489898015&a=1&vx=wxp://f2f0IWSPHJOmQsEVkIhk3b9-ZRbUpEkulmay" target="_blank">点我看效果</a>
		<br/>
		获取收款码链接<br/>
		<a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/api/data/skm/tianyi.php" target="_blank">点我查看</a>
     	<hr>
		# 示例 #<br/>
		<a style="color:#fd4b5c;text-decoration:none；" target="_blank">http://<?php echo $_SERVER['HTTP_HOST']; ?>/api/data/skm/api.php?biaoti=[标题]&touxiang=[QQ号]&nicheng=[收款人昵称]&qq=[QQ收款码链接]&vx=[微信收款码链接]&zfb=[支付宝收款码链接]</a>
		</h3>
          </div>
</div>
</html>