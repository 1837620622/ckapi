<?php
include("./API.php");
tongji("qqyy");
$msg = $_GET['msg'];//需要搜索的歌曲名
$b = $_GET['b'];//选择(序号)
if(!$msg){
exit("参数不合法，请检查msg参数。");
}
echo qq($msg,$b);




function qq($msg,$b){
$str=get_curl("https://c.y.qq.com/soso/fcgi-bin/client_search_cp?ct=24&qqmusic_ver=1298&new_json=1&remoteplace=txt.yqq.top&searchid=61951020635055265&t=0&aggr=1&cr=1&catZhida=1&lossless=0&flag_qc=0&p=1&n=15&w=".$msg."&_=1625973490853&cv=4747474&ct=24&format=json&inCharset=utf-8&outCharset=utf-8&notice=0&platform=yqq.json&needNewCode=0&uin=0&g_tk_new_20200303=5381&g_tk=5381&hostUin=0&loginUin=0");
$json = json_decode($str, true);
$s=count($json["data"]["song"]["list"]);
if($s==0){
return "搜索不到与".$msg."的相关歌曲，请稍后重试或换个关键词试试。";
}
if($b==null){

for( $i = 0 ; $i < $s && $i < 20 ; $i ++ ){
$ga=$json["data"]["song"]["list"][$i]["name"];
$gb=$json["data"]["song"]["list"][$i]["singer"][0]["name"];
$pay=$json["data"]["song"]["list"][$i]["pay"]["pay_play"];
if($pay=="0"){$pay="[免费]";}else{$pay="[收费]";}
$b.=($i+1)."、".$ga."--".$gb."".$pay."\n";
}
return $b."共搜索到与".$msg."的相关歌曲".$s."条。\n";
return "提示：发送以上序号选择，例：选QQ音乐 1";
}else{
$i=$b-1;
$song=$json["data"]["song"]["list"][$i]["name"];
$singer=$json["data"]["song"]["list"][$i]["singer"][0]["name"];
$pic="http://y.gtimg.cn/music/photo_new/T002R180x180M000".$json["data"]["song"]["list"][$i]["album"]["mid"].".jpg";
$url=bf($json["data"]["song"]["list"][$i]["mid"]);
$json = json_decode($url, true);
if($json["code"]=="1"){

return "图片：".$pic."\n歌名：".$song."\n歌手：".$singer."\n播放链接：".$json["key"];

//return 'json:{"app":"com.tencent.structmsg","desc":"音乐","view":"music","ver":"0.0.0.1","prompt":"[分享]'.$song.'","appID":"","sourceName":"","actionData":"","actionData_A":"","sourceUrl":"","meta":{"music":{"action":"","android_pkg_name":"","app_type":1,"appid":100495085,"desc":"'.$singer.'","jumpUrl":"'.$json["key"].'","musicUrl":"'.$json["key"].'","preview":"'.$pic.'","sourceMsgId":"0","source_icon":"","source_url":"","tag":"QQ音乐","title":"'.$song.'"}},"config":{"autosize":true,"ctime":1630158075,"forward":true,"token":"34d200bad56f2bb9f86ff045f6756d7c","type":"normal"},"text":"","sourceAd":"","extra":"{\"app_type\":1,\"appid\":100495085,\"msg_seq\":7474425455904433120,\"uin\":351722294}"}';

    
    
    
    
    
}else{
    return $json["key"];
}
}
}





