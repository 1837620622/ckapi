<?php
include("./API.php");
tongji("dwz2");
$url=$_REQUEST["msg"];//需要生成的链接
$id=$_REQUEST["id"]?:"1";//输ID(1-3)
if(!$url)
{
echo "请输入网址";
exit();
}
if($id==1){
echo file_get_contents("http://api.suolink.cn/api.php?key=5d75d41db1a9c762bb3296bf@ac8f6b84860c45188f5fa1d92b849d6f&expireDate=2030-03-31&url=".$url);
exit();
}else if($id==2){
echo file_get_contents("http://mrw.so/api.php?key=5d775c3891d2c423c8c33d07@e83b24b191cfe97461170512661a9ae8&expireDate=2030-03-31&url=".$url);
exit();
}else if($id==3){
echo file_get_contents("http://suo.nz/api.htm?key=5e642b3b44bb355a9f506d85@9f1876042ff7c8ef8b8c6987a88ae1fe&expireDate=2022-03-31&url=".$url);
exit();
}else{
echo "请输入正确的ID";
}
?>