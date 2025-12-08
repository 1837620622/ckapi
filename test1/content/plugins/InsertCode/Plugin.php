<?php

namespace content\plugins\InsertCode;

/**
 * 前台页面插入自定义代码，可放入统计平台的代码等
 *
 * @package 插入自定义代码
 * @author 易航
 * @version 1.1
 * @link http://bri6.cn
 */
class Plugin
{

	public static $options;

	public static function config(\system\plugin\Form $form)
	{
		$warning = '
		<!-- 核心CSS -->
		<link href="' . cdn('codemirror/6.65.7/codemirror.min.css') . '" rel="stylesheet">
		<!-- dracula主题CSS -->
		<link href="' . cdn('codemirror/6.65.7/theme/dracula.min.css') . '" rel="stylesheet">
		<!-- 代码提示CSS -->
		<link href="' . cdn('codemirror/6.65.7/addon/hint/show-hint.min.css') . '" rel="stylesheet">
		<style>
			.cm-s-dracula .CodeMirror-gutters, .cm-s-dracula.CodeMirror {
				background-color: #1f1f1f !important;
			}
			.lyear-layout-web {
				background: #181818;
			}
			form p, form li, form label, form .form-text {
  				color: #ced4da;
			}
			.CodeMirror {
				border-radius: 3.5px;
			}
			.CodeMirror-vscrollbar, .CodeMirror-hscrollbar {
				display: none !important; /* 隐藏滚动条 */
			}
		</style>
		<div class="csf-submessage csf-submessage-warning">
			<p style="margin-bottom: 0.1rem;"><b>自定义代码提醒事项：</b></p>
			<ul style="margin-bottom: 1rem;">
				<li>任何情况下都不建议修改主题源文件，自定义代码可放于此处</li>
				<li>在此处添加的自定义代码会保存到数据库，不会因主题升级而丢失</li>
				<li>使用自义定代码，需要有一定的代码基础</li>
				<li>代码不规范、或代码错误将会引起意料不到的问题</li>
				<li>如果网站遇到未知错误，请首先检查此处的代码是否规范、无误</li>
				<li>一键格式化代码快捷键：Shift+ Alt + F</li>
				<li>快速注释代码快捷键：Ctrl + /</li>
			</ul>
		</div>';
		$form->create($warning);

		$css = $form->textarea('自定义CSS样式', 'css', null, htmlentities('位于</head>之前，直接写样式代码，不用添加<style>标签'), ['rows' => 5, 'class' => 'code-input', 'data-language' => 'css']);
		$form->create($css);

		$javascript = $form->textarea('自定义JavaScript代码', 'javascript', null, htmlentities('位于底部，直接填写JS代码，不需要添加<script>标签'), ['rows' => 5, 'class' => 'code-input', 'data-language' => 'javascript']);
		$form->create($javascript);

		$header = $form->textarea('自定义头部HTML代码', 'header', null, htmlentities('位于</head>之前，这部分代码是在主要内容显示之前加载，通常是CSS样式、自定义的<meta>标签、全站头部JS等需要提前加载的代码，需填HTML标签'), ['rows' => 5, 'class' => 'code-input', 'data-language' => 'htmlmixed']);
		$form->create($header);

		$footer = $form->textarea('自定义底部HTML代码', 'footer', null, htmlentities('位于</body>之前，这部分代码是在主要内容加载完毕加载，通常是JS代码，需填HTML标签'), ['rows' => 5, 'class' => 'code-input', 'data-language' => 'htmlmixed']);
		$form->create($footer);

		$trackcode = $form->textarea('网站统计HTML代码', 'trackcode', null, '位于底部，用于添加第三方流量数据统计代码，如：Google analytics、百度统计、CNZZ、51la，国内站点推荐使用百度统计，国外站点推荐使用Google analytics。需填HTML标签，如果是javascript代码，请保存在自定义javascript代码', ['rows' => 5, 'class' => 'code-input', 'data-language' => 'htmlmixed']);
		$form->create($trackcode);

		$code_input = '
		<!-- 核心JS -->
		<script src="' . cdn('codemirror/6.65.7/codemirror.min.js') . '"></script>

		<!-- 代码提示核心JS -->
		<script src="' . cdn('codemirror/6.65.7/addon/hint/show-hint.min.js') . '"></script>

		<!-- JavaScript语法高亮 -->
		<script src="' . cdn('codemirror/6.65.7/mode/javascript/javascript.min.js') . '"></script>

		<!-- CSS语法高亮 -->
		<script src="' . cdn('codemirror/6.65.7/mode/css/css.min.js') . '"></script>
		
		<!-- HTML语法高亮 -->
		<script src="' . cdn('codemirror/6.65.7/mode/xml/xml.min.js') . '"></script>
		<script src="' . cdn('codemirror/6.65.7/mode/htmlmixed/htmlmixed.min.js') . '"></script>

		<!-- JavaScript代码提示 -->
		<script src="' . cdn('codemirror/6.65.7/addon/hint/javascript-hint.min.js') . '"></script>

		<!-- HTML代码提示 -->
		<script src="' . cdn('codemirror/6.65.7/addon/hint/xml-hint.min.js') . '"></script>
		<script src="' . cdn('codemirror/6.65.7/addon/hint/html-hint.min.js') . '"></script>

		<!-- CSS代码提示 -->
		<script src="' . cdn('codemirror/6.65.7/addon/hint/css-hint.min.js') . '"></script>

		<!-- anyword代码提示 -->
		<script src="' . cdn('codemirror/6.65.7/addon/hint/anyword-hint.min.js') . '"></script>

		<!-- 匹配括号 -->
		<script src="' . cdn('codemirror/6.65.7/addon/edit/matchbrackets.min.js') . '"></script>

		<!-- 自动闭合括号 -->
		<script src="' . cdn('codemirror/6.65.7/addon/edit/closebrackets.min.js') . '"></script>

		<!-- 一键注释 -->
		<script src="' . cdn('codemirror/6.65.7/addon/comment/comment.min.js') . '"></script>

		<!-- prettier格式化工具 -->
		<script src="' . cdn('js-beautify/1.15.1/beautify.min.js') . '"></script>
		<script src="' . cdn('js-beautify/1.15.1/beautify-css.min.js') . '"></script>
		<script src="' . cdn('js-beautify/1.15.1/beautify-html.min.js') . '"></script>

		<script src="/content/plugins/InsertCode/assets/js/index.js"></script>
		';

		$form->create($code_input);

		return $form;
	}

