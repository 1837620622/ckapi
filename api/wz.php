<?php
include("./API.php");
include("../tianyi.php");
tongji("wz");
$url=$_GET["url"];//需要查询的链接
$hh=$_GET["hh"]?:"\n";//换行符号(默认\n)
$curl=curl_init();
curl_setopt($curl,CURLOPT_URL,"https://api.66mz8.com/api/url.title.php?url=$url");
curl_setopt($curl,CURLOPT_TIMEOUT,30);
curl_setopt($curl,CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($curl,CURLOPT_SSL_VERIFYHOST, FALSE);
$return=curl_exec($curl);
curl_close($curl);
$return=json_decode($return,true);
if($return["code"]==200){
echo "".$ming."API网站描述".$hh."";
echo "━━━━━━━━━".$hh."";
echo "网址:".$return["site"]."".$hh."";
echo "标题:".$return["title"]."".$hh."";
echo "关键词:".$return["keywords"]."".$hh."";
echo "描述:".$return["description"]."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
echo "".$ming."API网站描述".$hh."";
echo "━━━━━━━━━".$hh."";
echo "本接口正在维护！".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
?>