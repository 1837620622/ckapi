<?php
include("./API.php");
include("../tianyi.php");
tongji("fy");
$text=$_GET['text'];//需要翻译的内容
$hh=$_GET['hh']?:"\n";//换行符号(默认\n)
if(!$text){echo "".$ming."API万能翻译".$hh."━━━━━━━━━".$hh."text 参数为空".$hh."━━━━━━━━━".$hh."Tips:".$ming."API技术支持";exit;}
$url = file_get_contents("https://api.vvhan.com/api/fy?text=".$text."");
$url = json_decode($url, true);
if($url["success"]==true){
echo "".$ming."API万能翻译".$hh."";
echo "━━━━━━━━━".$hh."";
echo "翻译前：".$url["data"]["text"]."".$hh."";
echo "翻译后：".$url["data"]["fanyi"]."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
echo "".$ming."API万能翻译".$hh."";
echo "━━━━━━━━━".$hh."";
echo "本接口正在维护！".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
?>