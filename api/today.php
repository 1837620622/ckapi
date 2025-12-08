<?php
include("./API.php");
tongji("today");
$month=date('m');
$day=date('d');
$data_msg=curl("https://baike.baidu.com/cms/home/eventsOnHistory/".$month.'.json');
if(!$data_msg) {
	echo json(1001,"历史今天获取失败！");
	exit();
}
$data_msg=json_decode($data_msg,true);
$array=array();
foreach($data_msg[$month][$month.$day] as $v) {
	$array["list"][]=strip_tags($v["title"]);
}
echo json(1000,$array);