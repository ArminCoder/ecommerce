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
				show: false
			}
		},
		mounted() {
			setTimeout(() => {
			  this.$parent.message = '';
			}, 3000)
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
	}
	.error {
		background: #ff3c09 !important;
		color: #fff;
	}
</style>