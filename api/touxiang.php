<?php
include("./API.php");
include("../tianyi.php");
tongji("touxiang");
$msg=$_GET["msg"];//输(女生/男生/情侣/卡通)
$hh=$_GET["hh"]?:"\n";//换行符号(默认\n)
if($msg=="女生")//女生
{
$data='{"1":"75439","2":"75549","3":"75543","4":"75709","5":"75609","6":"75613"}';
$json=json_decode($data,true);
$aaa=$json[rand(1,6)];
$aaa1=file_get_contents("https://mip.qqw21.com/nvshengtouxiang/".$aaa.".html");
$arr=mt_rand(1,16);
preg_match_all("/<mip-img popup alt=\"\" src=\"(.*?)\"/",$aaa1,$aaa2);
$aaa2=$aaa2[1][$arr];
echo "".$ming."API女生头像".$hh."━━━━━━━━━".$hh."±img=".$aaa2."±".$hh."━━━━━━━━━".$hh."Tips:".$ming."API技术支持";
}
else
if($msg=="男生")//男生
{
$data='{"1":"75728","2":"75707","3":"75612","4":"75610","5":"75446","6":"75360"}';
$json=json_decode($data,true);
$bbb=$json[rand(1,6)];
$bbb1=file_get_contents("https://mip.qqw21.com/nanshengtouxiang/".$bbb.".html");
$arr=mt_rand(1,16);
preg_match_all("/<mip-img popup alt=\"\" src=\"(.*?)\"/",$bbb1,$bbb2);
$bbb2=$bbb2[1][$arr];
echo "".$ming."API男生头像".$hh."━━━━━━━━━".$hh."±img=".$bbb2."±".$hh."━━━━━━━━━".$hh."Tips:".$ming."API技术支持";
}
else
if($msg=="情侣")//情侣
{
$ata='{"1":"2","2":"4","3":"6","4":"8","5":"10","6":"12"}';
$ata=json_decode($ata,true);
$ata=$ata[rand(1,6)];
$tat=($ata+1);
$data='{"1":"75738","2":"75737","3":"75735","4":"75679","5":"75663","6":"75633"}';
$json=json_decode($data,true);
$ccc=$json[rand(1,6)];
$ccc1=file_get_contents("https://mip.qqw21.com/qinglvtouxiang/".$ccc.".html");
preg_match_all("/<mip-img popup alt=\"\" src=\"(.*?)\"/",$ccc1,$ccc2);
$ccc3=$ccc2[1][$ata];
$ccc4=$ccc2[1][$tat];
echo "".$ming."API情侣头像".$hh."━━━━━━━━━".$hh."±img=".$ccc3."±".$hh."±img=".$ccc4."±".$hh."━━━━━━━━━".$hh."Tips:".$ming."API技术支持";
}
if($msg=="卡通")//卡通
{
$data='{"1":"75725","2":"75622","3":"75418","4":"75497","5":"75417","6":"75194"}';
$json=json_decode($data,true);
$ddd=$json[rand(1,6)];
$ddd1=file_get_contents("https://mip.qqw21.com/katongtouxiang/".$ddd.".html");
$arr=mt_rand(1,18);
preg_match_all("/<mip-img popup alt=\"\" src=\"(.*?)\"/",$ddd1,$ddd2);
$ddd2=$ddd2[1][$arr];
echo "".$ming."API卡通头像".$hh."━━━━━━━━━".$hh."±img=".$ddd2."±".$hh."━━━━━━━━━".$hh."Tips:".$ming."API技术支持";
}
?>