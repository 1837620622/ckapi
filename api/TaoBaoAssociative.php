<?php
header("Content-Type:text/html;charset=UTF-8");
include("./API.php");
include("../tianyi.php");
tongji("TaoBaoAssociative");
$keyword=$_GET['keyword'];//需要查询的关键词
$hh=$_GET['hh']?:"\n";//换行符号(默认\n)
if(!$keyword){echo "".$ming."API淘宝联想词搜索".$hh."━━━━━━━━━".$hh."请输入需要查询的关键词！".$hh."━━━━━━━━━".$hh."Tips:".$ming."API技术支持";exit;}
$result = file_get_contents("https://suggest.taobao.com/sug?code=utf-8&q=".$keyword."");
$json = json_decode($result, true);
if($json["result"][0]==null)
{
echo "".$ming."API淘宝联想词搜索".$hh."";
echo "━━━━━━━━━".$hh."";
echo "未查询到相关联想词！".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
exit;
}
echo "".$ming."API淘宝联想词搜索".$hh."";
echo "━━━━━━━━━".$hh."";
foreach($json["result"] as $value)
{
echo "内容：".$value[0]."".$hh."";
echo "相似度：".$value[1]."".$hh."";
echo "━━━━━━━━━".$hh."";
}
echo "Tips:".$ming."API技术支持";
?>