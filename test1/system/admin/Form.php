<?php

namespace system\admin;

use system\library\FormBuilder;

class Form
{

	/**
	 * 生成文本框(按类型)
	 *
	 * @param string $title 文本框标题
	 * @param string $name 文本框name
	 * @param string $value 文本框值
	 * @param string $type 文本框类型
	 * @param string $tip 文本框提示
	 * @param array  $options
	 * @return string
	 */
	static function input($title, $name, $value = null, $type = 'text', $tip = null, $options = [])
	{
		$options['class'] = isset($options['class']) ? $options['class'] . ' form-control' : 'form-control';
		$options['placeholder'] = empty($options['placeholder']) ? ('请输入' . $title . ' ' . (empty($options['required']) ? '[非必填]' : '[必填]')) : $options['placeholder'];
		$input = FormBuilder::input($type, $name, $value, $options);
		return self::label($title, $name, $input, $tip);
	}

	/**
	 * 生成普通文本框
	 *
	 * @param string $title 文本框标题
	 * @param string $name 文本框name
	 * @param string $value 文本框值
	 * @param string $tip 文本框提示
	 * @param array  $options 文本框属性
	 * @return string
	 */
	static function text($title, $name, $value = null, $tip = null, $options = [])
	{
		return self::input($title, $name, $value, 'text', $tip, $options);
	}

	/**
	 * 生成颜色选取框
	 *
	 * @param string $title 文本框标题
	 * @param string $name 文本框name
	 * @param string $value 文本框值
	 * @param string $tip 文本框提示
	 * @param array  $options
	 * @return string
	 */
	static function color($title, $name, $value = null, $tip = null, $options = [])
	{
		$options['class'] = isset($options['class']) ? $options['class'] . ' form-control form-control-color' : 'form-control form-control-color';
		$input = FormBuilder::input('color', $name, $value, $options);
		return self::label($title, $name, $input, $tip);
	}

	/**
	 * 生成URL文本框
	 *
	 * @param string $title 文本框标题
	 * @param string $name 文本框name
	 * @param string $value 文本框值
	 * @param string $tip 文本框提示
	 * @param array  $options
	 * @return string
	 */
	static function url($title, $name, $value = null, $tip = null, $options = [])
	{
		return self::input($title, $name, $value, 'url', $tip, $options);
	}

	/**
	 * 生成数字文本框
	 *
	 * @param string $title 文本框标题
	 * @param string $name 文本框name
	 * @param string $value 文本框值
	 * @param string $tip 文本框提示
	 * @param array  $options 文本框属性
	 * @return string
	 */
	static function number($title, $name, $value = null, $tip = null, $options = [])
	{
		return self::input($title, $name, $value, 'number', $tip, $options);
	}

	/**
	 * 生成Email文本框
	 *
	 * @param string $title 文本框标题
	 * @param string $name 文本框name
	 * @param string $value 文本框值
	 * @param string $tip 文本框提示
	 * @param array  $options 文本框属性
	 * @return string
	 */
	public static function email($title, $name, $value = null, $tip = null, $options = [])
	{
		return self::input($title, $name, $value, 'email', $tip, $options);
	}

	/**
	 * 生成多行文本框
	 *
	 * @param string $title 文本框标题
	 * @param string $name 文本框name
	 * @param string $value 文本框值
	 * @param string $tip 文本框提示
	 * @param array  $options 文本框其他属性
	 * @return string
	 */
	static function textarea($title, $name, $value = null, $tip = null, $options = [])
	{
		$options['placeholder'] = empty($options['placeholder']) ? ('请输入' . $title . ' ' . (empty($options['required']) ? '[非必填]' : '[必填]')) : $options['placeholder'];
		$textarea = FormBuilder::textarea($name, $value, $options);
		return self::label($title, $name, $textarea, $tip);
	}

	/**
	 * 生成开关文本框
	 *
	 * @param string $title 标题
	 * @param string $name name值
	 * @param mixed  $selected 默认值 name
	 * @param string $tip 提示
	 * @param array  $options 自定义属性
	 * @return string
	 */
	static function switcher($title, $name, $selected = 0, $tip = null, $options = [])
	{
		return self::select($title, $name, [1 => '开启', 0 => '关闭'], $selected, $tip, $options);
	}

	static function hidden($name, $value, $options = [])
	{
		return FormBuilder::hidden($name, $value, $options);
	}

