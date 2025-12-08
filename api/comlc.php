<?php
include("./API.php");
include("../tianyi.php");
tongji("comlc");
$msg=$_GET['msg'];//需要查询的漫画内容
$b=$_GET['b'];//选择(序号)
$hh=$_GET['hh']?:"\n";//换行符号(默认\n)
$list=file_get_contents("https://m.ac.qq.com/search/result?t=1566829773805&word=".$msg."&page=1&pageSize=10&style=items");
$result = preg_match_all("/<strong class=\"comic-title\">(.*?)</",$list,$nute);
$je=$nute[1][0];
if($je==null)
{
echo "".$ming."API腾讯漫画".$hh."";
echo "━━━━━━━━━".$hh."";
echo "没有搜到[".$msg."]".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
else
if($b== null)
{
echo "".$ming."API腾讯漫画".$hh."";
echo "━━━━━━━━━".$hh."";
for ($x=0; $x < $result && $x<=9; $x++) 
{
$jec=$nute[1][$x];
echo ($x+1)."：".$jec."".$hh."";
}
echo "提示：发送以上序号选择，例：选腾讯漫画 1".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
else
if($b>10||$b<1)
{
echo "请按以上序号选择";
}else{
$b=$_GET['b'];//选择(序号)
$b=($b-1);
preg_match_all("/src=\"(.*?)\">/",$list,$bb1);
preg_match_all("/<strong class=\"comic-title\">(.*?)</",$list,$bb2);
preg_match_all("/<small class=\"comic-update\">(.*?)</",$list,$bb3);
preg_match_all("/<small class=\"comic-tag\">(.*?)</",$list,$bb4);
preg_match_all("/<small class=\"comic-desc\">(.*?)</",$list,$bb5);
preg_match_all("/href=\"(.*?)\">/",$list,$bb6);
$b1=$bb1[1][$b];//图片
$b2=$bb2[1][$b];//漫画名
$b3=$bb3[1][$b];//更新时间
$b4=$bb4[1][$b];//漫画类型
$b5=$bb5[1][$b];//漫画介绍
$b6=$bb6[1][$b];//漫画链接
echo "".$ming."API腾讯漫画".$hh."";
echo "━━━━━━━━━".$hh."";
echo "±img=".$b1."±".$hh."";
echo "漫画名：".$b2."".$hh."";
echo "更新时间：".$b3."".$hh."";
echo "漫画类型：".$b4."".$hh."";
echo "漫画介绍：".$b5."".$hh."";
echo "漫画链接：https://m.ac.qq.com".$b6."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
?>