<?php
header("Content-type: text/html; charset=utf-8");
$qq=$_GET['qq'];
$skey=$_GET['skey'];
$pskey=$_GET['pskey'];
$token=$_GET['token'];
$get=getGTK($skey);
$time=date('Y-m-d h:i:s');
$url="https://zb.vip.qq.com/v2/home/cgi/getModuleData?t=1584934558062&id=501&platformId=2&version=8.3.0&g_tk=".$bkn;
$cookie='uin=o'.$qq.'; skey='.$skey.'; p_uin=o'.$qq.'; p_skey='.$pskey.'; pt4_token='.$token.'; qq_locale_id=2052; pgv_info=ssid=s5422985352; pgv_pvid=9957675520; ts_uid=1430403032; ts_last=zb.vip.qq.com/v2/home/mine';
$data=get_result($url,$cookie);
$data=str_replace(" '/", '/', $data);
$data=str_replace("/ ", '/', $data);
$data=str_replace("//gxh.vip.qq.com", 'https://gxh.vip.qq.com', $data);
if($data==''||$data==null)
{
echo "查看失败，请重试!";
}
else
{
preg_match_all('/typeName":"气泡","itemType":"(.*?)","itemTitle":"(.*?)","bid":"(.*?)","itemImg":"(.*?)"/',$data,$aa);
preg_match_all('/typeName":"挂件","itemType":"(.*?)","itemTitle":"(.*?)","bid":"(.*?)","itemImg":"(.*?)"/',$data,$bb);
preg_match_all('/typeName":"字体","itemType":"(.*?)","itemTitle":"(.*?)","bid":"(.*?)","itemImg":"(.*?)"/',$data,$cc);
preg_match_all('/typeName":"浮屏","itemType":"(.*?)","itemTitle":"(.*?)","bid":"(.*?)","itemImg":"(.*?)"/',$data,$dd);
preg_match_all('/typeName":"红包","itemType":"(.*?)","itemTitle":"(.*?)","bid":"(.*?)","itemImg":"(.*?)"/',$data,$ee);
preg_match_all('/typeName":"名片","itemType":"(.*?)","itemTitle":"(.*?)","bid":"(.*?)","itemImg":"(.*?)"/',$data,$ff);
$aa1=$aa[2][3];
$aa2=$aa[4][3];
preg_match_all('/\/item\/(.*?)\//',$aa2,$aa3);
$aa3=$aa3[1][0];

$bb1=$bb[2][3];
$bb2=$bb[4][3];
preg_match_all('/\/item\/(.*?)\//',$bb2,$bb3);
$bb3=$bb3[1][0];

$cc1=$cc[2][3];
$cc2=$cc[4][3];
preg_match_all('/\/item\/(.*?)\//',$cc2,$cc3);
$cc3=$cc3[1][0];

$dd1=$dd[2][3];
$dd2=$dd[4][3];
preg_match_all('/\/item\/(.*?)\//',$dd2,$dd3);
$dd3=$dd3[1][0];

$ee1=$ee[2][3];
$ee2=$ee[4][3];
preg_match_all('/\/item\/(.*?)\//',$ee2,$ee3);
$ee3=$ee3[1][0];

$ff1=$ff[2][3];
$ff2=$ff[4][3];
preg_match_all('/\/item\/(.*?)\//',$ff2,$ff3);
$ff3=$ff3[1][0];

if($aa1==''){
$uon1="默认气泡[0]";
}else
{
$uon1=$aa1."[".$aa3."]";
}

if($bb1==''){
$uon2="默认挂件[0]";
}else
{
$uon2=$bb1."[".$bb3."]";
}

if($cc1==''){
$uon3="默认字体[0]";
}else
{
$uon3=$cc1."[".$cc3."]";
}

if($dd1==''){
$uon4="默认浮屏[0]";
}else
{
$uon4=$dd1."[".$dd3."]";
}

if($ee1==''){
$uon5="默认红包[0]";
}else
{
$uon5=$ee1."[".$ee3."]";
}

if($ff1==''){
$uon6="默认名片[0]";
}else
{
$uon6=$ff1."[".$ff3."]";
}

echo "气泡：".$uon1."\n";
echo "挂件：".$uon2."\n";
echo "字体：".$uon3."\n";
echo "浮屏：".$uon4."\n";
echo "红包：".$uon5."\n";
echo "名片：".$uon6;
}

function get_result($url,$cookie)
{
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
$header = array(
'User-Agent: Mozilla/5.0 (Linux; Android 6.0.1; vivo Y55L Build/MMB29M; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/66.0.3359.126 MQQBrowser/6.2 TBS/045130 Mobile Safari/537.36 V1_AND_SQ_8.3.0_1362_YYB_D QQ/8.3.0.4480 NetType/WIFI WebP/0.3.0 Pixel/720 StatusBarHeight/49 SimpleUISwitch/0 QQTheme/1000',
'Referer: https://zb.vip.qq.com/v2/home/mine?_wv=5123&_proxy=1',
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