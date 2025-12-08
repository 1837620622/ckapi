<?php
header("Content-type: text/html; charset=utf-8");
$hh=$_GET["hh"]?:"\n";
$list=file_get_contents("secret.php");
$result=preg_match_all("/【卡密：(.*?)】〖生成者：(.*?)〗〔使用人：(.*?)〕『时间：(.*?)』《状态：(.*?)》/",$list,$bb);
$bb0=$bb[1][0];
if($bb0==''){
echo "当前卡密列表空空";
}else{
echo "当前卡密列表如下".$hh."".$hh."";
for ($x=0; $x < $result && $x<=$result; $x++)
{
$bb1=$bb[1][$x];
$bb2=$bb[2][$x];
$bb3=$bb[3][$x];
$bb4=$bb[4][$x];
$bb5=$bb[5][$x];
echo "卡密：".$bb1."-状态：".$bb5."-生成者QQ:".$bb2."".$hh."";
}
}
?>