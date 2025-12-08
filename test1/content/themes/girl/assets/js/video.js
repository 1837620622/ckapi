class RandomVideo {

	constructor(options = []) {
		/**
		* 播放器
		*/
		this.PLAYER = null;

		this.OPTIONS = options;

		this.AUTO_SWITCH = true;

		return this.init();
	}

	/**
	 * 初始化播放器
	 */
	init() {
		this.createPlayer();
		this.listen()
		this.autoSwitch()
	}

	/**
	 * 创建播放器
	 */
	createPlayer() {
		this.PLAYER = new DPlayer({
			container: document.getElementById('dplayer'), // 播放器容器元素
			autoplay: true, // 视频自动播放
			theme: '#409eff', // 主题色
			// lang: '', // 可选值: 'en', 'zh-cn', 'zh-tw'
			preload: 'metadata', // 视频预加载，可选值: 'none', 'metadata', 'auto'
			loop: true, // 视频循环播放
			screenshot: false, // 开启截图，如果开启，视频和视频封面需要允许跨域
			airplay: true, // 在 Safari 中开启 AirPlay
			volume: 1, // 默认音量，请注意播放器会记忆用户设置，用户手动设置音量后默认音量即失效
			playbackSpeed: [2.00, 1.75, 1.50, 1.25, 1.00, 0.75, 0.50, 0.25], // 可选的播放速率，可以设置成自定义的数组
			video: {
				url: getUrl()
			},
		})
	}

	/**
	 * 监听播放器事件
	 */
	listen() {
		this.PLAYER.video.onended = () => {
			this.AUTO_SWITCH ? this.switch() : null;
		}
		this.PLAYER.video.onerror = () => {
			setTimeout(() => {
				this.switch();
			}, 2000);
		}
		document.getElementById('next').onclick = () => {
			this.switch();
		}
	}

	/**
	 * 切换视频
	 */
	switch() {
		this.PLAYER.switchVideo(
			{
				'url': getUrl()
			}
		)
		this.PLAYER.play();
		this.PLAYER.video.onloadeddata = () => {
			this.PLAYER.play();
		}
	}

	autoSwitch() {
		var switch_btn = document.getElementById('switch');
		switch_btn.onclick = () => {
			this.AUTO_SWITCH = !this.AUTO_SWITCH;
			document.getElementById('switch').innerText = this.AUTO_SWITCH ? '连续' : '手动';
			if (this.AUTO_SWITCH) {
				switch_btn.className = 'btn btn-primary';
			} else {
				switch_btn.className = 'btn btn-secondary';
			}
		}
	}
}
new RandomVideo()