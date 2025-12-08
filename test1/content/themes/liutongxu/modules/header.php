<div class="big-header-banner">
	<div id="header" class="page-header sticky">
		<div class="navbar navbar-expand-md">
			<div class="container-fluid p-0"> <a href="" class="navbar-brand d-md-none" title="<?= $this->site->title ?>">
					<img src="assets/images/ywdh-logo-bark-ico.png" class="logo-light" alt="<?= $this->site->title ?>">
					<img src="assets/images/ywdh-logo-ico.png" class="logo-dark d-none" alt="<?= $this->site->title ?>">
				</a>
				<div class="collapse navbar-collapse order-2 order-md-1">
					<div class="header-mini-btn">
						<label>
							<input id="mini-button" type="checkbox">
							<svg viewbox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
								<path class="line--1" d="M0 40h62c18 0 18-20-17 5L31 55"></path>
								<path class="line--2" d="M0 50h80"></path>
								<path class="line--3" d="M0 60h62c18 0 18 20-17-5L31 45"></path>
							</svg>
						</label>
					</div>
					<ul class="navbar-nav site-menu" style="margin-right: 16px;">

						<li id="menu-item-281" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-281">
							<a href="/"><i class="iconfont icon-zhuye1 fa-lg mr-2"></i><span>首页</span></a>
						</li>
						<li id="menu-item-283" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-284">
							<a href="<?= $this->buildUrl('contribute') ?>">
								<i class="iconfont icon-rizhi fa-lg mr-2"></i>
								<span>网站提交</span></a>
						</li>
						<li id="menu-item-284" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-284">
							<a href="<?= $this->buildUrl('about') ?>">
								<i class="iconfont icon-guanyu fa-lg mr-2"></i>
								<span>关于本站</span></a>
						</li>
						<?php
						$nav_menu = $this->optionMulti('menu');
						foreach ($nav_menu as $key => $value) {
							if (empty($value[0]) || empty($value[1])) continue;
							$id =  $key + 1;
						?>
							<li id="menu-item-<?= $id + 1 ?>" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-<?= $id + 1 ?>">
								<a href="<?= $value[1] ?>">
									<?= empty($value[2]) ? null : '<i class="iconfont ' . $value[2] . ' fa-lg mr-2"></i>' ?>
									<span><?= $value[0] ?></span></a>
							</li>
						<?php
						}
						?>
					</ul>
					<div class="rounded-circle weather">
						<div id="he-plugin-simple" style="display: contents;"></div>
						<script>
							WIDGET = {
								CONFIG: {
									"modules": "12034",
									"background": 5,
									"tmpColor": "E4C600",
									"tmpSize": 14,
									"cityColor": "E4C600",
									"citySize": 14,
									"aqiColor": "#E4C600",
									"aqiSize": 14,
									"weatherIconSize": 24,
									"alertIconSize": 18,
									"padding": "10px 10px 10px 10px",
									"shadow": "1",
									"language": "auto",
									"borderRadius": 5,
									"fixed": "false",
									"vertical": "middle",
									"horizontal": "left",
									"key": "e05c4ce44b7e43c6a9303e68cc42a48c"
								}
							}
						</script>
						<script src="https://widget.qweather.net/simple/static/js/he-simple-common.js?v=2.0"></script>
					</div>
				</div>
				<ul class="nav navbar-menu text-xs order-1 order-md-2">
					<!-- 一言 -->
					<li class="nav-item mr-3 mr-lg-0 d-none d-lg-block">
						<script>
							fetch('https://v1.hitokoto.cn')
								.then(response => response.json())
								.then(data => {
									const hitokoto = document.getElementById('hitokoto_text')
									hitokoto.href = 'https://hitokoto.cn/?uuid=' + data.uuid
									hitokoto.innerText = data.hitokoto
								})
								.catch(console.error)
						</script>
						<div id="hitokoto"><a href="#" target="_blank" id="hitokoto_text">我爱你，洛千婷</a></div>
					</li>
					<!-- 一言 end -->
					<li class="nav-search ml-3 ml-md-4">
						<a href="javascript:" data-toggle="modal" data-target="#search-modal"><i class="iconfont icon-search icon-2x"></i></a>
					</li>
					<li class="nav-item d-md-none mobile-menu ml-3 ml-md-4">
						<a href="javascript:" id="sidebar-switch" data-toggle="modal" data-target="#sidebar"><i class="iconfont icon-classification icon-2x"></i></a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="placeholder" style="height:74px"></div>
