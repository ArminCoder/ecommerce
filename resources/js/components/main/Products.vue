<template>
	<div class="products">
		<div @click='checkProduct(product)' class="columnDisplay p-4 p-relative" v-for='product in products'>
				<img ref='mainProductImg' @mouseover='changeImg(product, $event)' :src="product.image1" :alt="product.name">
				<div v-if='hoveredProduct.id == product.id' class="colorDetails">
					<img @mouseover='changeImgSrc($event, product)' v-if='product.image2' :src="product.image2" :alt="product.name">
					<img @mouseover='changeImgSrc($event, product)' v-if='product.image3' :src="product.image3" :alt="product.name">
					<img @mouseover='changeImgSrc($event, product)' v-if='product.image4' :src="product.image4" :alt="product.name">
					<img @mouseover='changeImgSrc($event, product)' v-if='product.image5' :src="product.image5" :alt="product.name">
				</div>
				<span class="productInfo w-100 text-center columnDisplay absBottom" :class='{ mt1 : hoveredProduct.id  }'>
					<span class="productHeader">{{ product.name }}</span>
					<small class="productSubheader">{{ product.type }}</small>
					<span class="productPrice font-weight-bold">${{ product.price }}</span>
				</span>
		</div>
	</div>
</template>
<script>
	import { eventBus } from '../../app.js';

	export default {
		data() {
			return {
				products: [],
				pickedGender: [],
				pickedCategory: [],
				pickedBrand: [],
				pickedPrice: '',
				hoveredProduct: {
					id: ''
				},
				productImage: ''
			}
		},
		mounted() {
			this.getProducts();	
			eventBus.$on('event', (data) => {
				this.pickedGender = data.pickedGender;
				this.pickedCategory = data.pickedCategory;
				this.pickedBrand = data.pickedBrand;
				this.pickedPrice = data.pickedPrice;	
				this.getProducts();
			})
		},
		methods: {
			checkProduct(product) {
				this.$router.push({ name: 'product', params: { id: product.id } })
			},
			changeImgSrc(event, product) {
				// TODO: change main img src with the hovered one
			},
			getProducts() {
				axios.get('/products', {  
			  	params: {
			    	type: this.pickedCategory,
			    	gender: this.pickedGender,
			    	brand: this.pickedBrand,
			    	price: this.pickedPrice
			 	}
			 	}).then((res) => {
					this.products = res.data;
				})
			},
			changeImg(product , event) {
				this.colorDetails = true;
				this.hoveredProduct.id = product.id;
			},
			originalImg(product , event) {

			}
		},
		computed: {
			filteredProducts() {
				
			}
		}
	};
</script>

<style scoped>
    div.products {
    	display: grid;
    	grid-template-columns: repeat(5,1fr);
    }
    .columnDisplay {
    	display: flex;
    	flex-direction: column;
    }
    div.columnDisplay {
    	border: 1px solid #dcdcdc;
    	border-radius: 8px;
    	margin: 6px;
    	background: #f8fafc;
    	position: relative;
    }
    .p-2 {
    	padding: 5px;
    }
	img {
		width: 100%;
		transition-delay: 1s;
		transition: all 2s ease-in;
    	cursor: pointer;
	}
	
	.productInfo span.productHeader {
		font-size: 17px;
		font-weight: bold;
	}
	.productPrice {
		font-size: 21px;
	}
	div.colorDetails {
		display: flex;
		justify-content: center;
	}
	div.colorDetails img {
		width: 50px;
	}
	

@media(max-width: 1400px) {
	div.products {
    	grid-template-columns: repeat(3,1fr);
    }
}    

@media(max-width: 768px) {
	div.products {
    	grid-template-columns: repeat(2,1fr);
    }    
}
</style>