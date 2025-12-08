<?php
include("./API.php");
include("../tianyi.php");
tongji("kgmv");
$msg = $_GET['msg'];//需要搜索的歌曲名
$b = $_GET['b'];//选择(序号)
$hh=$_GET['hh']?:"\n";//换行符号(默认\n)
$url = "http://mvsearch.kugou.com/mv_search?keyword=".$msg."&page=1&pagesize=30&userid=-1&clientver=&platform=WebFilter&tag=em&filter=10&iscorrection=1&privilege_filter=0&_=".time()."";
$r = 'http://www.kugou.com/webkugouplayer/?isopen=0&chl=yueku_index';
$u = 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.146 Safari/537.36';
$data = curl_get($url,array('IPHONE_UA'=>0,'REFERER'=>$r,'USERAGENT'=>$u));

$data=str_replace('<em>','',$data);
$data=str_replace('<\/em>','',$data);
$result = preg_match_all('/"MvName":"(.*?)","MvID":(.*?),"IsNew":(.*?),"FileSize":(.*?),"Scid":(.*?),"Description":"(.*?)","AlbumID":"(.*?)","FileName":"(.*?)","Isshort":(.*?),"AudioID":"(.*?)","Remark":"(.*?)","MvHashMark":"(.*?)","SingerName":"(.*?)","IsUgc":(.*?),"MvHash":"(.*?)"/',$data,$trstr);//"MvName":"&lt;em&gt;9420&lt;\/em&gt;","MvID":1442729,"IsNew":0,"FileSize":3667789,"Scid":29457338,"Description":"高甜小情歌，轻撩你的心","AlbumID":"14485566","FileName":"麦小兜 - &lt;em&gt;9420&lt;\/em&gt;","Isshort":0,"AudioID":"29457338","Remark":"","MvHashMark":"1080P","SingerName":"麦小兜","IsUgc":0,"MvHash":"58FE94B127B6AB937E6F257830F50D65"

