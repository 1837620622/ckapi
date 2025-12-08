<?php
include("./API.php");
tongji("ACG");
require 'data/ACG/need.php';
$str = explode("\n", file_get_contents('data/wenben/ACG.txt'));
$k = rand(0, count($str));
$sina_img = str_re($str[$k]);
$size_arr = array('large', 'mw1024', 'mw690', 'bmiddle', 'small', 'thumb180', 'thumbnail', 'square');
$size = !empty($_REQUEST['size']) ? $_REQUEST['size'] : 'large';
if (!in_array($size, $size_arr)) {
    $size = 'large';//图片大小，默认large(大)，可选small(小),mw1024(宽为1024),mw690(宽为690),bmiddle(宽为440),thumb180(高,宽为180),thumbnail(宽为120,高为67),square(头像)
}
$url = 'https://tva4.sinaimg.cn/' . $size . '/' . $sina_img . '.jpg';
$type = $_REQUEST['type'];//返回格式，默认json可选text,js,image,jump
switch ($type) {
    case 'image':
            header('Content-Type: image/jpeg');
            $img = file_get_contents($url);
            exit($img);
//IMG
        case 'jump':
        header("Location:" . $url);
            case 'text':
                exit($url);
                case 'js':
                    exit("function hitokoto(){document.write('" . $url ."');}");
            default :
        $imageInfo = getimagesize($url);
        exit(send(array(
            'code'=>1,
            'text'=>'获取成功',
            'data'=>array(
                'url'=>$url,
                'width'=>$imageInfo[0],
                'height'=>$imageInfo[1]
                )
            )));
}