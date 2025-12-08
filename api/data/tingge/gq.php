<?php
header("Content-type: text/html; charset=utf-8");
$skey=$_GET["skey"];
$pskey=$_GET["pskey"];
$group=$_GET["group"];
$qq=$_GET["qq"];
$b=$_GET['n'];
$hh=$_GET['hh']?:"\n";//换行
$url="https://web.qun.qq.com/cgi-bin/media/get_music_list?t=0.23605343538908485&g_tk=".getGTK($skey)."&gcode={$group}&qua=V1_AND_SQ_8.4.8_1492_YYB_D&uin={$qq}&format=json&inCharset=utf-8&outCharset=utf-8";
$post="0";
$cookie="skey=".$skey."; uin=o".$qq."; p_uin=o".$qq."";
$data=get_result($url,$post,$cookie);
$result=preg_match_all("/{\"bytes_name\":\"(.*?)\",\"rpt_bytes_singer\":\[\"(.*?)\"\],\"bytes_sub_title\":\"(.*?)\",\"str_song_id\":\"(.*?)\",\"uint32_duration\":(.*?),\"bytes_cover\":\"(.*?)\"}/",$data,$nute);
if($b==null)
{
echo "歌曲列表".$hh."";
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
$url="https://web.qun.qq.com/cgi-bin/media/oper_music?t=0.4516524893332461&g_tk=".$gtk;
$post='oper_type=2&song_list=[{"song_id":"'.$cc.'","name":"'.$aa.'","sub_title":"","singer_list":["'.$bb.'"],"cover":"'.$ee.'","duration":'.$dd.',"current":0,"is_invalid":0,"can_delete":1}]&gcode='.$group.'&qua=V1_AND_SQ_8.3.0_1362_YYB_D&uin=551501951&format=json&inCharset=utf-8&outCharset=utf-8';
$data=get_result($url,$post,$cookie);
preg_match_all("/retcode\":(.*?)}/",$data,$retcode);
$retcode=$retcode[1][0];
if($retcode=="0")
{
echo "已将歌曲[".$aa."]从歌单删除！";
}
else
{
echo "删除失败，请重试！";
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