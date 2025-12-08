<?php
if (!defined('ROOT')) exit;

function theme_config(\system\theme\Form $form)
{
	$title = $form->input('标题', 'title', '最新网站合集');
	$form->create($title);

	$description = $form->input('简介', 'description', '周到的服务才能赢得顾客的信任');
	$form->create($description);

	$tip = $form->input('提示', 'tip', '请 Ctrl+D 收藏本页到浏览器收藏夹⇩');
	$form->create($tip);
}
