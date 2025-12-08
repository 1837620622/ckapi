<?php
include("./API.php");
include("../tianyi.php");
tongji("xiangua");
$hh=$_GET["hh"]?:"\n";//换行符号(默认\n)
$url = file_get_contents("https://api.vvhan.com/api/xh?type=json");
$url = json_decode($url, true);
if($url["success"]==true){
echo "".$ming."API随机笑话".$hh."";
echo "━━━━━━━━━".$hh."";
echo "".$url["joke"]."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
echo "".$ming."API随机笑话".$hh."";
echo "━━━━━━━━━".$hh."";
echo "本接口正在维护！".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
?>