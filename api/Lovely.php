<?php
header("Content-Type:text/html;charset=UTF-8");
include("./API.php");
include("../tianyi.php");
tongji("Lovely");
$hh=$_GET["hh"]?:"\n";//换行符号(默认\n)
$url = file_get_contents("http://lkaa.top/API/Lovely/api?type=json");
$url = json_decode($url, true);
if($url["code"]==1){
echo "".$ming."API动漫里那些可爱女主".$hh."";
echo "━━━━━━━━━".$hh."";
echo "±img=".$url["text"]."±".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
echo "".$ming."API动漫里那些可爱女主".$hh."";
echo "━━━━━━━━━".$hh."";
echo "本接口正在维护！".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
?>