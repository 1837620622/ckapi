<?php
if (!defined('ROOT')) exit;

function theme_config(\system\theme\Form $form)
{
	$title = $form->input('网站标题', 'title', '技术导航引导页');
	$form->create($title);

	$content = $form->input('页面公告', 'content', '测试公告');
	$form->create($content);

	$CustomNavs = $form->textarea(
		'导航栏链接',
		'CustomNavs',
		'主页 || http://www.bri6.cn
博客 || http://blog.bri6.cn
百度 || http://baidu.com',
		'格式：跳转文字 || 跳转链接（中间使用两个竖杠分隔）<br />
		其他：一行一个，一行代表一个超链接 <br />
		例如：<br />
	   	百度一下 || https://baidu.com <br />
	   	腾讯视频 || https://v.qq.com'
	);
	$form->create($CustomNavs);
}