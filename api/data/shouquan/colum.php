<?php
header("Content-type: text/html; charset=utf-8");
$hh=$_GET["hh"]?:"\n";
$list=file_get_contents("List.php");
$result = preg_match_all("/【机器：(.*?)】〖主人：(.*?)〗/",$list,$nute);
$p=$nute[1][0];
if($p==''){
echo "授权列表空空;
}else{
for ($x=0; $x < $result && $x<=$result; $x++)
{
$jec=$nute[1][$x];
$n=$nute[2][$x];
echo ($x+1)."号授权：机器人QQ：".$jec."-主人QQ：".$n."".$hh."";
}
}
?>