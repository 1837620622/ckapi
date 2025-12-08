<?php
include("./API.php");
include("../tianyi.php");
tongji("qqrand");
$msg=$_GET['msg'];//输(新歌榜/热歌榜/彪升榜)
if($msg=="飙升榜")
{
$url=file_get_contents("https://i.y.qq.com/n2/m/share/details/toplist.html?ADTAG=myqq&from=myqq&channel=10007100&id=62");
$arr=mt_rand(1,99);
preg_match_all('/"type":0,"mid":"(.*?)"/',$url,$mid);
$mid=$mid[1][$arr];
preg_match_all('/","title":"(.*?)","singerName":"(.*?)","/',$url,$ms);
$title=$ms[1][$arr];
$name=$ms[2][$arr];
$mid=("https://i.y.qq.com/v8/playsong.html?songmid=".$mid."&ADTAG=myqq&from=myqq&channel=10007100");
$url=$mid;
$cookie='uin=o01008611; p_uin=o01008611; pgv_info=ssid=s3714499832; pgv_pvid=3385512494; RK=gX64I6qjfS; ptcz=f09132e6fd7d3ad9435e9ca74b0908868d50d2dadf024ce944b761b48351c0dd; pt4_token=bOnR5u5nJ5MDsmGcyFFG7bgV*HT4ARcgVWZxITw9*LI_; skey=MgEh029AF; p_skey=Mw8SQOgxnQgxAONYfiqmkrrIEvNfiiNSN-Pt03T5deM_; ts_last=y.qq.com/m/index.html; ts_refer=ADTAGmyqq; ts_uid=1820158331';
$Referer=$mid;
$data=get_result($url,$cookie,$Referer);
preg_match_all("/\" src=\"(.*?)\"/",$data,$img);
preg_match_all("/\"m4aUrl\":\"(.*?)\"/",$data,$mp3);
$img=$img[1][1];
$img="http:".$img;
$mp3=$mp3[1][0];
$mp3=str_replace('&', '&amp;',$mp3);
echo "card:1<?xml version='1.0' encoding='UTF-8' standalone='yes' ?><msg serviceID=\"2\" templateID=\"1\" action=\"web\" brief=\"[分享]QQ飙升榜\" sourceMsgId=\"0\" url=\"\" flag=\"0\" adverSign=\"0\" multiMsgFlag=\"0\"><item layout=\"2\"><audio cover=\"".$img."\" src=\"".$mp3."\" /><title>".$title."</title><summary>".$name."</summary></item><source name=\"".$ming."API技术支持\" icon=\"https://url.cn/53tgeq7\" url=\"\" action=\"app\" a_actionData=\"com.tencent.qqmusic\" i_actionData=\"tencent1101079856://\" appid=\"1101079856\" /></msg>";
}
else
if($msg=="热歌榜")
{
$url=file_get_contents("https://i.y.qq.com/n2/m/share/details/toplist.html?ADTAG=myqq&from=myqq&channel=10007100&id=26");
$arr=mt_rand(1,99);
preg_match_all('/"type":0,"mid":"(.*?)"/',$url,$mid);
$mid=$mid[1][$arr];
preg_match_all('/","title":"(.*?)","singerName":"(.*?)","/',$url,$ms);
$title=$ms[1][$arr];
$name=$ms[2][$arr];
$mid=("https://i.y.qq.com/v8/playsong.html?songmid=".$mid."&ADTAG=myqq&from=myqq&channel=10007100");
$url=$mid;
$cookie='uin=o01008611; p_uin=o01008611; pgv_info=ssid=s3714499832; pgv_pvid=3385512494; RK=gX64I6qjfS; ptcz=f09132e6fd7d3ad9435e9ca74b0908868d50d2dadf024ce944b761b48351c0dd; pt4_token=bOnR5u5nJ5MDsmGcyFFG7bgV*HT4ARcgVWZxITw9*LI_; skey=MgEh029AF; p_skey=Mw8SQOgxnQgxAONYfiqmkrrIEvNfiiNSN-Pt03T5deM_; ts_last=y.qq.com/m/index.html; ts_refer=ADTAGmyqq; ts_uid=1820158331';
$Referer=$mid;
$data=get_result($url,$cookie,$Referer);
preg_match_all("/\" src=\"(.*?)\"/",$data,$img);
preg_match_all("/\"m4aUrl\":\"(.*?)\"/",$data,$mp3);
$img=$img[1][1];
$img="http:".$img;
$mp3=$mp3[1][0];
$mp3=str_replace('&', '&amp;',$mp3);
echo "card:1<?xml version='1.0' encoding='UTF-8' standalone='yes' ?><msg serviceID=\"2\" templateID=\"1\" action=\"web\" brief=\"[分享]QQ热歌榜\" sourceMsgId=\"0\" url=\"\" flag=\"0\" adverSign=\"0\" multiMsgFlag=\"0\"><item layout=\"2\"><audio cover=\"".$img."\" src=\"".$mp3."\" /><title>".$title."</title><summary>".$name."</summary></item><source name=\"".$ming."API技术支持\" icon=\"https://url.cn/53tgeq7\" url=\"\" action=\"app\" a_actionData=\"com.tencent.qqmusic\" i_actionData=\"tencent1101079856://\" appid=\"1101079856\" /></msg>";
}
else
if($msg=="新歌榜")
{
$url=file_get_contents("https://i.y.qq.com/n2/m/share/details/toplist.html?ADTAG=myqq&from=myqq&channel=10007100&id=27");
$arr=mt_rand(1,99);
preg_match_all('/"type":0,"mid":"(.*?)"/',$url,$mid);
$mid=$mid[1][$arr];
preg_match_all('/","title":"(.*?)","singerName":"(.*?)","/',$url,$ms);
$title=$ms[1][$arr];
$name=$ms[2][$arr];
$mid=("https://i.y.qq.com/v8/playsong.html?songmid=".$mid."&ADTAG=myqq&from=myqq&channel=10007100");
$url=$mid;
$cookie='uin=o01008611; p_uin=o01008611; pgv_info=ssid=s3714499832; pgv_pvid=3385512494; RK=gX64I6qjfS; ptcz=f09132e6fd7d3ad9435e9ca74b0908868d50d2dadf024ce944b761b48351c0dd; pt4_token=bOnR5u5nJ5MDsmGcyFFG7bgV*HT4ARcgVWZxITw9*LI_; skey=MgEh029AF; p_skey=Mw8SQOgxnQgxAONYfiqmkrrIEvNfiiNSN-Pt03T5deM_; ts_last=y.qq.com/m/index.html; ts_refer=ADTAGmyqq; ts_uid=1820158331';
$Referer=$mid;
$data=get_result($url,$cookie,$Referer);
preg_match_all("/\" src=\"(.*?)\"/",$data,$img);
preg_match_all("/\"m4aUrl\":\"(.*?)\"/",$data,$mp3);
$img=$img[1][1];
$img="http:".$img;
$mp3=$mp3[1][0];
$mp3=str_replace('&', '&amp;',$mp3);
echo "card:1<?xml version='1.0' encoding='UTF-8' standalone='yes' ?><msg serviceID=\"2\" templateID=\"1\" action=\"web\" brief=\"[分享]QQ新歌榜\" sourceMsgId=\"0\" url=\"\" flag=\"0\" adverSign=\"0\" multiMsgFlag=\"0\"><item layout=\"2\"><audio cover=\"".$img."\" src=\"".$mp3."\" /><title>".$title."</title><summary>".$name."</summary></item><source name=\"".$ming."API技术支持\" icon=\"https://url.cn/53tgeq7\" url=\"\" action=\"app\" a_actionData=\"com.tencent.qqmusic\" i_actionData=\"tencent1101079856://\" appid=\"1101079856\" /></msg>";
}

function get_result($url,$cookie,$Referer)
{
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
$header = array(
'User-Agent: Mozilla/5.0 (Linux; Android 6.0.1; vivo Y55L Build/MMB29M; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/66.0.3359.126 MQQBrowser/6.2 TBS/045132 Mobile Safari/537.36 V1_AND_SQ_8.3.0_1362_YYB_D QQ/8.3.0.4480 NetType/WIFI WebP/0.3.0 Pixel/720 StatusBarHeight/49 SimpleUISwitch/0 QQTheme/1000',
'Referer: '.$Referer,
);
//curl_setopt($ch,CURLOPT_POST,true);
//curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_COOKIE, $cookie);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3); //设置等待时间
curl_setopt($ch, CURLOPT_TIMEOUT, 30); //设置cURL允许执行的最长秒数
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 1);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); 
curl_setopt($ch, CURLOPT_HEADER, 0); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$content = curl_exec($ch);
curl_close($ch);
return $content;
}
?>