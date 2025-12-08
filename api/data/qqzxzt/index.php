<?php
include('../../../tianyi.php');
?>

<!DOCTYPE html>
<html lang="zh-cn">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>自定义修改QQ在线状态 - <?php echo $ming; ?>API</title>
  <link rel="stylesheet" href="layui/css/layui.css">
  <script src="//lib.baomitu.com/jquery/1.12.4/jquery.min.js"></script>
  <script src="//lib.baomitu.com/layer/3.1.1/layer.js"></script>
  <!--[if lt IE 9]>
    <script src="//lib.baomitu.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="//lib.baomitu.com/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
</br>
    <body style="background-color: #F2F2F2">
<div class="layui-container">
    <div class="layui-row layui-col-space15">
        <div class="layui-col-md6">
            <div class="layui-card">
                <div class="layui-card-header">安卓使用教程：</div>
                <div class="layui-card-body">
<li class="list-group-item">1、首先点右边→→<a href="https://dwz.mn/DxUr" class="btn btn-success btn-xs">点我获取设备IMEI</a> </li>
<li class="list-group-item">2、跳转QQ后点击【<span style="color:red">设备信息</span>】后在根据自己机型</li>
<li class="list-group-item">3、<a href="https://dwz.mn/DxUB">点击查看设置图片</a></li>
                </div>
            </div>
        </div>
                <div class="layui-col-md6">
            <div class="layui-card">
                <div class="layui-card-header">苹果使用教程：</div>
                <div class="layui-card-body">
<li class="list-group-item">1、首先点右边→→<a href="https://dwz.mn/DxUr" class="btn btn-success btn-xs">点我获取设备IMEI</a> </li>
<li class="list-group-item">2、跳转QQ后点击【<span style="color:red">设备信息</span>】后在根据自己机型</li>
<li class="list-group-item">3、<a href="https://dwz.mn/DxUx">点击查看设置图片</a></li>
                </div>
            </div>
        </div>
        <div class="layui-col-md12">
            <div class="layui-card">
                <div class="layui-card-header">自定义修改QQ在线状态</div>
                <div class="layui-card-body">

                    <div class="layui-tab layui-tab-brief" lay-filter="tab">
                        <ul class="layui-tab-title" style="text-align: center">
                            <li class="layui-this">扫码认证</li>
                            <li>必看说明</li>
                        </ul>
                        <div class="layui-tab-content">
                            <div class="layui-tab-item layui-show">
                                <blockquote class="layui-elem-quote layui-quote-nm">
                                    本功能需要开通SVIP才可实现 没有用不了！
                                </blockquote>
	<div class="panel-body" style="text-align: center;">
		<div class="list-group">
			<div class="list-group-item list-group-item-info" style="font-weight: bold;" id="login">
				<span id="loginmsg">使用QQ手机版扫描二维码</span><span id="loginload" style="padding-left: 10px;color: #790909;">.</span>
			</div>
			<div class="list-group-item" id="qrimg"></div>
			<div class="list-group-item" id="qrLogin"><a href="#" onclick="qrLogin()" class="layui-btn layui-btn-primary layui-btn-radius">点此验证</a></div>
		</div>
		<div class="list-group" id="PhoneInfo" style="display: none;">
			<div class="list-group-item">
			    <img class="layui-anim-rotate" src="https://q4.qlogo.cn/headimg_dl?dst_uin=<?php echo $kefu; ?>API&spec=100" width="80" style="border-radius: 50%;opacity: 0.80;" id="avatar">
			</div><hr>
			<div class="layui-form-item">
            <label class="layui-form-label">QQ</label>
            <div class="layui-input-block">
              <input type="text" id="qq" class="layui-input" required="">
            </div>
          </div>
			<div class="layui-form-item">
            <label class="layui-form-label">skey</label>
            <div class="layui-input-block">
              <input type="text" id="skey" class="layui-input" required="">
            </div>
          </div>
			<div class="layui-form-item">
            <label class="layui-form-label">token</label>
            <div class="layui-input-block">
              <input type="text" id="pt4_token" class="layui-input" required="">
            </div>
          </div>
			<div class="layui-form-item">
            <label class="layui-form-label">自定义机型</label>
            <div class="layui-input-block">
              <input type="text" id="desc" class="layui-input"  required="" value="iPhone 11 Pro Max">
            </div>
          </div>
			<div class="layui-form-item">
            <label class="layui-form-label">手机IMEI码</label>
            <div class="layui-input-block">
              <input type="text" id="imei" class="layui-input" required="" placeholder="安卓手机*#06#查看">
            </div>
          </div>
			<div class="list-group-item" id="Post"><a href="#" onclick="Post()" class="layui-btn layui-btn-primary layui-btn-radius">确认修改</a></div>
		</div>
	</div>
