<?php
include("./API.php");
include("../tianyi.php");
tongji("lingsheng");
$msg=$_GET["msg"];//需要查询的歌曲名
$m=$_GET["b"]?:10;
$c=$_GET["c"]?:10;//搜索歌曲页数(默认10页)
$hh=$_GET["hh"]?:"\n";//换行符号(默认\n)
$data=file_get_contents("http://main.shoujiduoduo.com/ring.php?type=searchwp&keyword=".$msg."&page=&pagesize=".$m."&randnum=0.".time()."");
$data=th($data);
$s=preg_match_all('/<ringname="(.*?)"(.*?)"artist="(.*?)"(.*?)lurl="(.*?)"/',$data,$v);

if($s=="0"){
echo "".$ming."API铃声多多".$hh."";
echo "━━━━━━━━━".$hh."";
echo "抱歉，暂无【".$msg."】的相关铃声。".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
exit;}
$b=$_GET["b"];//选择(序号)
if($b==""){
echo "".$ming."API铃声多多".$hh."";
echo "━━━━━━━━━".$hh."";
for( $i = 0 ; $i < $s && $i < $c ; $i ++ ){
$name=$v[1][$i];
$gs=$v[3][$i];
echo ($i+1)."、".$name."——".$gs."".$hh."";
}
echo "提示：发送以上序号选择，例：选铃声多多 1".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
$i=($b-1);
$name=$v[1][$i];
$gs=$v[3][$i];
$id=$v[5][$i];
echo "".$ming."API铃声多多".$hh."";
echo "━━━━━━━━━".$hh."";
echo "歌名：".$name."".$hh."";
echo "歌手：".$gs."".$hh."";
echo "播放链接：http://cdnringuc.shoujiduoduo.com".$id."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
function th($data){
$search = array(" ","　","\n","\r","\t");
$replace = array("","","","","");
return str_replace($search, $replace, $data);}
?>