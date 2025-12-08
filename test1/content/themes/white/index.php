<?php

/**
 * @package 拟态白起始页
 * @description 来自网络收集
 * @author 易航
 * @version 1.0
 * @link http://bri6.cn
 */
if (!defined('ROOT')) exit;
$title = $this->site->title;
$link = $this->getSites();
?>
<!DOCTYPE html>
<html>

<head>
	<?= $this->header() ?>
	<script src="<?= $this->options->icon_cdn ?>"></script>
	<link rel="stylesheet" href="<?= $this->themeUrl('assets/css/style.css') ?>">
	<script type="text/javascript" src="<?= $this->themeUrl('assets/js/jquery-3.3.1.min.js') ?>"></script>
	<script type="text/javascript" src="<?= $this->themeUrl('assets/js/sou.js') ?>"></script>
	<style>
		#top {
			width: 100%;
			height: 250px;
		}

		#logo {
			width: 260px;
			margin: 0 auto;
			text-align: center;
		}

		#foo {
			width: 100%;
			margin-top: 100px;
		}

		#foot {
			margin: 0 auto;
			text-align: center;
		}

		#logo img {
			width: 141px;
		}

		img {
			border: 0;
			vertical-align: middle;
		}

		#logo h1 {
			color: #fff;
			text-align: center;
			text-shadow: 0 0 10px #111;
			font-weight: 200;
			font-size: 36px;
			font-family: MyriadSetPro-Thin;
			margin-top: 15px;
		}
	</style>
</head>

