<?php
include("./API.php");
tongji("wangzhe");
$msg=$_GET["msg"];//需要查询的人物名
$hh=$_GET["hh"]?:"\n";//换行符号(默认\n)
$url="data/wangzhe/wzid.json";
$data=file_get_contents($url);
$data=preg_replace('/\s+/','',$data);
$result=preg_match_all('/{"ename":(.*?),"cname":"(.*?)"/',$data,$v);
for( $i = 0 ; $i < $result ; $i ++ ){
@$name=$v[2][$i];
$s=similar_text($name,$msg,$xsd);//如果此数与msg字数相同则返回。similar_text($name,$b,$xsd);
if($xsd==100){
$id=$v[1][$i];//
echo xx($id);
exit;}
}
if($id==""){
for( $i = 0 ; $i < $result ; $i ++ ){
@$name=$v[2][$i];
$s=similar_text($name,$msg,$xsd);//如果此数与msg字数相同则返回。similar_text($name,$b,$xsd);
if($xsd>=60){
$id=$v[1][$i];//
echo xx($id);
exit;}
}}


function xx($id){
$data=file_get_contents("data/wangzhe/".$id.".json");
$s=preg_match_all('/skill_add_level":"(.*?)","skill_continue":"(.*?)"},"hero_info":{"id":(.*?),"name":"(.*?)","tag":\["(.*?)"\],"type":"(.*?)"}/',$data,$v);//
$jt=$v[1][0];//技能加推荐
$lz=$v[2][0];//连招技巧
$mc=$v[4][0];//名称
$td=$v[5][0];//特点
$td=str_replace('","','、',$td);
$lx=$v[6][0];//英雄类型
preg_match_all('/skill_add_level":"(.*?)"},"hero_info":{"id":(.*?),"name":"(.*?)","tag":\["(.*?)"\],"type":"(.*?)"}/',$data,$v1);
$jt1=$v1[1][0];//技能加推荐
$mc1=$v1[3][0];//名称
$td1=$v1[4][0];//特点
$td1=str_replace('","','、',$td);
$lx1=$v1[5][0];//英雄类型
if($s== 0 ){
echo "英雄：".$mc1."〖".$lx1."〗".$hh."技能推荐：".$jt1."".$hh."英雄特点：".$td1."".$hh."";}else{
echo "英雄：".$mc."〖".$lx."〗".$hh."技能推荐：".$jt."".$hh."英雄特点：".$td."".$hh."";
}
if($lz=="："){}else{echo "".$hh."连招技巧：".$lz."".$hh."".$hh."";}
//出装推荐
preg_match_all('/chuzhuang":\[{"list":\[(.*?)\],"tips":"(.*?)"/',$data,$v1);//出装和介绍
$zhuang1=$v1[1][0];
$result=preg_match_all('/{"id":(.*?),"name":"(.*?)"}/',$zhuang1,$zhuang);//出装
if($result!=0){echo "出装推荐：".$hh."";}
for( $i = 0 ; $i < $result ; $i ++ ){
$zhuang2=$zhuang[2][$i];
echo "".$zhuang2."  ";}
echo "".$hh."出装特性：".$v1[2][0]."".$hh."";
//克制和最佳搭配英雄
preg_match_all('/{"hate":\[(.*?)\],"love":\[(.*?)\]/',$data,$v2);//出装和介绍
$ke=$v2[1][0];
$zd=$v2[2][0];
//克制
$result=preg_match_all('/"id":(.*?),"name":"(.*?)"}/',$ke,$kz1);
if($result!=0){echo "".$hh."克制英雄：".$hh."";}
for( $i = 0 ; $i < $result ; $i ++ ){
$kezhi=$kz1[2][$i];
echo "".$kezhi."  ";}
echo "".$hh."";
//最佳搭配
$result=preg_match_all('/"id":(.*?),"name":"(.*?)"}/',$zd,$zd1);
if($result!=0){echo "".$hh."最佳搭配：".$hh."";}
for( $i = 0 ; $i < $result ; $i ++ ){
$dapei=$zd1[2][$i];
echo "".$dapei."  ";}
echo "".$hh."";
//铭文搭配推荐
preg_match_all('/"posy":{"list":\[(.*?)\],"tips":"(.*?)"/',$data,$v3);
$mw=$v3[1][0];
$jie=$v3[2][0];
$result=preg_match_all('/"id":(.*?),"name":"(.*?)"}/',$mw,$mw1);
if($result!=0){echo "".$hh."铭文推荐：".$hh."";}
for( $i = 0 ; $i < $result ; $i ++ ){
$mingwen=$mw1[2][$i];
echo "".$mingwen."  ";}
echo "".$hh."".$jie."".$hh."一图识英雄：http://game.gtimg.cn/images/yxzj/m/m201706/images/heropicdetail/".$id.".jpg";
}


?>