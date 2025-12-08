<?php

if (!defined('ROOT')) exit;

function site_config(\system\theme\Fields $form)
{
	$color = $form->select('链接颜色', 'color', [
		'primary' => '蓝色',
		'secondary' => '灰色',
		'success' => '绿色',
		'danger' => '红色',
		'warning' => '黄色',
		'info' => '浅蓝色',
		'light' => '白色',
		'dark' => '黑色',
		'link' => '透明'
	], 'primary');
	$form->create($color);
}

function theme_config(\system\theme\Form $form)
{
	$background_color = $form->color('网站背景颜色', 'background_color', '#1B1E2F');
	$form->create($background_color);

	$video_list = $form->textarea(
		'视频接口',
		'video_list',
		'https://api.ainio.cn/mp4/ || 随机美女1
http://1.vvi.asia || 随机美女2
http://api.cmvip.cn/API/sjmn.php || 随机美女3
https://okjx.cc/include/loding/mp4.php || 随机美女4
http://api.cmvip.cn/API/dxbz.php || 蹲下变装
http://api.cmvip.cn/API/eeee.php || 鹅鹅鹅鹅
http://api.cmvip.cn/API/shan.php || 黑色闪光
http://api.cmvip.cn/API/xzex.php || 小芷儿系
http://api.cmvip.cn/API/ndym.php || 你的欲梦
http://api.cmvip.cn/API/xsmn.php || 西施美女
http://api.cmvip.cn/API/xnbz.php || 新年变装
http://api.cmvip.cn/API/xkyx.php || 小困鱼系
http://api.cmvip.cn/API/lqsx.php || 撩裙杀系
http://api.cmvip.cn/API/sdbz.php || 圣诞变装
http://api.cmvip.cn/API/npbz.php || 女仆变装
http://api.cmvip.cn/API/lmbz.php || 蕾姆变装
http://api.cmvip.cn/API/bybz.php || 背影变装
http://api.cmvip.cn/API/gjbz.php || 光剑变装
http://api.cmvip.cn/API/fjbz.php || 腹肌变装
http://api.cmvip.cn/API/hssp.php || 黑丝视频
http://api.cmvip.cn/API/bssp.php || 白丝视频
http://api.cmvip.cn/API/tcfx.php || 体操服系
http://api.cmvip.cn/API/zfsp.php || 制服视频
http://api.cmvip.cn/API/llsp.php || 萝莉视频
http://api.cmvip.cn/API/yjsp.php || 御姐视频
http://api.cmvip.cn/API/myxl.php || 慢摇系列
http://api.cmvip.cn/API/kyxl.php || 快摇系列
http://api.cmvip.cn/API/ddxl.php || 吊带系列
http://api.cmvip.cn/API/npxl.php || 女仆系列
http://api.cmvip.cn/API/txnh.php || 甜系女孩
http://api.cmvip.cn/API/cyxl.php || 纯欲系列
http://api.cmvip.cn/API/cfxl.php || 曹芬系列
http://api.cmvip.cn/API/hcyx.php || 火车摇系
http://api.cmvip.cn/API/llbx.php || 落了白系
http://api.cmvip.cn/API/shlz.php || 丝滑连招
http://api.cmvip.cn/API/cjwd.php || 吃鸡舞蹈
http://api.cmvip.cn/API/sbkl.php || 双倍快乐
http://api.cmvip.cn/API/hxwd.php || 害羞舞蹈
http://api.cmvip.cn/API/jcly.php || 井川里予
http://api.cmvip.cn/API/cblx.php || 擦玻璃系
http://api.cmvip.cn/API/wmsc.php || 完美身材
http://api.cmvip.cn/API/tmbz.php || 甜妹变装
http://api.cmvip.cn/API/lltx.php || 洛丽塔系
http://api.cmvip.cn/API/htys.php || 荷塘月色
http://api.cmvip.cn/API/sybz.php || 睡衣变装
http://api.cmvip.cn/API/tszs.php || 天使之书
http://api.cmvip.cn/API/mtsx.php || 摸头杀系
http://api.cmvip.cn/API/sfxz.php || 私房写真
http://api.cmvip.cn/API/gfqp.php || 国风旗袍
http://api.cmvip.cn/API/mnsp.php || 美女视频
http://api.cmvip.cn/API/sgsp.php || 帅哥视频
http://api.cmvip.cn/API/gfhf.php || 古风汉服
http://api.cmvip.cn/API/rxhf.php || 日系和服
http://api.cmvip.cn/API/dmsp.php || 动漫视频
http://api.cmvip.cn/API/ecyx.php || 二次元系
http://api.cmvip.cn/API/xgrw.php || 性感热舞
http://api.cmvip.cn/API/jpmn.php || 街拍美女
http://api.cmvip.cn/API/bzqx.php || 百褶裙系
http://api.cmvip.cn/API/ybwx.php || 摇摆舞系
http://api.cmvip.cn/API/ggcc.php || 过肩出场
http://api.cmvip.cn/API/tnlx.php || 兔女郎系
http://api.cmvip.cn/API/czmt.php || 车展模特
http://api.cmvip.cn/API/ycqq.php || 原创卿卿
http://api.cmvip.cn/API/mtbz.php || 摸腿变装
http://api.cmvip.cn/API/yjfx.php || 瑜伽服系
http://api.cmvip.cn/API/txbz.php || 躺下变装
http://api.cmvip.cn/API/zncd.php || 斩男穿搭
http://api.cmvip.cn/API/jskd.php || 介绍卡点
http://api.cmvip.cn/API/hwxl.php || 海王系列
http://api.cmvip.cn/API/jcyb.php || 机车摇摆
http://api.cmvip.cn/API/mzxc.php || 漫展现场
http://api.cmvip.cn/API/csfr.php || 出水芙蓉
http://api.cmvip.cn/API/xgyw.php || 性感渔网
http://api.cmvip.cn/API/rmxd.php || 软妹限定
http://api.cmvip.cn/API/smwx.php || 双马尾系
http://api.cmvip.cn/API/amxx.php || 安慕希系
http://api.cmvip.cn/API/wpns.php || 微胖女神
http://api.cmvip.cn/API/yqkd.php || 硬气卡点
http://api.cmvip.cn/API/mxny.php || 猫系女友
http://api.cmvip.cn/API/hbss.php || 黑白双煞
http://api.cmvip.cn/API/ycyy.php || 又纯又欲
http://api.cmvip.cn/API/jbbd.php || 酒吧蹦迪
http://api.cmvip.cn/API/nyxl.php || 扭腰系列
http://api.cmvip.cn/API/nkxl.php || 扭胯系列
http://api.cmvip.cn/API/sqxl.php || 甩裙系列
http://api.cmvip.cn/API/xishi.php || 西施
http://api.cmvip.cn/API/xb.php || 小白
http://api.cmvip.cn/API/hmm.php || 韩猫猫
http://api.cmvip.cn/API/tzxy.php || 甜崽小洋
http://api.cmvip.cn/API/tgxl.php || 甜狗小念
http://api.cmvip.cn/API/xwsbx.php || 小婉睡不醒
http://api.cmvip.cn/API/mngmm.php || 萌了个妹妹',
		'格式：接口链接 || 接口标题（中间使用两个竖杠分隔）<br />
其他：一行一个，一行代表一个接口 <br />
例如：<br />
https://baidu.com || 御姐视频<br/>
https://v.qq.com || 慢摇系列'
	);
	$form->create($video_list);

	$image_list = $form->textarea(
		'图片接口',
		'image_list',
		'http://api.bri6.cn/api/girl/image.php || 随机美女1
https://api.vvhan.com/api/mobil.girl || 随机美女2
https://api.kit9.cn/api/random_lady_pictures/api.php || 随机美女3
https://api.vvhan.com/api/girl || 随机美女4
http://api.kit9.cn/api/random_lady_pictures/api.php || 随机美女5
https://api.ainio.cn/mntp/ || 随机美女6
text:http://api.bri6.cn/api/ajax/?url=http://haochen.vip/api/mjx.php || 随机美女7
text:http://www.plapi.tk/api/ksxjjtp.php || 随机美女8
text:http://api.bri6.cn/api/ajax/?url=http://haochen.vip/api/ksxjjtp.php ||  快手小姐姐1
http://api.sakura.gold/ksxjjtp/ || 快手小姐姐2
http://api.wqwlkj.cn/wqwlapi/ks_xjj.php?type=jump || 快手小姐姐3
http://haochen.vip/api/cos.php?type=img || cos美女1
text:http://www.plapi.tk/api/cos.php || cos美女2
text:http://www.plapi.tk/api/tu.php || 随机美腿
https://api.vvhan.com/api/tao || 淘宝买家秀
http://api.wqwlkj.cn/wqwlapi/hlxcos.php?type=jump || 葫芦侠-cos美女
text:http://api.bri6.cn/api/ajax/?url=http://haochen.vip/api/tu.php || 葫芦侠-随机美女
text:http://api.cmvip.cn/API/hlx-ycmt.php || 葫芦侠-原创美腿
text:http://api.cmvip.cn/API//hlx-sksn.php || 葫芦侠-三坑少女
text:http://api.cmvip.cn/API/hlx-dmzr.php || 葫芦侠-动漫真人
text:http://api.cmvip.cn/API/hlx-cymt.php || 葫芦侠-次元美图
text:http://api.cmvip.cn/API/hlx-ytsn.php || 葫芦侠-窈窕淑女
text:http://api.cmvip.cn/API/hlx-sjhs.php || 葫芦侠-随机黑丝
text:http://api.cmvip.cn/API/hlx-sjbs.php || 葫芦侠-随机白丝
text:http://api.cmvip.cn/API/hlx-ywsw.php || 葫芦侠-渔网丝袜
text:http://api.cmvip.cn/API/hlx-ecy.php || 葫芦侠-是二次元',
		'格式：接口链接 || 接口标题（中间使用两个竖杠分隔）<br />
其他：一行一个，一行代表一个接口 <br />
例如：<br />
https://baidu.com || 御姐视频<br/>
https://v.qq.com || 慢摇系列'
	);
	$form->create($image_list);
}