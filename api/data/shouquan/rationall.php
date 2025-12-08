<?php
header("Content-type: text/html; charset=utf-8");
$keya=$_GET["key"];
$qq=$_GET["qq"];
$list=file_get_contents("proxyy.php");
preg_match_all("/【云黑：".$qq."】〖状态：(.*?)〗/",$list,$nute);
$jec=$nute[1][0];
$a=str_replace("\n【云黑：".$qq."】〖状态：已添加〗", '', $list);
include("key.php");
if($keya!=$key){
echo "对接的密钥错误！";
}else
if($qq<="10001"||$qq>="9999999999"){
echo "删除云黑号码错误！";
}else
if($jec==''){
echo "该号码不是云黑！";
}else
if($jec!=''){
echo "删除云黑成功！";
$myfile = fopen("proxyy.php", "w") or die("未知错误！");
fwrite($myfile,$a);
fclose($myfile);
}
?>