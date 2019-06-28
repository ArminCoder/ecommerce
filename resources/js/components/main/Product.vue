<template>
	<div>
        <navbar></navbar>
		<div class="container">
			<div class="row">
				<div class="col-9">
					<img :src="product.image1" alt="product.name">
				</div>
				<div class="col-3">
					<div class="d-flex">
						<span>{{product.gender | capitalize}} 's Shoe</span>
						<span>${{ product.price }}</span>
					</div>
					<div>
						<span>{{ product.name }}</span>
					</div>
				</div>
			</div>
        </div>
        <productsFooter></productsFooter> 
		
	</div>
</template>

<script>
	import { eventBus } from '../../app.js';
	import navbar from '../navigation/Navbar';
	import productsFooter from '../footer/Footer';

	export default {
		components: { navbar, productsFooter },
		data() {
			return {
				product: [],
				requestedId: ''
			}
		},
		created() {
			console.log('ROUTE PARAMETER:::', this.$route.params.id);
			this.requestedId = this.$route.params.id;
		},
		mounted() {
			axios.get('/api/products/' + this.requestedId, {  
			  	params: {
			    	
			 	}
			 	}).then((res) => {
					console.log('RES', res.data);
					this.product = res.data;
				})
		},
		filters: {
			capitalize: function (value) {
			    if (!value) return ''
			    value = value.toString()
			    return value.charAt(0).toUpperCase() + value.slice(1)
			 }
		}
	};
</script>

<style scoped>
	.d-flex {
		justify-content: space-between;
	}
</style>