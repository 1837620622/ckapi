<?php
include("./API.php");
tongji("wzpt");
header("content-type:image/gif");
$str=file_get_contents("https://api.lmrjk.cn/xstp/");
echo $str;
?>