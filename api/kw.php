<?php
include("./API.php");
include("../tianyi.php");
tongji("kw");
$a = urlencode($_GET["msg"]);//需要搜索的歌曲名
 $b = urlencode($_GET["b"]);//选择(序号)
 $lx = urlencode($_GET["m"]);//输出方式(text/xml/json)
$hh=$_GET["hh"]?:"\n";//换行符号(默认\n)
$data = file_get_contents("compress.zlib://http://search.kuwo.cn/r.s?client=kt&pn=0&rn=30&uid=1179647890&ver=kwplayer_ar_9.2.7.1&vipver=1&show_copyright_off=1&newver=1&correct=1&ft=music&cluster=0&strategy=2012&encoding=utf8&rformat=json&vermerge=1&mobi=1&issubtitle=1&all=".$a."");//http://search.kuwo.cn/r.s?ft=music&rformat=json&encoding=utf8&pn=0&rn=500&callback=song&vipver=MUSIC_8.0.3.1&SONGNAME=

$result = preg_match_all('/"FARTIST":"(.*?)","FORMAT":"(.*?)","FSONGNAME":"(.*?)","KMARK":"(.*?)","MINFO":"(.*?)","MUSICRID":"MUSIC_(.*?)","MVFLAG":"(.*?)","MVPIC":"(.*?)","MVQUALITY":"(.*?)","NAME":"(.*?)","NEW":"(.*?)","ONLINE":"(.*?)","PAY":"(.*?)","PROVIDER":"(.*?)","SONGNAME":"(.*?)"/',$data,$v);
if($result== 0){
echo "".$ming."API酷我音乐".$hh."";
echo "━━━━━━━━━".$hh."";
echo "搜索不到与".$_GET["msg"]."的相关歌曲，请稍后重试或换个关键词试试。".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
if($b== null){
echo "".$ming."API酷我音乐".$hh."";
echo "━━━━━━━━━".$hh."";
for( $i = 0 ; $i < $result && $i < 15 ; $i ++ ){
$ga=$v[15][$i];//获取名称
$gb=$v[1][$i];//歌手
echo ($i+1)."：".$ga."——".$gb."".$hh."";
}
echo "".$hh."搜索到与".$_GET["msg"]."相关的歌曲共".$result."条，您可以点1～".$result."任一歌曲。".$hh."";
echo "提示：发送以上序号选择，例：选酷我音乐 1".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
//
$i=($b-1);
$ga=$v[15][$i];//获取名称
$gb=$v[1][$i];//歌手
$id=$v[6][$i];//rid
if(!$b == ' '){
die (''.$ming.'API酷我音乐'.$hh.'━━━━━━━━━'.$hh.'列表中暂无序号为『'.$b.'』的相关内容，请输入存在的序号进行搜索。'.$hh.'━━━━━━━━━'.$hh.'Tips:'.$ming.'API技术支持');
}
$t = file_get_contents("http://artistpicserver.kuwo.cn/pic.web?user=867401041651110&android_id=f243cc2225eac3c9&prod=kwplayer_ar_9.2.8.1&corp=kuwo&source=kwplayer_ar_9.2.8.1_qq.apk&type=rid_pic&pictype=url&content=list&size=320&rid=".$id."");//http://mobile.kuwo.cn/mpage/html5/songinfoandlrc?mid=40900571
$l = file_get_contents("compress.zlib://http://www.kuwo.cn/url?format=falc&rid=".$id."&response=url&type=convert_url3&br=128kmp3&from=web&t=&reqId=");//http://antiserver.kuwo.cn/anti.s?type=convert_url&rid=MUSIC_40900571&format=mp3&response=url
preg_match_all('/"url": "(.*?)"/',$l,$l);
$l=$l[1][0];
if($_GET['c']=="json"){
echo 'json:{"app":"com.tencent.structmsg","desc":"音乐","view":"music","ver":"0.0.0.1","prompt":"[分享]'.$ga.'","appID":"","sourceName":"","actionData":"","actionData_A":"","sourceUrl":"","meta":{"music":{"action":"","android_pkg_name":"","app_type":1,"appid":100497308,"desc":"'.$gb.'","jumpUrl":"qq.com","musicUrl":"'.$l.'","preview":"'.$t.'","sourceMsgId":"0","source_icon":"","source_url":"","tag":"酷我音乐","title":"'.$ga.'"}},"text":"","sourceAd":""}';
exit;}
if($_GET['c']=="xml"){
echo 'card:3<?xml version=\'1.0\' encoding=\'UTF-8\' standalone=\'yes\' ?><msg serviceID="2" templateID="1" action="web" brief="[分享]酷我音乐" sourceMsgId="0" url="'.$l.'" flag="0" adverSign="0" multiMsgFlag="0"><item layout="2"><audio cover="'.$t.'" src="'.$l.'" /><title>'.$ga.'</title><summary>'.$gb.'</summary></item><source name="" icon="" action="app" a_actionData="com.netease.cloudmusic" i_actionData="tencent100495085://" appid="100495085" /></msg>';
exit;}

echo "".$ming."API酷我音乐".$hh."";
echo "━━━━━━━━━".$hh."";
echo "图片：".$t."".$hh."";
echo "歌名：".$ga."".$hh."";
echo "歌手：".$gb."".$hh."";
echo "播放链接：".$l."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}}
?>