<?php
header("Content-Type:text/html;charset=UTF-8");
include("./API.php");
tongji("Ridicule");
$msg=$_GET['msg']?:"1";//输数字(1=滚刀/2=殴打/3=散扣/4=嘲讽/5=口吐)
if(!$msg){echo "msg 参数为空";exit;}
$result = file_get_contents("http://".$_SERVER['HTTP_HOST']."/api/data/Ridicule/".$msg.".php");
echo $result;
?>