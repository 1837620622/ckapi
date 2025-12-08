<?php
include("./API.php");
include("../tianyi.php");
tongji("dog");
$msg=$_GET['msg'];//文章主题
$num=$_GET['num'];//字数
$hh=$_GET['hh']?:"\n";//换行符号(默认\n)
if(!$msg){echo "".$ming."API狗屁不通文章生成".$hh."━━━━━━━━━".$hh."msg 参数为空".$hh."━━━━━━━━━".$hh."Tips:".$ming."API技术支持";exit;}
if(!$num){echo "".$ming."API狗屁不通文章生成".$hh."━━━━━━━━━".$hh."num 参数为空".$hh."━━━━━━━━━".$hh."Tips:".$ming."API技术支持";exit;}
$url = file_get_contents("http://lkaa.top/API/dog/api.php?msg=".$msg."&num=".$num."&type=json");
$url = json_decode($url, true);
if($url["code"]==1){
echo "".$ming."API狗屁不通文章生成".$hh."";
echo "━━━━━━━━━".$hh."";
echo "".$url["text"]."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
echo "".$ming."API狗屁不通文章生成".$hh."";
echo "━━━━━━━━━".$hh."";
echo "本接口正在维护！".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
?>