<?php
include("./API.php");
tongji("qqnick");
$curl=curl_init();
curl_setopt($curl,CURLOPT_URL,'https://r.qzone.qq.com/fcg-bin/cgi_get_portrait.fcg?uins='.$_REQUEST["qq"]);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
curl_setopt($curl,CURLOPT_TIMEOUT,20);
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($curl,CURLOPT_SSL_VERIFYHOST, FALSE);
$result=curl_exec($curl);
curl_close($curl);
$name=explode(',',$result);
$name = trim(mb_convert_encoding($name[6],"UTF-8","GBK"),'"');
echo $name;
?>