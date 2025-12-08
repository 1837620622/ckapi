<?php
include("./API.php");
tongji("bz");
if($_REQUEST["url"]==null) {//需要扒站的链接
	echo json(1001,"请输入网站域名！");
	exit();
	}
$route="./data/bz/".md5("".$_REQUEST["url"]).".zip";
if(file_exists($route)) {
	header('Content-type: application/json');
	echo json(1000,"http://".$_SERVER['HTTP_HOST']."/api/data/bz/".md5("".$_REQUEST["url"]).".zip");
exit();}
	$return=curl("http://fztool.ptcms.com/download.php",'method[0]=GET&url[0]='.$_REQUEST["url"].'&file[0]=index.html&header[0]=&cssdir=assets/css&jsdir=assets/js&fontdir"=font&htmlimgdir=assets/img&cssimgdir=assets/format&otherdir=other&htmlformat=1&cssformat=1&jsformat=1&innerimg=1&htmlformat=1');
	if($return=="采集错误") {
		echo json(1002,"请输入有效的网站地址！");
		exit();
} else if(strstr($return,"PK")) {
		echo json(1000,"http://".$_SERVER['HTTP_HOST']."/api/data/bz/".md5("".$_REQUEST["url"]).".zip");
		file_put_contents($route,$return);
		exit();
}else{
		echo json(1003,"扒站失败！");
		exit();
		}