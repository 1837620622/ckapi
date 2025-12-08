<?php
include("./API.php");
include("../tianyi.php");
tongji("iniom");
$msg=$_GET['msg'];//需要查询的成语
$b=$_GET['b'];//选择(序号)
$hh=$_GET['hh']?:"\n";//换行符号(默认\n)
$list=file_get_contents("https://m.hujiang.com/xx_cyu/search/?word=".$msg."&muiti=0_0");
$result=preg_match_all('/<li><a href=\'(.*?)\' >(.*?)<\/a><\/li>/',$list,$nute);
if($b==null)
{
echo "".$ming."API成语查询".$hh."";
echo "━━━━━━━━━".$hh."";
for ($x=0; $x < $result && $x<=9; $x++) 
{
$je=$nute[2][$x];
echo ($x+1)."：".$je."".$hh."";
}
echo "提示：发送以上序号选择，例：选成语查询 1".$hh."";
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
$jb=$nute[1][$b];
$url=file_get_contents("https://m.hujiang.com".$jb);
preg_match_all('/<h1 class=\"DetailH1Title\">(.*?)<\/h1>/',$url,$aaa);
preg_match_all('/成语解释：<\/span>(.*?)</',$url,$bbb);
preg_match_all('/成语出处：<\/span>(.*?)</',$url,$ccc);
preg_match_all('/成语造句：<\/span>(.*?)</',$url,$ddd);
preg_match_all('/成语辨析：<\/span>(.*?)</',$url,$eee);
preg_match_all('/成语使用：<\/span>(.*?)</',$url,$fff);
preg_match_all('/歇后语：<\/span>(.*?)</',$url,$hhh);
$aaa=$aaa[1][0];//成语查询
$bbb=$bbb[1][0];//成语解释
$ccc=$ccc[1][0];//成语出处
$ddd=$ddd[1][0];//成语造句
$eee=$eee[1][0];//成语辨析
$fff=$fff[1][0];//成语使用
$hhh=$hhh[1][0];//歇后语
$aaa=str_replace("&nbsp;", "-", $aaa);
echo "".$ming."API成语查询".$hh."";
echo "━━━━━━━━━".$hh."";
echo "成语查询：".$aaa."".$hh."";
echo "成语解释：".$bbb."".$hh."";
echo "成语出处：".$ccc."".$hh."";
echo "成语造句：".$ddd."".$hh."";
echo "成语辨析：".$eee."".$hh."";
echo "成语使用：".$fff."".$hh."";
//echo "歇后语：".$hhh."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
?>