<?php
include("./API.php");
tongji("wzzyy");
$res = readfile('http://tts.baidu.com/text2audio?lan=en&pid=101&ie=UTF-8&text=' .$_GET['text']. '&spd=' .$_GET['spd']. '');
header('Content-type: audio/mp3');
$res=imagecreatefromstring(file_get_contents($src));
imagepng($res);
imagedestroy($res);
?>