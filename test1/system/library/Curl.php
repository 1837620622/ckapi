<?php

/**
 * @package Curl
 * @author  易航
 * @version 2.0
 * @link    https://gitee.com/yh_IT/php_curl
 *
 **/

namespace system\library;

class Curl
{
	private $ch;

	/**
	 * 配置信息
	 * @return array
	 */
	private $options = [
		'request' => [
			'headers' => [
				'Accept: */*',
				'Accept-Encoding: gzip,deflate,sdch',
				'Accept-Language: zh-CN,zh;q=0.9,en;q=0.8,en-GB;q=0.7,en-US;q=0.6',
				'Connection: close',
				'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.5112.102 Safari/537.36 Edg/104.0.1293.70'
			],
			'params' => [],
			'cookie' => null,
			// 连接时间
			'connect_time' => 5,
			// 读取时间
			'read_time' => 10
		]
	];

	/**
	 * 请求成功后响应内容
	 * @access public
	 * @return array
	 */
	public $response = [];

	private function init()
	{
		curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($this->ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($this->ch, CURLOPT_ENCODING, "gzip");
		curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($this->ch, CURLOPT_HEADER, 1);
		curl_setopt($this->ch, CURLOPT_HTTPHEADER, $this->options['request']['headers']);  // 请求头
		curl_setopt($this->ch, CURLOPT_CONNECTTIMEOUT, $this->options['request']['connect_time']);  // 连接时间
		curl_setopt($this->ch, CURLOPT_TIMEOUT, $this->options['request']['read_time']); // 请求时间
	}

	/**
	 * 配置请求参数
	 * @access public
	 * @param array $options 要配置的CURL请求参数
	 * @return $this
	 */
	public function request($options)
	{
		$this->options['request'] = array_merge($this->options['request'], $options);
		return $this;
	}

	/**
	 * 配置请求头部参数
	 * @access public
	 * @param array $headers 要配置的请求头部参数
	 * @return $this
	 */
	public function headers($headers)
	{
		$this->options['request']['headers'] = array_merge($this->options['request']['headers'], $headers);
		return $this;
	}

	/**
	 * 配置请求参数
	 * @access public
	 * @param array $params 要配置的请求体参数
	 * @return $this
	 */
	public function params($params)
	{
		$this->options['request']['params'] = array_merge($this->options['request']['headers'], $params);
		return $this;
	}

	/**
	 * 配置请求参数
	 * @access public
	 * @param $name 参数名
	 * @param $value 参数值
	 * @return $this
	 */
	public function param($name, $value)
	{
		$this->options['request']['params'][$name] = $value;
		return $this;
	}

	/**
	 * GET请求
	 * @access public
	 * @param string $url 请求URL
	 * @return response
	 */
	public function get($url)
	{
		$this->ch = curl_init();
		if ($this->options['request']['params']) {
			$this->options['request']['params'] = http_build_query($this->options['request']['params']);
			$url = strstr($url, '?') ? trim($url, '&') . '&' .  $this->options['request']['params'] : $url . '?' .  $this->options['request']['params'];
		}
		return $this->sendRequest($url);
	}

	/**
	 * POST请求
	 * @access public
	 * @param string $url 请求URL
	 * @return response
	 */
	public function post($url)
	{
		$this->ch = curl_init();
		curl_setopt($this->ch, CURLOPT_POST, 1);
		curl_setopt($this->ch, CURLOPT_POSTFIELDS, $this->options['request']['params']);
		return $this->sendRequest($url);
	}

	/**
	 * 处理请求
	 * @access private
	 * @param string $url 请求URL
	 * @return response
	 */
	private function sendRequest($url)
	{
		$this->init();
		curl_setopt($this->ch, CURLOPT_URL, $url);
		$response_body = curl_exec($this->ch);
		$http_code = curl_getinfo($this->ch, CURLINFO_HTTP_CODE);
		$header_size = curl_getinfo($this->ch, CURLINFO_HEADER_SIZE);
		curl_close($this->ch);
		$header = substr($response_body, 0, $header_size);
		$headers = explode(PHP_EOL, $header);
		// 过滤数组值两边的空格
		$headers = array_map('trim', $headers);
		// 过滤数组中的空值
		$headers = array_filter($headers);
		$body = substr($response_body, $header_size);
		$response = [
			'body' => $body,
			'header' => $header,
			'headers' => $headers,
			'code' => $http_code
		];
		return new response($response);
	}
}

class response
{
	private $response;

	private $headers = null;

	public function __construct($response)
	{
		$this->response = $response;
	}

	/**
	 * 直接获取响应体内容
	 * @return string
	 */
	public function __toString()
	{
		return $this->response['body'];
	}

	/**
	 * 直接获取响应体内容
	 * @return string
	 */
	public function body()
	{
		return $this->response['body'];
	}

	/**
	 * 获取响应状态码
	 * @return integer
	 */
	public function code()
	{
		return trim($this->response['code']);
	}

	/**
	 * 获取指定响应头信息
	 * @access public
	 * @param $name 响应头名称
	 * @return string
	 */
	public function header($name)
	{
		$headers = $this->headers();
		$name = strtolower(trim($name));
		return isset($headers[$name]) ? $headers[$name] : null;
	}

	/**
	 * 获取数组形式的所有响应头信息
	 * @return array
	 */
	public function headers()
	{
		if (is_null($this->headers)) {
			$this->headers = $this->explodeHeaders($this->response['headers']);
		}
		return $this->headers;
	}

	/**
	 * 将获取到的JSON数据转换为PHP数组
	 * @access public
	 * @return array
	 */
	public function toArray()
	{
		return json_decode($this->response['body'], true);
	}

	/**
	 * 将获取到的JSON数据转换为PHP对象
	 * @access public
	 * @return object
	 */
	public function toObject()
	{
		return json_decode($this->response['body']);
	}

	private function explodeHeaders(array $headers)
	{
		$headers_array = [];
		$headers[] = 'data : :aa:bb: ';
		foreach ($headers as $value) {
			if (strpos($value, ':')) {
				$value = explode(':', $value, 2);
				$headers_array[strtolower(trim($value[0]))] = trim($value[1]);
			} else {
				$headers_array[] = $value;
			}
		}
		return $headers_array;
	}
}