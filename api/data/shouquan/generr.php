<?php
header("Content-type: text/html; charset=utf-8");
$hh=$_GET["hh"]?:"\n";
$list=file_get_contents("proxyy.php");
$result = preg_match_all("/【云黑：(.*?)】/",$list,$nute);
$p=$nute[1][0];
if($p==''){
echo "云黑列表空空";
}else{
echo "当前云黑列表如下".$hh."".$hh."";
for ($x=0; $x < $result && $x<=$result; $x++)
{
$jec=$nute[1][$x];
echo ($x+1)."号QQ：".$jec."".$hh."";
}
}
?>