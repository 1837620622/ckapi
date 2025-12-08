<?php
header("content-type:text/html;charset=utf-8");
include("./API.php");
include("../tianyi.php");
tongji("morse");
$hh=$_GET["hh"]?:"\n";//换行符号(默认\n)
if($_GET["id"] == "加密")
{
$url = file_get_contents("http://yingy.20wl.co/Api/php/morse.php?msg=".$_GET["msg"]."&type=encode");
$url = json_decode($url, true);
echo "".$ming."API摩斯电码".$hh."";
echo "━━━━━━━━━".$hh."";
echo "".$url["text"]."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
if($_GET["id"] == "解密")
{
$url = file_get_contents("http://yingy.20wl.co/Api/php/morse.php?msg=".$_GET["msg"]."&type=decode");
$url = json_decode($url, true);
echo "".$ming."API摩斯电码".$hh."";
echo "━━━━━━━━━".$hh."";
echo "".$url["text"]."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
?>