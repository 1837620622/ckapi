class BootstrapTable {

	static options = {
		table: null,
		act: 'getTable',
		url: null,
		status_api: 'fieldStatus',
		operate: {
			delete: true,
			status: true,
			update: true
		},
		loading: null
	};

	/**
	 * 表格相关的配置
	 **/
	static table_options = window.bootstrap_table_options;

	/**
	 * 用于演示的列信息
	 **/
	static columns = [];

	static init() {
		this.initColumns();
		const { url, act, table } = this.options;
		this.table_options.url = url ? url : `api.php?action=${act}&table=${table}`;
		this.table_options.columns = this.columns;

		this.bootstrapTable = $('table').bootstrapTable({
			...this.table_options,
			onPostBody: (data) => {
				// 删除已经存在的提示
				if ($('.tooltip').length > 0) $('.tooltip').remove();
				// 提示初始化
				if ($("[data-bs-toggle='tooltip']").tooltip && $("[data-bs-toggle='tooltip']").length > 0) $("[data-bs-toggle='tooltip']").tooltip();
				// 弹出框初始化
				var popover = $('[data-bs-toggle="popover"]');
				if (popover.popover && popover.length > 0) {
					popover.popover();
				}
				if (this.options.loading) this.options.loading.destroy();
				if ($('.selectpicker').selectpicker && $('.selectpicker').length > 0) $('.selectpicker').selectpicker(); // 下拉菜单初始化
			}
		});
	}

	/**
	 * 删除函数
	 */
	static delete(row) {
		const uniqueId = this.table_options.uniqueId;
		$.ajax({
			url: 'api.php?action=deleteTable',
			type: 'get',
			data: {
				table: this.options.table,
				[uniqueId]: row[uniqueId]
			},
			dataType: "json",
			beforeSend: () => {
				this.showLoading();
			},
			success: (data) => {
				this.hideLoading();
				if (data.code == 200) {
					this.refreshTable();
				} else {
					$.alert(data.message);
				}
			},
			error: (jqXHR, textStatus, errorThrown) => {
				console.log(jqXHR);
				console.log(textStatus);
				console.log(errorThrown);
				$.alert('删除失败！');
			}
		})
	}

	/**
	 * 调整状态函数
	 * @param {object} row
	 */
	static status(row) {
		const uniqueId = this.table_options.uniqueId;
		$.ajax({
			url: 'api.php?action=' + this.options.status_api,
			type: 'post',
			data: {
				table: this.options.table,
				[uniqueId]: row[uniqueId]
			},
			dataType: "json",
			beforeSend: () => {
				this.showLoading();
			},
			success: (data) => {
				this.hideLoading();
				if (data.code == 200) {
					this.refreshTable();
				} else {
					$.alert(data.message);
				}
			},
			error: (jqXHR, textStatus, errorThrown) => {
				console.log(jqXHR);
				console.log(textStatus);
				console.log(errorThrown);
				$.alert('设置失败！');
			}
		})
	}

	/**
	 * 编辑列函数
	 * @param {object} row
	 */
	static update(row) {
		const uniqueId = this.table_options.uniqueId;
		const url = `${location.href}?mod=update&${uniqueId}=${row[uniqueId]}`;
		const title = row.title ? `编辑 ${row.title}` : '编辑';
		YiHang.iframe(url, title, this.options.iframe, this.options.iframe);
	}

	static showLoading() {
		this.loading = this.bootstrapTable.lyearloading({ spinnerSize: 'lg' });
	}

	static hideLoading() {
		if (this.loading) {
			this.loading.destroy();
		}
	}

	static refreshTable() {
		this.options.loading = this.bootstrapTable.lyearloading({});
		$('table').bootstrapTable('refresh', { silent: true });
	}

	static initColumns() {
		this.columns.unshift({
			field: this.table_options.uniqueId,
			title: '编号',
			align: 'center',
			sortable: true,
			sortName: this.table_options.uniqueId,
			visible: false,
			width: 5,
			widthUnit: 'rem'
		});

		if (this.options.operate.status) {
			this.columns.push(this.createStatusColumn());
		}

		if (this.options.operate.delete || this.options.operate.update) {
			this.columns.push(this.createActionColumn());
		}
	}

	static createStatusColumn() {
		return {
			field: 'status',
			title: '状态',
			sortable: true,
			width: '70',
			widthUnit: 'px',
			align: 'center',
			formatter: (value, row) => {
				const status = row.status == '0'
					? '<span class="badge bg-danger status-button" title="点击激活" data-bs-toggle="tooltip" data-bs-placement="top">禁用</span>'
					: '<span class="badge bg-success status-button" title="点击禁用" data-bs-toggle="tooltip" data-bs-placement="top">正常</span>';
				return status;
			},
			events: {
				'click .status-button': (event, value, row) => this.status(row)
			}
		};
	}

	static createActionColumn() {
		const actions = [];
		if (this.options.operate.update) {
			actions.push('<span class="btn btn-sm btn-teal edit-btn" title="编辑" data-bs-toggle="tooltip" data-bs-placement="top"><i class="mdi mdi-pencil"></i></span>');
		}
		if (this.options.operate.delete) {
			actions.push('<span class="btn btn-sm btn-danger del-btn" title="删除" data-bs-toggle="tooltip" data-bs-placement="top"><i class="mdi mdi-window-close"></i></span>');
		}

		return {
			title: '操作',
			width: '95',
			widthUnit: 'px',
			align: 'center',
			formatter: () => actions.join(' '),
			events: {
				'click .edit-btn': (event, value, row) => this.update(row),
				'click .del-btn': (event, value, row) => this.delete(row)
			}
		};
	}

}