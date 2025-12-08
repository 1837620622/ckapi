<?php
header("Content-type: text/html; charset=utf-8");
$qq=$_GET['qq'];
$skey=$_GET['skey'];
$group=$_GET['group'];
$gtk=getGTK($skey);
$msg=$_GET['msg'];
$b=$_GET['n'];
$hh=$_GET['hh']?:"\n";//换行
$url="https://web.qun.qq.com/cgi-bin/media/get_music_list?t=0.23605343538908485&g_tk=".$gtk."&gcode=".$group."&qua=V1_AND_SQ_8.4.8_1492_YYB_D&uin=".$qq."&format=json&inCharset=utf-8&outCharset=utf-8";
$post="0";
$cookie="skey=".$skey."; uin=o".$qq."; p_uin=o".$qq."";
$data=get_result($url,$post,$cookie);
$result=preg_match_all("/{\"bytes_name\":\"(.*?)\",\"rpt_bytes_singer\":\[\"(.*?)\"\],\"bytes_sub_title\":\"(.*?)\",\"str_song_id\":\"(.*?)\",\"uint32_duration\":(.*?),\"bytes_cover\":\"(.*?)\"}/",$data,$nute);
if($b==null)
{
for ($x=0; $x < $result ; $x++) 
{
$aa=$nute[1][$x];
$bb=$nute[2][$x];
$bb=str_replace('","','/',$bb);
echo ($x+1)."：".$aa."-".$bb."".$hh."";
}
}
else
if($b>$result||$b<1)
{
echo "请按以上序号选择";
}
else
{
$b=$_GET['n'];
$b=($b-1);
$aa=$nute[1][$b];
$bb=$nute[2][$b];
$cc=$nute[4][$b];
$dd=$nute[5][$b];
$ee=$nute[6][$b];
$url="https://web.qun.qq.com/cgi-bin/media/play_next_song?t=0.5211076363362979&g_tk=".$gtk."&song_id=".$cc."&gcode=".$group."&qua=V1_AND_SQ_8.4.8_1492_YYB_D&uin=".$qq."&format=json&inCharset=utf-8&outCharset=utf-8";
$post='0';
$cookie='uin=o'.$qq.'; skey='.$skey.'; p_uin=o'.$qq.'';
$data=get_result($url,$post,$cookie);
preg_match_all("/retcode\":(.*?)}/",$data,$retcode);
$retcode=$retcode[1][0];
if($retcode=="0")
{
echo "已切换歌曲[".$aa."]";
}
else
{
echo "切换失败，请重试!";
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