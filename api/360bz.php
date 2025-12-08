<?php
include("./API.php");
include("../tianyi.php");
tongji("360bz");
$n=$_GET['n'];//壁纸类型，1为4K专区，2为美女模特，3为爱情美图，4为风景，5为小清新，6为动漫，7为明星，8为萌宠，9为游戏，10为汽车，11为炫酷，12为军事，13为劲爆，14为纹理，15为文字，16为限时。默认为动漫
$hh=$_GET['hh']?:"\n";//换行符号(默认\n)
$url = file_get_contents("http://lkaa.top/API/360bz/api.php?type=json&n=".$n."");
$url = json_decode($url, true);
if($url["code"]==1){
echo "".$ming."API♧360壁纸".$hh."";
echo "━━━━━━━━━".$hh."";
echo "±img=".$url["text"]."±".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
echo "".$ming."API♧360壁纸".$hh."";
echo "━━━━━━━━━".$hh."";
echo "本接口正在维护！".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
?>