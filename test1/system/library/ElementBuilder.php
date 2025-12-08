<?php

/**
 * @package ElementBuilder
 * @description 动态创建HTML的Element标签
 * @author 易航
 * @version 1.0
 * @link http://bri6.cn
 */

namespace system\library;

class ElementBuilder
{

	private $options = [
		'element' => 'div',
		'inner' => null,
		'attributes' => []
	];

	private function attributes($attributes)
	{
		return FormBuilder::attributes($attributes);
	}

	public function __construct($element)
	{
		$this->options['element'] = $element;
	}

	/**
	 * 设置标签内部的HTML内容
	 * @param $innerHTML 要设置的标签HTML内容
	 * @return $this
	 */
	public function innerHTML($innerHTML)
	{
		$this->options['inner'] = $innerHTML;
		return $this;
	}

	/**
	 * 设置标签内部的文本内容
	 * @param $innerText 要设置的标签文本内容
	 * @return $this
	 */
	public function innerText($innerText)
	{
		$this->options['inner'] = empty($innerText) ? $innerText : htmlentities($innerText);
		return $this;
	}

	/**
	 * 批量设置标签的属性
	 * @param $attributes
	 * @return $this
	 */
	public function attr($attributes, $content = null)
	{
		if (is_array($attributes)) {
			foreach ($attributes as $key => $value) {
				$this->options['attributes'][$key] = $value;
			}
		}
		if (is_string($attributes)) {
			$this->options['attributes'][$attributes] = $content;
		}
		return $this;
	}

	/**
	 * 获取生成的HTML内容
	 * @return string
	 */
	public function get($html = null)
	{
		$this->innerHTML($html);
		$element = $this->options['element'];
		$content = $this->options['inner'];
		$attributes = $this->attributes($this->options['attributes']);
		if ($content === false) {
			$html = "<$element$attributes />";
		} else {
			$html = "<$element$attributes>$content</$element>";
		}
		return $html;
	}

	public function __toString()
	{
		return $this->get($this->options['inner']);
	}
}
