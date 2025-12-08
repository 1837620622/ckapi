<?php
if (!defined('ROOT')) exit;

function theme_config(\system\theme\Form $form)
{
	$notice = $form->text('顶栏公告', 'notice', '将本站收藏至浏览器书签，永不迷路');
	$form->create($notice);

	$CustomBackground = $form->switcher('自定义背景壁纸', 'CustomBackground', 0, '默认使用主题自带壁纸，开启后则调用系统壁纸接口');
	$form->create($CustomBackground);
}