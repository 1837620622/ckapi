<?php
if (!defined('ROOT')) exit;

function theme_config(\system\theme\Form $form)
{
	$message = $form->input('消息框内容', 'message', '如果您觉得本页面不错可以收藏一下哦');
	$form->create($message);

	$accessButton = $form->input('进入按钮内容', 'accessButton', '马上进入');
	$form->create($accessButton);
}
