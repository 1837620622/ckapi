<?php
header("Content-Type:text/html;charset=UTF-8");
include("./API.php");
include("../tianyi.php");
tongji("BrainTwister");
$hh=$_GET["hh"]?:"\n";//换行符号(默认\n)
$url = file_get_contents("http://yingy.20wl.co/Api/php/BrainTwister.php");
$url = json_decode($url, true);
if($url["code"]==200){
echo "".$ming."API脑筋急转弯".$hh."";
echo "━━━━━━━━━".$hh."";
echo "问题：".$url["question"]."".$hh."";
echo "答案：".$url["Answer"]."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
echo "".$ming."API脑筋急转弯".$hh."";
echo "━━━━━━━━━".$hh."";
echo "本接口正在维护！".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
?>