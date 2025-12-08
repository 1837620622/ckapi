<?php

/**
 * @package Sun-Panel
 * @description 简单易用且美观，NAS导航面板、Homepage、浏览器首页
 * @author 红烧猎人
 * @version 1.0
 * @link https://github.com/hslr-s/sun-panel
 */
if (!defined('ROOT')) exit;
$title = $theme->site->title;
$weekarray = array("日", "一", "二", "三", "四", "五", "六");
$week = "星期" . $weekarray[date("w", time())];
?>
<html>

<head>
	<meta content="yes" name="apple-mobile-web-app-capable">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, viewport-fit=cover">
	<!-- <meta name="referrer" content="never"> -->
	<title><?= $title ?></title>
	<?= $theme->header(); ?>
	<link rel="stylesheet" href="<?= $theme->themeUrl('assets/css/index.css') ?>">
</head>

<body class="dark:bg-black">
	<?php
	if (!empty($theme->options('notice'))) {
	?>

		<header id="dynamicHeader" style="background-color: rgba(0, 0, 0, 0.8); padding: 20px; position: fixed; top: 0px; left: 10%; right: 10%; z-index: 9; width: 80%; margin: 10px auto; border-radius: 10px; box-sizing: border-box; color: rgb(255, 255, 255); font-weight: 800; font-size: 18px;">
			<?= $theme->options('notice') ?>
			<button class="n-button" style="float: right; color: red;top: 3px;">x</button>
		</header>
	<?php
	}
	?>
	<div id="app" data-v-app="">
		<div class="n-config-provider h-full">
			<div data-v-6291f850="" class="w-full h-full sun-main">
				<div data-v-6291f850="" class="cover wallpaper" style="filter: blur(0px); background: url(<?= empty(options('theme.background')) ? $theme->themeUrl('assets/img/background.webp') : $this->site->background ?>) center center / cover no-repeat;">
				</div>
				<div data-v-6291f850="" class="mask" style="background-color: rgba(0, 0, 0, 0);"></div>
				<div data-v-6291f850="" class="absolute w-full h-full overflow-auto">
					<div data-v-6291f850="" class="p-2.5 mx-auto" style="margin-top: calc(5% + 70px); margin-bottom: 5%; max-width: 1200px;">
						<div data-v-6291f850="" class="mx-[auto] w-[80%]">
							<div data-v-6291f850="" class="flex mx-[auto] items-center justify-center text-white">
								<div data-v-6291f850="" class="logo"><span data-v-6291f850="" class="text-2xl md:text-6xl font-bold text-shadow">Navigation</span></div>
								<div data-v-6291f850="" class="divider text-base lg:text-2xl mx-[10px]"> | </div>
								<div data-v-6291f850="" class="text-shadow">
									<div data-v-6291f850="" class="clock w-full text-center"><span class="clock-time text-2xl sm:text-2xl md:text-3xl font-[600]"><?= date('H:i') ?></span>
										<div class="hidden sm:hidden md:block"><span class="clock-date mr-1"><?= date('m-d') ?></span>
											<span class="clock-week"><?= $week ?></span>
										</div>
									</div>
								</div>
							</div>
							<div data-v-6291f850="" class="flex mt-[20px] mx-auto sm:w-full lg:w-[80%]">
								<div data-v-39e2293b="" data-v-6291f850="" class="search-box w-full">
									<form method="get" action="https://cn.bing.com/search" target="_blank" data-v-39e2293b="" class="search-container flex rounded-2xl items-center justify-center text-white w-full" style="background: rgba(42, 42, 42, 0.42); color: white; border-color: rgb(204, 204, 204);">
										<div data-v-39e2293b="" class="search-box-btn-engine w-[40px] flex justify-center cursor-pointer">
											<span data-v-39e2293b="" class="n-avatar" style="--n-font-size: 14px; --n-border: none; --n-border-radius: 3px; --n-color: rgba(204, 204, 204, 1); --n-color-modal: rgba(204, 204, 204, 1); --n-color-popover: rgba(204, 204, 204, 1); --n-bezier: cubic-bezier(.4, 0, .2, 1); --n-merged-size: var(--n-avatar-size-override, 20px); background-color: transparent;"><img loading="eager" src="<?= $theme->themeUrl('assets/img/bing.svg') ?>" data-image-src="<?= $theme->themeUrl('assets/img/bing.svg') ?>"></span>
										</div>
										<input name="q" data-v-39e2293b="" placeholder="请输入搜索内容">
										<div data-v-39e2293b="" class="search-box-btn-search w-[25px] flex justify-center cursor-pointer">
											<svg data-v-bc0bc726="" data-v-39e2293b="" class="svg-icon" aria-hidden="true" style="width: 20px; height: 20px;">
												<use data-v-bc0bc726="" class="svg-use" href="#iconamoon-search-fill">
												</use>
											</svg>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div data-v-6291f850="" style="margin-left: 5px; margin-right: 5px;">
							<?php
							$sort_link = $theme->getSortSites();
							// halt($sort_link);
							foreach ($sort_link as $key => $sort) {
							?>
								<div data-v-6291f850="" class="item-list mt-[50px] item-group-">
									<div data-v-6291f850="" class="text-white text-xl font-extrabold mb-[20px] ml-[10px] flex items-center">
										<span data-v-6291f850="" class="group-title text-shadow"><?= $sort->title ?></span>
									</div>
									<templete data-v-6291f850="">
										<div data-v-6291f850="" item-key="sort" class="icon-info-box">
											<?php
											foreach ($sort->sites as $key => $link) {
											?>
												<a href="<?= $link->url ?>" rel="<?= $link->rel ?>" target="_blank" data-v-6291f850="">
													<div data-v-6291f850="" class="item-card-container w-full cursor-pointer">
														<div class="app-icon w-full" card-type-style="0" icon-text="<?= htmlentities($link->title) ?>">
															<div class="app-icon w-full" card-type-style="0" icon-text="<?= htmlentities($link->title) ?>" title="<?= isset($link->fields->description) ? $link->fields->description : null ?>">
																<div data-v-f147c99f="" class="item-card w-full">
																	<div data-v-f147c99f="" class="item-card-info w-full rounded-2xl transition-all duration-200 flex" style="background-color: <?= isset($link->fields->background_color) ? $link->fields->background_color : 'rgba(42, 42, 42, 0.42)' ?>; --custom-box-shadow-color: #2a2a2a6b;">
																		<div class="app-icon-info-icon w-[70px] h-[70px]">
																			<div class="w-[70px] h-full flex items-center justify-center">
																				<div class="item-icon overflow-hidden rounded-xl" style="width: 50px; height: 50px;">
																					<?php
																					$px = isset($link->fields->icon_px) ? $link->fields->icon_px : '35px';
																					if (!empty($link->fields->img)) {
																					?>
																						<div class="flex justify-center items-center" style="background-color: transparent; width: 50px; height: 50px;">
																							<img src="<?= $link->fields->img ?>" class="w-[<?= $px ?>] h-[<?= $px ?>]">
																						</div>
																					<?php
																					} else
																					if (!empty($link->fields->svg)) {
																					?>
																						<span class="n-avatar" style="--n-font-size: 14px; --n-border: none; --n-border-radius: 3px; --n-color: rgba(204, 204, 204, 1); --n-color-modal: rgba(204, 204, 204, 1); --n-color-popover: rgba(204, 204, 204, 1); --n-bezier: cubic-bezier(.4, 0, .2, 1); --n-merged-size: var(--n-avatar-size-override, 50px); background-color: transparent; color: white;">
																							<span class="n-avatar__text" style="transform: translateX(-50%) translateY(-50%) scale(1);">
																								<?= $link->fields->svg ?>
																							</span>
																						</span>
																					<?php
																					} else
																					if (!empty($link->fields->text_icon)) {
																					?>
																						<span class="n-avatar" style="--n-font-size: 14px; --n-border: none; --n-border-radius: 3px; --n-color: rgba(204, 204, 204, 1); --n-color-modal: rgba(204, 204, 204, 1); --n-color-popover: rgba(204, 204, 204, 1); --n-bezier: cubic-bezier(.4, 0, .2, 1); --n-merged-size: var(--n-avatar-size-override, 50px); background-color: transparent; color: white;">
																							<span class="n-avatar__text" style="transform: translateX(-50%) translateY(-50%) scale(1);"><?= $link->fields->text_icon ?></span>
																						</span>
																					<?php
																					}
																					?>
																				</div>
																			</div>
																		</div>
																		<div class="text-white flex items-center" style="max-width: calc(100% - 80px); color: <?= isset($link->fields->text_color) ? $link->fields->text_color : 'white' ?>;">
																			<div class="app-icon-info-text-box w-full">
																				<div class="app-icon-info-text-box-title font-semibold w-full">
																					<span class="n-ellipsis" style="text-overflow: ellipsis;">
																						<span><?= $link->title ?></span>
																					</span>
																				</div>
																				<?php
																				if (!empty($link->fields->description)) {
																				?>
																					<div class="app-icon-info-text-box-description">
																						<span class="text-xs n-ellipsis n-ellipsis--line-clamp" style="-webkit-line-clamp: 2;"><?= $link->fields->description ?></span>
																					</div>
																				<?php
																				}
																				?>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</a>
											<?php
											}
											?>

										</div>
									</templete>
								</div>
							<?php
							}
							?>
						</div>
						<div data-v-6291f850="" class="mt-5 footer">
							<div class="flex justify-center text-slate-300" style="margin-top:100px"><?php echo $this->site->copyright; if (!$theme->auth()) echo base64_decode('LiDnlLEgPGEgc3R5bGU9ImNvbG9yOiBsaW1lZ3JlZW47IiBocmVmPSJodHRwOi8vZ3VpZGUuYnJpNi5jbiIgdGFyZ2V0PSJfYmxhbmsiPuaYk+iIque9keWdgOW8leWvvOezu+e7nzwvYT4g5by65Yqb6amx5Yqo') ?></div>
						</div>
					</div>
				</div>


				<!-- <div data-v-6291f850="" class="fixed-element bg-[#2a2a2a6b] rounded-lg shadow-[0_0_10px_2px_rgba(0,0,0,0.2)] p-[2px] flex backdrop-blur-[2px]">

					<div data-v-6291f850="" class="float-btn flex items-center justify-center" title="将 Sun-Panel 切换为内网环境"><svg data-v-bc0bc726="" data-v-6291f850="" class="svg-icon text-white font-xl float-btn-icon" aria-hidden="true">
							<use data-v-bc0bc726="" class="svg-use" href="#mdi-wan"></use>
						</svg></div>
					<div data-v-6291f850="" class="float-btn flex items-center justify-center" title="前往登录"><svg data-v-bc0bc726="" data-v-6291f850="" class="svg-icon text-white font-xl float-btn-icon" aria-hidden="true">
							<use data-v-bc0bc726="" class="svg-use" href="#material-symbols-account-circle"></use>
						</svg></div>
					<div data-v-4c77ccb5="" data-v-6291f850=""></div>
				</div> -->


				<div data-v-6291f850="" class="n-back-top-placeholder" aria-hidden="true" style="display: none;">
				</div>
			</div>
			<div></div>
		</div>
	</div>



	<svg id="__svg__icons__dom__" xmlns="http://www.w3.org/2000/svg" xmlns:link="http://www.w3.org/1999/xlink" style="position: absolute; width: 0px; height: 0px;">
		<symbol viewBox="0 0 48 48" id="icon-park-outline-import-and-export">
			<path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3.99" d="m14 26-9 9 9 9m-9-8.992h17.5M34 18l9 9-9 9m9-8.992H25.5M4.5 24V7.5h39V15"></path>
		</symbol>
		<symbol viewBox="0 0 48 48" id="icon-park-outline-to-top">
			<path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M24.008 14.1V42M12 26l12-12 12 12M12 6h24"></path>
		</symbol>
		<symbol viewBox="0 0 24 24" id="iconamoon-search-fill">
			<path fill="currentColor" fill-rule="evenodd" d="M11 2a9 9 0 1 0 5.618 16.032l3.675 3.675a1 1 0 0 0 1.414-1.414l-3.675-3.675A9 9 0 0 0 11 2Zm-6 9a6 6 0 1 1 12 0 6 6 0 0 1-12 0Z" clip-rule="evenodd"></path>
		</symbol>
		<symbol viewBox="0 0 24 24" id="material-symbols-account-circle">
			<path fill="currentColor" d="M5.85 17.1q1.275-.975 2.85-1.537T12 15q1.725 0 3.3.563t2.85 1.537q.875-1.025 1.363-2.325T20 12q0-3.325-2.337-5.663T12 4Q8.675 4 6.337 6.338T4 12q0 1.475.488 2.775T5.85 17.1ZM12 13q-1.475 0-2.488-1.012T8.5 9.5q0-1.475 1.013-2.488T12 6q1.475 0 2.488 1.013T15.5 9.5q0 1.475-1.012 2.488T12 13Zm0 9q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22Z">
			</path>
		</symbol>
		<symbol viewBox="0 0 24 24" id="mdi-wan">
			<path fill="currentColor" d="M12 2a8 8 0 0 0-8 8c0 4.03 3 7.42 7 7.93V19h-1a1 1 0 0 0-1 1H2v2h7a1 1 0 0 0 1 1h4a1 1 0 0 0 1-1h7v-2h-7a1 1 0 0 0-1-1h-1v-1.07c4-.5 7-3.9 7-7.93a8 8 0 0 0-8-8m0 2s.74 1.28 1.26 3h-2.52C11.26 5.28 12 4 12 4m-2.23.43c-.27.5-.68 1.41-1.03 2.57H6.81C7.5 5.84 8.5 4.93 9.77 4.43m4.46.01c1.27.5 2.27 1.4 2.96 2.56h-1.93c-.35-1.16-.76-2.07-1.03-2.56M6.09 9h2.23c-.04.33-.07.66-.07 1 0 .34.03.67.07 1H6.09a5.551 5.551 0 0 1 0-2m4.23 0h3.36c.04.33.07.66.07 1 0 .34-.03.67-.07 1h-3.36c-.04-.33-.07-.66-.07-1 0-.34.03-.67.07-1m5.36 0h2.23a5.551 5.551 0 0 1 0 2h-2.23c.04-.33.07-.66.07-1 0-.34-.03-.67-.07-1m-8.87 4h1.93c.35 1.16.76 2.07 1.03 2.56-1.27-.5-2.27-1.4-2.96-2.56m3.93 0h2.52c-.52 1.72-1.26 3-1.26 3s-.74-1.28-1.26-3m4.52 0h1.93c-.69 1.16-1.69 2.07-2.96 2.57.27-.5.68-1.41 1.03-2.57Z">
			</path>
		</symbol>
	</svg>
	<div data-v-app="">
		<div class="n-config-provider"></div>
	</div>
	<div data-v-app="">
		<div class="n-config-provider"></div>
	</div>
	<div data-v-app="">
		<div class="n-config-provider"></div>
	</div>
	<script>
		document.querySelector('.search-box-btn-search').onclick = () => {
			let url = 'https://cn.bing.com/search?q=' + document.querySelector('.search-container input').value;
			window.open(url, '_blank');
		}
		if (document.querySelector('.n-button')) {
			document.querySelector('.n-button').onclick = () => {
				document.getElementById('dynamicHeader').style.display = 'none';
			}
		}
	</script>
	<?= $theme->footer() ?>
</body>

</html>