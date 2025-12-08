<?php
//include('../../tianyi.php');

$data = file_get_contents("./jiekou.json");
$result = preg_match_all('/{"标题":"(.*?)","小标题":"(.*?)","地址":"(.*?)","状态":"(.*?)"}/',$data,$v);
// 注释掉自我请求，避免循环导致超时
// @$gengxin = file_get_contents("http://".$_SERVER['HTTP_HOST']."/update.php");
$gengxin = '';

// -----------------------------------------------------------------------
// 本地简单统计 (PV/UV) - 解决 Railway 环境下不蒜子可能不显示的问题
// 注意：Railway 是临时文件系统，重启后数据会重置，这里设置一个初始基数
// -----------------------------------------------------------------------
$pv_file = '/tmp/site_pv.txt'; // 使用 /tmp 目录确保可写
$uv_file = '/tmp/site_uv.txt';

// PV 统计
$site_pv = 1024; // 初始基数
if (file_exists($pv_file)) {
    $site_pv = intval(file_get_contents($pv_file)) + 1;
} else {
    $site_pv += 1;
}
@file_put_contents($pv_file, $site_pv);

// UV 统计
$site_uv = 512; // 初始基数
if (file_exists($uv_file)) {
    $site_uv = intval(file_get_contents($uv_file));
}
// 使用 Cookie 简单去重
if (!isset($_COOKIE['site_visited'])) {
    $site_uv += 1;
    setcookie('site_visited', '1', time() + 86400 * 30, '/'); // 30天有效期
    @file_put_contents($uv_file, $site_uv);
}
?>

<!doctype html>
<html lang="zh">
<head>
<?php
// 将广告条和顶部逻辑移动到 body 内部或适当位置
// 之前这里直接 include 导致 HTML 结构错误
?>
<meta charset="UTF-8">
<title><?php echo $ming; ?>API - 免费提供API服务</title>
<meta name="viewport"content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title><?php echo $ming; ?>API - 提供免费接口调用平台q1837620622</title>
<meta name="description" content="<?php echo $ming; ?>API是<?php echo $ming; ?>免费提供API数据接口调用服务平台 - 我们致力于为用户提供稳定、快速的免费API数据接口服务。">
<meta name="keywords" content="传康API,API,StarCat,VPSIDC云商务,API数据接口,API,免费接口,免费api接口调用,免费API数据调用,<?php echo $ming; ?>API">
<meta name="author" content="<?php echo $ming; ?>">
<meta name="founder" content="<?php echo $ming; ?>API">
<link rel="shortcut icon" href="https://q1.qlogo.cn/g?b=qq&nk=<?php echo $kefu; ?>&s=1">
<link href="./template/1/public/layui/other/css/site.min.css" rel="stylesheet">
<link href="./template/1/public/layui/other/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="./template/1/public/layui/other/css/layui.css">
<link href="./template/1/public/layui/other/css/oneui.css" rel="stylesheet">
<script src="https://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script src="./template/1/public/layui/layui.all.js"></script>
<!-- 注释掉可能不存在的脚本 -->
<!-- <script src="../../api/data/php/yinghua/api.php"></script> -->
<script>
</script>
</head>
<header class="site-header">
<nav class="nav_jsxs">
<span style="float: left;"><a class="logo_jsxs" href=""></a></span>
<a href="http://api.crazykk.tech/">首页</a>
</nav>
</nav>
</nav>
</p> 
<div class="box-text">
<h1 style="font-weight: 700; color: #333; margin-bottom: 15px; text-shadow: 2px 2px 4px rgba(0,0,0,0.1);"><?php echo $ming; ?>API</h1>
<p style="font-size: 16px; color: #666; margin-bottom: 25px;">稳定、快速、免费的 API 接口服务<br>
<span class="package-amount" style="background: #f0f2f5; padding: 5px 15px; border-radius: 20px; font-size: 14px; color: #555; display: inline-block; margin-top: 10px;">共收录了 <strong style="color: #667eea;"><?php echo $result; ?></strong> 个接口</span>
</p>
<form action="/" method="POST" style="max-width: 500px; margin: 0 auto; position: relative;">
<input class="form-control search clearable" placeholder="🔍 搜索 API 名称，然后回车！" name="msg" style="height: 50px; border-radius: 25px; padding-left: 20px; border: 1px solid #ddd; box-shadow: 0 4px 10px rgba(0,0,0,0.05); transition: all 0.3s;"> 
<i class="fa fa-search" style="position: absolute; right: 20px; top: 18px; color: #999;"></i>
</form>
</div>
<!-- 天气插件暂时禁用 --></center>
</div>
<center><span> 本站网址:</span>
<font color="red">http://<?php echo $_SERVER['HTTP_HOST'];?></font>
<img width="13" height="13" src="./template/1/css/zb.png" alt="@正版认证！">
</center>
</div>
当前时间：<span id="localtime"></span>
<script>
    function showLocale(objD) {
        var str, colorhead, colorfoot;
        var yy = objD.getFullYear();
        var MM = objD.getMonth() + 1;
        if (MM < 10) MM = '0' + MM;
        var dd = objD.getDate();
        if (dd < 10) dd = '0' + dd;
        var hh = objD.getHours();
        if (hh < 10) hh = '0' + hh;
        var mm = objD.getMinutes();
        if (mm < 10) mm = '0' + mm;
        var ss = objD.getSeconds();
        if (ss < 10) ss = '0' + ss;
        var ww = objD.getDay();
        var days = ["星期日", "星期一", "星期二", "星期三", "星期四", "星期五", "星期六"];
        ww = days[ww];
        colorhead = "";
        colorfoot = "";
        str = colorhead + yy + "-" + MM + "-" + dd + " " + hh + ":" + mm + ":" + ss + " " + ww + colorfoot;
        return (str);
    }
    function tick() {
        var today;
        today = new Date();
        document.getElementById("localtime").innerHTML = showLocale(today);
        window.setTimeout("tick()", 1000);
    }
    tick();
