<?php
$qq=$_GET['qq'];
$skey=$_GET['skey'];
$pskey=$_GET['pskey'];
$get=getGTK($pskey);
$get2=getGTK2($skey);
$url='https://mq.vip.qq.com/m/signsport/callSport?uin='.$qq.'&g_tk='.$get2.'&ps_tk='.$get;
$cookie='uin=o'.$qq.'; skey='.$skey.'; p_uin=o'.$qq.'; p_skey='.$pskey.';';
$data=get_result($url,$cookie);
preg_match_all('/"code":(.*?),/',$data,$code);
$code=$code[1][0];
if($code==0)
{
echo "早起打卡成功！";
}
else
{
echo "早起打卡失败，已经打卡或不是超级会员！";
}











function get_result($url,$cookie)
{
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
$header = array(
'User-Agent: Mozilla/5.0 (Linux; Android 6.0.1; vivo Y55L Build/MMB29M; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/66.0.3359.126 MQQBrowser/6.2 TBS/045140 Mobile Safari/537.36 V1_AND_SQ_8.3.5_1392_YYB_D QQ/8.3.5.4555 NetType/WIFI WebP/0.3.0 Pixel/720 StatusBarHeight/48 SimpleUISwitch/0 QQTheme/1000',
'Referer: https://mq.vip.qq.com/m/signsport/index?ADTAG=vipcenter&_wvSb=1&_nav_alpha=true&_wv=1025&_wwv=4&_wvx=3&pay_src=10&traceNum=1&traceId=296275197215901262842&traceIndex=3cfa48ab2ca42b05b875aa3a3d9ff25a&traceDetail=base64-eyJhcHBpZCI6InFxdmlwdHJhY2UiLCJwYWdlX2lkIjoiMiIsIm1vZHVsZV9pZCI6IjciLCJzdWJfbW9kdWxlX2lkIjoiMiJ9',
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




function getGTK2($skey){
$salt = 5381;
$md5key = 'tencentQQVIP123443safde&!%^%1282';
$hash = array();
$hash[] = ($salt << 5);
$len = strlen($skey);
for($i = 0; $i < $len; $i ++)
{
$ASCIICode = mb_convert_encoding($skey[$i], 'UTF-32BE', 'UTF-8');
$ASCIICode = hexdec(bin2hex($ASCIICode));
$hash[] = (($salt << 5) + $ASCIICode);
$salt = $ASCIICode;
}
$md5str = md5(implode($hash) . $md5key);
return $md5str;
}
?>