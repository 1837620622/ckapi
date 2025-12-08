<?php
include('../tianyi.php');
?>

<div class="container">
<ul class="list-group">
<div class="modal-body">
<html lang="zh-CN">
<!doctype html>
<html lang="zh-CN">
<link href="http://lib.baomitu.com/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<link href="http://lib.baomitu.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="<?php echo $ming; ?>API">
<meta name="keywords" content="<?php echo $ming; ?>API">

  <br>
</html> 
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="<?php echo $ming; ?>API">
<meta name="keywords" content="<?php echo $ming; ?>API">

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="theme-color" content="#fd4b5c">

<title><?php echo $ming; ?>DIY气泡助手</title>
<link href="http://res.lim1.cn/layui/css/layui.css" rel="stylesheet">
</head>
 <body style="background:url(https://api.ixiaowai.cn/api/api.php);">
<style type="text/css">
h3:hover {box-shadow:0px 0px 8px #D1D1D1;}
</style> 
        <div class="box">
            <div class="title">
            <h2 style="font-size:15px;word-break:break-all;padding:20px 32px;margin:0;text-align:center"><?php echo $ming; ?>气泡DIY助手</h2>
 </div>

</span>
</legend>
<center>
<div id="container">
<div class="nya-select">
    <form action="qp.php" method="get"> 
    <label>选择DIY气泡：</label>   
    <select id="selectid">

    <option value="2464">香甜西瓜</option>
    <option value="2271">纯白蕾丝</option>
    <option value="2551">环游太空</option>
    <option value="2514">萌系虫虫</option>
    <option value="2516">折纸</option>
    <option value="2493">热气球</option>
    <option value="2494">忍者</option>
    <option value="2465">小小动物</option>
    <option value="2428">火龙果</option>
    <option value="2427">海盗船</option>
    <option value="2426">传送门</option>
    <option value="2351">浪漫星云</option>
    <option value="2319">冰淇淋</option>
    <option value="2320">可爱小动物</option>
    <option value="2321">紫色梦幻</option>
    <option value="2232">简约金属</option>
    <option value="2239">梦幻之红</option>
    <option value="2240">清新绿色</option>
    <option value="2276">雨蛙呱呱</option>
    <option value="2275">颜文字</option>
    <option value="2274">天使之翼</option>
    <option value="2273">黑色蕾丝</option>
    <option value="2272">恶魔之翼</option>
    </select>
    </form>
    <p>
           <input type="text" id='link' name="bb" class="form-control" required placeholder="请输入气泡文字">
                        </div>	
                    </div>

             <button class="nya-btn" onclick="Jump()">立即生成</button>
</p></div>

<script>
function Jump(){
    var sel1 = document.getElementById('selectid');// 取得下拉选项的值
    var index = sel1.selectedIndex;
    var value=sel1.options[index].value;
    
    var link = document.getElementById('link').value; // 取得文本框的值
    $host = "https://zb.vip.qq.com/collection/aio?diyText=";
    $get = "&_wv=16778243&id=";
    $null = "&adtag=mvip.gongneng.android.bubble.collection_aio&_preload=1&type=bubble&_wvx=3&adtag=mvip.gongneng.android.bubble.index_dynamic_tab";
    location.href = $host + link  + $get + value + $null;
 // 知道限制，无法输入链接，用文字代替了
}
</script>

</body>
</html>
</div>
  <!---->