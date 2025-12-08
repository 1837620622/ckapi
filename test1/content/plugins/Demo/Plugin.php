<?php

namespace content\plugins\Demo;

use system\library\Route;

/**
 * 这只是易航写个一个默认插件演示
 *
 * @package 插件演示
 * @author 易航
 * @version 1.0
 * @link http://bri6.cn
 */
class Plugin
{

	/** 插件配置信息 */
	public static $options;

	/** 插件自定义配置 */
	public static function config(\system\plugin\Form $form)
	{
		$input = $form->input('输入框标题', 'demo', '这只是易航写个一个默认插件演示', 'text', '一个提示', ['attr' => '111']);
		$form->create($input);

		return $form; // 必须返回实例化的form对象
	}

	/**
	 * 插件注册方法
	 */
	public static function register()
	{
		// register code
	}

	/**
	 * 插件路由方法
	 */
	public static function route()
	{
		// 注册路由
		Route::rule('/demo[/{param}]', function ($param) {
			echo '成功注册插件路由' . $param['param'];
			exit;
		});
	}

	/**
	 * 默认触发方法
	 */
	public static function render()
	{
		// echo self::$options->demo;
	}

	/**
	 * 前台页面脚头触发方法，位于HTML代码的head标签之间
	 */
	public static function header()
	{
		// echo '这是页头代码';
	}

	/**
	 * 前台页面脚页触发方法
	 */
	public static function footer()
	{
		// echo '已经到达页面底部喽';
		// echo '插件配置：' . self::$options['demo'];
	}
}
