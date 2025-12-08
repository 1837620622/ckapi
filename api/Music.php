<?php
include("./API.php");
tongji("Music");
$port=$_REQUEST["port"];//输(QQ/网易/酷狗)
$keyword=$_REQUEST["msg"];//需要搜索的歌曲名
$n=$_REQUEST["b"];//选择(序号)
if($port==null){
echo json(1009,"请输入查询的端口，参数:port，目前支持(music.qq.com/music.163.com/www.kugou.com/www.kuwo.cn)");
}else{
if($port=="163"|$port=="music.163.com"|$port=="网易")
{
$data=file_get_contents("http://s.music.163.com/search/get/?src=lofter&type=1&filterDj=true&s=".$keyword."&limit=50&offset=0");
$json=json_decode($data,true);
if($json["result"]["songs"][0]["id"]==null)
{
echo json(1001,"搜索失败，无相关内容");
}else if($n==null)
{
foreach($json["result"]["songs"] as $k=>$v){
if($_REQUEST["max"]!=null&&$k==$_REQUEST["max"])
{
break;
}
$array[($k+1)]="".$v["name"]."-".$v["artists"][0]["name"]."";
}
echo json(1000,array("port"=>"网易云音乐","keyword"=>$keyword,"list"=>$array,));
}else{
if($json["result"]["songs"][($n-1)]["id"]==null)
{
echo json(1002,"请按照序号选择");
}else{
$picture=$json["result"]["songs"][($n-1)]["album"]["picUrl"];
$songname=$json["result"]["songs"][($n-1)]["name"];
$singername=$json["result"]["songs"][($n-1)]["artists"][0]["name"];
$songid=$json["result"]["songs"][($n-1)]["id"];
$music=netease($songid);
if($music=="失败")
{
echo json(1003,"歌曲信息解析失败");
}else{
$array=array(
"port"=>"网易云音乐",
"id"=>$songid,
"song"=>$songname,
"singer"=>$singername,
"picture"=>$music["pic"],
"music"=>$music["url"],
);
echo json(1000,$array);
}
}
}
}else if($port=="music.qq.com"|$port=="qq"|$port=="QQ")
{
$str=file_get_contents("http://c.y.qq.com/soso/fcgi-bin/client_search_cp?aggr=0&cr=1&flag_qc=0&p=1&n=50&w=".$keyword."");
$str=str_replace("callback(","",$str);
$str=str_replace("})","}",$str);
$json=json_decode($str,true);
$list = $json["data"]["song"]["list"];
if ($json["code"] != 0) 
{
echo json(1002,"未知错误");
}else if(empty($list[0])) {
echo json(1003,"无搜索结果");
}else if($n==null)
{
foreach($list as $k=>$v){
if($_REQUEST["max"]!=null&&$k==$_REQUEST["max"])
{
break;
}
$array[($k+1)]="".$v["songname"]."-".$v["singer"][0]["name"]."";
}
echo json(1000,array("port"=>"QQ音乐","keyword"=>$keyword,"list"=>$array,));
}else{
$songmid=$json["data"]["song"]["list"][($n-1)]["songmid"];
$songsinger=$json["data"]["song"]["list"][($n-1)]["singer"][0]["name"];
$songname=$json["data"]["song"]["list"][($n-1)]["songname"];
$music=qq_songs($songmid);
$albumid=$json["data"]["song"]["list"][($n-1)]["albummid"];
$picture='http://y.gtimg.cn/music/photo_new/T002R150x150M000'.$albumid.'.jpg';
if($music=="失败")
{
echo json(1004,$songmid);
}else{
$song_data=array(
"port"=>"QQ音乐",
"id"=>$songmid,
"song"=>$songname,
"singer"=>$songsinger,
"picture"=>$picture,
"musicl"=>$music,
);
echo json(1000,$song_data);
}
}
}else if($port=="酷狗"|$port=="www.kuwo.com")
{
$data=curl('http://mobilecdnbj.kugou.com/api/v3/search/song?showtype=14&highlight=&pagesize=50&tag_aggr=1&plat=0&sver=5&correct=1&api_ver=1&version=9051&page=1&area_code=1&tag=1&with_res_tag=1&keyword='.$keyword);
$data=str_replace('<!--KG_TAG_RES_START-->','',$data);
$data=str_replace('<!--KG_TAG_RES_END-->','',$data);
$json = json_decode($data, true);
$slist=count($json["data"]["info"]);
if($slist==0)
{
echo json(1001,"无搜索结果");
}else if($n==null)
{
foreach($json["data"]["info"] as $k=>$v){
if($_REQUEST["max"]!=null&&$k==$_REQUEST["max"])
{
break;
}
$songname=$v["songname_original"];
$singername=$v["singername"];
$pay=$v["pay_type"];
if($pay=="0"){
$pay="[免费]";}else{
$pay="[收费]";
}
$array[($k+1)]="".$songname."-".$singername."".$pay."";
}
echo json(1000,array("port"=>"酷狗音乐","keyword"=>$keyword,"list"=>$array,));
}else{
$i=($n-1);
$songname=$json["data"]["info"][$i]["songname_original"];
$singername=$json["data"]["info"][$i]["singername"];
$hash=$json["data"]["info"][$i]["sqhash"];
if($hash==""){$hash=$json["data"]["info"][$i]["320hash"];}
$data=curl('http://kmrcdn.service.kugou.com/container/v1/image?appid=1005&clientver=10009&author_image_type=4,5&album_image_type=-3&data=[{"hash":"'.$hash.'","filename":"'.$json["data"]["info"][$i]["filename"].'","album_audio_id":'.$json["data"]["info"][$i]["album_audio_id"].'}]');
$json = json_decode($data, true);
$img=str_replace(array('{size}'), array('', ''), $json["data"][0]["album"][0]["sizable_cover"]);
$r = 'http://www.kugou.com/webkugouplayer/?isopen=0&chl=yueku_index';
$u = 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.146 Safari/537.36';
$data=curl('http://trackercdn.kugou.com/i/?cmd=4&hash='.$hash.'&key='.md5($hash . "kgcloud").'&pid=1&acceptMp3=1',0,array('IPHONE_UA'=>0,'REFERER'=>$r,'USERAGENT'=>$u));
$json = json_decode($data, true);
$url=$json["url"];
$pay = $json["data"]["info"][$i]["pay_type"];
if($url==""|$pay!=0){
echo json(1000,"抱歉，该歌曲不支持免费播放");}else{
//echo 'json:{"app":"com.tencent.structmsg","desc":"音乐","view":"music","ver":"0.0.0.1","prompt":"[分享]'.$ga.'","appID":"","sourceName":"","actionData":"","actionData_A":"","sourceUrl":"","meta":{"music":{"action":"","android_pkg_name":"","app_type":1,"appid":100497308,"desc":"'.$gb.'","jumpUrl":"http://www.xiaoapi.cn","musicUrl":"'.$url.'","preview":"'.$img.'","sourceMsgId":"0","source_icon":"","source_url":"","tag":"酷狗音乐","title":"'.$ga.'"}},"config":{"autosize":true,"ctime":1575625127,"forward":true,"token":"7fe
$songdata=array(
"port"=>"酷狗音乐",
"id"=>$keyword,
"song"=>$songname,
"singername"=>$singername,
"picture"=>$img,
"music"=>$url,
);
echo json(1000,$songdata);
}
}
}else if($port="酷我"|$port=="www.kuwo.cn")
{
$data=file_get_contents("http://search.kuwo.cn/r.s?client=kt&pn=0&rn=50&uid=1179647890&ver=kwplayer_ar_9.2.7.1&vipver=1&show_copyright_off=1&newver=1&correct=1&ft=music&cluster=0&strategy=2012&encoding=utf8&rformat=json&vermerge=1&mobi=1&issubtitle=1&all=".$keyword."");
$json=json_decode($data,true);
if($json["abslist"][0]["FARTIST"]==null)
{
echo json(1001,"无搜索结果");
}else if($n==null)
{
foreach($json["abslist"] as $k=>$v)
{
if($_REQUEST["max"]!=null&&$k==$_REQUEST["max"])
{
break;
}
$array[($k+1)]="".$v["SONGNAME"]."-".$v["FARTIST"]."";
}//foreach
echo json(1000,array("port"=>"酷我音乐","keyword"=>$keyword,"list"=>$array,));
}else{
$singername=$json["abslist"][($n-1)]["FARTIST"];
$songname=$json["abslist"][($n-1)]["SONGNAME"];
$songID=$json["abslist"][($n-1)]["MUSICRID"];
$songID=str_replace("MUSIC_","",$songID);
$picture=file_get_contents("http://artistpicserver.kuwo.cn/pic.web?user=867401041651110&android_id=f243cc2225eac3c9&prod=kwplayer_ar_9.2.8.1&corp=kuwo&source=kwplayer_ar_9.2.8.1_qq.apk&type=rid_pic&pictype=url&content=list&size=320&rid=".$songID."");
$music=file_get_contents("http://antiserver.kuwo.cn/anti.s?type=convert_url&rid=".$songID."&format=aac|mp3&response=url");
$songdata=array(
"port"=>"酷我音乐",
"id"=>$keyword,
"song"=>$songname,
"singername"=>$singername,
"picture"=>$picture,
"music"=>$music,
);
echo json(1000,$songdata);
}
}else{
echo json(1008,"当前端口有误，目前支持(music.qq.com/music.163.com/www.kugou.com/www.kuwo.cn)，输入想要网址即可");
}
}