function bf($id) {
list($usec, $sec) = explode(" ", microtime());
$msec=round($usec*1000);
$t = get_millisecond();
$msec = round((mt_rand()/mt_getrandmax())*2147483647) * $t % 10000000000;
//注：勿动128至130行处，否则付费将不可听
$cookie=get_curl("http://api.suol.cc/key.php?type=qq&token=U3hQJ11tUXheaQVoW25UclM1XnRTaAo7BjIHaAwnVTZTMwV9XDcHbV0jVGVRNwc5XDNeZVZlDTxXZl4iAykDc1NyUHRdJFE2XjMFNFszVGlTO15mU2gKOQY1B24MJlUlU2kFJFxuBzddZlR2UTsHIVwyXmZWbQ09V3xeMQM0A3xTM1AzXSZRPV42BT9bOFRjUzVeZlNtCikGfQ==");
$json = json_decode($cookie, true);
if($json["code"]=="1"){
$key=$json["key"];
$post='{"comm":{"uin":"1828222534","authst":"'.$key.'","mina":1,"appid":1109523715,"ct":29},"midReq":{"module":"track_info.UniformRuleCtrlServer","method":"GetTrackInfo","param":{"mids":["001HlbWF0AYO5G"],"types":[0],"singer_pmid":1}},"urlReq0":{"module":"vkey.GetVkeyServer","method":"CgiGetVkey","param":{"guid":"'.$msec.'","songmid":["'.$id.'"],"songtype":[0],"filename":[],"uin":"1828222534","loginflag":1,"platform":"23","h5to":"speed"}},"cdnReq":{"module":"CDN.SrfCdnDispatchServer","method":"GetCdnDispatch","param":{}}}';
$curl=curl_init();
curl_setopt($curl,CURLOPT_URL,"https://u.y.qq.com/cgi-bin/musicu.fcg");
curl_setopt($curl,CURLOPT_POST,1);
curl_setopt($curl,CURLOPT_POSTFIELDS,$post);
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($curl,CURLOPT_SSL_VERIFYHOST, FALSE);
curl_setopt($curl,CURLOPT_REFERER,'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.30 Safari/537.36');
curl_setopt($curl,CURLOPT_COOKIE,'qqmusic_uin=12345678; qqmusic_key=12345678; qqmusic_fromtag=30; ts_last=y.qq.com/portal/player.html;');
curl_setopt($curl,CURLOPT_USERAGENT,"http://y.qq.com/portal/player.html");
curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
$result=curl_exec($curl);
curl_close($curl);
//return $result;
$json = json_decode($result, true);
$l=$json["urlReq0"]["data"]["midurlinfo"][0]["purl"];
if(!$l){$l=$json["urlReq0"]["data"]["testfile2g"];}
$l="http://isure.stream.qqmusic.qq.com/".$l;
$json['code']=1;
            $json['key']=$l;
            $json=json_encode($json,JSON_UNESCAPED_UNICODE);
            return $json;
}else{
    $json['code']=0;
            $json['key']=$json["key"];
            $json=json_encode($json,JSON_UNESCAPED_UNICODE);
    return $json;}
}








function get_millisecond(){
list($usec, $sec) = explode(" ", microtime());
$msec=round($usec*1000);
return $msec;
}

function get_curl($url,$post=0,$referer=1,$cookie=0,$header=0,$ua=0,$nobaody=0){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	if(stripos($url, "https://") !== false) {
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, true);
	curl_setopt($ch, CURLOPT_SSLVERSION, 1);
	}
	$httpheader[] = "Accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8";
	$httpheader[] = "Accept-Encoding:gzip,deflate";
	$httpheader[] = "Accept-Language:zh-CN,zh;q=0.9";
	$httpheader[] = "Connection:close";
	curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
	curl_setopt($ch, CURLOPT_TIMEOUT, 5);
	@curl_setopt($curl,CURLOPT_REFERER,'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.30 Safari/537.36');
@curl_setopt($curl,CURLOPT_COOKIE,'qqmusic_uin=12345678; qqmusic_key=12345678; qqmusic_fromtag=30; ts_last=y.qq.com/portal/player.html;');
@curl_setopt($curl,CURLOPT_USERAGENT,"http://y.qq.com/portal/player.html");
	if($post){
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
	}
	if($header){
		curl_setopt($ch, CURLOPT_HEADER, TRUE);
	}
	if($cookie){
		curl_setopt($ch, CURLOPT_COOKIE, $cookie);
	}
	if($referer){
		if($referer==1){
			curl_setopt($ch, CURLOPT_REFERER,$_SERVER['HTTP_HOST']);
		}else{
			curl_setopt($ch, CURLOPT_REFERER, $referer);
		}
	}
	if($ua){
		curl_setopt($ch, CURLOPT_USERAGENT,$ua);
	}else{
		curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; Android 6.0.1; OPPO R9s Build/MMB29M; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/55.0.2883.91 Mobile Safari/537.36');
	}
	if($nobaody){
		curl_setopt($ch, CURLOPT_NOBODY,1);
	}
	curl_setopt($ch, CURLOPT_ENCODING, "gzip");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	$ret = curl_exec($ch);
	if (curl_errno($ch)) {
		return '[内部错误]'.curl_error($ch);//捕抓异常
	}else{
		return $ret;
	}
	curl_close($ch);
}




?>