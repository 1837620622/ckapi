<?php
include("./API.php");
include("../tianyi.php");
tongji("tianqi");
function jiequ($txt1,$q1,$h1)
{
 $txt1=strstr($txt1,$q1);
 $cd=strlen($q1);
 $txt1=substr($txt1,$cd);
 $txt1=strstr($txt1,$h1,"TRUE");
 return $txt1;
}
$msg=$_GET['msg'];//需要查询的地区名
$b=$_GET['b'];//选择(序号)
$hh=$_GET['hh']?:"\n";//换行符号(默认\n)
$list=file_get_contents("http://m.moji.com/api/citysearch/".$msg);
$result = preg_match_all("/{\"cityId\":(.*?),\"city_lable\":(.*?),\"counname\":\"(.*?)\",\"id\":(.*?),\"localCounname\":\"(.*?)\",\"localName\":\"(.*?)\",\"localPname\":\"(.*?)\",\"name\":\"(.*?)\",\"pname\":\"(.*?)\"}/",$list,$nute);
if($b== null)
{
echo "".$ming."API墨迹天气".$hh."";
echo "━━━━━━━━━".$hh."";
for ($x=0; $x < $result && $x<=9; $x++) 
{
$jec=$nute[6][$x];
$je=$nute[7][$x];
echo ($x+1)."：".$je."-".$jec."".$hh."";
}
echo "提示：发送以上序号选择，例：选墨迹天气 1".$hh."";
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
$je=$nute[1][$b];
$jec=$nute[6][$b];
$lis=file_get_contents("http://m.moji.com/api/redirect/".$je);
$bb=jiequ($lis,"<div class=\"weak_wea\">","<div class=\"exponent\">");
$bb=str_replace(' ', '', $bb);
preg_match_all("/<lidata-high=\"(.*?)\"data-low=\"(.*?)\">/",$bb,$aa);
preg_match_all("/<em>(.*?)<\/em>/",$bb,$qq);
preg_match_all("/<dd><strong>(.*?)<\/strong><\/dd>/",$bb,$cc);
preg_match_all("/<pclass=\"(.*?)\">(.*?)<\/p><dlclass=\"wind\">/",$bb,$dd);
preg_match_all("/<dd>(.*?)<\/dd>/",$bb,$ee);
preg_match_all("/<dd>(.*?)<\/dd>/",$bb,$ff);
echo "".$ming."API墨迹天气".$hh."";
echo "━━━━━━━━━".$hh."";
echo "☁.查询：".$jec."".$hh."";
echo "☁.日期：".$qq[1][0]."".$hh."";
echo "☁.温度：".$aa[2][0]."～".$aa[1][0]."℃".$hh."";
echo "☁.天气：".$cc[1][0]."".$hh."";
echo "☁.风度：".$ee[1][2]."-".$ff[1][3]."".$hh."";
echo "☁.空气质量：".$dd[2][0]."".$hh."";
echo "".$hh."";
echo "☁.日期：".$qq[1][1]."".$hh."";
echo "☁.温度：".$aa[2][1]."～".$aa[1][1]."℃".$hh."";
echo "☁.天气：".$cc[1][1]."".$hh."";
echo "☁.风度：".$ee[1][6]."-".$ff[1][7]."".$hh."";
echo "☁.空气质量：".$dd[2][1]."".$hh."";
echo "".$hh."";
echo "☁.日期：".$qq[1][2]."".$hh."";
echo "☁.温度：".$aa[2][2]."～".$aa[1][2]."℃".$hh."";
echo "☁.天气：".$cc[1][2]."".$hh."";
echo "☁.风度：".$ee[1][10]."-".$ff[1][11]."".$hh."";
echo "☁.空气质量：".$dd[2][2]."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
?>