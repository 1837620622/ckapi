<?php
include("./API.php");
include("../tianyi.php");
tongji("diyble");
$id=$_GET['id'];//输数字(1-23)
$msg=$_GET['msg'];//需要生成的文字
$hh=$_GET['hh']?:"\n";//换行符号(默认\n)
$array = array(
"1" => "2271",
"2" => "2551",
"3" => "2514",
"4" => "2516",
"5" => "2493",
"6" => "2494",
"7" => "2464",
"8" => "2465",
"9" => "2428",
"10" => "2427",
"11" => "2426",
"12" => "2351",
"13" => "2319",
"14" => "2320",
"15" => "2321",
"16" => "2232",
"17" => "2239",
"18" => "2240",
"19" => "2276",
"20" => "2275",
"21" => "2274",
"22" => "2273",
"23" => "2272",);
$data=$array[$id];
if($data==null)
{
echo "没有这个气泡哦";
}else{
$aa=urlencode($msg);
$aa=urlencode($aa);
$list=file_get_contents("http://suo.im:80/api.htm?format=json&key=5dabf8938e676d36f85e4dae@0a47e3cb57f34dd616d9eee576c50c28&expireType=6&url=https%3A%2F%2Fzb.vip.qq.com%2Fcollection%2Faio%3FdiyText%3D".$aa."%26-wv%3D16778243%26id%3D".$data."%26adtag%3Dmvip.gongneng.android.bubble.collection_aio%26_preload%3D1%26type%3Dbubble%26_wvx%3D3%26adtag%3Dmvip.gongneng.android.bubble.index_dynamic_tab");
preg_match_all("/url\":\"(.*?)\"/",$list,$lit);
$lit=$lit[1][0];
echo "".$ming."APIDIY超长气泡".$hh."";
echo "━━━━━━━━━".$hh."";
echo "".$lit."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}
?>