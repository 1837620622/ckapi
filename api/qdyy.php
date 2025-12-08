<?php
include("./API.php");
tongji("qdyy");
function jiequ($txt1,$q1,$h1)
{
 $txt1=strstr($txt1,$q1);
 $cd=strlen($q1);
 $txt1=substr($txt1,$cd);
 $txt1=strstr($txt1,$h1,"TRUE");
 return $txt1;
}
$zh=$_GET["msg"];//需要启动的应用名
$A= file_get_contents("http://m.app.so.com/search/index?q=$zh");
$AB=jiequ($A,"<li class=","data-asin");
$pk=jiequ($AB,"pname=","&id");
$ABC=jiequ($A,"<li class=\"","\" data-asin");
$aaa=jiequ($ABC,"data-href=\"","\" data-sid");
$tf = ("http://m.app.so.com".$aaa."");
$BBB= file_get_contents("".$tf."");
$bbb=jiequ($BBB,"<section class=","</div>");
$pp=jiequ($bbb,"<img src=\"","\">");
echo "<?xml version='1.0'?><msg flag='3' serviceID='1' action='app' actionData='$pk' brief='启动应用'><item layout='12'><picture cover='$pp' /><title>启动$zh</title></item><source name='' icon='' /></msg>";
?>