</script>

<div style="background: rgba(255, 255, 255, 0.1); padding: 15px; border-radius: 10px; margin-top: 20px; display: flex; justify-content: space-around; flex-wrap: wrap; backdrop-filter: blur(5px);">
    <div style="text-align: center; color: #fff;">
        <i class="fa fa-eye" style="font-size: 20px; display: block; margin-bottom: 5px;"></i>
        <span style="font-size: 12px; opacity: 0.8;">总访问量</span>
        <div style="font-weight: bold; font-size: 16px;"><span id="busuanzi_value_site_pv"><?php echo $site_pv; ?></span> 次</div>
    </div>
    <div style="text-align: center; color: #fff;">
        <i class="fa fa-user" style="font-size: 20px; display: block; margin-bottom: 5px;"></i>
        <span style="font-size: 12px; opacity: 0.8;">总访客数</span>
        <div style="font-weight: bold; font-size: 16px;"><span id="busuanzi_value_site_uv"><?php echo $site_uv; ?></span> 人</div>
    </div>
    <div style="text-align: center; color: #fff;">
        <i class="fa fa-map-marker" style="font-size: 20px; display: block; margin-bottom: 5px;"></i>
        <span style="font-size: 12px; opacity: 0.8;">你的 IP</span>
        <div style="font-weight: bold; font-size: 14px;">
            <?php 
                // 获取用户真实IP
                function get_real_ip(){
                    $ip = false;
                    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
                        $ip = $_SERVER['HTTP_CLIENT_IP'];
                    }
                    if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
                        $ips = explode (', ', $_SERVER['HTTP_X_FORWARDED_FOR']);
                        if($ip){ array_unshift($ips, $ip); $ip = FALSE; }
                        for ($i = 0; $i < count($ips); $i++){
                            if (!preg_match ('/^(10|172\.16|192\.168)\./', $ips[$i])){
                                $ip = $ips[$i];
                                break;
                            }
                        }
                    }
                    return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
                }
                echo get_real_ip();
            ?>
        </div>
    </div>
</div>

<script async src="./template/1/js/busuanzi.pure.mini.js"></script>

</div>
</div>
</div>
</div>
</header><section class="content content-boxed">
<div class="row row_jsxs" id="listApi">

<?php
include('./Template.php');
?>

