/*
  作者：OUZERO
  官网：https://www.ouzero.com
  演示：https://nav.ouzero.com
  ＱＱ：81389321
  Ｑ群：14979283
  邮箱：admin@ouzero.com
*/

const qqReg = /^([1-9]\d{4,9}$)|^暂无$/ //验证QQ号
const urlReg = /^(?=^.{3,255}$)(http(s)?:\/\/)?(www\.)?[a-zA-Z0-9][-a-zA-Z0-9]{0,62}(\.[a-zA-Z0-9][-a-zA-Z0-9]{0,62})+(:\d+)*(\/([-\w]+)*(\.[-\w]+)*)*([#?&]\w+=\w*)*$/i //验证url

$(function () {
	let timer;

	$(window).on('scroll', function () {
		const scrollTop = $(window).scrollTop();
		const backTopDom = $('.back-top');

		//监听顶部置顶
		headerFixed();

		//监听懒加载渲染
		timer && clearTimeout(timer);
		timer = setTimeout(function () {
			lazyRender();
		}, 300);

		//监听分类激活
		sortActive();

		//监听返回顶部显示/隐藏
		scrollTop >= 100 ? backTopDom.addClass('show') : backTopDom.removeClass('show');
	});

	//导航高亮
	highLight();

	//懒加载
	const bannerDom = $('.banner');
	bannerDom.css('background-image', 'url("' + bannerDom.attr('data-src') + '")');
	lazyRender();

	//分类激活
	sortActive();

	//顶部置顶
	headerFixed();

	//移动端侧栏显示/隐藏
	$('.nav-bar').on('click', function () {
		if ($(this).hasClass('active')) {
			$(this).removeClass('active');
			$('.nav').removeClass('show');
			$('.transparent-mark').remove();
		} else {
			$(this).addClass('active');
			$('.nav').addClass('show');
			$('.header').append('<div class="transparent-mark"></div>');
		}
	});

	//点击遮罩层隐藏
	$(document).on('click', '.transparent-mark', function () {
		$('.nav-bar').removeClass('active');
		$('.nav').removeClass('show');
		$('.transparent-mark').remove();
	});

	$('.search-form').submit(function (event) {
		if ($('.search-type .item.active').attr('data-type') == 'this') {
			let keyword = $('.search-input').val();
			event.preventDefault();
			location.href = '/search/' + keyword;
			return false;
		}
	});

	//切换搜索方式
	const searchInputDom = $('.search-input'),
		searchFormDom = $('.search-form'),
		searchBtnDom = $('.search-btn');
	searchInputDom.focus();
	$('.search-type .item').on('click', function () {
		$('.search-type .item').removeClass('active');
		$(this).addClass('active');
		searchInputDom.focus();
		searchFormDom.attr('target', '_blank');
		switch ($(this).attr('data-type')) {
			case 'this':
				searchFormDom.attr('action', '../').attr('target', '_self');
				searchInputDom.attr('name', 'keyword');
				searchBtnDom.text('本站搜索');
				break;
			case 'baidu':
				searchFormDom.attr('action', 'https://www.baidu.com/s?tn=none');
				searchInputDom.attr('name', 'wd');
				searchBtnDom.text('百度一下');
				break;
			case 'sogou':
				searchFormDom.attr('action', 'https://www.sogou.com/sogou?pid=none');
				searchInputDom.attr('name', 'query');
				searchBtnDom.text('搜狗搜索');
				break;
			case '360':
				searchFormDom.attr('action', 'https://www.so.com/s?ls=none');
				searchInputDom.attr('name', 'q');
				searchBtnDom.text('360搜索');
				break;
			case 'bing':
				searchFormDom.attr('action', 'https://cn.bing.com/search?from=none');
				searchInputDom.attr('name', 'q');
				searchBtnDom.text('必应搜索');
				break;
		}
	});

	//点击分类滚动
	$('.sort .move').on('click', function (e) {
		e.preventDefault();
		const href = $(this).attr('href'), pos = $(href).offset().top - ($(window).width() <= 767 ? 52 : 62);
		$('html').animate({ scrollTop: pos }, 500);
	});
});



//导航高亮
function highLight() {
	const urlStr = location.href;
	$('.nav > li > a').each(function () {
		const href = $(this).attr('href');
		if (urlStr == href) {
			$(this).parent('li').addClass('active');
		} else {
			$(this).parent('li').removeClass('active');
		}
	});
}

/**
 * 懒加载
 */
function lazyRender() {
	$('.lazy-load').each(function () {
		const scrollTop = $(window).scrollTop(),
			windowHeight = $(window).height(),
			offsetTop = $(this).offset().top;

		if (
			offsetTop < scrollTop + windowHeight &&
			offsetTop > scrollTop &&
			$(this).attr('data-src') !== $(this).attr('src')
		) {
			// 设置图片加载超时时间（例如 5 秒）
			const imgLoadTimeout = 5000;
			let imgLoadTimer = setTimeout(function () {
				// 图片加载超时，停止加载并显示默认图片或错误提示
				$(this).attr('src', Antidote.THEME_URL + '/assets/images/favicon.ico'); // 替换成你的默认图片路径
				$(this).attr('data-src', Antidote.THEME_URL + '/assets/images/favicon.ico'); // 替换成你的默认图片路径
				// 或者显示错误提示：$(this).html('图片加载失败');
				clearTimeout(imgLoadTimer);
			}, imgLoadTimeout);

			// 图片加载成功，清除计时器
			$(this).on('load', function () {
				clearTimeout(imgLoadTimer);
			});

			// 图片加载失败，清除计时器并显示默认图片或错误提示
			$(this).on('error', function () {
				clearTimeout(imgLoadTimer);
				$(this).attr('src', Antidote.THEME_URL + '/assets/images/favicon.ico'); // 替换成你的默认图片路径
				$(this).attr('data-src', Antidote.THEME_URL + '/assets/images/favicon.ico'); // 替换成你的默认图片路径
				// 或者显示错误提示：$(this).html('图片加载失败');
			});

			$(this).animate({ opacity: 'toggle' }, 300, function () {
				$(this).attr('src', $(this).attr('data-src'));
				$(this).animate({ opacity: 'toggle' }, 300);
			});
		}
	});
}

//顶部置顶
function headerFixed() {
	const headerDom = $('.header');
	if (headerDom.next('.banner').length === 0) {
		return;
	}
	$(window).scrollTop() > 0 ? headerDom.addClass('fixed') : headerDom.removeClass('fixed');
}

//分类激活
function sortActive() {
	if ($('.sort').length === 0) {
		return;
	}
	$('.sort .move')
		.removeClass('active')
		.each(function () {
			const href = $(this).attr('href'),
				scrollTop = $(window).scrollTop(),
				windowHeight = $(window).height(),
				offsetTop = $(href).offset().top;
			if (offsetTop < scrollTop + windowHeight && offsetTop > scrollTop) {
				$(this).addClass('active');
				return false;
			}
		});
}

//返回顶部
function backTop() {
	$('html,body').animate(
		{
			scrollTop: '0'
		},
		500
	);
}

//检测输入
function checkInput(options) {
	for (const item of options) {
		const dom = $('#' + item.id);
		const value = dom.val();
		if (dom.attr('disabled') || (item.optional && !value)) {
			continue;
		}
		let result;
		if (item.reg) {
			result = item.reg.test(value);
		} else if (item.minLength) {
			result = value.length >= item.minLength;
			item.msg = '长度不可少于' + item.minLength + '位';
		} else {
			result = !!value;
		}
		if (!result) {
			layer.msg(item.msg, {
				anim: 6,
				time: 500
			});
			dom.focus();
			return false;
		}
	}
	return true;
}

//申请收录
function addApply() {
	if (checkInput([{
		id: 'title',
		msg: '请输入标题'
	}, {
		id: 'sortId',
		msg: '请选择分类'
	}, {
		id: 'sortId',
		msg: '请选择分类'
	}, {
		id: 'qq',
		msg: '请输入正确的QQ号',
		reg: qqReg,
		optional: true
	}, {
		id: 'url',
		msg: '请输入正确的网址',
		reg: urlReg,
	}, {
		id: 'captcha',
		msg: '请输入验证码'
	}, {
		id: 'keywords',
		msg: '请输入站点关键词'
	}, {
		id: 'description',
		msg: '请输入站点描述'
	}])) {
		$.ajax({
			type: 'POST',
			url: window.SYSTEM.BASE_URL + 'api/apply_add',
			data: $('#apply-add').serialize(),
			beforeSend: () => {
				layer.load(2);
			},
			success: (result) => {
				layer.closeAll('loading');
				if (result.code !== 200) {
					return layer.alert('提交失败：' + result.msg);
				}
				layer.alert(result.msg);
			},
			error: () => {
				layer.closeAll('loading');
				layer.msg('系统错误，请检查网络或联系管理员');
			}
		});
	}
}

//点赞功能
function addLove(dom, id) {
	$.ajax({
		type: 'POST',
		url: window.SYSTEM.BASE_URL + 'api/site_love',
		data: {
			id
		},
		success: (result) => {
			if (result.code !== 200) {
				return layer.msg(result.msg, {
					anim: 6,
					time: 500
				});
			}
			layer.msg('点赞成功', {
				time: 500
			});
			$(dom).css({
				'pointer-events': 'none',
				'cursor': 'not-allowed',
				'opacity': 0.8
			});
			$(dom).html('<i class="fa fa-thumbs-up fa-fw active" aria-hidden="true"></i>&nbsp;已赞&nbsp;[' + result.love + ']')
		},
		error: () => {
			layer.msg('系统错误，请检查网络或联系管理员', {
				anim: 6,
				time: 1000,
			});
		}
	});
}