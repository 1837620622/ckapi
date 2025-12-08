<?php
include("./API.php");
include("../tianyi.php");
tongji("douyu");
$name = $_GET['msg'];//需要查询的主播名
$b = $_GET['b'];//选择(序号)
$hh=$_GET['hh']?:"\n";//换行符号(默认\n)
$array=array("说明" => "待添加");
$from=$array[$name];
if($from!=""){echo $from;}else{
$str = "https://m.douyu.com/api/search/getData?sk=".$name."&type=1&sort=1&limit=20&offset=0"; 
$str=file_get_contents($str);
preg_match_all('/"live":\[(.*?)]}/',$str,$str);
$str=$str[1][0];
$stre = '/{"roomId":(.*?),"vipId":(.*?),"nickname":"(.*?)","roomName":"(.*?)","roomSrc":"(.*?)","hn":"(.*?)","isLive":(.*?),"isVertical":(.*?),"cate2Id":(.*?),"cateName":"(.*?)"}/'; 

$result = preg_match_all($stre,$str,$trstr);
if($result== 0){
echo "".$ming."API斗鱼直播".$hh."";
echo "━━━━━━━━━".$hh."";
echo "搜索不到与".$name."的相关直播，请稍后重试或换个关键词试试。".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
if($b== null){
echo "".$ming."API斗鱼直播".$hh."";
echo "━━━━━━━━━".$hh."";
for( $i = 0 ; $i < $result && $i < 10 ; $i ++ ){
$ga=$trstr[3][$i];//直播间
$gb=$trstr[6][$i];//介绍
echo ($i+1)."：".$ga."--".$gb."人观看".$hh."";
}
echo "搜索到与".$name."相关的直播信息共".$result."条，您可以点1～".$result."任一直播间，当观看数为零时，主播可能已下播。".$hh."";
echo "提示：发送以上序号选择，例：选斗鱼直播 1".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
$i=($b-1);
$ga=$trstr[3][$i];//直播间
$gb=$trstr[4][$i];//介绍
$b1=$trstr[6][$i];//热度
$a=$trstr[5][$i];//图片链接
$b=$trstr[1][$i];//id
$x=file_get_contents("https://m.douyu.com/".$b."");
preg_match_all('/notice":"(.*?)"/',$x,$x);
$j=$x[1][0];
if(!$b == ' '){
die (''.$ming.'API斗鱼直播'.$hh.'━━━━━━━━━'.$hh.'列表中暂无序号为『'.$b.'』的直播间，请输入存在的序号进行搜索。'.$hh.'━━━━━━━━━'.$hh.'Tips:'.$ming.'API技术支持');
}
echo "".$ming."API斗鱼直播".$hh."";
echo "━━━━━━━━━".$hh."";
echo "±img=".$a."±".$hh."";
//判断直播是否进行
if($b1== 0){
echo "直播间：".$ga."".$hh."";
echo "介绍：".$gb."  ".$j."".$hh."";
echo "直播链接：https://m.douyu.com/".$b."".$hh."";
echo "当前主播不在线，您可以观看直播回放。".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
echo "直播间：".$ga."".$hh."";
echo "介绍：".$gb."  ".$j."".$hh."";
echo "直播链接：https://m.douyu.com/".$b."".$hh."";
echo "".$b1."人正在观看".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}}}}
?>