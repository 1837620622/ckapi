<?php
header("Content-Type:text/html;charset=UTF-8");
include("./API.php");
tongji("Receive_jd");
$uin=$_GET['uin'];//登录的QQ号
$skey=$_GET['skey'];//登录的skey
$pskey=$_GET['pskey'];//登录的pskey
$qh=$_GET['qh'];//群号
$result = file_get_contents("http://jiuli.xiaoapi.cn/i/Receive_jd.php?uin=".$uin."&skey=".$skey."&pskey=".$pskey."&qh=".$qh."");
echo $result;
?>