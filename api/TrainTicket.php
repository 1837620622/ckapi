<?php
header("Content-Type:text/html;charset=UTF-8");
include("./API.php");
include("../tianyi.php");
tongji("TrainTicket");
$departure=$_GET['departure'];//起点
$arrival=$_GET['arrival'];//终点
$date=$_GET['date'];//出发日期(格式2021-10-07)
$hh=$_GET["hh"]?:"\n";//换行符号(默认\n)
if(!$departure){echo "".$ming."API火车票查询".$hh."━━━━━━━━━".$hh."departure 参数为空".$hh."━━━━━━━━━".$hh."Tips:".$ming."API技术支持";exit;}
if(!$arrival){echo "".$ming."API火车票查询".$hh."━━━━━━━━━".$hh."arrival 参数为空".$hh."━━━━━━━━━".$hh."Tips:".$ming."API技术支持";exit;}
if(!$date){echo "".$ming."API火车票查询".$hh."━━━━━━━━━".$hh."date 参数为空".$hh."━━━━━━━━━".$hh."Tips:".$ming."API技术支持";exit;}
$url = file_get_contents("http://yingy.20wl.co/Api/php/TrainTicket.php?departure=".$departure."&arrival=".$arrival."&date=".$date."");
$url = json_decode($url, true);
if($url["code"]==200){
echo "".$ming."API火车票查询".$hh."";
echo "━━━━━━━━━".$hh."";
echo "起点：".$url["go"]."".$hh."";
echo "终点：".$url["to"]."".$hh."";
echo "出发日期：".$url["date"]."".$hh."";
echo "━━━━━━━━━".$hh."";
foreach($url["list"] as $value)
{
echo "车号：".$value["TrainNumber"]."".$hh."";
echo "耗时：".$value["TotalTime"]."".$hh."";
echo "火车类型：".$value["TrainType"]."".$hh."";
echo "上车点：".$value["Depart"]."".$hh."";
echo "下车点：".$value["Dest"]."".$hh."";
echo "上车时间：".$value["DepartTime"]."".$hh."";
echo "下车时间：".$value["DestTime"]."".$hh."";
echo "━━━━━━━━━".$hh."";
foreach($value["prices"] as $value)
{
echo "座位类型：".$value["name"]."".$hh."";
echo "是否有票：".$value["status"]."".$hh."";
echo "价格：".$value["price"]."元".$hh."";
echo "━━━━━━━━━".$hh."";
}
}
echo "Tips:".$ming."API技术支持";
}else{
if($url["code"]==-2){
echo "".$ming."API火车票查询".$hh."";
echo "━━━━━━━━━".$hh."";
echo "".$url["error"]."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
echo "".$ming."API火车票查询".$hh."";
echo "━━━━━━━━━".$hh."";
echo "本接口正在维护！".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
}
?>