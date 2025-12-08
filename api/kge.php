<?php
header("Content-Type:text/html;charset=UTF-8");
include("./API.php");
tongji("kge");
$url=$_GET['url'];//需要解析的链接
if(!$url){echo "url 参数为空";exit;}
$result = file_get_contents("https://api.vvhan.com/api/kge?url=".$url."");
echo $result;
?>