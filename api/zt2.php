<?php
include("./API.php");
include("../tianyi.php");
tongji("zt");
$url=$_REQUEST['url'];//需要查询的IP/域名
$hh=$_REQUEST['hh']?:"\n";//换行符号(默认\n)
if($url==null){
echo "".$ming."API网站状态码查询".$hh."";
echo "━━━━━━━━━".$hh."";
echo "请输入域名/IP！".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
exit();
}
$status=Array(
"100"=>"[继续]请求者应当继续提出请求。服务器返回此代码表示已收到请求的第一部分，正在等待其余部分。 ",
"101"=>"[切换协议]请求者已要求服务器切换协议，服务器已确认并准备切换。",
"200"=>"成功",
"201"=>"已创建",
"202"=>"已接受",
"203"=>"非授权信息",
"204"=>"无内容",
"205"=>"重置内容",
"206"=>"部分内容",
"300"=>"多种选择",
"301"=>"永久移动",
"302"=>"临时移动",
"303"=>"查看其他位置",
"304"=>"未修改",
"305"=>"使用代理",
"307"=>"临时重定向",
"400"=>"错误请求",
"401"=>"未授权",
"403"=>"禁止",
"404"=>"未找到",
"405"=>"方法禁用",
"406"=>"不接受",
"407"=>'需要代理授权',
"408"=>"请求超时",
"409"=>"冲突",
"410"=>"已删除",
"411"=>"需要有效长度",
"412"=>"未满足前提条件",
"413"=>"请求实体过大",
"414"=>"请求的URI过长",
"415"=>"不支持的媒体类型",
"416"=>"请求范围不符合要求",
"417"=>'未满足期望值',
"500"=>"服务器内部错误",
"501"=>"尚未实施",
"502"=>"错误网关",
"503"=>"服务不可用",
"504"=>"网关超时",
"505"=>"HTTP版本不受支持",
);
$ch = curl_init (); 
curl_setopt($ch, CURLOPT_URL,$url); 
curl_setopt($ch, CURLOPT_TIMEOUT, 200); 
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST, FALSE);
curl_setopt($ch, CURLOPT_HEADER, FALSE); 
curl_setopt($ch, CURLOPT_NOBODY, FALSE); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, FALSE); 
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET'); 
curl_exec($ch); 
$httpCode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
if($status[$httpCode]){
echo "".$ming."API网站状态码查询".$hh."";
echo "━━━━━━━━━".$hh."";
echo "域名/IP:".$url."".$hh."";
echo "状态:".$httpCode."".$hh."";
echo "解释:".$status[$httpCode]."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}else{
echo "".$ming."API网站状态码查询".$hh."";
echo "━━━━━━━━━".$hh."";
echo "域名/IP:".$url."".$hh."";
echo "未知的HTTP状态！";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}