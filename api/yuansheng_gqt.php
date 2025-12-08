<?php
header('Content-Type: image/jpeg');
include("./API.php");
tongji("yuansheng_gqt");
$result = file_get_contents("http://shengapi.cn/images/yuansheng_gqt.php");
echo $result;
?>