<?php
//网易点歌
error_reporting(0);
header("content-type:text/html;charset=utf-8");
$msg=$_GET["msg"];
$xg=$_GET["n"];
$r=$_GET["r"];
$g=$_GET["g"];
$qq=$_GET["qq"];
$key=$_GET["key"];
$hh=$_GET["hh"]?:"\n";
$output_file='yingyuebfqs/';


$yd=$qq."q239034606";
$wm=$output_file."".md5($yd);


if($r=="ykey")
{
$json = file_get_contents($output_file.$key);// 从文件中读取数据到PHP变量

$data = json_decode($json,true);// 把JSON字符串转成PHP数组
$sl=count($data["songIds"]);
if($sl!=0){
echo $e="var playerName = '测试',autoPlayer = 1,randomPlayer = 1,defaultVolume = 75,showLrc = 1,greeting = '欢迎访问本站！',";
echo $e="showGreeting = 1,defaultAlbum = 1,siteName = '天一API',background = 1,playerWidth = -1,coverWidth = -1,showNotes = 1,autoPopupPlayer = -1;";
echo $e="var songSheetList = [".$json."]";
exit;
}
$yd="110"."q239034606";
$wm=$output_file."".md5($yd);
$json = file_get_contents($wm);// 从文件中读取数据到PHP变量
echo $e="var playerName = '测试啊',autoPlayer = 1,randomPlayer = 1,defaultVolume = 75,showLrc = 1,greeting = '欢迎访问本站！',";
echo $e="showGreeting = 1,defaultAlbum = 1,siteName = '天一API',background = 1,playerWidth = -1,coverWidth = -1,showNotes = 1,autoPopupPlayer = -1;";
echo $e="var songSheetList = [".$json."]";
//echo "干嘛";
//echo md5($yd);
//返回key
exit;
}

//文件目录
if(file_exists($wm))
{
}
else{
$json='{"songSheetName":"天一API","author":"天一API","songIds":[],"songNames":[],"songTypes":[],"albumNames":[],"artistNames":[],"albumCovers":[]}';
@file_put_contents($wm,$json);//写入
}




if(!$qq||!$r)exit("请携带信息方式");


@mkdir($output_file,0777,true);




if($r==55)
{
echo gdxg($wm,null,$msg);//作者名
exit;
}


if($r==66)
{
echo gdxg($wm,1,$msg);//歌单名
exit;
}

if($r=="key。")
{
//echo "干嘛";
echo md5($yd);
//返回key
exit;
}

if($r=="key")
{
$ym=$_SERVER["HTTP_HOST"];
//echo "干嘛";
echo '<script id="ilt"src="http://'.$ym.'/api/wzmusic/k.js"key="'.md5($yd).'"></script>';
//echo md5($yd);
//返回key
exit;
}



if($r=="3")//移除
{
if(!$xg)exit("请携带信息n");
echo gqjqc($wm,$xg);
//移除
exit;
}


if($r=="4")//列表
{
$json_string = file_get_contents($wm);// 从文件中读取数据到PHP变量
$data = json_decode($json_string,true);// 把JSON字符串转成PHP数组
$sl=count($data["songIds"]);
//@var_dump($data);
$ii=0;
foreach($data['albumNames'] as $key=>$val){
$gm=$data['albumNames'][$ii];
$gs=$data['artistNames'][$ii];
//artistNames
echo $ii+(1)."-".$gm."-".$gs."".$hh."";
//echo $val;
$ii=$ii+1;
}
echo "当前你的音乐列表";
//移除
exit;
}



if($g==""||$g==null)
{
$g = 11-1;//打印10次
}


if(!$msg)exit("你想搜索什么呢？");

$aa=encode_netease_data([
 'method'  => 'POST',
 'url'  => 'http://music.163.com/api/cloudsearch/pc',
 'params'  => [
  's'=> "$msg",
  'type'=> 1,
  'offset' => 1 * 10 - 10,
  'limit'  => "$g"
 ]
]);

$url="http://music.163.com/api/linux/forward";

$post="eparams=".$aa["eparams"];

