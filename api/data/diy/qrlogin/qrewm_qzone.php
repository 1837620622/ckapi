<?php
$time=time();
$port="101487368";
$url='https://ssl.ptlogin2.qq.com/ptqrshow?appid=716027609&e=2&l=M&s=3&d=72&v=4&t=0.'.$time.'&daid=383&pt_3rd_aid='.$port;
$header=array("User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36","Referer: https://xui.ptlogin2.qq.com/cgi-bin/xlogin?appid=716027609&daid=383&style=33&theme=2&login_text=%E6%8E%88%E6%9D%83%E5%B9%B6%E7%99%BB%E5%BD%95&hide_title_bar=1&hide_border=1&target=self&s_url=https%3A%2F%2Fgraph.qq.com%2Foauth2.0%2Flogin_jump&pt_3rd_aid=".$port."&pt_feedback_link=https%3A%2F%2Fsupport.qq.com%2Fproducts%2F77942%3FcustomInfo%3Dwww.qq.com.appid101487368");
$data=curl($url,null,$header);
preg_match('/qrsig=(.*?);/',$data['header'],$match);
file_put_contents("img/".$time.".jpg",$data["exec"]);
$data=json_encode(array("code"=>200,"picurl"=>"http://".$_SERVER['HTTP_HOST']."/api/data/diy/qrlogin/img/".$time.".jpg","qrsig"=>$match[1]));
$data=str_replace("\/",'/',$data);
echo $data;
function getip_user() {
	if(empty($_SERVER["HTTP_CLIENT_IP"]) == false) {
		$cip = $_SERVER["HTTP_CLIENT_IP"];
	} else if(empty($_SERVER["HTTP_X_FORWARDED_FOR"]) == false) {
		$cip = $_SERVER["HTTP_X_FORWARDED_FOR"];
	} else if(empty($_SERVER["REMOTE_ADDR"]) == false) {
		$cip = $_SERVER["REMOTE_ADDR"];
	} else {
		$cip = "";
	}
	preg_match("/[\d\.]{7,15}/", $cip, $cips);
	$cip = isset($cips[0]) ? $cips[0] : "";
	unset($cips);
	return $cip;
}

function curl($url,$data=0,$header_array=0,$referer=0,$time=30,$code=0) {
	if($header_array==0) {
		$header=array("CLIENT-IP: ".getip_user(),"X-FORWARDED-FOR: ".getip_user(),'User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.106 Safari/537.36');
	} else {
		$header=array("CLIENT-IP: ".getip_user(),"X-FORWARDED-FOR: ".getip_user());
		$header=array_merge($header_array,$header);
	}
	//print_r($header);
	$curl=curl_init();
	curl_setopt($curl,CURLOPT_URL,$url);
	curl_setopt($curl,CURLOPT_HTTPHEADER,$header);
	if($data) {
		curl_setopt($curl,CURLOPT_POST,1);
		curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
	}
	if($referer) {
		curl_setopt($curl,CURLOPT_REFERER,$referer);
	}
	curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 3);
	//设置等待时间
	curl_setopt($curl,CURLOPT_TIMEOUT,$time);
	curl_setopt($curl,CURLOPT_FOLLOWLOCATION,1);
	curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($curl,CURLOPT_SSL_VERIFYHOST, FALSE);
	curl_setopt($curl,CURLOPT_ENCODING,'gzip,deflate');
		curl_setopt($curl, CURLOPT_HEADER, 1);
		$return=curl_exec($curl);
		$code_code=curl_getinfo($curl);
		curl_close($curl);
		$code_int['exec']=substr($return,$code_code["header_size"]);
		$code_int['code']=$code_code["http_code"];
		$code_int['content_type']=$code_code["content_type"];
		$code_int['header']=substr($return,0,$code_code["header_size"]);
		return $code_int;
}