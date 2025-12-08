<?php
header("Content-Type:text/html;charset=UTF-8");
include("./API.php");
tongji("img_dt");
$key=$_GET['key'];//搜索关键词,不填写默认写真
if(!$key){echo "key 参数为空";exit;}
$result = file_get_contents("https://res.abeim.cn/api-img_dt?key=".$key."");
echo $result;
?>