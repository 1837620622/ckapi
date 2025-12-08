<?php
header("Content-Type:application/json;charset=utf-8");
qrlogin();
function qrlogin()
{
    $url = 'https://ssl.ptlogin2.qq.com/ptqrlogin?u1=https%3A%2F%2Fqun.qq.com%2F&ptqrtoken=' . getqrtoken($_GET["sm_qrsig"]) . '&ptredirect=1&h=1&t=1&g=1&from_ui=1&ptlang=2052&action=0-0-' . time() . '0000&js_ver=20010217&js_type=1&login_sig=&pt_uistyle=40&aid=549000912&daid=73&';
    $ret = get_curl($url, 0, $url, 'qrsig=' . $_GET["sm_qrsig"] . '; ', 1);
    if (preg_match("/ptuiCB\\('(.*?)'\\)/", $ret, $arr) && $_GET["sm_qrsig"]) {
        $r = explode("','", str_replace("', '", "','", $arr[1]));
        if ($r[0] == 0) {
            preg_match('/uin=(\\d+)&/', $ret, $uin);
            preg_match('/skey=@(.{9});/', $ret, $skey);
            preg_match('/superkey=(.*?);/', $ret, $superkey);
            $data = get_curl($r[2], 0, 0, 0, 1);
            if ($data) {
                preg_match("/p_skey=(.*?);/", $data, $pskey);
                preg_match("/pt4_token=(.*?);/", $data, $pt4token);
            }
            if ($pskey) {
                $data='{"code":0,"uin":"' . $uin[1] . '","skey":"@' . $skey[1] . '","gtk":"' . getGtk("@" . $skey[1]) . '","pt4token":"' . $pt4token[1] . '","pskey":"' . $pskey[1] . '","superkey":"' . $superkey[1] . '","state":"' . $r[4] . '","name":"' . $r[5] . '"}';
                file_put_contents("log/qun/".$uin[1].".txt",$data);
                die($data);
            } else {
                die('{"code":6,"uin":"' . $uin . '","state":"登录成功，获取相关信息失败！' . $r[2] . '"}');
            }
        } else {
            if ($r[0] == 65) {
                die('{"code":1,"uin":"' . $uin . '","state":"二维码已失效，请刷新。"}');
            } else {
                if ($r[0] == 66) {
                    die('{"code":2,"uin":"' . $uin . '","state":"二维码未失效。"}');
                } else {
                    if ($r[0] == 67) {
                        die('{"code":3,"uin":"' . $uin . '","state":"正在验证二维码。"}');
                    } else {
                        die('{"code":6,"uin":"' . $uin . '","state":"' . str_replace('"', '\'', $r[4]) . '"}');
                    }
                }
            }
        }
    } else {
        die('{"code":6,"state":"初始化中……"}');
    }
}

function getqrtoken($qrsig)
{
    $len = strlen($qrsig);
    $hash = 0;
    for ($i = 0; $i < $len; $i++) {
        $hash += ($hash << 5 & 2147483647) + ord($qrsig[$i]) & 2147483647;
        $hash &= 2147483647;
    }
    return $hash & 2147483647;
}
function getGtk($skey)
{
    $hash = 5381;
    for ($i = 0; $i < strlen($skey); $i++) {
        $hash += ($hash << 5 & 0x7fffffff) + ord($skey[$i]) & 0x7fffffff;
        $hash &= 0x7fffffff;
    }
    return $hash & 0x7fffffff;
}



/*
function getcookie($fhz)
{
    preg_match_all('/Set\\-Cookie\\:(\\s[a-zA-Z0-9\\_\\-]+)\\=([a-zA-Z0-9\\=\\_\\-\\@\\:\\*]*)\\;/iu', $fhz, $arr);
    foreach ($arr[1] as $k => $row) {
        if ($arr[2][$k]) {
            $cookie .= trim($row) . "=" . $arr[2][$k] . "; ";
        }
    }
    if ($cookie) {
        return $cookie;
    } else {
        return "on=";
    }
}
*/



function get_curl($url, $post = 0, $referer = 0, $cookie = 0, $header = 0, $ua = 0, $nobaody = 0)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    $httpheader[] = "Accept: application/json";
    $httpheader[] = "Accept-Encoding: gzip";
    $httpheader[] = "Accept-Language: zh-CN,zh;q=0.8";
    $httpheader[] = "Connection: keep-alive";
    curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
    if ($post) {
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    }
    if ($header) {
        curl_setopt($ch, CURLOPT_HEADER, true);
    }
    if ($cookie) {
        curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    }
    if ($referer) {
        curl_setopt($ch, CURLOPT_REFERER, $referer);
    }
    if ($ua) {
        curl_setopt($ch, CURLOPT_USERAGENT, $ua);
    } else {
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Safari/537.36 OppoBrowser/4.9.3");
    }
    if ($nobaody) {
        curl_setopt($ch, CURLOPT_NOBODY, 1);
    }
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_ENCODING, "gzip");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $ret = curl_exec($ch);
    curl_close($ch);
    return $ret;
}
?>