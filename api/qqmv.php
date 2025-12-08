<?php
include("./API.php");
include("../tianyi.php");
tongji("qqmv");
$msg=$_GET['msg'];//需要搜索的歌曲名
$b=$_GET['b'];//选择(序号)
$hh=$_GET['hh']?:"\n";//换行符号(默认\n)
$list=file_get_contents("http://soso.music.qq.com/fcgi-bin/search_cp?aggr=0&catZhida=1&lossless=0&sem=1&w=".$msg."&n=20&t=12&remoteplace=sizer.yqqlist.mv&hostUin=0&format=jsonp&inCharset=utf-8&outCharset=utf-8if");
$result = preg_match_all("/duration\":(.*?),(.*?)mv_name\":\"(.*?)\"(.*?)mv_pic_url\":\"(.*?)\"(.*?)singer_name\":\"(.*?)\"(.*?)v_id\":\"(.*?)\"(.*?)singerName_hilight\":\"(.*?)\"/",$list,$nute);
$je=$nute[1][0];
if($b== null)
{
echo "".$ming."API♧QQ音乐MV".$hh."";
echo "━━━━━━━━━".$hh."";
for ($x=0; $x < $result && $x<=9; $x++) 
{
$jec=$nute[3][$x];
$nut=$nute[11][$x];
echo ($x+1)."：".$jec."-".$nut."".$hh."";
}
echo "提示：发送以上序号选择，例：选QQ音乐MV 1".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
else
if($b>10 && $b<1)
{
echo "请按以上序号选择";
}else{
$i=($b-1);
$bb1=$nute[3][$i];
$bb2=$nute[11][$i];
$bb4=$nute[5][$i];
$bb5=$nute[9][$i];
echo "card:1<?xml version='1.0' encoding='UTF-8' standalone='yes' ?><msg serviceID=\"1\" templateID=\"1\" action=\"web\" brief=\"[MV]".$bb1."\" sourcePublicUin=\"1828222534\" sourceMsgId=\"0\" url=\"\" flag=\"1\" adverSign=\"0\" createTime=\"2099-01-01\" multiMsgFlag=\"0\"><item layout=\"5\"><video cover=\"".$bb4."\" vInfo=\"".$bb5."\" tInfo=\"".$bb5."\" preStartPosi=\"0\" preTime=\"223\" preWidth=\"576\" preHeight=\"1000\" fullTime=\"223\" busiType=\"1\" aID=\"2335b4c521d481bk\" isJump2Web=\"0\" /><title>".$bb2."</title></item><source name=\"\" icon=\"\" url=\"\" action=\"web\" appid=\"\" /></msg>";
}
?>