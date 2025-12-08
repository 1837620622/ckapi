<?php
$qq=$_GET['qq'];
$skey=$_GET['skey'];
$pskey=$_GET['pskey'];
$token=$_GET['token'];
$get=getGTK($skey);
$url="https://mobile.qzone.qq.com/list?qzonetoken=".$token."&g_tk=".$get."&format=json&list_type=shuoshuo&action=0&res_uin=".$qq."&count=10";
$cookie='uin=o'.$qq.'; p_uin=o'.$qq.'; skey='.$skey.'; p_skey='.$pskey;
$data=get_result($url,$cookie);

preg_match_all('/"code":(.*?),/',$data,$code);
$code=$code[1][0];
if($code=="0")
{
$result=preg_match_all('/{"16":"2","18":"2","184":"(.*?)","19":"(.*?)","20":"(.*?)",/',$data,$nute);
if($result=="0")
{
echo "你还没发过说说哦!";
}
else
{
for ($x=0; $x < $result && $x<=2; $x++) 
{
$aa=$nute[1][$x];
$bb=$nute[3][$x];
echo ($x+1)."：".$aa."-[tid:".$bb."]\n";
}
echo "\n发送删除说说+tid即可删除！";
}
}
else
{
echo "获取说说列表失败!";
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