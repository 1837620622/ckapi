<?php
include("./API.php");
include("../tianyi.php");
tongji("location_geocoder_address");
$lng=$_GET['lng'];//需要查询的经度
$lat=$_GET['lat'];//需要查询的纬度
$hh=$_GET['hh']?:"\n";//换行符号(默认\n)
if(!$lng){echo "".$ming."API经纬度解析".$hh."━━━━━━━━━".$hh."lng 参数为空".$hh."━━━━━━━━━".$hh."Tips:".$ming."API技术支持";exit;}
if(!$lat){echo "".$ming."API经纬度解析".$hh."━━━━━━━━━".$hh."lat 参数为空".$hh."━━━━━━━━━".$hh."Tips:".$ming."API技术支持";exit;}
$url = file_get_contents("https://res.abeim.cn/api-location_geocoder_address?lng=".$lng."&lat=".$lat."");
$url = json_decode($url, true);
if($url["code"]==200){
echo "".$ming."API经纬度解析".$hh."";
echo "━━━━━━━━━".$hh."";
echo "经纬度：".$url["data"]["location"]."".$hh."";
echo "省份：".$url["data"]["province"]."".$hh."";
echo "城市：".$url["data"]["city"]."".$hh."";
echo "区：".$url["data"]["district"]."".$hh."";
echo "街道：".$url["data"]["street"]."".$hh."";
echo "地区：".$url["data"]["title"]."".$hh."";
echo "推荐地区：".$url["data"]["recommend"]."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
echo "".$ming."API经纬度解析".$hh."";
echo "━━━━━━━━━".$hh."";
echo "本接口正在维护！".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
?>