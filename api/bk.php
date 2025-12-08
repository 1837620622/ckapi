<?php
include("./API.php");
include("../tianyi.php");
tongji("bk");
$hh=$_GET["hh"]?:"\n";//换行符号(默认\n)
$a = file_get_contents("http://pic.sogou.com/ris/risBaike?query=1&name=".$_GET["msg"]."&baike_xiaoqi=false");
preg_match_all('/category":\["(.*?)"\]/',$a,$c);
$f=$c[1][0];
$f=str_replace('","','、',$f);
$json = json_decode($a, true);
$c=$json["baikeMsg"];//判断
$lj=$json["link"];//链接
$t=$json["image"];//图片
$r=$json["content"];//百科内容
$g=$json["cardItem"];//更多
$g=str_replace('|',''.$hh.'',$g);
if($c=="词条不存在"){
echo "".$ming."API百度百科".$hh."";
echo "━━━━━━━━━".$hh."";
echo "抱歉，不存在词条".$_GET["msg"]."的信息。".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
echo "".$ming."API百度百科".$hh."";
echo "━━━━━━━━━".$hh."";
echo "±img=".$t."±".$hh."";
echo "".$r."".$hh."";
echo "".$f."".$hh."";
echo "".$g."".$hh."".$hh."";
echo "更多：".$lj."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
?>