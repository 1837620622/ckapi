<?php
include('../../../tianyi.php');
?>

<?php
include "ini.php";
function phpencode($code) {
$code = str_replace(array('<?php','?>','<?PHP'),array('','',''),$code);
$encode = base64_encode(gzdeflate($code));
$encode = '<?php
// +----------------------------------------------------------------------
// | Quotes [ 突破自己，极速前进！]
// +----------------------------------------------------------------------
// | By: 天一  <3189402257@qq.com>
// +----------------------------------------------------------------------
// | Date: 2021年10月10日
// +----------------------------------------------------------------------'."\neval(gzinflate(base64_decode("."'".$encode."'".")));\n?>";
return $encode;
}
?>
<html lang="zh-cn"><head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="format-detection" content="telephone=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<link rel="shortcut icon" href="http://mp.qq.com/img/fav.ico" type="image/x-icon" />
<title>PHP加密 - <?php echo $ming; ?>API</title>
<meta name="Keywords" content="<?php echo $ini['keywords']?>" />
<meta name="Description" content="<?php echo $ini['description']?>" />

<link href="http://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.css" rel="stylesheet">
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<style>
	body{
		margin: 0 auto;
		text-align: center;
	}
	.container {
	  max-width: 580px;
	  padding: 15px;
	  margin: 0 auto;
	}
	

</style>
</head>
<body>
<body style="background-image: url(http://www.pptbz.com/pptpic/UploadFiles_6909/201406/2014061415430467.jpg);background-attachment: fixed;background-repeat: no-repeat;background-size: cover;-moz-background-size: cover;">
<div class="container">
	<div class="header">
        <ul class="nav nav-pills pull-right" role="tablist">
          <li role="presentation" class="active"><a href="index.php">首页</a></li>
          <li role="presentation"><a href="/" target="_blank"><?php echo $ming; ?>API</a></li>
        </ul>
        <h3 class="text-muted" align="left"><?php echo $ming; ?>API♧PHP在线加密</h3>
     </div>
	<hr>
<div class="panel panel-primary" style="margin:1% 1% 1% 1%;background: rgba(255, 251, 251, 0.7)">
                <div class="panel-heading bk-bg-primary">
                    <h6><span class="panel-title">PHP文件在线加密</span></h6>
                </div>
                <div class="panel-body">
				<form method='post'>
  <div class="form-group">
    <label>输入你要加密的代码</label>
    <textarea class="form-control" rows="5" name="source"></textarea>
  </div>
      <input class="btn btn-primary btn-block bk-margin-top-10" type="submit" name="btn" value="点击加密"></form>
   <div class="form-group">
    <label>加密后的代码</label>
    <textarea class="form-control" rows="5"><?php
if(!empty($_POST['source'])) {
echo  htmlspecialchars(phpencode(stripcslashes($_POST['source'])));
}
?>
</textarea>
  </div>
<?php
if($_POST['source']==NULL){}else{
echo '<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-info-sign"></span> <strong>提示</strong>：加密成功！</div>';
}
?>
<div class="alert alert-info" role="alert"><span class="glyphicon glyphicon-info-sign"></span> <strong>提示</strong>:输入要加密的PHP代码后点击按钮即可加密。</div>
<div class="alert alert-warning" role="alert"> <i class="glyphicon glyphicon-bullhorn"></i> <strong>公告</strong>:本站永久免费提供PHP文件加密服务。<br><?php echo $ming; ?>API</div>
				<hr><div class="container-fluid">
  <button type="button" class="btn btn-info btn-sm" data-toggle="collapse" data-target="#lxkf-1"><span class="glyphicon glyphicon-user"></span> 客服</button> 
  <a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $kefu; ?>&site=qq&menu=yes" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-pencil"></span> 反馈</a>
</div>
<p style="text-align:center"><br>&copy; Powered by <?php echo $ming; ?>API</p></div>
</body>
</html>