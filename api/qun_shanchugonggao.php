<?php
header("Content-type: text/html; charset=utf-8");
include("./API.php");
include("../tianyi.php");
tongji("qun_shanchugonggao");
$qq=$_GET['qq'];//登录者的QQ号
$skey=$_GET['skey'];//登录者的skey
$group=$_GET['group'];//操作群号
$pskey=$_GET['pskey'];//登录者的pskey
$fid=$_GET['fid'];//公告的fid
$hh=$_GET['hh']?:"\n";//换行符号(默认\n)
$get=getGTK($skey);
$url="https://web.qun.qq.com/cgi-bin/announce/del_feed?bkn=".$get;
$post='bkn='.$get.'&fid='.$fid.'&qid='.$group;
$cookie='uin=o'.$qq.'; skey='.$skey.'; p_uin='.$qq.'; p_skey='.$pskey;
$data=get_result($url,$post,$cookie);
$json=json_decode($data,true);
if($json["ec"]=="0")
{
echo "".$ming."API♧QQ群删除群公告".$hh."";
echo "━━━━━━━━━".$hh."";
echo "成功删除公告".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
else
if($json["ec"]=="35")
{
echo "".$ming."API♧QQ群删除群公告".$hh."";
echo "━━━━━━━━━".$hh."";
echo "权限不足".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
echo "".$ming."API♧QQ群删除群公告".$hh."";
echo "━━━━━━━━━".$hh."";
echo "删除公告失败".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
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