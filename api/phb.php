<?php
header("Content-Type:text/html;charset=UTF-8");
include("./API.php");
tongji("phb");
$hh=$_GET["hh"]?:"\n";//换行
$msg=explode("\n",$_POST["msg"]);
$name=$_POST["name"];
$id=$_POST["id"];
foreach($msg as $k=>$v){
if($k!=0&&$v){
$data_num=explode("=",$v);
$data_list[$k]["qq"]=$data_num[0];
$data_list[$k]["money"]=$data_num[1];
}
}
array_multisort(array_column($data_list,'money'),SORT_DESC,$data_list);
$data_list_one=array_slice($data_list,0,$id);
$end=end($data_list_one);
foreach($data_list_one as $k=>$v){
if($end!==$v){
echo '🏅第'.chinanum($k+1).'名:'.$v["qq"]."".$hh."";
echo '✨'.$name.':'.$v["money"]."".$hh."";
}
}


function chinanum($num){
    $char = array("零","一","二","三","四","五","六","七","八","九");
    $dw = array("","十","百","千","万","亿","兆");
    $retval = "";
    $proZero = false;
    for($i = 0;$i < strlen($num);$i++){
        if($i > 0)    $temp = (int)(($num % pow (10,$i+1)) / pow (10,$i));
        else $temp = (int)($num % pow (10,1));
         
        if($proZero == true && $temp == 0) continue;
         
        if($temp == 0) $proZero = true;
        else $proZero = false;
         
        if($proZero)
        {
            if($retval == "") continue;
            $retval = $char[$temp].$retval;
        }
        else $retval = $char[$temp].$dw[$i].$retval;
    }
    if($retval == "一十") $retval = "十";
    return $retval;
}


