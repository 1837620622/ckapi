<?php
header("Content-Type:text/html;charset=UTF-8");
include("./API.php");
tongji("baidutq");
$msg=$_GET['msg'];//需要查询的地区
$type=$_GET['type'];//返回格式(可选text、json)
$result = file_get_contents("https://api.xingzhige.com/API/baidutq/api.php?msg=".$msg."&type=".$type."");
echo $result;
?>