</div>
                            <div class="layui-tab-item">
                                <?php echo $ming; ?>API QQ:<?php echo $kefu; ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="layui-col-md12">
            <div class="layui-card">
                <div class="layui-card-body" style="text-align: center">
                    Copyright ©2021 <?php echo $ming; ?>API
                </div>
            </div>
        </div>

    </div>
</div>
<script src="layui/layui.all.js"></script>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		GetQR();
	});
	var interval1,interval2;

	function GetQR(force){
		force = force || false;
		cleartime();
		var qrsig = getCookie('qrsig');
		var qrimg = getCookie('qrimg');
		if(qrsig != null && qrimg != null && force == false){
			$('#qrimg').attr('qrsig',qrsig);
			$('#qrimg').html('<img id="qrcodeimg" onclick="GetQR(true)" src="data:image/png;base64,'+qrimg+'" title="点击刷新">');
		}else{
			$.getJSON('login.php',{do:'getqrpic',r:Math.random(1)}, function(d) {
				if(d.saveOK ==0){
					setCookie('qrsig',d.qrsig);
					setCookie('qrimg',d.data);
					$('#qrimg').attr('qrsig',d.qrsig);
					$('#qrimg').html('<img id="qrcodeimg" onclick="GetQR(true)" src="data:image/png;base64,'+d.data+'" title="点击刷新">');
				}else{
					layer.alert(d.msg);
				}
			});

		}
	}
	function qrLogin(){
		if ($('#login').attr("data-lock") === "true") return;
		$.getJSON('login.php',{
			do:'qqlogin'
			,qrsig:decodeURIComponent($('#qrimg').attr('qrsig'))
			,r:Math.random(1)
		}, function(d, textStatus) {
			if(d.saveOK == 0){
				$('#login').html('<div class="alert alert-success">QQ验证成功！'+d.nick+'</div>');
				$('#qrimg').hide();
				$('#qrLogin').hide();
				$('#PhoneInfo').show();
				$('#login').attr("data-lock", "true");
				$('#avatar').attr('src','https://q4.qlogo.cn/headimg_dl?spec=100&dst_uin='+d.qq);
				$('#qq').val(d.qq);
				$('#skey').val(d.skey);
				$('#pt4_token').val(d.pt4_token);
			}else{
				cleartime();
				$('#loginmsg').html(d.msg);
				layer.msg(d.desc);
			}
		});
	}
	function Post() {
		$.getJSON('https://api.uomg.com/api/qq.oem', {
			qq: $('#qq').val()
			,skey: $('#skey').val()
			,imei: $('#imei').val()
			,desc: $('#desc').val()
			,pt4_token: $('#pt4_token').val()
		}, function(json, textStatus) {
			layer.alert(json.msg);
		});
	}
	function cleartime(){
		clearInterval(interval1);
		clearInterval(interval2);
	}
	function setCookie(name,value)
	{
		var exp = new Date();
		exp.setTime(exp.getTime() + 30*1000);
		document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString();
	}
	function getCookie(name)
	{
		var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
		if(arr=document.cookie.match(reg))
			return unescape(arr[2]);
		else
			return null;
	}
</script>
</body>
</html>