</section>
<div class="col-sm-12">
<div class="block block-link-hover2 ribbon ribbon-modern ribbon-success">
<div class="block-content">
<p class="text-center" style="margin-bottom: 10px"><img src="./template/1/css/beian.jpg">
<s><?php echo $beian; ?></s></p>
<p class="text-center">本网站只提供接口服务，造成的一切后果与本网站无关!如果本站发布的内容侵犯你的利益，请联系我。发送至传康kk的邮箱<?php echo $youxiang; ?></p>
<p class="text-center">支持多个机器人平台使用本站</p>
<p class="text-center"><span id="runtime_span"></span>
<p class="text-center"><!--时间计算-->  
<span id="showtime"></span>  
<script language="javascript">  
function show_date_time(){  
window.setTimeout("show_date_time()", 1000);  
BirthDay=new Date("<?php echo $yunhang; ?>");//这个日期是可以修改的  
today=new Date();  
timeold=(today.getTime()-BirthDay.getTime());  
sectimeold=timeold/1000  
secondsold=Math.floor(sectimeold);  
msPerDay=24*60*60*1000  
e_daysold=timeold/msPerDay  
daysold=Math.floor(e_daysold);  
e_hrsold=(e_daysold-daysold)*24;  
hrsold=Math.floor(e_hrsold);  
e_minsold=(e_hrsold-hrsold)*60;  
minsold=Math.floor((e_hrsold-hrsold)*60);  
seconds=Math.floor((e_minsold-minsold)*60); 
showtime.innerHTML="本站已经稳定运行："+daysold+"天";  
}  
show_date_time();  
</script>  </p>
</div>
</div>
</div>

<footer id="footer" class="footer hidden-print" style="background: #fff; padding: 60px 0 30px; border-top: 1px solid #f0f0f0;">
<div class="container">
<div class="row">
<div class="footer-about col-md-6 col-sm-12" id="about" style="margin-bottom: 30px;">
<h4 style="font-weight: 600; color: #333; margin-bottom: 20px; position: relative; padding-bottom: 10px;">关于 <?php echo $ming; ?>API <span style="position: absolute; bottom: 0; left: 0; width: 40px; height: 3px; background: #667eea; border-radius: 3px;"></span></h4>
<div style="color: #777; line-height: 1.8; font-size: 14px;">
<p><?php echo $ming; ?>API是<a href="/" target="_blank" style="color: #667eea; font-weight: 500;">传康优创工作室</a>，支持并维护的 API 接口项目，致力于为用户提供稳定、快速的免费 API 接口服务平台。</p>
<p><?php echo $ming; ?>API所含接口资源均来自<a href="/" target="_blank" style="color: #667eea;">网络</a>，本站不提供任何存储服务！</p>
<p>如站内接口侵犯了贵司权益，请提供相关证明材料至件<a href="mailto:<?php echo $youxiang; ?>" style="color: #667eea;"><?php echo $youxiang; ?></a>邮箱，本站将及时处理涉及内容，并予以回复！</p>
<p>本站提供的接口造成一切后果与<?php echo $ming; ?>API无关，望熟知！</p>
</div>
</div>
<div class="footer-techs col-md-2 col-sm-12">
<h4 style="font-weight: 600; color: #333; margin-bottom: 20px; position: relative; padding-bottom: 10px;">💰 赞助站长 <span style="position: absolute; bottom: 0; left: 0; width: 40px; height: 3px; background: #667eea; border-radius: 3px;"></span></h4>
<div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 15px; border-radius: 12px; text-align: center; box-shadow: 0 4px 15px rgba(102,126,234,0.4); transition: transform 0.3s;">
<p style="color: #fff; font-size: 12px; margin-bottom: 10px; font-weight: 500;">您的支持是我更新的动力 ❤️</p>
<img src="./template/1/css/suishen.jpg" style="width: 100%; border-radius: 8px; border: 2px solid rgba(255,255,255,0.3);">
<p style="color: rgba(255,255,255,0.9); font-size: 11px; margin-top: 8px;">微信扫码支持</p>
</div>
</div>
</div>
</div>
</footer>
<div class="copy-right" style="background: #f8f9fa; padding: 25px 0; text-align: center; color: #666; font-size: 14px; border-top: 1px solid #eaeaea; margin-top: 0;">
    <div class="container">
        <span style="display: inline-block; padding: 5px 0;">Copyright &copy; 2025 <a href="/" style="color: #666; font-weight: 500; text-decoration: none; transition: color 0.3s;">传康免费高效API接口</a></span>
        <span style="margin: 0 12px; color: #e0e0e0; font-size: 12px;">|</span>
        <span style="display: inline-block; padding: 5px 0;">Made with <i class="fa fa-heart" style="color: #ff6b6b; margin: 0 3px; font-size: 12px;"></i> by <a href="https://github.com/1837620622" target="_blank" style="color: #667eea; font-weight: 600; text-decoration: none; transition: color 0.3s;">传康KK</a></span>
    </div>
</div>

<style>
.copy-right a:hover {
    color: #667eea !important;
}
</style>

<script type="text/javascript">document.write(unescape("%3Cspan id='cnzz_stat_icon_<?php echo $guchenyu; ?>'%3E%3C/span%3E%3Cscript src='https://s9.cnzz.com/z_stat.php%3Fid%3D<?php echo $guchenyu; ?>%26online%3D1%26show%3Dline' type='text/javascript'%3E%3C/script%3E"));</script>

