<?php
include("./API.php");
include("../tianyi.php");
tongji("mryy");
$time = $_GET["time"]?:date("Y-m-d");//需要查询的时间(默认今日)
$hh = $_GET["hh"]?:"\n";//换行符号(默认\n)
$data = file_get_contents("http://open.iciba.com/dsapi/?date=".$time."");
$url = json_decode($data, true);
echo "".$ming."API每日一句".$hh."";
echo "━━━━━━━━━".$hh."";
echo "±img=".$url["fenxiang_img"]."±".$hh."";
echo "中文：".$url["note"]."".$hh."";
echo "英文：".$url["content"]."".$hh."";
echo "语音：".$url["tts"]."".$hh."";
echo "更新时间：：".$url["dateline"]."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
?>