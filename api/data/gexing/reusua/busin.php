<?php
$qq=$_GET['qq'];
$skey=$_GET['skey'];
$url=file_get_contents("http://api.unipay.qq.com/v1/r/1450000172/wechat_query?cmd=7&session_id=uin&session_type=skey&openid=".$qq."&openkey=".$skey);
$json=json_decode($url,true);
preg_match_all("/service_name\" : \"(.*?)\"/",$url,$name);
$sl=preg_match_all("/end_time\" : \"(.*?)\"/",$url,$dqsj);
if($json["ret"]=="0")
{
if(!$sl)
{
echo "你没有开通任何业务哦!";
}
else
{
for($xh=0;$xh<$sl;$xh++)
{
echo ($xh+1)."：".$name[1][$xh]."-".$dqsj[1][$xh]."\n";
}
echo "共查询到".$sl."个已开通业务";
}
}
else
{
echo "查询失败，请重试!";
}
?>