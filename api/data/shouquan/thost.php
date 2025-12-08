<?php
header("Content-type: text/html; charset=utf-8");
$robot=$_GET["robot"];
$list=file_get_contents("List.php");
preg_match_all("/【机器：".$robot."】〖主人：(.*?)〗『时间：(.*?)』《状态：(.*?)》/",$list,$nute);
$jcry=date("Y-m-d");
$aaa=$nute[1][0];
if($aaa==''){
echo "未授权";
}else
if($aaa!=''){
echo $aaa;
}
?>