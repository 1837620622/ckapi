<?php
include("./API.php");
include("../tianyi.php");
tongji("bcscslcx");
$msg=$_GET['msg'];//需要查询的链接
$hh=$_GET['hh']?:"\n";//换行符号(默认\n)
if(!$msg){echo "".$ming."API百度收录数量查询".$hh."━━━━━━━━━".$hh."msg 参数为空".$hh."━━━━━━━━━".$hh."Tips:".$ming."API技术支持";exit;}
$url = file_get_contents("http://api.52hyjs.com/api/baidu?url=".$msg."");
$url = json_decode($url, true);
if($url["code"]==200){
echo "".$ming."API百度收录数量查询".$hh."";
echo "━━━━━━━━━".$hh."";
echo "查询域名：".$msg."".$hh."";
echo "".$url["msg"]."".$hh."";
echo "收录数量：".$url["number"]."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
echo "".$ming."API百度收录数量查询".$hh."";
echo "━━━━━━━━━".$hh."";
echo "本接口正在维护！".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
?>