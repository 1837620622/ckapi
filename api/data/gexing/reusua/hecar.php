<?php
$qq=$_GET['qq'];
$skey=$_GET['skey'];
$get=getGTK($skey);
$url='http://ti.qq.com/hybrid-h5/api/json/daily_attendance/MyCardFolderList?count=10000&traceInfo=0&uin='.$qq;
$cookie='uin=o'.$qq.'; skey='.$skey;
$data=get_result($url,$cookie);
preg_match_all('/ret":(.*?),/',$data,$ret);
$ret=$ret[1][0];
if($ret=='0')
{
$result=preg_match_all('/folderName":"(.*?)","coverUrl":"(.*?)","doc":"(.*?)"/',$data,$nute);
if($result=='0')
{
echo "你还没有卡片哦!";
}
else
{
for ($x=0; $x < $result ; $x++) 
{
$aa=$nute[1][$x];
$bb=$nute[3][$x];
echo ($x+1)."：".$aa."-".$bb."\n";
}
echo "提示：以上是你卡片的数量";
}
}
else
{
echo "查看卡片失败，请重试!";
}



function get_result($url,$cookie)
{
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
$header = array(
'User-Agent: Mozilla/5.0 (Linux; Android 6.0.1; vivo Y55L Build/MMB29M; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/66.0.3359.126 MQQBrowser/6.2 TBS/045140 Mobile Safari/537.36 V1_AND_SQ_8.3.5_1392_YYB_D QQ/8.3.5.4555 NetType/WIFI WebP/0.3.0 Pixel/720 StatusBarHeight/48 SimpleUISwitch/0 QQTheme/1000',
'Referer: https://h5.qzone.qq.com/mqzone/profile?starttime=1589077456512&hostuin=551501951',
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