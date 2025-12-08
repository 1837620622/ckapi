var YiHang = {
	base64: {
		encode(str) {
			return btoa(encodeURIComponent(str).replace(/%([0-9A-F]{2})/g,
				function toSolidBytes(match, p1) {
					return String.fromCharCode('0x' + p1);
				}));
		},
		decode(str) {
			return decodeURIComponent(atob(str).split('').map(function (c) {
				return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
			}).join(''));
		}
	},
	iframe: function (content, title, options) {
		let area = YiHang.isMobile() ? ['95%', '95%'] : ['90%', '90%'];
		// $('.lyear-mask-modal').click();
		//iframe 层
		layer.open({
			type: 2,
			title: title,
			// shadeClose: true,
			// shade: false,
			maxmin: true, //开启最大化最小化按钮
			area: area,
			content: content,
			success: function (res, index) {
				var iframe = $(res).find('iframe');
				$('.layui-layer-content').css('height', 'calc(100% - 50px)');
				iframe.css('height', '100%');
				if (!YiHang.isMobile()) {
					// layer.iframeAuto(index);
					// var titleHeight = $(res).find('.layui-layer-title').height();
					// var iframeHeight = iframe[0].contentDocument.body.scrollHeight;
					// var height = iframeHeight + titleHeight + 1;
					// if (window.innerHeight * 0.9 > height) {
					// 	$(res).css('height', height);
					// 	iframe.css('height', iframeHeight);
					// } else {
					// 	$(res).css('height', '90%');
					// 	iframeHeight = $(res).height() - titleHeight;
					// 	iframe.css('height', iframeHeight);
					// }
					// res.css('top', (window.innerHeight - height) / 2);
				}
				// var iframe = $(res).find('iframe');
				// console.log(iframe)
				// $(iframe[0].contentDocument.body).css('background-color','#fff');
			},
			...options
		});
	},

	isMobile: function () {
		let userAgentInfo = navigator.userAgent;
		let Agents = ['Android', 'iPhone', 'SymbianOS', 'Windows Phone', 'iPad', 'iPod'];
		let getArr = Agents.filter(i => userAgentInfo.includes(i));
		return getArr.length ? true : false;
	},

	/**
	* 提取通用的通知消息方法
	* @param $msg 提示信息
	* @param $type 提示类型:'info', 'success', 'warning', 'danger'
	* @param $delay 毫秒数，例如：1000
	* @param $icon 图标，例如：'fa fa-user' 或 'mdi mdi-alert'
	* @param $from 'top' 或 'bottom' 消息出现的位置
	* @param $align 'left', 'right', 'center' 消息出现的位置
	* @param $url 跳转链接，$delay毫秒后跳转  例如： https://www.xxxx.com
	*/
	notify: function ($msg, $type = 'info', $delay = 3000, $icon, $from = 'top', $align = 'center', $url = false) {
		$enter = $type == 'danger' ? 'animate__animated animate__shakeX' : 'animate__animated animate__fadeInDown';
		if ($url) {
			setTimeout(function () {
				window.location.href = $url;
			}, $delay);
		}
		return jQuery.notify({
			icon: $icon,
			message: $msg
		}, {
			element: 'body',
			type: $type,
			allow_dismiss: true,
			newest_on_top: true,
			showProgressbar: false,
			placement: {
				from: $from,
				align: $align
			},
			offset: 20,
			spacing: 10,
			z_index: 20891024,
			delay: $delay,
			animate: {
				enter: $enter,
				exit: 'animate__animated animate__fadeInDown'
			}
		});
	},
	/**
	* 页面loading
	*/
	loading: function ($mode) {
		var $loadingEl = jQuery('#lyear-loading');
		$mode = $mode || 'show';
		if ($mode === 'show') {
			if ($loadingEl.length) {
				$loadingEl.fadeIn(250);
			} else {
				jQuery('body').prepend('<div id="lyear-loading"><div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div></div>');
			}
		} else if ($mode === 'hide') {
			if ($loadingEl.length) {
				$loadingEl.fadeOut(250);
			}
		}
		return false;
	},
	ajax: function (ajax, options) {
		options = options ? options : {};
		if (!options.loading) options.loading = {};
		if (!options.loading.element) options.loading.element = 'body';
		if (!options.action) options.action = '提交';
		if (!options.jump) options.jump = false;
		var loader;
		$.ajax({
			...ajax,
			// 请求发送前操作
			beforeSend: () => {
				loader = $(options.loading.element).lyearloading({
					opacity: 0.15,
					// backgroundColor: '#000',
					// textColorClass: 'text-secondary',
					// spinnerColorClass: 'text-secondary',
					spinnerSize: 'lg',
					spinnerText: options.action + '中... 请勿刷新页面'
				});
			},
			// 请求完成操作
			complete() {
				loader.destroy();
			},
			success(res) {
				if (res.code == 200) {
					if (options.success) {
						options.success(res);
					} else {
						let title = res.message ? res.message : options.action + '成功';
						YiHang.notify(title, 'success', 3000, 'mdi mdi-emoticon-neutral', 'top', 'center', options.jump);
					}
				} else {
					let title = options.action + '失败' + (res.message ? '：' + res.message : '');
					YiHang.notify(title, 'warning', 3000, 'mdi mdi-emoticon-neutral', 'top', 'center', false);
				}
			},
			error(xhr) {
				console.log(xhr.responseText)
				YiHang.notify('接口请求错误', 'danger', 3000, 'mdi mdi-emoticon-sad', 'top', 'center', false);
			}
		})
	},
	isFrame: function () {
		if (self.frameElement && self.frameElement.tagName == "IFRAME") {
			return true
		}
		return false
	},
	form: function (form_element, form_action) {
		$(form_element).on('submit', function (event) {
			// 拦截表单默认提交事件
			event.preventDefault();
			// 表单校验
			if ($(this)[0].checkValidity() === false) {
				event.stopPropagation();
				$(this).addClass('was-validated');
				return false;
			}
			if ($(":file").length > 0) {
				var file = new FormData();
				$(':file').each(function () {
					file.append($(this).attr('name'), this.files[0]);
				})
				let data = $(this).serializeArray();
				for (var key in data) {
					file.append(data[key]['name'], data[key]['value']);
				}
				console.log(file)
				var ajax = {
					processData: false,
					contentType: false,
					data: file
				}
			} else {
				var ajax = {
					data: $(this).serialize()
				}
			}
			var loader;
			$.ajax({
				url: $(this).attr('action'),
				type: 'post',
				dataType: 'json',
				...ajax,
				// 请求发送前操作
				beforeSend: () => {
					loader = $(this).parent().parent().lyearloading({
						opacity: 0.125,
						spinnerSize: 'lg',
						spinnerText: '提交中... 请勿刷新页面'
					});
				},
				// 请求完成操作
				complete() {
					loader.destroy();
				},
				success(res) {
					if (YiHang.isFrame()) {
						if (res.code == 200) {
							parent.$('table').bootstrapTable('refresh', {
								silent: true //静态刷新
							});
							if (res.message) {
								var content = res.message;
							} else {
								var content = form_action + '成功';
							}
							parent.YiHang.notify(content, 'success');
							parent.layer.closeAll('iframe'); //关闭所有的iframe层
						} else {
							if (res.message) {
								var content = form_action + '操作失败：' + res.message;
							} else {
								var content = form_action + '操作失败';
							}
							parent.YiHang.notify(content, 'warning');
						}
					} else {
						if (res.code == 200) {
							if (res.message) {
								var content = res.message;
							} else {
								var content = form_action + '成功，点击阴影处可关闭该弹窗';
							}
							$.alert({
								title: res.title ? res.title : 'Hello',
								content,
								icon: 'mdi mdi-rocket',
								animation: 'scale',
								closeAnimation: 'scale',
								width: '1000px',
								draggable: true,
								backgroundDismiss: true,
								buttons: {
									back: {
										text: '返回上一页',
										btnClass: 'btn-blue',
										action: function () {
											history.back()
										}
									},
									reload: {
										text: '刷新页面',
										btnClass: 'btn-success',
										action: function () {
											location.reload()
										}
									}
								}
							});
						} else {
							YiHang.notify(form_action + '操作失败：' + res.message, 'warning');
						}
					}
				},
				error(xhr) {
					console.log(xhr.responseText);
					if (YiHang.isFrame()) {
						parent.YiHang.notify('服务器错误', 'danger');
					} else {
						YiHang.notify('服务器错误', 'danger');
					}
				}
			})
			return false;
		});
	}
}
window.YiHang = YiHang;
(function() {
	var iframe = document.createElement('iframe');
	document.body.appendChild(iframe);
	iframe.style.display = 'none';
	window.console = iframe.contentWindow.console;
}());