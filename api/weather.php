<?php
header("Content-Type:text/html;charset=UTF-8");
include("./API.php");
tongji("weather");
$msg=$_GET['msg'];//需要查询的地区名
$type=$_GET['type'];//输数字(1-7)天
$result = file_get_contents("http://wanghun.top/api/yh/weather.php?msg=".$msg."&type=".$type."");
echo $result;
?>