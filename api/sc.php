<?php
include("./API.php");
include("../tianyi.php");
tongji("sc");
$msg=$_GET['msg'];//需要搜索的古诗名
$b=$_GET['b'];//选择(序号)
$c=$_GET['c'];
$hh=$_GET['hh']?:"\n";//换行符号(默认\n)
$list=file_get_contents("https://mipsc.chazidian.com/q_".$msg);
$list=str_replace('<font class="red">', '', $list);
$list=str_replace('</font>', '', $list);
$list=str_replace('</h4><', '', $list);
$result=preg_match_all('/<h4>(.*?)span>作者:(.*?)</',$list,$nute);
if($b==null)
{
echo "".$ming."API诗词搜索".$hh."";
echo "━━━━━━━━━".$hh."";
for ($x=0; $x < $result && $x<=9; $x++) 
{
$jec=$nute[1][$x];
$je=$nute[2][$x];
echo ($x+1)."：".$jec."-".$je."".$hh."";
}
echo "提示：发送以上序号选择，例：选诗词搜索 1".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
else
if($b>10||$b<1)
{
echo "请按以上序号选择";
}else{
$b=$_GET['b'];//选择(序号)
$b=($b-1);
preg_match_all('/data-title="" href="(.*?)"/',$list,$bbb);
$bbb=$bbb[1][$b];
$bbb=file_get_contents($bbb);
preg_match_all('/"title": "(.*?)"/',$bbb,$bb1);
preg_match_all('/"description": "(.*?)"/',$bbb,$bb2);
preg_match_all('/"pubDate": "(.*?)"/',$bbb,$bb3);
preg_match_all('/<h4>(.*?)span>作者:(.*?)</',$list,$bb4);
$bb1=$bb1[1][0];//诗名
$bb2=$bb2[1][0];//诗句
$bb3=$bb3[1][0];//发布时间
$bb4=$bb4[2][0];//作者
echo "".$ming."API诗词搜索".$hh."";
echo "━━━━━━━━━".$hh."";
echo "诗名：".$bb1."".$hh."";
echo "作者：".$bb4."".$hh."";
echo "诗句：".$bb2."".$hh."";
echo "发布时间：".$bb3."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
?>