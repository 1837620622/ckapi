<?php
function login_sig($type)
{
    if ($type == 1) {
        $url = 'https://xui.ptlogin2.qq.com/cgi-bin/xlogin?pt_disable_pwd=1&appid=715030901&daid=73&pt_no_auth=1&s_url=https%3A%2F%2Fqun.qq.com%2F';
        $ret = get_curl($url, 0, 0, 0, 1);
        preg_match('/pt_login_sig=(.*?);/', $ret, $match);
        return $match[1];
    } else {
        if ($type == 2) {
            $url = 'https://xui.ptlogin2.qq.com/cgi-bin/xlogin?appid=8000201&style=20&s_url=https%3A%2F%2Fvip.qq.com%2Floginsuccess.html&maskOpacity=60&daid=18&target=self';
            $ret = get_curl($url, 0, 0, 0, 1);
            preg_match('/pt_login_sig=(.*?);/', $ret, $match);
            return $match[1];
        } else {
            if ($type == 3) {
                $url = 'https://xui.ptlogin2.qq.com/cgi-bin/xlogin?proxy_url=https%3A//qzs.qq.com/qzone/v6/portal/proxy.html&daid=5&&hide_title_bar=1&low_login=0&qlogin_auto_login=1&no_verifyimg=1&link_target=blank&appid=549000912&style=22&target=self&s_url=https%3A%2F%2Fqzs.qq.com%2Fqzone%2Fv5%2Floginsucc.html%3Fpara%3Dizone&pt_qr_app=%E6%89%8B%E6%9C%BAQQ%E7%A9%BA%E9%97%B4&pt_qr_link=https%3A//z.qzone.com/download.html&self_regurl=https%3A//qzs.qq.com/qzone/v6/reg/index.html&pt_qr_help_link=https%3A//z.qzone.com/download.html&pt_no_auth=0';
                $ret = get_curl($url, 0, 0, 0, 1);
                preg_match('/pt_login_sig=(.*?);/', $ret, $match);
                return $match[1];
            } else {
                if ($type == 4) {
                    $url = 'https://xui.ptlogin2.qq.com/cgi-bin/xlogin?s_url=https%3A%2F%2Fhuifu.qq.com%2Findex.html&style=20&appid=715021417&daid=768&proxy_url=https%3A%2F%2Fhuifu.qq.com%2Fproxy.html';
                    $ret = get_curl($url, 0, 0, 0, 1);
                    preg_match('/pt_login_sig=(.*?);/', $ret, $match);
                    return $match[1];
                } else {
                    if ($type == 5) {
                        $url = 'https://xui.ptlogin2.qq.com/cgi-bin/xlogin?pt_disable_pwd=1&appid=1006102&daid=1&style=23&hide_border=1&proxy_url=https://id.qq.com%2Flogin%2Fproxy.html&s_url=https://id.qq.com/index.html';
                        $ret = get_curl($url, 0, 0, 0, 1);
                        preg_match('/pt_login_sig=(.*?);/', $ret, $match);
                        return $match[1];
                    } else {
                        if ($type == 6) {
                            $url = 'https://xui.ptlogin2.qq.com/cgi-bin/xlogin?theme=2&appid=1600000931&pt_no_auth=1&daid=536&link_target=blank&target=self&hide_close_icon=1&style=20&low_login_enable=1&low_login_foreced=1&low_login_hour=720&hide_border=1&s_url=https%3A%2F%2Fdocs.qq.com%2Ftim%2Fdocs%2Fcomponents%2FBindQQ.html%3Ftype%3Dlogin&pt_isdocs=0';
                            $ret = get_curl($url, 0, 0, 0, 1);
                            preg_match('/pt_login_sig=(.*?);/', $ret, $match);
                            return $match[1];
                        } else {
                            if ($type == 7) {
                                $url = 'hhttps://xui.ptlogin2.qq.com/cgi-bin/xlogin?daid=377&style=11&appid=716027613&target=self&pt_disable_pwd=1&s_url=https%3A//connect.qq.com/login_success.html';
                                $ret = get_curl($url, 0, 0, 0, 1);
                                preg_match('/pt_login_sig=(.*?);/', $ret, $match);
                                return $match[1];
                            }
                        }
                    }
                }
            }
        }
    }
}
function send($Msg)
{
    header('Content-Type:application/json');
    echo json_encode($Msg, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
}
function getuin($uin)
{
    for ($i = 0; $i < strlen($uin); $i++) {
        if ($uin[$i] == 'o' || $uin[$i] == '0') {
            continue;
        } else {
            break;
        }
    }
    return substr($uin, $i);
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
function get_curl($url, $post = 0, $referer = 0, $cookie = 0, $header = 0, $ua = 0, $nobaody = 0, $split = 0)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    $httpheader[] = "Accept:*/*";
    $httpheader[] = "Accept-Encoding:gzip,deflate,sdch";
    $httpheader[] = "Accept-Language:zh-CN,zh;q=0.8";
    $httpheader[] = "Connection:close";
    curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
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
        curl_setopt($ch, CURLOPT_REFERER, $referer);
    }
    if ($ua) {
        curl_setopt($ch, CURLOPT_USERAGENT, $ua);
    } else {
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.152 Safari/537.36');
    }
    if ($nobaody) {
        curl_setopt($ch, CURLOPT_NOBODY, 1);
    }
    curl_setopt($ch, CURLOPT_ENCODING, "gzip");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $ret = curl_exec($ch);
    if ($split) {
        $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header = substr($ret, 0, $headerSize);
        $body = substr($ret, $headerSize);
        $ret = array();
        $ret['header'] = $header;
        $ret['body'] = $body;
    }
    curl_close($ch);
    return $ret;
}