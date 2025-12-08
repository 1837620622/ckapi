<?php
header("Content-Type:text/html;charset=UTF-8");
include("./API.php");
tongji("mirai");
$msg=$_GET['msg'];//歌曲名
$n=$_GET['n'];//选择
$type=$_GET['type'];//返回(text/xml/json)
$result = file_get_contents("https://wanghun.top/api/mirai/migu.php?msg=".$msg."&n=".$n."&type=".$type."");
echo $result;
?>