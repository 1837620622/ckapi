<?php
$qq=$_GET['qq'];
$skey=$_GET['skey'];
$pskey=$_GET['pskey'];
$get=getGTK($pskey);
$url='https://club.vip.qq.com/visitor/visit-who2?g_tk='.$get.'&page=';
$cookie='uin=o'.$qq.'; skey='.$skey.'; p_uin=o'.$qq.'; p_skey='.$pskey.';';
$data=get_result($url,$cookie);
preg_match_all('/newVisitorCnt":(.*?),/',$data,$Cnt);
$Cnt=$Cnt[1][0];
if($Cnt=="0")
{
preg_match_all('/totalLikeNum":(.*?),/',$data,$Num);
$Num=$Num[1][0];
preg_match_all('/twoReqDiffLikeNum":(.*?),/',$data,$two);
$two=$two[1][0];
echo "总名片赞：".$Num."个\n";
echo "今天获得：".$two."个\n";
echo "=================\n";

$url="https://club.vip.qq.com/visitor/index?_wv=4099&_nav_bgclr=ffffff&_nav_titleclr=ffffff&_nav_txtclr=ffffff&_nav_alpha=0";
$cookie='uin=o'.$qq.'; skey='.$skey.'; p_uin=o'.$qq.'; p_skey='.$pskey.';';
$data=get_result($url,$cookie);
$result=preg_match_all('/"uin":(.*?),"nick":"(.*?)","vtime":(.*?),"subContent":"(.*?)"/',$data,$nute);
for ($x=0; $x < $result  && $x<=4; $x++) 
{
$aa=$nute[2][$x];
$bb=$nute[3][$x];
$bb=date('Y-m-d h:i:s',$bb);
$cc=$nute[4][$x];
echo ($x+1)."：".$aa."-".$cc."(".$bb.")\n";
}
echo "=================";
}
else
{
echo "查看名片赞失败，请重试!";
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