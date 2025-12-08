<?php
header("Content-type: text/html; charset=UTF-8");
include("./API.php");
include("../tianyi.php");
tongji("jingxuanshipin");
$name=$_GET["type"];//输(网红、明星、热舞、风景、游戏、动物)
$hh=$_GET["hh"]?:"\n";//换行符号(默认\n)
$array=array("网红" => "5930e061e7bce72ce01371ae",
"明星" => "5930e046e7bce72ce013719c",
"热舞" => "5930e081e7bce72ce01371c8",
"风景" => "5930e16ee7bce72ce013725f",
"游戏" => "5930e009e7bce72ce0137170",
"动物" => "5930e22ee7bce72ce01372f3");
$id=$array[$name];
if($id==""){
echo "抱歉，type参数错误".$hh."参数说明：type可为网红、明星、热舞、风景、游戏、动物";exit;
}
$array1=array("网红" => "556",
"明星" => "597",
"热舞" => "330",
"风景" => "636",
"游戏" => "770",
"动物" => "207");
$s=$array1[$name];
$arr=range(0,$s); 
shuffle($arr);
foreach($arr as $values);
$html = file_get_contents("https://service.videowp.adesk.com/v1/videowp/category/".$id."?limit=30&skip=".$values."&adult=false&first=0&order=hot"); 
function replace_unicode_escape_sequence($match) {
return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');}
$html = preg_replace_callback('/\\\\u([0-9a-f]{4})/i', 'replace_unicode_escape_sequence', $html);
$result = preg_match_all('/"tag": "(.*?)", "video": "(.*?)", "(.*?)": (.*?), "click": (.*?), "category": "(.*?)", "img": "(.*?)"/', $html, $arr);//1类型(把\t替换为|，2视频链接，6图片链接
if($result== 0){
echo "抱歉，出错了！请至官网反馈问题！";
}else{
$arr=range(0,$result); 
shuffle($arr);
foreach($arr as $values); 
preg_match_all('/"tag": "(.*?)", "video": "(.*?)", "(.*?)": (.*?), "click": (.*?), "category": "(.*?)", "img": "(.*?)"/',$html,$trstr); 
$img = "".$trstr[2][$values]."";
$t = "".$trstr[7][$values]."";
$l = "".$trstr[1][$values]."";
$l=str_replace('\t','|',$l);
echo "".$ming."API精选短视频".$hh."";
echo "━━━━━━━━━".$hh."";
echo "±img=".$t."±".$hh."";
echo "类型：".$l."".$hh."";
echo "播放链接：".$img."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
?>