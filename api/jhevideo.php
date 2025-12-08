<?php
include("./API.php");
include("../tianyi.php");
tongji("jhevideo");
$url=$_GET['url'];//需要解析的链接
$hh=$_GET['hh']?:"\n";//换行符号(默认\n)
if(!$url){echo "".$ming."API聚合短视频无水印解析".$hh."━━━━━━━━━".$hh."url 参数为空".$hh."━━━━━━━━━".$hh."Tips:".$ming."API技术支持";exit;}
$url = file_get_contents("http://api.52hyjs.com/api/jhevideo?url=".$url."");
$url = json_decode($url, true);
if($url["code"]==200){
echo "".$ming."API聚合短视频无水印解析".$hh."";
echo "━━━━━━━━━".$hh."";
echo "视频文案：".$url["title"]."".$hh."";
echo "视频封面：".$url["cover"]."".$hh."";
echo "视频链接：".$url["url"]."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
echo "".$ming."API聚合短视频无水印解析".$hh."";
echo "━━━━━━━━━".$hh."";
echo "本接口正在维护！".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
?>