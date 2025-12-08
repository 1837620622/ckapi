<?php
header("Content-Type:text/html;charset=UTF-8");
$txt='d.txt';
$a=file($txt);
$b=count($a);
$rand=rand(0,$b);
$rand_shuchu=$a[$rand];
echo $rand_shuchu
?>