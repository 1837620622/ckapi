<?php
include("./API.php");
tongji("yldz");
$size = readfile('http://www.dutangapp.cn/u/toxic?date=' .$_GET['city']. '');
echo $size;
?>