<?php
include("./API.php");
include("../tianyi.php");
tongji("saorao");
$tel=$_GET['tel'];//需要查询的手机号
$hh=$_GET['hh']?:"\n";//换行符号(默认\n)
if(!$tel){echo "".$ming."API骚扰电话查询".$hh."━━━━━━━━━".$hh."tel 参数为空".$hh."━━━━━━━━━".$hh."Tips:".$ming."API技术支持";exit;}
$url = file_get_contents("http://api.nanyinet.com/api/saorao/api.php?tel=".$tel."");
$url = json_decode($url, true);
if($url["success"]==true){
echo "".$ming."API骚扰电话查询".$hh."";
echo "━━━━━━━━━".$hh."";
echo "手机号：".$url["tel"]."".$hh."";
echo "".$url["info"][0]["name"]."：".$url["info"][0]["message"]."".$hh."";
echo "".$url["info"][1]["name"]."：".$url["info"][1]["message"]."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
echo "".$ming."API骚扰电话查询".$hh."";
echo "━━━━━━━━━".$hh."";
echo "本接口正在维护！".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
?>