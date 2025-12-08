<?php
include("./API.php");
include("../tianyi.php");
tongji("aoyunhui");
$hh=$_GET["hh"]?:"\n";//换行符号(默认\n)
$url = file_get_contents("https://api.cntv.cn/olympic/getOlyMedals?serviceId=pcocean&itemcode=GEN-------------------------------");
$url = json_decode($url, true);
echo "".$ming."API奥运会排行榜".$hh."";
echo "━━━━━━━━━".$hh."";
foreach($url["data"]["medalsList"] as $value)
{
echo "排名：".$value["rank"]."".$hh."";
echo "国名：".$value["countryname"]."".$hh."";
echo "国标：".$value["countryid"]."".$hh."";
echo "金牌：".$value["gold"]."".$hh."";
echo "银牌：".$value["silver"]."".$hh."";
echo "铜牌：".$value["bronze"]."".$hh."";
echo "总计：".$value["count"]."".$hh."";
echo "━━━━━━━━━".$hh."";
}
echo "Tips:".$ming."API技术支持";
?>