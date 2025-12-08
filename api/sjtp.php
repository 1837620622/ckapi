<?php
include("./API.php");
tongji("sjtp");
$txt='data/wenben/sjtp.txt';
$a=file($txt);
$b=count($a);
$rand=rand(0,$b);
$rand_shuchu=$a[$rand];
echo $rand_shuchu
?>