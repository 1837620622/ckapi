<?php

use JsonDb\JsonDb\Db;

if (!defined('ROOT')) exit;

function theme_config(\system\theme\Form $form)
{
	$menu = $form->textarea(
		'导航栏链接',
		'menu',
		'主页 || http://www.bri6.cn || fa fa-home
博客 || http://bri6.cn || fa fa-feed
百度 || http://baidu.com || fa fa-link',
		'说明：添加自定义导航栏链接 <br />
		格式：跳转文字 || 跳转链接（中间使用两个竖杠分隔）<br />
		其他：一行一个，一行代表一个超链接 <br />
		例如：<br />
	   	百度一下 || https://baidu.com || 图标代码 <br />
	   	腾讯视频 || https://v.qq.com || 图标代码 <br />
		Fontawesome图标库：<a href="https://fontawesome.com.cn/v4/icons" target="_blank">https://fontawesome.com.cn/v4/icons</a>
		'
	);
	$form->create($menu);

	$menu_logo = $form->url('导航栏LOGO', 'menu_logo', null);
	$form->create($menu_logo);

	$index_banner = $form->url('首页banner图', 'index_banner', null, '首页上方的图片，可填写url和base64代码，不填写则使用主题默认内置图片');
	$form->create($index_banner);

	$notice = $form->textarea('站点公告', 'notice', '本站只是收录网站，无法确保网站的真实性，一切责任应该都由该站长负责，且与本站无关');
	$form->create($notice);

	$sponsor = $form->switcher('首页赞助商广告', 'sponsor', 1);
	$form->create($sponsor);

	$home_text_advert = $form->switcher('首页文字广告', 'home_text_advert', 0);
	$form->create($home_text_advert);

	$qqtz = $form->select('QQ防红', 'qqtz', [1 => '开启', 0 => '关闭'], 0, '开启后QQ内打开本站会引导用户使用浏览器打开站点');
	$form->create($qqtz);

	$stats_display = $form->switcher('底部用户数据统计', 'stats_display', 0);
	$form->create($stats_display);

	$apply = $form->select('申请收录功能', 'apply', [1 => '开启', 0 => '关闭'], 1);
	$form->create($apply);

	$apply_content = $form->textarea(
		'申请收录页面内容',
		'apply_content',
		"<div style=\"font-weight: bold;\">\n<h3 style=\"margin: 6px\">提交说明</h3>\n<p>1、贵站必须是正规网站，不收录有反动、色情、赌博等不良内容或提供不良内容链接的网站</p>\n<p>2、本站不收录在正常情况下无法正常连接或打开时间太长的网站</p>\n<p style=\"color:red;\">3、您需要将本站链接放置在您的网站中，如已放置提交后可自动通过审核</p>\n<p>4、本站会不定期检查所有网站，如发现收录的网站违背我们的收录标准，我们将删除链接</p>\n<p>5、代刷网、知识付费等一切盈利类网站请走文字广告、图片广告</p>\n<p>6、外链转内链的类型请不要申请</p>\n</div>"
	);
	$form->create($apply_content);

	$auto_apply = $form->select('自动审核收录', 'auto_apply', [1 => '开启', 0 => '关闭'], 1, '开启后可自动审核提交收录申请的站点，判断条件为对方站点首页是否添加本站链接');
	$form->create($auto_apply);

	$sort_select = Db::name('sort')->where('status', 1)->select();
	$sort_list = [0 => '关闭'];
	foreach ($sort_select as $key => $value) {
		$sort_list[$value['id']] = $value['title'];
	}
	$auto_collect_sort_id = $form->select('自动收录分类', 'auto_collect_sort_id', $sort_list, 0, '选择分类后开启自动检测来站并收录来源网站，对方站点添加本站链接后点击本站链接可自动收录');
	$form->create($auto_collect_sort_id);
	$auto_collect_excluded_domain = $form->textarea('自动收录排除站点', 'auto_collect_excluded_domain', "baidu.com || www.baidu.com || m.baidu.com || cn.bing.com", '请填写要排除的站点域名，||用来分隔');
	$form->create($auto_collect_excluded_domain);

	$click_time_order_site = $form->switcher('站点自动排名', 'click_time_order_site', 0, '自动按对方站点最新点入的时间来排名站点');
	$form->create($click_time_order_site);

	// $click_time_order_excluded_domain = $form->textarea('站点自动排名排除站点', 'click_time_order_excluded_domain', "baidu.com || www.baidu.com || m.baidu.com || cn.bing.com", '请填写要排除的站点域名，||用来分隔');
	// $form->create($click_time_order_excluded_domain);

	$email_notice = $form->select('站点提交通知', 'email_notice', [1 => '开启', 0 => '关闭'], 0, '开启后站点提交收录申请成功后将自动发送邮件通知到您的邮箱，邮箱配置请在 <a href="set.php?mod=options">系统配置</a> 处配置');
	$form->create($email_notice);

	$top_price = $form->text('置顶站点价格', 'top_price', '8.88');
	$form->create($top_price);

	$WeChat_QR_code = $form->url('微信二维码链接', 'WeChat_QR_code');
	$form->create($WeChat_QR_code);

	$qq = $form->number('客服QQ', 'qq', '2136118039');
	$form->create($qq);

	$qq_group = $form->number('QQ群号', 'qq_group', '733120686');
	$form->create($qq_group);

	$qq_group_url = $form->url('QQ群链接', 'qq_group_url', 'http://qm.qq.com/cgi-bin/qm/qr?_wv=1027&k=N_-INjJfxseKwadSIQqWXwiJ78BCqt1R&authKey=H%2Byk9IwEm29X1wQp1kiZBXW%2BVT1sgkf%2BD2r26pOxlO5Xikadjj63R6GzGISBAbs7&noverify=0&group_code=733120686');
	$form->create($qq_group_url);

	$email = $form->email('电子邮箱', 'email', '2136118039@qq.com');
	$form->create($email);

	$home_site_row_limit = $form->number('首页站点列表展示行数限制', 'home_site_row_limit', 0, '为1则限制只展示一行，以此类推，为0则不限制');
	$form->create($home_site_row_limit);
}

