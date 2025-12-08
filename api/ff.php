<?php
header("Content-Type:text/html;charset=UTF-8");
include("./API.php");
include("../tianyi.php");
tongji("ff");
$msg=$_GET['msg'];//需要陪聊的内容
$hh=$_GET['hh']?:"\n";//换行符号(默认\n)
if(!$msg){echo "".$ming."API菲菲机器人".$hh."━━━━━━━━━".$hh."msg 参数为空".$hh."━━━━━━━━━".$hh."Tips:".$ming."API技术支持";exit;}
$url = file_get_contents("http://api.qingyunke.com/api.php?key=free&appid=0&msg=".$msg."");
$B=str_replace("{br}","".$hh."","$url");
$url=json_decode($B, true);
if($url["result"]==0){
echo "".$ming."API菲菲机器人".$hh."";
echo "━━━━━━━━━".$hh."";
echo "".$url["content"]."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
echo "".$ming."API菲菲机器人".$hh."";
echo "━━━━━━━━━".$hh."";
echo "本接口正在维护！".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
?>