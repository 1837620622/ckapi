<?php
include("./API.php");
include("../tianyi.php");
tongji("xiaoai");
$msg=$_GET['msg'];//需要聊天的内容
$type=$_GET['type']?:"text";//输(text/xml/json)(默认为text)
$hh=$_GET['hh']?:"\n";//换行符号(默认\n)
if(!$msg){echo "".$ming."API小爱聊天".$hh."━━━━━━━━━".$hh."msg 参数为空".$hh."━━━━━━━━━".$hh."Tips:".$ming."API技术支持";exit;}
$url = file_get_contents("http://".$_SERVER['HTTP_HOST']."/api/data/xiaoai/xiaoai_tts.php?msg=".$msg."");
$url = json_decode($url, true);
$a=$url["mp3"];
if($type=="text"){
echo "".$ming."API小爱聊天".$hh."";
echo "━━━━━━━━━".$hh."";
echo "".$url["text"]."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else if($type=="json"){
echo 'json:{"app":"com.tencent.structmsg","desc":"语音","view":"music","ver":"0.0.0.1","prompt":"[分享]'.$ming.'API小爱聊天","meta":{"music":{"action":"","android_pkg_name":"","app_type":1,"appid":100495085,"desc":"点击播放","jumpUrl":"","musicUrl":"'.$a.'","preview":"http://q2.qlogo.cn/headimg_dl?dst_uin='.$kefu.'&amp;spec=100","sourceMsgId":"0","source_icon":"","source_url":"","tag":"'.$ming.'API小爱聊天","title":"'.$ming.'API小爱聊天"}}}';
}else if($type=="xml"){
echo "card:3<?xml version='1.0' encoding='UTF-8' standalone='yes' ?><msg serviceID=\"2\" templateID=\"1\" action=\"web\" brief=\"[分享]".$ming."API小爱聊天\" sourceMsgId=\"0\" url=\"".$a."\" flag=\"0\" adverSign=\"0\" multiMsgFlag=\"0\"><item layout=\"2\"><audio cover=\"http://q2.qlogo.cn/headimg_dl?dst_uin=".$kefu."&amp;spec=100\" src=\"".$a."\" /><title>".$ming."API小爱聊天</title><summary>点击播放</summary></item><source name=\"\" icon=\"\" url=\"\" action=\"app\" a_actionData=\"com.netease.cloudmusic\" i_actionData=\"tencent100495085://\" appid=\"100495085\" /></msg>";
}
?>