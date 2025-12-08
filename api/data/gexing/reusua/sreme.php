<?php
$qq=$_GET['qq'];
$skey=$_GET['skey'];
$pskey=$_GET['pskey'];
$token=$_GET['token'];
$tid=$_GET['tid'];
$get=getGTK($skey);
$url="https://mobile.qzone.qq.com/operation/operation_add?qzonetoken=".$token."&g_tk=".$get;
$post='opr_type=delugc&res_type=311&res_id='.$tid.'&real_del=0&res_uin='.$qq.'&format=json';
$cookie='uin=o'.$qq.'; p_uin=o'.$qq.'; skey='.$skey.'; p_skey='.$pskey;
$data=get_result($url,$post,$cookie);
preg_match_all('/"code":(.*?),/',$data,$code);
$code=$code[1][0];
if($code=="0")
{
echo "删除说说成功!";
}
else
{
echo "删除说说失败!";
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