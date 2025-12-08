<?php
include("./data/zixi/Plugin.php");
include("./API.php");
include("../tianyi.php");
tongji("port");
$url=parse_url($_REQUEST['ip']);//需要查询的域名/IP
$hh=$_REQUEST['hh']?:"\n";//换行符号(默认\n)
if($url["host"]){
$url=$url["host"];
}else{
$url=$url["path"];
}
if($url==null){
echo "".$ming."API端口扫描".$hh."";
echo "━━━━━━━━━".$hh."";
echo "请输入域名/IP！".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
exit();
}
$port=explode(',','21[FTP],22[SSH],80[默认],3312[康乐],443[SSL],3306[MYSQL],3389[远程桌面]');
echo "".$ming."API端口扫描".$hh."";
echo "━━━━━━━━━".$hh."";
foreach($port as $scanning){
preg_match('/\((.*?)\)/i',$scanning,$name);
$port=str_replace($name[0],"",$scanning);
if(scanning_port($_REQUEST["ip"],$port,$timeout=2)){
echo $port.$name[0].":开启".$hh."";
}else{
echo $port.$name[0].":关闭".$hh."";
}
}

echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
function scanning_port($ip,$port,$timeout=0.1){
$result=@fsockopen($ip,$port,$errno,$errstr,$timeout);
if($result){
fclose($result);
return true;
}
}