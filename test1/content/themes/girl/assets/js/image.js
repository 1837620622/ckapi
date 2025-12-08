$(document).ready(() => {
	new GirlImage()
})
class GirlImage {
	type = 0
	AutoSwitch = true
	constructor() {
		$('#next').click(() => {
			this.switchImage()
		})
		$('#type').click(() => {
			this.type = this.type + 1;
			if (this.type > 2) {
				this.type = 0;
			}
		})
		$('#switch').click(() => {
			this.AutoSwitch = !this.AutoSwitch;
			$('#switch').text(this.AutoSwitch ? '连续' : '手动')
			$('#switch').toggleClass('btn-secondary')
		})
		this.switchImage()
	}
	switchImage() {
		let url = getUrl();
		$('#img').attr('src', url);
		$('#next').css('pointer-events', 'none');
		$('#next').addClass('btn-secondary')
		$('#img').get(0).onload = () => {
			$('#next').css('pointer-events', 'auto');
			$('#next').removeClass('btn-secondary')
			setTimeout(() => {
				if (this.AutoSwitch) {
					this.switchImage()
				}
			}, 3000);
		}
		$('#img').get(0).onerror = () => {
			$('#next').css('pointer-events', 'auto');
			$('#next').removeClass('btn-secondary')
			setTimeout(() => {
				if (this.AutoSwitch) {
					this.switchImage()
				}
			}, 1000);
		}
	}
}