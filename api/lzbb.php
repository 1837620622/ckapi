<?php
header('Content-Type: image/jpeg');
include("./API.php");
tongji("lzbb");
$id=$_GET['id'];//数字(1-3)
$msg=$_GET['msg'];//需要生成的内容
if(!$id){echo "id 参数为空";exit;}
if(!$msg){echo "msg 参数为空";exit;}
$result = file_get_contents("http://wanghun.top/api/img/".$id.".php?wz=".$msg."");
echo $result;
?>