<?php
include("./API.php");
tongji("zhuangban");
$id=$_REQUEST["id"]?:"气泡";
if(!$id)
{
echo "id参数不对哦！";
exit();
}
if($id=="气泡"){
echo file_get_contents("http://api.tianyi2006.xyz/api/data/zhuangban/qipao.php");
exit();
}else if($id=="主题"){
echo file_get_contents("https://ss6.co/api/?key=Q98XRUUp6vB0&url=".$url);
exit();
}else{
echo "请输入正确的ID";
}
?>