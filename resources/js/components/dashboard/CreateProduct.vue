<template>
		<form v-cloak class="form-group mt-4">
			<div class="row">
				<div class="col-12 mt-3">
					<input class="form-control" type="text" v-model='name' placeholder="Product name...">
				</div>
				<div class="col-12 mt-3">
					<select v-model='productBrand' class="form-control">
						<option v-for='brand in brands' :value="brand.name">{{ brand.name }}</option>
					</select>
				</div>
				<div class="col-12 mt-3">
					<select v-model='productType' class="form-control">
						<option v-for='category in categories' :value="category.name">{{ category.name }}</option>
					</select>
				</div>
				<div class="col-12 mt-3">
					<input class="form-control" type="number" v-model='price' placeholder="Product price...">
				</div>
			</div>
			<div class="row mt-3">
				<div class="col-12 mt-3">
					<select class="form-control" v-model='gender'>
							<option value="all" selected disabled>Choose Gender...</option>
							<option value="male">Male</option>
							<option value="male">Female</option>
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
				<div class="text-center w-50"><input type="file" name="image1"></div>
				<div class="text-center w-50"><input type="file" name="image2"></div>
				<div class="text-center w-50"><input class='mt-3' type="file" name="image3"></div>
				<div class="text-center w-50"><input class='mt-3' type="file" name="image4"></div>
				<div class="text-center w-50"><input class='mt-3' type="file" name="image5"></div>
			</div>
			<div class="text-center">
				<button @click.prevent='createProduct' class="btn btn-primary mt-4 px-4 py-2 w-50">Submit</button>
			</div>
		</form>
</template>

<script>
	export default {
		data() {
			return {
				productBrand: '',
				productType: '',
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
				categories: []
			}
		}, 
		created() {
			axios.all([
				axios.get('/api/brands'),
				axios.get('/api/types')
				])
			.then(axios.spread((resBrands, resTypes) => {
				console.log(resBrands, resTypes);
				this.brands = resBrands.data;
				this.categories = resTypes.data;
			}));
		}, 
		methods: {
			createProduct() {
				console.log('create')
			}
		}
	};
</script>

<style scope>
	.checkboxes {
		display: grid;
		grid-template-columns: repeat(8,1fr);
	}
	input[type=checkbox] {
    	transform: scale(1.5);
    	margin-left: 5px;
	}
	
	
</style>