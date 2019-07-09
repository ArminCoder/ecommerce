<template>
	<div>
		<heading>PRODUCTS</heading>
		<span>
			<a id="createNewProduct" class="btn btn-dark text-white font-weight-bold" href="/dashboard/products/create">+ New product</a>
		</span>
		<div v-if='!rerendered'>
			<table>
				  <tr class="tableHead">
				   	    <th class="tableHeadCell" v-for='row in table'>{{ row.cell }}</th>
				  </tr>
				  <tr class="tableRow" v-for='product in products'>
				    	<td class="text-center"><img :src="product.image1" :alt="product.name"></td>
				    	<td>{{ product.name }}</td>
				    	<td>${{ product.price }}</td>
				    	<td>{{ product.brand }}</td>
				    	<td>{{ product.type }}</td>
				    	<td>{{ product.gender }}</td>
				    	<td class="sizeTableCell">
							<span v-if='product.size_35'>{{ 35 }}</span>
							<span v-if='product.size_36'>{{ 36 }}</span>
							<span v-if='product.size_37'>{{ 37 }}</span>
							<span v-if='product.size_38'>{{ 38 }}</span>
							<span v-if='product.size_39'>{{ 39 }}</span>
							<span v-if='product.size_40'>{{ 40 }}</span>
							<span v-if='product.size_41'>{{ 41 }}</span>
							<span v-if='product.size_42'>{{ 42 }}</span>
							<span v-if='product.size_43'>{{ 43 }}</span>
							<span v-if='product.size_44'>{{ 44 }}</span>
							<span v-if='product.size_45'>{{ 45 }}</span>
							<span v-if='product.size_46'>{{ 46 }}</span>
							<span v-if='product.size_47'>{{ 47 }}</span>
							<span v-if='product.size_48'>{{ 48 }}</span>
							<span v-if='product.size_49'>{{ 49 }}</span>
				        </td>
				        <td class="tools">
				        	<span @click='editProduct(product)' class="fas fa-edit mx-1"></span>
				        	<span @click='productID = product.id; popupActive = true' class="fas fa-times-circle mx-1"></span>
				        	<popup v-if='productID == product.id' :popupActive='popupActive'>
				        		<template v-slot:text>
				        			<span>Delete Product?</span>
				        		</template>
				        		<template v-slot:approve>
				        			<span @click='deleteProduct(product)' class="text-white bg-primary popupButtons">YES</span>
				        		</template>
				        		<template v-slot:deny>
				        			<span @click='popupActive = false' class="text-white bg-secondary popupButtons">NO</span>
				        		</template>
				        	</popup>
				        </td>
				  </tr>
			</table>
		</div>
		<notify v-if='message' :message='message' :error='error' :success='success'></notify>
		<editProduct ref='editProduct'></editProduct>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				products: [],
				prices: [],
				table: [
					{ cell: 'Image' },
					{ cell: 'Name' },
					{ cell: 'Price' },
					{ cell: 'Brand' },
					{ cell: 'Category' },
					{ cell: 'Gender' },
					{ cell: 'Available Sizes' },
				],
				sizes: [],
				message: '',
				success: false,
				error: false,
				rerendered: false,
				popupActive: false,
				productID : ''
			}
		},
		mounted() {
			this.getData();
		},
		methods: {
			getData() {
				 axios.get('/products')
				.then((productsRes) => {
				  	this.products = productsRes.data;
				});
			},
			editProduct(product) {
		  		this.$refs.editProduct.openModal = true;
		  		this.$nextTick(() => {
		  			this.$refs.editProduct.singleProduct = product;
		  			this.$refs.editProduct.editProduct();
		  		});
			},
			deleteProduct(product) {
				axios.delete('/products/' + product.id)
		            .then((response) => {
		              if(response.status == 200) 
		              {
		              	  console.log('response', response);    
		                  this.message = response.data.message;
		                  this.rerendered = true;
		                  this.success = true;
		                  setTimeout(() => {
		                  	this.rerendered = false;
							this.getData();
		                  }, 500);
		              }
		            })
		            .catch(function(error) {
		            	this.error = true;
		            	this.message = 'Oops! Something went wrong, please try again.';
		                console.log(error);
		            });
			},
			showSuccessMessage(message) {
				this.message = message;
				this.success = true;
				setTimeout(() => {
					this.message = '';
					this.success = false;
				}, 2000);
			},
			confirmDelete() {
				console.log('it works')
			}
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
    	border-bottom: 1px solid #ccc;
    	height: 70px;
    }
 	.tableHeadCell:nth-child(1) {
 		text-align: center;
 	}

    .sizeTableCell {
    	width: 110px;
    	display: grid;
    	grid-template-columns: repeat(5,1fr);
    	height: 70px;
    	align-items: center;
    }
    .tools {
    	position: absolute;
    	right: 2vw;
    	margin-top: -45px;
    }
    .fas {
    	cursor: pointer;
    }
    #singleProductEdit {
    	padding: 40px 20px 0;
    	display: flex;
    	justify-content: space-evenly;
    }
    .d-grid {
		display: grid;
    }
    .singleProductCheckboxes {
    	display: grid;
    	grid-template-columns: repeat(5,1fr);
    }
    .title {
    	font-size: 1.1rem;
    	font-weight: bold;
    }
    .popupButtons {
    	padding: 2px;
    	border: 1px solid #ccc;
    	border-radius: 4px;
    	cursor: pointer;
    }
</style>