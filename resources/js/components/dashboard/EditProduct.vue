<template>
	<modal v-if='openModal'>
		<span id="closeModal" @click='closeModal'>X</span>
			<div id="singleProductEdit" class="container">
		    	<div class="singleProductRow">
		    		<span class="title">Product Images</span> 
		    		<div class="d-flex">
		    			<span class="d-grid spaceX">
		    				<img :src="singleProduct.image1" :alt="singleProduct.name">		    			
							<label class="inputFile">
								<i class="fas fa-upload" title='Upload Different Picture'></i>
								<input @change='uploadImage' type="file" name="image1" ref='image1' id="image1">
							</label>	
		    			</span>
						<span class="d-grid spaceX">
		    				<img v-if='singleProduct.image2' :src="singleProduct.image2" :alt="singleProduct.name">
		    				<img v-else src="/img/no-image.png" alt="No Image">
							<label class="inputFile">
								<i class="fas fa-upload" title='Upload Different Picture'></i>
								<input @change='uploadImage' type="file" name="image1" ref='image1' id="image1">
							</label>	
		    			</span>
						<span class="d-grid spaceX">
		    				<img v-if='singleProduct.image3' :src="singleProduct.image3" :alt="singleProduct.name">
		    				<img v-else src="/img/no-image.png" alt="No Image">
							<label class="inputFile">
								<i class="fas fa-upload" title='Upload Different Picture'></i>
								<input @change='uploadImage' type="file" name="image1" ref='image1' id="image1">
							</label>	
		    			</span>
						<span class="d-grid spaceX">
		    				<img v-if='singleProduct.image4' :src="singleProduct.image4" :alt="singleProduct.name">
		    				<img v-else src="/img/no-image.png" alt="No Image">
							<label class="inputFile">
								<i class="fas fa-upload" title='Upload Different Picture'></i>
								<input @change='uploadImage' type="file" name="image1" ref='image1' id="image1">
							</label>	
		    			</span>
						<span class="d-grid spaceX">
		    				<img v-if='singleProduct.image5' :src="singleProduct.image5" :alt="singleProduct.name">
		    				<img v-else src="/img/no-image.png" alt="No Image">
							<label class="inputFile">
								<i class="fas fa-upload" title='Upload Different Picture'></i>
								<input @change='uploadImage' type="file" name="image1" ref='image1' id="image1">
							</label>	
		    			</span>
		    		</div>	
		    	</div>
				<div class="singleProductRow">
					<span class="title">Product Name</span> 
					<span>
						<input class="form-control" type="text" v-model='singleProduct.name'>
					</span>
				</div>
				<div class="singleProductRow">
					<span class="title">Product Price</span> 
					<div id="inputNumber" class="d-flex">
					    <div class="input-group-prepend">
					    	<span class="input-group-text">$</span>
					    </div>
						<input class="form-control" type="number" v-model='singleProduct.price'>
					</div>
				</div>
				<div class="singleProductRow">
					<span class="title">Product Category</span> 
					<span>
						<select class="form-control" v-model='singleProduct.type'>
							<option v-for='category in categories' :value="category.name">{{ category.name }}</option>
						</select>	
					</span>
				</div>
				<div class="singleProductRow">
					<span class="title">Product Brand</span> 
					<span>
						<select class="form-control" v-model='singleProduct.brand'>
							<option v-for='brand in brands' :value="brand.name">{{ brand.name }}</option>
						</select>	
					</span>
				</div>
				<div class="singleProductRow">
					<span class="title">Product Gender</span> 
					<span>
						<select class="form-control" v-model='singleProduct.gender'>
							<option value="men">Men</option>
							<option value="women">Women</option>
						</select>
					</span>
				</div>
				<div class="singleProductRow">
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
				<button id="editButton" class="btn btn-primary w-50" @click='submitEdit()'>Edit Product</button>
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
    	image1: '',
    	image2: '',
    	image3: '',
    	image4: '',
    	image5: '',
    	brands: '',
    	categories: ''
    }
  },
  mounted() {
  	this.getData();
  },
  methods: {
  	getData() {
		axios.all([
		    axios.get('/api/brands'),
		    axios.get('/api/types'),
	    ])
		.then(axios.spread((brandsRes, typesRes) => {
		    this.brands = brandsRes.data;
		    this.categories = typesRes.data;
		}));
  	},
  	uploadImage() {

  	},
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
  				{ name: 'size_35' , number: 35, state : this.singleProduct.size_35 },
  				{ name: 'size_36' , number: 36, state : this.singleProduct.size_36 },
  				{ name: 'size_37' , number: 37, state : this.singleProduct.size_37 },
  				{ name: 'size_38' , number: 38, state : this.singleProduct.size_38 },
  				{ name: 'size_39' , number: 39, state : this.singleProduct.size_39 },
  				{ name: 'size_40' , number: 40, state : this.singleProduct.size_40 },
  				{ name: 'size_41' , number: 41, state : this.singleProduct.size_41 },
  				{ name: 'size_42' , number: 42, state : this.singleProduct.size_42 },
  				{ name: 'size_43' , number: 43, state : this.singleProduct.size_43 },
  				{ name: 'size_44' , number: 44, state : this.singleProduct.size_44 },
  				{ name: 'size_45' , number: 45, state : this.singleProduct.size_45 },
  				{ name: 'size_46' , number: 46, state : this.singleProduct.size_46 },
  				{ name: 'size_47' , number: 47, state : this.singleProduct.size_47 },
  				{ name: 'size_48' , number: 48, state : this.singleProduct.size_48 },
  				{ name: 'size_49' , number: 49, state : this.singleProduct.size_49 },
  			);
  		})
	},
	submitEdit() {
		let data = this.singleProduct;
		axios.put('/products/' + this.singleProduct.id, {
			product: this.singleProduct,
			sizes: this.singleProductSizes
		})
			.then((res) => {
				console.log(res);
			})
	},
	uploadImage(event) {
		if(event.target.name == 'image1') {
			this.image1 = this.$refs.image1.files[0];
		}
		if(event.target.name == 'image2') {
			this.image2 = this.$refs.image2.files[0];
		}
		if(event.target.name == 'image3') {
			this.image3 = this.$refs.image3.files[0];
		}
		if(event.target.name == 'image4') {
			this.image4 = this.$refs.image4.files[0];
		}
		if(event.target.name == 'image5') {
			this.image5 = this.$refs.image5.files[0];
		}
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
    	flex-direction: column;
    }
    .singleProductRow {
		display: flex;
	    justify-content: space-between;
	    border-bottom: 1px solid #ccc;
	    padding: 15px;
	    font-size: 1rem;
    }
    .singleProductCheckboxes {
    	display: grid;
    	grid-template-columns: repeat(8,1fr);
    	grid-column-gap: 12px;
    }
    .title {
    	font-size: 1.1rem;
    	font-weight: bold;
    }
    input[type='checkbox'] {
    	transform: scale(1.2);
    }
    input[type='file'] {
    	display: none;
    }
    .d-grid {
    	display: grid;
    	justify-items: center;
    }
    .spaceX {
    	margin: 0 15px;
    }
    .fa-upload {
    	color: gray;
    	cursor: pointer
    }
    #inputNumber div {
    	z-index: 2;
    }
    #inputNumber input {
		margin-left: -2px;
	    border-left: none;
	    border-top-left-radius: 0;
	    border-bottom-left-radius: 0;
    }
    #editButton {
    	margin: 30px auto;
    }
</style>