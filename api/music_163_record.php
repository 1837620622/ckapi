<?php
include("./API.php");
include("../tianyi.php");
tongji("music_163_record");
$UserId=$_GET['UserId'];//网易云音乐用户id
$t=$_GET['t'];//听歌排行榜时间段，all：全部，week：最近一周，默认：all
$hh=$_GET['hh']?:"\n";//换行符号(默认\n)
if(!$UserId){echo "".$ming."API网易云听歌记录".$hh."━━━━━━━━━".$hh."UserId 参数为空".$hh."━━━━━━━━━".$hh."Tips:".$ming."API技术支持";exit;}
if(!$t){echo "".$ming."API网易云听歌记录".$hh."━━━━━━━━━".$hh."t 参数为空".$hh."━━━━━━━━━".$hh."Tips:".$ming."API技术支持";exit;}
$url = file_get_contents("https://res.abeim.cn/api-music_163_record?UserId=".$UserId."&t=".$t."");
$url = json_decode($url, true);
if(!$url["data"][0]["music_id"])
{
echo "".$ming."API网易云听歌记录".$hh."";
echo "━━━━━━━━━".$hh."";
echo "查询失败！".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
exit;
}
if($url["code"]==200){
echo "".$ming."API网易云听歌记录".$hh."";
echo "━━━━━━━━━".$hh."";
foreach($url["data"] as $value)
{
echo "音乐ID：".$value["music_id"]."".$hh."";
echo "歌曲名称：".$value["music_name"]."".$hh."";
echo "作者ID：".$value["author_id"]."".$hh."";
echo "作者名称：".$value["author_name"]."".$hh."";
echo "专辑ID：".$value["album_id"]."".$hh."";
echo "专辑名称：".$value["album_name"]."".$hh."";
echo "━━━━━━━━━".$hh."";
}
echo "Tips:".$ming."API技术支持";
}else{
echo "".$ming."API网易云听歌记录".$hh."";
echo "━━━━━━━━━".$hh."";
echo "本接口正在维护！".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
?>