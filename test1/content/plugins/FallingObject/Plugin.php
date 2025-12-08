<?php

namespace content\plugins\FallingObject;

/**
 * @package 飘落物粒子特效
 * @description 站点前端飘落物粒子特效
 * @author 易航
 * @version 1.0
 * @link http://bri6.cn
 */
class Plugin
{
	public static $options;

	public static function config(\system\plugin\Form $form)
	{
		$falling = $form->select('特效选择', 'falling', [
			'snow' => '雪花',
			'sakura' => '樱花',
			'sakura-min' => '仅入口樱花'
		], 'snow');
		$form->create($falling);

		return $form;
	}

	public static function footer()
	{
		$falling = self::$options->falling;
		if (!empty($falling)) {
			echo '<script src="/content/plugins/FallingObject/assets/js/loadjs.js"></script>';
			$jQueryUrl = cdn('jquery/3.7.1/jquery.min.js');
			if ($falling == 'snow') {
				$url = '/content/plugins/FallingObject/assets/js/snow-falling.min.js';
			}
			if ($falling == 'sakura') {
				$url = '/content/plugins/FallingObject/assets/js/sakura-falling.js';
			}
			if ($falling == 'sakura-min') {
				$url = '/content/plugins/FallingObject/assets/js/sakura-falling.min.js';
			}
			echo "<script>__falling_Object_load_JS__('$jQueryUrl', '$url')</script>";
		}
	}
}
