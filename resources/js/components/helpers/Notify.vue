<template>
	<div v-if='message'>
		<div id="notification" :class="{ error: error}">
			{{ message }}
		</div>
		
	</div>
</template>

<script>
	export default {
		props: {  
			message: { type: String , required: true },
			error: { type: Boolean , default: false},
		},
		data() {
			return {
				show: false,
			}
		},
		mounted() {
				this.resetMessage(3000);
		},
		updated() {
			this.resetMessage(3000);
			console.log('componennnnnttt updateeeeddd');
		},
		methods: {
			resetMessage(timer) {
				if(!timer) timer = 2500;
				console.log('timer', timer);
				setTimeout(() => {
				  this.$parent.message = '';
				}, timer)
			}
		}
	};
</script>

<style scoped>
	#notification {
		position: fixed;
		top: 2vh;
		right: 3vw;
		padding: 35px 25px;
		max-width: 300px;
		font-size: 1rem;
		font-weight: 400;
		border-radius: 5px;
		background: #6ed66e;
		color: #fff;
		z-index: 10;
	}
	.error {
		background: #ff3c09 !important;
		color: #fff;
	}
</style>