<?php
include("./API.php");
include("../tianyi.php");
tongji("kuaishou");
$hh=$_GET["hh"]?:"\n";//换行符号(默认\n)
$data=get_curl("https://apissl.gifshow.com/rest/nebula/feed/hot?ll=CZT1m4npNjtAEQySPq2iW1pA&mod=meizu%2816s%29&appver=2.6.1.425&isp=CUCC&cold=false&lon=105.431804&language=zh-cn&sys=ANDROID_9&max_memory=256&ud=1345840440&egid=DFPC10857A24C5CDE6F6C34975D82BA3162CCA38863FFE68FC78C3115BCA1C29&pm_tag=&oc=MEIZU&sh=2232&browseType=3&ddpi=540&extId=2306b9565b7a726857d189ab0de14594&net=WIFI&socName=Qualcomm%20Snapdragon%208150&lat=27.214501&kcv=193&app=0&kpf=ANDROID_PHONE&ver=2.6&c=MEIZU&sw=1080&ftt=K-T-T&apptype=22&kpn=NEBULA&newOc=MEIZU&country_code=cn&nbh=108&hotfix_ver=&did_gt=1572003559755&iuid=&sbh=95&darkMode=false&did=ANDROID_1960c21d25a3fcf2","type=7&page=1&coldStart=false&count=20&pv=false&id=50&refreshTimes=3&pcursor=&source=2&needInterestTag=false&seid=b6c9aa0d-a506-4fb4-b474-48a9e4f95d7e&volume=0.4&backRefresh=false&pageCount=4&adChannel=&passThrough=0&thanosSpring=false&newUserRefreshTimes=-1&recoReportContext=%7B%22pullUpFresh%22%3A%221%22%7D&edgeRecoBit=2&realShowPhotoIds=5199405800433820816%2C5224175598514757862&__NStokensig=f5dcd0ab5ceb6635c1d6fa5a43c9a37c83cac34bc27b4ee8d44616502320de81&sig=27c22ebaadc82f49fb7c6d556ceaa0b1&client_key=2ac2a76d&kuaishou.api_st=Cg9rdWFpc2hvdS5hcGkuc3QSoAG4gU4uQB9pOutBQgzfOuYtxdLD33-gtZn22jk53SBnKM8icSpy1Xc_kX63vZqoMwPkddgNptX_Z_ZWA2emjb8fAVzBNVwk_EvVmLXN3mdJ7yOFOPKfVWRU05GR2O7dcZmSe9llzSWdMthNNepKmcalC7C6AtdI-5RiFmCjjLDTRPFowC9IJC4V6akVvXzcj2zkc7OlEJD4s4kEZqF6BAkMGhL608FrZ2RKEaX4x5mnqMPZWrYiIGZo57NK9sec4zqHttwGaShgshesJ-N8vD2CeSlVD35RKAUwAQ&os=android&token=Cg9rdWFpc2hvdS5hcGkuc3QSoAG4gU4uQB9pOutBQgzfOuYtxdLD33-gtZn22jk53SBnKM8icSpy1Xc_kX63vZqoMwPkddgNptX_Z_ZWA2emjb8fAVzBNVwk_EvVmLXN3mdJ7yOFOPKfVWRU05GR2O7dcZmSe9llzSWdMthNNepKmcalC7C6AtdI-5RiFmCjjLDTRPFowC9IJC4V6akVvXzcj2zkc7OlEJD4s4kEZqF6BAkMGhL608FrZ2RKEaX4x5mnqMPZWrYiIGZo57NK9sec4zqHttwGaShgshesJ-N8vD2CeSlVD35RKAUwAQ&__NS_sig3=2196214649d588a926616f7eb4e61bf0e1697654f4","0","token=Cg9rdWFpc2hvdS5hcGkuc3QSoAG4gU4uQB9pOutBQgzfOuYtxdLD33-gtZn22jk53SBnKM8icSpy1Xc_kX63vZqoMwPkddgNptX_Z_ZWA2emjb8fAVzBNVwk_EvVmLXN3mdJ7yOFOPKfVWRU05GR2O7dcZmSe9llzSWdMthNNepKmcalC7C6AtdI-5RiFmCjjLDTRPFowC9IJC4V6akVvXzcj2zkc7OlEJD4s4kEZqF6BAkMGhL608FrZ2RKEaX4x5mnqMPZWrYiIGZo57NK9sec4zqHttwGaShgshesJ-N8vD2CeSlVD35RKAUwAQ");
$json = json_decode($data, true);
$i=rand(0,count($json["feeds"]));
echo "".$ming."API快手短视频".$hh."";
echo "━━━━━━━━━".$hh."";
echo "分享数：".$json["feeds"][$i]["share_count"]."".$hh."";
echo "播放量：".$json["feeds"][$i]["view_count"]."".$hh."";
echo "收藏量：".$json["feeds"][$i]["like_count"]."".$hh."";
echo "播放链接：".$json["feeds"][$i]["adaptationSet"][0]["representation"][0]["urls"][0]["url"]."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";




function get_curl($url,$post=0,$referer=1,$cookie=0,$header=0,$ua=1,$nobaody=0,$json=0){
$ch = curl_init();
@curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
$httpheader[] = "Accept:application/json";
$httpheader[] = "Accept-Encoding:gzip,deflate,sdch";
$httpheader[] = "Accept-Language:zh-CN,zh;q=0.8";
$httpheader[] = "Connection:close";
if($json){
$httpheader[] = "Content-Type:application/json; charset=utf-8";}
curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
if($post){
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);}
if($header){
curl_setopt($ch, CURLOPT_HEADER, TRUE);}
if($cookie){
curl_setopt($ch, CURLOPT_COOKIE, $cookie);}
if($referer){
if($referer==1){
curl_setopt($ch, CURLOPT_REFERER, 'http://m.qzone.com/infocenter?g_f=');
}else{
curl_setopt($ch, CURLOPT_REFERER, $referer);
}}
if($ua){
curl_setopt($ch, CURLOPT_USERAGENT,$ua);
}else{
curl_setopt($ch, CURLOPT_USERAGENT,'Dalvik/2.1.0 (Linux; U; Android 9; 16s Build/PKQ1.190202.001)');}
if($nobaody){
curl_setopt($ch, CURLOPT_NOBODY,1);}
curl_setopt($ch, CURLOPT_TIMEOUT, 5);
curl_setopt($ch, CURLOPT_ENCODING, "gzip");
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
$ret = curl_exec($ch);
curl_close($ch);
//$ret=mb_convert_encoding($ret, "UTF-8", "UTF-8");
return $ret;}
?>