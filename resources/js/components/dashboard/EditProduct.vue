<template>
	<modal v-if='openModal'>
		<span id="closeModal" @click='closeModal'>X</span>
			<div id="singleProductEdit" class="container">
		    	<div class="d-grid">
		    		<span class="title">Product Image</span> 
		    		<img :src="singleProduct.image1" :alt="singleProduct.name">
		    	</div>
				<div class="d-grid">
					<span class="title">Product Name</span> 
					<span>{{ singleProduct.name }}</span>
				</div>
				<div class="d-grid">
					<span class="title">Product Price</span> 
					<span>${{ singleProduct.price }}</span>
				</div>
				<div class="d-grid">
					<span class="title">Product Category</span> 
					<span>{{ singleProduct.category }}</span>
				</div>
				<div class="d-grid">
					<span class="title">Product Gender</span> 
					<span>{{ singleProduct.gender }}</span>
				</div>
				<div class="d-grid">
					<span class="title">Sizes</span>
					<div class="singleProductCheckboxes">
						<span v-for='size in singleProductSizes'>
							<label>
								<input v-model='size.state' type="checkbox">
								{{ size.number }} 
							</label>
						</span>
					</div>	
				</div>
			</div>
	</modal>
</template>

<script>
export default {
  data () {
    return {
    	singleProduct: '',
    	singleProductSizes: [],
    	openModal: false,
    }
  },
  methods: {
  	closeModal() {
  		this.singleProduct = [];
  		this.singleProductSizes = [];
  		this.$nextTick(() => {
  		    this.openModal = false; 
  		});
  	},
	editProduct() {
  		this.$nextTick(() => {
  			this.singleProductSizes.push(
  				{ number: 35, state : this.singleProduct.size_35 },
  				{ number: 36, state : this.singleProduct.size_36 },
  				{ number: 37, state : this.singleProduct.size_37 },
  				{ number: 38, state : this.singleProduct.size_38 },
  				{ number: 39, state : this.singleProduct.size_39 },
  				{ number: 40, state : this.singleProduct.size_40 },
  				{ number: 41, state : this.singleProduct.size_41 },
  				{ number: 42, state : this.singleProduct.size_42 },
  				{ number: 43, state : this.singleProduct.size_43 },
  				{ number: 44, state : this.singleProduct.size_44 },
  				{ number: 45, state : this.singleProduct.size_45 },
  				{ number: 46, state : this.singleProduct.size_46 },
  				{ number: 47, state : this.singleProduct.size_47 },
  				{ number: 48, state : this.singleProduct.size_48 },
  				{ number: 49, state : this.singleProduct.size_49 },
  			);
  		})
		
	},
  }
};
</script>

<style scoped>
    img {
    	width: 40px;
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
</style>