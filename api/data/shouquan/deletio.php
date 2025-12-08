<?php
header("Content-type: text/html; charset=utf-8");
$keya=$_GET["key"];
$list=file_get_contents("List.php");
include("key.php");
if($keya!=$key){
echo "对接的密钥错误！";
}else
{
echo "已删除全部授权！";
$myfile=fopen("List.php", "w") or die("未知错误！");
fwrite($myfile,'');
fclose($myfile);
}
?>