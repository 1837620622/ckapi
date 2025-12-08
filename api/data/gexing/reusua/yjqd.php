<?php
$qq=$_REQUEST["qq"];
$skey=$_REQUEST["skey"];
$p_skey=$_REQUEST["p_skey"];
$curl=curl_init();
curl_setopt($curl,CURLOPT_URL,"http://xiaojieapi.cn/API/Signin.php?qq=".$qq."&skey=".$skey."&p_skey=".$p_skey);
curl_setopt($curl,CURLOPT_TIMEOUT,30);
curl_setopt($curl,CURLOPT_FOLLOWLOCATION,1);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($curl,CURLOPT_SSL_VERIFYHOST, FALSE);
curl_setopt($curl,CURLOPT_ENCODING,'gzip,deflate');
$return=curl_exec($curl);
curl_close($curl);
$data_json=json_decode($return,true);
if($data_json["code"]!=1000){
echo $data["text"];
exit();
}
print_r($data_json);
?>