$str=curl_post_https($url,$post,null);
$json = json_decode($str, true);
$xa=$json["code"];//判断有无歌曲
$bb=$json["result"]["songs"];//解析数组
$cc=$bb["album"]["picUrl"];//图
$d=$json["result"];
$e=$d["songCount"];
if($e== null)
{
echo "找不到这首歌";

exit;
}
if($xg== null)
{
for( $i = 0 ; $i < count($bb) && $i < $g ; $i ++ )
{
$aa=$json["result"]["songs"][$i];
$b=$aa["ar"];
$a= $aa["name"];//名
//$b=$b["name"];//手
$c=$aa["al"]["picUrl"];//图
//print_r($e);

foreach($b as $o) {


$b=$o["name"]."&".$b;//手
}
$b=str_replace('&Array','',$b);
echo ($i+1)."：".$a."–".$b."".$hh."";
}
echo "🎶网易搜到了".$i."首💝"."".$hh."🎀网站音乐播放器🎵";
}
else
{
$i=($xg-1);
$aa=$json["result"]["songs"][$i];
$a= $aa["name"];//名
$c=$aa["al"]["picUrl"];//图
$d=$aa["id"];//id
$b=$aa["ar"];
$bo=$aa["al"]["name"];//来源
foreach($b as $o) {
$b=$o["name"];
//."&".$b;//手
}

$bp=str_replace('&Array','',$b);
//."：".$bo;

if($bp==null)
{
echo "对不起哦，列表中没有序号为『".$xg."』的歌曲";
}
else
{

$gqm=$a;
$gqgs=$bp;
$gqly=$bo;
if($bo=="")
{
$gqly=$bp;
}
$ga=$a."-".$b;
$gqimg=$c;
$gqid=$d;
//$gurl="http://music.163.com/song/media/outer/url?id=$d";





if($r==1)
{
echo $gqm."-".$gqgs."/".gqjq($wm,$gqid,$gqly,"wy",$gqm,$gqgs,$gqimg);
//添加前面
}

if($r==2)
{
echo $gqm."-".$gqgs."/".gqjqx($wm,$gqid,$gqly,"wy",$gqm,$gqgs,$gqimg);
//添加后面
}




}
}



function curl_post_https($url,$data,$c){ 
$header=array(
'user-Agent: Mozilla/5.0 (Linux; Android 6.0.1; OPPO A57 Build/MMB29M; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/55.0.2883.91 Mobile Safari/537.36',
'Accept: */*',
'Referer: http://music.163.com/',
'X-Requested-With: XMLHttpRequest',
'Content-Type: application/x-www-form-urlencoded'


);
//设置请求头
$curl = curl_init(); 
curl_setopt($curl, CURLOPT_URL, $url); 
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); 
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 1);
//curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($curl, CURLOPT_AUTOREFERER, 1); 
if($data==null){
}else{
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
}

//curl_setopt($curl, CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; U; Android 8.1.0; zh-CN; MI 6X Build/OPM1.171019.011) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/57.0.2987.108 UCBrowser/11.8.3.963 Mobile Safari/537.36');
curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
curl_setopt($curl, CURLOPT_HEADER, 0);//设置返回头
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
$result = curl_exec($curl); 
if (curl_errno($curl)) {
 echo 'Errno'.curl_error($curl);
}
curl_close($curl); 
 return $result; 
}
// 加密网易云音乐 api 参数 APP接口
function encode_netease_data($data)
{
$_key = '7246674226682325323F5E6544673A51';
$data = json_encode($data);
if (function_exists('openssl_encrypt')) {
$data = openssl_encrypt($data, 'aes-128-ecb', pack('H*', $_key));
} else {
$_pad = 16 - (strlen($data) % 16);
$data = base64_encode(mcrypt_encrypt(
MCRYPT_RIJNDAEL_128,
hex2bin($_key),
$data.str_repeat(chr($_pad), $_pad),
MCRYPT_MODE_ECB
));
}
$data = strtoupper(bin2hex(base64_decode($data)));
return ['eparams' => $data];
}

