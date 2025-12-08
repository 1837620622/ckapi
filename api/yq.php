<?php
include("./API.php");
include("../tianyi.php");
tongji("yq");
$msg=$_GET['msg'];//需要查询的地区名
$hh=$_GET['hh']?:"\n";//换行符号(默认\n)
$list=file_get_contents("http://43.250.238.179:9090/showData?callback=china_echarts");
$list=str_replace("value", "conNum", $list);
preg_match_all("/{\"name\":\"".$msg."\",\"conNum\":\"(.*?)\",\"susNum\":\"(.*?)\",\"deathNum\":\"(.*?)\",\"cureNum\":\"(.*?)\"/",$list,$aaa);
preg_match_all("/\"times\":\"截至(.*?)\",/",$list,$bbb);
$aa1=$aaa[1][0];
$bb1=$bbb[1][0];
$aa3=$aaa[3][0];
$aa4=$aaa[4][0];
echo "".$ming."API疫情查询".$hh."";
echo "━━━━━━━━━".$hh."";
echo "🌾查询地区：".$msg."".$hh."";
echo "🌾目前确诊：".$aa1."".$hh."";
echo "🌾目前死亡：".$aa3."".$hh."";
echo "🌾目前治愈：".$aa4."".$hh."";
echo "🌾更新时间：".$bb1."".$hh."";
echo "🌾数据来自：人民网".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
?>