	public static function header()
	{
		if (!empty(self::$options->header)) {
			echo PHP_EOL . '<!-- 自定义头部HTML代码 -->' . PHP_EOL;
			echo self::$options->header;
			echo PHP_EOL . '<!-- 自定义头部HTML代码 -->' . PHP_EOL;
		}

		if (!empty(self::$options->css)) {
			echo PHP_EOL . '<!-- 自定义CSS样式 -->' . PHP_EOL;
			echo '<style>';
			echo PHP_EOL . self::$options->css . PHP_EOL;
			echo '</style>';
			echo PHP_EOL . '<!-- 自定义CSS样式 -->' . PHP_EOL;
		}
	}

	public static function footer()
	{
		if (!empty(self::$options->footer)) {
			echo PHP_EOL . '<!-- 自定义底部HTML代码 -->' . PHP_EOL;
			echo self::$options->footer;
			echo PHP_EOL . '<!-- 自定义底部HTML代码 -->' . PHP_EOL;
		}

		if (!empty(self::$options->javascript)) {
			echo PHP_EOL . '<!-- 自定义javascript代码 -->' . PHP_EOL;
			echo '<script type="text/javascript">';
			echo PHP_EOL . self::$options->javascript . PHP_EOL;
			echo '</script>';
			echo PHP_EOL . '<!-- 自定义javascript代码 -->' . PHP_EOL;
		}

		if (!empty(self::$options->trackcode)) {
			echo PHP_EOL . '<!-- 网站统计HTML代码 -->' . PHP_EOL;
			echo self::$options->trackcode;
			echo PHP_EOL . '<!-- 网站统计HTML代码 -->' . PHP_EOL;
		}
	}
}
