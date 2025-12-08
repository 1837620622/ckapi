<?php
function generateRandomString($length = 10) { 
$characters = '1234567890qazwsxedcrfvtgbyhnujmikolpQAZWSXEDCRFVTGBYHNUJMIKOLP'; 
$randomString = ''; 
for ($i = 0; $i < $length; $i++) { 
$randomString .= $characters[rand(0, strlen($characters) - 1)]; 
} 
return $randomString; 
}
$aaa=generateRandomString(10);
header("Content-type: text/html; charset=utf-8");
$keya=$_GET["key"];
$time=$_GET["time"];
$qq=$_GET["qq"];
$hh=$_GET["hh"]?:"\n";
$jcry=date("Y-m-d");
$list=file_get_contents("secret.php");
include("key.php");
if($keya!=$key){
echo "对接的密钥错误！";
}else
if($qq==null||$qq<="10001"||$qq>="9999999999"){
echo "生成者QQ错误！";
}else
if($time<"1"){
echo "至少生成一个月！";
}else
if((floor($time)-$time)!=0||strpos($time,".")!=false){
echo "生成时间不是整数";
}else
$pattern = '/^\d+(\.\d+)?$/';
if(preg_match($pattern,$time)){
echo "生成卡密成功".$hh."卡密：".$aaa."".$hh."生成月数：".$time."个月".$hh."生成者扣：".$qq."".$hh."卡密状态：未使用".$hh."现在时间：".$jcry."".$hh."出现问题联系客服解决";
$myfile = fopen("secret.php", "w") or die("未知错误！");
fwrite($myfile,"$list\n【卡密：".$aaa."】〖生成者：".$qq."〗〔使用人：未使用〕『时间：".$time."』《状态：未使用》");
fclose($myfile);
}else{
echo "生成时间不是数字";
}
?>