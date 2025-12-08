<?php
include("./API.php");
include("../tianyi.php");
tongji("wy");
$msg = $_GET['msg'];//需要搜索的歌曲名
$b = $_GET['b'];//选择(序号)
$hh=$_GET['hh']?:"\n";//换行符号(默认\n)
$str = 'http://s.music.163.com/search/get/?src=lofter&type=1&filterDj=true&limit=30&offset=0&s='.$msg.''; 
$str=file_get_contents($str);
$stre = '/{"id":(.*?),"name":"(.*?)","artists":\[{"id":(.*?),"name":"(.*?)","picUrl":(.*?)}\],"album":{"id":(.*?),"name":"(.*?)","artist":{"id":(.*?),"name":"(.*?)","picUrl":(.*?)},"picUrl":"(.*?)"},"audio/'; 
$result = preg_match_all($stre,$str,$trstr);
if($result== 0){
echo "".$ming."API网易云音乐".$hh."";
echo "━━━━━━━━━".$hh."";
echo "搜索不到与".$_GET["msg"]."的相关歌曲，请稍后重试或换个关键词试试。".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
if($b== null){
echo "".$ming."API网易云音乐".$hh."";
echo "━━━━━━━━━".$hh."";
for( $i = 0 ; $i < $result && $i < 15 ; $i ++ ){
$ga=$trstr[2][$i];//获取歌名
$gb=$trstr[4][$i];//获取歌手
echo ($i+1)."：".$ga."--".$gb."".$hh."";
}
echo "发送以上序号进行选择吧！例：选网易云音乐 1".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
$i=($b-1);
$id=$trstr[1][$i];//作者ID
$ga=$trstr[2][$i];//歌名
$t=$trstr[11][$i];//图片
$gb=$trstr[4][$i];//歌手
if(!$id == ' '){die ('列表中暂无序号为『'.$b.'』的歌曲。');}
if($_GET['c']=="json"){
echo 'json:{"app":"com.tencent.structmsg","desc":"音乐","view":"music","ver":"0.0.0.1","prompt":"[分享]'.$ga.'","appID":"","sourceName":"","actionData":"","actionData_A":"","sourceUrl":"","meta":{"music":{"action":"","android_pkg_name":"","app_type":1,"appid":100497308,"desc":"'.$gb.'","jumpUrl":"qq.com","musicUrl":"http://music.163.com/song/media/outer/url?id='.$id.'","preview":"'.$t.'","sourceMsgId":"0","source_icon":"","source_url":"","tag":"网易云音乐","title":"'.$ga.'"}},"text":"","extraApps":[],"sourceAd":""}';
exit;}
if($_GET['c']=="xml"){
echo 'card:3<?xml version=\'1.0\' encoding=\'UTF-8\' standalone=\'yes\' ?><msg serviceID="2" templateID="1" action="web" brief="[分享]网易云音乐" sourceMsgId="0" url="http://music.163.com/song/media/outer/url?id='.$id.'" flag="0" adverSign="0" multiMsgFlag="0"><item layout="2"><audio cover="'.$t.'" src="http://music.163.com/song/media/outer/url?id='.$id.'" /><title>'.$ga.'</title><summary>'.$gb.'</summary></item><source name="" icon="" action="app" a_actionData="com.netease.cloudmusic" i_actionData="tencent100495085://" appid="100495085" /></msg>';
exit;}
echo "".$ming."API网易云音乐".$hh."";
echo "━━━━━━━━━".$hh."";
echo "±img=".$t."±".$hh."";
echo "歌名：".$ga."".$hh."";
echo "歌手：".$gb."".$hh."";
echo "播放链接：http://music.163.com/song/media/outer/url?id=".$id."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}}
?>