function sort_config(\system\theme\Fields $form)
{
	$form->input('分类图标', 'icon', null, 'text', '
	说明：请输入Fontawesome图标库的icon代码<br>
	例如：fa fa-bars<br>
	Fontawesome图标库：<a href="https://fontawesome.com.cn/v4/icons" target="_blank">https://fontawesome.com.cn/v4/icons</a>');
}

function site_config(\system\theme\Fields $form)
{
	$keywords = $form->text('站点关键词', 'keywords');
	$form->create($keywords);

	$description = $form->text('站点描述', 'description');
	$form->create($description);

	$star = $form->select('站点星级', 'star', [
		'auto' => '自动判断',
		0 => '0星',
		1 => '1星',
		2 => '2星',
		3 => '3星',
		4 => '4星',
		5 => '5星',
	], 'auto');
	$form->create($star);

	$love = $form->number('点赞数量', 'love', 0);
	$form->create($love);

	$day_view = $form->number('今日点击量', date('Y_m_d') . '_view', 0);
	$form->create($day_view);

	$month_view = $form->number('本月点击量', date('Y_m') . '_view', 0);
	$form->create($month_view);

	$total_view = $form->number('总共点击量', 'total_view', 0);
	$form->create($total_view);

	$favicon = $form->url('站点图标', 'favicon', null, '默认使用对方站点自带图标，填写后可自定义，请输入图标的url直链或base64代码');
	$form->create($favicon);

	$icp = $form->text('ICP备案号', 'icp');
	$form->create($icp);

	$qq = $form->number('站长QQ', 'qq');
	$form->create($qq);

	$top = $form->switcher('置顶站点', 'top');
	$form->create($top);

	if (system\theme\Manager::options()['click_time_order_site']) {
		$off_click_time_order_site = $form->switcher('关闭站点自动排名', 'off_click_time_order_site', 0, '单独为此站点关闭自动按对方站点最新点入的时间来排名站点的功能');
		$form->create($off_click_time_order_site);
	}

	$advert = $form->select('广告站点', 'advert', [
		'none' => '关闭',
		'index_text' => '首页文字广告',
		'index_top' => '首页网站赞助位',
		'index_header' => '首页上方',
		'index_footer' => '首页下方',
		'search_header' => '搜索页上方',
		'search_footer' => '搜索页下方',
		'ranking_day' => '日浏览榜下方',
		'ranking_month' => '月浏览榜下方',
		'ranking_total' => '总浏览榜下方',
		// 'search_header' => '搜索页上方',
	], 'none', '选择广告位置后自动放置链接');
	$form->create($advert);
}

if (defined('LOAD_THEME')) {
	/**
	 * 通过链接获取域名
	 */
	function getDomain($url)
	{
		preg_match("/^(?:http:\/\/|https:\/\/)?([^\/]+)/i", $url, $matches);
		return $matches[1];
	}

	/**
	 * 通过url获取站点标题、关键词、描述、图标、ICP备案号
	 * @return array|string
	 */
	function site_info($url, $options = ['icp' => true])
	{
		$url = trim(rtrim($url, '/'));
		if (empty($url)) return 'URL不能为空';
		// $request = \network\http\get($url, [], ['User-Agent' => 'Baiduspider']);
		$request = \network\http\get($url);
		if (empty($request->header('location'))) {
			$html = $request->body();
		} else {
			$url = $request->header('location');
			$html = \network\http\get($url)->body();
		}
		if (empty($html)) return '请求远程URL：' . $url . ' 失败';

		$encoding = mb_detect_encoding($html);
		if ($encoding != 'UTF-8') {
			$html = mb_convert_encoding($html, 'UTF-8', $encoding);
		}

		// 创建一个DOMDocument对象
		$dom = new DOMDocument();
		// 由于HTML可能不规范，使用@抑制警告
		@$dom->loadHTML($html);
		// 获取所有的 <a> 标签
		$links = $dom->getElementsByTagName('a');
		// 标记是否找到链接
		$this_site_link = false;
		// 遍历所有的 <a> 标签，检查 href 属性
		foreach ($links as $link) {
			// 确保 $link 是 DOMElement
			if ($link instanceof DOMElement) {
				if (stripos($link->getAttribute('href'), DOMAIN)) {
					$this_site_link = true;
					break;
				}
			}
		}

		$site_meta = getSiteMeta($html);

		// 标题
		$title = strip_tags($site_meta['title']);
		// 关键词
		$keywords = strip_tags($site_meta['keywords']);
		// 描述
		$description = strip_tags($site_meta['description']);
		// 图标
		$favicon = rtrim($url, '/') . '/favicon.ico';
		if (\network\http\get($favicon)->code() != 200) $favicon = '';
		// 备案号
		$icp = '';
		preg_match('/[京津冀晋蒙辽吉黑沪苏浙皖闽赣鲁豫鄂湘粤桂琼渝川蜀黔贵滇云藏陕秦甘陇青宁新]{1}ICP备\w+号[\-]?[\w]?/iu', $html, $matches);
		if (!empty($matches[0])) $icp = htmlentities(trim($matches[0]));
		if ($options['icp'] && empty($icp)) {
			$icp = icpQuery(getDomain($url));
		}

		if (empty($title) && empty($keywords) && empty($description) && empty($favicon) && empty($icp)) {
			return '获取失败';
		} else {
			return [
				'url' => $url,
				'title' => $title,
				'keywords' => $keywords,
				'description' => $description,
				'favicon' => $favicon,
				'icp' => $icp,
				'link' => $this_site_link
			];
		}
	}

	/**
	 * 获取指定站点meta信息
	 * @param $url 要获取信息的站点URL
	 */
	function getSiteMeta(string $data)
	{
		$meta = array();
		if (empty($data)) return;
		#Title
		preg_match('/<TITLE>([\w\W]*?)<\/TITLE>/si', $data, $matches);
		if (!empty($matches[1])) {
			$meta['title'] = $matches[1];
		} else {
			$meta['title'] = '';
		}

		#Keywords
		preg_match('/<meta\s+name="keywords"\s+content="([\w\W]*?)"/si', $data, $matches);
		if (empty($matches[1])) {
			preg_match("/<meta\s+name='keywords'\s+content='([\w\W]*?)'/si", $data, $matches);
		}
		if (empty($matches[1])) {
			preg_match('/<meta\s+content="([\w\W]*?)"\s+name="keywords"/si', $data, $matches);
		}
		if (empty($matches[1])) {
			preg_match('/<meta\s+http-equiv="keywords"\s+content="([\w\W]*?)"/si', $data, $matches);
		}
		if (!empty($matches[1])) {
			$meta['keywords'] = $matches[1];
		} else {
			$meta['keywords'] = '';
		}

		#Description
		preg_match('/<meta\s+name="description"\s+content="([\w\W]*?)"/si', $data, $matches);
		if (empty($matches[1])) {
			preg_match("/<meta\s+name='description'\s+content='([\w\W]*?)'/si", $data, $matches);
		}
		if (empty($matches[1])) {
			preg_match('/<meta\s+content="([\w\W]*?)"\s+name="description"/si', $data, $matches);
		}
		if (empty($matches[1])) {
			preg_match('/<meta\s+http-equiv="description"\s+content="([\w\W]*?)"/si', $data, $matches);
		}
		if (!empty($matches[1])) {
			$meta['description'] = $matches[1];
		} else {
			$meta['description'] = '';
		}

		return $meta;
	}

	function icpQuery(string $domain)
	{
		// 将 host 按 '.' 分割
		$domainParts = explode('.', $domain);
		// 获取顶级域名的部分
		$tld = array_slice($domainParts, -2); // 取最后两个部分
		$domain = implode('.', $tld); // 组合为顶级域名
		$request = \network\http\get(
			'https://api2.wer.plus/api/icpb',
			[
				't' => $domain,
				'key' => 'xGvtF1IbHf2l0BhPImhR1nm4NdPohNwY'
			],
			[
				'origin' => 'https://hg-ha.github.io',
				'priority' => 'u=1, i',
				'referer' => 'https://hg-ha.github.io/'
			]
		);
		$data = $request->toArray();
		if (!is_array($data)) return null;
		if ($data['code'] == 200) {
			$data_list = $data['data']['list'][0];
			$icp = empty($data_list['serviceLicence']) ? $data_list['mainLicence'] : $data_list['serviceLicence'];
			return $icp;
		}
		return null;
	}

	function getAdverts($position)
	{
		$adverts = theme_method()->getSites(null, ['advert' => $position]);
		return $adverts;
	}

	/**
	 * 获取当前访问的real url
	 */
	function getRealUrl()
	{
		static $realUrl = NULL;
		if ($realUrl !== NULL) {
			return $realUrl;
		}
		$path = trim(OZDAO_ROOT, '/') . DIRECTORY_SEPARATOR;
		$scriptPath = pathinfo($_SERVER['SCRIPT_NAME'], PATHINFO_DIRNAME);
		$scriptPath = str_replace('\\', '/', $scriptPath);
		$pathElement = explode('/', $scriptPath);
		$thisMatch = '';
		$bestMatch = '';
		$currentDeep = 0;
		$maxDeep = count($pathElement);
		while ($currentDeep < $maxDeep) {
			$thisMatch = $thisMatch . $pathElement[$currentDeep] . DIRECTORY_SEPARATOR;
			if (substr($path, strlen($thisMatch) * (-1)) === $thisMatch) {
				$bestMatch = $thisMatch;
			}
			$currentDeep++;
		}
		$bestMatch = str_replace(DIRECTORY_SEPARATOR, '/', $bestMatch);
		$realUrl = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
		$realUrl .= $_SERVER['HTTP_HOST'];
		$realUrl .= $bestMatch;
		return $realUrl;
	}

	//输出分类
	function echoSorts($sorts, $isMove = false)
	{
		foreach ($sorts as $sort) { ?>
			<li>
				<a class="<?= $isMove ? 'move' : ''; ?>" href="<?= $isMove ? ('#' . $sort['name']) : $sort['url']; ?>">
					<i class="<?= $sort['icon']; ?> fa-fw" aria-hidden="true"></i> <?= $sort['name']; ?>
				</a>
			</li>
		<?php
		}
	}

	//转换数字，大于10000显示两位小数的万
	function convertNum($num)
	{
		return $num >= 10000 ? round($num / 10000, 2) . '万' : $num;
	}

	//获取星级
	function getStarNum($view)
	{
		$view = $view / 10;
		return $view >= 50 ? 5 : floor($view / 10);
	}

	//获取文章中图片链接
	function getPostPic($content)
	{
		preg_match('/<img[^<>]*?\ssrc=[\'\"]?([^\'"]+)[\'\"]?\\s.*?>/i', $content, $matches);
		$pic = $matches[1];
		return empty($pic) ? TEMPLATE_URL . 'images/default.jpg' : $pic;
	}


	//面包屑导航
	function echoBoard($text, $sort = null)
	{
		$boardHtml = '<a href="/">导航首页</a>&nbsp;»&nbsp;';
		if ($sort == null) {
			$boardHtml .= '<span>' . $text . '</span>';
		} else {
			$boardHtml .= '<a href="' . theme_method()->buildUrl('sort/' . $sort->id) . '">' . $sort->title . '</a>&nbsp;»&nbsp;' . '<span>' . $text . '</span>';
		}
		echo $boardHtml;
	}


	//输出侧边分类
	function echoSideSorts($sorts, $id = null)
	{
		foreach ($sorts as $sort) { ?>
			<li>
				<a href="<?= $id ? $sort->url : '#' . $sort->title; ?>" class="<?= $id ? ($id == $sort->id ? 'active' : '') : 'move'; ?>">
					<span><?= $sort->title; ?></span> <i class="<?= $sort->fields->icon ?? null; ?> fa-fw"></i>
				</a>
			</li>
		<?php
		}
	}

	//输出站点
	function echoSites($sites, $isTop = false, $isSide = false)
	{
		foreach ($sites as $site) {
			echoSite($site, $isTop, $isSide);
		}
	}

	function echoSite($site, $isTop = false, $isSide = false)
	{
		if (empty($site->fields->favicon)) {
			$parse_url = parse_url($site->url);
			$site->fields->favicon = $parse_url['scheme'] . '://' . $parse_url['host'] . '/favicon.ico';
		}
		?>
		<a href="<?= theme_method()->buildUrl('site/' . $site->id) ?>" title="<?= strip_tags($site->title) ?>" alt="<?= strip_tags($site->title) ?>" class="site-item <?= $isTop ? 'top' : ''; ?> <?= $isSide ? ' side' : ''; ?>">
			<span class="icon">
				<img class="lazy-load" src="<?= theme_method()->themeUrl('assets/images/loading.gif') ?>" data-src="<?= $site->fields->favicon ?>" alt="">
			</span>
			<span class="name"><?= $site->title; ?></span>
		</a>
		<?php
		if (!spider_detection()) {
		?>
			<textarea style="display: none;">
			<a href="<?= $site->url ?>" rel="nofollow" target="_blank"><?= $site->title ?></a>
		</textarea>
		<?php
		}
		?>
		<?php
	}


	//输出文章
	function echoPosts($posts, $isSide = false, $isRanking = false)
	{
		foreach ($posts as $key => $post) { ?>
			<a href="<?= $post['url']; ?>" target="_blank" class="post-item <?= $isSide ? 'side' : '';
																			echo $isRanking ? ' ranking' : ''; ?>">
				<?php if ($isRanking) { ?>
					<span class="rank"><?= $key + 1; ?></span>
				<?php } ?>
				<div class="pic">
					<img class="lazy-load" src="<?= IMAGES_URL; ?>loading.gif" data-src="<?= getPostPic($post['content']); ?>" alt="">
				</div>
				<div class="text">
					<div class="title"><?= $post['title']; ?></div>
					<div class="info">
						<span><i class="fa fa-eye fa-fw"></i><?= $post['view']; ?></span>
						<span><i class="fa fa-clock-o fa-fw"></i><?= date('Y-m-d', $post['time']); ?></span>
					</div>
				</div>
			</a>
		<?php
		}
	}

	/**
	 * 获取最新收录站点
	 */
	function getLatestSites($number = 10, $startNum = 0)
	{
		$site_list = theme_method()->getSites(null, [], false);
		$site_list = array_time_order('create_time', $site_list);
		$site_list = array_slice($site_list, $startNum, $number);
		return $site_list;
	}

	/**
	 * 二维数组根据指定字段进行时间排序
	 * @access public
	 * @param string $field_name 字段名
	 * @param array $array 要进行排序的数组数据
	 * @param string $order 排序方式：'asc' => 按升序排列, 'desc' => 按降序排列
	 * @return array
	 */
	function array_time_order($field_name, array $array, $order = 'desc')
	{
		$order = strtolower($order);
		if (!in_array($order, ['asc', 'desc'])) {
			throw new InvalidArgumentException("排序方式必须是 'asc' 或 'desc'");
		}
		usort($array, function ($a, $b) use ($field_name, $order) {
			if (!isset($a[$field_name]) || !isset($b[$field_name])) {
				throw new InvalidArgumentException("数组元素中缺少字段 '{$field_name}'");
			}
			return $order === 'asc' ? strtotime($a[$field_name]) - strtotime($b[$field_name]) : strtotime($b[$field_name]) - strtotime($a[$field_name]);
		});
		return $array;
	}


	// 获取站点排行榜单 type=day日榜单  type=month 月榜单  type=total总榜单
	function site_ranking($type = 'total', $number = 10, $startNum = 0, $sort_id = null)
	{
		if ($type == 'day') {
			$type = date('Y_m_d');
		}
		if ($type == 'month') {
			$type = date('Y_m');
		}
		$site_list = theme_method()->getSites($sort_id, [], false);
		foreach ($site_list as $key => $value) {
			$site_list[$key][$type . '_view'] = $value['fields'][$type . '_view'] ?? 0;
			$site_list[$key]['fields'] = (object) $value['fields'];
		}
		$site_list = array_order($type . '_view', $site_list);
		$site_list = array_slice($site_list, $startNum, $number);
		return array_to_object($site_list);
	}

	/**
	 * 二维数组根据指定字段排序
	 * @access public
	 * @param string $field_name 字段名
	 * @param array $array 要进行排序的数组数据
	 * @param $order 排序方式：['asc' => 按升序排列,'desc' => 按降序排列]
	 * @return array
	 */
	function array_order($field_name, array $array, $order = 'desc')
	{
		$order_list = [
			'asc' => SORT_ASC,
			'desc' => SORT_DESC
		];
		$order_this = $order_list[$order] ? $order_list[$order] : $order;
		$file = $array;
		$column = array_column($file, $field_name);
		array_multisort($column, $order_this, $file);
		return $file;
	}


	//输出浏览榜单
	function echoSiteRanking($sites, $type)
	{
		if ($type == 'day') {
			$type = date('Y_m_d');
		}
		if ($type == 'month') {
			$type = date('Y_m');
		}
		foreach ($sites as $key => $site) {
			if (empty($site->fields->favicon)) {
				$parse_url = parse_url($site->url);
				$site->fields->favicon = $parse_url['scheme'] . '://' . $parse_url['host'] . '/favicon.ico';
			}
			$fields = (array) $site->fields;
			$view = $fields[$type . '_view']  ?? 0;
			// $view = 0;
		?>
			<a href="<?= theme_method()->buildUrl('site/' . $site->id) ?>" class="site-ranking">
				<span class="rank"><?= $key + 1; ?></span>
				<span class="icon">
					<img class="lazy-load" src="<?= IMAGES_URL; ?>loading.gif" data-src="<?= $site->fields->favicon; ?>" alt="">
				</span>
				<span class="name"><?= $site->title; ?></span>
				<span class="view"><?= convertNum($view); ?></span>
			</a>
		<?php
		}
	}


	//输出侧栏最新收录
	function echoLatestSites($sites)
	{
		foreach ($sites as $site) {
			if (empty($site['fields']['favicon'])) {
				$parse_url = parse_url($site['url']);
				$site['fields']['favicon'] = $parse_url['scheme'] . '://' . $parse_url['host'] . '/favicon.ico';
			}
		?>
			<a href="<?= theme_method()->buildUrl('site/' . $site['id']) ?>" class="oz-timeline-item">
				<div class="oz-timeline-time"><?= $site['create_time'] ?></div>
				<div class="oz-timeline-main">
					<span class="icon">
						<img class="lazy-load" src="<?= IMAGES_URL; ?>loading.gif" data-src="<?= $site['fields']['favicon']; ?>" alt="">
					</span>
					<span class="name"><?= $site['title'] ?></span>
				</div>
			</a>
		<?php }
	}


	//输出侧栏所有文章分类
	function echoPostSorts($sorts, $sortId = null)
	{
		foreach ($sorts as $sort) { ?>
			<a href="<?= $sort['url']; ?>" class="side-sort <?= $sortId == $sort['id'] ? 'active' : ''; ?>">
				<i class="<?= $sort['icon']; ?> fa-fw"></i><?= $sort['name']; ?>
			</a>
		<?php
		}
	}


	//输出友情链接
	function echoLinks($links)
	{
		foreach ($links as $link) {
		?>
			<a href="<?= $link->url; ?>" rel="<?= $link->rel ?>" target="_blank" class="link-item"><?= $link->title; ?></a>
		<?php
		}
	}


	//广告
	function echoAd($ad)
	{
		if (!$ad) {
			return;
		}
		if (empty($ad->fields->favicon)) {
			$parse_url = parse_url($ad->url);
			$ad->fields->favicon = $parse_url['scheme'] . '://' . $parse_url['host'] . '/favicon.ico';
		}
		?>
		<div class="card">
			<a class="ad" href="<?= $ad->url; ?>" target="_blank">
				<img src="<?= $ad->fields->favicon; ?>" alt="">
			</a>
		</div>
<?php
	}

	function two_array_unique($field, $array)
	{
		$result = array();
		foreach ($array as $k => $val) {
			$code = false;
			foreach ($result as $_val) {
				if ($_val[$field] == $val[$field]) {
					$code = true;
					break;
				}
			}
			if (!$code) {
				$result[] = $val;
			}
		}
		return $result;
	}

	//获取今日总浏览站点数
	function day_view_site()
	{
		$data = day_view();
		$data = two_array_unique('site_id', $data);
		return count($data);
		// $DB = Db::name('site_log')->where('type', 'browse')->whereDay('create_time')->distinct(true)->field('site_id');
		// return count($DB->select());
	}

	//获取今日总浏览站点数
	function month_view_site()
	{
		$data = month_view();
		$data = two_array_unique('site_id', $data);
		return count($data);
		// $DB = Db::name('site_log')->where('type', 'browse')->whereMonth('create_time')->distinct(true)->field('site_id');
		// return count($DB->select());
	}

	function total_view_site()
	{
		$data = total_view();
		$data = two_array_unique('site_id', $data);
		return count($data);
		// $DB = Db::name('site_log')->where('type', 'browse')->distinct(true)->field('site_id');
		// return count($DB->select());
	}

	//获取今日总浏览数
	function day_view($site_id = null)
	{
		if ($site_id) {
			$site = theme_method()->getSite($site_id, false);
			return $site['fields'][date('Y_m_d') . '_view'] ?? 0;
		} else {
			$site_list = theme_method()->getSites(null, [], false);
			$count = 0;
			$site = 0;
			foreach ($site_list as $key => $value) {
				$view = $value['fields'][date('Y_m_d') . '_view'] ?? 0;
				if ($view > 0) {
					$site++;
					$count += $view;
				}
			}
			return [
				'site' => $site,
				'view' => $count,
			];
		}
	}

	//获取本月总浏览数
	function month_view($site_id = null)
	{
		if ($site_id) {
			$site = theme_method()->getSite($site_id, false);
			return $site['fields'][date('Y_m') . '_view'] ?? 0;
		} else {
			$site_list = theme_method()->getSites(null, [], false);
			$count = 0;
			$site = 0;
			foreach ($site_list as $key => $value) {
				$view = $value['fields'][date('Y_m') . '_view'] ?? 0;
				if ($view > 0) {
					$site++;
					$count += $view;
				}
			}
			return [
				'site' => $site,
				'view' => $count,
			];
		}
	}

	//获取总共总浏览数
	function total_view($site_id = null)
	{
		if ($site_id) {
			$site = theme_method()->getSite($site_id, false);
			return $site['fields']['total_view'] ?? 0;
		} else {
			$site_list = theme_method()->getSites(null, [], false);
			$count = 0;
			$site = 0;
			foreach ($site_list as $key => $value) {
				$view = $value['fields']['total_view'] ?? 0;
				if ($view > 0) {
					$site++;
					$count += $view;
				}
			}
			return [
				'site' => $site,
				'view' => $count,
			];
		}
	}


	//输出侧栏热度统计
	function echoStatistics()
	{
		// halt(day_view());
		$daySite = site_ranking('day', 1)[0];
		$monthSite = site_ranking('month', 1)[0];
		$totalSite = site_ranking('total', 1)[0];
		echo '<p>今日有 ' . day_view()['site'] . ' 个站点被点击 ' . convertNum(day_view()['view']) . ' 次</p>
		<p>今日最受欢迎的站点是：<a href="' . theme_method()->buildUrl('site/' . $daySite->id) . '">' . $daySite->title . '</a></p>
		<p>本月有 ' . month_view()['site'] . ' 个站点被点击 ' . convertNum(month_view()['view']) . ' 次</p>
		<p>本月最受欢迎的站点是：<a href="' . theme_method()->buildUrl('site/' . $monthSite->id) . '">' . $monthSite->title . '</a></p>
		<p>累计有 ' . total_view()['site'] . ' 个站点被点击 ' . convertNum(total_view()['view']) . ' 次</p>
		<p>总共最受欢迎的站点是：<a href="' . theme_method()->buildUrl('site/' . $totalSite->id) . '">' . $totalSite->title . '</a></p>';
	}

	//分页
	function echoPaging($totalNum, $nowPage, $pageSize)
	{
		$pageSize = $pageSize ? $pageSize : $totalNum;
		if ($totalNum == 0 || $pageSize == 0) {
			echo '';
		} else {
			$query = preg_replace('/(&*page=[^&]*)*/', '', $_SERVER['QUERY_STRING']);
			$url = '?' . ltrim($query, '&') . (!empty($query) ? '&' : '') . 'page=';
			$totalPage = ceil($totalNum / $pageSize);
			$html = '';
			if ($totalPage > 1) {
				$first = 1;
				$prev = $nowPage - 1;
				$next = $nowPage + 1;
				$last = $totalPage;
				$html .= '<div class="card"><ul class="pagination">';
				if ($nowPage < 6) {
					for ($i = 1; $i <= $totalPage; $i++) {
						if ($nowPage <= 6) {
							if ($i > 6)
								continue;
						}
						if ($nowPage == $i) {
							$html .= '<li class="disabled active"><a>' . $nowPage . '</a></li>';
						} else {
							$html .= '<li><a href="' . $url . $i . '">' . $i . '</a></li>';
						}
					}
					if ($totalPage > 6) {
						$html .= '<li class="disabled"><a>...</a></li>';
						$html .= '<li><a href="' . $url . $last . '">' . $last . '</a></li>';
					}
				} elseif ($nowPage >= 6 && $nowPage <= $totalPage - 5) {
					$html .= '<li><a href="' . $url . $first . '">' . $first . '</a></li><li class="disabled"><a>...</a></li>';
					for ($i = $prev - 1; $i <= $next + 1; $i++) {
						if ($nowPage == $i) {
							$html .= '<li class="disabled active"><a>' . $nowPage . '</a></li>';
						} else {
							$html .= '<li><a href="' . $url . $i . '">' . $i . '</a></li>';
						}
					}
					if ($totalPage > 6) {
						$html .= '<li class="disabled"><a>...</a></li><li><a href="' . $url . $last . '">' . $last . '</a></li>';
					}
				} elseif ($nowPage > $totalPage - 5) {
					if ($totalPage > 6) {
						$html .= '<li><a href="' . $url . $first . '">' . $first . '</a></li><li class="disabled"><a>...</a></li>';
					}
					for ($i = 1; $i <= $totalPage; $i++) {
						if ($nowPage >= $totalPage - 6) {
							if ($i <= $totalPage - 6)
								continue;
						}
						if ($nowPage == $i) {
							$html .= '<li class="disabled active"><a>' . $nowPage . '</a></li>';
						} else {
							$html .= '<li><a href="' . $url . $i . '">' . $i . '</a></li>';
						}
					}
				}
				$html .= '</ul></div>';
			}
			echo $html;
		}
	}

	function spider_detection()
	{
		if (empty($_SERVER['HTTP_USER_AGENT'])) $_SERVER['HTTP_USER_AGENT'] = '';
		if (strpos($_SERVER['HTTP_USER_AGENT'], 'Baiduspider') !== false || strpos($_SERVER['HTTP_USER_AGENT'], '360Spider') !== false || strpos($_SERVER['HTTP_USER_AGENT'], 'YisouSpider') !== false || strpos($_SERVER['HTTP_USER_AGENT'], 'Sogou web spider') !== false || strpos($_SERVER['HTTP_USER_AGENT'], 'Sogou inst spider') !== false || strpos($_SERVER['HTTP_USER_AGENT'], 'Googlebot/') !== false || strpos($_SERVER['HTTP_USER_AGENT'], 'bingbot/') !== false || strpos($_SERVER['HTTP_USER_AGENT'], 'Bytespider') !== false) {
			return true;
		}
	}

	function removeProtocol($url)
	{
		$parsedUrl = parse_url($url);
		return substr($url, strlen($parsedUrl['scheme'] . '://'));
	}

	function visits_data($date)
	{
		if (!isset($GLOBALS['stats_' . $date])) {
			$GLOBALS['stats_' . $date] = $stats = Db::name('stats')->where('date', $date)->select();
		}
		$stats = $GLOBALS['stats_' . $date];
		$visits = 0;
		foreach ($stats as $key => $value) {
			$visits += $value['visits'];
		}
		return $visits;
	}

	function ip_data($date)
	{
		if (!isset($GLOBALS['stats_' . $date])) {
			$GLOBALS['stats_' . $date] = $stats = Db::name('stats')->where('date', $date)->select();
		}
		$stats = $GLOBALS['stats_' . $date];
		$ip_data = [];
		foreach ($stats as $key => $value) {
			$ip_data[] = trim($value['ip']);
		}
		$ip_data = array_unique($ip_data);
		return count($ip_data);
	}
}
