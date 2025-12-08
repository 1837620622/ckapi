<?php
header("Content-Type:text/html;charset=UTF-8");
include("./API.php");
include("../tianyi.php");
tongji("quarkai");
$question=$_GET['question'];//聊天内容
$hh=$_GET['hh']?:"\n";//换行符号(默认\n)
if(!$question){echo "".$ming."API夸克AI".$hh."━━━━━━━━━".$hh."question 参数为空".$hh."━━━━━━━━━".$hh."Tips:".$ming."API技术支持";exit;}
$url = file_get_contents("http://yingy.20wl.co/Api/php/QuarkAi.php?query=".$question."");
$url = json_decode($url, true);
if($url["code"]==200){
echo "".$ming."API夸克AI".$hh."";
echo "━━━━━━━━━".$hh."";
echo "".$url["text"]."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
echo "".$ming."API夸克AI".$hh."";
echo "━━━━━━━━━".$hh."";
echo "本接口正在维护！".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
?>