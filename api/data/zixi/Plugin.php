<?php


function get($url){
$ip=ip();
$header =[
"CLIENT-IP: $ip",
"X-FORWARDED-FOR: $ip",
'User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.106 Safari/537.36',
];
$curl=curl_init();
$ua='Mozilla/5.0 (compatible; Baiduspider/2.0; +http://www.baidu.com/search/spider.html)';
curl_setopt($curl,CURLOPT_URL,$url);
curl_setopt($curl,CURLOPT_HTTPHEADER,$header);
curl_setopt($curl,CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
curl_setopt($curl,CURLOPT_REFERER,"http://www.baidu.com");
curl_setopt($curl,CURLOPT_USERAGENT,$ua);
curl_setopt($curl,CURLOPT_TIMEOUT,20);
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($curl,CURLOPT_SSL_VERIFYHOST, FALSE);
$result=curl_exec($curl);
curl_close($curl);
return $result;
}



function stop(){
exit();
}


function ip()
{
$ip_long = array(
array('607649792', '608174079'),
array('1038614528', '1039007743'),
array('1783627776', '1784676351'),
array('2035023872', '2035154943'),
array('2078801920', '2079064063'),
array('-1950089216', '-1948778497'),
array('-1425539072', '-1425014785'),
array('-1236271104', '-1235419137'),
array('-770113536', '-768606209'),
array('-569376768', '-564133889'),
);
$rand_key=mt_rand(0,9);
return $ip=long2ip(mt_rand($ip_long[$rand_key][0], $ip_long[$rand_key][1]));
}