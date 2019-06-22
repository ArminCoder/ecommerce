<template>
	<div class="products">
		<div class="columnDisplay p-4 p-relative" v-for='product in products'>
				<img :src="product.image1" :alt="product.name">
				<span class="productInfo w-100 text-center columnDisplay absBottom">
					<span class="productHeader">{{ product.name }}</span>
					<small class="productSubheader">{{ product.category }}</small>
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
				console.log(res.data);
				this.products = res.data;
			})
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
    .p-2 {
    	padding: 5px;
    }
	img {
		width: 100%;
	}
	
	.productInfo span.productHeader {
		font-size: 17px;
		font-weight: bold;
	}
</style>