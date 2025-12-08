<?php
include("./API.php");
include("../tianyi.php");
tongji("chouq");
$hh=$_GET["hh"]?:"\n";//换行符号(默认\n)
$url = file_get_contents("http://lkaa.top/API/chouq/api.php");
$url = json_decode($url, true);
if($url["code"]==1){
echo "".$ming."API抽签".$hh."";
echo "━━━━━━━━━".$hh."";
echo "签名：".$url["data"]["title"]."".$hh."";
echo "抽签内容：".$url["data"]["text"]."".$hh."";
echo "±img=".$url["data"]["image"]."±".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
echo "".$ming."API抽签".$hh."";
echo "━━━━━━━━━".$hh."";
echo "本接口正在维护！".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
?>