</div>
<div class="header-big  post-top css-color mb-4" style="background-image: linear-gradient(45deg, #8618db 0%, #d711ff 50%, #460fdd 100%);">
	<div class="s-search">
		<div id="search" class="s-search mx-auto">
			<div id="search-list-menu" class="hide-type-list">
				<div class="s-type text-center">
					<div class="s-type-list big">
						<div class="anchor" style="position: absolute; left: 50%; opacity: 0;"></div>
						<label for="type-baidu" class="" data-id="group-a"><span>常用</span></label><label for="type-baidu1" data-id="group-b"><span>搜索</span></label><label for="type-br" data-id="group-c"><span>工具</span></label><label for="type-zhihu" data-id="group-d"><span>社区</span></label><label for="type-taobao1" data-id="group-e"><span>生活</span></label><label for="type-zhaopin" data-id="group-f"><span>视频</span></label>
					</div>
				</div>
			</div>
			<form action="https://nav.iowen.cn?s=" method="get" target="_blank" class="super-search-fm">
				<input type="text" id="search-text" class="form-control smart-tips search-key" zhannei="" placeholder="输入关键字搜索" style="outline:0" autocomplete="off">
				<button type="submit"><i class="iconfont icon-search"></i></button>
			</form>
			<div id="search-list" class="hide-type-list">
				<div class="search-group group-a ">
					<ul class="search-type">
						<li><input checked="checked" hidden="" type="radio" name="type" id="type-baidu" value="https://www.baidu.com/s?wd=" data-placeholder="百度一下"><label for="type-baidu"><span class="text-muted">百度</span></label></li>
						<li><input hidden="" type="radio" name="type" id="type-google" value="https://www.google.com/search?q=" data-placeholder="谷歌两下"><label for="type-google"><span class="text-muted">谷歌</span></label></li>
						<li><input hidden="" type="radio" name="type" id="type-zhannei" value="https://www.423down.com/?s=" data-placeholder="软件搜索"><label for="type-zhannei"><span class="text-muted">软件</span></label></li>
						<li><input hidden="" type="radio" name="type" id="type-taobao" value="https://s.taobao.com/search?q=" data-placeholder="淘宝"><label for="type-taobao"><span class="text-muted">淘宝</span></label></li>
						<li><input hidden="" type="radio" name="type" id="type-bing" value="https://soupian.one/search?key=" data-placeholder="影视资源聚合搜索"><label for="type-bing"><span class="text-muted">影视</span></label></li>
					</ul>
				</div>
				<div class="search-group group-b ">
					<ul class="search-type">
						<li><input hidden="" type="radio" name="type" id="type-baidu1" value="https://www.baidu.com/s?wd=" data-placeholder="百度一下"><label for="type-baidu1"><span class="text-muted">百度</span></label></li>
						<li><input hidden="" type="radio" name="type" id="type-google1" value="https://www.google.com/search?q=" data-placeholder="谷歌两下"><label for="type-google1"><span class="text-muted">谷歌</span></label></li>
						<li><input hidden="" type="radio" name="type" id="type-360" value="https://www.so.com/s?q=" data-placeholder="360好搜"><label for="type-360"><span class="text-muted">360</span></label></li>
						<li><input hidden="" type="radio" name="type" id="type-sogo" value="https://www.sogou.com/web?query=" data-placeholder="搜狗搜索"><label for="type-sogo"><span class="text-muted">搜狗</span></label></li>
						<li><input hidden="" type="radio" name="type" id="type-bing1" value="https://cn.bing.com/search?q=" data-placeholder="必应搜索"><label for="type-bing1"><span class="text-muted">必应</span></label></li>
						<li><input hidden="" type="radio" name="type" id="type-sm" value="https://yz.m.sm.cn/s?q=" data-placeholder="神马搜索"><label for="type-sm"><span class="text-muted">神马</span></label></li>
					</ul>
				</div>
				<div class="search-group group-c ">
					<ul class="search-type">
						<li><input hidden="" type="radio" name="type" id="type-br" value="https://rank.chinaz.com/all/" data-placeholder="请输入网址(不带https://)"><label for="type-br"><span class="text-muted">权重查询</span></label></li>
						<li><input hidden="" type="radio" name="type" id="type-links" value="https://link.chinaz.com/" data-placeholder="请输入网址(不带https://)"><label for="type-links"><span class="text-muted">友链检测</span></label></li>
						<li><input hidden="" type="radio" name="type" id="type-icp" value="https://icp.aizhan.com/" data-placeholder="请输入网址(不带https://)"><label for="type-icp"><span class="text-muted">备案查询</span></label></li>
						<li><input hidden="" type="radio" name="type" id="type-ping" value="https://ping.chinaz.com/" data-placeholder="请输入网址(不带https://)"><label for="type-ping"><span class="text-muted">PING检测</span></label></li>
						<li><input hidden="" type="radio" name="type" id="type-404" value="https://tool.chinaz.com/Links/?DAddress=" data-placeholder="请输入网址(不带https://)"><label for="type-404"><span class="text-muted">死链检测</span></label></li>
						<li><input hidden="" type="radio" name="type" id="type-ciku" value="https://www.ciku5.com/s?wd=" data-placeholder="请输入关键词"><label for="type-ciku"><span class="text-muted">关键词挖掘</span></label></li>
					</ul>
				</div>
				<div class="search-group group-d ">
					<ul class="search-type">
						<li><input hidden="" type="radio" name="type" id="type-zhihu" value="https://www.zhihu.com/search?type=content&q=" data-placeholder="知乎"><label for="type-zhihu"><span class="text-muted">知乎</span></label></li>
						<li><input hidden="" type="radio" name="type" id="type-wechat" value="https://weixin.sogou.com/weixin?type=2&query=" data-placeholder="微信"><label for="type-wechat"><span class="text-muted">微信</span></label></li>
						<li><input hidden="" type="radio" name="type" id="type-weibo" value="https://s.weibo.com/weibo/" data-placeholder="微博"><label for="type-weibo"><span class="text-muted">微博</span></label></li>
						<li><input hidden="" type="radio" name="type" id="type-douban" value="https://www.douban.com/search?q=" data-placeholder="豆瓣"><label for="type-douban"><span class="text-muted">豆瓣</span></label></li>
						<li><input hidden="" type="radio" name="type" id="type-why" value="https://ask.seowhy.com/search/?q=" data-placeholder="SEO问答社区"><label for="type-why"><span class="text-muted">搜外问答</span></label></li>
					</ul>
				</div>
				<div class="search-group group-e ">
					<ul class="search-type">
						<li><input hidden="" type="radio" name="type" id="type-taobao1" value="https://s.taobao.com/search?q=" data-placeholder="淘宝"><label for="type-taobao1"><span class="text-muted">淘宝</span></label></li>
						<li><input hidden="" type="radio" name="type" id="type-jd" value="https://search.jd.com/Search?keyword=" data-placeholder="京东"><label for="type-jd"><span class="text-muted">京东</span></label></li>
						<li><input hidden="" type="radio" name="type" id="type-xiachufang" value="https://www.xiachufang.com/search/?keyword=" data-placeholder="下厨房"><label for="type-xiachufang"><span class="text-muted">下厨房</span></label></li>
						<li><input hidden="" type="radio" name="type" id="type-xiangha" value="https://www.xiangha.com/so/?q=caipu&s=" data-placeholder="香哈菜谱"><label for="type-xiangha"><span class="text-muted">香哈菜谱</span></label></li>
						<li><input hidden="" type="radio" name="type" id="type-12306" value="https://www.12306.cn/?" data-placeholder="12306"><label for="type-12306"><span class="text-muted">12306</span></label></li>
						<li><input hidden="" type="radio" name="type" id="type-kd100" value="https://www.kuaidi100.com/?" data-placeholder="快递100"><label for="type-kd100"><span class="text-muted">快递100</span></label></li>
						<li><input hidden="" type="radio" name="type" id="type-qunar" value="https://www.qunar.com/?" data-placeholder="去哪儿"><label for="type-qunar"><span class="text-muted">去哪儿</span></label></li>
					</ul>
				</div>
				<div class="search-group group-f ">
					<ul class="search-type">
						<li><input hidden="" type="radio" name="type" id="type-zhaopin" value="https://piped.hostux.net/results?search_query=" data-placeholder="油1"><label for="type-zhaopin"><span class="text-muted">油1</span></label></li>
						<li><input hidden="" type="radio" name="type" id="type-51job" value="https://watch.leptons.xyz/results?search_query=" data-placeholder="油2"><label for="type-51job"><span class="text-muted">油2</span></label></li>
						<li><input hidden="" type="radio" name="type" id="type-lagou" value="https://cf.piped.video/results?search_query=" data-placeholder="油3"><label for="type-lagou"><span class="text-muted">油3</span></label></li>
						<li><input hidden="" type="radio" name="type" id="type-liepin" value="https://piped.video/results?search_query=" data-placeholder="油4"><label for="type-liepin"><span class="text-muted">油4</span></label></li>
					</ul>
				</div>
			</div>
			<div class="card search-smart-tips" style="display: none">
				<ul></ul>
			</div>
		</div>
	</div>
	<div class="bulletin-big mx-3 mx-md-0">
		<div id="bulletin_box" class="card my-2">
			<div class="card-body py-1 px-2 px-md-3 d-flex flex-fill text-xs text-muted">
				<div><i class="iconfont icon-laba font-size:26px" style="line-height:25px"></i></div>
				<div class="bulletin mx-1 mx-md-2 carousel-vertical">
					<div class="carousel slide" data-ride="carousel" data-interval="3000">
						<div class="carousel-inner" role="listbox">
							<?php
							$bulletin = $this->optionMulti('bulletin', "\r\n", null);
							foreach ($bulletin as $key => $value) {
							?>
								<div class="carousel-item <?= $key == 0 ? 'active' : '' ?>"><?= $value ?></div>
							<?php
							}
							?>
						</div>
					</div>
				</div>
				<div class="flex-fill"></div>
				<a title="关闭" href="javascript:;" rel="external nofollow" class="bulletin-close" onclick="$('#bulletin_box').slideUp('slow');"><i class="iconfont icon-searchclose" style="line-height:25px"></i></a>
			</div>
		</div>
	</div>
</div>