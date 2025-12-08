<?php
include("./API.php");
include("../tianyi.php");
tongji("bizhi");
$msg=$_GET['msg'];//输入数字1-30
$hh=$_GET['hh']?:"\n";//换行符号(默认\n)
$list=file_get_contents("http://service.picasso.adesk.com/v1/lightwp/category");
function replace_unicode_escape_sequence($match) {
return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');
}
$list=preg_replace_callback('/\\\\u([0-9a-f]{4})/i', 'replace_unicode_escape_sequence', $list);
$result=preg_match_all('/{\"count\": (.*?), \"ename\": \"(.*?)\", \"rname\": \"(.*?)\", \"cover_temp\": \"(.*?)\", \"name\": \"(.*?)\", \"cover\": \"(.*?)\", \"rank\": (.*?)\"id\": \"(.*?)\"/',$list,$nute);
if($msg==null)
{
echo "".$ming."API高清壁纸".$hh."";
echo "━━━━━━━━━".$hh."";
for ($x=0; $x < $result && $x<=9; $x++) 
{
$jec=$nute[5][$x];
echo ($x+1)."：".$jec."图-壁纸".$hh."";
}
echo "提示：发送以上序号选择，例：选高清壁纸 1".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
$b=$_GET['msg'];//输数字1-30
$b=($b-1);
$bb=$nute[8][$b];
$ar=mt_rand(1,30);
$lis=file_get_contents("http://service.picasso.adesk.com/v1/vertical/category/".$bb."/vertical?limit=100&skip=0&order=new");
preg_match_all("/wp\": \"(.*?)\"/",$lis,$bb);
$bb=$bb[1][$ar];//图片链接
echo "".$ming."API高清壁纸".$hh."";
echo "━━━━━━━━━".$hh."";
echo "±img=".$bb."±".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
?>