<?php

if (!defined('ROOT')) exit;

function sort_config(\system\theme\Fields $form)
{
	$form->input('分类图标', 'logo', null, 'url', '图像文件URL直链');
}

function site_config(\system\theme\Fields $form)
{
	$logo = $form->input('站点图标', 'logo', null, 'url', '图像文件URL直链');
	$form->create($logo);
}