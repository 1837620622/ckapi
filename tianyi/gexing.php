<?php
include('../tianyi.php');
?>

<!doctype html>
<html lang="zh">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>个性装扮 - <?php echo $ming; ?>API</title>
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
<legend>个性装扮</legend>
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

QRSpeed个性装扮词库(如有疑问请联进首页官方群联系创始人)<br/><br/>
<body><textarea id="text" style="width:100%;background-color:#CDCDCD;background-image:linear-gradient(90deg,#6694ed 0%,);color:#FF0000;border-radius:5px" rows="15" >
个性装扮
如果:%QQ%==%QQ%
★------个性装扮-----★\n
开气泡‖关气泡‖查气泡\n
开挂件‖关挂件‖查挂件\n
开秒赞‖关秒赞‖发公告\n
抽礼物‖查礼物‖送鲜花\n
查钱包‖查等级‖查访客\n
查管理‖查禁言‖查步数\n
查业务‖查装扮‖换间隔\n
领金豆‖查状态‖群签到\n
搜气泡‖搜挂件‖搜字体\n
搜浮屏‖删数据‖个性装扮2

个性装扮2
如果:%QQ%==%QQ%
★随机说说‖发表说说★\n
★说说列表‖删除说说★\n
★黄钻签到‖图书签到★\n
★部落签到‖部落领心★\n
★空间访问‖空间签到★\n
★早起报名‖早起打卡★\n
★我的步数‖步数打卡★\n
★每日打卡‖我的卡片★\n
★开名片赞‖关名片赞★\n
★一键互赞‖查名片赞★\n
★手游加速‖农场签到★\n
★取消气泡‖取消挂件★\n
★取消字体‖取消浮屏★\n
★设置机型‖改签到语★\n
★空白昵称‖修改昵称★\n
★退出登陆‖等待更新★\n
★--------------------★

申请装扮
如果:%QQ%==%QQ%
空:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$
Q:@空[uin]
S:@空[skey]
期:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$
如果:%期%==0
@%昵称% 已登录，无需重新登录！
返回
如果尾
获:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/ressut/qrlogin/qrewm_qzone.php$
维:@获[img]
验:@获[qrsig]
$写 <?php echo $ming; ?>API/装扮验证/%QQ% qrsig %验%$
@%昵称%\n
请使用手机QQ扫码登录\n
如出现异地登录属正常现象\n
当前登录地址：长春\n
±img=%维%±
当前登录：装扮
$调用 1000 vipqrsig$

vipqrsig
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
验:$读 <?php echo $ming; ?>API/装扮验证/%QQ% qrsig 0$
如果:%验%==0
返回
如果尾
证:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/ressut/qrlogin/qrlogin_qzone.php?sm_qrsig=%验%$
结:@证[code]
如果:%结%==1
@%昵称% 二维码已失效，请重新申请！
$写 <?php echo $ming; ?>API/装扮验证/%QQ% qrsig 0$
返回
如果尾
如果:%结%==2
$调用 1000 vipqrsig$
返回
如果尾
如果:%结%==3
二维码[28]最新消息:\n
二维码验证中...\n
(%时%)
$调用 1000 vipqrsig$
返回
如果尾
如果:%结%==6
@%昵称% 请不要中途退出登录，否则后果自负！
返回
如果尾
如果:%结%==0
Q:@证[uin]
如果:%Q%==%QQ%
$写 <?php echo $ming; ?>API/装扮空间.txt %Q% %证%$
P:$读 <?php echo $ming; ?>API/空间用户.txt mm %主人%$
$写 <?php echo $ming; ?>API/空间用户.txt mm %P%|%QQ%$
$调用 1000 vippqrsig$
$调用 3000 qrsig加验证$
返回
如果尾
如果:%结%==0
二维码[28]最新消息:\n
登录失败，非本人扫码！\n
(%时%)
$写 <?php echo $ming; ?>API/装扮验证/%QQ% qrsig 0$
$写 <?php echo $ming; ?>API/装扮验证/%Q% qrsig 0$
返回
如果尾
$调用 1000 vipqrsig$

qrsig加验证
登:$读 装扮/登陆/数据 M 0$
获:$替换 € %登%€｛"%QQ%":"€$
录:$替换 € %获%€"｝€$
如果:%录%==1
返回
如果尾
登:$读 装扮/登陆/数据 M 0$
$写 装扮/登陆/数据 M %登%｛"%QQ%":"1"｝$

