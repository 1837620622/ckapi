<?php

function read(...$filelist) {
    $list = [];
    foreach ($filelist as $file) {
        $handle = fopen($file, 'r');
        while (($line = fgets($handle)) !== false) {
            array_push($list, trim($line));
        }
        fclose($handle);
    }
    return $list;
}

$list = read('ks.txt');
$url = $list[array_rand($list)];
$type = $_GET['type'];
if(empty($type)){
    if(check_wap()){
        header("Content-type: video/mp4");
        header("Accept-Ranges: bytes");
        ini_set('memory_limit','512M');
        ini_set('memory_limit','512M');
        ob_end_clean();
        ob_start();
        header("HTTP/1.1 206 Partial Content");
        header("Location: {$url}");
    }else{
        ob_end_clean();
        ob_start();
        header("Location: {$url}");
    }
    
}else if($type == 'txt'){
   echo $url;
}
function check_wap() { 
    if (isset($_SERVER['HTTP_VIA'])) return true; 
    if (isset($_SERVER['HTTP_X_NOKIA_CONNECTION_MODE'])) return true; 
    if (isset($_SERVER['HTTP_X_UP_CALLING_LINE_ID'])) return true; 
    if (strpos(strtoupper($_SERVER['HTTP_ACCEPT']),"VND.WAP.WML") > 0) { 
        // Check whether the browser/gateway says it accepts WML. 
        $br = "WML"; 
    } else { 
        $browser = isset($_SERVER['HTTP_USER_AGENT']) ? trim($_SERVER['HTTP_USER_AGENT']) : ''; 
        if(empty($browser)) return true;
        $mobile_os_list=array('Google Wireless Transcoder','Windows CE','WindowsCE','Symbian','Android','armv6l','armv5','Mobile','CentOS','mowser','AvantGo','Opera Mobi','J2ME/MIDP','Smartphone','Go.Web','Palm','iPAQ'); 
               
        $mobile_token_list=array('Profile/MIDP','Configuration/CLDC-','160×160','176×220','240×240','240×320','320×240','UP.Browser','UP.Link','SymbianOS','PalmOS','PocketPC','SonyEricsson','Nokia','BlackBerry','Vodafone','BenQ','Novarra-Vision','Iris','NetFront','HTC_','Xda_','SAMSUNG-SGH','Wapaka','DoCoMo','iPhone','iPod'); 
               
        $found_mobile=checkSubstrs($mobile_os_list,$browser) || 
                  checkSubstrs($mobile_token_list,$browser);
    if($found_mobile)
      $br ="WML";
    else $br = "WWW";
    } 
    if($br == "WML") { 
        return true; 
    } else { 
        return false; 
    } 
}
 
function checkSubstrs($list,$str){
  $flag = false;
  for($i=0;$i<count($list);$i++){
    if(strpos($str,$list[$i]) > 0){
      $flag = true;
      break;
    }
  }
  return $flag;
}
?>