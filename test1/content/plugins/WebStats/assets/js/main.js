; window.addEventListener('DOMContentLoaded', () => {

	let xhr = new XMLHttpRequest();

	// 获取访问设备
	const ua = navigator.userAgent;
	const SpiderMatch = ua.match(/(Googlebot|Baiduspider|360spider|bingbot|MJ12bot|LinkpadBot|Sogou web spider)/i)
	if (SpiderMatch) {
		var device = SpiderMatch[1];
	} else if (ua.match(/Android/i)) {
		var device = 'Android';
	} else if (ua.match(/iPhone|iPad|iPod/i)) {
		var device = 'iOS';
	} else if (ua.match(/Windows/i)) {
		var device = 'Windows';
	} else if (ua.match(/Mac OS X/i)) {
		var device = 'Mac OS X';
	} else {
		var device = 'Unknown';
	}

	let data = {
		referrer: document.referrer,
		url: window.location.href,
		device: device,
		time: 0
	}

	// methods：GET/POST请求方式等，url：请求地址，true异步（可为false同步）
	xhr.open("POST", window.SYSTEM.BASE_URL + "stats/" + new Date().getTime(), true);
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.send((new URLSearchParams(data)).toString());
	xhr.onreadystatechange = function () {
		if (xhr.readyState == 4 && xhr.status == 200) {
			let data = JSON.parse(xhr.response);
			// console.log(data)
			if (data.code == 200) {
				var timer = setInterval(() => {
					if (document.visibilityState != 'visible') return;
					let xhr = new XMLHttpRequest();
					let data = {
						referrer: document.referrer,
						url: window.location.href,
						device: device,
						time: 1
					}
					xhr.open("POST", window.SYSTEM.BASE_URL + "stats/" + new Date().getTime(), true);
					xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					xhr.send((new URLSearchParams(data)).toString());
					xhr.onreadystatechange = function () {
						if (xhr.readyState == 4) {
							if (xhr.status == 200) {
								let data = JSON.parse(xhr.response);
								if (data.code != 200) {
									clearInterval(timer);
								}
							} else {
								clearInterval(timer);
							}
						}
					}
				}, 3000);
			}
		}
	}
});
