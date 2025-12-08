<?php
include("./API.php");
tongji("qyt");
$size = readfile('http://search.video.qiyi.com/m?if=defaultQuery&platform=17&is_qipu_platform=1');
echo $size;
?>