<?php
header("Content-Type:text/html;charset=UTF-8");
include("./API.php");
include("../tianyi.php");
tongji("wdjqr");
$msg=$_GET['msg'];//需要陪聊的内容
$hh=$_GET['hh']?:"\n";//换行符号(默认\n)
if(!$msg){echo "".$ming."API茉莉机器人".$hh."━━━━━━━━━".$hh."msg 参数为空".$hh."━━━━━━━━━".$hh."Tips:".$ming."API技术支持";exit;}
$result = file_get_contents("http://i.itpk.cn/api.php?api_key=dd2e3cdd1b5a69d9b9dfa4d0443298d2&api_secret=y9lbpyk8qqgu&question=".$msg."");
echo "".$ming."API茉莉机器人".$hh."";
echo "━━━━━━━━━".$hh."";
echo "".$result."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
?>