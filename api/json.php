<?php
header("Content-Type:text/html;charset=UTF-8");
include("./API.php");
include("../tianyi.php");
tongji("json");
$nr=$_GET['nr'];//编码
$hh=$_GET['hh']?:"\n";//换行
if(!$nr){echo "".$ming."APIjson编码转换".$hh."━━━━━━━━━".$hh."nr 参数为空".$hh."━━━━━━━━━".$hh."Tips:".$ming."API技术支持";exit;}
$result = file_get_contents("http://api.tangdouz.com/json.php?nr=".$nr."");
echo "".$ming."APIjson编码转换".$hh."";
echo "━━━━━━━━━".$hh."";
echo "".$result."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
?>