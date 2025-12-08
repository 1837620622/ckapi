/**
 * @package MusicPlayer
 * @author 易航
 * @link http://bri6.cn
 * @giant APlayer
*/
class MusicPlayer {

	constructor(options) {
		/**
		* 播放器
		*/
		this.PLAYER = null;

		/**
		* 存储的音乐信息
		*/
		this.MUSIC_STORAGE = this.getMusic();

		/**
		 * 恢复播放
		 */
		this.恢复播放 = true;

		this.OPTIONS = options;

		return this.init();
	}

	/**
	 * 初始化播放器
	 */
	init() {
		// 优化全部音乐信息
		this.setMusic();

		// 创建音乐播放器
		this.createPlayer();

		// 监听播放器事件
		this.listen();

		return this.PLAYER;
	}

	/**
	 * 监听播放器事件
	 */
	listen() {
		window.onbeforeunload = () => {
			this.storageMusic();
		}
		document.getElementsByTagName('a').onclick = () => {
			this.storageMusic();
		}
		this.PLAYER.on('loadeddata', () => {
			this.initStorageMusic();
			// this.storageMusic();
			this.OPTIONS['autotheme'] ? this.autoTheme(this.PLAYER.list.index) : null;
		});
		this.PLAYER.on('error', () => {
			this.PLAYER.skipForward();
			this.PLAYER.seek(0);
		});
	}

	/**
	 * 创建播放器
	 */
	createPlayer() {
		this.PLAYER = new APlayer(this.OPTIONS);
	}

	/**
	 * 播放音乐
	 */
	playMusic() {
		this.PLAYER.play();
	}

	/**
	 * 优化音乐信息
	 * @return object
	 */
	setMusic() {
		let music = this.OPTIONS.audio;
		for (let key in music) {
			// 音频名称
			if (!music[key]['name']) {
				music[key]['name'] = music[key]['title'] ? music[key]['title'] : '歌曲'.key;
			}
			// 音频作者
			if (!music[key]['artist']) {
				music[key]['artist'] = music[key]['author'] ? music[key]['author'] : '无信息';
			}
			// 音频类型
			if (!music[key]['type']) {
				music[key]['type'] = 'auto';
			}
			// 音频封面
			if (!music[key]['cover']) {
				music[key]['cover'] = music[key]['pic'] ? music[key]['pic'] : 'http://cdn.bri6.cn/images/202208032036881.jpg';
			}
			// 音频歌词
			if (!music[key]['lrc']) {
				music[key]['lrc'] = '[00:00.000] 暂无歌词';
			}
		}
		this.OPTIONS.audio = music;
		return music;
	}

	/**
	 * 初始化存储音乐信息
	 */
	initStorageMusic() {
		let storage_music = this.MUSIC_STORAGE;
		if (!storage_music || this.恢复播放 === false) {
			return;
		}
		let music = this.PLAYER.list.audios[this.PLAYER.list.index];
		for (const key in storage_music) {
			if ((music['url'] == storage_music[key]['url']) || (music['artist'] == storage_music[key]['artist'] && music['name'] == storage_music[key]['name'])) {
				this.PLAYER.seek(storage_music[key].time);
				this.恢复播放 = false;
			}
		}
	}

	/**
	 * 获取存储的音乐信息
	 * @return object|null
	 */
	getMusic() {
		if (localStorage.getItem('music_list')) {
			return JSON.parse(localStorage.getItem('music_list'));
		}
		return null;
	}
	/**
	 * 存储音乐
	 */
	storageMusic() {
		let music = this.PLAYER.list.audios[this.PLAYER.list.index]
		music.time = this.PLAYER.audio.currentTime;
		let storage_music = this.MUSIC_STORAGE;
		if (storage_music) {
			let music_storage = true;
			for (let key in storage_music) {
				if ((music['url'] == storage_music[key]['url']) || (music['artist'] == storage_music[key]['artist'] && music['name'] == storage_music[key]['name'])) {
					storage_music[key]['time'] = music.time;
					music_storage = false;
				}
			}
			if (music_storage) {
				storage_music.push(music);
			}
		} else {
			storage_music = [music];
		}
		localStorage.setItem('music_list', JSON.stringify(storage_music));
	}

	/**
	 * 音乐播放器自动主题色
	 */
	autoTheme(index) {
		if (this.PLAYER.list.audios[index]) {
			if (!this.PLAYER.list.audios[index].theme) {
				let xhr = new XMLHttpRequest();
				xhr.open('GET', this.PLAYER.list.audios[index].cover, true);
				xhr.responseType = 'blob';
				xhr.send();
				xhr.onload = () => {
					var coverUrl = URL.createObjectURL(xhr.response);
					let image = new Image();
					image.onload = () => {
						let colorThief = new ColorThief();
						let color = colorThief.getColor(image);
						this.PLAYER.theme(`rgb(${color[0]}, ${color[1]}, ${color[2]})`, index);
						URL.revokeObjectURL(coverUrl)
					};
					image.src = coverUrl;
				}
			}
		}
	}
}