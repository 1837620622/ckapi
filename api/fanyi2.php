<?php
include("./API.php");
include("../tianyi.php");
tongji("fanyi2");
$hh=$_GET["hh"]?:"\n";//换行符号(默认\n)
$url = "https://wxapp.translator.qq.com/api/translate?sourceText=".urlencode($_GET["msg"])."&source=auto&target=auto&platform=MQQAPP&candidateLangs=zh%7Cen&guid=wxapp_openid_1576171882_ptxba365xp";
$rst= get_curl($url,0);
$nr1 = '/"targetText":"(.*?)"/';
preg_match_all($nr1,$rst,$nr1);
echo "".$ming."API语言翻译".$hh."";
echo "━━━━━━━━━".$hh."";
echo "内容：".$_GET['msg']."".$hh."";
echo "结果：".$nr1[1][0]."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";

function get_curl($url,$post=0,$referer=1,$cookie=0,$header=0,$ua=1,$nobaody=0,$json=0){
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
$httpheader[] = "Accept:application/json";
$httpheader[] = "Accept-Encoding:gzip,deflate,sdch";
$httpheader[] = "Accept-Language:zh-CN,zh;q=0.8";
$httpheader[] = "Connection:close";
if($json){
$httpheader[] = "Content-Type:application/json; charset=utf-8";}
curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
if($post){
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);}
if($header){
curl_setopt($ch, CURLOPT_HEADER, TRUE);}
if($cookie){
curl_setopt($ch, CURLOPT_COOKIE, $cookie);}
if($referer){
if($referer==1){
curl_setopt($ch, CURLOPT_REFERER, 'http://m.qzone.com/infocenter?g_f=');
}else{
curl_setopt($ch, CURLOPT_REFERER, $referer);
}}
if($ua){
curl_setopt($ch, CURLOPT_USERAGENT,$ua);
}else{
curl_setopt($ch, CURLOPT_USERAGENT,'Dalvik/2.1.0 (Linux; U; Android 9; 16s Build/PKQ1.190202.001)');}
if($nobaody){
curl_setopt($ch, CURLOPT_NOBODY,1);}
curl_setopt($ch, CURLOPT_TIMEOUT, 5);
curl_setopt($ch, CURLOPT_ENCODING, "gzip");
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
$ret = curl_exec($ch);
curl_close($ch);
return $ret;}

?>