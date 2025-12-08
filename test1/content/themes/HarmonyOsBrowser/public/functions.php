<?php

if (!defined('ROOT')) exit;

function site_config(\system\theme\Fields $form)
{
    $icon = $form->input('站点图标', 'icon', null, 'url', '说明：请输入图像文件直链或base64代码');
    $form->create($icon);
}