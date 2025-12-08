<?php
$msg=$_GET["msg"];
$qrsig=$_GET["qrsig"];
$id=$_GET["id"];
if($msg=="1")
{
$url=file_get_contents("http://".$_SERVER['HTTP_HOST']."/api/data/gexing/ressut/qrlogin/qrewm_qzone.php");
echo $url;
}
else
if($msg=="2")
{
$url=file_get_contents("http://".$_SERVER['HTTP_HOST']."/api/data/gexing/ressut/qrlogin/qrlogin_vip.php?sm_qrsig=".$qrsig);
echo $url;
}
else
if($msg=="3")
{
$url=file_get_contents("http://".$_SERVER['HTTP_HOST']."/api/data/gexing/ressut/qrlogin/qrlogin_qzone.php?sm_qrsig=".$qrsig);
echo $url;
}
else
if($msg=="4")
{
$url=file_get_contents("http://".$_SERVER['HTTP_HOST']."/api/data/gexing/ressut/qrlogin/qrlogin_qun.php?sm_qrsig=".$qrsig);
echo $url;
}
?>