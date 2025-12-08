<?php
include("./API.php");
include("../tianyi.php");
tongji("chaliwu");
$qq=$_GET['qq'];//登录者的QQ号
$skey=$_GET['skey'];//登录者的skey
$hh=$_GET['hh']?:"\n";//换行符号(默认\n)
$get=getGTK($skey);
$url="https://pay.qun.qq.com/cgi-bin/group_pay/good_feeds/query_lucky_gift_history";
$post='bkn='.$get.'&bu_type=0&begin_index=0&end_index=19&del_expired_gift=1';
$cookie='uin=o'.$qq.'; skey='.$skey;
$data=get_result($url,$post,$cookie);
preg_match_all('/ec":(.*?),/',$data,$ec);
$ec=$ec[1][0];
if($ec=="1")
{
echo "".$ming."API♧QQ查礼物".$hh."";
echo "━━━━━━━━━".$hh."";
echo "查礼物失败，SKEY已失效！".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
$result=preg_match_all("/{\"discount\":(.*?),\"expired_time\":(.*?),\"name\":\"(.*?)\",\"pid\":(.*?),\"time\":(.*?),\"type\":(.*?),\"value\":(.*?)}/",$data,$nute);
if($result=="0")
{
echo "".$ming."API♧QQ查礼物".$hh."";
echo "━━━━━━━━━".$hh."";
echo "你当前没有礼物优惠券".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
echo "".$ming."API♧QQ查礼物".$hh."";
echo "━━━━━━━━━".$hh."";
for ($x=0; $x < $result && $x<=$result; $x++)
{
$jec=$nute[3][$x];//礼物名称
$je=$nute[4][$x];//礼物ID
echo ($x+1)."：".$jec."-[".$je."]".$hh."";
}
echo "你当前共有".$result."个礼物优惠券".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
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