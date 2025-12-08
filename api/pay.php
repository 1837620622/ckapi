<?php
include("./API.php");
tongji("pay");
$qq = $_REQUEST['qq'];//付款对象
$uin = $_REQUEST['uin'];//操作者账号
$title = $_REQUEST['title'];//发起收款的标题
$group = $_REQUEST['group'];//群号
$pskey = $_REQUEST['pskey'];//tenpay.com的pskey
$type = $_REQUEST['type'];//返回格式，默认json，可选text
$je = $_REQUEST['je'];//金额，最大2000，最小0.01
$select = $_REQUEST['select'];//类型，1为发起，2为查询，3为收，4为取消
$payid = $_REQUEST['payid'];//订单号，查询，取消，催收时必须
if ($select == 1) {
    if (empty($title)) {
        switch ($type) {
            case 'text':
                echo '请输入收款标题';
            default:
                $array = array('code' => -1, 'text' => "请输入收款标题");
                echo json_encode($array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                exit;
        }
    }
    if (empty($qq)) {
        switch ($type) {
            case 'text':
                echo '请输入付款者QQ';
            default:
                $array = array('code' => -2, 'text' => "请输入付款者QQ");
                echo json_encode($array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                exit;
        }
    }
    if (empty($group)) {
        switch ($type) {
            case 'text':
                echo '请输入群号';
            default:
                $array = array('code' => -3, 'text' => "请输入群号");
                echo json_encode($array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                exit;
        }
    }
    if (empty($je)) {
        switch ($type) {
            case 'text':
                echo '请输入收款金额';
            default:
                $array = array('code' => -4, 'text' => "请输入收款金额");
                echo json_encode($array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                exit;
        }
    }
    if (empty($uin)) {
        switch ($type) {
            case 'text':
                echo '请输入操作者QQ';
            default:
                $array = array('code' => -5, 'text' => "请输入操作者QQ");
                echo json_encode($array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                exit;
        }
    }
    if (empty($pskey)) {
        switch ($type) {
            case 'text':
                echo '请输入pskey';
            default:
                $array = array('code' => -6, 'text' => "请输入pskey");
                echo json_encode($array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                exit;
        }
    }
    if (!preg_match('/[1-9][0-9]{4,11}/', $group)) {
        switch ($type) {
            case 'text':
                echo '群号错误';
                exit;
            default:
                $array = array('code' => -3, 'text' => "群号错误");
                echo json_encode($array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                exit;
        }
    }
    if (!preg_match('/[1-9][0-9]{5,11}/', $uin)) {
        switch ($type) {
            case 'text':
                echo "操作者QQ错误";
                exit;
            default:
                $array = array('code' => -5, 'text' => "操作者QQ错误");
                echo json_encode($array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                exit;
        }
    }
    if (!is_numeric($je)) {
        switch ($type) {
            case 'text':
                echo "请输入正确的收款金额";
                exit;
            default:
                $array = array('code' => -4, 'text' => "请输入正确的收款金额");
                echo json_encode($array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                exit;
        }
    }
    if ($je > 2000) {
        switch ($type) {
            case 'text':
                echo "收款金额过大";
                exit;
            default:
                $array = array('code' => -7, 'text' => "收款金额过大");
                echo json_encode($array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                exit;
        }
    }
    $je1 = $je * 100;
    $list = '[{"uin":"' . $qq . '","amount":"' . $je1 . '"}]';
    $url = 'https://mqq.tenpay.com/cgi-bin/qcollect/qpay_collect_create.cgi?type=2&memo=' . $title . '&amount=' . $je1 . '&payer_list=' . $list . '&num=1&recv_type=1&group_id=' . $group . '&uin=' . $uin . '&pskey=' . $pskey . '&skey_type=2';
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_TIMEOUT, 30);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
    $return = curl_exec($curl);
    curl_close($curl);
    $json = json_decode($return, true);
    $code = $json['retcode'];
    $msg = $json['retmsg'];
    if ($code == 66249404) {
        switch ($type) {
            case 'text':
                echo "操作者信息错误";
                exit;
            default:
                $array = array('code' => -12, 'text' => '操作者信息错误');
                echo json_encode($array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                exit;
        }
    } else {
        if ($code == 66201001) {
            switch ($type) {
                case 'text':
                    echo $msg;
                    exit;
                default:
                    $array = array('code' => -10, 'text' => "请求参数错误");
                    echo json_encode($array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                    exit;
            }
        } else {
            if ($msg == "ok") {
                switch ($type) {
                    case 'text':
                        echo "发起成功，发起者:" . $uin . "\n收款者:" . $qq . "\n金额:" . $je . "\n订单号:" . $json['collection_no'];
                        exit;
                    default:
                        $array = array('code' => 1, 'text' => '发起成功', 'money' => $je, 'uin' => $uin, 'pay_uin' => $qq, 'pay_id' => $json['collection_no']);
                        echo json_encode($array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                        exit;
                }
            } else {
                if ($code == 66249425) {
                    switch ($type) {
                        case 'text':
                            echo "根据国家法律要求，你需要添加中国大陆Ⅰ类银行卡完善身份信息，以继续使用QQ支付，你可以致电银行客服确认银行卡类型";
                            exit;
                        default:
                            $array = array('code' => -13, 'text' => '根据国家法律要求，你需要添加中国大陆Ⅰ类银行卡完善身份信息，以继续使用QQ支付，你可以致电银行客服确认银行卡类型。');
                            echo json_encode($array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                            exit;
                    }
                } else {
                    switch ($type) {
                        case 'text':
                            echo "未知错误，请重试";
                            exit;
                        default:
                            $array = array('code' => -11, 'text' => '未知错误，请重试');
                            echo json_encode($array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                            exit;
                    }
                }
            }
        }
    }
} else {
    if ($select == 2) {
        if (empty($uin)) {
            switch ($type) {
                case 'text':
                    echo '请输入操作者QQ';
                default:
                    $array = array('code' => -5, 'text' => "请输入操作者QQ");
                    echo json_encode($array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                    exit;
            }
        }
        if (!preg_match('/[1-9][0-9]{5,11}/', $uin)) {
            switch ($type) {
                case 'text':
                    echo "操作者QQ错误";
                    exit;
                default:
                    $array = array('code' => -5, 'text' => "操作者QQ错误");
                    echo json_encode($array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                    exit;
            }
        }
        if (empty($pskey)) {
            switch ($type) {
                case 'text':
                    echo '请输入pskey';
                default:
                    $array = array('code' => -6, 'text' => "请输入pskey");
                    echo json_encode($array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                    exit;
            }
        }
        if (empty($payid)) {
            switch ($type) {
                case 'text':
                    echo "请输入订单号";
                    exit;
                default:
                    $array = array('code' => -9, 'text' => "请输入订单号");
                    echo json_encode($array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                    exit;
            }
        }
        $url = 'https://mqq.tenpay.com/cgi-bin/qcollect/qpay_collect_detail.cgi?collection_no=' . $payid . '&uin=' . $uin . '&pskey=' . $pskey . '&skey=' . $pskey . '&skey_type=2';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        $return = curl_exec($curl);
        curl_close($curl);
        $json = json_decode($return, true);
        $code = $json["retcode"];
        $msg = $json["retmsg"];
        $state = $json["state"];
        if ($code == 66210007) {
            switch ($type) {
                case 'text':
                    echo "操作者信息错误";
                    exit;
                default:
                    $array = array('code' => -12, 'text' => '操作者信息错误');
                    echo json_encode($array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                    exit;
            }
        }
        if ($code == 926120042) {
            switch ($type) {
                case 'text':
                    echo "订单号错误";
                    exit;
                default:
                    $array = array('code' => -9, 'text' => '订单号错误');
                    echo json_encode($array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                    exit;
            }
        }
        if ($code == 66201001) {
            switch ($type) {
                case 'text':
                    echo "请求参数错误";
                    exit;
                default:
                    $array = array('code' => -10, 'text' => '请求参数错误');
                    echo json_encode($array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                    exit;
            }
        }
        if ($code == 0) {
            if ($state == 1) {
                switch ($type) {
                    case 'text':
                        echo "未支付";
                        exit;
                    default:
                        $array = array('code' => 1, 'text' => '未支付');
                        echo json_encode($array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                        exit;
                }
            } else {
                if ($state == 2) {
                    switch ($type) {
                        case 'text':
                            echo "已支付";
                            exit;
                        default:
                            $array = array('code' => 1, 'text' => '已支付');
                            echo json_encode($array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                            exit;
                    }
                } else {
                    switch ($type) {
                        case 'text':
                            echo "错误，未知状态";
                            exit;
                        default:
                            $array = array('code' => -8, 'text' => '错误，未知状态');
                            echo json_encode($array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                            exit;
                    }
                }
            }
        } else {
            switch ($type) {
                case 'text':
                    echo "未知错误";
                    exit;
                default:
                    $array = array('code' => -11, 'text' => '未知错误');
                    echo json_encode($array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                    exit;
            }
        }
    } else {
        if ($select == 3) {
            $url = 'https://mqq.tenpay.com/cgi-bin/qcollect/qpay_collect_sendmsg.cgi?collection_no=' . $payid . '&uin=' . $uin . '&pskey=' . $pskey . '&skey=' . $pskey . '&skey_type=2';
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_TIMEOUT, 30);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
            $return = curl_exec($curl);
            curl_close($curl);
            $json = json_decode($return, true);
            $code = $json["retcode"];
            $msg = $json["retmsg"];
            if ($code == 66201001) {
                switch ($type) {
                    case 'text':
                        echo "请求参数错误";
                        exit;
                    default:
                        $array = array('code' => -10, 'text' => '请求参数错误');
                        echo json_encode($array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                        exit;
                }
            }
            if ($code == 66210007) {
                switch ($type) {
                    case 'text':
                        echo "操作者信息错误";
                        exit;
                    default:
                        $array = array('code' => -12, 'text' => '操作者信息错误');
                        echo json_encode($array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                        exit;
                }
            }
            if ($code == 926120042) {
                switch ($type) {
                    case 'text':
                        echo "订单号错误";
                        exit;
                    default:
                        $array = array('code' => -9, 'text' => '订单号错误');
                        echo json_encode($array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                        exit;
                }
            }
            if ($code == 0) {
                switch ($type) {
                    case 'text':
                        echo "催收成功";
                        exit;
                    default:
                        $array = array('code' => 1, 'text' => '催收成功');
                        echo json_encode($array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                        exit;
                }
            } else {
                switch ($type) {
                    case 'text':
                        echo "未知错误";
                        exit;
                    default:
                        $array = array('code' => -11, 'text' => '未知错误');
                        echo json_encode($array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                        exit;
                }
            }
        } else {
            if ($select == 4) {
                if (empty($uin)) {
                    switch ($type) {
                        case 'text':
                            echo '请输入操作者QQ';
                        default:
                            $array = array('code' => -5, 'text' => "请输入操作者QQ");
                            echo json_encode($array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                            exit;
                    }
                }
                if (!preg_match('/[1-9][0-9]{5,11}/', $uin)) {
                    switch ($type) {
                        case 'text':
                            echo "操作者QQ错误";
                            exit;
                        default:
                            $array = array('code' => -5, 'text' => "操作者QQ错误");
                            echo json_encode($array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                            exit;
                    }
                }
                if (empty($pskey)) {
                    switch ($type) {
                        case 'text':
                            echo '请输入pskey';
                        default:
                            $array = array('code' => -6, 'text' => "请输入pskey");
                            echo json_encode($array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                            exit;
                    }
                }
                if (empty($payid)) {
                    switch ($type) {
                        case 'text':
                            echo "请输入订单号";
                            exit;
                        default:
                            $array = array('code' => -9, 'text' => "请输入订单号");
                            echo json_encode($array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                            exit;
                    }
                }
                $url = 'https://mqq.tenpay.com/cgi-bin/qcollect/qpay_collect_close.cgi?collection_no=' . $payid . '&uin=' . $uin . '&pskey=' . $pskey . '&skey=' . $pskey . '&skey_type=2';
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_POST, 1);
                curl_setopt($curl, CURLOPT_TIMEOUT, 30);
                curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
                $return = curl_exec($curl);
                curl_close($curl);
                $json = json_decode($return, true);
                $code = $json["retcode"];
                $msg = $json["retmsg"];
                if ($code == 66201001) {
                    switch ($type) {
                        case 'text':
                            echo "请求参数错误";
                            exit;
                        default:
                            $array = array('code' => -10, 'text' => '请求参数错误');
                            echo json_encode($array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                            exit;
                    }
                }
                if ($code == 66210007) {
                    switch ($type) {
                        case 'text':
                            echo "操作者信息错误";
                            exit;
                        default:
                            $array = array('code' => -12, 'text' => '操作者信息错误');
                            echo json_encode($array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                            exit;
                    }
                }
                if ($code == 926120042) {
                    switch ($type) {
                        case 'text':
                            echo "订单号错误或订单已经支付";
                            exit;
                        default:
                            $array = array('code' => -9, 'text' => '订单号错误或订单已经支付');
                            echo json_encode($array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                            exit;
                    }
                }
                if ($code == 0) {
                    switch ($type) {
                        case 'text':
                            echo "取消成功";
                            exit;
                        default:
                            $array = array('code' => 1, 'text' => '取消成功');
                            echo json_encode($array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                            exit;
                    }
                } else {
                    switch ($type) {
                        case 'text':
                            echo "未知错误";
                            exit;
                        default:
                            $array = array('code' => -11, 'text' => '未知错误');
                            echo json_encode($array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                            exit;
                    }
                }
            } else {
                switch ($type) {
                    case 'text':
                        echo "select参数错误";
                        exit;
                    default:
                        $array = array('code' => -14, 'text' => 'select参数错误');
                        echo json_encode($array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                        exit;
                }
            }
        }
    }
}