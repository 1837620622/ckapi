<?php
$qq=$_GET['qq'];
$skey=$_GET['skey'];
$get=getGTK($skey);
$timy=date("Y");
$timm=date("m");
$timm=str_replace("01", "1",$timm);
$timm=str_replace("02", "2",$timm);
$timm=str_replace("03", "3",$timm);
$timm=str_replace("04", "4",$timm);
$timm=str_replace("05", "5",$timm);
$timm=str_replace("06", "6",$timm);
$timm=str_replace("07", "7",$timm);
$timm=str_replace("08", "8",$timm);
$timm=str_replace("09", "9",$timm);
$timm=str_replace("10", "10",$timm);
$timm=str_replace("11", "11",$timm);
$timm=str_replace("12", "12",$timm);
$url="https://proxy.vac.qq.com/cgi-bin/srfentry.fcgi?ts=1584749452821&g_tk=".$get;
$post='{"13357":{"month":'.$timm.',"pageIndex":1,"pageSize":20,"sUin":"'.$qq.'","year":'.$timy.'}}';
$cookie='uin=o'.$qq.'; skey='.$skey;
$data=get_result($url,$post,$cookie);
preg_match_all("/ret\":(.*?),/",$data,$nut);
$nut=$nut[1][0];
if($nut=="0")
{
$result = preg_match_all('/{"actid":(.*?),"actname":"(.*?)","acttime":(.*?),"errMsg":"(.*?)","finaladd":(.*?),"/',$data,$nute);
echo "---成长值记录---\n";
for ($x=0; $x<$result && $x<=4; $x++) 
{
$aa=$nute[3][$x];
$bb=$nute[2][$x];
$cc=$nute[5][$x];
$aa=date('Y-m-d H:i:s',$aa);

if($cc<"0")
{
$dd=$cc;
}
else
{
$dd="+".$cc;
}

echo "日期:".$aa."\n";
echo "事件:".$bb."\n";
echo "成长值:".$dd."\n";
echo "----------\n";
}
echo "用户:".$qq;
}
else
{
echo "查询失败，请重试!";
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