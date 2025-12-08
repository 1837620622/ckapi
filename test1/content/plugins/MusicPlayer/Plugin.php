<?php

namespace content\plugins\MusicPlayer;

use system\library\Json;
use system\library\Route;

/**
 * 支持播放各大平台音乐
 *
 * @package 音乐播放器
 * @author 易航
 * @version 1.1
 * @link http://bri6.cn
 */
class Plugin
{

	public static $options;

	public static function route()
	{
		// 注册音乐路由
		Route::rule('/meting/{server:\w+}/{type:\w+}/{id}', function ($param) {
			self::api($param);
		});
	}

	public static function config(\system\plugin\Form $form)
	{
		$api = $form->url('自定义音乐解析API接口', 'api', null, '不填写则使用系统内置解析器，例如<br>https://api.i-meto.com/meting/api?server=:server&type=:type&id=:id&r=:r<br>https://api.injahow.cn/meting/?server=:server&type=:type&id=:id&r=:r');
		$form->create($api);

		$cookie = $form->textarea('Cookie', 'cookie', null, '介绍：登录音乐平台后的Cookie，需要自己抓包获取，如果使用系统内置解析器则必填，不然歌单列表只能获取到前十首，如果您有此平台的会员，那么填写上您账号的Cookie就可以解析会员音乐', ['rows' => 2]);
		$form->create($cookie);

		$server = $form->select('音乐平台', 'server', [
			'netease' => '网易云音乐（默认）',
			'tencent' => 'QQ音乐',
			'kugou' => '酷狗音乐',
			'xiami' => '虾米音乐',
			'baidu' => '百度音乐'
		], 'netease');
		$form->create($server);

		$type = $form->select('音乐类型', 'type', [
			'playlist' => '歌单（默认）',
			'song' => '单曲',
			'album' => '专辑',
			'search' => '搜索结果',
			'artist' => '艺术家'
		], 'playlist');
		$form->create($type);

		$id = $form->input('ID', 'id', '7757541927', 'text', '音乐类型指向的ID，一般可以在网页版地址栏中找到，酷狗音乐的歌单ID是specialId，例如：collection_3_1240782090_2_0', ['required' => true]);
		$form->create($id);

		$volume = $form->input('默认音量', 'volume', '0.3', 'text', '单位为1-0，例如：0.3', ['required' => true]);
		$form->create($volume);

		$autoplay = $form->select('自动播放', 'autoplay', [
			'1' => '开启（默认）',
			'0' => '关闭'
		], '1', '音乐数据加载完毕后自动播放，部分浏览器已禁用自动播放声音策略');
		$form->create($autoplay);

		$order = $form->select('播放顺序', 'order', ['list' => '默认排序（默认）', 'random' => '随机播放'], 'list');
		$form->create($order);

		return $form;
	}

	public static function footer()
	{
?>
		<script>
			window.meting_api = '<?= empty(self::$options->api) ? url('/meting/:server/:type/:id') : self::$options->api ?>'
		</script>
		<?php
		$meting = element('meting-js');
		$meting->attr([
			'fixed' => 'true',
			'preload' => 'metadata',
			'mutex' => 'true',
			'volume' => self::$options->volume,
			'autotheme' => 'true',
			'storage' => 'true',
			'order' => self::$options->order,
			'server' => self::$options->server,
			'type' => self::$options->type,
			'id' => self::$options->id
		]);
		self::$options->autoplay ?? $meting->attr('autoplay', 'autoplay');
		echo $meting->get();
		?>
		<style>
			.aplayer>.aplayer-body>.aplayer-info>.aplayer-music>.aplayer-title,
			.aplayer>.aplayer-list>ol>li>.aplayer-list-title {
				color: #000;
			}

			.aplayer.aplayer-fixed {
				z-index: 9999 !important;
			}
		</style>
		<link href="<?= cdn('aplayer/1.10.1/APlayer.min.css') ?>" rel="stylesheet">
		<script src="<?= cdn('color-thief/2.3.2/color-thief.min.js') ?>"></script>
		<script src="<?= cdn('aplayer/1.10.1/APlayer.min.js') ?>"></script>
		<script src="/content/plugins/MusicPlayer/assets/js/MusicPlayer.js"></script>
		<script src="/content/plugins/MusicPlayer/assets/js/Meting.js"></script>
<?php
	}