	/**
	 * 生成下拉列表框
	 *
	 * @param string $title 下拉框标题
	 * @param string $name 下拉框name值
	 * @param array  $list 下拉框数据
	 * @param mixed  $selected 下拉框默认值 name
	 * @param string $tip 下拉框提示
	 * @param array  $options select自定义属性
	 * @return string
	 */
	static function select($title, $name, $list = [], $selected = null, $tip = null, $options = [])
	{
		if (is_array($selected)) $selected = $selected[$name];
		$options['class'] = empty($options['class']) ? 'form-control selectpicker' : $options['class'] . 'form-control selectpicker';
		$select = FormBuilder::select($name, $list, $selected, $options);
		return self::label($title, $name, $select, $tip);
	}

	/**
	 * 生成下拉列表框(多选)
	 *
	 * @param string $title 下拉框标题
	 * @param string $name 下拉框name值
	 * @param array  $list 下拉框数据
	 * @param mixed  $selected 下拉框默认值 name
	 * @param string $tip 下拉框提示
	 * @param array  $options select自定义属性
	 * @return string
	 */
	static function selects($title, $name, $list = [], $selected = null, $tip = null, $options = [])
	{
		$options['class'] = empty($options['class']) ? 'form-control selectpicker' : $options['class'] . ' form-control selectpicker';
		$options['data-actions-box'] = 'true';
		$select = FormBuilder::selects($name, $list, $selected, $options);
		return self::label($title, $name, $select, $tip);
	}

	/**
	 * 日期选择器
	 * @param string $title
	 * @param string $name
	 * @param mixed  $value
	 * @param string $tip
	 * @param array  $options
	 * @return string
	 */
	static public function datepicker($title, $name, $value = null, $tip = null, $options = [])
	{
		$defaults = [
			'data-provide' => 'datepicker',
			'data-autoclose' => 'true'
			// 'data-date-highlight' => 'true'
		];
		$options = array_merge($defaults, $options);
		$value = is_numeric($value) ? date("Y-m-d", $value) : $value;
		$datepicker = FormBuilder::input('text', $name, $value, $options);
		return self::label($title, $name, $datepicker, $tip);
	}

	/**
	 * 日期时间选择器
	 *
	 * @param string $title
	 * @param string $name
	 * @param mixed  $value
	 * @param string $tip
	 * @param array  $options
	 * @return string
	 */
	static public function datetimepicker($title, $name, $value = null, $tip = null, $options = [])
	{
		$defaults = [
			'data-provide' => 'datetimepicker',
			'data-format' => "YYYY-MM-DD HH:mm:ss",
			'data-side-by-side' => 'true',
		];
		$options = array_merge($defaults, $options);
		$options['placeholder'] = empty($options['placeholder']) ? ('请输入' . $title . ' ' . (empty($options['required']) ? '[非必填]' : '[必填]')) : $options['placeholder'];
		$value = is_numeric($value) ? date(date_time(), $value) : $value;
		$datepicker = FormBuilder::input('text', $name, $value, $options);
		return self::label($title, $name, $datepicker, $tip);
	}

	static private function label($title, $name, $content, $tip)
	{
		$table = FormBuilder::label($name, $title, [
			'class' => 'col-sm-2 col-form-label'
		]);
		$tip = $tip ? '<div class="form-text">' . $tip . '</div>' : null;
		$label = <<<HTML
		<div class="row mb-3">
			{$table}
			<div class="col-sm-10">
				{$content}
			</div>
			{$tip}
		</div>
		HTML;
		return $label;
	}

	/**
	 * 动态创建form表单
	 *
	 * @param string $api 提交地址
	 * @param array $param 附带GET参数
	 * @param string  $content 表单内容
	 * @return string
	 */
	static function form($api, $param = null, $content = null, $button = '提交')
	{
		if ($param) {
			$param = http_build_query($param);
			$action = strstr($api, '?') ? (trim($api, '&') . '&' .  $param) : $api . '?' .  $param;
		}
		$form_class = md5($action);
		if (is_array($content)) $content = implode(PHP_EOL, $content);
		$form = <<<HTML
		<form action="{$action}" method="post" class="{$form_class}">
			{$content}
			<div class="d-grid">
				<button type="submit" class="btn btn-primary">{$button}</button>
			</div>
		</form>
		<script type="text/javascript">
			YiHang.form('.{$form_class}','{$button}')
		</script>
		HTML;
		return $form;
	}
}
