<?php
$msg=$_GET['msg'];
$result=preg_match_all('/｛"(.*?)":"1"｝/',$msg,$nute);
if($result=='0')
{
echo "还没有任何人登陆哦！";
}
else
{
echo "---当前装扮用户---\n";
for ($x=0; $x < $result ; $x++) 
{
$qq=$nute[1][$x];
$url=file_get_contents("http://".$_SERVER['HTTP_HOST']."/api/data/gexing/ressut/qrlogin/log/qzone/".$qq.".txt");
$json=json_decode($url,true);
$name=$json['name'];
$uin=$json['uin'];
$skey=$json['skey'];
$get=getGTK($skey);
$url="https://pay.qun.qq.com/cgi-bin/group_pay/good_feeds/query_lucky_gift_history";
$post='bkn='.$get.'&bu_type=0&begin_index=0&end_index=19&del_expired_gift=1';
$cookie='uin=o'.$qq.'; skey='.$skey;
$data=get_result($url,$post,$cookie);
preg_match_all('/ec":(.*?),/',$data,$ec);
$statu=$ec[1][0];
if($statu=='0')
{
$status="在线";
}
else
{
$status="离线";
}
echo ($x+1).".".$name."[".$qq."]-[".$status."]\n";
}
echo "发送删数据+QQ可删除用户！";
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