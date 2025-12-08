<?php

namespace system\library;

/**
 * 获取指定目录下的文件和目录列表
 */
class DirScanner
{
	private array $list;

	private string $directory;

	/**
	 * @param string $directory 要扫描的目录
	 */
	public function __construct(string $directory)
	{
		$this->directory = str_replace(['//', '\\\\'], ['/', '\\'], $directory);
		$this->directory = preg_match('/^\/|\\\$/', $this->directory) ? $this->directory :  $this->directory . DIRECTORY_SEPARATOR;
		$this->list = array_values(array_diff(scandir($directory), ['.', '..']));
	}

	/**
	 * 只获取文件
	 */
	public function files(array $suffixes = []): array
	{
		return $this->filter($suffixes, 'is_file');
	}

	/**
	 * 只获取目录
	 */
	public function dirs(): array
	{
		return $this->filter([], 'is_dir');
	}

	/**
	 * 获取所有文件和目录
	 */
	public function all(): array
	{
		return $this->list;
	}

	/**
	 * 过滤列表
	 */
	private function filter(array $suffixes, callable $callback): array
	{
		$directory = $this->directory;
		return array_filter($this->list, function ($item) use ($directory, $suffixes, $callback) {
			$path = $directory . $item;
			if (!empty($suffixes) && is_file($path)) {
				$extension = pathinfo($item, PATHINFO_EXTENSION);
				if (!in_array($extension, $suffixes)) return false;
			}
			return $callback($path);
		});
	}
}
