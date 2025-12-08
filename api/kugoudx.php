<?php
include("./API.php");
include("../tianyi.php");
tongji("kugoudx");
$msg = $_GET['msg'];//需要搜索的歌曲名
$b = $_GET['b'];//选择(序号)
$hh=$_GET['hh']?:"\n";//换行符号(默认\n)
$str = 'http://mobilecdnbj.kugou.com/api/v3/search/song?showtype=14&highlight=&pagesize=400&tag_aggr=1&plat=0&sver=5&correct=1&api_ver=1&version=9051&page=1&area_code=1&tag=1&with_res_tag=1&keyword='.$msg.''; 
$str=file_get_contents($str);

        $stre = "/songname_original\":\"(.*?)\",\"singername\":\"(.*?)\"(.*?)\"hash\":\"(.*?)\"/";        $result = preg_match_all($stre,$str,$trstr);

if($result== 0){
echo "".$ming."API酷狗音乐".$hh."";
echo "━━━━━━━━━".$hh."";
echo "搜索不到与【$_GET[msg] 】的相关歌曲，请稍后重试或换个关键词试试。".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
if($b== null)
{
echo "".$ming."API酷狗音乐".$hh."";
echo "━━━━━━━━━".$hh."";
for( $i = 0 ; $i < $result && $i < 15 ; $i ++ )
{
$ga=$trstr[1][$i];//获取歌名
$ga=str_replace('<em>','',$ga);
$ga=str_replace('<\/em>','',$ga);
$gb=$trstr[2][$i];//获取歌手
echo ($i+1)."：".$ga."--".$gb."".$hh."";
}
echo "共搜索到与【$_GET[msg] 】的相关歌曲$result 条，您可以点1～$result 任一曲。".$hh."";
echo "提示：发送以上序号选择，例：选酷狗音乐 1".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
$i=($b-1);
$hash=$trstr[4][$i];//320hash
$l="http://m.kugou.com/app/i/getSongInfo.php?hash=".$hash."&cmd=playInfo";
$c = file_get_contents($l);
$json = json_decode($c, true);
$dg=$json["choricSinger"];//歌手
$xg=$json["songName"];//歌名
$tp=$json["album_img"];//图片链接
 $y = str_replace(array('{size}'), array('', ''), $tp);//图片链接
 $lj=$json["url"];//播放链接
if(!$lj == ' '){
die (''.$ming.'API酷狗音乐'.$hh.'━━━━━━━━━'.$hh.'播放失败！'.$hh.'━━━━━━━━━'.$hh.'Tips:'.$ming.'API技术支持');
}
if(!$y == ' '){
die (''.$ming.'API酷狗音乐'.$hh.'━━━━━━━━━'.$hh.'歌名：'.$xg.''.$hh.'歌手：'.$dg.''.$hh.'播放链接：'.$lj.''.$hh.'━━━━━━━━━'.$hh.'Tips:'.$ming.'API技术支持');
}
echo "".$ming."API酷狗音乐".$hh."";
echo "━━━━━━━━━".$hh."";
echo "±img=".$y."±".$hh."";
echo "歌名：".$xg."".$hh."";
echo "歌手：".$dg."".$hh."";
echo "播放链接：".$lj."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}}
?>