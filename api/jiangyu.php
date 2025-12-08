<?php
header("Content-Type:text/html;charset=UTF-8");
include("./API.php");
include("../tianyi.php");
tongji("jiangyu");
$hh=$_GET["hh"]?:"\n";//换行符号(默认\n)
$data = file_get_contents("https://tianqi.2345.com/t/jiankong/2_l.htm");
preg_match_all('/<img src=\"(.*?)\" alt=\"全国降水量预报\" \/>/',$data,$aaa);
$bbb=$aaa[1][0];
echo "".$ming."API降雨查询".$hh."";
echo "━━━━━━━━━".$hh."";
echo "±img=http:".$bbb."±".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
?>