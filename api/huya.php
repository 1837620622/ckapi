<?php
header("Content-Type:text/html;charset=UTF-8");
include("./API.php");
include("../tianyi.php");
tongji("huya");
$msg = $_GET['msg'];//需要查询的主播名
$b = $_GET['b'];//选择(序号)
$hh=$_GET['hh']?:"\n";//换行符号(默认\n)
if($msg==""){
echo "".$ming."API虎牙直播".$hh."";
echo "━━━━━━━━━".$hh."";
echo "抱歉，输入为空。".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
exit;}
$str = 'https://search.cdn.huya.com/?m=Search&do=getSearchContent&q='.$msg.'&uid=0&v=4&typ=-5&livestate=0&rows=40'; 
$str=file_get_contents($str);
$stre = '/{"aid":0,"gameLiveOn":(.*?),"game_activityCount":(.*?),"game_avatarUrl180":"(.*?)","game_avatarUrl52":"(.*?)","game_channel":(.*?),"game_id":(.*?),"game_level":(.*?),"game_liveLink":"(.*?)","game_longChannel":(.*?),"game_name":"(.*?)","game_nick":"(.*?)","game_profileLink":"(.*?)","game_recommendStatus":(.*?),"game_subChannel":(.*?),"live_intro":"(.*?)","rec_game_name":"(.*?)","rec_live_time":0,"recommended_text":"(.*?)","room_id":(.*?),"sTagName":"(.*?)","screen_type":(.*?),"uid":(.*?),"yyid":(.*?)}/';//1为true为直播中，false为未直播。2订阅数。4直播头像。7主播等级。10游戏。11直播昵称。15标题。17介绍。18房间号。19主播称号。21uid。
$result = preg_match_all($stre,$str,$trstr);
if($result== 0){
echo "".$ming."API虎牙直播".$hh."";
echo "━━━━━━━━━".$hh."";
echo "抱歉，没有相关主播。".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
exit;
}else{
if($b== null){
echo "".$ming."API虎牙直播".$hh."";
echo "━━━━━━━━━".$hh."";
for( $i = 0 ; $i < $result && $i < 15 ; $i ++ ){
$a=$trstr[11][$i];
$j=$trstr[2][$i];//订阅量
$c=$trstr[1][$i];
$c=str_replace('true','直播中',$c);
$c=str_replace('false','未开播',$c);
echo ($i+1)."：".$a."（订阅量：".$j."）--".$c."".$hh."";}
echo "".$hh."共搜索到相关主播".$result."，您可以观看1～".$result."任一主播。".$hh."";
echo "提示：发送以上序号选择，例：选虎牙直播 1".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
//2订阅数。4直播头像。7主播等级。10游戏。11直播昵称。15标题。17介绍。18房间号。19主播称号。21uid。
$i=($b-1);
$a=$trstr[11][$i];//昵称
$b=$trstr[7][$i];//等级
$c1=$trstr[1][$i];
$c=str_replace('true','直播中',$c1);
$c=str_replace('false','未开播',$c);//直播状态
$d=$trstr[3][$i];//图
$e=$trstr[2][$i];//订阅量
$f=$trstr[19][$i];//称号
$j=$trstr[10][$i];//游戏
$h=$trstr[15][$i];//标题
$g=$trstr[17][$i];//介绍
$uid=$trstr[21][$i];//uid
$id=$trstr[18][$i];//id
echo "".$ming."API虎牙直播".$hh."";
echo "━━━━━━━━━".$hh."";
echo "±img=".$d."±".$hh."";
echo "主播：".$a."（".$c."）".$hh."";
echo "主播称号：".$f."".$hh."";
echo "主播等级：".$b."".$hh."";
echo "订阅量：".$e."".$hh."";
echo "主播分类：".$j."".$hh."";
echo "标题：".$h."".$hh."";
echo "介绍：".$g."".$hh."";
echo "链接：";
if($c1=="true"){
$l=file_get_contents("https://mp.huya.com/cache.php?m=Live&do=profileRoom&pid=".$uid."");
preg_match_all('/"url":"(.*?)"/',$l,$trstr);
echo str_replace('\/','/',$trstr[1][3]);
}else{
echo "http://www.huya.com/".$id."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}}}?>