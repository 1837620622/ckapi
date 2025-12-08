<?php
include("./API.php");
include("../tianyi.php");
tongji("meinv");
$a=$_GET[msg];//输(美女/粉色/清新/熊/可爱)
$hh=$_GET["hh"]?:"\n";//换行符号(默认\n)
$arr=range(0,2099);
shuffle($arr);
foreach($arr as $values)
$k = $values;
$str = 'http://service.picasso.adesk.com/v1/wallpaper/category/4e4d610cdf714d2966000000/wallpaper?limit=30&adult=false&first=1&order=hot&skip='.$k.''; 
$html=file_get_contents($str);
function replace_unicode_escape_sequence($match) {
  return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');}
$html = preg_replace_callback('/\\\\u([0-9a-f]{4})/i', 'replace_unicode_escape_sequence', $html);

//"tag": ["美女", "粉色", "清新", "熊", "可爱"], "rule": "?imageView2/3/h/$", "wp": "http://img0.adesk.com/wallpaper?imgid=58637db269401b34865f16a8"


//echo $values;
$result = preg_match_all('/"tag": \[(.*?)\], "rule": "(.*?)", "wp": "(.*?)"/',$html,$trstr);
$arr=range(0,$result); 
shuffle($arr); 
foreach($arr as $values);
$l = "".$trstr[1][$values]."";
$l=str_replace('", "','|',$l);
$l=str_replace('"','',$l);
if($a==1) {
echo "".$ming."API美女图片大全".$hh."";
echo "━━━━━━━━━".$hh."";
echo "±img=".$trstr[3][$values]."±".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
if($a==2){ 
echo "".$ming."API美女图片大全".$hh."";
echo "━━━━━━━━━".$hh."";
echo "±img=".$trstr[3][$values]."±".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
exit;
}else{
echo "".$ming."API美女图片大全".$hh."";
echo "━━━━━━━━━".$hh."";
echo "±img=".$trstr[3][$values]."±".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}}?>