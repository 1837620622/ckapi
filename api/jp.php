<?php
include("./API.php");
include("../tianyi.php");
tongji("jp");
$msg=$_GET["msg"];//要举牌的字
$a=$_GET["a"];
$b=$_GET["b"];
$c=$_GET["c"];
$d=$_GET["d"];
function post_data_test($url,$data){
$curl = curl_init(); 
curl_setopt($curl, CURLOPT_URL, $url); 
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); 
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 1);
curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); 
curl_setopt($curl, CURLOPT_POST, 1); 
curl_setopt($curl, CURLOPT_POSTFIELDS, $data); 
curl_setopt($curl, CURLOPT_TIMEOUT, 30); 
curl_setopt($curl, CURLOPT_HEADER, 0); 
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl); 
if (curl_errno($curl)) {
echo '错误信息;'.curl_error($curl);
}
curl_close($curl); 
return $result; 
}
$ar=mt_rand(180,200);
$url="http://jiqie.zhenbi.com/p/re19.php";
$data="id=".$msg."&idi=jiqie&id1=".$ar."&id2=5&id3=53Z&id4=#FF0000&id5=#FF0000&id6=#E7E8ED";
$data=post_data_test($url,$data);
preg_match_all("/src=\"(.*?)\"/",$data,$data);
echo "±img=".$data[1][0]."±";
?>