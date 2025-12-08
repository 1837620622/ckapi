<?php

namespace system\theme;

use JsonDb\JsonDb\Db;
use system\admin\Form as AdminForm;

class Form
{
	public $options;

	public $html = [];

	public function __construct()
	{
		$this->options = Db::name('theme')->where('theme', THEME)->find();
		if (is_null($this->options)) {
			$this->options = [];
		}
	}

	private function field(&$name, &$value)
	{
		$form_name = $name;
		$name = trim($name, '[]');
		if (isset($this->options[$name])) {
			$value = $this->options[$name];
		} else {
			$this->options[$name] = $value;
		}
		$name = $form_name;
	}

	/**
	 * 生成文本框(按类型)
	 *
	 * @param string $title 文本框标题
	 * @param string $name 文本框name
	 * @param string $value 文本框值
	 * @param string $type 文本框类型
	 * @param string $tip 文本框提示
	 * @param array  $options 文本框属性
	 * @return string
	 */
	public function input($title, $name, $value = null, $type = 'text', $tip = null, $options = [])
	{
		$this->field($name, $value);
		return AdminForm::input($title, $name, $value, $type, $tip, $options);
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
	public function text($title, $name, $value = null, $tip = null, $options = [])
	{
		$this->field($name, $value);
		return AdminForm::input($title, $name, $value, 'text', $tip, $options);
	}

	/**
	 * 生成颜色选取框
	 *
	 * @param string $title 文本框标题
	 * @param string $name 文本框name
	 * @param string $value 文本框值
	 * @param string $tip 文本框提示
	 * @param array  $options 文本框属性
	 * @return string
	 */
	public function color($title, $name, $value = null, $tip = null, $options = [])
	{
		$this->field($name, $value);
		return AdminForm::color($title, $name, $value, $tip, $options);
	}

	/**
	 * 生成URL文本框
	 *
	 * @param string $title 文本框标题
	 * @param string $name 文本框name
	 * @param string $value 文本框值
	 * @param string $tip 文本框提示
	 * @param array  $options 文本框属性
	 * @return string
	 */
	public function url($title, $name, $value = null, $tip = null, $options = [])
	{
		$this->field($name, $value);
		return AdminForm::url($title, $name, $value, $tip, $options);
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
	public function number($title, $name, $value = null, $tip = null, $options = [])
	{
		$this->field($name, $value);
		return AdminForm::number($title, $name, $value, $tip, $options);
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
	public function email($title, $name, $value = null, $tip = null, $options = [])
	{
		$this->field($name, $value);
		return AdminForm::email($title, $name, $value, $tip, $options);
	}

	/**
	 * 生成下拉列表框
	 *
	 * @param string $title 下拉框标题
	 * @param string $name 下拉框name值
	 * @param array  $list 下拉框数据
	 * @param mixed  $value 下拉框默认值
	 * @param string $tip 下拉框提示
	 * @param array  $options select自定义属性
	 * @return string
	 */
	public function select($title, $name, $list = [], $value = null, $tip = null, $options = [])
	{
		$this->field($name, $value);
		return AdminForm::select($title, $name, $list, $value, $tip, $options);
	}

	/**
	 * 生成开关下拉列表框
	 *
	 * @param string $title 下拉框标题
	 * @param string $name 下拉框name值
	 * @param mixed  $value 下拉框默认值
	 * @param string $tip 下拉框提示
	 * @param array  $options select自定义属性
	 * @return string
	 */
	public function switcher($title, $name, $value = 0, $tip = null, $options = [])
	{
		$this->field($name, $value);
		$list = ['1' => '开启', '0' => '关闭'];
		return AdminForm::select($title, $name, $list, $value, $tip, $options);
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
	public function textarea($title, $name, $value = null, $tip = null, $options = [])
	{
		$this->field($name, $value);
		return AdminForm::textarea($title, $name, $value, $tip, $options);
	}

	public function addInput($field)
	{
		$this->html[] = $field;
		return $this;
	}

	public function create($field)
	{
		$this->html[] = $field;
		return $this;
	}
}