	public static function api($param)
	{
		$extension = ['bcmath', 'curl', 'openssl'];
		foreach ($extension as  $value) {
			if (!extension_loaded($value)) {
				Json::echo([
					'code' => 501,
					'message' => '请开启 PHP 的 ' . $value . ' 扩展！'
				]);
			}
		}
		if (empty($param['server']) || empty($param['type']) || empty($param['id'])) {
			http_response_code(404);
			exit;
		}
		$api = new Meting($param['server']);
		$type = $param['type'];
		if ($type == 'playlist') {
			if ($param['server'] == 'kugou') {
				$kugou_get = \network\http\get('https://api.cenguigui.cn/api/kugou/api.php', ['id' => $param['id'], 'limit' => '999', 'type' => 'playlist'])->toArray();
				if (is_array($kugou_get) && $kugou_get['code'] == 200) {
					$data = $kugou_get['data'];
					$base_url = '/meting';
					foreach ($data as $key => $value) {
						unset($data[$key]);
						$data[$key]['author'] = is_array($value['artist']) ? implode(' / ', $value['artist']) : $value['artist'];
						$data[$key]['title'] = $value['name'];
						$data[$key]['url'] = $base_url . '/' . $param['server'] . '/url/' . $value['hash'];
						$data[$key]['pic'] = $value['pic'];
						$data[$key]['lrc'] = $base_url . '/' . $param['server'] . '/lrc/' . $value['hash'];
					}
				}
			} else {
				$data = $api->format(true)->cookie(self::$options->cookie)->playlist($param['id']);
				$data = json_decode($data, true);
				$base_url = '/meting';
				foreach ($data as $key => $value) {
					unset($data[$key]);
					$data[$key]['author'] = is_array($value['artist']) ? implode(' / ', $value['artist']) : $value['artist'];
					$data[$key]['title'] = $value['name'];
					$data[$key]['url'] = $base_url . '/' . $param['server'] . '/url/' . $value['url_id'];
					$data[$key]['pic'] = $base_url . '/' . $param['server'] . '/pic/' . $value['pic_id'];
					$data[$key]['lrc'] = $base_url . '/' . $param['server'] . '/lrc/' . $value['lyric_id'];
				}
			}
			// 设置 HTTP 头部，让页面缓存 3 分钟
			header('Cache-Control: public, max-age=180');
			header_remove('Pragma');
			header_remove('Expires');
			Json::echo($data);
		}
		if ($type == 'url') {
			if ($param['server'] == 'kugou') {
				$data = \network\http\get('https://www.hhlqilongzhu.cn/api/dg_kugouSQ.php?type=json&quality=flac', ['hash' => $param['id']])->toArray();
				if (!empty($data['music_url'])) {
					$data['url'] = $data['music_url'];
				} else {
					$data = json_decode($api->format(true)->cookie(self::$options->cookie)->url($param['id']), true);
				}
			} else {
				$data = json_decode($api->format(true)->cookie(self::$options->cookie)->url($param['id']), true);
			}
			if (empty($data['url'])) {
				http_response_code(501);
				exit;
			}
			$url = $data['url'];
			http_response_code(302);
			header("Location: $url");
			exit;
		}
		if ($type == 'pic') {
			$data = json_decode($api->format(true)->cookie(self::$options->cookie)->pic($param['id']), true);
			$url = $data['url'];
			http_response_code(302);
			header("Location: $url");
			exit;
		}
		if ($type == 'lrc') {
			$data = json_decode($api->format(true)->cookie(self::$options->cookie)->lyric($param['id']), true);
			// 设置 HTTP 头部，让页面缓存 180 天
			header('Cache-Control: public, max-age='. (180 * 24 * 60 * 60));
			header_remove('Pragma');
			header_remove('Expires');
			header("Content-Type: text/plain; charset=utf-8");
			if (empty($data['tlyric'])) {
				echo $data['lyric'];
			} else {
				echo $data['tlyric'];
			}
			exit;
		}
		if ($type == 'song') {
			$data = $api->format(true)->cookie(self::$options->cookie)->song($param['id']);
			$data = array_shift(json_decode($data, true));
			$data['author'] = is_array($data['artist']) ? implode(' / ', $data['artist']) : $data['artist'];
			$data['title'] = $data['name'];
			$base_url = '/meting';
			$data['url'] = $base_url . '/' . $param['server'] . '/url/' . $data['url_id'];
			$data['pic'] = $base_url . '/' . $param['server'] . '/pic/' . $data['pic_id'];
			$data['lrc'] = $base_url . '/' . $param['server'] . '/lrc/' . $data['lyric_id'];
			Json::echo([$data]);
		}
	}
}
