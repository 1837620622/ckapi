<?php
include("./API.php");
include("../tianyi.php");
tongji("lishi");
$hh=$_GET["hh"]?:"\n";//换行符号(默认\n)
$time=date("md");
$list=file_get_contents("https://lishishangdejintian.51240.com/".$time."__lishishangdejintian/");
preg_match_all("/<ul class=\"list\">(.*?)<\/li><\/ul>/",$list,$lit);
$lit=$lit[1][0];
$lit=str_replace("&nbsp;",'',$lit);
$result = preg_match_all("/<li>(.*?)<a href='(.*?)' target='_blank'>(.*?)<\/a>/",$lit,$nute);
echo "".$ming."API历史上的今天".$hh."";
echo "━━━━━━━━━".$hh."";
for ($x=0; $x < $result && $x<=9; $x++) 
{
$jec=$nute[3][$x];
$je=$nute[1][$x];
echo ($x+1)."：".$je."-".$jec."".$hh."";
}
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
?>