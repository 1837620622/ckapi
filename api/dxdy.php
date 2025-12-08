<?php
include("./API.php");
tongji("dxdy");
$name = urlencode($_GET[msg]);//需要搜索的内容
$b = urlencode($_GET[b]);//选择(序号)
$hh=$_GET["hh"]?:"\n";//换行符号(默认\n)
$str = "http://m.v.qq.com/search.html?act=0&keyWord=".$name.""; 
$str=file_get_contents($str);
$result = preg_match_all('/(.*?)<p class=\"figure_source _figure_src\">(.*?)<(.*?)/', $str, $a);//获取来源
preg_match_all("/(.*?)<span class=\"figure_pic_inner\">
        <img src=\"(.*?)\"(.*?)/",$str,$t);//2为图片链接
preg_match_all("/(.*?)a class=\"figure _figure\" href=\"(.*?)\"(.*?)/",$str,$c);//2播放链接
preg_match_all("/(.*?)p class=\"figure_cast\">(.*?)<(.*?)/",$str,$v);//2为主演
preg_match_all("/(.*?)class=\"mask_scroe\"><em>(.*?)<(.*?)/",$str,$f);//2为评分
preg_match_all("/(.*?)class=\"figure_director\">(.*?)<(.*?)/",$str,$z);//2为导演
preg_match_all("/(.*?)<p class=\"figure_genre\">
                (.*?) <i class=\"sl\">(.*?)/",$data,$n);//2为年代  
preg_match_all("/(.*?)<span class=\"figure_title\">(.*?)<span class=\"hl\">(.*?)</",$str,$m);//2为类型，3为名称
if($result== 0){
echo "搜索不到与【$_GET[msg]】的相关影视作品，请稍后重试或换个关键词试试。".$hh."";
}else{
if($b== null){
for( $i = 0 ; $i < $result && $i < 3 ; $i ++ )
{
$ga=$m[3][$i];//获取电影名
$c=$m1[1][$i];
$gb=$m[2][$i];//获取类型
$l=$a[2][$i];//来源
$d=$z[2][$i];//导演
echo ($i+1)."：".$ga."".$hh."$d  类型：".$gb."||$l".$hh."$c";
}
echo "共搜索到与【$_GET[msg] 】的相关影视$result 条，您可以点1～$result 任一作品。".$hh."提示：发送以上序号选择，例：选腾讯视频 1";
}else{
$i=($b-1);
$ga=$m1[1][$i];//获取电影名
$ga=str_replace('<\/span>','',$ga);
$gb=$m[2][$i];//获取类型
$l=$a[2][$i];//来源
$t=$t[2][$i];//图片
$j=$c[2][$i];//链接
$v=$v[2][$i];//主演
$f=$f[2][$i];//评分
$d=$z[2][$i];//导演
$n=$n[2][$i];//年代
$z = file_get_contents("compress.zlib://$j");
$a=str_replace(' ','',$z);
$shu=preg_match_all('/"vid":"(.*?)","pic(.*?)":"(.*?)"/',$a,$z);
$vid=$z[1][0];
if(!$j == ' '){
die ('列表中暂无序号为『'.$b.'』的电影，您只能点播查询到的序号。');
}
if($l== "来源：腾讯视频"){
echo "±img=$t";
echo "±$ga".$hh."$d".$hh."$v".$hh."$gb |$f |$n".$hh."$l".$hh."链接：".$j."";
}else{
echo "±img=$t";
echo "±$ga".$hh."$d".$hh."$v".$hh."$gb |$f |$n".$hh."$l".$hh."链接：".$j."";
}}}
?>