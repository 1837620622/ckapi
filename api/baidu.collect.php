<?php
include("./API.php");
include("../tianyi.php");
tongji("baidu.collect");
$url=$_GET['url'];//需要查询的链接
$hh=$_GET['hh']?:"\n";//换行符号(默认\n)
if(!$url){echo "".$ming."API百度收录信息判断".$hh."━━━━━━━━━".$hh."url 参数为空".$hh."━━━━━━━━━".$hh."Tips:".$ming."API技术支持";exit;}
$url = file_get_contents("https://api.66mz8.com/api/baidu.collect.php?url=".$url."");
$url = json_decode($url, true);
if($url["code"]==200){
echo "".$ming."API百度收录信息判断".$hh."";
echo "━━━━━━━━━".$hh."";
echo "网址：".$url["url"]."".$hh."";
echo "收录：".$url["msg"]."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
echo "".$ming."API百度收录信息判断".$hh."";
echo "━━━━━━━━━".$hh."";
echo "本接口正在维护！".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
?>