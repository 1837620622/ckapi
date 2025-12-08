<?php
include("./API.php");
tongji("aqyspss");
$size = readfile('http://xinqi.if.iqiyi.com/fenghuolun/v2?name=' .$_GET['s']. '');
echo $size;
?>