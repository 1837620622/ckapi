<?php
$msg=$_GET["msg"];
$qq=$_GET['qq'];
$skey=$_GET['skey'];
$pskey=$_GET['pskey'];
$msg=$_GET['msg'];
$get=getGTK($skey);
$url="http://qun.qq.com/cgi-bin/qun_mgr/get_group_list";
$post='bkn='.$get;
$cookie='uin=o'.$qq.'; skey='.$skey.'; p_uin=o'.$qq.'; p_skey='.$pskey.';';
$data=get_result($url,$post,$cookie);
$data=preg_replace_callback('/\\\\u([0-9a-f]{4})/i', 'replace_unicode_escape_sequence', $data);
preg_match_all('/"ec":(.*?),/',$data,$ec);
$ec=$ec[1][0];
if($ec!='0')
{
echo "群签到失败!";
}
else
{
$result=preg_match_all('/{"gc":(.*?),"gn":"(.*?)","owner":(.*?)}/',$data,$nute);
for ($x=0; $x < $result && $x<=4; $x++) 
{
$gc=$nute[1][$x];
$gn=$nute[2][$x];
//echo ($x+1)."：".$gn."\n";
$url="https://qun.qq.com/cgi-bin/qiandao/sign/publish";
$post='bkn='.$get.'&template_data=&gallery_info={"category_id":2,"page":0,"pic_id":66}&template_id=5&gc='.$gc.'&client=2&lgt=0&lat=0&poi=陌辰·个性装扮&pic_id=&text='.$msg;
$cookie='uin=o'.$qq.'; skey='.$skey.'; p_uin=o'.$qq.'; p_skey='.$pskey.';';
$data=get_result($url,$post,$cookie);
preg_match_all('/"cgicode":(.*?),/',$data,$code);
$code=$code[1][0];
if($code=='0')
{
$txt=file_get_contents($qq.".txt");
$txta=($txt+1);
$myfile = fopen($qq.".txt", "w") or die("未知错误!");
fwrite($myfile,$txta);
fclose($myfile);
}
else
{
}
}
$txt=file_get_contents($qq.".txt");
$xtx=($result-$txt);
echo "签到成功，耗时8秒，本次成功签到".$txt."个群，剩余".$xtx."个群未签到！";
unlink($qq.".txt");
}

function get_result($url,$post,$cookie)
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
curl_setopt($ch, CURLOPT_POST, 1); 
curl_setopt($ch, CURLOPT_HEADER, 0); 
curl_setopt($ch, CURLOPT_POSTFIELDS, $post); 
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

function replace_unicode_escape_sequence($match) {
return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');
}

?>