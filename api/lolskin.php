<?php
header('Content-Type: image/jpeg');
include("./API.php");
tongji("lolskin");
$result = file_get_contents("https://api.vvhan.com/api/lolskin");
echo $result;
?>