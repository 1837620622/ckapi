<?php
include("./API.php");
include("../tianyi.php");
tongji("shijian");
$hh=$_GET["hh"]?:"\n";//换行符号(默认\n)
$w=date('w'); 
$week=array( 
    "0"=>"星期日", 
    "1"=>"星期一", 
    "2"=>"星期二", 
    "3"=>"星期三", 
    "4"=>"星期四", 
    "5"=>"星期五", 
    "6"=>"星期六" 
); 
$tianyi719=date("Y年m月d日");
$tianyi2006=date("H:i:s");
$tianyikeji=date("$week[$w]");
echo "".$ming."API当前时间".$hh."";
echo "━━━━━━━━━".$hh."";
echo "现在时间：".$tianyi719." ".$tianyi2006."".$hh."";
echo "".$tianyikeji."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
?>