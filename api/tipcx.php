<?php
include("./API.php");
tongji("tipcx");
error_reporting(0);
$id = urlencode($_GET["ip"]);//需要查询的IP地址
$hh=$_GET["hh"]?:"\n";//换行符号(默认\n)
if(!$id){
echo "抱歉，输入为空。".$hh."";
exit;}
$data=get("https://dns.aizhan.com/".$id."/");
preg_match_all("/<span class=\"red\">(.*?)</",$data,$g);
echo "共有".$g[1][0]."个域名指向该IP".$hh."";
$s=preg_match_all("/\" rel=\"nofollow\" target=\"_blank\">(.*?)</",$data,$g);
if($s=="0"){exit("无域名指向该IP。");}
for( $i = 0 ; $i < $s && $i < 15 ; $i ++ ){
echo ($i+1)."、".$g[1][$i]."".$hh."".$hh."";}
function get($url,$data=0,$header_array=0,$referer=0,$time=30,$code=0) {
	if($header_array==0) {
		$header=array("CLIENT-IP: ".ip(),"X-FORWARDED-FOR: ".ip(),'User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.106 Safari/537.36');
	} else {
		$header=array("CLIENT-IP: ".ip(),"X-FORWARDED-FOR: ".ip(),'User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.106 Safari/537.36');
		$header=array_merge($header_array,$header);
	}
//print_r($header);
	$curl=curl_init();
	curl_setopt($curl,CURLOPT_URL,$url);
	curl_setopt($curl,CURLOPT_HTTPHEADER,$header);
	if($data) {
		curl_setopt($curl,CURLOPT_POST,1);
		curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
	}
	if($referer) {
		curl_setopt($curl,CURLOPT_REFERER,$referer);
	}
	curl_setopt($curl,CURLOPT_TIMEOUT,$time);
	curl_setopt($curl,CURLOPT_FOLLOWLOCATION,1);
	curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($curl,CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($curl,CURLOPT_ENCODING,'gzip,deflate');
if($code) {
		curl_setopt($curl, CURLOPT_HEADER, 1);
		$return=curl_exec($curl);
		$code_code=curl_getinfo($curl);
		curl_close($curl);
		$code_int['exec']=substr($return,$code_code["header_size"]);
		$code_int['code']=$code_code["http_code"];
		$code_int['content_type']=$code_code["content_type"];
		$code_int['header']=substr($return,0,$code_code["header_size"]);
		return $code_int;
	} else {
		$return=curl_exec($curl);
		curl_close($curl);
		return $return;
	}
}
function ip() {
	$ip_long = array(
					array('607649792', '608174079'),
					array('1038614528', '1039007743'),
					array('1783627776', '1784676351'),
					array('2035023872', '2035154943'),
					array('2078801920', '2079064063'),
					array('-1950089216', '-1948778497'),
					array('-1425539072', '-1425014785'),
					array('-1236271104', '-1235419137'),
					array('-770113536', '-768606209'),
					array('-569376768', '-564133889'),
					);
	$rand_key=mt_rand(0,9);
	return $ip=long2ip(mt_rand($ip_long[$rand_key][0], $ip_long[$rand_key][1]));
}

function replace_unicode_escape_sequence($match){
  return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');}
?>