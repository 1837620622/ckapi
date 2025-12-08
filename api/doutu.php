<?php
include("./API.php");
tongji("doutu");
if($_GET['msg']==""){echo "抱歉，请输入内容！";}else{
function post_data_test($url,$data){
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
$header = array(
'User-Agent' => 'Mozilla/5.0(Linux;Android8.1.0;16th Plus Build/OPM1.171019.026;wv)AppleWebKit/537.36(KHTML,like Gecko)Version/4.0Chrome/66.0.3359.126MQQBrowser/6.2TBS/044506Mobile Safari/537.36V1_AND_SQ_7.9.9_1010_YYB_DQQ/7.9.9.3965NetType/WIFI WebP/0.3.0Pixel/1080StatusBarHeight/90');

curl_setopt($curl,CURLOPT_HTTPHEADER,$header);
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
curl_setopt($curl, CURLOPT_TIMEOUT, 30);
curl_setopt($curl, CURLOPT_HEADER, 0);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
if (curl_errno($curl))
{
echo '错误信息;'.curl_error($curl);
}
curl_close($curl);
return $result;
}
$data='';
$url = 'http://input.shouji.sogou.com/SogouServlet?cmd=expressionsearch&keyword='.$_GET['msg'].'&start=0&end=5&os=android';
$a = post_data_test($url,$data);
$s = preg_match_all('/<imagelink>(.*?)</',$a,$x);
$i=rand(0,5);
@$l=$x[1][$i];
if($s==0){echo "抱歉，获取数据出错了！";}else{
echo $l;}}
?>