<?php
function str_re($str)
{
    $str = str_replace(' ', "", $str);
    $str = str_replace("\n", "", $str);
    $str = str_replace("\t", "", $str);
    $str = str_replace("\r", "", $str);
    return $str;
}
function send($Msg){
        header('Content-Type:application/json');
        echo json_encode($Msg,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
}