/*
if($port=="咪咕"|$port=="music.migu.cn")
{
$data=file_get_contents("https://m.music.migu.cn/migu/remoting/scr_search_tag?rows=50&type=2&keyword=".$keyword."&pgc=1");
$json=json_decode($data,true);
if($json["music"][0]["songName"]==null)
{
echo json(1000,"无搜索结果");
}else if($n==null)
{
foreach($json["music"] as $k=>$v)
{
if($_REQUEST["max"]!=null&&$k==$_REQUEST["max"])
{
break;
}
$array[($k+1)]="".$v["songName"]."-".$v["singerName"]."";
}//foreach
echo json(1000,array("port"=>"咪咕音乐","keyword"=>$keyword,"list"=>$array,));
}else{
$songname=$json["music"][($n-1)]["songName"];
$singername=$json["music"][($n-1)]["singerName"];
$picture=$json["music"][($n-1)]["cover"];
$music=$json["music"][($n-1)]["mp3"];
$songdata=array(
"port"=>"咪咕音乐",
"id"=>$keyword,
"song"=>$songname,
"singername"=>$singername,
"picture"=>$picture,
"music"=>$music,
);
echo json(1000,$songdata);
}
}
*/
//function区

function netease($id)
{
$data=json_decode(curl("http://music.163.com/api/song/detail/?id=".$id."&ids=%5B".$id."%5D&csrf_token="),true);
if(!$data["songs"][0]["id"]){
return "失败";
}
$data_msg=get_headers("http://music.163.com/song/media/outer/url?id=".$data["songs"][0]["id"].".mp3",1);
if($data_msg["Location"][0]!="http://music.163.com/404") {
return array("url"=>$data_msg["Location"],"pic"=>$data["songs"][0]["album"]["blurPicUrl"],);
} else {
return "失败";
}
}

