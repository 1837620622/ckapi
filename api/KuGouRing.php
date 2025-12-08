<?php
include("./API.php");
tongji("KuGouRing");
$msg=$_REQUEST["msg"];//需要搜索的歌曲名
$n=$_REQUEST["b"];//选择(序号)
$data=curl("http://api.ring.kugou.com/ring/all_search?q=".$_REQUEST["msg"]."&t=3&subtype=1&p=1&pn=50&plat=3",0);
$json = json_decode($data, true);
$id=$json["response"]["musicInfo"][0]["filename"];
if($msg==null)
{
echo json(1001,"请输入关键词");
}else if($id==null)
{
echo json(1002,"抱歉，找不到相关内容");
}else if($n==null)
{
foreach($json["response"]["musicInfo"] as $k=>$v){
if($_REQUEST["max"]!=null&&$k==$_REQUEST["max"])
{
break;
}
$array[($k+1)]="".$v["ringName"]."-".$v["singerName"]."";
}
echo json(1000,array("list"=>$array,));
}else
{
$n=($n-1);
$id=$json["response"]["musicInfo"][$n]["filename"];//播放链接
$singer=$json["response"]["musicInfo"][$n]["singerName"];//歌手
$songname=$json["response"]["musicInfo"][$n]["ringName"];//歌曲名
$arr=array(
"songname"=>$songname,
"singer"=>$singer,
"url"=>"http://ring.bssdlbig.kugou.com/".$id."",
);
echo json(1000,$arr);

}