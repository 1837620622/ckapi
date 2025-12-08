<?php
header("Content-Type:text/html;charset=UTF-8");
include("./API.php");
include("../tianyi.php");
tongji("JinRiHotsearch");
$hh=$_GET["hh"]?:"\n";//换行符号(默认\n)
$url = file_get_contents("https://yuanxiapi.cn/api/JinRiHotsearch");
$url = json_decode($url, true);
if($url["code"]==200){
echo "".$ming."API今日头条热搜榜获取".$hh."";
echo "━━━━━━━━━".$hh."";
foreach($url["data"] as $value)
{
echo "标题：".$value["title"]."".$hh."";
echo "查询词：".$value["QueryWord"]."".$hh."";
echo "热度量：".$value["heat"]."".$hh."";
echo "━━━━━━━━━".$hh."";
}
echo "Tips:".$ming."API技术支持";
}else{
echo "".$ming."API今日头条热搜榜获取".$hh."";
echo "━━━━━━━━━".$hh."";
echo "本接口正在维护！".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
?>