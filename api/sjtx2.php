<?php
require './data/sjtx/need.php';
require './data/sjtx/curl.php';
$type = ($_GET['type']); //默认json可选text或image
$form = $_REQUEST['form']?:'随机头像';//头像类型默认随机头像可选女生头像/男生头像
$value = [
    '男生头像'=>14,
    '随机头像'=>15,
    '女生头像'=>13
//    '情侣'=>12,
];
if(empty($value[$form])){
    $value[$form] = 15;
}
//print_r($value);exit;
$arr=range(0,37);#43
//if($
shuffle($arr);
foreach($arr as $values){
    $k = $values;
    break;
}
$str = 'http://elf.static.maibaapp.com/content/json/avatars/li-'.$value[$form].'-'.$k.'.json'; 
//echo $str;exit();
$html=file_get_contents($str);
$result = preg_match_all('/(.*?)in\":\"(.*?)\"(.*?)/', $html, $arr);
$arr=range(0,$result); 
shuffle($arr); 
foreach($arr as $values); 
$str = "/in\":\"(.*?)\"/"; 
if(preg_match_all($str,$html,$trstr)){
    Switch($type){
        case 'text':
        echo "http://webimg.maibaapp.com/content/img/avatars/";
        echo "".$trstr[1][$values];
        exit();
        break;
        case 'image':
        send('http://webimg.maibaapp.com/content/img/avatars/'.$trstr[1][$values],'image');
        exit();
        break;
        default:
        send([
            'code'=>1,
            'text'=>'http://webimg.maibaapp.com/content/img/avatars/'.$trstr[1][$values]
            ],$type
        );
        exit();
        break;
    }
}else{
    Switch($type){
        case 'text':
        send('获取失败','text');
        exit();
        break;
        default:
        send([
            'code'=>'-1',
            'text'=>'获取失败'
        ]);
        exit();
        break;
    }
}



?>