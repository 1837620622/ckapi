<?php
include("./API.php");
include("../tianyi.php");
tongji("wenrou");
$hh=$_GET["hh"]?:"\n";//换行符号(默认\n)
$txt='data/wenben/wenrou.txt';
$a=file($txt);
$b=count($a);
$rand=rand(0,$b);
$rand_shuchu=$a[$rand];
echo "".$ming."API文案温柔".$hh."";
echo "━━━━━━━━━".$hh."";
echo "".$rand_shuchu."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
?>