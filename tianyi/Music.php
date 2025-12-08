<?php
include('../tianyi.php');
?>

<?php @$Music = intval(file_get_contents("../api/tongji/jiekou/Music.dat")); ?>
<?php @$Musicx = intval(file_get_contents("../api/tongji/jinri/".date("Y-m-d")."/Music.dat")); ?>

<!doctype html>
<html lang="zh">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>音乐合集 - <?php echo $ming; ?>API</title>
<meta name="keywords" content=""/>
<meta name="description" content="">    
<link rel="stylesheet" href="./assets/css/layer.css">
<script src="https://ku.oioweb.cn/LayUI/2.5.4/layui.all.js"></script>
<style>.url{word-break:break-all;cursor:pointer;margin-left:5px;color:#777;border:none;border-radius:0;border-bottom:2px solid #5FB878;}.simpleTable{line-height:20px;padding-bottom:16px;}.linep{font-size:14px;font-weight:700;color:#555;padding-left:14px;height:16px;line-height:16px;margin-bottom:18px;position:relative;margin-top:15px;}.linep:before{content:'';width:4px;height:16px;background:#00aeff;border-radius:2px;position:absolute;left:0;top:0;}::-weMusicit-scrollbar{width:9px;height:9px}::-weMusicit-scrollbar-track-piece{background-color:#ebebeb;-weMusicit-border-radius:4px}::-weMusicit-scrollbar-thumb:vertical{height:32px;background-color:#ccc;-weMusicit-border-radius:4px}::-weMusicit-scrollbar-thumb:horizontal{width:32px;background-color:#ccc;-weMusicit-border-radius:4px}</style>
</head>
<body>
<div class="layui-container">
<div class="layui-row">
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
<legend>音乐合集API</legend>
</fieldset>
<blockquote class="layui-elem-quote">本接口总调用：<?php echo $Music; ?>次·今日调用：<?php echo $Musicx; ?>次</blockquote>
</div>
<div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
<ul class="layui-tab-title" style="text-align: center!important;">
<li class="layui-this">API文档</li><li>错误码参照</li><li>示例代码</li>
</ul>
<div class="layui-tab-content">
<div class="layui-tab-item layui-show">
<p class="simpleTable">
<span class="layui-badge layui-bg-black">接口地址：</span>
<span class="url" data-clipboard-text="http://<?php echo $_SERVER['HTTP_HOST'];?>/api/Music.php">http://<?php echo $_SERVER['HTTP_HOST'];?>/api/Music.php</span>
</p>
<p class="simpleTable">
<span class="layui-badge layui-bg-green">返回格式：</span>
<span class="url" data-clipboard-text="请看返回示例">请看返回示例</span>
</p>
<p class="simpleTable">
<span class="layui-badge">请求方式：</span>
<span class="url" data-clipboard-text="GET">GET</span>
</p>
<p class="simpleTable">
<span class="layui-badge layui-bg-blue">请求示例：</span>
<span class="url" data-clipboard-text="http://<?php echo $_SERVER['HTTP_HOST'];?>/api/Music.php?port=网易&msg=吉云&b=1">http://<?php echo $_SERVER['HTTP_HOST'];?>/api/Music.php?port=网易&msg=吉云&b=1</span>
</p>
<p class="linep">请求参数说明：</p> 
<table class="layui-table" lay-size="sm"> 
<thead>
<tr><th>名称</th><th>必填</th><th>说明</th></tr>
</thead>
<tbody>
<tr><td>port</td><td>是</td><td>输(QQ/网易/酷狗)</td></tr>
<tr><td>msg</td><td>是</td><td>需要搜索的歌曲名</td></tr>
<tr><td>b</td><td>是</td><td>选择(序号)</td></tr>
</tbody>
</table>
<p class="linep">返回参数说明：</p> 
<table class="layui-table" lay-size="sm"> 
<thead>
<tr><th>名称</th><th>说明</th></tr>
</thead>
<tbody>
<tr><td>code</td><td>状态码</td></tr>
<tr><td>port</td><td>点歌平台</td></tr>
<tr><td>id</td><td>作者ID</td></tr>
<tr><td>song</td><td>歌曲名</td></tr>
<tr><td>singer</td><td>作者名</td></tr>
<tr><td>picture</td><td>封面图</td></tr>
<tr><td>music</td><td>播放链接</td></tr>
</tbody>
</table>
<p class="linep">返回示例：</p>
<pre class="layui-code"><?php
//header("Content-Type:text/html;charset=UTF-8");
$result = file_get_contents("http://".$_SERVER['HTTP_HOST']."/api/Music.php?port=网易&msg=吉云&b=1");
echo $result;
?></pre>
</div>
<div class="layui-tab-item">
<p class="linep">错误码格式说明：</p>
<table class="layui-table" lay-size="sm">
<thead>
<tr><th>名称</th><th>说明</th></tr>
</thead>
<tbody>
<tr><td>1000</td><td>搜索成功</td></tr>
<tr><td>1001</td><td>暂无</td><td>搜索失败</td></tr>
<tr><td>1002</td><td>暂无</td><td>未知错误</td></tr>
<tr><td>1003</td><td>暂无</td><td>歌曲信息解析失败</td></tr>
<tr><td>1008</td><td>暂无</td><td>当前端口有误</td></tr>
<tr><td>1009</td><td>暂无</td><td>请输入查询的端口</td></tr>
</tbody>
</table>
</div>
<div class="layui-tab-item">
<p class="linep">代码示例：</p>
<pre class="layui-code"><a style="color:#fd4b5c;text-decoration:none；" target="_blank">暂无示例，接口有问题或者不懂请加官方交流群：<?php echo $xiaoyu; ?>。</per>
</div>
</div>
</div>
</div>
<script src="./assets/css/clipboard.min.js"></script>
<script>
    layui.use('<?php echo $ming; ?>API', function(){ //加载code模块
        layui.code(); //引用code方法
    });
    var clipboard = new ClipboardJS('.url');
    clipboard.on('success', function(e) {
        layer.msg('复制成功！');
    });
    clipboard.on('error', function(e) {
        layer.msg('复制成功！');
    });
</script>
<script type="text/javascript" src="./assets/css/main.js"></script>
</body>
</html>