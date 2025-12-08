<?php
header("Content-type: text/html; charset=utf-8");
$keya=$_GET["key"];
$robot=$_GET["robot"];
$list=file_get_contents("List.php");
preg_match_all("/【机器：".$robot."】〖主人：(.*?)〗『时间：(.*?)』《状态：(.*?)》/",$list,$nute);
$jcry=date("Y-m-d");
$aaa=$nute[2][0];
$bbb=$nute[3][0];
if($bbb==''){
echo "0";
}else
if($bbb==null){
echo "0";
}else
if($aaa<=$jcry){
echo "0";
$list=file_get_contents("List.php");
preg_match_all("/【机器：".$robot."】〖主人：(.*?)〗『时间：(.*?)』《状态：(.*?)》/",$list,$nute);
$jec=$nute[1][0];
$aaa=$nute[1][0];
$bbb=$nute[2][0];
$ccc=$nute[3][0];
$a=str_replace("\n【机器：".$robot."】〖主人：".$aaa."〗『时间：".$bbb."』《状态：".$ccc."》", '', $list);
$myfile = fopen("List.php", "w") or die("未知错误！");
fwrite($myfile,$a);
fclose($myfile);
}else
if($bbb=="已授权"){
echo "1";
}
?>