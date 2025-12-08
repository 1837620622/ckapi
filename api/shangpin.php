<?php
include("./API.php");
include("../tianyi.php");
tongji("shangpin");
$msg=$_GET['msg'];//需要搜索的商品名
$b=$_GET['b'];//选择(序号)
$c=$_GET['c'];
$hh=$_GET['hh']?:"\n";//换行符号(默认\n)
$list=file_get_contents("http://app.sitezt.cn/api/tbksearch?page_no=1&sort=tk_total_sales_desc%2Ctk_rate_desc&q=".$msg);
$result = preg_match_all("/title\":\"(.*?)\"/",$list,$nute);
$je=$nute[1][0];
if($je==null)
{
echo "".$ming."API商品搜索".$hh."";
echo "━━━━━━━━━".$hh."";
echo "没有搜到[".$msg."]".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
else
if($b== null)
{
echo "".$ming."API商品搜索".$hh."";
echo "━━━━━━━━━".$hh."";
for ($x=0; $x < $result && $x<=9; $x++) 
{
$jec=$nute[1][$x];
echo ($x+1)."：".$jec."".$hh."";
}
echo "提示：发送以上序号选择，例：选商品搜索 1".$hh."";
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
preg_match_all("/title\":\"(.*?)\"/",$list,$bb1);
preg_match_all("/pictUrl\":\"(.*?)\"/",$list,$bb2);
preg_match_all("/zkPrice\":(.*?),/",$list,$bb3);
preg_match_all("/nick\":\"(.*?)\"/",$list,$bb4);
preg_match_all("/auctionUrl\":\"(.*?)\"/",$list,$bb5);
$b1=$bb1[1][$b];//商品名
$b2=$bb2[1][$b];//图片
$b3=$bb3[1][$b];//商品价格
$b4=$bb4[1][$b];//商品来自
$b5=$bb5[1][$b];//商品网址
echo "".$ming."API商品搜索".$hh."";
echo "━━━━━━━━━".$hh."";
echo "±img=".$b2."±".$hh."";
echo "商品名：".$b1."".$hh."";
echo "商品来自：".$b4."".$hh."";
echo "商品价格：".$b3."元".$hh."";
echo "商品网址：".$b5."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
?>