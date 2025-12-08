<?php
header("Content-Type:text/html;charset=UTF-8");
include("./API.php");
include("../tianyi.php");
tongji("xiangji");
$qq=$_GET["qq"];//需要查询的QQ号
$hh=$_GET["hh"]?:"\n";//换行符号(默认\n)
$data = file_get_contents("https://qqxiongji.bmcx.com/".$qq."__qqxiongji");
preg_match_all('/<tr><td bgcolor=\"#F5F5F5\" align=\"center\" width=\"60\">QQ号码<\/td><td bgcolor=\"#FFFFFF\" style=\"font-size: 14px; font-weight: bold; color: #F00;\">(.*?)<\/td><\/tr>/',$data,$aaa);
preg_match_all('/<tr><td bgcolor=\"#F5F5F5\" align=\"center\">号码凶吉<\/td><td bgcolor=\"#FFFFFF\" style=\"font-size: 14px;\">(.*?) <span style=\"color: #F00; font-weight: bold;\">(.*?)<\/span><\/td><\/tr>/',$data,$bbb);
preg_match_all('/<tr><td bgcolor=\"#F5F5F5\" align=\"center\">主人性格<\/td><td bgcolor=\"#FFFFFF\" style=\"font-size: 14px;\">(.*?)。/',$data,$qqq);
$aaa=$aaa[1][0];
$bbb=$bbb[1][0];
$ddd=$qqq[1][0];
echo "".$ming."API♧QQ凶吉".$hh."";
echo "━━━━━━━━━".$hh."";
echo "查询账号：".$aaa."".$hh."";
echo "号码凶吉：".$bbb."".$hh."";
echo "主人性格：".$ddd."。".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
?>