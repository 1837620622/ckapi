<?php
include("./API.php");
include("../tianyi.php");
tongji("text_wu");
$hh=$_GET["hh"]?:"\n";//换行符号(默认\n)
$url = file_get_contents("https://res.abeim.cn/api-text_wu?export=json");
$url = json_decode($url, true);
if($url["code"]==200){
echo "".$ming."API污句子".$hh."";
echo "━━━━━━━━━".$hh."";
echo "".$url["content"]."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
echo "".$ming."API污句子".$hh."";
echo "━━━━━━━━━".$hh."";
echo "本接口正在维护！".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
?>