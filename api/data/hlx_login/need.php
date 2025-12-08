<?php
function send($Msg){
    header('Content-Type:application/json');
        echo json_encode($Msg,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }
    function xb($xb){
        if($xb==2) {
            return "男";
        }else{
            if($xb==1) {
                return "女";
        }else{
            return "未知性别";
        }
    }
}
function setp($pass){
    if($pass==1) {
        return "是";
    }else{
        if($pass==0) {
            return "否";
        }else{
            return "未知";
        }
    }
}
function setuser($user){
    if($user==1) {
        return "是";
    }else{
        if($user==0) {
            return "否";
        }else{
            return "未知";
        }
    }
}