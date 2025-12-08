<?php

namespace system\library;

class Statics
{
	public static function load($file, $attr = [])
	{
		$file_explode_url = explode('?', $file, 2);
		$file_url = $file_explode_url[0];
		$param = $file_explode_url[1];
		if (stripos($file, 'cdn:') === 0) {
			$load_url = cdn(substr($file, 4));
		} else {
		    $load_url = $file;
		}
		$attr['referrer'] = 'no-referrer';
		$extension = pathinfo($file_url, PATHINFO_EXTENSION);
		if ($extension == 'css') {
			$link = element('link');
			$attr['rel'] = isset($attr['rel']) ? $attr['rel'] : 'stylesheet';
			$attr['href'] = $load_url;
			$link->attr($attr);
			$html = $link->get(false);
		} else if ($extension == 'js') {
			$script = element('script');
			$attr['src'] = $load_url;
			$script->attr($attr);
			$html = $script->get();
		} else {
		    sysmsg('system\library\Statics类的load方法生成资源url [' . $file . '] 异常，资源文件后缀名为 ' . $extension);
		}
		if (empty($html)) {
		    sysmsg('system\library\Statics类的load方法生成资源url [' . $file . '] 时使用element函数生成HTML失败，资源文件后缀名为 ' . $extension);
		}
		
		return $html . PHP_EOL;
	}

	public static function version($url, $version = VERSION)
	{
		if ($version && (strstr($url, 'version=') !== false)) {
			return $url .= '?version=' . $version;
		}
		return $url;
	}

	public static function backgroundImage()
	{
		$image = function ($devices) {
			$background_path = ROOT . 'content/static/images/background/' . $devices . '/';
			$background_list = scan_dir($background_path)->files();
			$url = '/content/static/images/background/' . $devices . '/';
			$background = $url .  $background_list[array_rand($background_list)];
			return $background;
		};
		return Request::isPc() ? $image('pc') : $image('mobile');
	}

	public static function LightYear(int $v, $path, $version = VERSION)
	{
		$url = '/content/static/frame/light-year/v' . $v . '/' . $path;
		return self::version($url, $version);
	}

	public static function plugin($path, $version = VERSION)
	{
		$url = '/content/static/plugins/' . $path;
		return self::version($url, $version);
	}

	public static function image($url, $attr = [])
	{
		$attr['referrer'] = 'no-referrer';
		$attr['src'] = $url;
		return element('img')->attr($attr);
	}

	public static function alert($content, $location = false)
	{
		$script = element('script');
		$content = 'alert("' . $content . '")' . ($location ? ';window.location.href="' . $location . '"' : null);
		echo $script->get($content);
	}
}
