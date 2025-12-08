<?php
header("Content-type: text/html; charset=utf-8");
$keya=$_GET["key"];
$card=$_GET["card"];
$list=file_get_contents("secret.php");
preg_match_all("/【卡密：".$card."】〖生成者：(.*?)〗〔使用人：(.*?)〕『时间：(.*?)』《状态：(.*?)》/",$list,$bb);
$bb1=$bb[1][0];
$bb2=$bb[2][0];
$bb3=$bb[3][0];
$bb4=$bb[4][0];
include("key.php");
if($keya!=$key){
echo "对接的密钥错误！";
}else
if($card==null){
echo "卡密不能留空！";
}else
if($bb1==null){
echo "该卡密不存在！";
}else{
$a=str_replace("【卡密：".$card."】〖生成者：".$bb1."〗〔使用人：".$bb2."〕『时间：".$bb3."』《状态：".$bb4."》", '', $list);
$myfile = fopen("secret.php", "w") or die("未知错误!");
fwrite($myfile,$a);
fclose($myfile);
echo "该卡密已成功被删除！";
}
?>