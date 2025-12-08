<?php
$uin=$_REQUEST["uin"];
$skey=$_REQUEST["skey"];
$data=$_POST["data"];
$pskey=$_REQUEST["pskey"];
$url=$_REQUEST["url"];
$lottie=$_REQUEST["lottie"]?:"渐变";
$dz=$_REQUEST["dz"]?:"全屏";
$tx=$_REQUEST["tx"]?:"居中";

$tx_id=array(
"跟随" => '"x_axis":"520w","y_axis":"7100","gravity":"pf_avatar"',
"居中" => '"x_axis":"3800w","y_axis":"3000","gravity":"pf_avatar"',
"隐藏" => '"x_axis":"520w","y_axis":"-7200h","gravity":"pf_avatar"'
);
$tx=$tx_id[$tx];
$dz_id=array(
"普通" => '{"x_axis":"6900w","y_axis":"8000h","height":"1050w","position_limit":{"top":"88px","bottom":"88px"}},"int_kv":{"style":1,"lpd":12,"rpd":12}',
"全屏" => '{"x_axis":"-36000w","y_axis":"0h","height":"100050w","position_limit":{"top":"88px","bottom":"88px"}},"int_kv":{"style":1,"lpd":120000,"rpd":12}',
"隐藏" => '{"x_axis":"520w","y_axis":"-7100h","position_limit":{"top":"88px","bottom":"88px"}},"int_kv":{"border":1}'
);
$dz=$dz_id[$dz];
$lottie_id=array(
"星星" => '"2029","animation_md5":"1c1e7ce53c6c8c2bbb7b02aa711e7764"',
"渐变" => '"2014","animation_md5":"54eda9010bcc0df1287475053275b4db"',
"花花" => '"2025","animation_md5":"71baf86c36e09b9348caf5eef3a37e82"',
"超酷涂鸦" => '"2018","animation_md5":"369524cd9fda9772222351deeb7502b2"',
"炫酷" => '"2003","animation_md5":"6414871015c01a4a8586f1370f5d3f55"',
"渐变" => '"2004","animation_md5":"aedcc94a8ac4a79f599c4815553ff20c"',
"黑暗" => '"2001","animation_md5":"4344816998290bcbdeb2a6b4c0e28509"',
"动漫" => '"2000","animation_md5":"4e2e97d29dec0d2f3c3988e9460ec84d"',
"可爱" => '"2002","animation_md5":"57cfc5e1cc74ae039c3df5d9b4d14e85"',
"潮流派" => '"2006","animation_md5":"dc73a6c55f8a07d6d494dc05a02e1b7e"',
"可爱夏日" => '"2010","animation_md5":"aa08f6c20699caeab7852dd4b9c75bcc"',
"梦幻星河" => '"2007","animation_md5":"e5118093ab11b337ffd7714f8843f0fd"',
"浪漫花语" => '"2008","animation_md5":"6aa35cf8b0df65b06876456acf882279"',
"奇幻卡牌" => '"2009","animation_md5":"8820497ff915f02197c481f17f1d036e"',
"甜甜爱情" => '"2011","animation_md5":"36421bd1e16c18f939e3870d70b93375"',
"宇宙流浪" => '"2012","animation_md5":"b1c3997ffaa4ba2912487ff987751093"',
"梦境随想" => '"2013","animation_md5":"95940b4e7e1ff2bf38b7671e434d4b43"',
"暗黑史诗" => '"2017","animation_md5":"4b48742203f7e8f06472db42d37506d6"',
"慕色霓虹" => '"2021","animation_md5":"b8f418389fde1dec1c5be07bf19d6852"',
"波光之梦" => '"2022","animation_md5":"e9df9a1bf9b259490473afd9d341f170"',
"情牵" => '"2024","animation_md5":"b575d02cfe02ed922e6400ce82457ddb"',
"长相思令" => '"2026","animation_md5":"4ed6f6ef7e9f85bbbd0d8d8d77e2c543"',
"朦胧花火" => '"2028","animation_md5":"f2ed55fec9df32b608e41dd2a704bafa"'
);
$lottie=$lottie_id[$lottie];
$base64=base64_encode(file_get_contents($url));
$base64='data:image/png;base64,'.$base64.'';
$data='{"style_id":22,"bg_id":2004,"card_id":3593,"card_md5":"c9f374febf69d976de4840be07059666","render_info":{"bg_info":{"base64_bg_pic":"'.$base64.'","mask_view":"#00000000","lottie_id":'.$lottie.',"animation_loop":"1"},"head_info":{"head_items":{"1001":{"position_info":'.$dz.',"str_kv":{"id":"1001","type":"pf_like"}},"1002":{"position_info":{'.$tx.',"position_limit":{"top":"88px","bottom":"88px"}},"int_kv":{"border":1},"str_kv":{"id":"1002","type":"pf_avatar"}},"1003":{"position_info":{"x_axis":"283300w","y_axis":"920000h","width":"800w","height":"","gravity":"center_horizontal","position_limit":{"top":"88px","bottom":"120px","left":"32px","right":"32px"}},"int_kv":{"f":0,"ft":1},"str_kv":{"id":"1003","type":"pf_name"}}}},"body_info":{"color":"#00000000","cpd":0,"line_color":"#00000000","ts":0}}}';
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