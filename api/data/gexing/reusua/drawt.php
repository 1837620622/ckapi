<?php
//抽礼物
$qq=$_GET['qq'];
$skey=$_GET['skey'];
$get=getGTK($skey);
$url="https://pay.qun.qq.com/cgi-bin/group_pay/good_feeds/draw_lucky_gift";
$post='bkn='.$get.'&from=0&gc=773404725&client=1&version=8.2.7.4410';
$cookie='uin=o'.$qq.'; skey='.$skey;
$data=get_result($url,$post,$cookie);
$data1=json_decode($data,true);   
$lucky=$data1["lucky_code"];//抽礼物状态
$giftname=$data1["name"];//礼物名
$ec=$data1["ec"];//抽礼物状态
$pid=$data1["pid"];//礼物图片

$expired_time=$data1["expired_time"];//礼物时间
$time=$data1["time"];//礼物时间
$expired_time=date('Y-m-d h:i:s',$expired_time);
$time=date('Y-m-d h:i:s',$time);
if($ec=="1")
{
echo "抽礼物失败，SKEY已失效!";
}
else
if($lucky=="7778")
{
echo "今天已经抽过礼物了，明天再来吧！";
}
else
if($lucky=="7779")
{
echo "群聊等级不足5级，无法抽取！";
}
else
if($giftname==null)
{
echo "你的运气不太好哦，没有抽到礼物。";
}
else
if($lucky=="8888")
{
echo "恭喜抽到礼物:".$giftname."";
echo "±img=http://pub.idqqimg.com/pc/misc/groupgift/objicon_".$pid.".png±";
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