<?php
header("content-type:text/html;charset=utf-8");
include("./API.php");
tongji("Timecal2");
$sj=strtotime($_REQUEST["start"]);//输开始
$sj1=strtotime($_REQUEST["end"]);//输结束
$js=$sj1-$sj;
$d=floor($js/3600/24);
$h=floor(($js%(3600*24))/3600);
$m=floor(($js%(3600*24))%3600/60);
$s=floor(($js%(3600*24))%60);
if($d!="0")
{
echo "".$d."天".$h."小时".$m."分".$s."秒";
}
else if($h!="0")
{
echo "".$h."小时".$m."分".$s."秒";
}
else if(!$m||!$s)
{
echo "".$s."秒";
}else{
echo "".$m."分".$s."秒";
}
?>