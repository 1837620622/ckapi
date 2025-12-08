<?php
include("./API.php");
include("../tianyi.php");
tongji("rao");
$hh=$_GET["hh"]?:"\n";//换行符号(默认\n)
$url = file_get_contents("http://lkaa.top/API/rao/api.php");
$url = json_decode($url, true);
if($url["code"]==1){
echo "".$ming."API绕口令".$hh."";
echo "━━━━━━━━━".$hh."";
echo "".$url["text"]."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
echo "".$ming."API绕口令".$hh."";
echo "━━━━━━━━━".$hh."";
echo "本接口正在维护！".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
?>