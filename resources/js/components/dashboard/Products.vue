<template>
	<div>
		<heading>PRODUCTS</heading>
		<span>
			<a id="createNewProduct" class="btn btn-dark text-white font-weight-bold" href="/dashboard/products/create">+ New product</a>
		</span>
		<div>
			<table>
				  <tr class="tableHead">
				   	    <th v-for='row in table'>{{ row.cell }}</th>
				  </tr>
				  <tr class="tableRow" v-for='product in products'>
				    	<td><img :src="product.image1" :alt="product.nameS"></td>
				    	<td>{{ product.name }}</td>
				    	<td>${{ product.price }}</td>
				    	<td>{{ product.brand }}</td>
				    	<td>{{ product.category }}</td>
				    	<td>{{ product.gender }}</td>
				  </tr>
			</table>


			<!-- <table>
				<thead>
					<tr v-for='row in table'>
						<th>{{ row.cell }}</th>
					</tr>
				</thead>\
				<tbody>
					<tr v-for='product in products'>
						<td :src="product.image1" :alt="product.nameS">
						<td>{{ product.name }}</td>
						<td>{{ product.price }}</td>
						<td>{{ product.category }}</td>
						<td>{{ product.gender }}</td>
						<td>{{ product.brand }}</td>
						<td>
							<td>{{ product.size_35 ? 'true' : 'false' }}</td>
							<td>{{ product.size_36 ? 'true' : 'false' }}</td>
							<td>{{ product.size_37 ? 'true' : 'false' }}</td>
							<td>{{ product.size_38 ? 'true' : 'false' }}</td>
							<td>{{ product.size_39 ? 'true' : 'false' }}</td>
							<td>{{ product.size_40 ? 'true' : 'false' }}</td>
							<td>{{ product.size_41 ? 'true' : 'false' }}</td>
							<td>{{ product.size_42 ? 'true' : 'false' }}</td>
							<td>{{ product.size_43 ? 'true' : 'false' }}</td>
							<td>{{ product.size_44 ? 'true' : 'false' }}</td>
							<td>{{ product.size_45 ? 'true' : 'false' }}</td>
							<td>{{ product.size_46 ? 'true' : 'false' }}</td>
							<td>{{ product.size_47 ? 'true' : 'false' }}</td>
							<td>{{ product.size_48 ? 'true' : 'false' }}</td>
							<td>{{ product.size_49 ? 'true' : 'false' }}</td>
						</td>
					</tr>
				</tbody>
			</table> -->
			
		<!-- 	<div v-for='product in products' class="d-flex productRow"> 
				<img :src="product.image1" :alt="product.nameS">
				<span>{{ product.name }}</span>
				<span>{{ product.price }}</span>
				<span>{{ product.category }}</span>
				<span>{{ product.gender }}</span>
				<span>{{ product.brand }}</span>
				<div>
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
			</div> -->
		</div>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				products: [],
				brands: [],
				prices: [],
				table: [
					{ cell: 'Image' },
					{ cell: 'Name' },
					{ cell: 'Price' },
					{ cell: 'Brand' },
					{ cell: 'Category' },
					{ cell: 'Gender' },
					{ cell: 'Available Sizes' },
				]
			}
		},
		mounted() {
			axios.all([
			    axios.get('/api/brands'),
			    axios.get('/api/types'),
			    axios.get('/products'),
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

<style scoped> 
	#createNewProduct {
		position: absolute;
    	right: 1vw; 
    }	
    img {
    	width: 40px;
    }
    table {
    	margin-top: 80px;
    	width: 100%;
		border: 1px solid #ccc;
    }
    .tableHead {
    	font-size: 15px;
    	text-transform: capitalize;
    	background: #ccc;
    	color: #fff;
    	font-weight: bold;
    	text-shadow: 1px 1px 1px black;
}
    .tableRow {
    	background: #f2f2f2;
    	font-size: 14px;
    	padding: 5px;
    }
    
</style>