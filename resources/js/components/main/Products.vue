<template>
	<div class="products">
		<div class="columnDisplay p-4 p-relative" v-for='product in products'>
				<img @mouseover='changeImg(product, $event)' @mouseleave='originalImg(product, $event)' :src="product.image1" :alt="product.name">
				<span class="productInfo w-100 text-center columnDisplay absBottom mt-1">
					<span class="productHeader">{{ product.name }}</span>
					<small class="productSubheader">{{ product.type }}</small>
					<span class="productPrice font-weight-bold">${{ product.price }}</span>
				</span>
		</div>
	</div>
</template>
<script>
	export default {
		data() {
			return {
				products: []
			}
		},
		mounted() {
			axios.get('/api/products').then((res) => {
				console.log(res);
				this.products = res.data.data;
			})
		},
		methods: {
			changeImg(product , event) {
				event.target.src = product.image2;
			},
			originalImg(product , event) {
				event.target.src = product.image1;
			}
		}
	};
</script>

<style scoped>
    div.products {
    	display: grid;
    	grid-template-columns: repeat(4,1fr);
    }
    .columnDisplay {
    	display: flex;
    	flex-direction: column;
    	justify-content: space-between;
    }
    div.columnDisplay {
    	border: 1px solid #dcdcdc;
    	border-radius: 8px;
    	margin: 6px;
    	background: #f8fafc;
    }
    .p-2 {
    	padding: 5px;
    }
	img {
		width: 100%;
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