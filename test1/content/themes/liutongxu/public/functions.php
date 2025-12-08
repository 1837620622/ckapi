<?php

if (!defined('ROOT')) exit;

function theme_config(\system\theme\Form $form)
{

	$icon_cdn = $form->input('Font class链接', 'icon_cdn', '//at.alicdn.com/t/c/font_3997710_qhp3fqb50g.css', 'text', '阿里巴巴图标库项目的Font class链接<br>例如：//at.alicdn.com/t/c/font_3997710_qhp3fqb50g.css');
	$form->create($icon_cdn);

	$menu = $form->textarea(
		'导航栏链接',
		'menu',
		'主页 || http://www.bri6.cn || icon-changyonglianjie
博客 || http://bri6.cn || icon-changyonglianjie
百度 || http://baidu.com || icon-changyonglianjie',
		'说明：添加自定义导航栏链接 <br />
		格式：跳转文字 || 跳转链接 || 导航图标（中间使用两个竖杠分隔）<br />
		其他：一行一个，一行代表一个超链接，图标请使用阿里巴巴图标库代码 <br />
		例如：<br />
	   	百度一下 || https://baidu.com || icon-daohang <br />
	   	腾讯视频 || https://v.qq.com || icon-daohang'
	);
	$form->create($menu);

	$bulletin = $form->textarea(
		'首页公告',
		'bulletin',
		'易航网址导航系统 - 用心精选每一个链接
易航网址导航系统 - 不求最全，但求好用',
		'可多行使用，一行一个'
	);
	$form->create($bulletin);

	$about = $form->textarea('关于页面HTML内容', 'about', '<p>易航网址导航系统 - <a class="external" href="http://guide.bri6.cn" title="易航网址导航系统" target="_blank">有范的导航网站</a></p>');
	$form->create($about);

	$apply = $form->select('申请收录功能', 'apply', [1 => '开启', 0 => '关闭'], 1);
	$form->create($apply);

	$auto_apply = $form->select('自动审核收录', 'auto_apply', [1 => '开启', 0 => '关闭'], 1, '开启后可自动审核提交收录申请的站点，判断条件为对方站点首页是否添加本站链接');
	$form->create($auto_apply);

	$email_notice = $form->select('站点提交通知', 'email_notice', [1 => '开启', 0 => '关闭'], 0, '开启后站点提交收录申请成功后将自动发送邮件通知到您的邮箱，邮箱配置请在 <a href="set.php?mod=options">系统配置</a> 处配置');
	$form->create($email_notice);

	$qq = $form->number('站长QQ', 'qq', '2136118039');
	$form->create($qq);

	// $email = $form->email('电子邮箱', 'email', '2136118039@qq.com');
	// $form->create($email);
}

function sort_config(\system\theme\Fields $form)
{
	$form->input('分类图标', 'icon', null, 'text', '说明：请输入阿里巴巴图标库创建的项目的Font class类型的icon代码<br>例如：icon-gonggao<br>阿里巴巴图标库：<a href="https://www.iconfont.cn" target="_blank">www.iconfont.cn</a>');
}

function site_config(\system\theme\Fields $form)
{
	$favicon = $form->url('站点图标', 'favicon', null, '默认自动获取对方站点图标，自定义请输入图标直链或base54代码');
	$form->create($favicon);

	$description = $form->text('站点简介', 'description');
	$form->create($description);
}