vippqrsig
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
验:$读 <?php echo $ming; ?>API/装扮验证/%QQ% qrsig 0$
如果:%验%==0
返回
如果尾
证:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/ressut/qrlogin/qrlogin_vip.php?sm_qrsig=%验%$
结:@证[code]
如果:%结%==0
Q:@证[uin]
S:@证[skey]
P:@证[pskey]
T:@证[pt4token]
N:@证[name]
二维码[33]最新消息：\n
登录成功，检测到初始化记录\n
以下是你的装扮信息\n
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/messa.php?qq=%Q%&skey=%S%&pskey=%P%&token=%T%$
$调用 1000 qunqrsig$
$写 <?php echo $ming; ?>API/装扮会员.txt %Q% %证%$
返回
如果尾
@%昵称% 装扮COOKIE获取失败，相关功能将不可用！
$写 <?php echo $ming; ?>API/装扮验证/%QQ% qrsig 0$
$写 <?php echo $ming; ?>API/装扮验证/%Q% qrsig 0$
$调用 1000 qunqrsig$

qunqrsig
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
验:$读 <?php echo $ming; ?>API/装扮验证/%QQ% qrsig 0$
如果:%验%==0
返回
如果尾
证:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/ressut/qrlogin/qrlogin_qun.php?sm_qrsig=%验%$
结:@证[code]
如果:%结%==0
Q:@证[uin]
S:@证[skey]
P:@证[pskey]
T:@证[pt4token]
N:@证[name]
$写 <?php echo $ming; ?>API/装扮群官.txt %Q% %证%$
$写 <?php echo $ming; ?>API/装扮验证/%QQ% qrsig 0$
$写 <?php echo $ming; ?>API/装扮验证/%Q% qrsig 0$
返回
如果尾
@%昵称% 群官网COOKIE获取失败，相关功能将不可用！
$写 <?php echo $ming; ?>API/装扮验证/%QQ% qrsig 0$
$写 <?php echo $ming; ?>API/装扮验证/%Q% qrsig 0$

删数据|退出登陆
如果:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$==0
删除失败,没有找到[%QQ%]的数据！
返回
如果尾
$写 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$
$写 <?php echo $ming; ?>API/装扮会员.txt %QQ% 0$
$写 <?php echo $ming; ?>API/装扮群官.txt %QQ% 0$
成功删除[%QQ%]的数据！
$调用 1000 qrsig删验证$

qrsig删验证
登:$读 装扮/登陆/数据 M 0$
获:$替换 € %登%€｛"%QQ%":"€$
录:$替换 € %获%€"｝€$
如果:%录%==1
取:$替换 € %登%€｛"%QQ%":"1"｝€$
$写 装扮/登陆/数据 M %取%$
返回
如果尾

