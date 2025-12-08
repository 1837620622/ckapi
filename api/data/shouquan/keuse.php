<?php
header("Content-type: text/html; charset=utf-8");
$keya=$_GET["key"];
$card=$_GET["card"];
$robot=$_GET["robot"];
$qq=$_GET["qq"];
$jcry=date("Y-m-d");
$list=file_get_contents("secret.php");
$bhc=file_get_contents("List.php");
preg_match_all("/【机器：".$robot."】〖主人：(.*?)〗『时间：(.*?)』《状态：(.*?)》/",$bhc,$nute);
$jec=$nute[1][0];
$aa1=$nute[2][0];
$aa2=$nute[3][0];
preg_match_all("/【卡密：".$card."】〖生成者：(.*?)〗〔使用人：(.*?)〕『时间：(.*?)』《状态：(.*?)》/",$list,$bb);
$bb1=$bb[1][0];
$bb2=$bb[2][0];
$bb3=$bb[3][0];
$bb4=$bb[4][0];
$kcrh=date("Y-m-d",strtotime("+$aa1 month"));
$jcry=date("Y-m-d");
include("key.php");
if($keya!=$key){
echo "对接的密钥错误！";
}else
if($card==null){
echo "卡密不能留空！";
}else
if($bb1==null){
echo "该卡密不存在！";
}else
if($bb4=="已使用"){
echo "该卡密已被使用！";
}else
if($robot==null||$robot<="10001"||$robot>="9999999999"){
echo "机器人号码错误！";
}else
if($qq==null||$qq<="10001"||$qq>="9999999999"){
echo "主人号码错误！";
}else
if($jec!=''){
$aa=date("Y-m-d",strtotime("+$bb3 month",strtotime("$aa1")));
$am=str_replace("【机器：".$robot."】〖主人：".$jec."〗『时间：".$aa1."』《状态：".$aa2."》", "【机器：".$robot."】〖主人：".$jec."〗『时间：".$aa."』《状态：".$aa2."》", $bhc);
$a=str_replace("【卡密：".$card."】〖生成者：".$bb1."〗〔使用人：".$bb2."〕『时间：".$bb3."』《状态：".$bb4."》", "【卡密：".$card."】〖生成者：".$bb1."〗〔使用人：".$qq."〕『时间：".$bb3."』《状态：已使用》", $list);
$myfile = fopen("secret.php", "w") or die("未知错误!");
fwrite($myfile,$a);
fclose($myfile);
$myfile = fopen("List.php", "w") or die("未知错误!");
fwrite($myfile,$am);
fclose($myfile);
echo "成功续费机器人".$hh."续费号码:".$robot."".$hh."使用卡密:".$card."".$hh."到期时间:".$aa."".$hh."现在时间:".$jcry."".$hh."出现问题联系客服解决";
}else
if($jec==''){
echo "成功授权机器人".$hh."授权号码:".$robot."".$hh."使用卡密:".$card."".$hh."到期时间:".$aa."".$hh."现在时间:".$jcry."".$hh."出现问题联系客服解决";
$a=str_replace("【卡密：".$card."】〖生成者：".$bb1."〗〔使用人：".$bb2."〕『时间：".$bb3."』《状态：".$bb4."》", "【卡密：".$card."】〖生成者：".$bb1."〗〔使用人：".$qq."〕『时间：".$bb3."』《状态：已使用》", $list);
$myfile = fopen("secret.php", "w") or die("未知错误!");
fwrite($myfile,$a);
fclose($myfile);
$myfile = fopen("List.php", "w") or die("未知错误!");
fwrite($myfile,"$bhc\n【机器：".$robot."】〖主人：".$qq."〗『时间：".$kcrh."』《状态：已授权》");
fclose($myfile);
}
?>