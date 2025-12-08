<?php
header("Content-type:application/json;charset=utf-8");
$skey=$_GET["skey"];
$group=$_GET["group"];
$qq=$_GET["qq"];
$hh=$_GET['hh']?:"\n";//换行
$url="https://web.qun.qq.com/qunmusic/listener?uin={$group}&uinType=1&_wwv=128&_wv=2";
list($return_code, $return_content) = http_post_data($url);//return_code是http状态码
$result=preg_match_all("/{\"nick\":\"(.*?)\",\"uin\":(.*?),\"pic\":\"(.*?)\"}/",$return_content,$nute);
if($result==0){
echo "没有任何人听歌";
}
if($result!=0){
for ($x=0; $x < $result ; $x++) 
{
$aa=$nute[1][$x];
$bb=$nute[2][$x];
$bb=str_replace('","','/',$bb);
echo ($x+1)."：".$bb."".$hh."";
}
}
/*
$pst= json_decode($return_content);
$hw_id=$pst->retcode;
if($hw_id==0){
echo "关闭成功";
}else if($hw_id==100041){
echo "已经关闭";
}*/
function http_post_data($url) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	"Content-Type: application/x-www-form-urlencoded",
		"Content-Length: " . strlen($data_string),
		"Cookie: p_uin=o".$_GET["qq"]."; uin=o".$_GET["qq"]."; skey=".$_GET["skey"],
		"user-agent:Mozilla/5.0 (Linux; Android 10; MI 8 Lite Build/QKQ1.190910.002; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/89.0.4389.72 MQQBrowser/6.2 TBS/045806 Mobile Safari/537.36 V1_AND_SQ_8.8.0_1792_YYB_D A_8080010 QQ/8.8.0.5420 NetType/WIFI WebP/0.3.0 Pixel/1080 StatusBarHeight/82 SimpleUISwitch/0 QQTheme/1000 InMagicWin/0 StudyMode/0"
		));
	ob_start();
	curl_exec($ch);
	$return_content = ob_get_contents();
	ob_end_clean();
	$return_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	return array($return_code, $return_content);
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