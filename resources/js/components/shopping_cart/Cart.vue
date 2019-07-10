<template>
	<div>
        <navbar></navbar>
		<div id="cartContent" class="container-fluid">
			
		</div>
        <productsFooter></productsFooter> 
	</div>
</template>

<script>
import navbar from '../navigation/Navbar.vue';
import productsFooter from '../footer/Footer.vue';


export default {
  components: {
  	navbar, productsFooter
  },
  data () {
    return {

    }
  },
  mounted() {
  	axios.get('/cart')
  	  .then((res) => {
  	  	console.log(res);
  	})
  }
};
</script>

<style scoped>
	#cartContent {
		padding-top: 10vh;
	 	min-height: 80vh;
	}
</style>