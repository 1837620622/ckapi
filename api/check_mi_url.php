<?php
include("./API.php");
include("../tianyi.php");
tongji("check_mi_url");
$url=$_GET['url'];//需要查询的链接
$hh=$_GET['hh']?:"\n";//换行符号(默认\n)
if(!$url){echo "".$ming."API小米域名检测".$hh."━━━━━━━━━".$hh."url 参数为空".$hh."━━━━━━━━━".$hh."Tips:".$ming."API技术支持";exit;}
$url = file_get_contents("https://res.abeim.cn/api-check_mi_url?url=".$url."");
$url = json_decode($url, true);
if($url["code"]==2000){
echo "".$ming."API小米域名检测".$hh."";
echo "━━━━━━━━━".$hh."";
echo "链接：".$url["url"]."".$hh."";
echo "".$url["status"]."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
echo "".$ming."API小米域名检测".$hh."";
echo "━━━━━━━━━".$hh."";
echo "本接口正在维护！".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
?>