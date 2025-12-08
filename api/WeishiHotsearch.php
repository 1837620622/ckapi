<?php
header("Content-Type:text/html;charset=UTF-8");
include("./API.php");
include("../tianyi.php");
tongji("WeishiHotsearch");
$hh=$_GET["hh"]?:"\n";//换行符号(默认\n)
$url = file_get_contents("https://yuanxiapi.cn/api/WeishiHotsearch");
$url = json_decode($url, true);
if($url["code"]==200){
echo "".$ming."API微视热搜榜获取".$hh."";
echo "━━━━━━━━━".$hh."";
foreach($url["data"] as $value)
{
echo "±img=".$value["pic"]."±".$hh."";
echo "标题：".$value["title"]."".$hh."";
echo "热度量：".$value["heat"]."".$hh."";
echo "━━━━━━━━━".$hh."";
}
echo "Tips:".$ming."API技术支持";
}else{
echo "".$ming."API微视热搜榜获取".$hh."";
echo "━━━━━━━━━".$hh."";
echo "本接口正在维护！".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
?>