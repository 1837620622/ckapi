<?php
header("Content-Type:text/html;charset=UTF-8");
include("./API.php");
include("../tianyi.php");
tongji("bilitop");
$hh=$_GET["hh"]?:"\n";//换行符号(默认\n)
$url = file_get_contents("https://api.muxiuge.cn/API/bilitop.php");
$url = json_decode($url, true);
if($url["code"]==200){
echo "".$ming."API哔哩哔哩视频排行榜".$hh."";
echo "━━━━━━━━━".$hh."";
foreach($url["data"] as $value)
{
echo "".$value."".$hh."";
echo "━━━━━━━━━".$hh."";
}
echo "Tips:".$ming."API技术支持";
}else{
echo "".$ming."API哔哩哔哩视频排行榜".$hh."";
echo "━━━━━━━━━".$hh."";
echo "本接口正在维护！".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
?>