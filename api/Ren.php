<?php
header("Content-Type:text/html;charset=UTF-8");
include("./API.php");
include("../tianyi.php");
tongji("Ren");
$name=$_GET['name'];//评定名字
$hh=$_GET['hh']?:"\n";//换行符号(默认\n)
if(!$name){echo "".$ming."API人品走势".$hh."━━━━━━━━━".$hh."name 参数为空".$hh."━━━━━━━━━".$hh."Tips:".$ming."API技术支持";exit;}
$result = file_get_contents("http://".$_SERVER['HTTP_HOST']."/api/data/Ren/api.php?name=".$name."");
$url = json_decode($result, true);
if($_GET['type']=="json"){
echo "".$result."";
exit;}
if($url["code"]==1){
echo "".$ming."API人品走势".$hh."";
echo "━━━━━━━━━".$hh."";
echo "".$url["text"]."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
echo "".$ming."API人品走势".$hh."";
echo "━━━━━━━━━".$hh."";
echo "本接口正在维护！".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
?>