<template>
	<div class="center">
		<div>
			<i @click='textBack()' class="fas fa-chevron-left"></i>
			<span class="sliderMessage">{{ message }}</span>
			<i @click='textChange()' class="fas fa-chevron-right"></i>
		</div>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				message: '',
				texts: [ 
					{ text: 'Shop Now' },
					{ text: 'Free Delivery' },
					{ text: 'Log in to get coupons' },
					{ text: 'Get 20% off second item' },
				],
				i: 0,
				change: true
			}
		},
		mounted() {
			this.message = this.texts[this.i].text;
			if(this.change == true)
			{
				setInterval(() => {
					this.textChange();
				},4000) 	
			}	
		},
		methods: {
			textChange() {
				this.i = this.i + 1; 
				if(this.i == this.texts.length)
				{
					this.i = 0;
				}	
				this.message = this.texts[this.i].text;
			},
			textBack() {
				if(this.i == 0)
				{
					this.i = 3;
					this.message = this.texts[this.i].text;
					return; 
				}	
				this.i = this.i - 1; 
				clearInterval(this.i);

				this.message = this.texts[this.i].text;
				this.change = false;
				setTimeout (() => {
					this.change = true;
				}, 1000)
			}
		}
	};
</script>

<style scoped>
	.center {
		text-align: center;
		background: #f8fafc;
		padding: 15px 0;
	}
	.fa-chevron-left {
		position: absolute;
		left: 10vw;
	}
	.fa-chevron-right {
		position: absolute;
		right: 10vw;
	}
	.sliderMessage {
		font-size: 16px;
		font-size: 17px;
		font-weight: 600;
	}
</style>