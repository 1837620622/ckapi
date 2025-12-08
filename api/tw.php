<?php
include("./API.php");
include('../tianyi.php');
tongji("tw");
//1.配置图片路径  
$img=rand(0,36);
$t=rand(1,9);
$time=time();
$imgsj = "data/tw/img/".$img.".png";
$src = $_GET['imgurl']?:$imgsj;

//获取图片信息

$info = getimagesize($src);
$imgk=$info[0];
$imgkdxz=$imgk-60;
$imgkdxz = $_GET['wzkd']?:$imgkdxz;

//获取图片扩展名

$type = image_type_to_extension($info[2],false);

//动态的把图片导入内存中

$fun = "imagecreatefrom{$type}";

$image = $fun($src);

function autowrap($fontsize, $angle, $fontface, $string, $width) {
// 这几个变量分别是 字体大小, 角度, 字体名称, 字符串, 预设宽度
	$content = "";

	// 将字符串拆分成一个个单字 保存到数组 letter 中
	for ($i=0;$i<mb_strlen($string);$i++) {
		$letter[] = mb_substr($string, $i, 1);
	}

	foreach ($letter as $l) {
		$teststr = $content." ".$l;
		$testbox = imagettfbbox($fontsize, $angle, $fontface, $teststr);
		// 判断拼接后的字符串是否超过预设的宽度
		if (($testbox[2] > $width) && ($content !== "")) {
			$content .= "\n";
		}
		$content .= $l;
	}
	return $content;
}


$msg = $_GET['msg'];//需要合成的内容
$wb = $_GET['wb']?:"『".$ming."API』提供技术支持";//自定义尾巴内容
$ttf=$_GET["zt"]?:$t;//字体类型(目前可选1)
$d=$_GET["dx"]?:46;//字体大小
$x=$_GET["x"]?:90;//x坐标(从左往右数)
$y=$_GET["y"]?:700;//y坐标(从上往下数)
$tm=$_GET["tm"]?:0;//字体透明度
$hh=$_GET["hh"]?:"|";//自定义换行符
$msg=$msg.$hh.$hh.$wb;
$font="./data/ttf/".$ttf.".ttf";
$txt=str_replace($hh, "\n", $msg);

$txt = autowrap(46, 0, "data/ttf/1.ttf", $txt, $imgkdxz); // 自动换行处理
/*3.设置字体颜色和透明度*/
$color = imagecolorallocatealpha($image, rand(0,255), rand(0,255), rand(0,255), $tm);
//4.写入文字 (图片资源，字体大小，旋转角度，坐标x 左右，坐标y 上下，颜色，字体文件，内容) 
imagettftext($image, $d, 0, $x, $y, $color, $font, $txt);  

header('Content-type:'.$info['mime']);


$func = "image{$type}";

$func($image);


imagedestroy($image);