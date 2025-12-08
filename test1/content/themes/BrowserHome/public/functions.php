<?php

function theme_config(\system\theme\Form $form)
{
    $icon_cdn = $form->input('Symbol链接', 'icon_cdn', null, 'text', '
    阿里巴巴图标库项目的Symbol链接<br>
    例如：//at.alicdn.com/t/c/font_3258230_7tckqttb4wc.js<br>
    使用教程：<a href="https://yepydvmpxo.k.topthink.com/@guide/%E9%93%BE%E6%8E%A5%E5%9B%BE%E6%A0%87%E6%95%99%E7%A8%8B.html" target="_blank">查看使用教程</a>
    ');
    $form->create($icon_cdn);
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
}