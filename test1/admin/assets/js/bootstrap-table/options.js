window.bootstrap_table_options = {
	classes: 'table table-bordered table-hover lyear-table',
	// 请求地址
	url: null,
	// 唯一ID字段
	uniqueId: 'id',
	striped: false,
	search: true,
	// 每行的唯一标识字段
	idField: 'id',
	// 是否启用点击选中行
	// clickToSelect: true,
	// 是否显示详细视图和列表视图的切换按钮(clickToSelect同时设置为true时点击会报错)
	// showToggle: true,
	dataType: 'json', // 请求得到的数据类型
	// 请求方法
	method: 'get',
	// 工具按钮容器
	toolbar: '#toolbar',
	// 是否分页
	pagination: true,
	// 是否显示所有的列
	showColumns: true,
	// 是否显示刷新按钮
	showRefresh: true,
	// 显示图标
	showButtonIcons: true,
	// 显示文本
	showButtonText: false,
	// 显示全屏
	showFullscreen: true,
	// 开关控制分页
	// showPaginationSwitch: true,
	// 总数字段
	totalField: 'total',
	// 当字段为 undefined 显示
	undefinedText: '-',
	// 排序方式
	sortOrder: "asc",

	/** 图标配置 */
	iconsPrefix: 'mdi', // 图标前缀
	iconSize: 'mini', // 图标大小
	icons: {
		// 图标的设置
		columns: 'mdi-table-column-remove',
		paginationSwitchDown: 'mdi-door-closed',
		paginationSwitchUp: 'mdi-door-open',
		refresh: 'mdi-refresh',
		toggleOff: 'fa-toggle-off',
		toggleOn: 'fa-toggle-on',
		fullscreen: 'mdi-monitor-screenshot',
		detailOpen: 'fa-plus',
		detailClose: 'fa-minus'
	},

	/* 分页相关的配置 */
	sidePagination: "client", // 分页方式：[client] 客户端分页，[server] 服务端分页
	pageNumber: 1, // 初始化加载第一页，默认第一页
	pageSize: 10, // 每页的记录行数
	pageList: [5, 10, 25, 50, 100], // 可供选择的每页的行数 - (亲测大于1000存在渲染问题)
	paginationLoop: false, // 在上百页的情况下体验较好 - 能够显示首尾页
	paginationPagesBySide: 2, // 展示首尾页的最小页数

	/* 按钮相关配置 */
	buttonsClass: 'default', // 按钮的类
	buttonsPrefix: 'btn' // 类名前缀
}