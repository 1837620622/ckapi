<?php
header("Content-type: text/html; charset=utf-8");
$hh=$_GET["hh"]?:"\n";
$list=file_get_contents("proxy.php");
$result = preg_match_all("/【代理：(.*?)】/",$list,$nute);
$p=$nute[1][0];
if($p==''){
echo "代理列表空空";
}else{
echo "当前代理列表如下".$hh."".$hh."";
for ($x=0; $x < $result && $x<=$result; $x++)
{
$jec=$nute[1][$x];
echo ($x+1)."号QQ：".$jec."".$hh."";
}
}
?>