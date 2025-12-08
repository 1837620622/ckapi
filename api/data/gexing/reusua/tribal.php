<?php
$qq=$_GET['qq'];
$skey=$_GET['skey'];
$pskey=$_GET['pskey'];
$token=$_GET['token'];
$tid=$_GET['tid'];
$get=getGTK($skey);

$url='https://buluo.qq.com/cgi-bin/bar/card/bar_list_by_page?neednum=10&startnum=0&uin='.$qq.'&target_uid=undefined&r=0.5655405347330855';
$post='';
$cookie='uin=o'.$qq.'; p_uin=o'.$qq.'; skey='.$skey.'; p_skey='.$pskey;
$referer='https://buluo.qq.com/mobile/my_follow_bar.html?uin=551501951&enc_uin=undefined&_wwv=1024&_wv=1027&webview=1';
$data=get_result($url,$post,$cookie,$referer);
preg_match_all('/retcode":(.*?),/',$data,$retcode);
$retcode=$retcode[1][0];
if($retcode!='0'){
echo "部落签到失败，请重新!";
}else{
$result = preg_match_all('/"rpids":(.*?),"name":"(.*?)","bid":(.*?),/',$data,$nute);
if($result=='0'){
echo "你当前没有关注任何部落，无法签到！";
}else{
for ($x=0; $x < $result; $x++) 
{
$name=$nute[2][$x];
$bid=$nute[3][$x];
$url='https://buluo.qq.com//cgi-bin/bar/user/sign';
$post='bid='.$bid.'&r=0.4389023609745255';
$cookie='uin=o'.$qq.'; p_uin=o'.$qq.'; skey='.$skey.'; p_skey='.$pskey;
$referer='https://buluo.qq.com/mobile/sign_calendar.html?from=tribe_hp&bid=360230&_wwv=1024&_wv=1027&webview=1';
$data=get_result($url,$post,$cookie,$referer);
preg_match_all('/new_level":(.*?),/',$data,$level);
$level=$level[1][0];
preg_match_all('/level_title":"(.*?)"/',$data,$title);
$title=$title[1][0];
if($level=='0'){
$uon="签到成功";
}else
{
$uon="签到失败";
}
echo $name."[".$title."]-".$uon."\n";
}
echo "注意：签到失败可能今天已经签到过了";
}
}


function get_result($url,$post,$cookie,$referer)
{
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
$header = array(
'User-Agent: Mozilla/5.0 (Linux; Android 6.0.1; vivo Y55L Build/MMB29M; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/66.0.3359.126 MQQBrowser/6.2 TBS/045140 Mobile Safari/537.36 V1_AND_SQ_8.3.5_1392_YYB_D QQ/8.3.5.4555 NetType/WIFI WebP/0.3.0 Pixel/720 StatusBarHeight/48 SimpleUISwitch/0 QQTheme/1000',
'Referer: '.$referer,
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

?>