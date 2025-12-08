<?php

namespace content\plugins\ReportPrevent;

/**
 * @package QQ防举报
 * @description QQ内打开本站后举报将自动跳转百度，极少数情况下可能会导致JS代码出现BUG
 * @author 易航
 * @version 1.0
 * @link http://bri6.cn
 */
class Plugin
{

	public static $options;

	public static function footer()
	{
		if (strpos($_SERVER['HTTP_USER_AGENT'], 'QQ/') !== false) {
			?>
			<script>
				document.getElementsByTagName = function(a) {
					if (a == 'meta') {
						window.location.href = 'http://www.baidu.com';
					}
					return document.querySelectorAll(a);
				}
			</script>
			<?php
		}
	}
}
