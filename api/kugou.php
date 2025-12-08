<?php
include("./API.php");
include("../tianyi.php");
tongji("kugou");
$b = $_GET['b'];//选择(序号)
$hh=$_GET['hh']?:"\n";//换行符号(默认\n)
$data=get_curl("http://api.ring.kugou.com/ring/all_search?q=".$_REQUEST["msg"]."&t=3&subtype=1&p=1&pn=10&plat=3",0);
$json = json_decode($data, true);
$s=count($json["response"]["musicInfo"]);
if($s== 0){
exit("".$ming."API酷狗铃声".$hh."━━━━━━━━━".$hh."搜索不到与".$_GET["msg"]."的相关歌曲，请稍后重试或换个关键词试试。".$hh."━━━━━━━━━".$hh."Tips:".$ming."API技术支持");}
if($b== null){
echo "".$ming."API酷狗铃声".$hh."";
echo "━━━━━━━━━".$hh."";
for( $i = 1 ; $i < $s && $i < 11 ; $i ++ ){
$singer=$json["response"]["musicInfo"][$i]["singerName"];
$songname=$json["response"]["musicInfo"][$i]["ringName"];
echo ($i)."：".$songname."--".$singer."".$hh."";
}
echo "".$hh."共搜索到与".$_GET["msg"]."的相关歌曲".$s."条，您可以点1～".$s."任一曲。".$hh."";
echo "提示：发送以上序号选择，例：选酷狗铃声 1".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
$i=($b);
$id=$json["response"]["musicInfo"][$i]["filename"];//播放链接
$singer=$json["response"]["musicInfo"][$i]["singerName"];//歌手
$songname=$json["response"]["musicInfo"][$i]["ringName"];//歌名
if($id==""){exit("".$ming."API酷狗铃声".$hh."━━━━━━━━━".$hh."抱歉，获取出错。".$hh."━━━━━━━━━".$hh."Tips:".$ming."API技术支持");
}else{
echo "".$ming."API酷狗铃声".$hh."";
echo "━━━━━━━━━".$hh."";
echo "歌名：".$songname."".$hh."";
echo "歌手：".$singer."".$hh."";
echo "链接：http://ring.bssdlbig.kugou.com/".$id."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
exit;}}




function get_curl($url,$post=0,$referer=1,$cookie=0,$header=0,$ua=1,$nobaody=0,$json=0){
$ch = curl_init();
@curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
$httpheader[] = "Accept:application/json";
$httpheader[] = "Accept-Encoding:gzip,deflate,sdch";
$httpheader[] = "Accept-Language:zh-CN,zh;q=0.8";
$httpheader[] = "Connection:close";
if($json){
$httpheader[] = "Content-Type:application/json; charset=utf-8";}
curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
if($post){
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);}
if($header){
curl_setopt($ch, CURLOPT_HEADER, TRUE);}
if($cookie){
curl_setopt($ch, CURLOPT_COOKIE, $cookie);}
if($referer){
if($referer==1){
curl_setopt($ch, CURLOPT_REFERER, 'http://m.qzone.com/infocenter?g_f=');
}else{
curl_setopt($ch, CURLOPT_REFERER, $referer);
}}
if($ua){
curl_setopt($ch, CURLOPT_USERAGENT,$ua);
}else{
curl_setopt($ch, CURLOPT_USERAGENT,'Dalvik/2.1.0 (Linux; U; Android 9; 16s Build/PKQ1.190202.001)');}
if($nobaody){
curl_setopt($ch, CURLOPT_NOBODY,1);}
curl_setopt($ch, CURLOPT_TIMEOUT, 5);
curl_setopt($ch, CURLOPT_ENCODING, "gzip");
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
$ret = curl_exec($ch);
curl_close($ch);
//$ret=mb_convert_encoding($ret, "UTF-8", "UTF-8");
return $ret;}
?>