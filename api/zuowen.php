<?php
include("./API.php");
include("../tianyi.php");
tongji("zuowen");
$msg=$_GET['msg'];//需要搜索的作文名
$b=$_GET['b'];//选择(序号)
$hh=$_GET['hh']?:"\n";//换行符号(默认\n)
$list=file_get_contents("https://zuowen.jupeixun.cn/zuowen/search?name=".$msg);
$list=str_replace("	", '', $list);
$list=str_replace("\n", '', $list);
$result = preg_match_all("/<a target=\"_blank\" href=\"(.*?)\"><h3 class=\"title\">(.*?)<\/h3><\/a><!-- <p>(.*?)<\/p>/",$list,$nute);
if($b==null)
{
echo "".$ming."API作文搜索".$hh."";
echo "━━━━━━━━━".$hh."";
for ($x=0; $x < $result && $x<=9; $x++) 
{
$jec=$nute[2][$x];
echo ($x+1)."：".$jec."".$hh."";
}
echo "提示：发送以上序号选择，例：选作文搜索 1".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
else
if($b>10||$b<1)
{
echo "Tisp：回复序列号即可快捷搜索，例：选作文搜索 1";
}else{
$i=($b-1);
$aa=$nute[2][$i];//作文名字
$bb=$nute[3][$i];//作文内容
$cc=$nute[1][$i];//作文链接
echo "".$ming."API作文搜索".$hh."";
echo "━━━━━━━━━".$hh."";
echo "作文名字：".$aa."".$hh."";
echo "作文内容：".$bb."...".$hh."";
echo "作文链接：".$cc."".$hh."";
echo "作文提示：作文只提供参考".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
?>