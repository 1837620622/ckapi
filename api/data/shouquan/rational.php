<?php
header("Content-type: text/html; charset=utf-8");
$keya=$_GET["key"];
$qq=$_GET["qq"];
$list=file_get_contents("proxy.php");
preg_match_all("/【代理：".$qq."】〖状态：(.*?)〗/",$list,$nute);
$jec=$nute[1][0];
$a=str_replace("\n【代理：".$qq."】〖状态：已添加〗", '', $list);
include("key.php");
if($keya!=$key){
echo "对接的密钥错误！";
}else
if($qq<="10001"||$qq>="9999999999"){
echo "删除代理号码错误！";
}else
if($jec==''){
echo "该号码不是代理！";
}else
if($jec!=''){
echo "删除代理成功！";
$myfile = fopen("proxy.php", "w") or die("未知错误！");
fwrite($myfile,$a);
fclose($myfile);
}
?>