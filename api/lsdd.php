<?php
header("content-type:text/html;charset=utf-8");
include("./API.php");
include("../tianyi.php");
tongji("lsdd");
$hh=$_GET["hh"]?:"\n";//换行符号(默认\n)
if($_GET['msg']=="最新"){
{
$arr=range(0,25);
shuffle($arr);
foreach($arr as $values);
$aaa=file_get_contents("http://ring.djduoduo.com/ring_enc.php?cmd=getlist&q=Ao4N2N2CMUnCTUNaOOC%2FELMqq3cDNeTIoixgzDPIYbW9LWMHXrYRZ4AF271Ox0IxatF2qKy079S9LWMHXrYRZ6UNtm%2FaczBAiX7IAEsTEFBQ%2FdTj2GbNN727OeVlFIVrSm%2FzB4%2FlUaborsOKJkFoPzzvRWUuqCjkSbAEXSqQ0eQvzv8QvJvvhD2W7AOdl3yBEfh0bpzd2ESAQHGYckurpFyP9KZF3SjcwZLK%2BiarKqKqHWG1FKA9CASW9XMv%2FewMba8pkmSNekG8k%2B2hY3Zv%2Fl%2FVvI83xi76KfBZfzk4OQZ5zMU5262Hnw%3D%3D");
preg_match_all("/name=\"(.*?)\"/",$aaa,$bbb);
$bbb=$bbb[1][$values];//歌名
preg_match_all("/artist=\"(.*?)\"/",$aaa,$fff);
$fff=$fff[1][$values];//歌手
preg_match_all("/head_url=\"(.*?)\"/",$aaa,$ccc);
$ccc=$ccc[1][$values];//图片
preg_match_all("/mp3url=\"(.*?)\"/",$aaa,$eee);
$eee=$eee[1][$values];//播放链接
if($_GET['type']=="xml"){
echo 'card:1<?xml version=\'1.0\' encoding=\'UTF-8\' standalone=\'yes\' ?><msg serviceID="2" templateID="12345" action="web" brief="[分享]'.$bbb.'~铃声铃声" sourceMsgId="0" url="http://cdnringuc.shoujiduoduo.com" flag="0" adverSign="0" multiMsgFlag="0"><item layout="2"><audio cover="'.$ccc.'" src="http://cdnringuc.shoujiduoduo.com'.$eee.'" /><title>'.$bbb.'-铃声多多</title><summary>'.$fff.'</summary></item><source name="铃声多多" icon="http://ttauth.cn/%E5%85%B6%E4%BB%96/%E5%9B%BE%E7%89%87/lsdd.ico" action="" appid="-1" /></msg>';
exit;}
echo "".$ming."API铃声多多".$hh."";
echo "━━━━━━━━━".$hh."";
echo "±img=".$ccc."±".$hh."";
echo "歌手：".$fff."".$hh."";
echo "歌名：".$bbb."".$hh."";
echo "播放链接：http://cdnringbd.shoujiduoduo.com".$eee."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}}
if($_GET['msg']=="最热"){
{
$arr=range(0,25);
shuffle($arr);
foreach($arr as $values);
$aaa=file_get_contents("http://ring.djduoduo.com/ring_enc.php?cmd=getrelatedvideo&q=Ao4N2N2CMUnCTUNaOOC%2FELMqq3cDNeTIoixgzDPIYbW9LWMHXrYRZ4AF271Ox0IxatF2qKy079S9LWMHXrYRZ6UNtm%2FaczBAiX7IAEsTEFBQ%2FdTj2GbNN727OeVlFIVrSm%2FzB4%2FlUaborsOKJkFoPzzvRWUuqCjkSbAEXSqQ0eQvzv8QvJvvhD2W7AOdl3yBEfh0bpzd2ETUtrsrjWFEgSolbh3xfS4wiINZ5BR4pNCIzlhpE3IPm4iS1SSdIKsLjS6SRZ5j0%2BOUoYoRID7kx%2BXPXOCgVdttm06v2XYAFNMQmNcE6iOw0jQM75QkVYdE69AwEx1v%2F8ab2OjUObPma5FFKh7a27%2Bm");
preg_match_all("/name=\"(.*?)\"/",$aaa,$bbb);
$bbb=$bbb[1][$values];//歌名
preg_match_all("/cover_url=\"(.*?)\"/",$aaa,$ccc);
$ccc=$ccc[1][$values];//图片
preg_match_all("/mp3url=\"(.*?)\"/",$aaa,$eee);
$eee=$eee[1][$values];//播放链接
preg_match_all("/artist=\"(.*?)\"/",$aaa,$fff);
$fff=$fff[1][$values];//歌手
if($_GET['type']=="xml"){
echo 'card:1<?xml version=\'1.0\' encoding=\'UTF-8\' standalone=\'yes\' ?><msg serviceID="2" templateID="12345" action="web" brief="[分享]'.$bbb.'~铃声铃声" sourceMsgId="0" url="http://cdnringuc.shoujiduoduo.com" flag="0" adverSign="0" multiMsgFlag="0"><item layout="2"><audio cover="'.$ccc.'" src="http://cdnringuc.shoujiduoduo.com'.$eee.'" /><title>'.$bbb.'-铃声多多</title><summary>'.$fff.'</summary></item><source name="铃声多多" icon="http://ttauth.cn/%E5%85%B6%E4%BB%96/%E5%9B%BE%E7%89%87/lsdd.ico" action="" appid="-1" /></msg>';
exit;}
echo "".$ming."API铃声多多".$hh."";
echo "━━━━━━━━━".$hh."";
echo "±img=".$ccc."±".$hh."";
echo "歌手：".$fff."".$hh."";
echo "歌名：".$bbb."".$hh."";
echo "播放链接：http://cdnringbd.shoujiduoduo.com".$eee."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}}
if($_GET['msg']=="搞笑"){
{
$arr=range(0,25);
shuffle($arr);
foreach($arr as $values);
$aaa=file_get_contents("http://ring.djduoduo.com/ring_enc.php?cmd=getlist&q=Ao4N2N2CMUnCTUNaOOC%2FELMqq3cDNeTIoixgzDPIYbW9LWMHXrYRZ4AF271Ox0IxatF2qKy079S9LWMHXrYRZ6UNtm%2FaczBAiX7IAEsTEFBQ%2FdTj2GbNN727OeVlFIVrSm%2FzB4%2FlUaborsOKJkFoPzzvRWUuqCjkSbAEXSqQ0eQvzv8QvJvvhD2W7AOdl3yBEfh0bpzd2ESAQHGYckurpFyP9KZF3SjcCVzYI7K6eK6qHWG1FKA9CASW9XMv%2FewMba8pkmSNekG8k%2B2hY3Zv%2Fl%2FVvI83xi76cFcxQVndzPcVq9jUl%2BhCjw%3D%3D");
preg_match_all("/name=\"(.*?)\"/",$aaa,$bbb);
$bbb=$bbb[1][$values];//歌名
preg_match_all("/artist=\"(.*?)\"/",$aaa,$fff);
$fff=$fff[1][$values];//歌手
preg_match_all("/head_url=\"(.*?)\"/",$aaa,$ccc);
$ccc=$ccc[1][$values];//图片
preg_match_all("/mp3url=\"(.*?)\"/",$aaa,$eee);
$eee=$eee[1][$values];//播放链接
if($_GET['type']=="xml"){
echo 'card:1<?xml version=\'1.0\' encoding=\'UTF-8\' standalone=\'yes\' ?><msg serviceID="2" templateID="12345" action="web" brief="[分享]'.$bbb.'~铃声铃声" sourceMsgId="0" url="http://cdnringuc.shoujiduoduo.com" flag="0" adverSign="0" multiMsgFlag="0"><item layout="2"><audio cover="'.$ccc.'" src="http://cdnringuc.shoujiduoduo.com'.$eee.'" /><title>'.$bbb.'-铃声多多</title><summary>'.$fff.'</summary></item><source name="铃声多多" icon="http://ttauth.cn/%E5%85%B6%E4%BB%96/%E5%9B%BE%E7%89%87/lsdd.ico" action="" appid="-1" /></msg>';
exit;}
echo "".$ming."API铃声多多".$hh."";
echo "━━━━━━━━━".$hh."";
echo "±img=".$ccc."±".$hh."";
echo "歌手：".$fff."".$hh."";
echo "歌名：".$bbb."".$hh."";
echo "播放链接：http://cdnringbd.shoujiduoduo.com".$eee."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}}
if($_GET['msg']=="情感"){
{
$arr=range(0,25);
shuffle($arr);
foreach($arr as $values);
$aaa=file_get_contents("http://ring.djduoduo.com/ring_enc.php?cmd=getlist&q=Ao4N2N2CMUnCTUNaOOC%2FELMqq3cDNeTIoixgzDPIYbW9LWMHXrYRZ4AF271Ox0IxatF2qKy079S9LWMHXrYRZ6UNtm%2FaczBAiX7IAEsTEFBQ%2FdTj2GbNN727OeVlFIVrSm%2FzB4%2FlUaborsOKJkFoPzzvRWUuqCjkSbAEXSqQ0eQvzv8QvJvvhD2W7AOdl3yBEfh0bpzd2ESAQHGYckurpFyP9KZF3SjchgV382LOuFGqHWG1FKA9CASW9XMv%2FewMba8pkmSNekG8k%2B2hY3Zv%2Fl%2FVvI83xi76cFcxQVndzPceV4T9LcqEIQ%3D%3D");
preg_match_all("/name=\"(.*?)\"/",$aaa,$bbb);
$bbb=$bbb[1][$values];//歌名
preg_match_all("/artist=\"(.*?)\"/",$aaa,$fff);
$fff=$fff[1][$values];//歌手
preg_match_all("/head_url=\"(.*?)\"/",$aaa,$ccc);
$ccc=$ccc[1][$values];//图片
preg_match_all("/mp3url=\"(.*?)\"/",$aaa,$eee);
$eee=$eee[1][$values];//播放链接
if($_GET['type']=="xml"){
echo 'card:1<?xml version=\'1.0\' encoding=\'UTF-8\' standalone=\'yes\' ?><msg serviceID="2" templateID="12345" action="web" brief="[分享]'.$bbb.'~铃声铃声" sourceMsgId="0" url="http://cdnringuc.shoujiduoduo.com" flag="0" adverSign="0" multiMsgFlag="0"><item layout="2"><audio cover="'.$ccc.'" src="http://cdnringuc.shoujiduoduo.com'.$eee.'" /><title>'.$bbb.'-铃声多多</title><summary>'.$fff.'</summary></item><source name="铃声多多" icon="http://ttauth.cn/%E5%85%B6%E4%BB%96/%E5%9B%BE%E7%89%87/lsdd.ico" action="" appid="-1" /></msg>';
exit;}
echo "".$ming."API铃声多多".$hh."";
echo "━━━━━━━━━".$hh."";
echo "±img=".$ccc."±".$hh."";
echo "歌手：".$fff."".$hh."";
echo "歌名：".$bbb."".$hh."";
echo "播放链接：http://cdnringbd.shoujiduoduo.com".$eee."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}}
if($_GET['msg']=="动漫"){
{
$arr=range(0,25);
shuffle($arr);
foreach($arr as $values);
$aaa=file_get_contents("http://ring.djduoduo.com/ring_enc.php?cmd=getlist&q=Ao4N2N2CMUnCTUNaOOC%2FELMqq3cDNeTIoixgzDPIYbW9LWMHXrYRZ4AF271Ox0IxatF2qKy079S9LWMHXrYRZ6UNtm%2FaczBAiX7IAEsTEFBQ%2FdTj2GbNN727OeVlFIVrSm%2FzB4%2FlUaborsOKJkFoPzzvRWUuqCjkSbAEXSqQ0eQvzv8QvJvvhD2W7AOdl3yBEfh0bpzd2ESAQHGYckurpFyP9KZF3SjcrN6oE1qidT2qHWG1FKA9CASW9XMv%2FewMba8pkmSNekG8k%2B2hY3Zv%2Fl%2FVvI83xi76cFcxQVndzPdV%2FXrW%2FYavow%3D%3D");
preg_match_all("/name=\"(.*?)\"/",$aaa,$bbb);
$bbb=$bbb[1][$values];//歌名
preg_match_all("/artist=\"(.*?)\"/",$aaa,$fff);
$fff=$fff[1][$values];//歌手
preg_match_all("/head_url=\"(.*?)\"/",$aaa,$ccc);
$ccc=$ccc[1][$values];//图片
preg_match_all("/mp3url=\"(.*?)\"/",$aaa,$eee);
$eee=$eee[1][$values];//播放链接
if($_GET['type']=="xml"){
echo 'card:1<?xml version=\'1.0\' encoding=\'UTF-8\' standalone=\'yes\' ?><msg serviceID="2" templateID="12345" action="web" brief="[分享]'.$bbb.'~铃声铃声" sourceMsgId="0" url="http://cdnringuc.shoujiduoduo.com" flag="0" adverSign="0" multiMsgFlag="0"><item layout="2"><audio cover="'.$ccc.'" src="http://cdnringuc.shoujiduoduo.com'.$eee.'" /><title>'.$bbb.'-铃声多多</title><summary>'.$fff.'</summary></item><source name="铃声多多" icon="http://ttauth.cn/%E5%85%B6%E4%BB%96/%E5%9B%BE%E7%89%87/lsdd.ico" action="" appid="-1" /></msg>';
exit;}
echo "".$ming."API铃声多多".$hh."";
echo "━━━━━━━━━".$hh."";
echo "±img=".$ccc."±".$hh."";
echo "歌手：".$fff."".$hh."";
echo "歌名：".$bbb."".$hh."";
echo "播放链接：http://cdnringbd.shoujiduoduo.com".$eee."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}}
if($_GET['msg']=="最嗨"){
{
$arr=range(0,25);
shuffle($arr);
foreach($arr as $values);
$aaa=file_get_contents("http://ring.djduoduo.com//ring_enc.php?cmd=getlist&q=Ao4N2N2CMUnCTUNaOOC%2FELMqq3cDNeTIoixgzDPIYbW9LWMHXrYRZ4AF271Ox0IxatF2qKy079S9LWMHXrYRZ6UNtm%2FaczBAiX7IAEsTEFBQ%2FdTj2GbNN727OeVlFIVrSm%2FzB4%2FlUaborsOKJkFoPzzvRWUuqCjkSbAEXSqQ0eQvzv8QvJvvhD2W7AOdl3yBEfh0bpzd2ESAQHGYckurpFyP9KZF3Sjc%2F7lsi1Sg84iqHWG1FKA9CLSCR%2FwMuA4SoVCnxHvba9toTvzAHjHa4Dlh4erDEcVSqzlpoe9Zf%2FEaANJ2br4dqg%3D%3D");
preg_match_all("/name=\"(.*?)\"/",$aaa,$bbb);
$bbb=$bbb[1][$values];//歌名
preg_match_all("/artist=\"(.*?)\"/",$aaa,$fff);
$fff=$fff[1][$values];//歌手
preg_match_all("/head_url=\"(.*?)\"/",$aaa,$ccc);
$ccc=$ccc[1][$values];//图片
preg_match_all("/mp3url=\"(.*?)\"/",$aaa,$eee);
$eee=$eee[1][$values];//播放链接
if($_GET['type']=="xml"){
echo 'card:1<?xml version=\'1.0\' encoding=\'UTF-8\' standalone=\'yes\' ?><msg serviceID="2" templateID="12345" action="web" brief="[分享]'.$bbb.'~铃声铃声" sourceMsgId="0" url="http://cdnringuc.shoujiduoduo.com" flag="0" adverSign="0" multiMsgFlag="0"><item layout="2"><audio cover="'.$ccc.'" src="http://cdnringuc.shoujiduoduo.com'.$eee.'" /><title>'.$bbb.'-铃声多多</title><summary>'.$fff.'</summary></item><source name="铃声多多" icon="http://ttauth.cn/%E5%85%B6%E4%BB%96/%E5%9B%BE%E7%89%87/lsdd.ico" action="" appid="-1" /></msg>';
exit;}
echo "".$ming."API铃声多多".$hh."";
echo "━━━━━━━━━".$hh."";
echo "±img=".$ccc."±".$hh."";
echo "歌手：".$fff."".$hh."";
echo "歌名：".$bbb."".$hh."";
echo "播放链接：http://cdnringbd.shoujiduoduo.com".$eee."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}}
if($_GET['msg']=="流行"){
{
$arr=range(0,25);
shuffle($arr);
foreach($arr as $values);
$aaa=file_get_contents("http://ring.djduoduo.com//ring_enc.php?cmd=getlist&q=Ao4N2N2CMUnCTUNaOOC%2FELMqq3cDNeTIoixgzDPIYbW9LWMHXrYRZ4AF271Ox0IxatF2qKy079S9LWMHXrYRZ6UNtm%2FaczBAiX7IAEsTEFBQ%2FdTj2GbNN727OeVlFIVrSm%2FzB4%2FlUaborsOKJkFoPzzvRWUuqCjkSbAEXSqQ0eQvzv8QvJvvhD2W7AOdl3yBEfh0bpzd2ESAQHGYckurpFyP9KZF3SjclpQG1DChj2WqHWG1FKA9CLSCR%2FwMuA4SoVCnxHvba9toTvzAHjHa4Dlh4erDEcVSkSEb68hAp8Z4d98es2iOcA%3D%3D");
preg_match_all("/name=\"(.*?)\"/",$aaa,$bbb);
$bbb=$bbb[1][$values];//歌名
preg_match_all("/artist=\"(.*?)\"/",$aaa,$fff);
$fff=$fff[1][$values];//歌手
preg_match_all("/head_url=\"(.*?)\"/",$aaa,$ccc);
$ccc=$ccc[1][$values];//图片
preg_match_all("/mp3url=\"(.*?)\"/",$aaa,$eee);
$eee=$eee[1][$values];//播放链接
if($_GET['type']=="xml"){
echo 'card:1<?xml version=\'1.0\' encoding=\'UTF-8\' standalone=\'yes\' ?><msg serviceID="2" templateID="12345" action="web" brief="[分享]'.$bbb.'~铃声铃声" sourceMsgId="0" url="http://cdnringuc.shoujiduoduo.com" flag="0" adverSign="0" multiMsgFlag="0"><item layout="2"><audio cover="'.$ccc.'" src="http://cdnringuc.shoujiduoduo.com'.$eee.'" /><title>'.$bbb.'-铃声多多</title><summary>'.$fff.'</summary></item><source name="铃声多多" icon="http://ttauth.cn/%E5%85%B6%E4%BB%96/%E5%9B%BE%E7%89%87/lsdd.ico" action="" appid="-1" /></msg>';
exit;}
echo "".$ming."API铃声多多".$hh."";
echo "━━━━━━━━━".$hh."";
echo "±img=".$ccc."±".$hh."";
echo "歌手：".$fff."".$hh."";
echo "歌名：".$bbb."".$hh."";
echo "播放链接：http://cdnringbd.shoujiduoduo.com".$eee."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}}
if($_GET['msg']=="来电"){
{
$arr=range(0,25);
shuffle($arr);
foreach($arr as $values);
$aaa=file_get_contents("http://ring.djduoduo.com/ring_enc.php?cmd=getcallshowlist&q=Ao4N2N2CMUnCTUNaOOC%2FELMqq3cDNeTIoixgzDPIYbW9LWMHXrYRZ4AF271Ox0IxatF2qKy079S9LWMHXrYRZ6UNtm%2FaczBAiX7IAEsTEFBQ%2FdTj2GbNN727OeVlFIVrSm%2FzB4%2FlUaborsOKJkFoPzzvRWUuqCjkSbAEXSqQ0eQvzv8QvJvvhD2W7AOdl3yBEfh0bpzd2ERmeIsglIJKF6xasW2NfmRJiINZ5BR4pNARth8KA1wDgKT%2F91aE2GzN%2B08vwu15kwYta08slMsCIXYQvtaoGI%2BmfwdDFC8X3k4QmNcE6iOw0jQM75QkVYdE69AwEx1v%2F8alnU853U1T6qmxhfaPSz%2F%2B");
preg_match_all("/name=\"(.*?)\"/",$aaa,$bbb);
$bbb=$bbb[1][$values];//歌名
preg_match_all("/head_url=\"(.*?)\"/",$aaa,$ccc);
$ccc=$ccc[1][$values];//图片
preg_match_all("/mp3url=\"(.*?)\"/",$aaa,$eee);
$eee=$eee[1][$values];//播放链接
preg_match_all("/artist=\"(.*?)\"/",$aaa,$fff);
$fff=$fff[1][$values];//歌手
if($_GET['type']=="xml"){
echo 'card:1<?xml version=\'1.0\' encoding=\'UTF-8\' standalone=\'yes\' ?><msg serviceID="2" templateID="12345" action="web" brief="[分享]'.$bbb.'~铃声铃声" sourceMsgId="0" url="http://cdnringuc.shoujiduoduo.com" flag="0" adverSign="0" multiMsgFlag="0"><item layout="2"><audio cover="'.$ccc.'" src="http://cdnringuc.shoujiduoduo.com'.$eee.'" /><title>'.$bbb.'-铃声多多</title><summary>'.$fff.'</summary></item><source name="铃声多多" icon="http://ttauth.cn/%E5%85%B6%E4%BB%96/%E5%9B%BE%E7%89%87/lsdd.ico" action="" appid="-1" /></msg>';
exit;}
echo "".$ming."API铃声多多".$hh."";
echo "━━━━━━━━━".$hh."";
echo "±img=".$ccc."±".$hh."";
echo "歌手：".$fff."".$hh."";
echo "歌名：".$bbb."".$hh."";
echo "播放链接：http://cdnringbd.shoujiduoduo.com".$eee."".$hh."";
echo "━━━━━━━━━".$hh."";
echo "Tips:".$ming."API技术支持";
}}
?>