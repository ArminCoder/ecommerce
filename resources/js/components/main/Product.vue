<template>
	<div>
        <navbar></navbar>
	
		<div class="row">
			<div class="col-9">
				<img :src="product.image1" alt="product.name">
			</div>
			<div class="col-3"></div>
		</div>
        
        <productsFooter></productsFooter> 
		
	</div>
</template>

<script>
	import navbar from '../navigation/Navbar';
	import productsFooter from '../footer/Footer';

	export default {
		components: { navbar, productsFooter },
		data() {
			return {
				product: []
			}
		},
		mounted() {
			axios.get('/api/products/1', {  
			  	params: {
			    	
			 	}
			 	}).then((res) => {
					console.log(res.data);
					this.product = res.data;
				})
		}
	};
</script>