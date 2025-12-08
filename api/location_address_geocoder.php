<?php
include("./API.php");
include("../tianyi.php");
tongji("location_address_geocoder");
$address=$_GET['address'];//需要查询的地区
$hh=$_GET['hh']?:"\n";//换行符号(默认\n)
if(!$address){echo "".$ming."API地区解析".$hh."━━━━━━━━━".$hh."address 参数为空".$hh."━━━━━━━━━".$hh."Tips:".$ming."API技术支持";exit;}
$url = file_get_contents("https://res.abeim.cn/api-location_address_geocoder?address=".$address."");
$url = json_decode($url, true);
if($url["code"]==200){
echo "".$ming."API地区解析".$hh."";
echo "━━━━━━━━━".$hh."";
echo "城市：".$url["data"]["city"]."".$hh."";
echo "区：".$url["data"]["district"]."".$hh."";
echo "地址：".$url["data"]["name"]."".$hh."";
echo "经度：".$url["data"]["lng"]."".$hh."";
echo "纬度：".$url["data"]["lat"]."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
echo "".$ming."API地区解析".$hh."";
echo "━━━━━━━━━".$hh."";
echo "本接口正在维护！".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
?>