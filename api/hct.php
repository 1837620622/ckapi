<?php
header('Content-Type: image/jpeg');
include("./API.php");
tongji("hct");
$id=$_REQUEST["id"]?:"美女";//输(动漫/美女/风景)
if(!$id)
{
echo "id参数不对哦！";
exit();
}
if($id=="美女"){
echo file_get_contents("http://".$_SERVER['HTTP_HOST']."/api/data/hct/meizi.php?msg=".$_GET['msg']."");
exit();
}else if($id=="动漫"){
echo file_get_contents("http://".$_SERVER['HTTP_HOST']."/api/data/hct/dongman.php?msg=".$_GET['msg']."");
exit();
}else if($id=="风景"){
echo file_get_contents("http://".$_SERVER['HTTP_HOST']."/api/data/hct/fengjing.php?msg=".$_GET['msg']."");
exit();
}else{
echo "请输入正确的ID";
}
?>