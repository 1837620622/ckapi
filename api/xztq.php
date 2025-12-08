<?php
header("Content-Type:text/html;charset=UTF-8");
include("./API.php");
tongji("xztq");
$msg=$_GET['msg'];//需要查询的地区
$type=$_GET['type'];//返回格式(可选预报或yb)(默认text)
$result = file_get_contents("https://api.xingzhige.com/API/xztq/api.php?msg=".$msg."&type=".$type."");
echo $result;
?>