<?php
header("Content-Type:text/html;charset=UTF-8");
include("./API.php");
tongji("dm");
$result = file_get_contents("http://api.tangdouz.com/abz/dm.php");
echo $result;
?>