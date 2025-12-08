<?php
header('Content-Type: image/jpeg');
include("./API.php");
tongji("gaoqing_mnt");
$result = file_get_contents("http://shengapi.cn/images/gaoqing_mnt.php");
echo $result;
?>