<?php
header("Content-type: text/html; charset=utf-8");
$keya=$_GET["key"];
$robot=$_GET["robot"];
$robot1=$_GET["robot1"];
$qq=$_GET["qq"];
$hh=$_GET["hh"]?:"\n";
$list=file_get_contents("List.php");
preg_match_all("/【机器：".$robot."】〖主人：(.*?)〗『时间：(.*?)』《状态：(.*?)》/",$list,$nute);
preg_match_all("/【机器：".$robot1."】〖主人：(.*?)〗『时间：(.*?)』《状态：(.*?)》/",$list,$jeo);
$jec=$nute[1][0];
$jeo=$jeo[1][0];
$jcry=date("Y-m-d");
include("key.php");
if($keya!=$key){
echo "对接的密钥错误！";
}else
if($robot<="10001"||$robot>="9999999999"){
echo "旧机器人号码错误！";
}else
if($robot1<="10001"||$robot1>="9999999999"){
echo "新机器人号码错误！";
}else
if($qq<="10001"||$qq>="9999999999"){
echo "主人号码错误！";
}else
if($jec==''){
echo "旧机器人号码未授权！";
}else
if($jeo!=''){
echo "新机器人号码已授权！";
}else
if($qq!=$jec){
echo "该机器人主人不是你";
}else
if($qq==$jec){
$a=str_replace("【机器：".$robot."】", "【机器：".$robot1."】", $list);
echo "成功更换机器人号".$hh."旧机器人号:".$robot."".$hh."新机器人号:".$robot1."".$hh."主人号码:".$jec."".$hh."现在时间:".$jcry."";
$myfile = fopen("List.php", "w") or die("未知错误！");
fwrite($myfile,$a);
fclose($myfile);
}
?>