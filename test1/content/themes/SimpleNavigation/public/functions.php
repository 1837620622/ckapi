<?php

if (!defined('ROOT')) exit;

function theme_config(\system\theme\Form $form)
{
	$title = $form->input('页面标题', 'title', '上网，从这里开始！');
	$form->create($title);

	$content = $form->input('页面简介', 'content', '好记性不如烂笔头');
	$form->create($content);

	$Symbol = $form->input('Symbol链接', 'icon_cdn', null, 'text', '
    阿里巴巴图标库项目的Symbol链接<br>
    例如：//at.alicdn.com/t/c/font_3258230_7tckqttb4wc.js<br>
    使用教程：<a href="https://yepydvmpxo.k.topthink.com/@guide/%E9%93%BE%E6%8E%A5%E5%9B%BE%E6%A0%87%E6%95%99%E7%A8%8B.html" target="_blank">查看使用教程</a>
    ');
	$form->create($Symbol);

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

	$CustomNavs = $form->textarea(
		'首页顶部链接',
		'Toplinks',
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

	$embody = $form->select('申请收录功能', 'embody', [0 => '关闭', 1 => '开启'], 0);
	$form->create($embody);

	$CustomBackground = $form->switcher('自定义背景壁纸', 'CustomBackground', 0, '默认使用主题自带壁纸，开启后则调用系统壁纸接口');
	$form->create($CustomBackground);
}

function sort_config(\system\theme\Fields $form)
{
	$form->input('分类图标', 'icon', null, 'text', '
    说明：请输入阿里巴巴图标库创建的项目的Symbol类型的icon代码<br>
    例如：icon-gonggao<br>
    阿里巴巴图标库：<a href="https://www.iconfont.cn" target="_blank">www.iconfont.cn</a><br>
    使用教程：<a href="https://yepydvmpxo.k.topthink.com/@guide/%E9%93%BE%E6%8E%A5%E5%9B%BE%E6%A0%87%E6%95%99%E7%A8%8B.html" target="_blank">查看使用教程</a>');
}

function site_config(\system\theme\Fields $form)
{
	$icon = $form->input('站点图标', 'icon', null, 'text', '
    说明：请输入阿里巴巴图标库创建的项目的Symbol类型的icon代码<br>
    例如：icon-gonggao<br>
    阿里巴巴图标库：<a href="https://www.iconfont.cn" target="_blank">www.iconfont.cn</a><br>
    使用教程：<a href="https://yepydvmpxo.k.topthink.com/@guide/%E9%93%BE%E6%8E%A5%E5%9B%BE%E6%A0%87%E6%95%99%E7%A8%8B.html" target="_blank">查看使用教程</a>');
	$form->create($icon);

	$favicon = $form->url('备用站点图标', 'favicon', null, '默认尝试使用对方站点自带图标，填写后可自定义，请输入图标的url直链或base64代码');
	$form->create($favicon);
}