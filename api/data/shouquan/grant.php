<?php
header("Content-type: text/html; charset=utf-8");
$keya=$_GET["key"];
$robot=$_GET["robot"];
$qq=$_GET["qq"];
$time=$_GET["time"];
$hh=$_GET["hh"]?:"\n";
$list=file_get_contents("List.php");
preg_match_all("/【机器：".$robot."】〖主人：(.*?)〗『时间：(.*?)』《状态：(.*?)》/",$list,$nute);
$jec=$nute[1][0];
$kcrh=date("Y-m-d",strtotime("+$time month"));
$timety=date("Y-m-d",strtotime("+31 day"));
$jcry=date("Y-m-d");
include("key.php");
if($keya!=$key){
echo "对接的密钥错误！";
}else
if($robot<="10001"||$robot>="9999999999"){
echo "添加机器人号码错误！";
}else
if($qq<="10001"||$qq>="9999999999"){
echo "添加主人号码错误！";
}else
if($jec!=''){
echo "该机器人号码已授权！";
}else
if($time=="体验"){
echo "成功添加体验机器人".$hh."体验号码：".$robot."".$hh."主人号码：".$qq."".$hh."体验时长:31天".$hh."到期时间:".$timety."".$hh."现在时间:".$jcry."".$hh."出现问题联系客服解决";
$myfile = fopen("List.php", "w") or die("未知错误！");
fwrite($myfile,"$list\n【机器：".$robot."】〖主人：".$qq."〗『时间：".$timety."』《状态：已授权》");
fclose($myfile);
}else
if($time=="永久"){
echo "成功授权机器人".$hh."授权号码：".$robot."".$hh."主人号码：".$qq."".$hh."授权月数：永久授权".$hh."到期时间：9999-12-31".$hh."现在时间：".$jcry."".$hh."出现问题联系客服解决";
$myfile = fopen("List.php", "w") or die("未知错误！");
fwrite($myfile,"$list\n【机器：".$robot."】〖主人：".$qq."〗『时间：9999-12-31』《状态：已授权》");
fclose($myfile);
}else
if((floor($time)-$time)!=0||strpos($time,".")!=false){
echo "添加时间不是整数";
}else
if($time!="永久"){
echo "成功授权机器人".$hh."授权号码：".$robot."".$hh."主人号码：".$qq."".$hh."授权月数：".$time."个月".$hh."到期时间：".$kcrh."".$hh."现在时间：".$jcry."".$hh."出现问题联系客服解决";
$myfile = fopen("List.php", "w") or die("未知错误！");
fwrite($myfile,"$list\n【机器：".$robot."】〖主人：".$qq."〗『时间：".$kcrh."』《状态：已授权》");
fclose($myfile);
}
?>