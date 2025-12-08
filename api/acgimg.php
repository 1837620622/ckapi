<?php
header('Content-Type: image/jpeg');
include("./API.php");
tongji("acgimg");
$result = file_get_contents("https://api.vvhan.com/api/acgimg");
echo $result;
?>