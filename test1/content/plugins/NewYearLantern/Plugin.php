<?php

namespace content\plugins\NewYearLantern;

/**
 * 一款可以自定义节日的灯笼挂件
 *
 * @package 灯笼挂件
 * @author 易航
 * @version 1.0
 * @link http://bri6.cn
 */
class Plugin
{

	public static $options;

	public static function config(\system\plugin\Form $form)
	{
		$long = $form->switcher('始终开启', 'long', 0);
		$form->create($long);

		$start = $form->datepicker('自定义开始日期', 'start', '01-28', null, [
			'data-date-format' => 'mm-dd'
		]);
		$form->create($start);

		$end = $form->datepicker('自定义结束日期', 'end', '02-12', null, [
			'data-date-format' => 'mm-dd'
		]);
		$form->create($end);

		return $form;
	}

	public static function footer()
	{
		$long = self::$options->long;
		if ($long) {
			echo '<script src="/content/plugins/NewYearLantern/assets/js/china-lantern.min.js"></script>';
			return;
		}
		$start_date_array = explode('-', self::$options->start);
		$start_month = $start_date_array[0];
		$start_day = $start_date_array[1];
		$end_date_array = explode('-', self::$options->end);
		$end_month = $end_date_array[0];
		$end_day = $end_date_array[1];
		$month = date("m"); // 带0的月数
		$day = intval(date("d")); // 带0的日
		$active = $month >= $start_month && $month <= $end_month && $day >= $start_day && $day <= $end_day;
		if ($active) {
			echo '<script src="/content/plugins/NewYearLantern/assets/js/china-lantern.min.js"></script>';
		}
	}
}
