<?php
$qq=$_GET['qq'];
$skey=$_GET['skey'];
$pskey=$_GET['pskey'];
$token=$_GET['token'];
$msg=$_GET['msg'];
$txt=$msg;
$id=$_GET['id'];
$get=getGTK($pskey);
$url='https://proxy.vip.qq.com/cgi-bin/srfentry.fcgi?ts=1588828508960&daid=18&g_tk='.$get.'&data={"13031":{"req":{"sModel":"'.$txt.'","sManu":"vivo","sIMei":"'.$id.'","iAppType":3,"sVer":"8.3.5.4555","lUin":'.$qq.',"bShowInfo":true,"sDesc":"","sModelShow":"'.$txt.'"}}}&pt4_token='.$token;
$cookie='p_skey='.$pskey.'; uin=o'.$qq.'; skey='.$skey.'; p_uin=o'.$qq.';';
$data=get_result($url,$cookie);
preg_match_all('/"iRet":(.*?),/',$data,$iRet);
$iRet=$iRet[1][0];
if($iRet=='0')
{
echo "设置自定义在线状态成功!";
}
else
if($iRet=='-6')
{
echo "本功能需要SVIP权限!";
}
else
{
echo "设置自定义在线状态失败!";
}

function get_result($url,$cookie)
{
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
$header = array(
'User-Agent: Mozilla/5.0 (Linux; Android 6.0.1; vivo Y55L Build/MMB29M; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/66.0.3359.126 MQQBrowser/6.2 TBS/045140 Mobile Safari/537.36 V1_AND_SQ_8.3.5_1392_YYB_D QQ/8.3.5.4555 NetType/WIFI WebP/0.3.0 Pixel/720 StatusBarHeight/48 SimpleUISwitch/0 QQTheme/1000',
'Referer: https://buluo.qq.com/mobile/my_heart.html',
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