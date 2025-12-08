<?php
header("Content-Type:text/html;charset=UTF-8");
include("./API.php");
include("../tianyi.php");
tongji("qqsmcx");
$qq=$_GET['qq'];//需要查询的QQ号
$hh=$_GET['hh']?:"\n";//换行符号(默认\n)
if(!$qq){echo "".$ming."API♧QQ号(实名/成年)查询".$hh."━━━━━━━━━".$hh."qq 参数为空".$hh."━━━━━━━━━".$hh."Tips:".$ming."API技术支持";exit;}
$result = file_get_contents("http://api.nanyinet.com/api/qqsmcx/api.php?qq=".$qq."");
echo "".$ming."API♧QQ号(实名/成年)查询".$hh."";
echo "━━━━━━━━━".$hh."";
echo "查询账号：".$qq."".$hh."";
echo "".$result."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
?>