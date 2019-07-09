<template>
	<div class="d-grid" v-if='popupActive'>
		<div class="mb-2">
			<slot name='text'></slot>
		</div> 
		<div>
			<slot name='approve'></slot>
			<slot name='deny'></slot>
		</div>	
	</div>
</template>

<script>
export default {
  props: {
  	popupActive : {
  		type: Boolean,
  		default: false
  	},	
  	approveText: {
  		type: String,
  	},
  	denyText: {
  		type: String,
  	},
  	methodName: {
  		type: String
  	}
  },
  data () {
    return {

    }
  },
  methods: {
  
  }
};
</script>

<style scoped>
	.d-grid {
	    position: absolute;
	    display: grid;
	    justify-items: center;
	    padding: 10px;
  		white-space: nowrap;
	    background: #f5f5f5;
	    border: 1px solid #ccc;
	    border-radius: 4px;
	    max-width: 150px;
	    margin-left: -70px;
	    z-index: 2;
	}
</style>