function qq_songs($midsong)
{
$request_mid=$midsong;
$dataqq=music_curl("https://api.qq.jsososo.com/song/urls?id=" . urlencode($request_mid));
$jsonqq=json_decode($dataqq, true);
$lj=str_replace('&', '&amp;', $jsonqq["data"][$request_mid]);
if($request_mid==null)
{
return "失败";
}else{
if($lj==null|$aa=="'+a+'")
{
return "失败";
}else{
return $lj;
}
}
}

function music_curl($url, $post = 0, $referer = 1, $cookie = 0, $header = 0, $ua = 0, $nobaody = 0) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    $httpheader[] = "Accept:*/*";
    $httpheader[] = "Accept-Encoding:gzip,deflate,sdch";
    $httpheader[] = "Accept-Language:zh-CN,zh;q=0.8";
    $httpheader[] = "Connection:close";
    curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    if ($post) {
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    }
    if ($header) {
        curl_setopt($ch, CURLOPT_HEADER, TRUE);
    }
    if ($cookie) {
        curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    }
    if ($referer) {
        if ($referer == 1) {
            curl_setopt($ch, CURLOPT_REFERER, $_SERVER['HTTP_HOST']);
        } else {
            curl_setopt($ch, CURLOPT_REFERER, $referer);
        }
    }
    if ($ua) {
        curl_setopt($ch, CURLOPT_USERAGENT, $ua);
    } else {
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Linux; Android 4.4.2; NoxW Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/30.0.0.0 Mobile Safari/537.36');
    }
    if ($nobaody) {
        curl_setopt($ch, CURLOPT_NOBODY, 1);
    }
    curl_setopt($ch, CURLOPT_ENCODING, "gzip");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $ret = curl_exec($ch);
    curl_close($ch);
    return $ret;
}

function Music_Collect($key)
{
$route="./data/Music/".$key.".txt";
if(!file_exists($route))
{
file_put_contents($route,1);
}else{
$tongji=file_get_contents($route);
file_put_contents($route,($tongji+1));
}
}