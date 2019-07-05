<template>
		<form v-cloak class="form-group mt-4">
			<div class="row">
				<div class="col-12 mt-3">
					<input class="form-control" type="text" v-model='name' placeholder="Product name...">
				</div>
				<div class="col-12 mt-3">
					<select v-model='productBrand' class="form-control">
						<option value="chooseBrand" disabled>Choose Brand...</option>
						<option v-for='brand in brands' :value="brand.name">{{ brand.name }}</option>
					</select>
				</div>
				<div class="col-12 mt-3">
					<select v-model='productType' class="form-control">
						<option value="chooseType" disabled="">Choose Category...</option>	
						<option v-for='category in categories' :value="category.name">{{ category.name }}</option>
					</select>
				</div>
				<div class="col-12 mt-3">
					<input class="form-control" type="number" v-model='price' placeholder="Product price in USD...">
				</div>
			</div>
			<div class="row mt-3">
				<div class="col-12 mt-3">
					<select class="form-control" v-model='gender'>
							<option value="all" selected disabled>Choose Gender...</option>
							<option value="men">Male</option>
							<option value="women">Female</option>
					</select>
				</div>	
				<div class="col-12 mt-3">
					<h5 class="d-flex justify-content-center mb-4 text-bold font-weight-bold">Available Sizes:</h5>
					<div class="row checkboxes">
							<label>
								35
								<input v-model='size_35' type="checkbox">
							</label>
							<label>
								36
								<input v-model='size_36'type="checkbox">
							</label>
							<label>
								37
								<input v-model='size_37'type="checkbox">
							</label>
							<label>
								38
								<input v-model='size_38'type="checkbox">
							</label>
							<label>
								39
								<input v-model='size_39' type="checkbox">
							</label>
							<label>
								40
								<input v-model='size_40' type="checkbox">
							</label>
							<label>
								41
								<input v-model='size_41'type="checkbox">
							</label>
							<label>
								42
								<input v-model='size_42'type="checkbox">
							</label>
							<label>
								43
								<input v-model='size_43' type="checkbox">
							</label>
							<label>
								44
								<input v-model='size_44' type="checkbox">
							</label>
							<label>
								45
								<input v-model='size_45' type="checkbox">
							</label>
							<label>
								46
								<input v-model='size_46' type="checkbox">
							</label>
							<label>
								47
								<input v-model='size_47' type="checkbox">
							</label>
							<label>
								48
								<input v-model='size_48' type="checkbox">
							</label>
							<label>
								49
								<input v-model='size_49' type="checkbox">
							</label>
					</div>
				</div>
			</div>
			
			<h5 class="d-flex justify-content-center my1-4 text-bold font-weight-bold">Upload Images:</h5>

			<div class="row mt-3">
				<div class="text-center w-50">
					<input @change='uploadImage' type="file" name="image1" ref='image1' id="image1">
				</div>
				<div class="text-center w-50">
					<input @change='uploadImage' type="file" ref='image2' id='image2' name="image2">
				</div>
				<div class="text-center w-50">
					<input @change='uploadImage' class='mt-3' type="file" ref='image3' id='image3' name="image3">
				</div>
				<div class="text-center w-50">
					<input @change='uploadImage' class='mt-3' type="file" ref='image4' id='image4' name="image4">
				</div>
				<div class="text-center w-50">
					<input @change='uploadImage' class='mt-3' type="file" ref='image5' id='image5' name="image5">
				</div>
			</div>
			<div class="text-center">
				<button @click.prevent='createProduct' class="btn btn-primary mt-4 px-4 py-2 w-50">Submit</button>
			</div>
			<notify v-if='message' :message='message' :error='error' :success='success'></notify>
		</form>
</template>

