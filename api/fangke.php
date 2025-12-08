<?php
include("./API.php");
include("../tianyi.php");
tongji("fangke");
$name = isset($_GET['qq']) ? urlencode($_GET['qq']) : '';//需要查询的QQ号
$hh=$_GET['hh']?:"\n";//换行符号(默认\n)
if(is_numeric($name)){
$data = file_get_contents("compress.zlib://http://h5.qzone.qq.com/p/r/cgi-bin/qzone_dynamic_v7.cgi?uin=".$name."&param=848&format=json");
preg_match_all('/"todaycount":(.*?),/',$data,$j);
$j=$j[1][0];
preg_match_all('/"totalcount":(.*?)}/',$data,$z);
$z=$z[1][0];
if($j== ""&&$z== ""){
echo "".$ming."API♧QQ空间访客查询".$hh."";
echo "━━━━━━━━━".$hh."";
echo "搜索不到与【".$name."】的相关信息，请稍后重试。".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
echo "".$ming."API♧QQ空间访客查询".$hh."";
echo "━━━━━━━━━".$hh."";
echo "QQ为：".$name."".$hh."";
echo "今日访客：".$j."".$hh."";
echo "空间总访客：".$z."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}}else{
echo "".$ming."API♧QQ空间访客查询".$hh."";
echo "━━━━━━━━━".$hh."";
echo "抱歉，您输入的不是数字。".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
?>