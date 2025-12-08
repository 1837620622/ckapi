<?php
include("./API.php");
include("../tianyi.php");
tongji("hqmt");
$a = ($_GET[m]); //输(0-362)
$hh=$_GET["hh"]?:"\n";//换行符号(默认\n)
$arr=range(0,362);
shuffle($arr);
foreach($arr as $values)
$k = $values;

$str = 'http://elf.static.maibaapp.com/content/json/mixed/feature-'.$k.'.json'; 
$html=file_get_contents($str);


$result = preg_match_all('/(.*?)name\":\"(.*?)\"(.*?)/', $html, $arr);

        $arr=range(0,$result); 
        shuffle($arr); 
        foreach($arr as $values); 
        $str = "/name\":\"(.*?)\"/"; 

        
        preg_match_all($str,$html,$trstr); 
        
         if($a==1) 
{ 
         echo "http://webimg.maibaapp.com/content/img/avatars/";
        echo "".$trstr[1][$values].""; 
} else { 


        
                
                        
if($a==2) 
{ 
$img = "http://webimg.maibaapp.com/content/img/avatars/".$trstr[1][$values]."";
$img = file_get_contents($img,true);
//使用图片头输出浏览器
header("Content-Type: image/jpeg;text/html; charset=utf-8");
echo $img;
exit;

}else{ 



        echo "".$ming."API小妖精随机精选图".$hh."";
        echo "━━━━━━━━━".$hh."";
        echo "±img=http://webimg.maibaapp.com/content/img/avatars/".$trstr[1][$values]."±".$hh."";
        echo "━━━━━━━━━".$hh."";
        echo "Tips:".$ming."API技术支持";
        }
        }

        
?>