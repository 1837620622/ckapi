<?php
include("./API.php");
tongji("mima");
$msg = $_GET['msg'];//输数字
$a = file_get_contents("data/wenben/a.txt");

$b = explode("|",$a);
$p = count($b);
for($c=1;$c<=$msg;$c++)
{
$rand = rand(1,$p);
$m = $b[$rand];
print $m;
}

?>