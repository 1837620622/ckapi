<?php
include("./API.php");
include("../tianyi.php");
tongji("phone");
header("Access-Control-Allow-Origin:*");
header('Content-type: application/json');
error_reporting(0);
$hh=$_GET["hh"]?:"\n";//换行符号(默认\n)
if(isset($_GET['id'])&&is_numeric($_GET['id'])){
	$id = $_GET['id'];//需要查询的手机号
}else{
echo "".$ming."API手机号归属地".$hh."";
echo "━━━━━━━━━".$hh."";
echo "不是正确的手机号".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
exit();
}
/*获取接口数据*/
$string = httpGet('https://shouji.supfree.net/fish.asp?cat='.$id);
/*编码转换*/
$string = mb_convert_encoding($string,'utf-8', 'gbk');
/*正则查找*/
preg_match_all('/
(.*)<\/p>/',$string,$str);

$local = strip_tags($str[1][0]);
$duan = strip_tags($str[1][1]);
$type = strip_tags($str[1][2]);
$yys = strip_tags($str[1][3]);
$bz = strip_tags($str[1][5]);
$id = $_GET['id'];
$msg = $_GET['msg'];
if($msg==null && $local!=''){
echo "".$ming."API手机号归属地".$hh."";
echo "━━━━━━━━━".$hh."";
echo "手机号：".$id."".$hh."";
echo "".$duan."".$hh."";
echo "".$type."".$hh."";
echo "".$yys."".$hh."";
echo "".$bz."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}elseif($msg==json && $local!=''){
	echo json_encode(array('code'=>'200','id'=>$id,'local'=>$local,'duan'=>$duan,'type'=>$type,'yys'=>$yys,'bz'=>$bz));
}else{
echo "".$ming."API手机号归属地".$hh."";
echo "━━━━━━━━━".$hh."";
echo "手机号:".$id."".$hh."";
echo "该手机号无数据".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
exit();
}

function httpGet($a, $b = '', $c = '', $d = ''){
	/*curl模拟get请求*/
	$e = curl_init();
	$f = mt_rand(11, 191) . "." . mt_rand(0, 240) . "." . mt_rand(1, 240) . "." . mt_rand(1, 240);
	$i[] = "CLIENT-IP:" . $f;
	$i[] = "X-FORWARDED-FOR:" . $f;
	$i[] = "User-agent:Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.11 (KHTML, like Gecko) Chrome/20.0.1132.57 Safari/536.11";
	$i[] = "X-Requested-With: XMLHttpRequest";
	if (!empty($d)) {
		$i[] = "Cookie: " . $d;
	}
	curl_setopt($e, CURLOPT_HTTPHEADER, $i);
	curl_setopt($e, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($e, CURLOPT_TIMEOUT, 180);
	curl_setopt($e, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($e, CURLOPT_SSL_VERIFYHOST, false);
	if (!empty($c)) {
		curl_setopt($e, CURLOPT_REFERER, $c);
	}
	if (!empty($b)) {
		curl_setopt($e, CURLOPT_POST, 1);
		curl_setopt($e, CURLOPT_POSTFIELDS, $b);
	}
	curl_setopt($e, CURLOPT_URL, $a);
	curl_setopt($e, CURLOPT_ENCODING, "gzip");
	$j = curl_exec($e);
	curl_close($e);
	return $j;
}
