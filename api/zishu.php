<?php
include("./API.php");
include("../tianyi.php");
tongji("zishu");
$hh=$_GET["hh"]?:"\n";//换行符号(默认\n)
echo "".$ming."API字数检测".$hh."";
echo "━━━━━━━━━".$hh."";
echo mb_strlen($_GET["msg"], 'UTF-8')."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
?>