if($result== 0){
echo "".$ming."API酷狗音乐MV".$hh."";
echo "━━━━━━━━━".$hh."";
echo "搜索不到与".$_GET["msg"]."的相关mv，请稍后重试或换个关键词试试。".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
if($b== null){
echo "".$ming."API酷狗音乐MV".$hh."";
echo "━━━━━━━━━".$hh."";
for( $i = 0 ; $i < $result && $i < 15 ; $i ++ )
{
$ga=$trstr[1][$i];//获取歌名
$gb=$trstr[13][$i];//获取歌手
echo ($i+1)."：".$ga."--".$gb."".$hh."";
}echo "".$hh."共搜索到与".$_GET["msg"]."的相关mv".$result."条，您可以点1～".$result."任一mv。";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
$i=($b-1);
$ga=$trstr[1][$i];//获取歌名
$gb=$trstr[13][$i];//获取歌手
$hash=$trstr[15][$i];//

$url="http://m.kugou.com/app/i/mv.php?cmd=100&hash=".$hash."&ismp3=1&ext=mp4";

$data = curl_get($url,array('IPHONE_UA'=>0,'REFERER'=>$r,'USERAGENT'=>$u));
//echo $data;
//{"timelength":235800,"play_count":1054257,"songname":"9420","id":1442729,"status":1,"remark":"","singer":"麦小兜","track":3,"error":"","mp3data":{"hash":"da4c068a9b6603d79ccae6dddbb68fe7","filesize":3667789,"timelength":229,"bitrate":128},"hash":"733EF5EB788BDBBD4BD11AD8917C306F","mvicon":"http:\/\/imge.kugou.com\/mvhdpic\/{size}\/20190718\/20190718104927222203.jpg","type":2,"is_publish":1,"mvdata":{"sq":{"downurl":"http:\/\/fs.mv.web.kugou.com\/201912211618\/d278373713c8d02d339290d4000f8efb\/G168\/M01\/11\/05\/SIcBAF0u3NqAP3BnA8HGttyiDOg685.mp4","bitrate":2138283,"backupdownurl":["http:\/\/fs.mv.web2.kugou.com\/201912211618\/fc721fae6187345ed12568c026c43fd6\/G168\/M01\/11\/05\/SIcBAF0u3NqAP3BnA8HGttyiDOg685.mp4"],"hash":"d56652433a0875ede451ef37ad3e4cc0","timelength":235800,"filesize":63030966},"le":{"downurl":"http:\/\/fs.mv.web.kugou.com\/201912211618\/3f38e92dfdcda888519ba6ae5d6c72ea\/G168\/M09\/1F\/03\/SIcBAF0u3MuASwR7AOdHTVtSHfs694.mp4","bitrate":514193,"backupdownurl":["http:\/\/fs.mv.web2.kugou.com\/201912211618\/bf596aad4687e43feb2ecf3e27a40532\/G168\/M09\/1F\/03\/SIcBAF0u3MuASwR7AOdHTVtSHfs694.mp4"],"hash":"733ef5eb788bdbbd4bd11ad8917c306f","timelength":235800,"filesize":15157069},"rq":{"downurl":"http:\/\/fs.mv.web.kugou.com\/201912211618\/15707824003d0810c352d9d0cc6723d5\/G166\/M07\/03\/05\/hpQEAF0u3O6ARzfrB0zyu51EJJM877.mp4","bitrate":4155166,"backupdownurl":["http:\/\/fs.mv.web2.kugou.com\/201912211618\/d73753b210e4185c9d52eb5f64658bb5\/G166\/M07\/03\/05\/hpQEAF0u3O6ARzfrB0zyu51EJJM877.mp4"],"hash":"92a7500678e5123c6286747e878ce2f4","timelength":235800,"filesize":122483387}},"errcode":0}

preg_match_all('/"mvicon":"(.*?)"/',$data,$img);
$img=$img[1][0];
$img=str_replace(array('{size}'), array('', ''), $img);
$img=str_replace('\\/','/',$img);
if($img==""){$img="http://".$_SERVER['HTTP_HOST']."/api/kg.jpg";}
//"backupdownurl":["http:\/\/fs.mv.web2.kugou.com\/201912211618\/d73753b210e4185c9d52eb5f64658bb5\/G166\/M07\/03\/05\/hpQEAF0u3O6ARzfrB0zyu51EJJM877.mp4"
$s=preg_match_all('/"backupdownurl":\["(.*?)"/',$data,$data);
$data=$data[1][($s
-1)];
$data=str_replace('\\/','/',$data);

if($_GET['type']=="json"){
echo 'json:{"app":"com.tencent.structmsg","desc":"音乐","view":"music","ver":"0.0.0.1","prompt":"[分享]'.$ga.'","appID":"","sourceName":"","actionData":"","actionData_A":"","sourceUrl":"","meta":{"music":{"action":"","android_pkg_name":"","app_type":1,"appid":100497308,"desc":"'.$gb.'","jumpUrl":"'.$data.'","musicUrl":"'.$data.'","preview":"'.$img.'","sourceMsgId":"0","source_icon":"","source_url":"","tag":"点卡片看mv点↗播放mp3","title":"'.$ga.'"}},"config":{"autosize":true,"ctime":1575625127,"forward":true,"token":"7fef9b7d1e63b3500a42462126e9bc3d","type":"normal"},"text":"","sourceAd":""}';
exit;}
echo "".$ming."API酷狗音乐MV".$hh."";
echo "━━━━━━━━━".$hh."";
echo "图片：".$img."".$hh."";
echo "歌曲：".$ga."".$hh."";
echo "歌手：".$gb."".$hh."";
echo "播放链接：".$data."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}}
function curl_get($url, $array=array()){
$defaultOptions = array(
'IPHONE_UA'=>1,
'SSL'=>0,
'TOU'=>0,
'ADD_HEADER_ARRAY'=>0,
'POST'=>0,
'REFERER'=>0,
'USERAGENT'=>0,
'CURLOPT_FOLLOWLOCATION'=>0);
$array = array_merge($defaultOptions, $array);
$ch = curl_init($url);
if($array['SSL']){
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);}
if($array['IPHONE_UA']){
curl_setopt($ch, CURLOPT_HTTPHEADER, array('User-Agent: Mozilla/5.0 (iPhone; U; CPU iPhone OS 3_1_2 like Mac OS X; en-us) AppleWebKit/528.18 (KHTML, like Gecko) Version/4.0 Mobile/7D11 Safari/528.16'));
}if(is_array($array['ADD_HEADER_ARRAY'])){
curl_setopt($ch, CURLOPT_HTTPHEADER, $array['ADD_HEADER_ARRAY']);
}if ($array['POST']){
curl_setopt($ch, CURLOPT_POSTFIELDS, $array['POST']);
}if ($array['REFERER']){
curl_setopt($ch, CURLOPT_REFERER, $array['REFERER']);
}if($array['USERAGENT']){
curl_setopt($ch, CURLOPT_USERAGENT, $array['USERAGENT']);
}if($array['TOU']){
curl_setopt($ch, CURLOPT_HEADER, 1); //输出响应头
}if($array['CURLOPT_FOLLOWLOCATION'])
{
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);//自动跟踪跳转的链接 
}
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$get_url = curl_exec($ch);
curl_close($ch);
return $get_url;}
?>