<script>
	export default {
		data() {
			return {
				productBrand: 'chooseBrand',
				productType: 'chooseType',
				size_35: false,
				size_36: false,
				size_37: false,
				size_38: false,
				size_39: false,
				size_40: false,
				size_41: false,
				size_42: false,
				size_43: false,
				size_44: false,
				size_45: false,
				size_46: false,
				size_47: false,
				size_48: false,
				size_49: false,
				name: '',
				price: '',
				gender: 'all',
				brands: [],
				categories: [],
				message: '',
				success: false,
				error: false,
				sizesObject: {},
				image1: '',
				image2: '',
				image3: '',
				image4: '',
				image5: '',
			}
		}, 
		created() {
			this.getResources();
		}, 
		mounted() {
			this.checkSizeValue();
		},
		methods: {
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
			getResources() {
				axios.all([
					axios.get('/api/brands'),
					axios.get('/api/types')
					])
				.then(axios.spread((resBrands, resTypes) => {
					this.brands = resBrands.data;
					this.categories = resTypes.data;
					console.log('brands and categories', resBrands, resTypes )
				}));
			},
			createProduct() {
				this.checkSizeValue();
				console.log('FILE:::', this.image1);

				// if (this.productBrand == 'chooseBrand' || this.productType == 'chooseType' || this.gender == 'all' || !this.name || !this.price) {
				// 	this.message = 'All Fields are required';
				// 	this.error = true;
				// 	return;
				// } 

				let formData = new FormData();

				formData.append('name', this.name);
				formData.append('price', this.price);
				formData.append('brand', this.productBrand);
				formData.append('gender', this.gender);
				formData.append('category', this.productType);
			    formData.append('size_35', this.size_35);
			    formData.append('size_36', this.size_36);
				formData.append('size_37', this.size_37);
				formData.append('size_38', this.size_38);
				formData.append('size_39', this.size_39);
				formData.append('size_40', this.size_40);
				formData.append('size_41', this.size_41);
				formData.append('size_42', this.size_42);
				formData.append('size_43', this.size_43);
				formData.append('size_44', this.size_44);
				formData.append('size_45', this.size_45);
				formData.append('size_46', this.size_46);
				formData.append('size_47', this.size_47);
				formData.append('size_48', this.size_48);
				formData.append('size_49', this.size_49);
				

				// Attach file type='image2' id='image2'a
				formData.append('image1',  this.image1); 
				formData.append('image2' , this.image2);
				formData.append('image3' , this.image3);
				formData.append('image4' , this.image4);
				formData.append('image5' , this.image5);


				let axiosConfig = {
				     headers: {
				         'Content-Type': 'application/json;multipart/form-data'
				     }
				}     	

				axios.post( '/products',
				 			formData,
				 			axiosConfig
				)
				.then((res) => {
					console.log(res);
					this.error = false;
					this.message = res.data.message;
				})
				.catch((error) => {
					console.log(error.response);
					let errorObject = error.response.data.errors;
					errorObject = errorObject[Object.keys(errorObject)[0]];
					if(errorObject[0])
					{  	
					    this.message = errorObject[0];
					}
					else 
					{
						this.message = error.response.statusText;
					}	
					this.error = true;
				})
			},
			checkSizeValue() {
				this.size_35 ? this.size_35 = 1 : this.size_35 = 0;
				this.size_36 ? this.size_36 = 1 : this.size_36 = 0;
				this.size_37 ? this.size_37 = 1 : this.size_37 = 0;
				this.size_38 ? this.size_38 = 1 : this.size_38 = 0;
				this.size_39 ? this.size_39 = 1 : this.size_39 = 0;
				this.size_40 ? this.size_40 = 1 : this.size_40 = 0;
				this.size_41 ? this.size_41 = 1 : this.size_41 = 0;
				this.size_42 ? this.size_42 = 1 : this.size_42 = 0;
				this.size_43 ? this.size_43 = 1 : this.size_43 = 0;
				this.size_44 ? this.size_44 = 1 : this.size_44 = 0;
				this.size_45 ? this.size_45 = 1 : this.size_45 = 0;
				this.size_46 ? this.size_46 = 1 : this.size_46 = 0;
				this.size_47 ? this.size_47 = 1 : this.size_47 = 0;
				this.size_48 ? this.size_48 = 1 : this.size_48 = 0;
				this.size_49 ? this.size_49 = 1 : this.size_49 = 0;
			}
		}
	};
</script>

<style scoped>
	.checkboxes {
		display: grid;
		grid-template-columns: repeat(8,1fr);
	}
	input[type=checkbox] {
    	transform: scale(1.5);
    	margin-left: 5px;
	}
	
	
</style>