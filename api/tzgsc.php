<?php
header("Content-Type:text/html;charset=UTF-8");
include("./API.php");
tongji("tzgsc");
function replace_unicode_escape_sequence($match){
return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');}
if($_GET["msg"]==""){
echo get($_GET["id"]);
}else{
$data=file_get_contents("data/tzgsc/".$_GET["id"].".txt");
preg_match_all('/tm(.*?)z(.*?)l(.*?)n(.*?)nian(.*?)d(.*?)d/',$data,$t);
if($_GET["msg"]==$t[6][0]){
echo "恭喜你，回答正确。\n请继续下一题\n\n";
exit(get($id));}else{
if($_GET["msg"]=="提示"){
exit("这是首描写".$t[3][0]."的诗，你在".$t[4][0]."学过它。");}
exit("抱歉，答案不对哦。\n你可以回复提示获取该题的部分信息哦。");}
}

function get($id){
$data=get_curl("https://hanyu.baidu.com/hanyu/ajax/pingce_data");
$data = preg_replace_callback('/\\\\u([0-9a-f]{4})/i', 'replace_unicode_escape_sequence', $data);
//exit($data);
$cj=cj($data);
$s = preg_match_all('/{"question_content":"(.*?)","type":{"person":"(.*?)","type":"(.*?)","grade":"(.*?)","dynasty":"(.*?)"},"option_answers":\[(.*?)\]}/',$data,$t);
if($s==0){exit("抱歉，获取出现错误。");}
$tm=$t[1][0];//题目
$z=$t[2][0];//作者
$l=$t[3][0];//描写类型
$n=$t[4][0];//学习阶段
$nd=$t[5][0];//年代
echo "如题：".$tm."\n请从下面四个选项中选择一个你认为对的来回答。\n\n";
preg_match_all('/{"answer_content":"(.*?)","is_standard_answer":(.*?)}/',$t[6][0],$d);
$ps="tm".$tm."z".$z."l".$l."n".$n."nian".$nd;
for( $i = 0 ; $i < 4 ; $i ++ ){
$d1=$d[1][$i];
$p=$d[2][$i];
if($p=="1"){file_put_contents("data/tzgsc/".$id.".txt",$ps."d".($i+1)."d");
}
echo ($i+1)."、".$d1."\n";
}
}


function cj($data){
if(!$data)exit("");//无数据返回
$s=preg_match_all('/{"question_content":"(.*?)","type":(.*?)}]}/',$data,$d);
$json="data/tzgsc/tzgsc.json";
@$pd = file_get_contents($json);
for( $i = 0 ; $i < $s ; $i ++ ){
$d1=$d[1][$i];
$d2=$d[2][$i];
$a='{"question_content":"'.$d1.'","type":'.$d2.'}]}';
$p = explode($d1,$pd);
if(count($p)>1){
//存在不写入
}else{
file_put_contents($json, $a, FILE_APPEND | LOCK_EX);//追加写入，防止同时写入。
//不存在，继续写入。
}
}}

function get_curl($url,$post=0,$referer=1,$cookie=0,$header=0,$ua=0,$nobaody=0){
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
$httpheader[] = "Accept:application/json";
$httpheader[] = "Accept-Encoding:gzip,deflate,sdch";
$httpheader[] = "Accept-Language:zh-CN,zh;q=0.8";
$httpheader[] = "Connection:close";
curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
if($post){
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);}
if($header){
curl_setopt($ch, CURLOPT_HEADER, TRUE);}
if($cookie){
curl_setopt($ch, CURLOPT_DICTAPP_MID, $cookie);}
if($referer){
if($referer==1){
curl_setopt($ch, CURLOPT_REFERER, 'http://m.qzone.com/infocenter?g_f=');
}else{
curl_setopt($ch, CURLOPT_REFERER, $referer);}}
if($ua){
curl_setopt($ch, CURLOPT_USERAGENT,$ua);
}else{
curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/5.5 Mobile Safari/533.1');}
if($nobaody){
curl_setopt($ch, CURLOPT_NOBODY,1);}
curl_setopt($ch, CURLOPT_ENCODING, "gzip");
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
$ret = curl_exec($ch);
curl_close($ch);
return $ret;}

?> 