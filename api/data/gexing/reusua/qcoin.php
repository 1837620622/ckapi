<?php
header("Content-type: text/html; charset=utf-8");
$qq=$_GET['qq'];
$skey=$_GET['skey'];
$pskey=$_GET['pskey'];
$get=getGTK($pskey);

$url=file_get_contents("http://api.unipay.qq.com/v1/r/1450000186/wechat_query?cmd=4&pf=vip_m-pay_html5-html5&pfkey=pfkey&from_h5=1&from_https=1&format=jsonp__getQBBalance&openid=".$qq."&openkey=".$skey."&session_id=uin&session_type=skey");
preg_match_all('/"ret" : (.*?),/',$url,$ret);
$ret=$ret[1][0];
preg_match_all('/"qb_balance" : (.*?),/',$url,$qb_balance);
$qb_balance=$qb_balance[1][0];
$qb_balance=($qb_balance/100);
$url=file_get_contents("https://myun.tenpay.com/cgi-bin/clientv1.0/cancel_query.cgi?uin=".$qq."&skey=".$skey."&skey_type=2&_=1589172571426");
preg_match_all('/balance":"(.*?)"/',$url,$balance);
$balance=$balance[1][0];
$balance=($balance/100);
if($ret=="0")
{
echo "可用余额:".$balance."元\n";
echo "可用Q币:".$qb_balance."个";
}
else
{
echo "查看失败，请重试!";
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