<?php
$qq=$_GET['qq'];
$skey=$_GET['skey'];
$pskey=$_GET['pskey'];
$token=$_GET['token'];
$get=getGTK($skey);
$url='https://mobile.qzone.qq.com/mqz_get_visitor?qzonetoken='.$token.'&g_tk='.$get.'&res_mode=0&res_uin='.$qq.'&offset=0&count=10&page=1&format=json&t=1589077486663';
$cookie='p_skey='.$pskey.'; uin=o'.$qq.'; skey='.$skey.'; p_uin=o'.$qq.';';
$data=get_result($url,$cookie);

$result=preg_match_all('/face_url":"(.*?)","info":"访问了您的空间","nick":"(.*?)","platform_src":(.*?),"service_src":(.*?),"source":(.*?),"time":(.*?),"uin":(.*?)}/',$data,$nute);
for ($x=0; $x < $result && $x<=8; $x++) 
{
$aa=$nute[2][$x];
$bb=$nute[7][$x];
$cc=$nute[6][$x];
$cc=date('Y-m-d h:i:s',$cc);
echo ($x+1)."：".$aa."访问了你的空间-".$cc."\n";
}
echo "注意：只显示最新九条访问信息";



function get_result($url,$cookie)
{
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
$header = array(
'User-Agent: Mozilla/5.0 (Linux; Android 6.0.1; vivo Y55L Build/MMB29M; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/66.0.3359.126 MQQBrowser/6.2 TBS/045140 Mobile Safari/537.36 V1_AND_SQ_8.3.5_1392_YYB_D QQ/8.3.5.4555 NetType/WIFI WebP/0.3.0 Pixel/720 StatusBarHeight/48 SimpleUISwitch/0 QQTheme/1000',
'Referer: https://h5.qzone.qq.com/mqzone/profile?starttime=1589077456512&hostuin=551501951',
);
//curl_setopt($ch,CURLOPT_POST,true);
//curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_COOKIE, $cookie);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3); //设置等待时间
curl_setopt($ch, CURLOPT_TIMEOUT, 30); //设置cURL允许执行的最长秒数
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 1);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); 
curl_setopt($ch, CURLOPT_HEADER, 0); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$content = curl_exec($ch);
curl_close($ch);
return $content;
}

function getGTK($skey){
$len = strlen($skey);
$hash = 5381;
for ($i = 0; $i < $len; $i++) {
$hash += ($hash << 5 & 2147483647) + ord($skey[$i]) & 2147483647;
$hash &= 2147483647;
}
return $hash & 2147483647;
}
?>