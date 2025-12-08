<?php
header('Access-Control-Allow-Origin:*'); // *代表允许任何网址请求
header('Access-Control-Allow-Methods:POST,GET'); // 允许请求的类型
header('Access-Control-Allow-Credentials: true'); // 设置是否允许发送 cookies
header('Access-Control-Allow-Headers: Content-Type,Content-Length,Accept-Encoding,X-Requested-with, Origin'); // 设置允许自定义请求头的字段

function getGTK($skey){
        $len = strlen($skey);
        $hash = 5381;
        for ($i = 0; $i < $len; $i++) {
            $hash += ($hash << 5 & 2147483647) + ord($skey[$i]) & 2147483647;
            $hash &= 2147483647;
        }
        return $hash & 2147483647;
    }

 class getBkn{
public function bkn($s) {
    $hash = 5381;
    for ($i = 0, $len = strlen($s); $i < $len; ++$i){
        $hash +=($hash << 5) + $this->charCodeAt($s, $i);
    }
    return $hash & 2147483647;
}
public function charCodeAt($str, $index){
    $char = mb_substr($str, $index, 1, 'UTF-8');
    $value = null;
    if (mb_check_encoding($char, 'UTF-8')){
        $ret = mb_convert_encoding($char, 'UTF-32BE', 'UTF-8');
        $value = hexdec(bin2hex($ret));
    }
    return $value;
 }
}
$bkn = new getBkn;
set_time_limit(0);

function json($arr){
header('Content-type: application/json');
return stripslashes(json_encode($arr,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
}

function json_1($arr,$type='json'){
    if($type=='json'){
        header('Content-type: application/json');
        return json_encode($arr,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }else{
        return $arr;
    }
}

function send($Msg, $Type = 'jsonp'){
    header('Content-Type:application/json');
    if($Type == 'text'){
        echo $Msg;
        exit();
    }else
    if($Type == 'image'){
        header('location:'.$Msg);
        exit();
    }else
    if($Type == 'url'){
        echo $Msg;
        exit();
    }else
    if($Type == 'tion'){
        echo $Msg;
        exit();
    }else
    if($Type == 'jsonp'){
        echo stripslashes(json_encode($Msg,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        exit();
    }else{
        echo json_encode($Msg,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        exit();
    }
}

function userip() {
	$unknown = 'unknown';
	if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])&&$_SERVER['HTTP_X_FORWARDED_FOR']&&strcasecmp($_SERVER['HTTP_X_FORWARDED_FOR'],$unknown)) {
		$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
	} else if(isset($_SERVER['REMOTE_ADDR'])&&$_SERVER['REMOTE_ADDR']&&strcasecmp($_SERVER['REMOTE_ADDR'],$unknown)) {
		$ip=$_SERVER['REMOTE_ADDR'];
	}
	return $ip;
}

function vipgtk($skey){
    $salt=5381;
    $md5key='tencentQQVIP123443safde&!%^%1282';
    $hash=array();
    $hash[]=$salt<<5;
    for ($i=0; $i<strlen($skey); ++$i) {
       $acode=ord(substr($skey,$i,1));
       $hash[]=($salt<<5)+$acode;
       $salt=$acode;
    }
    $md5str=md5(join('',$hash).$md5key);
    return $md5str;
}

class GETgtk{
public function gtk($Skey)
{
    $hash = 5381;
    for ($i = 0, $len = strlen($Skey); $i < $len; ++$i)
    {
        $hash += ($hash << 5) + $this->charCodeAt($Skey, $i);
    }
    return $hash & 0x7fffffff;
}
public function charCodeAt($str, $index){
    $char = mb_substr($str, $index, 1, 'UTF-8');
    $value = null;
    if (mb_check_encoding($char, 'UTF-8')){
        $ret = mb_convert_encoding($char, 'UTF-32BE', 'UTF-8');
        $value = hexdec(bin2hex($ret));
    }
    return $value;
 }
}
$gtk = new GETgtk;
set_time_limit(0);

function get_post(){
if( $_SERVER['REQUEST_METHOD'] === 'GET'){
             return true;
}else{
            return false;
        }

}

    function getMillisecond() {
    
list($t1, $t2) = explode(' ', microtime());

return (float)sprintf('%.0f',(floatval($t1)+floatval($t2))*1000);

}


function run_encode($msg){

$msg = idn_to_ascii($msg,IDNA_NONTRANSITIONAL_TO_ASCII,INTL_IDNA_VARIANT_UTS46);

return $msg;

}


function run_decode($msg){

$msg = idn_to_utf8($msg);

return $msg;

}


function hex_encode($str){
$hex="";
for($i=0;$i<strlen($str);$i++)
$hex.='\\u4E'.dechex(ord($str[$i]));
$hex=$hex;
return $hex;
}



function hex_decode($hex){
$str="";
for($i=0;$i<strlen($hex)-1;$i+=2)
$str.=chr(hexdec($hex[$i].$hex[$i+1]));
return $str;
}


function decodeUnicode($str)

{

    return preg_replace_callback('/\\\\u([0-9a-f]{4})/i',

        @create_function(

            '$matches',

            'return mb_convert_encoding(pack("H*", $matches[1]), "UTF-8", "UCS-2BE");'

        ),

        $str);

}

function encodeUnicodes($str){
    $decode = json_decode('{"text":"'.$str.'"}',true);
       if(!$decode){
        return $str;
        }else{
          $encode = json_encode($decode);
           preg_match_all('/text":"(.*?)"/',$encode,$encode);
            $encode = str_replace('\\u4e','',$encode[1][0]);
             $encode = str_replace('\\u4E','',$encode);
                return $encode;
               }
             }
           
            
     
function jiami($string){

  $str = hex_encode($string);
  
    $str = decodeUnicode($str);
    
       return ($str);

 }


function jiemi($string){
 $str = encodeUnicodes($string);
   $str = hex_decode($str);
     return $str;
     }



function time_sss() {
    
list($t1, $t2) = explode(' ', microtime());

return (float)sprintf('%.0f',(floatval($t1)+floatval($t2))*1000);

}


function http($url){
  $ch = curl_init();
  $timeout = 3;
  curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
  curl_setopt($ch, CURLOPT_HEADER, 1);
  curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
  curl_setopt($ch,CURLOPT_URL,$url);
  curl_exec($ch);
  return $httpcode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
  curl_close($ch);
}

