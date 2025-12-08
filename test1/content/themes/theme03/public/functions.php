<?php

if (!defined('ROOT')) exit;

function theme_config(system\theme\Form $form)
{
	$background = $form->input('视频背景壁纸链接', 'background', 'https://s7.huoying666.com/video/20210527/f1abdbf33b1b07d96a0ba00640a5db9a/16221293575533c31498e6a09e.MP4_pre.mp4', 'url');
	$form->create($background);
}