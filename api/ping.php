<?php
include("./API.php");
include("../tianyi.php");
tongji("ping");
$url=$_GET['url'];//需要查询的域名
$hh=$_GET['hh']?:"\n";//换行符号(默认\n)
if(!$url){echo "".$ming."API♧Ping网站测速".$hh."━━━━━━━━━".$hh."url 参数为空".$hh."━━━━━━━━━".$hh."Tips:".$ming."API技术支持";exit;}
$url = file_get_contents("http://api.yum6.cn/ping.php?host=".$url."");
$url = json_decode($url, true);
if($url["state"]==1000){
echo "".$ming."API♧Ping网站测速".$hh."";
echo "━━━━━━━━━".$hh."";
echo "网站域名：".$url["host"]."".$hh."";
echo "网站IP：".$url["ip"]."".$hh."";
echo "最大延迟：".$url["ping_time_max"]."".$hh."";
echo "最小延迟：".$url["ping_time_min"]."".$hh."";
echo "服务器归属：".$url["node"]."".$hh."";
echo "服务器运营部：".$url["location"]."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
echo "".$ming."API♧Ping网站测速".$hh."";
echo "━━━━━━━━━".$hh."";
echo "本接口正在维护！".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
?>