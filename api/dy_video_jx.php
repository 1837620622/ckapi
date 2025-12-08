<?php
include("./API.php");
include("../tianyi.php");
tongji("dy_user_home");
$url=$_GET['url'];//需要解析的链接
$hh=$_GET['hh']?:"\n";//换行符号(默认\n)
if(!$url){echo "".$ming."API抖音视频解析".$hh."━━━━━━━━━".$hh."url 参数为空".$hh."━━━━━━━━━".$hh."Tips:".$ming."API技术支持";exit;}
$url = file_get_contents("https://res.abeim.cn/api-dy_video_jx?url=".$url."");
$url = json_decode($url, true);
$json = json_encode($url, true);
if($url["code"]==200){
echo "".$ming."API抖音视频解析".$hh."";
echo "━━━━━━━━━".$hh."";
echo "用户名：".$url["data"]["author_name"]."".$hh."";
echo "签名：".$url["data"]["author_sign"]."".$hh."";
echo "作品文案：".$url["data"]["video_name"]."".$hh."";
echo "点赞数：".$url["data"]["video_like"]."".$hh."";
echo "评论数：".$url["data"]["video_comment"]."".$hh."";
echo "封面：".$url["data"]["video_cover"]."".$hh."";
echo "视频：".$url["data"]["video_url"]."".$hh."";
echo "配音：".$url["data"]["music_url"]."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
echo "".$ming."API抖音视频解析".$hh."";
echo "━━━━━━━━━".$hh."";
echo "本接口正在维护！".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
?>