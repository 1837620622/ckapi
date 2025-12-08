<?php
include("./API.php");
include("../tianyi.php");
tongji("shouji");
$hh=$_GET["hh"]?:"\n";//换行符号(默认\n)
$html = file_get_contents("./data/wenben/miyu.txt"); 
$result = preg_match_all('/topic":"(.*?)",answer":"(.*?)",type":"(.*?)",ps":"(.*?)"/', $html, $arr);
if($result== 0){
echo "".$ming."API随机谜语".$hh."";
echo "━━━━━━━━━".$hh."";
echo "抱歉，出错了！".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
$arrr=range(0,$result); 
shuffle($arrr); 
foreach($arrr as $values); 
echo "".$ming."API随机谜语".$hh."";
echo "━━━━━━━━━".$hh."";
echo "谜题：".$arr[1][$values]."".$hh."";
echo "谜底：".$arr[2][$values]."".$hh."";
echo "类型：".$arr[3][$values]."".$hh."";
echo "提示：".$arr[4][$values]."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
?>