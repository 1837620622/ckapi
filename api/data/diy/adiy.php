<?php
$uin=$_REQUEST["uin"];
$skey=$_REQUEST["skey"];
$data=$_POST["data"];
$header=array("User-Agent: Mozilla/5.0 (Linux; Android 11; Fuck Build/RKQ1.201112.002; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/77.0.3865.120 MQQBrowser/6.2 TBS/045710 Mobile Safari/537.36 V1_AND_SQ_8.8.5_1858_YYB_D A_8080500 QQ/8.8.5.5570 NetType/WIFI WebP/0.3.0 Pixel/1440 StatusBarHeight/138 SimpleUISwitch/0 QQTheme/2011 InMagicWin/0 StudyMode/0","Content-Type: application/json","Referer: https://club.vip.qq.com/profile/custom","Cookie: uin=o".$uin."; p_uin=o".$uin."; skey=".$skey."; p_skey=".$pskey."; ");
$url="https://club.vip.qq.com/api/trpc/diy_business_card/SetMaterial?g_tk=".getGTK($pskey);
$json =get_result($url,$data,$header);
print_r($json);
function get_result($url,$data,$header)
{
$curl=curl_init();
curl_setopt($curl,CURLOPT_URL,$url);
curl_setopt($curl,CURLOPT_HTTPHEADER,$header);
curl_setopt($curl,CURLOPT_POST,1);
curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
curl_setopt($curl,CURLOPT_TIMEOUT,30);
curl_setopt($curl,CURLOPT_FOLLOWLOCATION,1);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,FALSE);
curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,FALSE);
curl_setopt($curl,CURLOPT_ENCODING,'gzip,deflate');
$return=curl_exec($curl);
curl_close($curl);
return $return;
}
function GetGTK($skey) {
	$len = strlen($skey);
	$hash = 5381;
	for ($i = 0; $i < $len; $i++) {
		$hash += ($hash << 5 & 2147483647) + ord($skey[$i]) & 2147483647;
		$hash &= 2147483647;
	}
	return $hash & 2147483647;
}