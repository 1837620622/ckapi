<?php
include("./API.php");
include("../tianyi.php");
tongji("gc");
$msg = $_GET['msg'];//需要搜索的歌曲名
$b = $_GET['b'];//选择(序号)
$hh=$_GET['hh']?:"\n";//换行符号(默认\n)
$str = 'http://mobilecdn.kugou.com/api/v3/search/song?format=jsonp&keyword='.$msg.'&page=1&pagesize=400&showtype=1'; 
$str=file_get_contents($str);
$stre = "/songname_original\":\"(.*?)\",\"singername\":\"(.*?)\"(.*?)\"hash\":\"(.*?)\"/"; 
$result = preg_match_all($stre,$str,$trstr);
if($result== 0){
echo "".$ming."API酷狗歌词".$hh."";
echo "━━━━━━━━━".$hh."";
echo "搜索不到与".$_GET['msg']."的相关歌词，请稍后重试或换个关键词试试。".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
if($b== null){
echo "".$ming."API酷狗歌词".$hh."";
echo "━━━━━━━━━".$hh."";
for( $i = 0 ; $i < $result && $i < 10 ; $i ++ ){
$ga=$trstr[1][$i];//获取歌名
$gb=$trstr[2][$i];//获取歌手
echo ($i+1)."：".$ga."--".$gb."".$hh."";}
echo "共搜索到与".$_GET['msg']."的相关歌词$result 条，您可以点1～".$result."任一歌词。".$hh."";
echo "提示：发送以上序号选择，例：选酷狗歌词 1".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
$i=($b-1);
$hash=$trstr[4][$i];//320hash
if($hash== ""){
echo "".$ming."API酷狗歌词".$hh."";
echo "━━━━━━━━━".$hh."";
echo "抱歉，无此歌曲歌词。".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
$l="http://m.kugou.com/app/i/krc.php?cmd=100&hash=$hash&timelength=246000";
$str = file_get_contents($l);//
$str=myTrim($str);
$str=str_replace('[','<',$str);
$str=str_replace(']','>',$str);

$stre = '/<(.*?):(.*?).(.*?)>/';//<05:16.15>
$sj = preg_match_all($stre,$str,$trstr1);
$f=$trstr1[1][$sj-1];//时间分
$m=$trstr1[3][$sj-1];//时间秒
$str=str_replace(':','',$str);
//$str=str_replace('[','<',$str);
//$str=str_replace(']','>',$str);

$stre = '/<(.*?)>/';
$result = preg_match_all($stre,$str,$trstr);
echo "".$ming."API酷狗歌词".$hh."";
echo "━━━━━━━━━".$hh."";
for( $i = 13 ; $i < $result && $i < 10000 ; $i ++ ){
$ga=$trstr[1][$i];//获取歌名
$str=str_replace('<'.$ga.'>',''.$hh.'',$str);
}
echo strip_tags($str);

}
echo "总时长：".$f."分".$m."秒".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}}

function myTrim($str)
{
 $search = array(" ","　","".$hh."","\r","\t");
 $replace = array("","","","","");
 return str_replace($search, $replace, $str);
}

?>