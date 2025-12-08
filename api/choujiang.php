<?php
include("./API.php");
include("../tianyi.php");
tongji("choujiang");
$a = $_GET['a'];//输奖品1名字
$b = $_GET['b'];//输奖品2名字
$c = $_GET['c'];//输奖品3名字
$hh=$_GET['hh']?:"\n";//换行符号(默认\n)
$rand = rand(1,3);
if($rand==1&&$a==null)
{
exit("".$ming."API抽奖".$hh."━━━━━━━━━".$hh."很遗憾,没有抽中奖品".$hh."━━━━━━━━━".$hh."Tips:".$ming."API技术支持");
}
elseif($rand==1&&$a!=null)
{
exit("".$ming."API抽奖".$hh."━━━━━━━━━".$hh."恭喜你抽中了:".$a."".$hh."━━━━━━━━━".$hh."Tips:".$ming."API技术支持");
}
if($rand==2&&$b==null)
{
exit("".$ming."API抽奖".$hh."━━━━━━━━━".$hh."很遗憾,没有抽中奖品".$hh."━━━━━━━━━".$hh."Tips:".$ming."API技术支持");
}
elseif($rand==2&&$b!=null)
{
exit("".$ming."API抽奖".$hh."━━━━━━━━━".$hh."恭喜你抽中了:".$b."".$hh."━━━━━━━━━".$hh."Tips:".$ming."API技术支持");
}
if($rand==3&&$c==null)
{
exit("".$ming."API抽奖".$hh."━━━━━━━━━".$hh."很遗憾,没有抽中奖品".$hh."━━━━━━━━━".$hh."Tips:".$ming."API技术支持");
}
elseif($rand==3&&$c!=null)
{
exit("".$ming."API抽奖".$hh."━━━━━━━━━".$hh."恭喜你抽中了:".$c."".$hh."━━━━━━━━━".$hh."Tips:".$ming."API技术支持");
}
?>