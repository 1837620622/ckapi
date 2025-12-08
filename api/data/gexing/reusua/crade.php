<?php
$qq=$_GET['qq'];
$skey=$_GET['skey'];
$get=getGTK($skey);
$url="https://h5.vip.qq.com/p/mc/card/grow?pvsrc=2&_wvx=2";
$cookie='uin=o'.$qq.'; skey='.$skey.';';
$data=get_result($url,$cookie);
preg_match_all('/QQ等级<span class="level-num">(.*?)<\/span>/',$data,$LV);
preg_match_all('/"iTotalActiveDay":"(.*?)","/',$data,$Day);
preg_match_all('/（正常速度<em>(.*?)<\/em>天后升级）/',$data,$qn);
preg_match_all('/加速度预计<em>(.*?)<\/em>天升级/',$data,$qx);
preg_match_all('/"iRealDays":"(.*?)"/',$data,$qs);
preg_match_all('/<span class="integer-num" id="speedBig">(.*?)<\/span>/',$data,$qa);
preg_match_all('/<span class="decimal-num" id="speedDecimal">(.*?)<\/span>/',$data,$qb);
$LV=$LV[1][0];
$Day=$Day[1][0];
$qn=$qn[1][0];
$qx=$qx[1][0];
$qs=$qs[1][0];
$qa=$qa[1][0];
$qb=$qb[1][0];
if($LV==''||$LV==null)
{
echo "查询失败，请重试!";
}
else
{
preg_match_all('/<li class="ui-border-b (.*?)hrefbutton"/',$data,$uan);
$uan1=$uan[1][0];
$uan1=str_replace(" ",'',$uan1);
if($uan1=='done'){
$uan1="√";
}else{
$uan1="×";
}

$uan2=$uan[1][1];
$uan2=str_replace(" ",'',$uan2);
if($uan2=='done'){
$uan2="√";
}else{
$uan2="×";
}

$uan3=$uan[1][2];
$uan3=str_replace(" ",'',$uan3);
if($uan3=='done'){
$uan3="√";
}else{
$uan3="×";
}

$uan4=$uan[1][3];
$uan4=str_replace(" ",'',$uan4);
if($uan4=='done'){
$uan4="√";
}else{
$uan4="×";
}

$uan5=$uan[1][4];
$uan5=str_replace(" ",'',$uan5);
if($uan5=='done'){
$uan5="√";
}else{
$uan5="×";
}

$uan6=$uan[1][5];
$uan6=str_replace(" ",'',$uan6);
if($uan6=='done'){
$uan6="√";
}else{
$uan6="×";
}

$uan7=$uan[1][6];
$uan7=str_replace(" ",'',$uan7);
if($uan7=='done'){
$uan7="√";
}else{
$uan7="×";
}

$uan8=$uan[1][7];
$uan8=str_replace(" ",'',$uan8);
if($uan8=='done'){
$uan8="√";
}else{
$uan8="×";
}

$uan9=$uan[1][8];
$uan9=str_replace(" ",'',$uan9);
if($uan9=='done'){
$uan9="√";
}else{
$uan9="×";
}




$url="https://h5.vip.qq.com/p/mc/cardv2/other?_wv=1031&platform=1&qq=".$qq."&adtag=qun&aid=mvip.pingtai.mobileqq.androidziliaoka.fromqqqun";
$cookie='uin=o'.$qq.'; skey='.$skey.';';
$data=get_result($url,$cookie);
preg_match_all("/<small>(.*?)<\/small>/",$data,$sma);
$sma=$sma[1][4];
preg_match_all("/<p>(.*?)<\/p>/",$data,$lp);
$lp=$lp[1][4];

preg_match_all('/<p class="info-name"><span class="ui-nowrap">(.*?)</',$data,$name);
$name=$name[1][0];

$lp=substr($lp,0,strlen($lp)-1);
if($sma=="普通用户")
{
$id="普通";
}
else
if($lp=="vip"||$lp=="VIP")
{
$id="VIP";
}
else
if($lp=="SVIP"||$lp=="svip")
{
$id="SVIP";
}










echo $id."用户:".$name."[".$qq."]\n";
echo "QQ等级:".$LV."\n";
echo "活跃天数:".$Day."\n";
echo "正常升级:".$qn."天\n";
echo "升级天数:".$qx."天\n";
echo "等级加速:".$qa.".".$qb."倍\n";
echo "今日成长:".$qs."天\n";
echo "手机加速+1.0天「".$uan1."」\n";
echo "电脑加速+0.5天「".$uan2."」\n";
echo "访客加速+0.5天「".$uan3."」\n";
echo "在线加速+0.2天「".$uan4."」\n";
echo "勋章加速+0.2天「".$uan5."」\n";
echo "微视加速+0.5天「".$uan6."」\n";
echo "管家加速+0.2天「".$uan7."」\n";
echo "游戏加速+0.2天「".$uan8."」\n";
echo "步行加速+0.2天「".$uan9."」";

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