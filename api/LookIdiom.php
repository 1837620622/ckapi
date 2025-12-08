<?php
include("./API.php");
include("../tianyi.php");
tongji("LookIdiom");
$hh=$_GET["hh"]?:"\n";//换行符号(默认\n)
$html = file_get_contents("./data/LookIdiom/LookIdiom.json"); 
$result = preg_match_all('/{"图片":"(.*?)","答案":"(.*?)"}/',$html,$arr);
if($result== 0){
echo "".$ming."API看图猜成语".$hh."";
echo "━━━━━━━━━".$hh."";
echo "抱歉，出错了！".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
$rand=rand(0,$result);
$arrr=range(0,$result); 
shuffle($arrr); 
foreach($arrr as $values); 
echo "".$ming."API看图猜成语".$hh."";
echo "━━━━━━━━━".$hh."";
echo "±img=http://".$_SERVER['HTTP_HOST']."/api/data/LookIdiom/img/".$arr[1][$values]."±".$hh."";
echo "答案：".$arr[2][$values]."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
?>