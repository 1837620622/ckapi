<?php
include("./API.php");
include("../tianyi.php");
tongji("hlx_login");
require 'data/hlx_login/need.php';
$key = md5($_REQUEST['key']);//账号密码
$phone = $_REQUEST['phone'];//手机号
$type = $_REQUEST['type'];//返回格式，默认json可选text
$hh = $_REQUEST['hh']?:"\n";//换行符号(默认\n)
if(!$_REQUEST['key']) {
    Switch($type){
        case 'text':
            exit(''.$ming.'API葫芦侠登录'.$hh.'━━━━━━━━━'.$hh.'密码不能为空'.$hh.'━━━━━━━━━'.$hh.'Tips:'.$ming.'API技术支持');
        default:
            exit(send(array("code"=>"-1","text"=>"密码不能为空")));
    }
}

if(!preg_match('/^1([0-9]{10})$/',$phone)){; 
    Switch($type){
        case 'text':
            exit(''.$ming.'API葫芦侠登录'.$hh.'━━━━━━━━━'.$hh.'手机号错误'.$hh.'━━━━━━━━━'.$hh.'Tips:'.$ming.'API技术支持');
        default:
            exit(send(array("code"=>"-2","text"=>"手机号错误")));
    }
}

$url="http://floor.huluxia.com/account/login/ANDROID/4.0?platform=2&gkey=000000&app_version=4.1.0.5&versioncode=20141452&market_id=floor_web&_key=&device_code=%5Bd%5D7ad13623-6758-469b-a176-21c4f1817874&phone_brand_type=UN";
$header=array("User-Agent: okhttp/3.8.1");
$data="account=".$phone."&login_type=2&password=".$key;
$curl=curl_init();
curl_setopt($curl,CURLOPT_URL,$url);
curl_setopt($curl,CURLOPT_HTTPHEADER,$header);
curl_setopt($curl,CURLOPT_POST,1);
curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
curl_setopt($curl,CURLOPT_TIMEOUT,30);
curl_setopt($curl,CURLOPT_FOLLOWLOCATION,1);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,FALSE);
curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,FALSE);
curl_setopt($curl,CURLOPT_ENCODING,'gzip,deflate');
$return=curl_exec($curl);
curl_close($curl);
$json=json_decode($return,true);
$code = $json['code'];
$key=$json['_key'];
$user=$json['user'];
$nc=$user['nick'];
$id=$user['userID'];
$session_key=$json['session_key'];
$age=$user['age'];
$gender=$user['gender'];
$level=$user['level'];
$avatar=$user['avatar'];
$time=$user['birthday'];
$pass=$user['needSetPassword'];
$suser=$user['needSetUserInfo'];
if($code==1102) {
        Switch($type){
        case 'text':
            exit(''.$ming.'API葫芦侠登录'.$hh.'━━━━━━━━━'.$hh.'账号或密码错误'.$hh.'━━━━━━━━━'.$hh.'Tips:'.$ming.'API技术支持');
        default:
            exit(send(array("code"=>"-3","text"=>"账号或密码错误")));
    }
}else{
if($code==null) {
        Switch($type){
        case 'text':
            exit(''.$ming.'API葫芦侠登录'.$hh.'━━━━━━━━━'.$hh.'昵称：'.$nc.''.$hh.'id：'.$id.''.$hh.'年龄：'.$age.''.$hh.'生日：'.date('Y-m-d H:i:s', $time / 1000).''.$hh.'性别：'.xb($gender).''.$hh.'等级：'.$level.''.$hh.'是否需要设置密码：'.setp($pass).''.$hh.'是否需要设置用户信息：'.setuser($suser).''.$hh.'头像：'.$avatar.''.$hh.'key：'.$key.''.$hh.'session_key：'.$session_key.''.$hh.'━━━━━━━━━'.$hh.'Tips:'.$ming.'API技术支持');
        default:
            exit(send(array(
                "code"=>"1",
                "text"=>"登录成功",
                "data"=>array(
                    "nick"=>$nc,
                    "id"=>$id,
                    "age"=>$age,
                    "birthday"=>date('Y-m-d H:i:s', $time / 1000),
                    "gender"=>xb($gender),
                    "level"=>$level,
                    "password"=>setp($pass),
                    "userinfo"=>setuser($suser),
                    "avatar"=>$avatar,
                    "key"=>$key,
                    "session_key"=>$session_key,
                    )
                )));
    }
}else{
    if($code==102) {
        Switch($type){
        case 'text':
            exit(''.$ming.'API葫芦侠登录'.$hh.'━━━━━━━━━'.$hh.'手机号错误'.$hh.'━━━━━━━━━'.$hh.'Tips:'.$ming.'API技术支持');
        default:
            exit(send(array("code"=>"-2","text"=>"手机号错误")));
    }
}else{
    if($code==1101) {
        Switch($type){
        case 'text':
            exit(''.$ming.'API葫芦侠登录'.$hh.'━━━━━━━━━'.$hh.'账号不存在'.$hh.'━━━━━━━━━'.$hh.'Tips:'.$ming.'API技术支持');
        default:
            exit(send(array("code"=>"-4","text"=>"账号不存在")));
    }
    }else{
    if($code==101) {
        Switch($type){
        case 'text':
            exit(''.$ming.'API葫芦侠登录'.$hh.'━━━━━━━━━'.$hh.'参数不能为空'.$hh.'━━━━━━━━━'.$hh.'Tips:'.$ming.'API技术支持');
        default:
            exit(send(array("code"=>"-5","text"=>"参数不能为空")));
        }
    }else{
        Switch($type){
        case 'text':
            exit(''.$ming.'API葫芦侠登录'.$hh.'━━━━━━━━━'.$hh.'未知错误'.$hh.'━━━━━━━━━'.$hh.'Tips:'.$ming.'API技术支持');
        default:
            exit(send(array("code"=>"-6","text"=>"未知错误")));  
    }
}
}
}
}
}