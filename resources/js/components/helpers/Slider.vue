<template>
	<div class="center">
		<div>
			<span class="sliderMessage">
				<i v-if='i != 1' :class="texts[i].class" class="mr-2"></i>
				<img id="free-shipping" v-if='i == 1' src="img/free-shipping.png" alt="">
				{{ message }}</span>
		</div>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				message: '',
				texts: [ 
					{ class: 'fas fa-shopping-cart', text: 'Browse Best Quality Sneakers' },
					{ class: '', text: 'Free Standard Shipping' },
					{ class: 'fas fa-percent', text: 'Buy two products and get 10% off total price' },
					{ class: 'fab fa-paypal', text: 'Secure Checkout' },
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
		}
	};
</script>

<style scoped>
	.center {
		text-align: center;
		padding: 75px 0 15px;
	} 
	.center div {
		background: #f1f1f1;
		padding: 20px 0;
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
	#free-shipping {
		width: 22px;
		position: relative;
		bottom: 5px;
		right: 5px;
	}
</style>