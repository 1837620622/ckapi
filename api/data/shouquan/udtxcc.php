<?php
header("Content-type: text/html; charset=utf-8");
$qq=$_GET["qq"];
$list=file_get_contents("proxyy.php");
preg_match_all("/【云黑：".$qq."】〖状态：(.*?)〗/",$list,$nute);
$jec=$nute[1][0];
if($jec==''){
echo "非云黑";
}else
if($jec=='已添加'){
echo "是云黑";
}
?>