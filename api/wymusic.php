<?php
include("./API.php");
tongji("wymusic");
$id = $_GET['id'];//输网易云音乐的歌曲ID
$wyy = 'http://music.163.com/song/media/outer/url?id=';
header('Location:'.$wyy . $id . ".mp3");
?>