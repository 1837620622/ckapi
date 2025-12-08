<?php
include("./API.php");
include("../tianyi.php");
tongji("tj");
$name = $_GET['name'];//标题名称
$a = $_GET['a'];//0为添加标签|1为写入|2为查看
$hh=$_GET['hh']?:"\n";//换行符号(默认\n)
$b = "data/tj/".$name.".txt";
if($name==null)
{
echo "".$ming."API统计".$hh."━━━━━━━━━".$hh."请输入标签名称".$hh."━━━━━━━━━".$hh."Tips:".$ming."API技术支持";
}
elseif(file_exists("data/tj/".$name.".txt")&&$a==0)
{
echo "".$ming."API统计".$hh."━━━━━━━━━".$hh."标签已存在".$hh."━━━━━━━━━".$hh."Tips:".$ming."API技术支持";
}
elseif(file_exists("data/tj/".$name.".txt")!=true&&$a==0)
{
echo "".$ming."API统计".$hh."━━━━━━━━━".$hh."添加成功".$hh."━━━━━━━━━".$hh."Tips:".$ming."API技术支持";
$a = fopen("data/tj/".$name.".txt","w");
fputs($a,"0");
fclose($a);
//ajaxfile();
}
elseif(file_exists("data/tj/".$name.".txt")&&$a==1)
{
echo "".$ming."API统计".$hh."━━━━━━━━━".$hh."写入成功".$hh."━━━━━━━━━".$hh."Tips:".$ming."API技术支持";
$counter = intval(file_get_contents("data/tj/".$name.".txt"));  
$_SESSION['#'] = true;  
$counter++;  
$fp = fopen("data/tj/".$name.".txt","w");  
fwrite($fp, $counter);  
fclose($fp); 
}
elseif(file_exists("data/tj/".$name.".txt")!=true&&$a==1)
{
echo "".$ming."API统计".$hh."━━━━━━━━━".$hh."标签不存在".$hh."━━━━━━━━━".$hh."Tips:".$ming."API技术支持";
}
elseif(file_exists("data/tj/".$name.".txt")&&$a==2)
{
$counter = intval(file_get_contents($b));
echo "".$ming."API统计".$hh."━━━━━━━━━".$hh."查询成功:".$counter."".$hh."━━━━━━━━━".$hh."Tips:".$ming."API技术支持";
}
elseif(file_exists("data/tj/".$name.".txt")!=true&&$a==2)
{
echo "".$ming."API统计".$hh."━━━━━━━━━".$hh."标签不存在".$hh."━━━━━━━━━".$hh."Tips:".$ming."API技术支持";
}else{
echo "".$ming."API统计".$hh."━━━━━━━━━".$hh."未知的错误".$hh."━━━━━━━━━".$hh."Tips:".$ming."API技术支持";
}
?>