<?php
$qq=$_GET['qq'];
$skey=$_GET['skey'];
$uin=$_GET['uin'];
$group=$_GET['group'];
$get=getGTK($skey);
$gey=getGTK($pskey);
$url="http://pay.qun.qq.com/cgi-bin/group_pay/good_feeds/send_goods";
$post='instanceID=537064460&giftID=99&channel=1&goodsId=flower&count=3&from=999&toUin='.$uin.'&isCustom=1&rule=0&gc='.$group.'&_r=145&version=Android8.3.6.4590&bkn='.$get;
$cookie='uin=o'.$qq.'; skey='.$skey.';';
$data=get_result($url,$post,$cookie);
preg_match_all('/"ec":(.*?),/',$data,$ec);
$ec=$ec[1][0];
if($ec=="0")
{
echo "成功将3朵鲜花送给[".$uin."]！";
}
else
if($ec=="20000")
{
echo "你金豆不足，先领取再送吧！";
}
else
{
echo "送鲜花失败，请重试！";
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