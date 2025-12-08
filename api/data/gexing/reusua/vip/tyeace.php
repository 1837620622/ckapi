<?php
$qq=$_GET['qq'];
$skey=$_GET['skey'];
$pskey=$_GET['pskey'];
$token=$_GET['token'];
$get=getGTK($skey);
$gey=getGTK($pskey);
$msg=$_GET["msg"];
$id=$_GET["id"];
if($id==null)
{
$url='https://zb.vip.qq.com/v2/proxy/domain/proxy.vip.qq.com/cgi-bin/srfentry.fcgi?daid=18&data=%7B%2213550%22%3A%7B%22req%22%3A%7B%22itemClass%22%3A5%2C%22platform%22%3A2%2C%22searchKey%22%3A%22'.$msg.'%22%2C%22writeHistoryFlag%22%3A1%2C%22pageIndex%22%3A0%2C%22pageItemNUm%22%3A40%7D%7D%7D&g_tk='.$gey;
$cookie='uin=o'.$qq.'; skey='.$skey.'; p_uin=o'.$qq.'; p_skey='.$pskey.';';
$data=get_result($url,$cookie);
preg_match_all('/ret":(.*?)}/',$data,$ret);
$ret=$ret[1][0];
if($ret=="0")
{
$result=preg_match_all('/"name":"(.*?)","product_id":"(.*?)"},"gxhOpInfo":{"begin_time":(.*?),"end_time":(.*?),"ext_flag":(.*?),"fee_type":(.*?),"is_show":(.*?),"is_valid":(.*?),"max_qq_ver":"(.*?)","min_qq_ver":"(.*?)","need_vip":(.*?),"pay_type":(.*?),"price":(.*?)},"image":"(.*?)","itemBgColor":"(.*?)","itemId":(.*?),"name":"(.*?)"/',$data,$nute);
if($result=="0")
{
echo "抱歉，没有找到[".$msg."]的相关字体，请修改关键词再试！";
}
else
{
echo "---字体搜索结果---\n";
for ($x=0; $x < $result && $x<=14; $x++) 
{
$jec=$nute[1][$x];
$je=$nute[16][$x];
echo ($x+1).".".$jec."-[id:".$je."]\n";
}
echo "发送设置字体+id即可设置！";
}
}
else
{
echo "搜索失败，请重试!";
}
}
else
{
$url='https://zb.vip.qq.com/v2/proxy/domain/proxy.vip.qq.com/cgi-bin/srfentry.fcgi?daid=18&t=1587362970241&g_tk='.$gey.'&data={"13019":{"stReq":{"stLogin":{"iKeyType":1,"iOpplat":2,"lUin":2698827392,"sClientIp":"","sClientVer":"8.3.3","sSKey":174745198},"stUniBusinessItem":{"appid":5,"itemid":'.$id.',"hashid":""},"stFont":{"isWithTheme":0,"forbidThemeFont":0}}}}';
$cookie='p_skey='.$pskey.'; uin=o'.$qq.'; skey='.$skey.'; p_uin=o'.$qq.';';
$data=get_result($url,$cookie);
preg_match_all("/ret\":(.*?),/",$data,$ret);
$ret=$ret[1][0];
preg_match_all("/errmsg\":\"(.*?)\"/",$data,$errmsg);
$errmsg=$errmsg[1][0];
preg_match_all("/url\":\"(.*?)\"/",$data,$url);
$url=$url[1][0];
if($ret=="0")
{
echo "已设置字体:[".$id."]";
}
else
if($ret=="-270028")
{
echo "设置失败，没有该字体!";
}
else
if($ret=="6002")
{
echo "设置失败，字体[".$id."]".$errmsg.":".$url;
}
else
if($ret=="5002")
{
echo "设置失败，非SVIP用户!";
}
else
if($ret=="4002")
{
echo "设置失败，非VIP用户!";
}
else
if($ret=="5003")
{
echo "设置失败，未知错误!";
}
else
if($ret=="9004")
{
echo "设置失败，非专属用户!";
}
else
if($ret=="2002")
{
echo "设置失败，需要购买该字体!";
}
else
if($ret=="9003")
{
echo "设置失败，非年费用户!";
}
else
{
echo "设置失败，未知错误!";
}
}

function get_result($url,$cookie)
{
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
$header = array(
'User-Agent: Mozilla/5.0 (Linux; Android 6.0.1; vivo Y55L Build/MMB29M; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/77.0.3865.120 MQQBrowser/6.2 TBS/045220 Mobile Safari/537.36 V1_AND_SQ_8.3.6_1406_YYB_D QQ/8.3.6.4590 NetType/WIFI WebP/0.3.0 Pixel/720 StatusBarHeight/48 SimpleUISwitch/0 QQTheme/1000',
'Referer: https://zb.vip.qq.com/v2/pages/searchPage?_wv=2&appid=2',
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