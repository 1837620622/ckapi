<?php
if (!defined('ROOT')) exit;

function theme_config(\system\theme\Form $form)
{
	$Notice = $form->textarea('顶部公告', 'notice', '欢迎使用易航网址导航系统', '为空则不展示公告');
	$form->create($Notice);
}

function site_config(\system\theme\Fields $form)
{
	$description = $form->text('站点简介', 'description', null, '为空则不显示');
	$form->create($description);

	$background_color = $form->text('站点背景颜色', 'background_color', 'rgba(42, 42, 42, 0.42)', '黑色半透明：rgba(42, 42, 42, 0.42)<br>透明背景：rgba(0, 0, 0, 0)<br>');
	$form->create($background_color);

	$text_color = $form->text('站点文字颜色', 'text_color', 'white', '例如：white | #FFFFFF | rgba(255, 255, 255, 1)');
	$form->create($text_color);

	$icon_px = $form->text('站点图标大小', 'icon_px', '35px', '例如：35px');
	$form->create($icon_px);

	$img = $form->text('站点图片图标', 'img', null, '请输入图片直链或base64文本图片，如果使用SVG直链，推荐图标大小填写50px');
	$form->create($img);

	$svg = $form->text('站点SVG图标', 'svg', null, htmlentities('SVG代码，<svg>开始</svg>结束，小白不推荐使用'));
	$form->create($svg);

	$text_icon = $form->text('站点文本图标', 'text_icon', null);
	$form->create($text_icon);
}
