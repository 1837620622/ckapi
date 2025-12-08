<?php
header('Content-Type: image/jpeg');
include("./API.php");
tongji("girl");
$result = file_get_contents("https://api.vvhan.com/api/girl");
echo $result;
?>