<?php

function theme_config(\system\theme\Form $form)
{
	$weixin = $form->input('微信二维码图片链接', 'weixin', null, 'text');
	$form->create($weixin);

	$email = $form->input('底部联系邮箱账号', 'email', null, 'email');
	$form->create($email);
}