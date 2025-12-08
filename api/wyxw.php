<?php
include("./API.php");
tongji("wyxw");
$size = readfile('http://3g.163.com/touch/article/list/' .$_GET['id']. '/0-10.html');
echo $size;
?>