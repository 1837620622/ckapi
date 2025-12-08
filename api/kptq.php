<?php
header("Content-Type:text/html;charset=UTF-8");
include("./API.php");
tongji("kptq");
$msg=$_GET['msg'];//需要查询的地区
if(!$msg){echo "msg 参数为空";exit;}
$result = file_get_contents("http://api.yanxi520.cn/api/tq.php?msg=".$msg."");
echo $result;
?>