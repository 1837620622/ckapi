<?php
include("./API.php");
include("../tianyi.php");
tongji("ip_info");
$ip=$_GET['ip'];//需要查询的IP地址
$hh=$_GET['hh']?:"\n";//换行符号(默认\n)
if(!$ip){echo "".$ming."API查询IP信息".$hh."━━━━━━━━━".$hh."ip 参数为空".$hh."━━━━━━━━━".$hh."Tips:".$ming."API技术支持";exit;}
$url = file_get_contents("https://res.abeim.cn/api-ip_info?ip=".$ip."");
$url = json_decode($url, true);
if($url["code"]==200){
echo "".$ming."API查询IP信息".$hh."";
echo "━━━━━━━━━".$hh."";
echo "查询IP：".$url["data"]["ip"]."".$hh."";
echo "IP起始段：".$url["data"]["ip_begin"]."".$hh."";
echo "IP结束段：".$url["data"]["ip_end"]."".$hh."";
echo "IP物理位置：".$url["data"]["ip_pos"]."".$hh."";
echo "IP运营商：".$url["data"]["ip_isp"]."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
echo "".$ming."API查询IP信息".$hh."";
echo "━━━━━━━━━".$hh."";
echo "本接口正在维护！".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
?>