<?php
error_reporting(0);
$conf['qqjump']=1;
$siteurl = $_SERVER['HTTP_REFERER']?$_SERVER['HTTP_REFERER']:"http://".$_SERVER['HTTP_HOST'];
$useragent = strtolower($_SERVER['HTTP_USER_AGENT']);
if(strpos($useragent, 'iphone')!==false || strpos($useragent, 'ipod')!==false){
	$alert = '<img src="//puep.qpic.cn/coral/Q3auHgzwzM4fgQ41VTF2rLrNvRzmibibqrjTFj5g2kzGyoQj3ViartAEQ/0" class="icon-safari" /> <span id="openm">Safari打开</span>';
}elseif(strpos($useragent, 'micromessenger')!==false){
	$alert = '<img src="//puep.qpic.cn/coral/Q3auHgzwzM4fgQ41VTF2rLbNVmztN9ia6GPRJ0IFicucFTr4Pp8xzibsw/0" class="icon-safari" /> <span id="openm">浏览器打开</span>';
}else{
	$alert = '<img src="//puep.qpic.cn/coral/Q3auHgzwzM4fgQ41VTF2rOCTm6gtUeQKX7m84xg47iaVosibGckrP0JQ/0" class="icon-safari" /> <span id="openm">浏览器打开</span>';
}
if(strpos($_SERVER['HTTP_USER_AGENT'], 'QQ/')!==false && $conf['qqjump']==1){
echo '<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>请用浏览器打开本站 － '.$ming.'API</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"/>
    <meta content="yes" name="apple-mobile-web-app-capable"/>
    <meta content="black" name="apple-mobile-web-app-status-bar-style"/>
    <meta name="format-detection" content="telephone=no"/>
    <meta content="false" name="twcClient" id="twcClient"/>
    <meta name="aplus-touch" content="1"/>
    <style>
body,html{width:100%;height:100%}
*{margin:0;padding:0}
body{background-color:#fff}
.top-bar-guidance{font-size:15px;color:#fff;height:70%;line-height:1.8;padding-left:20px;padding-top:20px;background:url(//gw.alicdn.com/tfs/TB1eSZaNFXXXXb.XXXXXXXXXXXX-750-234.png) center top/contain no-repeat}
.top-bar-guidance .icon-safari{width:25px;height:25px;vertical-align:middle;margin:0 .2em}
.app-download-tip{margin:0 auto;width:290px;text-align:center;font-size:15px;color:#2466f4;background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAAcAQMAAACak0ePAAAABlBMVEUAAAAdYfh+GakkAAAAAXRSTlMAQObYZgAAAA5JREFUCNdjwA8acEkAAAy4AIE4hQq/AAAAAElFTkSuQmCC) left center/auto 15px repeat-x}
.app-download-tip .guidance-desc{background-color:#fff;padding:0 5px}
.app-download-btn{display:block;width:214px;height:40px;line-height:40px;margin:18px auto 0 auto;text-align:center;font-size:18px;color:#2466f4;border-radius:20px;border:.5px #2466f4 solid;text-decoration:none}
    </style>
</head>
<body>
<div class="top-bar-guidance">
    <p>点击右上角'.$alert.'</p>
    <p>可以继续浏览本站哦~</p>
</div>
<div class="app-download-tip">
<span class="guidance-desc">您也可以手动复制本站网址，到其它浏览器打开</span>
</div>
</body>
</html>';exit;} ?>
<style>
.tp_advertising{
width: 100%;
display: flex;
justify-content: space-between;
background: #fff;
position: relative;
box-shadow: 0 0 3px rgba(0,0,0,.2);
	}
	.tp_advertising p{
color: #fff;
font-size: 14px;
line-height: 22px;
background: #6F8EC5;
position: absolute;
bottom: 0;
right: 0;
margin: 0;
padding: 0 8px;
	    border-top-left-radius: 10px;
	    opacity: .3;
	}
	.tp_advertising div{
width: 16.66%;
position: relative;
z-index: 1;
	}
	.tp_advertising a{
font-size: 12px;
line-height: 22px;
text-align: center;
display: block;
text-decoration: none;
white-space:nowrap;
	}
	.tp_advertising a:hover{
font-weight: bold;
font-size: 14px;
text-shadow: 0px 0px 1px rgba(0,0,0,.5);
	}
	.tp_1 a{
color: #FF0033;
	}
	.tp_2 a{
color: #9400D3;
	}
	.tp_3 a{
color: #00BFFF;
	}
	.tp_4 a{
color: #FF1493;
	}
	.tp_5 a{
color: #FF4500;
	}
	.tp_6 a{
color: #5fb878;
	}
</style>
<div class="tp_advertising">
<p>广告展示</p>
<div class="tp_1">
<a href="http://api.crazykk.tech/" target="_blank">传康免费API接口</a>
<a href="https://wk.crazykk.tech/" target="_blank">传康云刷网课</a>
<a href="https://www.crazykk.tech/sp" target="_blank">传康云视频解析</a>
<a href="" onclick="return alert('请联系站长了解！');" target='_blank'>广告招租 qq：1837620622</a>
</div>

</div>