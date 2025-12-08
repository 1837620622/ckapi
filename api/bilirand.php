<?php
header("Content-Type:text/html;charset=UTF-8");
include("./API.php");
include("../tianyi.php");
tongji("bilirand");
$hh=$_GET["hh"]?:"\n";//换行符号(默认\n)
$url = file_get_contents("http://api.muxiuge.cn/API/bilirand.php");
$url = json_decode($url, true);
if($url["code"]==200){
echo "".$ming."API哔哩哔哩随机视频".$hh."";
echo "━━━━━━━━━".$hh."";
echo "视频作者：".$url["data"]["author"]."".$hh."";
echo "视频标题：".$url["data"]["title"]."".$hh."";
echo "视频硬币：".$url["data"]["coin"]."个".$hh."";
echo "视频时长：".$url["data"]["time"]."".$hh."";
echo "视频封面：".$url["data"]["pic"]."".$hh."";
echo "视频链接：".$url["data"]["url"]."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
echo "".$ming."API哔哩哔哩随机视频".$hh."";
echo "━━━━━━━━━".$hh."";
echo "本接口正在维护！".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
?>