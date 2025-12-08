<?php
header("Content-Type:text/html;charset=UTF-8");
include("./API.php");
tongji("baoshi");
$msg=$_GET['msg']?:"19:00";//输整点时间(默认19:00)
if($msg=="1:00"){
echo "http://".$_SERVER['HTTP_HOST']."/api/data/baoshi/1.mp3";
exit();
}else if($msg=="2:00"){
echo "http://".$_SERVER['HTTP_HOST']."/api/data/baoshi/2.mp3";
exit();
}else if($msg=="3:00"){
echo "http://".$_SERVER['HTTP_HOST']."/api/data/baoshi/3.mp3";
exit();
}else if($msg=="4:00"){
echo "http://".$_SERVER['HTTP_HOST']."/api/data/baoshi/4.mp3";
exit();
}else if($msg=="5:00"){
echo "http://".$_SERVER['HTTP_HOST']."/api/data/baoshi/5.mp3";
exit();
}else if($msg=="6:00"){
echo "http://".$_SERVER['HTTP_HOST']."/api/data/baoshi/6.mp3";
exit();
}else if($msg=="7:00"){
echo "http://".$_SERVER['HTTP_HOST']."/api/data/baoshi/7.mp3";
exit();
}else if($msg=="8:00"){
echo "http://".$_SERVER['HTTP_HOST']."/api/data/baoshi/8.mp3";
exit();
}else if($msg=="9:00"){
echo "http://".$_SERVER['HTTP_HOST']."/api/data/baoshi/9.mp3";
exit();
}else if($msg=="10:00"){
echo "http://".$_SERVER['HTTP_HOST']."/api/data/baoshi/10.mp3";
exit();
}else if($msg=="11:00"){
echo "http://".$_SERVER['HTTP_HOST']."/api/data/baoshi/11.mp3";
exit();
}else if($msg=="12:00"){
echo "http://".$_SERVER['HTTP_HOST']."/api/data/baoshi/12.mp3";
exit();
}else if($msg=="13:00"){
echo "http://".$_SERVER['HTTP_HOST']."/api/data/baoshi/13.mp3";
exit();
}else if($msg=="14:00"){
echo "http://".$_SERVER['HTTP_HOST']."/api/data/baoshi/14.mp3";
exit();
}else if($msg=="15:00"){
echo "http://".$_SERVER['HTTP_HOST']."/api/data/baoshi/15.mp3";
exit();
}else if($msg=="16:00"){
echo "http://".$_SERVER['HTTP_HOST']."/api/data/baoshi/16.mp3";
exit();
}else if($msg=="17:00"){
echo "http://".$_SERVER['HTTP_HOST']."/api/data/baoshi/17.mp3";
exit();
}else if($msg=="18:00"){
echo "http://".$_SERVER['HTTP_HOST']."/api/data/baoshi/18.mp3";
exit();
}else if($msg=="19:00"){
echo "http://".$_SERVER['HTTP_HOST']."/api/data/baoshi/19.mp3";
exit();
}else if($msg=="20:00"){
echo "http://".$_SERVER['HTTP_HOST']."/api/data/baoshi/20.mp3";
exit();
}else if($msg=="21:00"){
echo "http://".$_SERVER['HTTP_HOST']."/api/data/baoshi/21.mp3";
exit();
}else if($msg=="22:00"){
echo "http://".$_SERVER['HTTP_HOST']."/api/data/baoshi/22.mp3";
exit();
}else if($msg=="23:00"){
echo "http://".$_SERVER['HTTP_HOST']."/api/data/baoshi/23.mp3";
exit();
}else if($msg=="24:00"){
echo "http://".$_SERVER['HTTP_HOST']."/api/data/baoshi/24.mp3";
exit();
}else{
echo "请输入正确的时间";
}
?>