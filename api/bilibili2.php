<?php
header("Content-Type:text/html;charset=UTF-8");
include("./API.php");
include("../tianyi.php");
tongji("bilibili2");
$uid=$_GET['uid'];//哔哩哔哩的UID
$hh=$_GET['hh']?:"\n";//换行符号(默认\n)
if(!$uid){echo "".$ming."API哔哩哔哩用户信息获取".$hh."━━━━━━━━━".$hh."uid 参数为空".$hh."━━━━━━━━━".$hh."Tips:".$ming."API技术支持";exit;}
$result = file_get_contents("https://tenapi.cn/bilibili/?uid=".$uid."");
$url = json_decode($result, true);
if(!$url["data"]["uid"]){
echo "".$ming."API哔哩哔哩用户信息获取".$hh."";
echo "━━━━━━━━━".$hh."";
echo "查询失败！".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
exit;}
if($url["code"]==200){
echo "".$ming."API哔哩哔哩用户信息获取".$hh."";
echo "━━━━━━━━━".$hh."";
echo "±img=".$url["data"]["avatar"]."±".$hh."";
echo "查询UID：".$url["data"]["uid"]."".$hh."";
echo "昵称：".$url["data"]["name"]."".$hh."";
echo "等级：".$url["data"]["level"]."".$hh."";
echo "性别：".$url["data"]["sex"]."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
echo "".$ming."API哔哩哔哩用户信息获取".$hh."";
echo "━━━━━━━━━".$hh."";
echo "本接口正在维护！".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
?>