<?php
include("../../../tianyi.php");
//1.配置图片路径  
$src = "http://".$_SERVER['HTTP_HOST']."/api/sjbz.php?method=pc&lx=fengjing";  
//2.获取图片信息  
$info = getimagesize($src);  
//3.通过编号获取图像类型  
$type = image_type_to_extension($info[2],false);  
//4.在内存中创建和图像类型一样的图像  
$fun = "imagecreatefrom".$type;  
//5.图片复制到内存  
$image = $fun($src);  
/*操作图片*/  
//1.设置字体的路径  
$font = "../../../api/data/ttf/1.ttf";
//2.填写水印内容  
$msg = $_GET['msg'];
$txt=str_replace("[换行]","\n",$msg);
$txt1 = str_replace('%', '％', $txt);
$Copyright = "\n『".$ming."API』提供技术支持";
//3.设置字体颜色和透明度  
$color = imagecolorallocatealpha($image, rand(0,255), rand(0,255), rand(0,255), 0);  
//4.写入文字 (图片资源，字体大小，旋转角度，坐标x，坐标y，颜色，字体文件，内容) 
imagettftext($image, 27, 0, 40, 40, $color, $font, $txt1.$Copyright);  
/*输出图片*/  
//浏览器输出  
header("Content-type:".$info['mime']);  
$fun = "image".$type;  
$fun($image); 
//保存图片 
//$fun($image,'bg_res.'.$type);  
/*销毁图片*/  
imagedestroy($image);
?>