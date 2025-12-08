<?php
if (!defined('ROOT')) exit;

function theme_config(\system\theme\Form $form)
{
	$title = $form->input('标题', 'title', '易航引导页');
	$form->create($title);

	$fable = $form->input('一言', 'fable', '一个人可以被毁灭，但绝不会被打败');
	$form->create($fable);

	$background = $form->input('背景壁纸', 'background', 'http://tuapi.eees.cc/api.php?category=dongman&type=302', 'url', '可以使用API接口输出随机图片');
	$form->create($background);

	$qq = $form->input('QQ号', 'qq', 2136118039, 'number', '用作主题头像的展示');
	$form->create($qq);

	$WeChat = $form->input('微信', 'WeChat', 'http://storage.bri6.cn/kodbox/202211/15_9329d75d/微信赞赏码.jpg', 'url', '微信收款码直链');
	$form->create($WeChat);

	$Alipay = $form->input('支付宝', 'Alipay', 'http://storage.bri6.cn/kodbox/202211/15_9329d75d/支付宝收款码.jpg', 'url', '支付宝收款码直链');
	$form->create($Alipay);

	$QQPicture = $form->input('QQ收款码', 'QQPicture', 'http://storage.bri6.cn/kodbox/202211/16_014e7b81/QQ.jpg', 'url', 'QQ收款码直链');
	$form->create($QQPicture);
}
