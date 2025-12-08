<!DOCTYPE html>
<html lang="zh">
	<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
       <title>个人导航页</title>
        <meta name="keywords" content="个人导航页" />
        <meta name="description" content="个人导航页" />
        <link rel="apple-touch-icon" href="https://cdn.mom1.cn/1/favicon.ico">
    </head>
     <body style="padding:12% 5% 5% 5%;background-image:url(style/images/img/logo.jpeg);">
        <div style="text-align:center;border-width:1px;border-style:solid;border-color:rgb(2, 204, 245);background-color:#79918e6b;border-radius:20px;">
          <p>
          	<img style="border-radius:50%;max-width:100px;max-height:100px;" src="https://q.qlogo.cn/headimg_dl?dst_uin=<?php echo $_GET['qq'] ?>&spec=100"></p>
             <h1 style="color:#fff;"><strong><?php echo $_GET['name'] ?></strong>
             </h1>
           <p style="font-size:3vh;color:#fff;"><?php
header("Content-Type:text/html;charset=UTF-8");
$result = file_get_contents("http://".$_SERVER['HTTP_HOST']."/api/yan.php");
echo $result;
?></p>
           <p style="line-height:3;">
           <a style="border-radius:10px;padding:7px 30px;color:#fff;border-style:solid;text-decoration:none;" href="<?php echo $_GET['url'] ?>"><?php echo $_GET['ua'] ?></a>
           <a style="border-radius:10px;padding:7px 30px;color:#fff;border-style:solid;text-decoration:none;" href="<?php echo $_GET['url1'] ?>"><?php echo $_GET['ua1'] ?></a>
		   <a style="border-radius:10px;padding:7px 30px;color:#fff;border-style:solid;text-decoration:none;" href="<?php echo $_GET['url2'] ?>"><?php echo $_GET['ua2'] ?></a>
         </p><p><script src="https://pv.sohu.com/cityjson?ie=utf-8"></script>
            <span style="color:#bd8787;">你的IP:<script>
                    document.write(returnCitySN["cip"])
                   </script></span>
         </p>
         <p style="color:#fff;"><script>
                    document.write(returnCitySN["cname"])
                   </script> © <a style="text-decoration:none;color:#fff;" href="/"></a><?php echo $_GET['name'] ?></p>
                   <script type="text/javascript" color="255,255,255" opacity='0.7' zIndex="-2" count="200" src="style/js/canvas-nest.min.js"></script>
        </div>
     
</body>
</html>