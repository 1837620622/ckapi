<?php
include("./API.php");
include("../tianyi.php");
tongji("duanzi");
$hh=$_GET["hh"]?:"\n";//换行符号(默认\n)
$html = file_get_contents("./data/wenben/duanzi.txt"); 
$result = preg_match_all('/"content":"(.*?)"/', $html, $arr);
if($result== 0){
echo "抱歉，出错了！";
}else{
$arrr=range(0,$result); 
shuffle($arrr); 
foreach($arrr as $values); 
echo "".$ming."API段子".$hh."";
echo "━━━━━━━━━".$hh."";
echo "".$arr[1][$values]."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
?>