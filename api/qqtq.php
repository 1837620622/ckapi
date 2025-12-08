<?php
include("./API.php");
include("../tianyi.php");
tongji("qqtq");
require_once 'data/city.php';
@error_reporting(0);
$client = new SoapClient('http://www.webxml.com.cn/WebServices/WeatherWebService.asmx?wsdl');
$code = $_GET['msg'];//需要查询的地区名
$hh=$_GET['hh']?:"\n";//换行符号(默认\n)
$para = array('theCityName'=>$code);
$res = $client->__Call('getWeatherbyCityName',array('paramters'=>$para))->getWeatherbyCityNameResult->string;
if($res[1]=='') 
{
echo "".$ming."API♧QQ天气".$hh."";
echo "━━━━━━━━━".$hh."";
echo "抱歉，暂不支持该地区！".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
} else {
echo "".$ming."API♧QQ天气".$hh."";
echo "━━━━━━━━━".$hh."";
echo "城市：".$res[1]."".$hh."";
echo "气温：".$res[5]."".$hh."";
echo "".$res[10]."".$hh."";
echo "".$res[11]."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
?>