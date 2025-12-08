<?php
include("./API.php");
include("../tianyi.php");
tongji("sc1");
$hh=$_GET["hh"]?:"\n";//换行符号(默认\n)
$txt='data/wenben/sc1.txt';
$a=file($txt);
$b=count($a);
$rand=rand(0,$b);
$rand_shuchu=$a[$rand];
echo "".$ming."API诗词".$hh."";
echo "━━━━━━━━━".$hh."";
echo "".$rand_shuchu."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
?>