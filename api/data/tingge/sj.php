<?php
header("Content-type:application/json;charset=utf-8");
$skey=$_GET["skey"];
$group=$_GET["group"];
$qq=$_GET["qq"];
$n=$_GET["n"];
$url="https://web.qun.qq.com/cgi-bin/media/set_play_mode?t=0.7881741714474337&g_tk=&play_mode={$n}&gcode={$group}&qua=V1_AND_SQ_8.4.8_1492_YYB_D&uin={$qq}&format=json&inCharset=utf-8&outCharset=utf-8";
list($return_code, $return_content) = http_post_data($url);//return_code是http状态码
$pst= json_decode($return_content);
$hw_id=$pst->retcode;
if($hw_id==0){
echo "开启成功";
}else
if($hw_id==100001){
echo "参数错误";
}
function http_post_data($url) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	"Content-Type: application/x-www-form-urlencoded",
		"Content-Length: " . strlen($data_string),
		"Cookie: p_uin=o".$_GET["qq"]."; uin=o".$_GET["qq"]."; skey=".$_GET["skey"]
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