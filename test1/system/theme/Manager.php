<?php

namespace system\theme;

use JsonDb\JsonDb\Db;

class Manager
{

	/**
	 * 获取前台主题列表
	 *
	 * @param bool $annotate 是否获取注解信息
	 * @return array
	 */
	public static function getList($annotate = false): array
	{
		$dirArray = [];
		$dir = THEME_PATH;

		if (is_dir($dir)) {
			$files = scandir($dir);
			if ($files !== false) {
				foreach ($files as $file) {
					if ($file !== '.' && $file !== '..' && !str_contains($file, '.')) {
						$data = self::getInfo($file, $annotate);
						$dirArray[$file] = $data;
					}
				}
			}
		}

		uksort($dirArray, function ($a, $b) {
			return strcasecmp($a, $b); // strcasecmp 函数比较两个字符串，不区分大小写
		});

		return $dirArray;
	}

	/**
	 * 获取指定主题注解
	 *
	 * @param string $theme 主题名称
	 * @param bool $annotate 是否获取注解信息
	 * @param bool $themeConfig 是否加载主题配置函数
	 * @return array
	 */
	public static function getInfo(string $theme = THEME, bool $annotate = true, bool $themeConfig = false): array
	{
		$themeFile = THEME_PATH . $theme . DIR_SEP . 'index.php';
		$options = false;

		if ($themeConfig) {
			$functionsFile = THEME_PATH . $theme . DIR_SEP . 'public' . DIR_SEP . 'functions.php';
			if (file_exists($functionsFile)) {
				include_once $functionsFile;
				if (function_exists('theme_config')) $options = true;
			}
		}

		$themeInfo = ['name' => $theme, 'options' => $options];

		if ($annotate && file_exists($themeFile)) {
			$themeAnnotation = get_file_annotate($themeFile);
			if ($themeAnnotation) {
				$themeAnnotation = parse_annotate($themeAnnotation);
				$themeInfo = array_merge($themeAnnotation, $themeInfo);
				$themeInfo['title'] = $themeInfo['title'] ?? ($themeInfo['package'] ?? null);
				$themeInfo['description'] = $themeInfo['description'] ?? ($themeInfo[0] ?? null);
			}
		}

		return $themeInfo;
	}

	/**
	 * 获取主题文件
	 *
	 * @param string $path 文件路径
	 * @param string $theme 主题名称
	 * @param string $suffix 文件后缀
	 * @return string|false 返回文件路径或 false
	 */
	public static function getFile(string $path, string $theme = THEME, string $suffix = '.php')
	{
		$path = str_replace(['\\', '/'], DIR_SEP, $path);
		$filename = THEME_PATH . $theme . DIRECTORY_SEPARATOR . $path . $suffix;

		if (file_exists($filename)) {
			return $filename;
		}

		return false;
	}

	/**
	 * 包含主题文件
	 *
	 * @param string $mod 模块名称
	 * @param string $theme 主题名称
	 * @return mixed|false
	 */
	public static function needFile(string $mod, string $theme = THEME)
	{
		$filename = self::getFile($mod, $theme);
		if ($filename) {
			return include_once $filename;
		}

		return false;
	}

	/**
	 * 更新主题设置
	 *
	 * @param array $data 数据
	 * @param string $theme 主题名称
	 * @return bool
	 */
	public static function saveSet(array $data, string $theme = THEME): bool
	{
		$data['theme'] = $theme;
		return Db::name('theme')->save($data, 'theme');
	}

	/**
	 * 获取主题配置
	 *
	 * @param string $theme 主题名称
	 * @return array
	 */
	public static function options(string $theme = THEME): array
	{
		$find = Db::name('theme')->where('theme', $theme)->find();
		if (is_null($find)) {
			if (self::needFile('public/functions', $theme) && function_exists('theme_config')) {
				$form = new Form();
				theme_config($form);
				self::saveSet($form->options, $theme);
				return $form->options;
			}
		}
		return $find ? $find : [];
	}
}
