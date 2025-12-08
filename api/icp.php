<?php
include("./API.php");
include("../tianyi.php");
tongji("icp");
$url = $_REQUEST['url'];//需要查询的链接
$type = $_REQUEST['type'];//返回格式，默认json可选text
$hh=$_REQUEST['hh']?:"\n";//换行符号(默认\n)
require 'data/icp/need.php';
if (!strstr($url, ".")) {
    Switch($type){
        case 'text':
            exit(''.$ming.'API♧ICP备案查询'.$hh.'━━━━━━━━━'.$hh.'域名错误'.$hh.'━━━━━━━━━'.$hh.'Tips:'.$ming.'API技术支持');
        default:
            exit(send(array("code"=>"-1","text"=>"域名错误")));
    }
}
    

    $json = file_get_contents('https://icp.chinaz.com/' . $url);
    
    $b = '<span class="fz12 col-gray04 plr5 fl">以下信息更新时间：';
    $c = '</span>';
    $timegx = GetBetween($json, $b, $c);
    
    $b = 'href="//data.chinaz.com/company/t0-p0-c0-i0-d0-s-';
    $c = '">';
    $name = GetBetween($json, $b, $c);
    
    $b = '<p><strong class="fl fwnone">';
    $c = '</strong></p>';
    $nature = GetBetween($json, $b, $c);
    
    $b = '<p><font>';
    $c = '</font>';
    $icp = GetBetween($json, $b, $c);
    
    $b = '<span>网站名称</span>';
    $c = '</p>';
    $sitename1 = GetBetween($json, $b, $c);
    
    $b = '<p>';
    $c = '</p>';
    $sitename = GetBetween($sitename1, $b, $c);
    
    $b = '<span>网站首页网址</span>';
    $c = '</p>';
    $index1 = GetBetween($json, $b, $c);
    
    $b = '<p class="Wzno">';
    $c = '</p>';
    $index = GetBetween($index1, $b, $c);
    
    $b = '<span>审核时间</span>';
    $c = '</li>';
    $time1 = GetBetween($json, $b, $c);
    
    $b = '<p>';
    $c = '</p>';
    $time = GetBetween($time1, $b, $c);

if($icp==null) {
    Switch($type){
        case 'text':
            exit(''.$ming.'API♧ICP备案查询'.$hh.'━━━━━━━━━'.$hh.'网站未备案或备案取消'.$hh.'━━━━━━━━━'.$hh.'Tips:'.$ming.'API技术支持');
        default:
            exit(send(array("code"=>"1",
            "text"=>"".$ming."API♧ICP备案查询".$hh."━━━━━━━━━".$hh."网站未备案或备案取消━━━━━━━━━".$hh."Tips:".$ming."API技术支持"
            )));
    }
}else{
    Switch($type){
        case 'text':
            exit(''.$ming.'API♧ICP备案查询'.$hh.'━━━━━━━━━'.$hh.'主办单位名称：' . $name . ''.$hh.'主办单位性质：' . $nature . ''.$hh.'网站备案/许可证号：' . $icp . ''.$hh.'网站名称：' . $sitename . ''.$hh.'网站首页网址：' . $index . ''.$hh.'审核时间：' . $time . ''.$hh.'更新时间：'.$timegx.''.$hh.'━━━━━━━━━'.$hh.'Tips:'.$ming.'API技术支持');
        default:
            exit(send(array("code"=>"1",
            "text"=>"获取成功",
            "Organizer"=>$name,
            "Nature"=>$nature,
            "SiteLicense"=>$icp,
            "SiteName"=>$sitename,
            "Index"=>$index,
            "VerifyTime"=>$time,
            "UpdateTime"=>$timegx
            )));
    }
}