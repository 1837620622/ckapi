<?php
include("./API.php");
tongji("qqrcode");
require 'data/qqrcode/need.php';
$type = $_REQUEST['type'] ?: "1";//不填就是群的可选，1为qun.qq.com，2为vip.qq.com，3为qzone.qq.com，4为huifu.qq.com，5为id.qq.com，6为docs.qq.com，7为connect.qq.com
$qrsig = $_REQUEST['qrsig'];//qrsig值，不填则为获取二维码
$time = time();
if ($type == 1) {
    if ($qrsig == null) {
        $url .= 'https://ssl.ptlogin2.qq.com/ptqrshow?appid=715030901&e=2&l=M&s=3&d=72&v=4&t=0.5409099' . $time . '&daid=73&pt_3rd_aid=0';
        $arr = get_curl($url, 0, 0, 0, 1, 0, 0, 1);
        preg_match('/qrsig=(.*?);/', $arr['header'], $match);
        if ($qrsig = $match[1]) {
            $img = $arr['body'];
            $base64 = base64_encode($arr['body']);
            file_put_contents('data/qqrcode/img/' . $time . '.png', $img);
            exit(send(array('code' => 1, 'qrsig' => $qrsig, 'url' => "http://".$_SERVER['HTTP_HOST']."/api/data/qqrcode/img/" . $time . ".png", 'base64' => $base64)));
        } else {
            exit(send(array('code' => -1, 'text' => "二维码获取失败")));
        }
    } else {
        $url .= 'https://ssl.ptlogin2.qq.com/ptqrlogin?u1=https%3A%2F%2Fqun.qq.com%2F&ptqrtoken=' . getqrtoken($qrsig) . '&ptredirect=1&h=1&t=1&g=1&from_ui=1&ptlang=2052&action=0-0-' . time() . '&js_ver=21081215&js_type=1&login_sig=' . login_sig($type) . '&pt_uistyle=40&aid=715030901&daid=73&has_onekey=1&';
        $ret = get_curl($url, 0, $url, 'qrsig=' . $qrsig . '; ', 1);
        if (preg_match("/ptuiCB\\('(.*?)'\\)/", $ret, $arr)) {
            $r = explode("','", str_replace("', '", "','", $arr[1]));
            if ($r[0] == 0) {
                preg_match('/superuin=(.*?);/', $ret, $uin);
                preg_match('/skey=@(.{9});/', $ret, $skey);
                preg_match('/superkey=(.*?);/', $ret, $superkey);
                preg_match('/supertoken=(.*?);/', $ret, $supertoken);
                $data = get_curl($r[2], 0, 0, 0, 1);
                preg_match("/p_skey=(.*?);/", $data, $pskey);
                preg_match('/pt4_token=(.*?);/', $data, $pt4_token);
                $qq = getuin($uin[1]);
                exit(send(array('code' => 1, 'text' => '登录成功', 'data' => array('name' => $r[5], 'QQ' => $qq, 'p_skey' => $pskey[1], 'skey' => "@" . $skey[1], 'superkey' => $superkey[1], 'supertoken' => $supertoken[1], 'pt4_token' => $pt4_token[1]))));
            } else {
                if ($r[0] == 65) {
                    exit(send(array('code' => 1, 'text' => '二维码已失效')));
                } else {
                    if ($r[0] == 66) {
                        exit(send(array('code' => 1, 'text' => '二维码未失效')));
                    } else {
                        if ($r[0] == 67) {
                            exit(send(array('code' => 1, 'text' => '扫码成功，请在手机上确认登录')));
                        } else {
                            exit(send(array('code' => -3, 'text' => '未知错误')));
                        }
                    }
                }
            }
        } else {
            exit(send(array('code' => -2, 'text' => 'qrsig错误')));
        }
    }
} else {
    if ($type == 2) {
        if ($qrsig == null) {
            $url .= 'https://ssl.ptlogin2.qq.com/ptqrshow?appid=8000201&e=2&l=M&s=3&d=72&v=4&t=0.5409099' . $time . '&daid=73&pt_3rd_aid=0';
            $arr = get_curl($url, 0, 0, 0, 1, 0, 0, 1);
            preg_match('/qrsig=(.*?);/', $arr['header'], $match);
            if ($qrsig = $match[1]) {
                $img = $arr['body'];
                $base64 = base64_encode($arr['body']);
                file_put_contents('data/qqrcode/img/' . $time . '.png', $img);
                exit(send(array('code' => 1, 'qrsig' => $qrsig, 'url' => "http://".$_SERVER['HTTP_HOST']."/api/data/qqrcode/img/" . $time . ".png", 'base64' => $base64)));
            } else {
                exit(send(array('code' => -1, 'text' => "二维码获取失败")));
            }
        } else {
            $url .= 'https://ssl.ptlogin2.qq.com/ptqrlogin?u1=https%3A%2F%2Fvip.qq.com%2Floginsuccess.html&ptqrtoken=' . getqrtoken($qrsig) . '&ptredirect=0&h=1&t=1&g=1&from_ui=1&ptlang=2052&action=0-0-' . time() . '&js_ver=21081215&js_type=1&login_sig=' . login_sig($type) . '&pt_uistyle=40&aid=8000201&daid=18&has_onekey=1&';
            $ret = get_curl($url, 0, $url, 'qrsig=' . $qrsig . '; ', 1);
            if (preg_match("/ptuiCB\\('(.*?)'\\)/", $ret, $arr)) {
                $r = explode("','", str_replace("', '", "','", $arr[1]));
                if ($r[0] == 0) {
                    preg_match('/superuin=(.*?);/', $ret, $uin);
                    preg_match('/skey=@(.{9});/', $ret, $skey);
                    preg_match('/superkey=(.*?);/', $ret, $superkey);
                    preg_match('/supertoken=(.*?);/', $ret, $supertoken);
                    $data = get_curl($r[2], 0, 0, 0, 1);
                    preg_match("/p_skey=(.*?);/", $data, $pskey);
                    preg_match('/pt4_token=(.*?);/', $data, $pt4_token);
                    $qq = getuin($uin[1]);
                    exit(send(array('code' => 1, 'text' => '登录成功', 'data' => array('name' => $r[5], 'QQ' => $qq, 'p_skey' => $pskey[1], 'skey' => "@" . $skey[1], 'superkey' => $superkey[1], 'supertoken' => $supertoken[1], 'pt4_token' => $pt4_token[1]))));
                } else {
                    if ($r[0] == 65) {
                        exit(send(array('code' => 1, 'text' => '二维码已失效')));
                    } else {
                        if ($r[0] == 66) {
                            exit(send(array('code' => 1, 'text' => '二维码未失效')));
                        } else {
                            if ($r[0] == 67) {
                                exit(send(array('code' => 1, 'text' => '扫码成功，请在手机上确认登录')));
                            } else {
                                exit(send(array('code' => -3, 'text' => '未知错误')));
                            }
                        }
                    }
                }
            } else {
                exit(send(array('code' => -2, 'text' => 'qrsig错误')));
            }
        }
    } else {
        if ($type == 3) {
            if ($qrsig == null) {
                $url .= 'https://ssl.ptlogin2.qq.com/ptqrshow?appid=549000912&e=2&l=M&s=3&d=72&v=4&t=0.5409099' . $time . '&daid=5&pt_3rd_aid=0';
                $arr = get_curl($url, 0, 0, 0, 1, 0, 0, 1);
                preg_match('/qrsig=(.*?);/', $arr['header'], $match);
                if ($qrsig = $match[1]) {
                    $img = $arr['body'];
                    $base64 = base64_encode($arr['body']);
                    file_put_contents('data/qqrcode/img/' . $time . '.png', $img);
                    exit(send(array('code' => 1, 'qrsig' => $qrsig, 'url' => "http://".$_SERVER['HTTP_HOST']."/api/data/qqrcode/img/" . $time . ".png", 'base64' => $base64)));
                } else {
                    exit(send(array('code' => -1, 'text' => "二维码获取失败")));
                }
            } else {
                $url .= 'https://ssl.ptlogin2.qq.com/ptqrlogin?u1=https%3A%2F%2Fqzs.qq.com%2Fqzone%2Fv5%2Floginsucc.html%3Fpara%3Dizone&ptqrtoken=' . getqrtoken($qrsig) . '&ptredirect=0&h=1&t=1&g=1&from_ui=1&ptlang=2052&action=0-0-' . time() . '&js_ver=21081215&js_type=1&login_sig=' . login_sig($type) . '&pt_uistyle=40&aid=549000912&daid=5&has_onekey=1&';
                $ret = get_curl($url, 0, $url, 'qrsig=' . $qrsig . '; ', 1);
                if (preg_match("/ptuiCB\\('(.*?)'\\)/", $ret, $arr)) {
                    $r = explode("','", str_replace("', '", "','", $arr[1]));
                    if ($r[0] == 0) {
                        preg_match('/superuin=(.*?);/', $ret, $uin);
                        preg_match('/skey=@(.{9});/', $ret, $skey);
                        preg_match('/superkey=(.*?);/', $ret, $superkey);
                        preg_match('/supertoken=(.*?);/', $ret, $supertoken);
                        $data = get_curl($r[2], 0, 0, 0, 1);
                        preg_match("/p_skey=(.*?);/", $data, $pskey);
                        preg_match('/pt4_token=(.*?);/', $data, $pt4_token);
                        $qq = getuin($uin[1]);
                        exit(send(array('code' => 1, 'text' => '登录成功', 'data' => array('name' => $r[5], 'QQ' => $qq, 'p_skey' => $pskey[1], 'skey' => "@" . $skey[1], 'superkey' => $superkey[1], 'supertoken' => $supertoken[1], 'pt4_token' => $pt4_token[1]))));
                    } else {
                        if ($r[0] == 65) {
                            exit(send(array('code' => 1, 'text' => '二维码已失效')));
                        } else {
                            if ($r[0] == 66) {
                                exit(send(array('code' => 1, 'text' => '二维码未失效')));
                            } else {
                                if ($r[0] == 67) {
                                    exit(send(array('code' => 1, 'text' => '扫码成功，请在手机上确认登录')));
                                } else {
                                    exit(send(array('code' => -3, 'text' => '未知错误')));
                                }
                            }
                        }
                    }
                } else {
                    exit(send(array('code' => -2, 'text' => 'qrsig错误')));
                }
            }
        } else {
            if ($type == 4) {
                if ($qrsig == null) {
                    $url .= 'https://ssl.ptlogin2.qq.com/ptqrshow?appid=715021417&e=2&l=M&s=3&d=72&v=4&t=0.635884' . time() . '&daid=768&pt_3rd_aid=0';
                    $arr = get_curl($url, 0, 0, 0, 1, 0, 0, 1);
                    preg_match('/qrsig=(.*?);/', $arr['header'], $match);
                    if ($qrsig = $match[1]) {
                        $img = $arr['body'];
                        $base64 = base64_encode($arr['body']);
                        file_put_contents('data/qqrcode/img/' . $time . '.png', $img);
                        exit(send(array('code' => 1, 'qrsig' => $qrsig, 'url' => "http://".$_SERVER['HTTP_HOST']."/api/data/qqrcode/img/" . $time . ".png", 'base64' => $base64)));
                    } else {
                        exit(send(array('code' => -1, 'text' => "二维码获取失败")));
                    }
                } else {
                    $url .= 'https://ssl.ptlogin2.qq.com/ptqrlogin?u1=https%3A%2F%2Fhuifu.qq.com%2Findex.html&ptqrtoken=' . getqrtoken($qrsig) . '&ptredirect=1&h=1&t=1&g=1&from_ui=1&ptlang=2052&action=0-0-' . time() . '&js_ver=21081215&js_type=1&login_sig=' . login_sig($type) . '&pt_uistyle=40&aid=715021417&daid=768&has_onekey=1&';
                    $ret = get_curl($url, 0, $url, 'qrsig=' . $qrsig . '; ', 1);
                    if (preg_match("/ptuiCB\\('(.*?)'\\)/", $ret, $arr)) {
                        $r = explode("','", str_replace("', '", "','", $arr[1]));
                        if ($r[0] == 0) {
                            preg_match('/superuin=(.*?);/', $ret, $uin);
                            preg_match('/skey=@(.{9});/', $ret, $skey);
                            preg_match('/superkey=(.*?);/', $ret, $superkey);
                            preg_match('/supertoken=(.*?);/', $ret, $supertoken);
                            $data = get_curl($r[2], 0, 0, 0, 1);
                            preg_match("/p_skey=(.*?);/", $data, $pskey);
                            preg_match('/pt4_token=(.*?);/', $data, $pt4_token);
                            $qq = getuin($uin[1]);
                            exit(send(array('code' => 1, 'text' => '登录成功', 'data' => array('name' => $r[5], 'QQ' => $qq, 'p_skey' => $pskey[1], 'skey' => "@" . $skey[1], 'superkey' => $superkey[1], 'supertoken' => $supertoken[1], 'pt4_token' => $pt4_token[1]))));
                        } else {
                            if ($r[0] == 65) {
                                exit(send(array('code' => 1, 'text' => '二维码已失效')));
                            } else {
                                if ($r[0] == 66) {
                                    exit(send(array('code' => 1, 'text' => '二维码未失效')));
                                } else {
                                    if ($r[0] == 67) {
                                        exit(send(array('code' => 1, 'text' => '扫码成功，请在手机上确认登录')));
                                    } else {
                                        exit(send(array('code' => -3, 'text' => '未知错误')));
                                    }
                                }
                            }
                        }
                    } else {
                        exit(send(array('code' => -2, 'text' => 'qrsig错误')));
                    }
                }
            } else {
                if ($type == 5) {
                    if ($qrsig == null) {
                        $url .= 'https://ssl.ptlogin2.qq.com/ptqrshow?appid=1006102&e=2&l=M&s=3&d=72&v=4&t=0.363800773' . time() . '&daid=1&pt_3rd_aid=0';
                        $arr = get_curl($url, 0, 0, 0, 1, 0, 0, 1);
                        preg_match('/qrsig=(.*?);/', $arr['header'], $match);
                        if ($qrsig = $match[1]) {
                            $img = $arr['body'];
                            $base64 = base64_encode($arr['body']);
                            file_put_contents('data/qqrcode/img/' . $time . '.png', $img);
                            exit(send(array('code' => 1, 'qrsig' => $qrsig, 'url' => "http://".$_SERVER['HTTP_HOST']."/api/data/qqrcode/img/" . $time . ".png", 'base64' => $base64)));
                        } else {
                            exit(send(array('code' => -1, 'text' => "二维码获取失败")));
                        }
                    } else {
                        $url .= 'https://ssl.ptlogin2.qq.com/ptqrlogin?u1=https%3A%2F%2Fid.qq.com%2Findex.html&ptqrtoken=' . getqrtoken($qrsig) . '&ptredirect=1&h=1&t=1&g=1&from_ui=1&ptlang=2052&action=0-0-' . time() . '&js_ver=21081215&js_type=1&login_sig=' . login_sig($type) . '&pt_uistyle=40&aid=1006102&daid=1&has_onekey=1&';
                        $ret = get_curl($url, 0, $url, 'qrsig=' . $qrsig . '; ', 1);
                        if (preg_match("/ptuiCB\\('(.*?)'\\)/", $ret, $arr)) {
                            $r = explode("','", str_replace("', '", "','", $arr[1]));
                            if ($r[0] == 0) {
                                preg_match('/superuin=(.*?);/', $ret, $uin);
                                preg_match('/skey=@(.{9});/', $ret, $skey);
                                preg_match('/superkey=(.*?);/', $ret, $superkey);
                                preg_match('/supertoken=(.*?);/', $ret, $supertoken);
                                $data = get_curl($r[2], 0, 0, 0, 1);
                                preg_match("/p_skey=(.*?);/", $data, $pskey);
                                preg_match('/pt4_token=(.*?);/', $data, $pt4_token);
                                $qq = getuin($uin[1]);
                                exit(send(array('code' => 1, 'text' => '登录成功', 'data' => array('name' => $r[5], 'QQ' => $qq, 'p_skey' => $pskey[1], 'skey' => "@" . $skey[1], 'superkey' => $superkey[1], 'supertoken' => $supertoken[1], 'pt4_token' => $pt4_token[1]))));
                            } else {
                                if ($r[0] == 65) {
                                    exit(send(array('code' => 1, 'text' => '二维码已失效')));
                                } else {
                                    if ($r[0] == 66) {
                                        exit(send(array('code' => 1, 'text' => '二维码未失效')));
                                    } else {
                                        if ($r[0] == 67) {
                                            exit(send(array('code' => 1, 'text' => '扫码成功，请在手机上确认登录')));
                                        } else {
                                            exit(send(array('code' => -3, 'text' => '未知错误')));
                                        }
                                    }
                                }
                            }
                        } else {
                            exit(send(array('code' => -2, 'text' => 'qrsig错误')));
                        }
                    }
                } else {
                    if ($type == 6) {
                        if ($qrsig == null) {
                            $url .= 'https://ssl.ptlogin2.qq.com/ptqrshow?appid=1600000931&e=2&l=M&s=3&d=72&v=4&t=0.5645996' . time() . '&daid=536&pt_3rd_aid=0';
                            $arr = get_curl($url, 0, 0, 0, 1, 0, 0, 1);
                            preg_match('/qrsig=(.*?);/', $arr['header'], $match);
                            if ($qrsig = $match[1]) {
                                $img = $arr['body'];
                                $base64 = base64_encode($arr['body']);
                                file_put_contents('data/qqrcode/img/' . $time . '.png', $img);
                                exit(send(array('code' => 1, 'qrsig' => $qrsig, 'url' => "http://".$_SERVER['HTTP_HOST']."/api/data/qqrcode/img/" . $time . ".png", 'base64' => $base64)));
                            } else {
                                exit(send(array('code' => -1, 'text' => "二维码获取失败")));
                            }
                        } else {
                            $url .= 'https://ssl.ptlogin2.qq.com/ptqrlogin?u1=https%3A%2F%2Fdocs.qq.com%2Ftim%2Fdocs%2Fcomponents%2FBindQQ.html%3Ftype%3Dlogin&ptqrtoken=' . getqrtoken($qrsig) . '&ptredirect=0&h=1&t=1&g=1&from_ui=1&ptlang=2052&action=0-0-' . time() . '&js_ver=21081215&js_type=1&login_sig=' . login_sig($type) . '&pt_uistyle=40&low_login_enable=1&low_login_hour=720&aid=1600000931&daid=536&has_onekey=1&';
                            $ret = get_curl($url, 0, $url, 'qrsig=' . $qrsig . '; ', 1);
                            if (preg_match("/ptuiCB\\('(.*?)'\\)/", $ret, $arr)) {
                                $r = explode("','", str_replace("', '", "','", $arr[1]));
                                if ($r[0] == 0) {
                                    preg_match('/superuin=(.*?);/', $ret, $uin);
                                    preg_match('/skey=@(.{9});/', $ret, $skey);
                                    preg_match('/superkey=(.*?);/', $ret, $superkey);
                                    preg_match('/supertoken=(.*?);/', $ret, $supertoken);
                                    $data = get_curl($r[2], 0, 0, 0, 1);
                                    preg_match("/p_skey=(.*?);/", $data, $pskey);
                                    preg_match('/pt4_token=(.*?);/', $data, $pt4_token);
                                    $qq = getuin($uin[1]);
                                    exit(send(array('code' => 1, 'text' => '登录成功', 'data' => array('name' => $r[5], 'QQ' => $qq, 'p_skey' => $pskey[1], 'skey' => "@" . $skey[1], 'superkey' => $superkey[1], 'supertoken' => $supertoken[1], 'pt4_token' => $pt4_token[1]))));
                                } else {
                                    if ($r[0] == 65) {
                                        exit(send(array('code' => 1, 'text' => '二维码已失效')));
                                    } else {
                                        if ($r[0] == 66) {
                                            exit(send(array('code' => 1, 'text' => '二维码未失效')));
                                        } else {
                                            if ($r[0] == 67) {
                                                exit(send(array('code' => 1, 'text' => '扫码成功，请在手机上确认登录')));
                                            } else {
                                                exit(send(array('code' => -3, 'text' => '未知错误')));
                                            }
                                        }
                                    }
                                }
                            } else {
                                exit(send(array('code' => -2, 'text' => 'qrsig错误')));
                            }
                        }
                    } else {
                        if ($type == 7) {
                            if ($qrsig == null) {
                                $url .= 'https://ssl.ptlogin2.qq.com/ptqrshow?appid=716027613&e=2&l=M&s=3&d=72&v=4&t=0.773076' . time() . '&daid=377&pt_3rd_aid=0';
                                $arr = get_curl($url, 0, 0, 0, 1, 0, 0, 1);
                                preg_match('/qrsig=(.*?);/', $arr['header'], $match);
                                if ($qrsig = $match[1]) {
                                    $img = $arr['body'];
                                    $base64 = base64_encode($arr['body']);
                                    file_put_contents('data/qqrcode/img/' . $time . '.png', $img);
                                    exit(send(array('code' => 1, 'qrsig' => $qrsig, 'url' => "http://".$_SERVER['HTTP_HOST']."/api/data/qqrcode/img/" . $time . ".png", 'base64' => $base64)));
                                } else {
                                    exit(send(array('code' => -1, 'text' => "二维码获取失败")));
                                }
                            } else {
                                $url .= 'https://ssl.ptlogin2.qq.com/ptqrlogin?u1=https%3A%2F%2Fconnect.qq.com%2Flogin_success.html&ptqrtoken=' . getqrtoken($qrsig) . '&ptredirect=0&h=1&t=1&g=1&from_ui=1&ptlang=2052&action=0-0-' . time() . '&js_ver=21081215&js_type=1&login_sig=' . login_sig($type) . '&pt_uistyle=40&aid=716027613&daid=377&has_onekey=1&';
                                $ret = get_curl($url, 0, $url, 'qrsig=' . $qrsig . '; ', 1);
                                if (preg_match("/ptuiCB\\('(.*?)'\\)/", $ret, $arr)) {
                                    $r = explode("','", str_replace("', '", "','", $arr[1]));
                                    if ($r[0] == 0) {
                                        preg_match('/superuin=(.*?);/', $ret, $uin);
                                        preg_match('/skey=@(.{9});/', $ret, $skey);
                                        preg_match('/superkey=(.*?);/', $ret, $superkey);
                                        preg_match('/supertoken=(.*?);/', $ret, $supertoken);
                                        $data = get_curl($r[2], 0, 0, 0, 1);
                                        preg_match("/p_skey=(.*?);/", $data, $pskey);
                                        preg_match('/pt4_token=(.*?);/', $data, $pt4_token);
                                        $qq = getuin($uin[1]);
                                        exit(send(array('code' => 1, 'text' => '登录成功', 'data' => array('name' => $r[5], 'QQ' => $qq, 'p_skey' => $pskey[1], 'skey' => "@" . $skey[1], 'superkey' => $superkey[1], 'supertoken' => $supertoken[1], 'pt4_token' => $pt4_token[1]))));
                                    } else {
                                        if ($r[0] == 65) {
                                            exit(send(array('code' => 1, 'text' => '二维码已失效')));
                                        } else {
                                            if ($r[0] == 66) {
                                                exit(send(array('code' => 1, 'text' => '二维码未失效')));
                                            } else {
                                                if ($r[0] == 67) {
                                                    exit(send(array('code' => 1, 'text' => '扫码成功，请在手机上确认登录')));
                                                } else {
                                                    exit(send(array('code' => -3, 'text' => '未知错误')));
                                                }
                                            }
                                        }
                                    }
                                } else {
                                    exit(send(array('code' => -2, 'text' => 'qrsig错误')));
                                }
                            }
                    }else{
                       exit(send(array('code' => -4, 'text' => '参数错误')));
                    }
                }
            }
        }
    }
}
}