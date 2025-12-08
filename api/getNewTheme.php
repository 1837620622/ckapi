<?php
header("Content-Type:text/html;charset=UTF-8");
include("./API.php");
include("../tianyi.php");
tongji("getNewTheme");
$hh=$_GET["hh"]?:"\n";//换行符号(默认\n)
$result=file_get_contents('http://rubaoo.com/DesolateV2/getNewTheme');
$json=json_decode($result,true);
$n=rand(0,10);
if($json["success"]==1){
echo "".$ming."API早安语录".$hh."";
echo "━━━━━━━━━".$hh."";
echo "±img=".$json["data"][$n]["picSrc"]."±".$hh."";
echo "".$json["data"][$n]["content"]."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
echo "".$ming."API早安语录".$hh."";
echo "━━━━━━━━━".$hh."";
echo "本接口正在维护！".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
?>