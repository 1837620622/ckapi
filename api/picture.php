<?php
include("./API.php");
tongji("picture");
$msg=$_GET['msg'];
$array = array(
"美女" => "6",
"风景" => "9",
"游戏" => "5",
"影视" => "7",
"时尚" => "10",
"明星" => "11",
"汽车" => "12",
"萌宠" => "14",
"清新" => "15",
"体育" => "16",
"萌娃" => "18",
"军事" => "22",
"动漫" => "26",
"日历" => "29",
"爱情" => "30",
"格言" => "35",);
$mgs=$array[$msg];
$data=file_get_contents("http://wallpaper.apc.360.cn/index.php?%20c=WallPaper&a=getAppsByCategory&count=20&from=360chrome&cid=".$mgs."&start=0");
function replace_unicode_escape_sequence($match) {
return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');
}
$data=preg_replace_callback('/\\\\u([0-9a-f]{4})/i', 'replace_unicode_escape_sequence', $data);
$data=str_replace('\\', '', $data);
$aaa=rand(1,6);
$bbb=rand(1,20);
if($aaa=="1")
{
preg_match_all('/img_1600_900\":\"(.*?)\"/',$data,$data);
$data=$data[1][$bbb];
$content=$data;
}
else
if($aaa=="2")
{
preg_match_all('/img_1440_900\":\"(.*?)\"/',$data,$data);
$data=$data[1][$bbb];
$content=$data;
}
else
if($aaa=="3")
{
preg_match_all('/img_1366_768\":\"(.*?)\"/',$data,$data);
$data=$data[1][$bbb];
$content=$data;
}
else
if($aaa=="4")
{
preg_match_all('/img_1280_800\":\"(.*?)\"/',$data,$data);
$data=$data[1][$bbb];
$content=$data;
}
else
if($aaa=="5")
{
preg_match_all('/img_1280_1024\":\"(.*?)\"/',$data,$data);
$data=$data[1][$bbb];
$content=$data;
}
else
if($aaa=="6")
{
preg_match_all('/img_1024_768\":\"(.*?)\"/',$data,$data);
$data=$data[1][$bbb];
$content=$data;
}
echo $content;
?>