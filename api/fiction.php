<?php
include("./API.php");
include("../tianyi.php");
tongji("fiction");
$msg=$_GET['msg'];//需要查询的小说名
$b=$_GET['b'];//选择(序号)
$hh=$_GET['hh']?:"\n";//换行符号(默认\n)
$list=file_get_contents("https://yd.sogou.com/h5/search?query=".$msg);
$list=str_replace("</em>", '', $list);
$list=str_replace("<em>", '', $list);
$list=str_replace("<h4 class=\"book-title\">' + obj.bookName + '<", '', $list);
$result = preg_match_all("/class=\"book-title\">(.*?)</",$list,$nute);
$je=$nute[1][0];
if($je==null)
{
echo "".$ming."API搜狗小说".$hh."";
echo "━━━━━━━━━".$hh."";
echo "没有搜到[".$msg."]".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
else
if($b== null)
{
echo "".$ming."API搜狗小说".$hh."";
echo "━━━━━━━━━".$hh."";
for ($x=0; $x < $result && $x<=9; $x++) 
{
$jec=$nute[1][$x];//小说名
echo ($x+1)."：".$jec."".$hh."";
}
echo "提示：发送以上序号选择，例：选搜狗小说 1".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
else
if($b>10||$b<1)
{
echo "".$ming."API搜狗小说".$hh."";
echo "━━━━━━━━━".$hh."";
echo "请按以上序号选择".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
$b=$_GET['b'];//选择(序号)
$b=($b-1);
preg_match_all("/data-echo=\"(.*?)\"/",$list,$bb1);
$b1=$bb1[1][$b];//图片
$b1=str_replace("amp;", '', $b1);
preg_match_all("/<h4 class=\"book-title\">(.*?)</",$list,$bb2);
preg_match_all("/<p class=\"book-summary\">(.*?)</",$list,$bb3);
preg_match_all("/<span>(.*?)</",$list,$bb4);
preg_match_all("/span><span>(.*?)</",$list,$bb5);
preg_match_all("/<li stats='1' bkey=\"(.*?)\"/",$list,$bb6);
$b2=$bb2[1][$b];//小说名
$b3=$bb3[1][$b];//小说内容
$b4=$bb4[1][$b];//小说作者
$b5=$bb5[1][$b];//小说类型
$b6=$bb6[1][$b];//小说链接
echo "".$ming."API搜狗小说".$hh."";
echo "━━━━━━━━━".$hh."";
echo "±img=".$b1."±".$hh."";
echo "小说名：".$b2."".$hh."";
echo "小说作者：".$b4."".$hh."";
echo "小说类型：".$b5."".$hh."";
echo "小说内容：".$b3."".$hh."";
echo "小说链接：https://yd.sogou.com/h5/cpt/detail?bkey=".$b6."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
?>