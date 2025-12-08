<?php
header("Content-Type:text/html;charset=UTF-8");
include("./API.php");
tongji("qun_shut_list");
$uin=$_GET['uin'];//登录者的QQ号
$skey=$_GET['skey'];//登录者的skey
$pskey=$_GET['pskey'];//登录者的pskey
$qh=$_GET['qh'];//操作群号
$result = file_get_contents("http://jiuli.xiaoapi.cn/i/qun_shut_list.php?uin=".$uin."&skey=".$skey."&pskey=".$pskey."&qh=".$qh."");
echo $result;
?>