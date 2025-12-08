$(document).ready(function () {
	$('header .clear-cache').click(function () {
		$.get('server.php?action=clearAll');
		$.notify({
			message: '清空缓存成功'
		}, {
			type: 'success',
			allow_dismiss: true,
			newest_on_top: false,
			placement: {
				from: 'top',
				align: 'center'
			},
			delay: 10,
			animate: {
				enter: 'animate__animated animate__fadeInDown',
				exit: 'animate__animated animate__fadeOutUp'
			}
		});
	});

	$('.layer_iframe').click(function (event) {
		event.preventDefault();
		let url = $(this).attr('data-url') ? $(this).attr('data-url') : $(this).attr('href');
		let title = $(this).attr('data-title') ? $(this).attr('data-title') : $(this).text();
		// console.log(url);
		YiHang.iframe(url, title);
		return false;
	});

	function loading() {
		$("#loading-animation").fadeIn(300);
		setTimeout(() => {
			$("#loading-animation").fadeOut(300);
		}, 5000);
	}

	function checkUrl2(string) {
		try {
			let url = new URL(string);
			console.log(url);
			if (url.protocol == 'javascript:' || url.protocol == 'javascript::' || url.search != '') return false;
		} catch (error) {
			console.log(error);
			return false;
		}
		return true;
	}

	function checkUrl(url) {
		console.log(url);
		if (!url || url.includes('javascript:') || url.includes('#')) return false;
		return true;
	}

	// a标签加载动画
	$('a').click(function (e) {
		if ($(this).attr('target') == '_blank') return true;
		if ($(this).attr('ajax-replace')) return true;
		let url = $(this).attr('href');
		if (checkUrl(url)) loading();
		// e.preventDefault();
		// return false;
	});

});