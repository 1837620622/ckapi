<?php
include("./API.php");
include("../tianyi.php");
tongji("check");
$url=$_GET['url'];//需要查询的链接
$hh=$_GET['hh']?:"\n";//换行符号(默认\n)
if(!$url){echo "".$ming."API域名报毒检测".$hh."━━━━━━━━━".$hh."url 参数为空".$hh."━━━━━━━━━".$hh."Tips:".$ming."API技术支持";exit;}
$url = file_get_contents("https://api.66mz8.com/api/check.php?url=".$url."");
$url = json_decode($url, true);
if($url["code"]==200){
echo "".$ming."API域名报毒检测".$hh."";
echo "━━━━━━━━━".$hh."";
echo "网址：".$url["url"]."".$hh."";
echo "".$url["state"]."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
echo "".$ming."API域名报毒检测".$hh."";
echo "━━━━━━━━━".$hh."";
echo "本接口正在维护！".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
?>