<?php
if (!defined('ROOT')) exit;

function theme_config(\system\theme\Form $form)
{
	$group = $form->input('售后群', 'group', '733120686');
	$form->create($group);

	$group = $form->input('QQ号', 'qq', '2136118039');
	$form->create($group);
}
