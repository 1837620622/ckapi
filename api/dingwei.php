<?php
include("./API.php");
include("../tianyi.php");
tongji("dingwei");
$ip = $_GET["ip"];//需要查询的IP地址
$A = file_get_contents("http://whois.pconline.com.cn/ipJson.jsp?callback=&ip=$ip");
$encode = mb_detect_encoding($A, array("ASCII",'UTF-8',"GB2312","GBK",'BIG5'));
$str_encode = mb_convert_encoding($A, 'UTF-8', $encode);
preg_match("/addr\":\"(.*?)\"/",$str_encode,$addr);
$B=urlencode($addr[1]);
$C = file_get_contents("https://apis.map.qq.com/jsapi?qt=geoc&key=UGMBZ-CINWR-DDRW5-W52AK-D3ENK-ZEBRC&output=jsonp&pf=jsapi&ref=jsapi&cb=&addr=$B");
$D = mb_convert_encoding($C, 'UTF-8', $encode);
preg_match("/pointx\":\"(.*?)\"/",$D,$X_zb);
preg_match("/pointy\":\"(.*?)\"/",$D,$Y_zb);
echo 'json:{"app":"com.tencent.map","desc":"'.$ming.'API的地图","view":"LocationShare","ver":"0.0.0.1","prompt":"[应用]地图","meta":{"Location.Search":{"id":"","name":"位置分享","address":"'.$addr[1].'","lat":"'.$Y_zb[1].'","lng":"'.$X_zb[1].'","from":"plusPanel"}},"config":{"forward":1,"autosize":1,"type":"card"}}';