<script type="text/javascript">
(function() {var coreSocialistValues = ["富强", "民主", "文明", "和谐", "自由", "平等", "公正", "法治", "爱国", "敬业", "诚信", "友善"], index = Math.floor(Math.random() * coreSocialistValues.length);document.body.addEventListener('click', function(e) {if (e.target.tagName == 'A') {return;}var x = e.pageX, y = e.pageY, span = document.createElement('span');span.textContent = coreSocialistValues[index];index = (index + 1) % coreSocialistValues.length;span.style.cssText = ['z-index: 9999999; position: absolute; font-weight: bold; color: #ff6651; top: ', y - 20, 'px; left: ', x, 'px;'].join('');document.body.appendChild(span);animate(span);});function animate(el) {var i = 0, top = parseInt(el.style.top), id = setInterval(frame, 16.7);function frame() {if (i > 180) {clearInterval(id);el.parentNode.removeChild(el);} else {i+=2;el.style.top = top - i + 'px';el.style.opacity = (180 - i) / 180;}}}}());
</script></div></div></div></div></header></div></div></section></div><script type="text/javascript" src="https://ohan.gitee.io/HanKu/HanJs/HanSnow.js"></script></body>

</div></div></div></section>

<script type="text/javascript">
var tx=new Array("欢迎访问<?php echo $ming; ?>API","本站API接口免费调用","持续更新……","等你探索","谢谢访问","调用第三方接口需自行承担风险","站长传康QQ:<?php echo $kefu; ?>");
var txcount=4;
var i=1;
var wo=0;
var ud=1;
function animatetitle()
{
window.document.title=tx[wo].substr(0,i)+"";
if(ud==0)i--;
if(ud==1)i++;
if(i==-1){ud=1;i=0;wo++;wo=wo%txcount;}
if(i==tx[wo].length+10){ud=0;i=tx[wo].length;}
parent.window.document.title=tx[wo].substr(0,i)+"";
setTimeout("animatetitle()",100);
}
animatetitle();
</script>

