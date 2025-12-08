<?php
header("Content-Type:text/html;charset=UTF-8");
include("./API.php");
tongji("wtqh");
$result = file_get_contents("http://api.klizi.cn/API/other/wtqh.php");
echo $result;
?>