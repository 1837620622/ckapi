<div id="sidebar" class="sticky sidebar-nav fade mini-sidebar" style="width: 60px;">
	<div class="modal-dialog h-100  sidebar-nav-inner">
		<div class="sidebar-logo border-bottom border-color">
			<!-- logo -->
			<div class="logo overflow-hidden">
				<a href="/" class="logo-expanded">
					<img src="/content/static/images/logo-banner.png" height="40" class="logo-light" alt="<?= $this->site->title ?>">
					<img src="/content/static/images/logo-banner.png" height="40" class="logo-dark d-none" alt="<?= $this->site->title ?>">
				</a>
				<a href="/" class="logo-collapsed">
					<img src="/content/static/images/logo.png" height="40" class="logo-light" alt="<?= $this->site->title ?>">
					<img src="/content/static/images/logo.png" height="40" class="logo-dark d-none" alt="<?= $this->site->title ?>">
				</a>
			</div>
			<!-- logo end -->
		</div>
		<div class="sidebar-menu flex-fill">
			<div class="sidebar-scroll">
				<div class="sidebar-menu-inner">
					<ul>
						<li class="sidebar-item">
							<a href="/" class="smooth">
								<i class="iconfont icon-zhuye1 icon-lg mr-2"></i>
								<span>首页</span>
							</a>
						</li>
						<li class="sidebar-item">
							<a href="<?= $this->buildUrl('contribute') ?>" class="smooth">
								<i class="iconfont icon-rizhi icon-lg mr-2"></i>
								<span>提交</span>
							</a>
						</li>
						<li class="sidebar-item">
							<a href="<?= $this->buildUrl('about') ?>" class="smooth">
								<i class="iconfont icon-guanyu icon-lg mr-2"></i>
								<span>关于</span>
							</a>
						</li>
						<?php
						$sort = isset($sort) ? $sort : $this->getSort();
						foreach ($sort as $key => $value) {
						?>
							<li class="sidebar-item">
								<a href="#term-<?= $value->id ?>" class="smooth">
									<?= empty($value->fields->icon) ? '<i class="iconfont icon-tag icon-lg mr-2"></i>' : '<i class="iconfont ' . $value->fields->icon . ' icon-lg mr-2"></i>' ?>
									<span><?= $value->title ?></span>
								</a>
							</li>
						<?php
						}
						?>
				</div>
			</div>
		</div>
		<div class="border-top py-2 border-color">
			<div class="flex-bottom">
				<ul>
					<li id="menu-item-213" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-213 sidebar-item">
						<a target="_blank" rel="noopener" href="http://wpa.qq.com/msgrd?v=3&uin=<?= $this->options('qq') ?>&site=qq&menu=yes">
							<i class="iconfont icon-QQ icon-fw icon-lg mr-2"></i>
							<span>联系站长</span></a>
					</li>
					<li id="menu-item-237" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-237 sidebar-item">
						<a href="/contribute.html">
							<i class="iconfont icon-tijiao icon-fw icon-lg mr-2"></i>
							<span>网站提交</span></a>
					</li>
					<li id="menu-item-213" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-213 sidebar-item">
						<a rel="noopener" href="/about.html">
							<i class="iconfont icon-xin1 icon-fw icon-lg mr-2"></i>
							<span>关于导航</span></a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>