<?php
header("Content-Type:text/html;charset=UTF-8");
include("./API.php");
include("../tianyi.php");
tongji("QR");
$qq=$_GET['qq'];//QQ号
$hh=$_GET['hh']?:"\n";//换行
if(!$qq){echo "".$ming."API♧QRSpeed授权查询".$hh."━━━━━━━━━".$hh."qq 参数为空".$hh."━━━━━━━━━".$hh."Tips:".$ming."API技术支持";exit;}
$result = file_get_contents("https://api.xingzhige.com/API/QR/api.php?qq=".$qq."");
$url = json_decode($result, true);
if($url["code"]==1000){
echo "".$ming."API♧QRSpeed授权查询".$hh."";
echo "━━━━━━━━━".$hh."";
echo "查询账号：".$url["data"]["QQ"]."".$hh."";
echo "ID：".$url["data"]["ID"]."".$hh."";
echo "授权时间：".$url["data"]["添加时间"]."".$hh."";
echo "到期时间：".$url["data"]["到期时间"]."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
if($url["code"]==1002){
echo "".$ming."API♧QRSpeed授权查询".$hh."";
echo "━━━━━━━━━".$hh."";
echo "".$url["text"]."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
echo "".$ming."API♧QRSpeed授权查询".$hh."";
echo "━━━━━━━━━".$hh."";
echo "本接口正在维护！".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}}
?>