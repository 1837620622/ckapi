<?php
include("./API.php");
include("../tianyi.php");
tongji("bilibili");
$msg=$_GET['msg'];//需要搜索的视频内容
$b=$_GET['b'];//选择(序号)
$hh=$_GET['hh']?:"\n";//换行符号(默认\n)
$list=file_get_contents("http://app.bilibili.com/x/v2/search?appkey=1d8b6e7d45233436&build=560161&duration=0&keyword=".$msg."&mobi_app=android&platform=android&pn=1&ps=10&ts=1534807273&sign=58fec668fa2fb65a5149d04aeca15cbb");
$result = preg_match_all("/title\":\"(.*?)\"/",$list,$nute);
if($b== null)
{
echo "".$ming."API哔哩哔哩".$hh."";
echo "━━━━━━━━━".$hh."";
for ($x=0; $x < $result && $x<=9; $x++) 
{
$jec=$nute[1][$x];
echo ($x+1)."：".$jec."".$hh."";
}
echo "提示：发送以上序号选择，例：选哔哩哔哩 1".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
else
if($b>10||$b<1)
{
echo "Tisp：选 1";
}else{
$b=$_GET['b'];//选择(序号)
$b=($b-1);
preg_match_all("/cover\":\"(.*?)\"/",$list,$bb1);
preg_match_all("/title\":\"(.*?)\"/",$list,$bb2);
preg_match_all("/author\":\"(.*?)\"/",$list,$bb3);
preg_match_all("/duration\":\"(.*?)\"/",$list,$bb4);
preg_match_all("/param\":\"(.*?)\"/",$list,$bb5);
preg_match_all("/desc\":\"(.*?)\"/",$list,$bb6);
$b1=$bb1[1][$b];//图片
$b2=$bb2[1][$b];//哔哩名
$b3=$bb3[1][$b];//哔哩主播
$b4=$bb4[1][$b];//作品时长
$b5=$bb5[1][$b];//作品介绍
$b6=$bb6[1][$b];//观看网址
echo "".$ming."API哔哩哔哩".$hh."";
echo "━━━━━━━━━".$hh."";
echo "±img=".$b1."±".$hh."";
echo "哔哩名：".$b2."".$hh."";
echo "哔哩主播：".$b3."".$hh."";
echo "作品时长：".$b4."".$hh."";
echo "作品介绍：".$b6."".$hh."";
echo "观看网址：https://m.bilibili.com/video/av".$b5.".html".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
?>