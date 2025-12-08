<?php
include("./API.php");
include("../tianyi.php");
tongji("yyb");
$name = urlencode($_GET[msg]);//需要搜索的应用名
$b = urlencode($_GET[b]);//选择(序号)
$hh=$_GET["hh"]?:"\n";//换行符号(默认\n)
$str = file_get_contents("compress.zlib://http://mapp.qzone.qq.com/cgi-bin/mapp/mapp_search_result?keyword=$name");
$stre = '/iconUrl":"(.*?)"(.*?)name":"(.*?)","pName":"(.*?)","prelen":(.*?),"shortDes":"(.*?)","size":"(.*?)","sourcetype":(.*?)"url":"(.*?)","userCount":(.*?),"versionCode":(.*?),"versionName":"(.*?)"/'; 
$result = preg_match_all($stre,$str,$trstr);if($result== 0){
echo "".$ming."API应用宝".$hh."";
echo "━━━━━━━━━".$hh."";
echo "搜索不到与".$_GET[msg]."的相关应用，请稍后重试或换个关键词试试。".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
if($b== null){
echo "".$ming."API应用宝".$hh."";
echo "━━━━━━━━━".$hh."";
for( $i = 0 ; $i < $result && $i < 7 ; $i ++ ){
$a=$trstr[3][$i];
$c=$trstr[7][$i];
$b=$trstr[10][$i];
echo ($i+1)."：".$a."   下载次数：".$b."   大小：".$c."\r\r";
}echo "共搜索到与".$_GET[msg]."的相关软件$result 条，您可以点1～".$result."任一软件。".$hh."";
echo "提示：发送以上序号选择，例：选应用宝 1".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
$i=($b-1);
$t=$trstr[1][$i];
$a=$trstr[3][$i];
$d=$trstr[6][$i];
$c=$trstr[7][$i];
$e=$trstr[9][$i];
$b=$trstr[10][$i];
$f=$trstr[12][$i];
if(!$e == ' '){
die (''.$ming.'API应用宝'.$hh.'━━━━━━━━━'.$hh.'抱歉，出错了！'.$hh.'━━━━━━━━━'.$hh.'Tips:'.$ming.'API技术支持');}
echo "".$ming."API应用宝".$hh."";
echo "━━━━━━━━━".$hh."";
echo "±img=".$t."±".$hh."";
echo "名称：".$a."".$hh."";
echo "类型：".$d."".$hh."";
echo "已更新至：".$f."".$hh."";
echo "下载次数：".$b."".$hh."";
echo "大小：".$c."".$hh."";
echo "点击链接：".$e."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}}?>