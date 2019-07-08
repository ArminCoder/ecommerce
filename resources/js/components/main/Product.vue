<template>
	<div>
        <navbar></navbar>
		<div class="container">
			<!-- <a  href="/products" class="fas fa-arrow-circle-left fa-2x" title="Back To Products"> </a> -->
			 <router-link id="backToProducts" title='Back To Products' to="/"><span class="fas fa-arrow-circle-left fa-2x"></span></router-link>
			<div class="row">
				<div id="mainImageHolder" class="col-9">
					<img id="mainImage" :src="product.image1" alt="product.name">
				</div>
				<div class="col-3">
					<div class="d-flex">
						<span>{{product.gender | capitalize}} 's {{ product.category |capitalize }}  Shoe</span>
						<span><strong>${{ product.price }}</strong></span>
					</div>
					<div id="productName">
						<span>{{ product.name }}</span>
					</div>

					<div id="selectProductColor" class="mt-4">
						<span>Select Color</span>
						<div class="mt-2">
							<img @click='changeMainImg' class="ml-2 productImages" v-if='product.image1' :src="product.image1" alt="product.name">
							<img @click='changeMainImg' class="ml-2 productImages" v-if='product.image2' :src="product.image2" alt="product.name">
							<img @click='changeMainImg' class="ml-2 productImages" v-if='product.image3' :src="product.image3" alt="product.name">
							<img @click='changeMainImg' class="ml-2 productImages" v-if='product.image4' :src="product.image4" alt="product.name">
							<img @click='changeMainImg' class="ml-2 productImages" v-if='product.image5' :src="product.image5" alt="product.name">
							<img @click='changeMainImg' class="ml-2 productImages" v-if='product.image6' :src="product.image6" alt="product.name">
						</div>

					</div>
					<div id="selectProductSize" class="mt-4">
						<span>
							<span>Select Size</span>
							<select @change='changeSizeOptions' v-model='sizeOption'>
								<option value="us" selected>US</option>
								<option value="eu" selected>EU</option>
							</select>
						</span>
						<div v-if='product.gender == "men"' class="mt-2 productSizes">
							<span @click='chooseSize'  class="pickedProductSizes" :class='{ disabled : !product.size_36 }'>{{ usSize ? 4 : 36 }}</span>
							<span @click='chooseSize'  class="pickedProductSizes" :class='{ disabled : !product.size_37 }'>{{ usSize ? 5 : 37 }}</span>
							<span @click='chooseSize'  class="pickedProductSizes" :class='{ disabled : !product.size_38 }'>{{ usSize ? 5.5 : 38 }}</span>
							<span @click='chooseSize'  class="pickedProductSizes" :class='{ disabled : !product.size_39 }'>{{ usSize ? 6.5 : 39 }}</span>
							<span @click='chooseSize'  class="pickedProductSizes" :class='{ disabled : !product.size_40 }'>{{ usSize ? 7 : 40 }}</span>
							<span @click='chooseSize'  class="pickedProductSizes" :class='{ disabled : !product.size_41 }'>{{ usSize ? 8 : 41 }}</span>
							<span @click='chooseSize'  class="pickedProductSizes" :class='{ disabled : !product.size_42 }'>{{ usSize ? 8.5 : 42 }}</span>
							<span @click='chooseSize'  class="pickedProductSizes" :class='{ disabled : !product.size_43 }'>{{ usSize ? 9.5 : 43 }}</span>
							<span @click='chooseSize'  class="pickedProductSizes" :class='{ disabled : !product.size_44 }'>{{ usSize ? 10 : 44 }}</span>
							<span @click='chooseSize'  class="pickedProductSizes" :class='{ disabled : !product.size_45 }'>{{ usSize ? 11 : 45 }}</span>
							<span @click='chooseSize'  class="pickedProductSizes" :class='{ disabled : !product.size_46 }'>{{ usSize ? 12 : 46 }}</span>
							<span @click='chooseSize'  class="pickedProductSizes" :class='{ disabled : !product.size_47 }'>{{ usSize ? 12.5 : 47 }}</span>
							<span @click='chooseSize'  class="pickedProductSizes" :class='{ disabled : !product.size_48 }'>{{ usSize ? 13.5 : 48 }}</span>
							<span @click='chooseSize'  class="pickedProductSizes" :class='{ disabled : !product.size_49 }'>{{ usSize ? 15 : 49 }}</span>
						</div>
						<div v-if='product.gender == "women"' class="mt-2 productSizes">
							<span @click='chooseSize'  class="pickedProductSizes" :class='{ disabled : !product.size_35 }'>{{ usSize ? 5 : 35 }}</span>
							<span @click='chooseSize'  class="pickedProductSizes" :class='{ disabled : !product.size_36 }'>{{ usSize ? 5.5 : 36 }}</span>
							<span @click='chooseSize'  class="pickedProductSizes" :class='{ disabled : !product.size_37 }'>{{ usSize ? 6.5 : 37 }}</span>
							<span @click='chooseSize'  class="pickedProductSizes" :class='{ disabled : !product.size_38 }'>{{ usSize ? 7 : 38 }}</span>
							<span @click='chooseSize'  class="pickedProductSizes" :class='{ disabled : !product.size_39 }'>{{ usSize ? 8 : 39 }}</span>
							<span @click='chooseSize'  class="pickedProductSizes" :class='{ disabled : !product.size_40 }'>{{ usSize ? 8.5 : 40 }}</span>
							<span @click='chooseSize'  class="pickedProductSizes" :class='{ disabled : !product.size_41 }'>{{ usSize ? 9.5 : 41 }}</span>
							<span @click='chooseSize'  class="pickedProductSizes" :class='{ disabled : !product.size_42 }'>{{ usSize ? 10 : 42 }}</span>
							<span @click='chooseSize'  class="pickedProductSizes" :class='{ disabled : !product.size_43 }'>{{ usSize ? 11 : 43 }}</span>
							<span @click='chooseSize'  class="pickedProductSizes" :class='{ disabled : !product.size_44 }'>{{ usSize ? 11.5 : 44 }}</span>
							<span @click='chooseSize'  class="pickedProductSizes" :class='{ disabled : !product.size_45 }'>{{ usSize ? 9.5 : 45 }}</span>
						</div>
					</div>
					<div class="addToCart mt-4 text-center">
						<button class="btn btn-block px-4 py-2">Add To Cart</button>
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
				requestedId: '',
				usSize: true,
				sizeOption: 'us',
				choosenProduct: { 
					image: '',
					size: ''
				}
			}
		},
		created() {
			this.requestedId = this.$route.params.id;
		},
		mounted() {
			axios.get('/products/' + this.requestedId, {  
			  	params: {
			    	
			 	}
			 	}).then((res) => {
					this.product = res.data;
				})
		},
		methods: {
			chooseSize(e) {
				if (e.target.classList.value.includes('disabled')) {
					return;
				}
				this.choosenProduct.size = e.target.textContent;
				e.target.classList.add('selectedSizeBorder');

				let productSizes = document.getElementsByClassName('pickedProductSizes');
				for(let i = 0; i < productSizes.length; i++) {
					productSizes[i].classList.remove('selectedSizeBorder');
				}
				e.target.classList.add('selectedSizeBorder');
				console.log(this.choosenProduct.size);
			},
			changeSizeOptions() {
				if(this.sizeOption == 'us') {
					this.usSize = true;
				}
				if(this.sizeOption == 'eu') {
					this.usSize = false;
				}
			},
			changeMainImg(event) {
				let mainImg = document.getElementById('mainImage');
				let productImages = document.getElementsByClassName('productImages');
				mainImg.src = event.target.src;
				
				if(mainImg.src == event.target.src) {
					for(let i = 0; i < productImages.length; i++) {
						productImages[i].classList.remove('selectedImageBorder');
					}
					event.target.classList.add('selectedImageBorder');
				}
				this.choosenProduct.image = event.target.src;
				console.log(this.choosenProduct.image);
			}
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
	#mainImageHolder {
		text-align: center;
	}
	#mainImage {
		width: 70%;
	}
	.d-flex {
		justify-content: space-between;
	}
	#productName span {
		font-size: 2rem;
		font-weight: 900;
	}
	.container {
		padding-top: 10vh;
	}
	#selectProductColor {
		display: flex;
		flex-direction: column;
	}
	#selectProductColor img {
		width: 50px;
		cursor: pointer;
	}
	.borderImg {
		border: 1px solid black;
	}
	#selectProductSize select {
		float: right;
	    background: none;
	    border: none;
	    font-size: 0.9rem;
	    color: inherit;
	    cursor: pointer;
	}
	div.productSizes {
		display: grid;
		grid-template-columns: repeat(4,1fr);
	}
	div.productSizes span {
		padding: 5px 10px;
	    margin-left: 4px;
	    border: 1px solid #e2dede;
	    margin: 2px;
	    text-align: center;
	    color: #585353;
	    cursor: pointer;
	    border-radius: 2px;
	}
	div.productSizes span:hover {
		border: 1px solid black;
		border-radius: 4px;
	}
	.disabled {
		color: #c6c6c6 !important;
		background: #fff !important;
		cursor: not-allowed !important;
	}
	div.addToCart button.btn-block {
		background-color: black;
		color: #fff;
	}
	div.addToCart button.btn-block:hover {
		background: #343940;;
		color: #fff;
	}
	.selectedImageBorder {
		border-bottom: 2px solid #45c57b;
	}
	.selectedSizeBorder {
		border: 1px solid #45c57b !important;
	}
	#backToProducts {
		position: absolute;
		left: 2vw;
		color: #0a0a0a;
	}
	#backToProducts:hover {
		text-decoration: none;
	}
</style>