<?php
include("./API.php");
include("../tianyi.php");
tongji("qmjc");
$url=$_GET['url'];//需要查询的链接
$hh=$_GET['hh']?:"\n";//换行符号(默认\n)
if(!$url){echo "".$ming."API域名拦截检测".$hh."━━━━━━━━━".$hh."url 参数为空".$hh."━━━━━━━━━".$hh."Tips:".$ming."API技术支持";exit;}
$url = file_get_contents("http://".$_SERVER['HTTP_HOST']."/api/qmjc2.php?url=".$url."");
$url = json_decode($url, true);
if($url["code"]==1){
echo "".$ming."API域名拦截检测".$hh."";
echo "━━━━━━━━━".$hh."";
echo "网址：".$url["url"]."".$hh."";
echo "".$url["msg"]."".$hh."";
echo "检测状态：".$url["type"]."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
echo "".$ming."API域名拦截检测".$hh."";
echo "━━━━━━━━━".$hh."";
echo "本接口正在维护！".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
?>