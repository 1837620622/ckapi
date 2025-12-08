<?php

namespace system\library;

use JsonDb\JsonDb\Db;

class Json
{

	/** 筛选后的结果 */
	public static $filterResult;

	/** 要操作的Json文件 */
	public static $jsonFile;

	/**
	 * 校验JSON字符串
	 * @param string $stringData
	 * @return bool
	 */
	public static function isJsonString($stringData)
	{
		if (empty($stringData)) return false;
		try {
			//校验json格式
			json_decode($stringData, true);
			return JSON_ERROR_NONE === json_last_error();
		} catch (\Exception $e) {
			return false;
		}
	}

	/**
	 * 保存数据
	 * @access public
	 * @param array $array 要保存或更新的数据
	 * @return integer 返回保存或更新的数据数量
	 */
	public static function save(array $array)
	{
		if (!file_exists(self::$jsonFile)) {
			return self::arrayFile($array);
		}
		$file = self::jsonFile();
		$update = 0;
		foreach ($array as $key => $value) {
			$update++;
			$file[$key] = $value;
		}
		self::arrayFile($file);
		self::$filterResult = false;
		return $update;
	}

	/**
	 * 查询多条数据
	 * @access public
	 * @return array
	 */
	public static function select()
	{
		$where = self::$filterResult ? self::$filterResult : self::jsonFile();
		self::$filterResult = false;
		if (empty($where)) {
			return [];
		}
		return $where;
	}

	/**
	 * 获取JSON格式的数据表
	 * @access public
	 * @param string $option 默认为空 值为id时返回包括ID的数组数据
	 * @return array|false
	 */
	public static function jsonFile()
	{
		if (!file_exists(self::$jsonFile)) {
			return [];
		}
		$data = file_get_contents(self::$jsonFile);
		$data = json_decode($data, true);
		return $data;
	}

	/**
	 * 将数组数据存储到JSON数据表中
	 * @access private
	 * @param array $array 要存储的数组数据
	 * @return int|false 成功则返回存储数据的总字节，失败则返回false
	 */
	private static function arrayFile(array $array)
	{
		$data = self::encode($array);
		if (!file_exists(self::$jsonFile)) {
			$dir = preg_replace('/\\[\w,\.]+$/', self::$jsonFile, '');
			print_r($dir);
			// mkdir(self::$jsonFile, 0755, true);
		}
		return file_put_contents(self::$jsonFile, $data);
	}

	/**
	 * 根据字段条件过滤数组中的元素
	 * @access public
	 * @param string $field_name 字段名
	 * @param mixed  $field_value 字段值
	 * @return self
	 */
	public static function where($field_name, $field_value = null)
	{
		$file = self::$filterResult ? self::$filterResult : self::jsonFile();
		if (!is_array($file)) {
			self::$filterResult = [];
			return self::class;
		}
		$data = [];
		foreach ($file as $key => $value) {
			if (@$value[$field_name] == $field_value) {
				$data[$key] = $file[$key];
			} else {
				unset($data[$key]);
			}
		}
		self::$filterResult = $data;
		return self::class;
	}

	public static function encode($data)
	{
		/**
		 * JSON_NUMERIC_CHECK 将所有数字字符串编码成数字
		 * JSON_PRETTY_PRINT 用空白字符格式化返回的数据
		 * JSON_UNESCAPED_UNICODE 以字面编码多字节 Unicode 字符（默认是编码成 \uXXXX）
		 * JSON_UNESCAPED_SLASHES 不要编码 /
		 */
		return json_encode($data, JSON_NUMERIC_CHECK | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
	}

	public static function decode($data, $type = true)
	{
		try {
			//校验json格式
			$decode = json_decode($data, $type);
			return json_last_error() === JSON_ERROR_NONE ? $decode : false;
		} catch (\Exception $e) {
			return false;
		}
	}

	public static function echo($data, $code = false)
	{
		if (is_numeric($code)) http_response_code($code);
		header('Content-type: application/json');
		if (APP_DEBUG) {
			// 获取所有已加载的文件列表
			$loaded_files = get_included_files();
			foreach ($loaded_files as $key => $value) {
				// 获取文件大小，单位为字节
				$file_size_bytes = filesize($value);
				// 将字节转换为 KB
				$file_size_kb = $file_size_bytes / 1024;
				// 保留两位小数
				$size = round($file_size_kb, 2);
				$loaded_files[$key] .= " ( $size KB )";
			}
			$DbLog = Db::getDbLog();
			// 获取当前时间
			$timestamp = date('Y-m-d H:i:s');
			// 获取 HTTP 请求方法
			$method = $_SERVER['REQUEST_METHOD'];
			// 获取请求的 URL
			$url = request('scheme') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
			// 获取 HTTP 协议版本
			$protocol = $_SERVER['SERVER_PROTOCOL'];

			// 模拟文件加载数量
			$file_loads = count($loaded_files);
			// 记录最终内存使用量
			$end_memory = memory_get_usage();
			// 计算内存消耗
			$memory_usage = $end_memory - $GLOBALS['start_memory'];
			// 将内存大小转换为 KB
			$memory_usage_kb = round($memory_usage / 1024, 2);
			// 获取脚本结束执行的时间戳
			$end_time = microtime(true);
			// 计算脚本运行时间
			$execution_time = $end_time - $GLOBALS['start_time'];
			// 计算吞吐率（假设每秒处理 1 个请求）
			$throughput = round(1 / $execution_time, 2);
			// $throughput = 0;
			// 精确到六位小数，可自行调节
			$execution_time = number_format($execution_time, 6, '.', '');

			$data['_trace_'] = [
				'基本' => [
					'请求信息' =>  "{$timestamp} {$protocol} {$method} : {$url}",
					'运行时间' => "{$execution_time}s [ 吞吐率：{$throughput}req/s ] 内存消耗：{$memory_usage_kb}kb 文件加载：{$file_loads}个",
					'查询信息' => count($DbLog) . ' queries',
					'缓存信息' => '0 reads,0 writes',
					'会话信息' => 'SESSION_ID=' . session_id()
				],
				'文件' => $loaded_files,
				'流程' => null,
				'错误' => null,
				'SQL' => $DbLog,
				'调试' => null
			];
		}
		echo self::encode($data);
		exit;
	}
}