//添加歌曲
function gqjq($wm,$gqid,$gqly,$ptxx,$gqm,$gqgs,$gqimg)
{
$json_string = file_get_contents($wm);// 从文件中读取数据到PHP变量
$data = json_decode($json_string,true);// 把JSON字符串转成PHP数组

$sl=count($data["songIds"]);

//$data["songSheetName"]="凉凉屁";
//$data["songNames"][0]="傻来";
//unset($data['songNames'][]);


//$ar = $data["songNames"];
//$ars = array_values($ar);
//$data['songNames'] = $ars;

//echo 	$data = json_encode($data,JSON_UNESCAPED_UNICODE);
$ii=1;
foreach($data['songIds'] as $key=>$val){
$data["songIds"][$ii]=$val;
//echo $val;
$ii=$ii+1;
}//把歌曲id加前面
$data["songIds"][0]=$gqid;//添加

$ii=1;
foreach($data['songNames'] as $key=>$val){
$data["songNames"][$ii]=$val;
//echo $val;
$ii=$ii+1;
}//把来源添加到前面
$data["songNames"][0]=$gqm;//歌曲名来源信息

$ii=1;
foreach($data['songTypes'] as $key=>$val){
$data["songTypes"][$ii]=$val;
//echo $val;
$ii=$ii+1;
}//把歌曲平台添加到前面
$data["songTypes"][0]=$ptxx;//歌曲平台信息

$ii=1;
foreach($data['albumNames'] as $key=>$val){
$data["albumNames"][$ii]=$val;
//echo $val;
$ii=$ii+1;
}//把歌曲名字添加到前面
$data["albumNames"][0]=$gqly;//歌曲名字

$ii=1;
foreach($data['artistNames'] as $key=>$val){
$data["artistNames"][$ii]=$val;
//echo $val;
$ii=$ii+1;
}//把歌曲歌手添加到前面
$data["artistNames"][0]=$gqgs;//歌曲歌手

$ii=1;
foreach($data['albumCovers'] as $key=>$val){
$data["albumCovers"][$ii]=$val;
//echo $val;
$ii=$ii+1;
}//把歌曲图片添加到前面
$data["albumCovers"][0]=$gqimg;//歌曲图片
$json_strings = json_encode($data);
@file_put_contents($wm,$json_strings);//写入
return"成功添加前面";
}


//添加歌曲下
function gqjqx($wm,$gqid,$gqly,$ptxx,$gqm,$gqgs,$gqimg)
{
$json_string = file_get_contents($wm);// 从文件中读取数据到PHP变量
$data = json_decode($json_string,true);// 把JSON字符串转成PHP数组
$sl=count($data["songIds"]);
$sl=$sl+1;

$al="songIds";
$data[$al][$sl]=$gqid;//添加
$ar = $data[$al];
$ars = array_values($ar);
$data[$al] = $ars;

$al="songNames";
$data[$al][$sl]=$gqm;//歌曲来源信息
$ar = $data[$al];
$ars = array_values($ar);
$data[$al] = $ars;

$al="songTypes";
$data[$al][$sl]=$ptxx;//歌曲平台信息
$ar = $data[$al];
$ars = array_values($ar);
$data[$al] = $ars;

$al="albumNames";
$data[$al][$sl]=$gqly;//歌曲来源
$ar = $data[$al];
$ars = array_values($ar);
$data[$al] = $ars;

$al="artistNames";
$data[$al][$sl]=$gqgs;//歌曲歌手
$ar = $data[$al];
$ars = array_values($ar);
$data[$al] = $ars;

$al="albumCovers";
$data[$al][$sl]=$gqimg;//歌曲图片
$ar = $data[$al];
$ars = array_values($ar);
$data[$al] = $ars;

$json_strings = json_encode($data);
@file_put_contents($wm,$json_strings);//写入
return"成功添加到尾部".$sl;
}


//移除歌曲
function gqjqc($wm,$sll)
{
$json_string = file_get_contents($wm);// 从文件中读取数据到PHP变量
$data = json_decode($json_string,true);// 把JSON字符串转成PHP数组
$sl=count($data["songIds"]);
$sl=$sll-1;


$al="songIds";
unset($data[$al][$sl]);//清除json
$ar = $data[$al];
$ars = array_values($ar);
$data[$al] = $ars;

$al="songNames";
unset($data[$al][$sl]);//清除json
$ar = $data[$al];
$ars = array_values($ar);
$data[$al] = $ars;

$al="songTypes";
unset($data[$al][$sl]);//清除json
$ar = $data[$al];
$ars = array_values($ar);
$data[$al] = $ars;

$al="albumNames";
unset($data[$al][$sl]);//清除json
$ar = $data[$al];
$ars = array_values($ar);
$data[$al] = $ars;

$al="artistNames";
unset($data[$al][$sl]);//清除json
$ar = $data[$al];
$ars = array_values($ar);
$data[$al] = $ars;

$al="albumCovers";
unset($data[$al][$sl]);//清除json
$ar = $data[$al];
$ars = array_values($ar);
$data[$al] = $ars;
$json_strings = json_encode($data);
@file_put_contents($wm,$json_strings);//写入
return"成功移除";
}

function gdxg($wm,$id,$msg)
{
$json_string = file_get_contents($wm);// 从文件中读取数据到PHP变量
$data = json_decode($json_string,true);// 把JSON字符串转成PHP数组
$sl=count($data["songIds"]);
$sl=$sl+1;

if($id==1){

$al="songSheetName";
$data[$al]=$msg;//修改歌单名
return"成功修改歌单名";
exit;
}

$al="author";
$data[$al]=$msg;//修改歌单作者


$json_strings = json_encode($data);
@file_put_contents($wm,$json_strings);//写入
return"修改歌单作者";
}


?>