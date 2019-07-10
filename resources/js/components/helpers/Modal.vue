<template>
	<div id="modalBackgound">
		<div id="modalContent">
			<slot></slot>
		</div>
	</div>	
</template>

<script>
export default {
  data () {
    return {

    }
  }
};
</script>

<style scoped>
	#modalBackgound {
		background: rgba(255,255,255,0.9);
		position: fixed;
		width: 100%;
		height: 100%;
		top: 0;
		left: 0;
	}
	#modalContent {
		width: 70vw;
		background: #fff;
		border: 2px solid #ccc;
		position: absolute;
		left: 50%;
		top: 50%;
		transform: translate(-50%, -50%);
		box-shadow: 2px 2px 10px #ccc, -2px -2px 10px #ccc;
	}

</style>