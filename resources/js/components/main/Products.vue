<template>
	<div class="products">
		<div class="columnDisplay p-4 p-relative" v-for='product in products'>
				<img :src="product.img" :alt="product.name">
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
				products: [
					{ id: 0, img: '/img/products/Casual-Shoes-Lace-up-Men-B.jpg' , name: 'Nike fd345', category: "Men's running"},
					{ id: 1, img: '/img/products/sneaker2.png' , name: 'Nike fgreg', category: "Men's casual"},
					{ id: 2, img: '/img/products/sneaker3.jpg' , name: 'Nike fd4335', category: "Men's lifestyle"},
					{ id: 3, img: '/img/products/sneaker4.jpg' , name: 'Addidas fd64363', category: "Men's running"},
					{ id: 4, img: '/img/products/sneaker5.jpg' , name: 'Reebok fd345', category: "Men's casual"},
					{ id: 5, img: '/img/products/sneaker6.jpeg' , name: 'Starke', category: "Men's running"},
				]	
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