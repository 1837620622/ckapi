<?php
header("Content-Type:text/html;charset=UTF-8");
include("./API.php");
include("../tianyi.php");
tongji("daan");
$hh=$_GET["hh"]?:"\n";//换行符号(默认\n)
$url = file_get_contents("http://lkaa.top/API/daan/api?type=json");
$url = json_decode($url, true);
if($url["code"]==1){
echo "".$ming."API答案之书".$hh."";
echo "━━━━━━━━━".$hh."";
echo "中文：".$url["data"]["zh"]."".$hh."";
echo "英语：".$url["data"]["en"]."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
echo "".$ming."API答案之书".$hh."";
echo "━━━━━━━━━".$hh."";
echo "本接口正在维护！".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
?>