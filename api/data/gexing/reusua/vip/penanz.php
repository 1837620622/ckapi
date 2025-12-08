<?php
$qq=$_GET['qq'];
$skey=$_GET['skey'];
$pskey=$_GET['pskey'];
$token=$_GET['token'];
$get=getGTK($skey);
$gey=getGTK($pskey);
$url='https://zb.vip.qq.com/v2/proxy/domain/proxy.vip.qq.com/cgi-bin/srfentry.fcgi?daid=18&t=1587362970241&g_tk='.$gey.'&data={"13019":{"stReq":{"stLogin":{"iKeyType":1,"iOpplat":2,"lUin":2698827392,"sClientIp":"","sClientVer":"8.3.3","sSKey":174745198},"stUniBusinessItem":{"appid":4,"itemid":0,"hashid":""},"stFont":{"isWithTheme":0,"forbidThemeFont":0}}}}';
$cookie='p_skey='.$pskey.'; uin=o'.$qq.'; skey='.$skey.'; p_uin=o'.$qq.';';
$data=get_result($url,$cookie);
preg_match_all("/ret\":(.*?),/",$data,$ret);
$ret=$ret[1][0];
if($ret=="0")
{
echo "取消挂件成功!";
}
else
{
echo "取消挂件失败!";
}

function get_result($url,$cookie)
{
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
$header = array();
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