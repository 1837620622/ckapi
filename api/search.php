<?php
include("./API.php");
include("../tianyi.php");
tongji("search");
$msg=$_GET['msg'];//需要查询的字
$hh=$_GET['hh']?:"\n";//换行符号(默认\n)
$bbb=file_get_contents("http://www.hifang.net/01xinhua/show.asp?q=".$msg);
preg_match_all("/查询的字：<span class=\"red f14\">(.*?)</",$bbb,$dd1);
preg_match_all("/音节：<span class=\"dicpy\">(.*?)&/",$bbb,$dd2);
preg_match_all("/部首：<span class=\"diczx4\">(.*?)</",$bbb,$dd3);
preg_match_all("/部首笔画：<span class=\"diczx4\">(.*?)</",$bbb,$dd4);
preg_match_all("/部外笔画：<span class=\"diczx4\">(.*?)</",$bbb,$dd5);
preg_match_all("/总笔画：<span class=\"diczx4\">(.*?)</",$bbb,$dd6);
preg_match_all("/笔顺：<span class=\"diczx4\">(.*?)</",$bbb,$dd7);
$dd1=$dd1[1][0];
$dd2=$dd2[1][0];
$dd3=$dd3[1][0];
$dd4=$dd4[1][0];
$dd5=$dd5[1][0];
$dd6=$dd6[1][0];
$dd7=$dd7[1][0];
echo "".$ming."API查字".$hh."";
echo "━━━━━━━━━".$hh."";
echo "查询：".$dd1."".$hh."";
echo "音节：".$dd2."".$hh."";
echo "部首：".$dd3."".$hh."";
echo "部首笔画：".$dd4."".$hh."";
echo "部外笔画：".$dd5."".$hh."";
echo "总数笔画：".$dd6."".$hh."";
echo "笔顺写法：".$dd7."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
?>