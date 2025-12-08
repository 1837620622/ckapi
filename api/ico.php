<?php
header('Content-Type: image/jpeg');
include("./API.php");
tongji("ico");
$url=$_GET['url'];//需要获取网站图标的链接
if(!$url){echo "url 参数为空";exit;}
$result = file_get_contents("https://api.vvhan.com/api/ico?url=".$url."");
echo $result;
?>