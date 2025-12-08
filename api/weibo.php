<?php
header("Content-Type:text/html;charset=UTF-8");
include("./API.php");
include("../tianyi.php");
tongji("weibo");
$uid=$_GET['uid'];//需要获取信息的用户ID
$hh=$_GET['hh']?:"\n";//换行符号(默认\n)
if(!$uid){echo "".$ming."API微博用户信息获取".$hh."━━━━━━━━━".$hh."uid 参数为空".$hh."━━━━━━━━━".$hh."Tips:".$ming."API技术支持";exit;}
$url = file_get_contents("https://tenapi.cn/weibo/?uid=".$uid."");
$url = json_decode($url, true);
if($url["code"]==200){
echo "".$ming."API微博用户信息获取".$hh."";
echo "━━━━━━━━━".$hh."";
echo "查询UID：".$url["data"]["uid"]."".$hh."";
echo "昵称：".$url["data"]["name"]."".$hh."";
echo "简介：".$url["data"]["description"]."".$hh."";
echo "头像".$hh."";
echo "±img=".$url["data"]["avatar"]."±".$hh."";
echo "关注：".$url["data"]["following"]."个".$hh."";
echo "粉丝：".$url["data"]["follower"]."个".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
echo "".$ming."API微博用户信息获取".$hh."";
echo "━━━━━━━━━".$hh."";
echo "本接口正在维护！".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
?>