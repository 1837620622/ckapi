<?php
include("./API.php");
tongji("Timecal");
$startdate=$_REQUEST["start"];//输开始
$enddate=$_REQUEST["end"];//输结束
if($enddate==null|$startdate==null)
{
echo json(1001,"请输入参数");
}else
{
$date=floor((strtotime($enddate)-strtotime($startdate))/86400);
//echo "相差天数：".$date."天<br/><br/>";
$hour=floor((strtotime($enddate)-strtotime($startdate))%86400/3600);
//echo "相差小时数：".$hour."小时<br/><br/>";
$minute=floor((strtotime($enddate)-strtotime($startdate))%86400/60);
//echo "相差分钟数：".$minute."分钟<br/><br/>";
$second=floor((strtotime($enddate)-strtotime($startdate))%86400%60);
//echo "相差秒数：".$second."秒";
$time=array(
"day"=>$date,
"hour"=>$hour,
"minute"=>$minute,
"second"=>$second,
);
echo json(1000,$time);
}
?>