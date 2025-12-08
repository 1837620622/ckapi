<?php
$getsm = getqrpic();
$time=time();
$img=$getsm["data"];
$img=base64_decode($getsm["data"]);
file_put_contents("".$time.".jpg",$img);
echo str_replace('}',',"img":"http://'.$_SERVER['HTTP_HOST'].'/api/data/gexing/ressut/qrlogin/'.$time.'.jpg"}',json_encode($getsm));









function getqrpic()
{
    $url = 'https://ssl.ptlogin2.qq.com/ptqrshow?appid=549000912&e=2&l=M&s=4&d=72&v=4&t=0.5409099' . time() . '&daid=5';
    $arr = get_curl_split($url);
    preg_match('/qrsig=(.*?);/', $arr['header'], $match);
    if ($qrsig = $match[1]) {
        return array('ok' => 0, 'qrsig' => $qrsig, 'data' => base64_encode($arr['body']));
    } else {
        return array('ok' => 1, 'msg' => '二维码获取失败');
    }
}
function get_curl_split($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    $httpheader[] = "Accept: */*";
    $httpheader[] = "Accept-Encoding: gzip";
    $httpheader[] = "Accept-Language: zh-CN,zh;q=0.8";
    $httpheader[] = "Connection: keep-alive";
    curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Safari/537.36 OppoBrowser/4.9.3");
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_ENCODING, "gzip");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $ret = curl_exec($ch);
    $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $header = substr($ret, 0, $headerSize);
    $body = substr($ret, $headerSize);
    $ret = array();
    $ret['header'] = $header;
    $ret['body'] = $body;
    curl_close($ch);
    return $ret;
}

?>