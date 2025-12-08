<?php
include("./API.php");
include("../tianyi.php");
tongji("renjian");
$hh=$_GET["hh"]?:"\n";//换行符号(默认\n)
$txt='data/wenben/renjian.txt';
$a=file($txt);
$b=count($a);
$rand=rand(0,$b);
$rand_shuchu=$a[$rand];
echo "".$ming."API我在人间凑数的日子".$hh."";
echo "━━━━━━━━━".$hh."";
echo "".$rand_shuchu."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
?>