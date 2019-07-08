<template>
	<div>
		<span class="heading">
			<slot></slot>
		</span>
	</div>	
</template>

<script>
	export default {

	};
</script>

<style scoped>
	div {
		width: 100%;
		background: #ccc;
		text-align: center;
		padding: 20px 10px;
		margin: 20px auto;
		border-radius: 3px;

	}
	.heading {
		font-size: 1.6rem;
		font-weight: bold;
		color: #424242;	}
</style>