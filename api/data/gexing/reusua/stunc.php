<?php
$qq=$_GET['qq'];
$skey=$_GET['skey'];
$get=getGTK($skey);
$url="https://yundong.qq.com/cgi/common_daka_tcp?g_tk=".$get;
$steps = rand(11111,99999);
$timestamp = time();
$params = '{"reqtype":11,"mbtodayStep":'.$steps.',"todayStep":'.$steps.',"timestamp":'.$timestamp.'}';
$post = 'params='.urlencode($params).'&l5apiKey=daka.server&dcapiKey=daka_tcp';
$cookie='uin=o'.$qq.'; skey='.$skey;
$data=get_result($url,$post,$cookie);
$arr=json_decode($data, true);
if($arr['code']==0)
{
echo 'QQ运动打卡成功！QQ成长值+0.2天';
}
else
if($arr['code']==-10001)
{
echo '今天步数未达到打卡门槛，再接再厉！';
}
else
if($arr['code']==-10003)
{
echo '今天已经打过卡了，明天再来吧！';
}
else
{
echo 'QQ运动打卡失败！';
}


function get_result($url,$post,$cookie)
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