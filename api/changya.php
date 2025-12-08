<?php
header("Content-Type:text/html;charset=UTF-8");
include("./API.php");
include("../tianyi.php");
tongji("changya");
$hh=$_GET["hh"]?:"\n";//换行符号(默认\n)
$url = file_get_contents("http://yingy.20wl.co/Api/php/changya.php");
$url = json_decode($url, true);
if($url["code"]==200){
echo "".$ming."API随机唱鸭".$hh."";
echo "━━━━━━━━━".$hh."";
echo "±img=".$url["data"]["avatar_url"]."±".$hh."";
echo "作者昵称：".$url["data"]["nickname"]."".$hh."";
echo "播放链接：".$url["data"]["audioSrc"]."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
echo "".$ming."API随机唱鸭".$hh."";
echo "━━━━━━━━━".$hh."";
echo "本接口正在维护！".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
?>