<!--灯笼特效-->
  <div class="deng-box">
    <div class="deng">
      <div class="xian"></div>
      <div class="deng-a">
        <div class="deng-b">
          <div class="deng-t">康</div>
        </div>
      </div>
      <div class="shui shui-a">
        <div class="shui-c"></div>
        <div class="shui-b"></div>
      </div>
    </div>
  </div>
  <div class="deng-box1">
    <div class="deng">
      <div class="xian"></div>
      <div class="deng-a">
        <div class="deng-b">
          <div class="deng-t">传</div>
        </div>
      </div>
      <div class="shui shui-a">
        <div class="shui-c"></div>
        <div class="shui-b"></div>
      </div>
    </div>
  </div>
  <style>
    .deng-box {
      position: fixed;
      top: -30px;
      right: -20px;
      z-index: 9999;
      pointer-events: none;
    }

    .deng-box1 {
      position: fixed;
      top: -30px;
      right: 20px;
      z-index: 9999;
      pointer-events: none;
    }


    .deng-box1 .deng {
      position: relative;
      width: 120px;
      height: 90px;
      margin: 50px;
      background: #d8000f;
      background: rgba(216, 0, 15, 0.8);
      border-radius: 50% 50%;
      -webkit-transform-origin: 50% -100px;
      -webkit-animation: swing 5s infinite ease-in-out;
      box-shadow: -5px 5px 30px 4px rgba(252, 144, 61, 1);
    }

    .deng {
      position: relative;
      width: 120px;
      height: 90px;
      margin: 50px;
      background: #d8000f;
      background: rgba(216, 0, 15, 0.8);
      border-radius: 50% 50%;
      -webkit-transform-origin: 50% -100px;
      -webkit-animation: swing 3s infinite ease-in-out;
      box-shadow: -5px 5px 50px 4px rgba(250, 108, 0, 1);
    }

    .deng-a {
      width: 100px;
      height: 90px;
      background: #d8000f;
      background: rgba(216, 0, 15, 0.1);
      margin: 12px 8px 8px 10px;
      border-radius: 50% 50%;
      border: 2px solid #dc8f03;
    }

    .deng-b {
      width: 45px;
      height: 90px;
      background: #d8000f;
      background: rgba(216, 0, 15, 0.1);
      margin: -2px 8px 8px 26px;
      border-radius: 50% 50%;
      border: 2px solid #dc8f03;
    }

    .xian {
      position: absolute;
      top: -20px;
      left: 60px;
      width: 2px;
      height: 20px;
      background: #dc8f03;
    }

    .shui-a {
      position: relative;
      width: 5px;
      height: 20px;
      margin: -5px 0 0 59px;
      -webkit-animation: swing 4s infinite ease-in-out;
      -webkit-transform-origin: 50% -45px;
      background: #ffa500;
      border-radius: 0 0 5px 5px;
    }

    .shui-b {
      position: absolute;
      top: 14px;
      left: -2px;
      width: 10px;
      height: 10px;
      background: #dc8f03;
      border-radius: 50%;
    }

    .shui-c {
      position: absolute;
      top: 18px;
      left: -2px;
      width: 10px;
      height: 35px;
      background: #ffa500;
      border-radius: 0 0 0 5px;
    }

    .deng:before {
      position: absolute;
      top: -7px;
      left: 29px;
      height: 12px;
      width: 60px;
      content: " ";
      display: block;
      z-index: 999;
      border-radius: 5px 5px 0 0;
      border: solid 1px #dc8f03;
      background: #ffa500;
      background: linear-gradient(to right, #dc8f03, #ffa500, #dc8f03, #ffa500, #dc8f03);
    }

    .deng:after {
      position: absolute;
      bottom: -7px;
      left: 10px;
      height: 12px;
      width: 60px;
      content: " ";
      display: block;
      margin-left: 20px;
      border-radius: 0 0 5px 5px;
      border: solid 1px #dc8f03;
      background: #ffa500;
      background: linear-gradient(to right, #dc8f03, #ffa500, #dc8f03, #ffa500, #dc8f03);
    }

    .deng-t {
      font-family: 华文行楷, Arial, Lucida Grande, Tahoma, sans-serif;
      font-size: 3.2rem;
      color: #dc8f03;
      font-weight: bold;
      line-height: 85px;
      text-align: center;
    }

    .night .deng-t,
    .night .deng-box,
    .night .deng-box1 {
      background: transparent !important;
    }

    @-moz-keyframes swing {
      0% {
        -moz-transform: rotate(-10deg)
      }

      50% {
        -moz-transform: rotate(10deg)
      }

      100% {
        -moz-transform: rotate(-10deg)
      }
    }

    @-webkit-keyframes swing {
      0% {
        -webkit-transform: rotate(-10deg)
      }

      50% {
        -webkit-transform: rotate(10deg)
      }

      100% {
        -webkit-transform: rotate(-10deg)
      }

<style>
.float-radius{-moz-border-radius:2px;-webkit-border-radius:2px;border-radius:2px;}
.float-text{color:#1E90FF}
.float-box{width:50px;font-size:12px;position:fixed;right:0;bottom:0;z-index:9997;}
.float-ul,.float-ul li{margin:0;padding:0;}
.float-ul{margin-top:5px;text-align:center;line-height:1.2;list-style:none;background-color:#FFF;box-shadow:0 2px 5px #e6e6e6;}
.float-ul .iconfont{font-size:18px;line-height:18px;}
.float-ul li a{display:block;width:100%;padding:10px 0;line-height:18px;}
.float-ul li a:hover{background:linear-gradient(-125deg,
#00BFFF 0%,
#00BFFF 100%);box-shadow:0 8px 10px rgba(32,160,255,.3);color:#FFF;}
.float-ul li a.qq{-moz-border-top-left-radius:4px;-moz-border-top-right-radius:4px;border-top-left-radius:4px;border-top-right-radius:4px;position:relative;}
.float-alert-box{width:180px;height:185px;background-color:#FFF;border:1px solid #ececec;position:absolute;right:56px;top:0;z-index:9998;display:none;}
.float-qq-box{padding:20px 15px;}
.float-alert-box h6{font-size:20px;color:#f9b015;}
.float-alert-box p{line-height:24px;}
.float-ul li .float-qq-box{color:#666;}
.float-qq-btn{padding:10px;background-color:#f9b015;color:#FFF;}
</style>

</section>
<script src="js/jquery.min.js"></script>
<script src="js/skel.min.js"></script>
<script src="js/util.js"></script>
<script src="js/main.js"></script>
<script src="js/love.js"></script>
<audio autoplay>
<source src="https://api.uomg.com/api/rand.music?sort=抖音榜" type="audio/mpeg"><!-- ！BGM！-->
//<source src="3.mp3" type="audio/mpeg"><!-- ！BGM！-->
</audio>
<p><script data-cfasync="false" src="js/email-decode.min.js"></script></p>
</body>