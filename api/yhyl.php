<?php
include("./API.php");
include("../tianyi.php");
tongji("yhyl");
$hh=$_GET["hh"]?:"\n";//换行符号(默认\n)
$txt='data/wenben/yhyl.txt';
$a=file($txt);
$b=count($a);
$rand=rand(0,$b);
$rand_shuchu=$a[$rand];
echo "".$ming."API英汉语录".$hh."";
echo "━━━━━━━━━".$hh."";
echo "".$rand_shuchu."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
?>