<body>
	<div class="container">
		<!--自定义开始-->
		<div id="top">
			<div id="logo">
				<a href="/"><img class="logo shake" src="<?= $this->site->logo ?>" title="搜索一下"></a>
				<p></p>
				<div class="type-js headline" style="position: relative; display: inline-block;">
					<div class="cursor"></div>
					<h1 class="text-js" style="opacity: 1;"><?= $title ?></h1>
				</div>
			</div>
		</div>
		<!--搜索开始-->
		<section id="search" class="sousuo">
			<div class="search" id="search-list">
				<!--<div class="search-box" style="padding-left: 20px">-->
				<form class="search-box" action="https://www.baidu.com/s?wd=" method="get" target="_blank" id="super-search-fm">
					<input class="search-input" type="text" id="search-text" placeholder="百度一下" style="outline:0" autocomplete="off">
					<button class="submit" type="submit">
						<svg t="1771245847" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="15247" width="200" height="200">
							<path d="M222.6944 222.7968A323.1488 323.1488 0 0 0 133.6832 512c19.2512-87.3728 64.512-172.7488 135.0144-243.3024C339.2512 198.1184 424.6272 152.8832 512 133.632c-101.632-19.1488-210.688 10.5216-289.3056 89.1648z" fill="#0c68f0" p-id="15248"></path>
							<path d="M989.44 822.1184l-121.7024-121.7024a118.016 118.016 0 0 0-92.8-34.1248c114.4576-165.5552 97.92-394.3936-49.4848-541.824-165.9392-165.9904-435.0464-165.9904-601.0368 0-165.9392 165.9904-165.9392 435.1232 0 601.1136 147.4048 147.4304 376.064 163.84 541.7216 49.3824-2.56 33.28 8.8576 67.5328 34.1248 92.8l121.7024 121.728c46.08 45.9776 121.3696 45.9776 167.3472 0 46.208-45.9776 46.208-121.2928 0.128-167.3728zM676.096 676.096c-138.6752 138.6752-363.392 138.6752-502.016 0-138.6752-138.6752-138.6752-363.4432 0-502.1184 138.624-138.6752 363.3408-138.6752 502.016 0 138.6496 138.5728 138.6496 363.4432 0 502.1184z" fill="#0c68f0" p-id="15249"></path>
						</svg>
					</button>
					<!--<ul id="word" style="display: none;"></ul>-->
				</form>
				<div>
					<input type="checkbox" id="set-search-blank" style="display: none;" autocomplete="off">
				</div>
				<!--</div>-->

				<div class="search-engine" id="oa_submeau">
					<ul class="search-engine-list">
						<li><input checked="" hidden="" type="radio" name="type" id="type-baidu" value="https://www.baidu.com/s?wd=" data-placeholder="不懂吗？搜索一下"><label for="type-baidu"><span style="color:#4e6ef2">百度</span></label></li>
						<li><input hidden="" type="radio" name="type" id="type-bing" value="https://cn.bing.com/?q=" data-placeholder="必应搜索"><label for="type-bing"><span style="color:#55C0F8">Bing</span></label></li>
					</ul>
				</div>
				<ul id="word" style="display: none;"></ul>
			</div>
		</section>
		<!--搜索结束-->
		<!--自定义结束-->

		<?php
		foreach ($link as $key => $value) {
		?>
			<a href="<?= $value->url ?>" class="box" target="_blank" rel="<?= $value->rel ?>">
				<div class="img">
					<svg>
						<use xlink:href="#<?= isset($value->fields->icon) ? $value->fields->icon : 'default' ?>"></use>
					</svg>
				</div>
				<p><?= $value->title ?></p>
			</a>
		<?php
		}
		if (!$this->auth()) echo base64_decode('PGEgaHJlZj0iaHR0cDovL2d1aWRlLmJyaTYuY24iIGNsYXNzPSJib3giIHRhcmdldD0iX2JsYW5rIj4KCQkJCTxkaXYgY2xhc3M9ImltZyI+CgkJCQkJPGltZyBzcmM9Imh0dHA6Ly9ndWlkZS5icmk2LmNuL2Zhdmljb24uaWNvIj4KCQkJCTwvZGl2PgoJCQkJPHA+PHNwYW4gc3R5bGU9ImNvbG9yOnJlZCI+5pys56uZ5ZCM5qy+57O757ufPC9zcGFuPjwvcD4KCQkJPC9hPg==');
		?>

		<div id="foo">
			<div id="foot">
				<span id="nowTime"></span>
			</div>
		</div>

		<!--shi-->
		<script src="<?= $this->themeUrl('assets/js/shijian.js') ?>"></script>
		<!--sou-->

		<script>
			! function() {
				function g() {
					h(), i(), j(), k()
				}

				function h() {
					d.checked = s()
				}

				function i() {
					var a = document.querySelector('input[name="type"][value="' + p() + '"]');
					a && (a.checked = !0, l(a))
				}

				function j() {
					v(u())
				}

				function k() {
					w(t())
				}

				function l(a) {
					for (var b = 0; b < e.length; b++) e[b].classList.remove("s-current");
					a.parentNode.parentNode.parentNode.classList.add("s-current")
				}

				function m(a, b) {
					window.localStorage.setItem("superSearch" + a, b)
				}

				function n(a) {
					return window.localStorage.getItem("superSearch" + a)
				}

				function o(a) {
					f = a.target, v(u()), w(a.target.value), m("type", a.target.value), c.focus(), l(a.target)
				}

				function p() {
					var b = n("type");
					return b || a[0].value
				}

				function q(a) {
					m("newWindow", a.target.checked ? 1 : -1), x(a.target.checked)
				}

				function r(a) {
					return a.preventDefault(), "" == c.value ? (c.focus(), !1) : (w(t() + c.value), x(s()), s() ? window.open(b.action, +new Date) : location.href = b.action, void 0)
				}

				function s() {
					var a = n("newWindow");
					return a ? 1 == a : !0
				}

				function t() {
					return document.querySelector('input[name="type"]:checked').value
				}

				function u() {
					return document.querySelector('input[name="type"]:checked').getAttribute("data-placeholder")
				}

				function v(a) {
					c.setAttribute("placeholder", a)
				}

				function w(a) {
					b.action = a
				}

				function x(a) {
					a ? b.target = "_blank" : b.removeAttribute("target")
				}
				var y, a = document.querySelectorAll('input[name="type"]'),
					b = document.querySelector("#super-search-fm"),
					c = document.querySelector("#search-text"),
					d = document.querySelector("#set-search-blank"),
					e = document.querySelectorAll(".search-group"),
					f = a[0];
				for (g(), y = 0; y < a.length; y++) a[y].addEventListener("change", o);
				d.addEventListener("change", q), b.addEventListener("submit", r)
			}();
		</script>
	</div>
	<?= $this->footer() ?>
</body>

</html>