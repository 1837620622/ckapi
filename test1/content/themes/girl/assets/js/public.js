$(document).ready(() => {
	$('#gb-ts').click(() => {
		$('.tishi').fadeOut('slow')
	})
	setTimeout(function () {
		$('.tishi').fadeIn('slow')
	}, 10000);
})

/**
 * @function 参数拼接
 * @param {object} obj 只支持非嵌套的对象
 * @returns {string}
 */
function params(obj) {
	let result = '';
	let item;
	for (item in obj) {
		if (obj[item] && String(obj[item])) {
			result += `&${item}=${obj[item]}`;
		}
	}
	if (result) {
		result = result.slice(1);
	}
	return result ? result : null;
}

function getUrl() {
	let url = document.getElementById('sort').value;
	if (url.startsWith('text:')) {
		url = url.slice(5);
		$.ajaxSettings.async = false;
		$.get({
			url: url,
			dataType: "text",
			success: function (response) {
				url = response ? response : url;
			}
		});
		$.ajaxSettings.async = true;
	}
	let param = params({
		random: Math.random()
	})
	url += url.indexOf('?') != -1 ? '&' + param : '?' + param;
	console.log(url)
	return url
}