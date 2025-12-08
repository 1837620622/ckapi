<?php
header('Content-Type: image/jpeg');
include("./API.php");
tongji("qdrl");
$Tick=$_GET['Tick'];//要标记的日期以,划分 例如1,2,3
$Template=$_GET['Template'];//签到图模板(目前可选1~10)
$year=$_GET['year'];//年份(用于生成指定的某年某月的日历,需要配合月份使用)
$month=$_GET['month'];//月份(用于生成指定的某年某月的日历,需要配合年份使用)
if(!$Tick){echo "".$ming."API签到日历图生成\n━━━━━━━━━\nTick 参数为空\n━━━━━━━━━\nTips:".$ming."API技术支持";exit;}
if(!$Template){echo "".$ming."API签到日历图生成\n━━━━━━━━━\nTemplate 参数为空\n━━━━━━━━━\nTips:".$ming."API技术支持";exit;}
if(!$year){echo "".$ming."API签到日历图生成\n━━━━━━━━━\nyear 参数为空\n━━━━━━━━━\nTips:".$ming."API技术支持";exit;}
if(!$month){echo "".$ming."API签到日历图生成\n━━━━━━━━━\nmonth 参数为空\n━━━━━━━━━\nTips:".$ming."API技术支持";exit;}
$result = file_get_contents("https://api.xingzhige.com/API/qdrl/api.php?Tick=".$Tick."&Template=".$Template."&year=".$year."&month=".$month."");
echo $result;
?>