<?php
header("Content-type: text/html; charset=utf-8");
$keya=$_GET["key"];
$qq=$_GET["qq"];
$list=file_get_contents("proxy.php");
preg_match_all("/【代理：".$qq."】〖状态：(.*?)〗/",$list,$nute);
$jec=$nute[1][0];
if($jec==''){
echo "非代理";
}else
if($jec=='已添加'){
echo "是代理";
}
?>