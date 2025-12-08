<?php
header("Content-type: text/html; charset=utf-8");
$keya=$_GET["key"];
$robot=$_GET["robot"];
$qq=$_GET["qq"];
$time=$_GET["time"];
$list=file_get_contents("List.php");
preg_match_all("/【机器：".$robot."】〖主人：(.*?)〗『时间：(.*?)』《状态：(.*?)》/",$list,$nute);
$jec=$nute[1][0];
$aaa=$nute[1][0];
$bbb=$nute[2][0];
$ccc=$nute[3][0];
$a=str_replace("\n【机器：".$robot."】〖主人：".$aaa."〗『时间：".$bbb."』《状态：".$ccc."》", '', $list);
include("key.php");
if($keya!=$key){
echo "对接的密钥错误！";
}else
if($robot<="10001"||$robot>="9999999999"){
echo "删除机器人号码错误！";
}else
if($jec==''){
echo "该机器人号码未授权！";
}else
if($time!="永久"){
echo "删除授权成功！";
$myfile = fopen("List.php", "w") or die("未知错误！");
fwrite($myfile,$a);
fclose($myfile);
}
?>