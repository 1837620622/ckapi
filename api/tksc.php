<?php
header("Content-type: image/png");
include("./API.php");
include("../tianyi.php");
tongji("tksc");
$qq = $_GET['qq']?:"3189402257";//需要制作头像的QQ号
$type = $_GET['type'];//输数字(0-34)(默认随机)
$imgSize = $_GET['imgSize']?:"640";//图片尺寸，可选 640、140、100、40
if(!isset($type)){
$type = mt_rand(0, 34);
}
if($type <= 0 || $type > 34){
$type = 0;
}
$touxiang = imagecreatefromjpeg('https://q1.qlogo.cn/g?b=qq&nk='.$qq.'&s='.$imgSize);
$hat = imagecreatefrompng('data/tksc/imgs/hat'.$type.'.png');
$x=imagesx($hat);
$y=imagesy($hat);
imagecopyresized($touxiang,$hat,0,0,0,0, $imgSize, $imgSize, $x, $y);
imagedestroy($hat);
imagepng($touxiang);
imagedestroy($touxiang);