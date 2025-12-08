<?php
include("./API.php");
tongji("laji");
function post_data_test($url,$data)
{
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
$header = array(
'User-Agent' => 'Mozilla/5.0(Linux;Android8.1.0;16th Plus Build/OPM1.171019.026;wv)AppleWebKit/537.36(KHTML,like Gecko)Version/4.0Chrome/66.0.3359.126MQQBrowser/6.2TBS/044506Mobile Safari/537.36V1_AND_SQ_7.9.9_1010_YYB_DQQ/7.9.9.3965NetType/WIFI WebP/0.3.0Pixel/1080StatusBarHeight/90',
'Referer' => 'https://async.qun.qq.com/cgi-bin/sys_msg/getmsg?ver=5401&filter=2',
'Cookie'=>'uin=o'.$q.';p_uin=o'.$q.';pgv_info=ssid=s5285936820;pgv_pvid=7390526720;skey='.$skey.';p_skey=1gFngNRxVkO-C6KWCvrGEmpnrtOFEXYWEpYVlyBp5Dk_;traceid=07fdeeed7d');

curl_setopt($curl,CURLOPT_HTTPHEADER,$header);
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
curl_setopt($curl, CURLOPT_TIMEOUT, 30);
curl_setopt($curl, CURLOPT_HEADER, 0);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
if (curl_errno($curl))
{
echo '错误信息;'.curl_error($curl);
}
curl_close($curl);
return $result;
}
$msg=$_GET["msg"];//需要查询的垃圾名
$hh=$_GET["hh"]?:"\n";//换行符号(默认\n)
$data='a=GET_KEYWORDS&kw='.$msg.'';
//获取开始，注册字段
$url="http://trash.lhsr.cn/sites/feiguan/trashTypes_3/Handler/Handler.ashx";
$a = post_data_test($url,$data);

$p=preg_match_all('/kw_list":\["(.*?)"\],"kw_arr":\[{"TargetId":"(.*?)","TargetId_2":"(.*?)","TypeKey":"(.*?)","CssName":"(.*?)","Name":"(.*?)","Note_0_1":"(.*?)","Note_0_2":"(.*?)","Note_1_1":"(.*?)","Note_1_2":"(.*?)","Note_2_1":"(.*?)","Note_2_2":"(.*?)","QueryCount":(.*?)}/',$a,$v);
if($p== 0){
echo "搜索不到与".$msg."的相关垃圾信息，请检查输入的名称是否正确。";
}else{
$gd=$v[1][0];
$gd=str_replace('","','、',$gd);//更多
$fl=$v[4][0];//分类
$mc=$v[6][0];//名称
$a0=$v[7][0];//
$a1=$v[8][0];//
$a2=$v[9][0];//
$a3=$v[10][0];//
$a4=$v[11][0];//
$a5=$v[12][0];//
$a6=$v[13][0];//
$z=$a0.$a1.$a2.$a3.$a4.$a5.$a6;
$z=str_replace('1','',$z);
$z=str_replace('null','',$z);
$z=str_replace('投放要求','\n\n投放要求：',$z);
echo "".$mc."〖".$fl."〗".$hh."".$z."".$hh."".$hh."类似垃圾：$gd";}
?>