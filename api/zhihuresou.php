<?php
header("Content-Type:text/html;charset=UTF-8");
include("./API.php");
include("../tianyi.php");
tongji("zhihuresou");
$hh=$_GET["hh"]?:"\n";//换行符号(默认\n)
$url = file_get_contents("https://yuanxiapi.cn/api/ZhihuHotsearch");
$url = json_decode($url, true);
if($url["code"]==200){
echo "".$ming."API知乎热搜榜获取".$hh."";
echo "━━━━━━━━━".$hh."";
foreach($url["data"] as $value)
{
echo "".$value["title"]."".$hh."";
echo "━━━━━━━━━".$hh."";
}
echo "Tips:".$ming."API技术支持";
}else{
echo "".$ming."API知乎热搜榜获取".$hh."";
echo "━━━━━━━━━".$hh."";
echo "本接口正在维护！".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
?>