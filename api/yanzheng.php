<?php
include("./API.php");
tongji("yanzheng");
//1,先用range和array_merge拼凑出一个数组（包含了26个大小写英文字母和10个数字）
$arr = array_merge(range('A','Z'),range('a','z'),range('0','9'));
//2,打乱该数组（shuffle）
shuffle($arr);
//3,使用array_rand随机抽取若干个该数组的下标
$rand_keys = array_rand($arr,4);
$string= '';
//4,根据获得的下标遍历得到相应的字符串
foreach ($rand_keys as $value) {
    $string.=$arr[$value];
}
//5,输出该字符串
echo $string;
?>