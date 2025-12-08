<?php
include('../../../tianyi.php');
?>

<!doctype html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="<?php echo $ming; ?>api,随机壁纸api,动漫壁纸api,美女壁纸api,一言api,随机头像api,加群api,动漫头像api,手机壁纸api,电脑壁纸api,自动换壁纸api,代刷网api,新浪短网址生成,新浪网址缩短,新浪短网址还原">
<meta name="keywords" content="<?php echo $ming; ?>api,随机壁纸api,动漫壁纸api,美女壁纸api,一言api,随机头像api,加群api,动漫头像api,手机壁纸api,电脑壁纸api,自动换壁纸api,代刷网api,新浪短网址生成,新浪网址缩短,新浪短网址还原">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="theme-color" content="#fd4b5c">
<title>随机视频 - <?php echo $ming; ?>API</title>
<link rel="shortcut icon" href="https://<?php echo $_SERVER['HTTP_HOST']; ?>/favicon.ico" />
</head>
<style type="text/css">
h3:hover {box-shadow:0px 0px 8px #D1D1D1;}
</style>
<div style="box-shadow: 5px 5px 25px 0 rgba(46,61,73,.2);border-radius:15px;font-size:13px;width:950px;font-family:微软雅黑,'Helvetica Neue',Arial,sans-serif;margin:10px auto 0px;border:0px solid #eee;max-width:100%;">
    <div style="width:100%;background-color: #3174ed;background-image: linear-gradient(90deg, #3174ed 0%, #FA8BFF 35%, #3fd9fb 88%);color:#FFFFFF;border-radius:15px 15px 0 0;">
        <h2 style="font-size:15px;word-break:break-all;padding:20px 32px;margin:0;text-align:center">随机视频</h2>
    </div>
    <div style="margin:0px auto;width:90%">
        <h3 style="-webkit-transition: all .2s cubic-bezier(0, 0, 0, 0.48);-moz-transition: all .2s ease;border:.0625rem solid #fafafa;background:#fafafa repeating-linear-gradient(-45deg,#fff,#fff 1.125rem,transparent 1.125rem,transparent 2.25rem);margin:15px 0px;padding:20px;border-radius:5px;font-size:14px;color:#333;">
		# 随机视频API请求方式 #
		<ul>
		<li>Method: Get</li>
		</ul>
		<hr>
		# 请求地址 #<br/>
		<a style="color:#fd4b5c;text-decoration:none;">https://<?php echo $_SERVER['HTTP_HOST']; ?>/api/xjj/api.php</a><br/>
		<hr>
		# 参数 #<br/>
        <li>无</li>
		<hr>
		# 返回数据 #<br/>
		<body>
		    <link rel="stylesheet" href="style.css">
    <section id="main">
        <video id="player" src="api.php" style="max-width:100%;overflow:hidden;" controls webkit-playsinline playsinline></video>
    </section>
    <!--<section id="buttons">
        <button id="switch">连续: 开</button>
        <button id="next">播放下一个</button>
    </section>-->
    <script>
    (function (window, document) {
        if (top != self) {
            window.top.location.replace(self.location.href);
        }
        var get = function (id) {
            return document.getElementById(id);
        }
        var bind = function (element, event, callback) {
            return element.addEventListener(event, callback);
        }
        
        var auto = true;
        var player = get('player');
        var randomm = function () {
            player.src = 'video.php?_t=' + Math.random();
            player.play();
        }
        bind(get('next'), 'click', randomm);
        bind(player, 'error', function () {
            randomm();
        });
        bind(get('switch'), 'click', function () {
            auto = !auto;
            this.innerText = '连续: ' + (auto ? '开' : '关');
        });
        bind(player, 'ended', function () {
            if (auto) randomm();
        });
    })(window, document);
    </script>
</body>
        
		<hr>
		# 备注 #<br/>
		<div style="width:100%;background-color: #000;background-image: linear-gradient(90deg, #6694ed 0%,);color:#FFFFFF;border-radius:5px;word-wrap:break-word;word-break:break-all;">-=-=-=-<br/>
        </div>
		<hr>
		# 示例 #<br/>
		<a style="color:#fd4b5c;text-decoration:none；" target="_blank">http://<?php echo $_SERVER['HTTP_HOST']; ?>/api/xjj/api.php</a><br>
		</h3>
          </div>
</div>
</html>