开气泡
如果:$读 <?php echo $ming; ?>API/装扮会员.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:$读 装扮/百变/气泡 %QQ% 0$==1
@%昵称% 请勿重复开启！
返回
如果尾
如果:%QQ%==%QQ%
会:$读 <?php echo $ming; ?>API/装扮会员.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@会[uin]
S:@会[skey]
P:@会[pskey]
T:@会[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/vip/vip/bubble.php?qq=%Q%&skey=%S%&pskey=%P%&token=%T%$==成功
@%昵称% 已开启随机气泡！
$写 装扮/百变/气泡 %QQ% 1$
$调用 1000 vip气泡中$
返回
如果尾
@%昵称% 开启失败，请重试！

关气泡
如果:$读 <?php echo $ming; ?>API/装扮会员.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:$读 装扮/百变/气泡 %QQ% 0$==0
@%昵称% 请勿重复关闭！
返回
如果尾
如果:%QQ%==%QQ%
会:$读 <?php echo $ming; ?>API/装扮会员.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@会[uin]
S:@会[skey]
P:@会[pskey]
T:@会[pt4token]
@%昵称% 已关闭随机气泡！
$写 装扮/百变/气泡 %QQ% 0$
返回
如果尾
@%昵称% 开启失败，请重试！

vip气泡中
如果:$读 <?php echo $ming; ?>API/装扮会员.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:$读 装扮/百变/气泡 %QQ% 0$==0
返回
如果尾
如果:%QQ%==%QQ%
会:$读 <?php echo $ming; ?>API/装扮会员.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@会[uin]
S:@会[skey]
P:@会[pskey]
T:@会[pt4token]
间:$读 装扮/百变/间隔 %QQ% 3000$
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/vip/vip/bubble.php?qq=%Q%&skey=%S%&pskey=%P%&token=%T%$==成功
$调用 %间% vip气泡中$
返回
如果尾
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/vip/vip/bubble.php?qq=%Q%&skey=%S%&pskey=%P%&token=%T%$==失败
@%昵称% 发现异常，已关闭百变气泡！
$写 装扮/百变/气泡 %QQ% 0$
返回
如果尾
$调用 %间% vip气泡中$

查气泡
如果:$读 <?php echo $ming; ?>API/装扮会员.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
会:$读 <?php echo $ming; ?>API/装扮会员.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@会[uin]
S:@会[skey]
P:@会[pskey]
T:@会[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
@%昵称% 以下是你的气泡ID\n
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/vip/vip/bubbly.php?qq=%Q%&skey=%S%$
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)

开挂件
如果:$读 <?php echo $ming; ?>API/装扮会员.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:$读 装扮/百变/挂件 %QQ% 0$==1
@%昵称% 请勿重复开启！
返回
如果尾
如果:%QQ%==%QQ%
会:$读 <?php echo $ming; ?>API/装扮会员.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@会[uin]
S:@会[skey]
P:@会[pskey]
T:@会[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/vip/vip/penant.php?qq=%Q%&skey=%S%&pskey=%P%&token=%T%$==成功
@%昵称% 已开启随机挂件！
$写 装扮/百变/挂件 %QQ% 1$
$调用 1000 vip挂件中$
返回
如果尾
@%昵称% 开启失败，请重试！

关挂件
如果:$读 <?php echo $ming; ?>API/装扮会员.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:$读 装扮/百变/挂件 %QQ% 0$==0
@%昵称% 请勿重复关闭！
返回
如果尾
如果:%QQ%==%QQ%
会:$读 <?php echo $ming; ?>API/装扮会员.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@会[uin]
S:@会[skey]
P:@会[pskey]
T:@会[pt4token]
@%昵称% 已关闭随机挂件！
$写 装扮/百变/挂件 %QQ% 0$
返回
如果尾
@%昵称% 开启失败，请重试！

vip挂件中
如果:$读 <?php echo $ming; ?>API/装扮会员.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:$读 装扮/百变/挂件 %QQ% 0$==0
返回
如果尾
如果:%QQ%==%QQ%
会:$读 <?php echo $ming; ?>API/装扮会员.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@会[uin]
S:@会[skey]
P:@会[pskey]
T:@会[pt4token]
间:$读 装扮/百变/间隔 %QQ% 3000$
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/vip/vip/penant.php?qq=%Q%&skey=%S%&pskey=%P%&token=%T%$==成功
$调用 %间% vip挂件中$
返回
如果尾
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/vip/vip/penant.php?qq=%Q%&skey=%S%&pskey=%P%&token=%T%$==失败
@%昵称% 发现异常，已关闭百变挂件！
$写 装扮/百变/挂件 %QQ% 0$
返回
如果尾
$调用 %间% vip挂件中$

查挂件
如果:$读 <?php echo $ming; ?>API/装扮会员.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
会:$读 <?php echo $ming; ?>API/装扮会员.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@会[uin]
S:@会[skey]
P:@会[pskey]
T:@会[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
@%昵称% 以下是你的挂件ID\n
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/vip/vip/penany.php?qq=%Q%&skey=%S%$
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)

开秒赞
如果:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:$读 装扮/百变/秒赞 %QQ% 0$==1
@%昵称% 请勿重复开启！
返回
如果尾
如果:%QQ%==%QQ%
空:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@空[uin]
S:@空[skey]
P:@空[pskey]
T:@空[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/vip/vip/secon.php?qq=%Q%&skey=%S%&pskey=%P%$==成功
@%昵称% 已开启秒赞！
$写 装扮/百变/秒赞 %QQ% 1$
$调用 5000 vip秒赞中$
返回
如果尾
@%昵称% 开启失败，请重试！

关秒赞
如果:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:$读 装扮/百变/秒赞 %QQ% 0$==0
@%昵称% 请勿重复关闭！
返回
如果尾
如果:%QQ%==%QQ%
空:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@空[uin]
S:@空[skey]
P:@空[pskey]
T:@空[pt4token]
@%昵称% 已关闭秒赞！
$写 装扮/百变/秒赞 %QQ% 0$
返回
如果尾
@%昵称% 开启失败，请重试！

vip秒赞中
如果:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:$读 装扮/百变/秒赞 %QQ% 0$==0
返回
如果尾
如果:%QQ%==%QQ%
空:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@空[uin]
S:@空[skey]
P:@空[pskey]
T:@空[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/vip/vip/secon.php?qq=%Q%&skey=%S%&pskey=%P%$==成功
$调用 10000 vip秒赞中$
返回
如果尾
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/vip/vip/secon.php?qq=%Q%&skey=%S%&pskey=%P%$==失败
@%昵称% 发现异常，已关闭秒赞！
$写 装扮/百变/秒赞 %QQ% 0$
返回
如果尾
$调用 10000 vip秒赞中$

抽礼物
如果:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
空:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@空[uin]
S:@空[skey]
P:@空[pskey]
T:@空[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
@%昵称%\n
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/drawt.php?qq=%Q%&skey=%S%$
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)

查礼物
如果:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
空:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@空[uin]
S:@空[skey]
P:@空[pskey]
T:@空[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
@%昵称%\n
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/drueit.php?qq=%Q%&skey=%S%$
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)

送礼物@.* (.*)
如果:$读 <?php echo $ming; ?>API/装扮会员.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
会:$读 <?php echo $ming; ?>API/装扮会员.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@会[uin]
S:@会[skey]
P:@会[pskey]
T:@会[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
c:$访问 http://jiuli.xiaoapi.cn/i/send_goods.php?uin=%QQ%&skey=%S%&pskey=%P%&qh=%群号%&to=%AT0%&id=%括号1%$
@c[msg]
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)

查钱包
如果:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
空:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@空[uin]
S:@空[skey]
P:@空[pskey]
T:@空[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
@%昵称%\n
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/qcoin.php?qq=%Q%&skey=%S%&pskey=%P%$
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)

查等级
如果:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
空:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@空[uin]
S:@空[skey]
P:@空[pskey]
T:@空[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/crade.php?qq=%Q%&skey=%S%$
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)

查访客
如果:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
空:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@空[uin]
S:@空[skey]
P:@空[pskey]
T:@空[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
@%昵称%\n
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/record.php?qq=%Q%&skey=%S%&pskey=%P%&token=%T%$
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)

查业务
如果:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
空:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@空[uin]
S:@空[skey]
P:@空[pskey]
T:@空[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
@%昵称%\n
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/busin.php?qq=%Q%&skey=%S%$
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)

查装扮
如果:$读 <?php echo $ming; ?>API/装扮会员.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
会:$读 <?php echo $ming; ?>API/装扮会员.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@会[uin]
S:@会[skey]
P:@会[pskey]
T:@会[pt4token]
以下是你的装扮信息\n
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/messa.php?qq=%Q%&skey=%S%&pskey=%P%&token=%T%$\n
(%时%)
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)

换间隔
如果:$读 <?php echo $ming; ?>API/装扮会员.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
会:$读 <?php echo $ming; ?>API/装扮会员.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@会[uin]
S:@会[skey]
P:@会[pskey]
T:@会[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
@%昵称% 格式错误，发送【换间隔+时间】
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)

换间隔([0-9]+)
如果:$读 <?php echo $ming; ?>API/装扮会员.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
会:$读 <?php echo $ming; ?>API/装扮会员.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@会[uin]
S:@会[skey]
P:@会[pskey]
T:@会[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
如果:%括号1%<1000
@%昵称% 间隔不能小于1000s
返回
如果尾
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
如果:%参数1%>=1000
@%昵称% 成功更换间隔为%括号1%s
$写 装扮/百变/间隔 %QQ% %括号1%$
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)

领金豆
如果:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
空:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@空[uin]
S:@空[skey]
P:@空[pskey]
T:@空[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
@%昵称% $访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/coaou.php?qq=%Q%&skey=%S%$
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)

送鲜花
如果:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
空:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@空[uin]
S:@空[skey]
P:@空[pskey]
T:@空[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
@%昵称% 格式错误，发送【送鲜花@艾特】
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)

送鲜花@.*
如果:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
空:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@空[uin]
S:@空[skey]
P:@空[pskey]
T:@空[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
@%昵称% $访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/sower.php?qq=%Q%&skey=%S%&group=%群号%&uin=%AT0%$
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)

查状态
如果:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
空:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@空[uin]
S:@空[skey]
P:@空[pskey]
T:@空[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
气:$读 装扮/百变/气泡 %QQ% 0$
挂:$读 装扮/百变/挂件 %QQ% 0$
秒:$读 装扮/百变/秒赞 %QQ% 0$
间:$读 装扮/百变/间隔 %QQ% 3000$
气:$替换 € %气%€0€关$
气:$替换 € %气%€1€开$
挂:$替换 € %挂%€0€关$
挂:$替换 € %挂%€1€开$
秒:$替换 € %秒%€0€关$
秒:$替换 € %秒%€1€开$
@%昵称%\n
-----装扮状态-----\n
随机气泡：%气%\n
随机挂件：%挂%\n
空间秒赞：%秒%\n
更换间隔：%间%s\n
-------------------\n
(%时%)
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)

群签到
如果:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
空:$读 <?php echo $ming; ?>API/装扮群官.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@空[uin]
S:@空[skey]
P:@空[pskey]
T:@空[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
@%昵称% 开始QQ群签到，请稍后。。。
$调用 1000 chfgroup$
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)

chfgroup
如果:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
空:$读 <?php echo $ming; ?>API/装扮群官.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@空[uin]
S:@空[skey]
P:@空[pskey]
T:@空[pt4token]
语:$读 装扮/群官/签到语 %QQ% 怀念过去的小幸福$
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
@%昵称% $访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/grouin.php?qq=%Q%&skey=%S%&pskey=%P%&msg=%语%$
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)

(搜气泡|搜挂件|搜字体|搜浮屏)
如果:$读 <?php echo $ming; ?>API/装扮会员.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
会:$读 <?php echo $ming; ?>API/装扮会员.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@会[uin]
S:@会[skey]
P:@会[pskey]
T:@会[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
如果:%括号1%==搜气泡
@%昵称% 格式错误，发送【搜气泡+名字】
返回
如果尾
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
如果:%括号1%==搜挂件
@%昵称% 格式错误，发送【搜挂件+名字】
返回
如果尾
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
如果:%括号1%==搜字体
@%昵称% 格式错误，发送【搜字体+名字】
返回
如果尾
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
如果:%括号1%==搜浮屏
@%昵称% 格式错误，发送【搜浮屏+名字】
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)

(搜气泡|搜挂件|搜字体|搜浮屏) .*
如果:$读 <?php echo $ming; ?>API/装扮会员.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
会:$读 <?php echo $ming; ?>API/装扮会员.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
P:%Json%
P:@P[pskey]
P:@P[vip.qq.com]
如果:%括号1%==搜气泡
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/vip/bubble.php?qq=%Robot%&skey=%Skey%&pskey=%P%&msg=%参数1%$
返回
如果尾
如果:%括号1%==搜字体
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Robot%&skey=%Skey%$==0
返回
如果尾
如果:%括号1%==搜挂件
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/vip/penant.php?qq=%Robot%&skey=%Skey%&pskey=%P%&msg=%参数1%$
返回
如果尾
如果:%括号1%==搜浮屏
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/vip/screen.php?qq=%Robot%&skey=%Skey%&pskey=%P%&msg=%参数1%$

(设置气泡|设置挂件|设置字体|设置浮屏)
如果:$读 <?php echo $ming; ?>API/装扮会员.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
会:$读 <?php echo $ming; ?>API/装扮会员.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@会[uin]
S:@会[skey]
P:@会[pskey]
T:@会[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
如果:%括号1%==设置气泡
@%昵称% 格式错误，发送【设置气泡+ID】
返回
如果尾
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
如果:%括号1%==设置挂件
@%昵称% 格式错误，发送【设置挂件+ID】
返回
如果尾
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
如果:%括号1%==设置字体
@%昵称% 格式错误，发送【设置字体+ID】
返回
如果尾
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
如果:%括号1%==设置浮屏
@%昵称% 格式错误，发送【设置浮屏+ID】
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)

(设置气泡|设置挂件|设置字体|设置浮屏) [0-9]+
如果:$读 <?php echo $ming; ?>API/装扮会员.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
会:$读 <?php echo $ming; ?>API/装扮会员.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@会[uin]
S:@会[skey]
P:@会[pskey]
T:@会[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
如果:%括号1%==设置气泡
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/vip/bubble.php?qq=%Q%&skey=%S%&pskey=%P%&token=%T%&id=%参数1%$
返回
如果尾
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
如果:%括号1%==设置挂件
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/vip/penant.php?qq=%Q%&skey=%S%&pskey=%P%&token=%T%&id=%参数1%$
返回
如果尾
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
如果:%括号1%==设置字体
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/vip/tyeace.php?qq=%Q%&skey=%S%&pskey=%P%&token=%T%&id=%参数1%$
返回
如果尾
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
如果:%括号1%==设置浮屏
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/vip/screen.php?qq=%Q%&skey=%S%&pskey=%P%&token=%T%&id=%参数1%$
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)

查用户
A:$读 装扮/登陆/数据 M 0$
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/ckuser.php?msg=%A%$

删数据
如果:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
空:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@空[uin]
S:@空[skey]
P:@空[pskey]
T:@空[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
@%昵称% 格式错误，发送【删除用户+QQ】
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)

删数据([0-9]+)
如果:%QQ%==%主人%
如果:$读 <?php echo $ming; ?>API/装扮空间.txt %参数1% 0$==0
删除失败,没有找到[%括号1%]的数据！
返回
如果尾
如果:%QQ%==%主人%
$写 <?php echo $ming; ?>API/装扮空间.txt %括号1% 0$
$写 <?php echo $ming; ?>API/装扮会员.txt %括号1% 0$
$写 <?php echo $ming; ?>API/装扮群官.txt %括号1% 0$
登:$读 装扮/登陆/数据 M 0$
取:$替换 € %登%€｛"%括号1%":"1"｝€$
$写 装扮/登陆/数据 M %取%$
成功删除[%括号1%]的数据！
返回
如果尾
@%昵称% 你不是我的主人！

发公告
如果:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
空:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@空[uin]
S:@空[skey]
P:@空[pskey]
T:@空[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
@%昵称% 格式错误，发送【发公告+内容】
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)

发公告 ?(.*)
如果:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
空:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@空[uin]
S:@空[skey]
P:@空[pskey]
T:@空[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
@%昵称% $访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/reusua/puaou.php?qq=%QQ%&skey=%S%&group=%群号%&msg=%括号1%$
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)

查管理
如果:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
空:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@空[uin]
S:@空[skey]
P:@空[pskey]
T:@空[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
$访问 SETGET {} http://sqv6.com/qq/api/api/gly.php?uin=%Robot%&skey=%Skey%&qh=%群号%$
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)

查禁言
如果:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
空:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@空[uin]
S:@空[skey]
P:@空[pskey]
T:@空[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
$访问 SETGET {} http://sqv6.com/qq/api/api/cjy.php?uin=%QQ%&skey=%S%&qh=%群号%$
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)

随机说说
如果:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
空:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@空[uin]
S:@空[skey]
P:@空[pskey]
T:@空[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
@%昵称%\n
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/sendit.php?qq=%Q%&skey=%S%&pskey=%P%&token=%T%$
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)

发表说说|发说说
如果:$读 <?php echo $ming; ?>API/装扮会员.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
会:$读 <?php echo $ming; ?>API/装扮会员.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@会[uin]
S:@会[skey]
P:@会[pskey]
T:@会[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
@%昵称% 格式错误，发送【发表说说+内容】
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)

发说说 ?(.*)
如果:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
空:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@空[uin]
S:@空[skey]
P:@空[pskey]
T:@空[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
@%昵称%\n
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/sheor.php?qq=%Q%&skey=%S%&pskey=%P%&token=%T%&msg=%括号1%$
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)

发表说说 ?(.*)
如果:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
空:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@空[uin]
S:@空[skey]
P:@空[pskey]
T:@空[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
@%昵称%\n
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/sheor.php?qq=%Q%&skey=%S%&pskey=%P%&token=%T%&msg=%括号1%$
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)

说说列表
如果:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
空:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@空[uin]
S:@空[skey]
P:@空[pskey]
T:@空[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/saost.php?qq=%Q%&skey=%S%&pskey=%P%&token=%T%$
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)

删除说说|删说说
如果:$读 <?php echo $ming; ?>API/装扮会员.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
会:$读 <?php echo $ming; ?>API/装扮会员.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@会[uin]
S:@会[skey]
P:@会[pskey]
T:@会[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
@%昵称% 格式错误，发送【删除说说+tid】
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)

删除说说 ?(.*)
如果:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
空:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@空[uin]
S:@空[skey]
P:@空[pskey]
T:@空[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
@%昵称%\n
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/sreme.php?qq=%Q%&skey=%S%&pskey=%P%&token=%T%&tid=%括号1%$
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)

删说说 ?(.*)
如果:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
空:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@空[uin]
S:@空[skey]
P:@空[pskey]
T:@空[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
@%昵称%\n
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/sreme.php?qq=%Q%&skey=%S%&pskey=%P%&token=%T%&tid=%括号1%$
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)

黄钻签到
如果:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
空:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@空[uin]
S:@空[skey]
P:@空[pskey]
T:@空[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
@%昵称% $访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/yewmo.php?qq=%Q%&skey=%S%&pskey=%P%$
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)

图书签到
如果:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
空:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@空[uin]
S:@空[skey]
P:@空[pskey]
T:@空[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
@%昵称% $访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/bokma.php?qq=%Q%&skey=%S%&pskey=%P%$
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)

部落签到
如果:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
空:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@空[uin]
S:@空[skey]
P:@空[pskey]
T:@空[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
@%昵称%\n
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/tribal.php?qq=%Q%&skey=%S%&pskey=%P%&token=%T%$
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)

部落领心
如果:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
空:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@空[uin]
S:@空[skey]
P:@空[pskey]
T:@空[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
@%昵称% $访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/ngxina.php?qq=%Q%&skey=%S%$
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)

空间访问
如果:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
空:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@空[uin]
S:@空[skey]
P:@空[pskey]
T:@空[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
@%昵称% 正在调用装扮用户访问你的空间，请稍后。。。\n访问数量自行查看
$调用 1000 qzone访问$
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)

qzone访问
如果:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
M:$读 <?php echo $ming; ?>API/空间用户.txt mm 0$
O:|$读 <?php echo $ming; ?>API/空间用户.txt mm 0$|
U:$取中间 @ %O%@|@|$
K:$替换 @ %M%@%U%|@$
$写 <?php echo $ming; ?>API/空间用户.txt mm %K%$
空:$读 <?php echo $ming; ?>API/装扮空间.txt %U% 0$
Q:@空[uin]
S:@空[skey]
P:@空[pskey]
T:@空[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
@%昵称% $访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/ceacs.php?qq=%U%&uin=%QQ%&skey=%S%&pskey=%P%$
$调用 1000 qzone访问$
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)
$调用 1000 qzone访问$



空间签到
如果:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
空:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@空[uin]
S:@空[skey]
P:@空[pskey]
T:@空[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
A:$读 装扮/登陆/数据 M 0$
@%昵称% 待更新！
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)

我的步数
如果:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
空:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@空[uin]
S:@空[skey]
P:@空[pskey]
T:@空[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
@%昵称% $访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/umste.php?qq=%Q%&skey=%S%&pskey=%P%$
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)

早起打卡
如果:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
空:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@空[uin]
S:@空[skey]
P:@空[pskey]
T:@空[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
@%昵称% $访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/registg.php?qq=%Q%&skey=%S%&pskey=%P%&token=%T%$
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)

早起报名
如果:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
空:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@空[uin]
S:@空[skey]
P:@空[pskey]
T:@空[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
@%昵称% $访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/registe.php?qq=%Q%&skey=%S%&pskey=%P%&token=%T%$
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)

步数打卡
如果:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
空:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@空[uin]
S:@空[skey]
P:@空[pskey]
T:@空[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
@%昵称% $访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/stunc.php?qq=%Q%&skey=%S%$
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)

我的卡片
如果:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
空:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@空[uin]
S:@空[skey]
P:@空[pskey]
T:@空[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
@%昵称%\n
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/hecar.php?qq=%Q%&skey=%S%$
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)

开名片赞
如果:%QQ%==%主人%
@%昵称% 名片赞功能已开启！
$写 装扮/名片赞/开关 Q 1$
返回
如果尾
@%昵称% 你不是我的主人！

关名片赞
如果:%QQ%==%主人%
@%昵称% 名片赞功能已关闭！
$写 装扮/名片赞/开关 Q 0$
返回
如果尾
@%昵称% 你不是我的主人！

一键互赞
如果:$读 装扮/名片赞/开关 Q 0$==0
@%昵称% 名片赞功能未开启！
返回
如果尾
如果:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:$读 装扮/名片赞/时间 %QQ% 0$==%时间HH%
@%昵称% 还没到互赞时间！
返回
如果尾
如果:%QQ%==%QQ%
空:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@空[uin]
S:@空[skey]
P:@空[pskey]
T:@空[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
@%昵称% 正在为您提交互赞，请稍后。
$调用 1000 qp名片赞$
$写 装扮/名片赞/时间 %QQ% %时间HH%$
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)

qp名片赞
如果:$读 装扮/名片赞/开关 Q 0$==0
@%昵称% 名片赞功能未开启！
返回
如果尾
如果:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
空:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@空[uin]
S:@空[skey]
P:@空[pskey]
T:@空[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
A:$读 装扮/登陆/数据 M 0$
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/praise.php?msg=%A%&pq=%QQ%$
@%昵称% 已将你加入互赞中，数量未知，用户越多赞就越多！
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)

查名片赞
如果:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
会:$读 <?php echo $ming; ?>API/装扮会员.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@会[uin]
S:@会[skey]
P:@会[pskey]
T:@会[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
@%昵称%\n
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/naman.php?qq=%Q%&skey=%S%&pskey=%P%$
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)

手游加速
如果:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
空:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@空[uin]
S:@空[skey]
P:@空[pskey]
T:@空[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
@%昵称% $访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/hanou.php?qq=%Q%&skey=%S%&pskey=%P%$
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)

农场签到
如果:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
空:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@空[uin]
S:@空[skey]
P:@空[pskey]
T:@空[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
@%昵称% $访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/cherm.php?qq=%Q%&skey=%S%$
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)


取消气泡
如果:$读 <?php echo $ming; ?>API/装扮会员.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
会:$读 <?php echo $ming; ?>API/装扮会员.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@会[uin]
S:@会[skey]
P:@会[pskey]
T:@会[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/vip/bubblz.php?qq=%Q%&skey=%S%&pskey=%P%&token=%T%$
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)


取消挂件
如果:$读 <?php echo $ming; ?>API/装扮会员.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
会:$读 <?php echo $ming; ?>API/装扮会员.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@会[uin]
S:@会[skey]
P:@会[pskey]
T:@会[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/vip/penanz.php?qq=%Q%&skey=%S%&pskey=%P%&token=%T%$
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)


取消字体
如果:$读 <?php echo $ming; ?>API/装扮会员.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
会:$读 <?php echo $ming; ?>API/装扮会员.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@会[uin]
S:@会[skey]
P:@会[pskey]
T:@会[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/vip/tyeacz.php?qq=%Q%&skey=%S%&pskey=%P%&token=%T%$
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)

取消浮屏
如果:$读 <?php echo $ming; ?>API/装扮会员.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
会:$读 <?php echo $ming; ?>API/装扮会员.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@会[uin]
S:@会[skey]
P:@会[pskey]
T:@会[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/vip/screez.php?qq=%Q%&skey=%S%&pskey=%P%&token=%T%$
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)

修改昵称
如果:$读 <?php echo $ming; ?>API/装扮会员.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
会:$读 <?php echo $ming; ?>API/装扮会员.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@会[uin]
S:@会[skey]
P:@会[pskey]
T:@会[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
@%昵称% 格式错误，发送【修改昵称+内容】
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)

修改昵称 ?(.*)
如果:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
空:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@空[uin]
S:@空[skey]
P:@空[pskey]
T:@空[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
@%昵称% $访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/angse.php?qq=%Q%&skey=%S%&msg=%括号1%$
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)

空白昵称
如果:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
空:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@空[uin]
S:@空[skey]
P:@空[pskey]
T:@空[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
@%昵称% $访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/kongbai.php?qq=%Q%&skey=%S%$
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)

查步数
如果:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
空:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@空[uin]
S:@空[skey]
P:@空[pskey]
T:@空[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
$访问 SETGET {} http://sqv6.com/qq/api/api/jrbs.php?uin=%QQ%&skey=%S%$
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)

设置机型
如果:$读 <?php echo $ming; ?>API/装扮会员.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
会:$读 <?php echo $ming; ?>API/装扮会员.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@会[uin]
S:@会[skey]
P:@会[pskey]
T:@会[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
@%昵称% 格式错误，发送【设置机型+IMEI(在手机设置/关于手机里查看)+内容】
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)

设置机型([0-9]+) (.*)
如果:$读 <?php echo $ming; ?>API/装扮空间.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
会:$读 <?php echo $ming; ?>API/装扮会员.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@会[uin]
S:@会[skey]
P:@会[pskey]
T:@会[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/model.php?qq=%Q%&skey=%S%&pskey=%P%&token=%T%&id=%括号1%&msg=%括号2%$
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)

改签到语
如果:$读 <?php echo $ming; ?>API/装扮会员.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
群:$读 <?php echo $ming; ?>API/装扮群官.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@群[uin]
S:@群[skey]
P:@群[pskey]
T:@群[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
@%昵称% 格式错误，发送【改签到语+内容】
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)

改签到语 ?(.*)
如果:$读 <?php echo $ming; ?>API/装扮会员.txt %QQ% 0$==0
请先发送[申请装扮]扫码登录！
返回
如果尾
如果:%QQ%==%QQ%
群:$读 <?php echo $ming; ?>API/装扮群官.txt %QQ% 0$
时:%时间yyyy%-%时间MM%-%时间dd% %时间HH%:%时间mm%:%时间ss%
Q:@群[uin]
S:@群[skey]
P:@群[pskey]
T:@群[pt4token]
如果:$访问 http://<?php echo $_SERVER['HTTP_HOST'];?>/api/data/gexing/reusua/gemen.php?qq=%Q%&skey=%S%$==0
@%昵称% 已修改签到语!
$写 装扮/群官/签到语 %QQ% %括号1%$
返回
如果尾
@%昵称%\n您的Cookies已失效，请重新登录！\n(%时%)</textarea><button id="copy" style="width:100%;background-color:#FFFFFF;background-image:linear-gradient(90deg,#6694ed 0%,);color:#000000;border-radius:5px" onclick=copy()>点我复制</button>
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