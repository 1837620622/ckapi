<?php
header('Content-Type: image/jpeg');
include("./API.php");
tongji("view");
$result = file_get_contents("https://api.vvhan.com/api/view");
echo $result;
?>