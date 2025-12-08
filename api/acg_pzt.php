<?php
header('Content-Type: image/jpeg');
include("./API.php");
tongji("acg_pzt");
$result = file_get_contents("http://shengapi.ltd/images/acg_pzt.php");
echo $result;
?>