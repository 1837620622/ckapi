<?php
header("Content-Type:text/html;charset=UTF-8");
include("./API.php");
include("../tianyi.php");
tongji("md5");


  $act=$_GET["act"];//输加/解密
  $hh=$_GET["hh"]?:"\n";//换行符号
  if($act==""){
echo "".$ming."API♧MD5加解密".$hh."";
echo "━━━━━━━━━".$hh."";
echo "数据错误".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
  return;
  }

if($act=="加密"){

$md5=$_GET["md5"];

if($md5==""){
echo "".$ming."API♧MD5加解密".$hh."";
echo "━━━━━━━━━".$hh."";
echo "加密内容不能为空".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
return;
}


$md5a=md5($md5);
file_put_contents("./data/md5/".$md5a,$md5);

echo "".$ming."API♧MD5加解密".$hh."";
echo "━━━━━━━━━".$hh."";
echo "加密成功,内容：".$md5a."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
return;


}

if($act=="解密"){

$md5=$_GET["md5"];

if($md5==""){
echo "".$ming."API♧MD5加解密".$hh."";
echo "━━━━━━━━━".$hh."";
echo "请输入解密码".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
return;
}

if(file_exists("./data/md5/".$md5)==0){
echo "".$ming."API♧MD5加解密".$hh."";
echo "━━━━━━━━━".$hh."";
echo "解密失败".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
return;
}


$md5a=file_get_contents("./data/md5/".$md5);
echo "".$ming."API♧MD5加解密".$hh."";
echo "━━━━━━━━━".$hh."";
echo "解密成功,内容：".$md5a."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
return;


}

?>