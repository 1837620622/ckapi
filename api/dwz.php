<?php
include("./API.php");
tongji("dwz");
$url=$_REQUEST["url"];//需要生成的链接
$ft12key=getenv("FT12_APIKEY") ?: "YOUR_FT12_APIKEY";//短链API密钥,从环境变量读取
if(!$url)
{
echo json(1001,"请输入需要缩短的网址");
}
else if(file_get_contents("http://api.ft12.com/api.php?url=".$url."&apikey=".$ft12key."")=="非法网址")
{
echo json(1002,"请输入正确的网址");
}else{
echo json(1000,array( "url"=>file_get_contents("http://api.ft12.com/api.php?url=".$url."&apikey=".$ft12key."")));
}
?>