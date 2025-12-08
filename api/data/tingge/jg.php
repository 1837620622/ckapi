<?php
header("Content-type: text/html; charset=utf-8");
$qq=$_GET['qq'];
$skey=$_GET['skey'];
$pskey=$_GET['pskey'];
$group=$_GET['group'];
$gtk=getGTK($skey);
$msg=$_GET['msg'];
$b=$_GET['n'];
$hh=$_GET['hh']?:"\n";//换行
$url="https://web.qun.qq.com/cgi-bin/media/search_music?t=0.6535849364849067&g_tk=".$gtk."&keyword=".$msg."&page=1&limit=30&gcode=".$group."&qua=V1_AND_SQ_8.4.8_1492_YYB_D&uin='.$qq.'&format=json&inCharset=utf-8&outCharset=utf-8";
$post="0";
$cookie="skey=".$skey."; uin=o".$qq."; p_uin=o".$qq."";
$data=get_result($url,$post,$cookie);
$result=preg_match_all("/{\"songid\":\"(.*?)\",\"name\":\"(.*?)\",\"sub_title\":\"(.*?)\",\"trans_name\":\"(.*?)\",\"albumid\":\"(.*?)\",\"album_name\":\"(.*?)\",\"singer_list\":\[{\"singerid\":\"(.*?)\",\"name\":\"(.*?)\"}\],\"pic\":\"(.*?)\",\"duration\":(.*?),/",$data,$nute);
if($b==null)
{
preg_match_all("/retcode\":(.*?)}/",$data,$retcode);
$retcode=$retcode[1][0];
if($retcode=="0")
{
for ($x=0; $x < $result && $x<=16; $x++) 
{
$aa=$nute[2][$x];
$bb=$nute[8][$x]."〗";
preg_match_all("/\"},{(.*?)〗/",$bb,$cc);
$cc=$cc[1][0];
$bc=str_replace('"},{'.$cc,'',$bb);
$bc=str_replace("〗",'',$bc);
echo ($x+1)."：".$aa."-".$bc."".$hh."";
}
echo "提示：添加歌曲+以上序号即可";
}
else
{
echo "搜索失败，请重试！";
}
}
else
if($b>10||$b<1)
{
echo "请按以上序号选择";
}
else
{
$b=$_GET['n'];
$b=($b-1);
$songid=$nute[1][$b];
$name=$nute[2][$b];
$list=$nute[8][$b];
$cover=$nute[9][$b];
$duration=$nute[10][$b];
$url="https://web.qun.qq.com/cgi-bin/media/oper_music?t=0.27844544816923666&g_tk=".$gtk;
$post='oper_type=1&song_list=[{"song_id":"'.$songid.'","name":"'.$name.'","sub_title":"","singer_list":["'.$list.'"],"cover":"'.$cover.'","duration":'.$duration.',"has_added":0}]&gcode='.$group.'&qua=V1_AND_SQ_8.4.8_1492_YYB_D&uin='.$qq.'&format=json&inCharset=utf-8&outCharset=utf-8';
$cookie='uin=o'.$qq.'; skey='.$skey.'; p_uin=o'.$qq.'';
$data=get_result($url,$post,$cookie);
preg_match_all("/retcode\":(.*?)}/",$data,$retcode);
$retcode=$retcode[1][0];
if($retcode=="0")
{
echo "已将歌曲[".$name."]加进歌单！";
}
else
if($retcode=="100001")
{
preg_match_all("/\"},{\"singerid\":\"(.*?)\",\"name\":\"/",$post,$aa1);
$aa1=$aa1[1][0];
$aa1=str_replace('"},{"singerid":"'.$aa1.'","name":"','ぎ', $post);

preg_match_all("/\"},{\"singerid\":\"(.*?)\",\"name\":\"/",$aa1,$aa2);
$aa2=$aa2[1][0];
$aa2=str_replace('"},{"singerid":"'.$aa2.'","name":"','ぎ', $aa1);

preg_match_all("/\"},{\"singerid\":\"(.*?)\",\"name\":\"/",$aa2,$aa3);
$aa3=$aa3[1][0];
$aa3=str_replace('"},{"singerid":"'.$aa3.'","name":"','ぎ', $aa2);

preg_match_all("/\"},{\"singerid\":\"(.*?)\",\"name\":\"/",$aa3,$aa4);
$aa4=$aa4[1][0];
$aa4=str_replace('"},{"singerid":"'.$aa4.'","name":"','ぎ', $aa3);

$aaa=str_replace('ぎ','","', $aa4);

preg_match_all("/\[\"(.*?)\"\]/",$aaa,$bbb);
$bbb=$bbb[1][0];
$bbb=str_replace('","','/', $bbb);
$ccc=str_replace('has_added":0}]','spanName":"<span style=\"color: #00cafc\">'.$name.'</span>","spanTitle":"","spanSinger":"'.$bbb.'","exactMatch":true}]', $aaa);

$url="http://web.qun.qq.com/cgi-bin/media/oper_music?t=0.27844544816923666&g_tk=".$gtk;
$post=$ccc;
$cookie='uin=o'.$qq.'; skey='.$skey.'; p_uin=o'.$qq.'';
$data=get_result($url,$post,$cookie);
preg_match_all("/retcode\":(.*?)}/",$data,$retcode);
$retcode=$retcode[1][0];
if($retcode=="0")
{
echo "已将歌曲[".$name."]加进歌单！";
}
else
if($retcode=="100001")
{
echo "添加失败，请重试！";
}
}
else
{
echo "添加失败，请重试！";
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