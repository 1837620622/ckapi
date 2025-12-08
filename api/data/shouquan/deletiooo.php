<?php
header("Content-type: text/html; charset=utf-8");
$keya=$_GET["key"];
$list=file_get_contents("proxy.php");
include("key.php");
if($keya!=$key){
echo "对接的密钥错误！";
}else
{
echo "已删除全部云黑！";
$myfile=fopen("proxy.php", "w") or die("未知错误！");
fwrite($myfile,'');
fclose($myfile);
}
?>