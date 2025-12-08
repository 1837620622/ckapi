<?php
include("./API.php");
include("../tianyi.php");
tongji("ws_video_jx");
$url=$_GET['url'];//需要解析的链接
$hh=$_GET['hh']?:"\n";//换行符号(默认\n)
if(!$url){echo "".$ming."API微视视频解析".$hh."━━━━━━━━━".$hh."url 参数为空".$hh."━━━━━━━━━".$hh."Tips:".$ming."API技术支持";exit;}
$url = file_get_contents("https://res.abeim.cn/api-ws_video_jx?url=".$url."");
$url = json_decode($url, true);
if($url["code"]==200){
echo "".$ming."API微视视频解析".$hh."";
echo "━━━━━━━━━".$hh."";
echo "昵称：".$url["data"]["author_name"]."".$hh."";
echo "视频文案：".$url["data"]["video_name"]."".$hh."";
echo "视频点赞：".$url["data"]["video_like"]."".$hh."";
echo "视频评论：".$url["data"]["video_comment"]."".$hh."";
echo "视频封面：".$url["data"]["video_cover"]."".$hh."";
echo "视频链接：".$url["data"]["video_url"]."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
echo "".$ming."API微视视频解析".$hh."";
echo "━━━━━━━━━".$hh."";
echo "本接口正在维护！".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
?>