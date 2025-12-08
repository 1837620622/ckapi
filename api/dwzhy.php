<?php
include("./API.php");
tongji('dwzhy');
if(!$_REQUEST['url']) {//需要还原的链接
	echo json(1001,"请输入需要还原的网址！");
	exit();
}
$data_msg=get_headers($_REQUEST["url"],1);
if($data_msg["Location"]) {
	echo json(1000,$data_msg["Location"]);
	exit();
} else {
	echo json(1002,"短网址还原失败，请稍后重试！");
	exit();
}