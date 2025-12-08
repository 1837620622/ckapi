<?php
include("./API.php");
include("../tianyi.php");
tongji("name");
$msg=$_GET['msg'];//需要生成的名字
$hh=$_GET['hh']?:"\n";//换行符号(默认\n)
if(!$msg){echo "".$ming."API你是由什么组成的".$hh."━━━━━━━━━".$hh."msg 参数为空".$hh."━━━━━━━━━".$hh."Tips:".$ming."API技术支持";exit;}
$url = file_get_contents("http://lkaa.top/API/name/api.php?msg=".$msg."");
$url = json_decode($url, true);
if($url["code"]==1){
echo "".$ming."API你是由什么组成的".$hh."";
echo "━━━━━━━━━".$hh."";
echo "".$url["text"]."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
echo "".$ming."API你是由什么组成的".$hh."";
echo "━━━━━━━━━".$hh."";
echo "本接口正在维护！".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
?>