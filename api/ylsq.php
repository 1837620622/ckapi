<?php
header("content-type:text/html;charset=utf-8");
$domain=$_REQUEST["domain"];//社区域名(不带http://)
$api_token=$_REQUEST["api_token"];//tokenID
$key=$_REQUEST["key"];//密匙
$time=strtotime(date("YmdHis"));//时间戳
$gid=$_REQUEST["gid"];//商品编号
$num=$_REQUEST["num"];//下单数量
$value1=$_REQUEST["value1"];//下单参数1
$value2=$_REQUEST["value2"];//下单参数2
$value3=$_REQUEST["value3"];//下单参数3
$value4=$_REQUEST["value4"];//下单参数4
$value5=$_REQUEST["value5"];//下单参数5
$value6=$_REQUEST["value6"];//下单参数6
function curl($url,$post)
{
$curl=curl_init();
curl_setopt($curl,CURLOPT_URL,$url);
curl_setopt($curl,CURLOPT_POSTFIELDS,$post);
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
return curl_exec($curl);
curl_close($curl);
}
//分割
function getsign($param,$key)
{
$signpars="";
ksort($param);
foreach($param as $k=>$v)
{
if("sign"!=$k&&""!=$v)
{
$signpars.="".$k."=".$v."&";
}
}
$signpars=trim($signpars,"&");
$signpars.=$key;
return md5($signpars);
}
$params=["api_token"=>$api_token,"timestamp"=>$time,"gid"=>$gid,"num"=>$num,"value1"=>$value1,"value2"=>$value2,"value3"=>$value3,"value4"=>$value4,"value5"=>$value5,"value6"=>$value6];
$sign=getsign($params,$key);
//分割
$url="http://".$domain.".api.94sq.cn/api/order";
$post="api_token=".$api_token."&timestamp=".$time."&sign=".$sign."&gid=".$gid."&num=".$num."&value1=".$value1."&value2=".$value2."&value3=".$value3."&value4=".$value4."&value5=".$value5."&value6=".$value6."";
$data=curl($url,$post);
$json=json_decode($data,true);
if($json["status"]=="0")
{
echo json_encode(array("code"=>"0","value1"=>"".$value1."","num"=>"".$num."","id"=>"".json_decode('"'.$json["id"].'"').""),JSON_UNESCAPED_UNICODE);
}else{
echo json_encode(array("code"=>"1","msg"=>"".json_decode('"'.$json["message"].'"')."！"),JSON_UNESCAPED_UNICODE);
}
?>