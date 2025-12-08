<?php
header("Content-Type:text/html;charset=UTF-8");
include("./API.php");
tongji("ttslt");
$msg=$_GET['msg'];//需要生成的语音内容
$hh=$_GET['hh']?:"\n";//换行符号(默认\n)
if($_GET['msg']){}
else{
echo "抱歉，msg参数不存在！".$hh."此为必填项。";exit;}
$data = file_get_contents("compress.zlib://http://www.tuling123.com/openapi/api?key=2610fa32d30d405f8f4ccec8acca21c7&info=".$msg."");
preg_match_all("/{\"code\":(.*?),\"text\":\"(.*?)\"}/",$data,$v);
$cookie = '0';
//$url = "https://fanyi.baidu.com/gettts?lan=zh&text=".$v[2][0]."&spd=5&source=wise";

$url="https://ss0.baidu.com/6KAZsjip0QIZ8tyhnq/text2audio?&cuid=dict&lan=ZH&ctp=1&pdt=30&vol=9&spd=4&tex=".$v[2][0];
$post = '0';
$str= get_curl($url,$post,0,$cookie);
$rand=rand(100000,99999999);
$shuju="data/ttslt/".$rand.".mp3";
$handle = fopen($shuju, 'w') or die('Cannot open file: '.$shuju);
fwrite($handle, $str);
echo "http://".$_SERVER['HTTP_HOST']."/api/data/ttslt/".$rand.".mp3";

function get_curl($url,$post=0,$referer=1,$cookie=0,$header=0,$ua=1,$nobaody=0,$json=0)
{
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        $httpheader[] = "Accept:application/json";
        $httpheader[] = "Accept-Encoding:gzip,deflate,sdch";
        $httpheader[] = "Accept-Language:zh-CN,zh;q=0.8";
        $httpheader[] = "Connection:close";
        if($json){
            $httpheader[] = "Content-Type:application/json; charset=utf-8";
        }
        curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
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
                curl_setopt($ch, CURLOPT_REFERER, 'http://m.qzone.com/infocenter?g_f=');
            }else{
                curl_setopt($ch, CURLOPT_REFERER, $referer);
            }
        }
        if($ua){
            curl_setopt($ch, CURLOPT_USERAGENT,$ua);
        }else{
            curl_setopt($ch, CURLOPT_USERAGENT,'Dalvik/2.1.0 (Linux; U; Android 9; 16s Build/PKQ1.190202.001)');
        }
        if($nobaody){
            curl_setopt($ch, CURLOPT_NOBODY,1);
        }
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_ENCODING, "gzip");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        $ret = curl_exec($ch);
        curl_close($ch);
        //$ret=mb_convert_encoding($ret, "UTF-8", "UTF-8");
        return $ret;
}
fastcgi_finish_request();//先返回上面的内容
time_sleep_until(time()+60);//延迟30秒后执行下面的命令
unlink("data/ttslt/".$rand.".mp3");
?>