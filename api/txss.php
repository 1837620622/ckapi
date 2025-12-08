<?php
include("./API.php");
include("../tianyi.php");
tongji("txss");
$hh=$_GET["hh"]?:"\n";//换行符号(默认\n)
$json = json_decode(file_get_contents("http://node.video.qq.com/x/api/msearch?keyWord=".urlencode($_GET["msg"])."&optionValue=1"),true);
$str=$json["uiData"][0]["data"][0];

$keyWord=$json["keyWord"];
$actor=$str["actor"];
$id=$str["id"];
$posterPic=$str["posterPic"];
$webPlayUrl=$str["webPlayUrl"];
$videoCategory=$str["videoCategory"];
if(!$webPlayUrl||$webPlayUrl==""){
$str=$json["uiData"][0]["data"][0]["videoSeries"][0];

$keyWord=$json["keyWord"];
$actor=$str["actor"];
$id=$str["id"];
$posterPic=$str["posterPic"];
$webPlayUrl=$str["webPlayUrl"];
$videoCategory=$str["videoCategory"];
if(!$webPlayUrl||$webPlayUrl==""){
$str=$json["uiData"][1]["data"][0];

$keyWord=$json["keyWord"];
$actor=$str["actor"];
$id=$str["id"];
$posterPic=$str["posterPic"];
$webPlayUrl=$str["webPlayUrl"];
$videoCategory=$str["videoCategory"];
if(!$webPlayUrl||$webPlayUrl==""){
$str=$json["uiData"][1]["data"][0]["videoSeries"][0];
$keyWord=$json["keyWord"];
$actor=$str["actor"];
$id=$str["id"];
$posterPic=$str["posterPic"];
$webPlayUrl=$str["webPlayUrl"];
$videoCategory=$str["videoCategory"];
}
}
}
echo "".$ming."API腾讯视频(单选)".$hh."";
echo "━━━━━━━━━".$hh."";
echo "±img=".$posterPic."±".$hh."";
echo "片名:".$keyWord."".$hh."";
echo "演员:".$actor."".$hh."";
echo "类型:".$videoCategory."".$hh."";
echo "地址:".$webPlayUrl."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
?>