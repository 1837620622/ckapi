<?php
include("./API.php");
include("../tianyi.php");
tongji("sgbaike");
$type = $_REQUEST['type'];//返回格式，默认json，可选text
$msg = $_REQUEST['msg'];//要查询的词条名
$hh = $_REQUEST['hh']?:"\n";//换行
if($msg==null){
switch ($type) {
         case 'text':
    echo "".$ming."API搜狗百科".$hh."";
    echo "━━━━━━━━━".$hh."";
    echo "请输入要查询的词条名";
    echo "━━━━━━━━━".$hh."";
    echo "Tips:".$ming."API技术支持";
    exit;
        default:
    header('Content-Type:application/json');
    $array = array('code'=>-1,'text'=>"请输入要查询的词条名");
    echo json_encode($array,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    exit;
    }
}else{
$a = file_get_contents("http://pic.sogou.com/ris/risBaike?query=1&name=".$msg."&baike_xiaoqi=false");
preg_match_all('/category":\["(.*?)"\]/',$a,$c);
$f=$c[1][0];
$f=str_replace('","','、',$f);
$json = json_decode($a, true);
$c=$json["baikeMsg"];//判断
$lj=$json["link"];//链接
$t=$json["image"];//图片
$r=$json["content"];//百科内容
$g=$json["cardItem"];//更多
$g=str_replace('|',''.$hh.'',$g);
if($c=="词条不存在"){
    switch ($type) {
        case 'text':
            echo "".$ming."API搜狗百科".$hh."";
            echo "━━━━━━━━━".$hh."";
            echo "不存在词条".$msg."的信息";
            echo "━━━━━━━━━".$hh."";
            echo "Tips:".$ming."API技术支持";
            exit();
        default:
            header('Content-Type:application/json');
            $array = array("code"=>-2,"text"=>"不存在词条".$msg."的信息");
            echo json_encode($array,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
            exit();
   }
}else{
    switch ($type) {
         case 'text':
            echo "".$ming."API搜狗百科".$hh."";
            echo "━━━━━━━━━".$hh."";
            echo "±img=".$t."±".$hh."";
            echo "".$r."".$hh."";
            echo "".$f."".$hh."";
            echo "".$g."".$hh."";
            echo "".$hh."链接:".$lj."".$hh."";
            echo "━━━━━━━━━".$hh."";
            echo "Tips:".$ming."API技术支持";
    exit;
        default:
    header('Content-Type:application/json');
    $array = array("code"=>1,"img"=>"$t","text"=>"$r$g","link"=>"$lj");
    echo json_encode($array,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    exit;
    }
}
}