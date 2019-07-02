<template>
	<div>
		<heading>PRODUCTS</heading>
		<div>
			<div v-for='product in products' class="d-flex"> 
				<img :src="product.image1" :alt="product.nameS">
				<span>{{ product.name }}</span>
				<span>{{ product.category }}</span>
				<span>{{ product.gender }}</span>
				<span>{{ product.price }}</span>
				<span>{{ product.brand }}</span>
				<span>{{ product.size_35 ? 'true' : 'false' }}</span>
				<span>{{ product.size_36 ? 'true' : 'false' }}</span>
				<span>{{ product.size_37 ? 'true' : 'false' }}</span>
				<span>{{ product.size_38 ? 'true' : 'false' }}</span>
				<span>{{ product.size_39 ? 'true' : 'false' }}</span>
				<span>{{ product.size_40 ? 'true' : 'false' }}</span>
				<span>{{ product.size_41 ? 'true' : 'false' }}</span>
				<span>{{ product.size_42 ? 'true' : 'false' }}</span>
				<span>{{ product.size_43 ? 'true' : 'false' }}</span>
				<span>{{ product.size_44 ? 'true' : 'false' }}</span>
				<span>{{ product.size_45 ? 'true' : 'false' }}</span>
				<span>{{ product.size_46 ? 'true' : 'false' }}</span>
				<span>{{ product.size_47 ? 'true' : 'false' }}</span>
				<span>{{ product.size_48 ? 'true' : 'false' }}</span>
				<span>{{ product.size_49 ? 'true' : 'false' }}</span>
			</div>
		</div>
		
	</div>
</template>

<script>
	export default {
		data() {
			return {
				products: [],
				brands: [],
				prices: []
			}
		},
		mounted() {
			axios.all([
			    axios.get('/api/brands'),
			    axios.get('/api/types'),
			    axios.get('/api/products'),
		    ])
			.then(axios.spread((brandsRes, typesRes, productsRes) => {
			  	console.log('RESPONSES:::,', brandsRes, typesRes, productsRes);
			  	this.products = productsRes.data;
			    this.brands = brandsRes.data;
			    this.categories = typesRes.data;
			}));
		}
	};
</script>