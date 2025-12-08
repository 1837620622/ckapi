<?php
include("./API.php");
tongji("Epidemic");
$data=file_get_contents("https://api.inews.qq.com/newsqa/v1/automation/modules/list?modules=FAutoCountryMerge");
$json=json_decode($data,true);
//$Country=$_REQUEST["country"]?:"俄罗斯";
$code=$json["ret"];
$Country=$_REQUEST["country"];//需要查询的地区(必须是国外)
if(!$Country)
{
echo json(1001,"请输入需要查询的国外国家名称");
exit();
}
if($code != 0)
{
echo json(1002,"疫情查询失败!");
exit();
}
$Verify_tow=array("俄罗斯"=>1,"巴西"=>1,"德国"=>1,"意大利"=>1,"法国"=>1,"美国"=>1,"英国"=>1,"西班牙"=>1);
$Verify=$Verify_tow[$Country];
if($Verify==null)
{
echo json(1003,"请输入正确的国外国家名称!");
exit();
}
$Russia=$json["data"]["FAutoCountryMerge"]["俄罗斯"]["list"];
$Brazil=$json["data"]["FAutoCountryMerge"]["巴西"]["list"];
$Germany=$json["data"]["FAutoCountryMerge"]["德国"]["list"];
$Italy=$json["data"]["FAutoCountryMerge"]["意大利"]["list"];
$France=$json["data"]["FAutoCountryMerge"]["法国"]["list"];
$United=$json["data"]["FAutoCountryMerge"]["美国"]["list"];
$UK=$json["data"]["FAutoCountryMerge"]["英国"]["list"];
$Spain=$json["data"]["FAutoCountryMerge"]["西班牙"]["list"];
if($Country=="俄罗斯")
{
foreach($Russia as $k=>$v){
if($_REQUEST["max"]!=null&&$k==$_REQUEST["max"])
{
break;
}
$array["俄罗斯"][($k+1)]["date"]="".$v["y"]."年".str_replace(".","月",$v["date"])."日";
$array["俄罗斯"][($k+1)]["confirm"]="".$v["confirm"]."人";
}
echo json(1000,$array);
exit();
}
if($Country=="巴西")
{
foreach($Brazil as $k=>$v){
if($_REQUEST["max"]!=null&&$k==$_REQUEST["max"])
{
break;
}
$array["巴西"][($k+1)]["date"]="".$v["y"]."年".str_replace(".","月",$v["date"])."日";
$array["巴西"][($k+1)]["confirm"]="".$v["confirm"]."人";
}
echo json(1000,$array);
exit();
}
if($Country=="德国")
{
foreach($Germany as $k=>$v){
if($_REQUEST["max"]!=null&&$k==$_REQUEST["max"])
{
break;
}
$array["德国"][($k+1)]["date"]="".$v["y"]."年".str_replace(".","月",$v["date"])."日";
$array["德国"][($k+1)]["confirm"]="".$v["confirm"]."人";
}
echo json(1000,$array);
exit();
}
if($Country=="意大利")
{
foreach($Italy as $k=>$v){
if($_REQUEST["max"]!=null&&$k==$_REQUEST["max"])
{
break;
}
$array["意大利"][($k+1)]["date"]="".$v["y"]."年".str_replace(".","月",$v["date"])."日";
$array["意大利"][($k+1)]["confirm"]="".$v["confirm"]."人";
}
echo json(1000,$array);
exit();
}
if($Country=="法国")
{
foreach($France as $k=>$v){
if($_REQUEST["max"]!=null&&$k==$_REQUEST["max"])
{
break;
}
$array["法国"][($k+1)]["date"]="".$v["y"]."年".str_replace(".","月",$v["date"])."日";
$array["法国"][($k+1)]["confirm"]="".$v["confirm"]."人";
}
echo json(1000,$array);
exit();
}
if($Country=="美国")
{
foreach($United as $k=>$v){
if($_REQUEST["max"]!=null&&$k==$_REQUEST["max"])
{
break;
}
$array["美国"][($k+1)]["date"]="".$v["y"]."年".str_replace(".","月",$v["date"])."日";
$array["美国"][($k+1)]["confirm"]="".$v["confirm"]."人";
}
echo json(1000,$array);
exit();
}
if($Country=="英国")
{
foreach($UK as $k=>$v){
if($_REQUEST["max"]!=null&&$k==$_REQUEST["max"])
{
break;
}
$array["英国"][($k+1)]["date"]="".$v["y"]."年".str_replace(".","月",$v["date"])."日";
$array["英国"][($k+1)]["confirm"]="".$v["confirm"]."人";
}
echo json(1000,$array);
exit();
}
if($Country=="西班牙")
{
foreach($Spain as $k=>$v){
if($_REQUEST["max"]!=null&&$k==$_REQUEST["max"])
{
break;
}
$array["西班牙"][($k+1)]["date"]="".$v["y"]."年".str_replace(".","月",$v["date"])."日";
$array["西班牙"][($k+1)]["confirm"]="".$v["confirm"]."人";
}
echo json(1000,$array);
exit();
}