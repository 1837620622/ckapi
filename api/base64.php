<?php
header("content-type:text/html;charset=utf-8");
include("./API.php");
tongji("base64");
error_reporting(0);
if($_GET["id"] == "加密"){	//加密
echo base64_encode($_GET["msg"]);  // 输出编码后的内容为
}
if($_GET["id"] == "解密"){	//解密
echo base64_decode(str_replace(" ", "+", $_GET["msg"])); //输出解码后的内容
}
?>