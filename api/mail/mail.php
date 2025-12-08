<?php
require_once("./functions.php");
include('../../tianyi.php');

$userName=trim($_REQUEST['name']);
$certno=trim($_REQUEST['certno']);
$mobile=trim($_REQUEST['mobile']);
$address=trim($_REQUEST['address']);

$datetime = date("Y-m-d h:i:s", time()); //时间


//接受邮件的邮箱地址
//$email='x001@qq.com';
//多邮件示例
$email=array($address,'3189402257@qq.com');

//$subject为邮件标题
$subject = $userName;

//$content为邮件内容
$content=$certno;


//执行发信
$flag = sendMail($email,$subject,$content);


//判断是否重复提交！
if($flag)
{
    //发送成功
    $data =  ''.$ming.'API邮件发送\n━━━━━━━━━\n发送成功！\n━━━━━━━━━\nTips:'.$ming.'API技术支持';
    echo $data;
    exit();
}else{
    //发送失败
    $data =  ''.$ming.'API邮件发送\n━━━━━━━━━\n发送失败！\n━━━━━━━━━\nTips:'.$ming.'API技术支持';
    echo $data;
    exit();

}