<template>
		<form class="form-group mt-4">
			<div class="row">
				<div class="col-12 mt-3">
					<input class="form-control" type="text" v-model='name' placeholder="Product name...">
				</div>
				<div class="col-12 mt-3">
					<select class="form-control">
						<option v-for='brand in brands' :value="brand.name">{{ brand.name }}</option>
					</select>
				</div>
				<div class="col-12 mt-3">
					<select class="form-control">
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
								<input type="checkbox">
							</label>
							<label>
								36
								<input type="checkbox">
							</label>
							<label>
								37
								<input type="checkbox">
							</label>
							<label>
								38
								<input type="checkbox">
							</label>
							<label>
								39
								<input type="checkbox">
							</label>
							<label>
								40
								<input type="checkbox">
							</label>
							<label>
								41
								<input type="checkbox">
							</label>
							<label>
								42
								<input type="checkbox">
							</label>
							<label>
								43
								<input type="checkbox">
							</label>
							<label>
								44
								<input type="checkbox">
							</label>
							<label>
								45
								<input type="checkbox">
							</label>
							<label>
								46
								<input type="checkbox">
							</label>
							<label>
								47
								<input type="checkbox">
							</label>
							<label>
								48
								<input type="checkbox">
							</label>
							<label>
								49
								<input type="checkbox">
							</label>
					</div>
				</div>
			</div>
			<div class="row mt-3">
				<div class="text-center w50"><input type="file" name="image1"></div>
				<div class="text-center w50"><input type="file" name="image2"></div>
				<div class="text-center w50"><input class='mt-3' type="file" name="image3"></div>
				<div class="text-center w50"><input class='mt-3' type="file" name="image4"></div>
				<div class="text-center w50"><input class='mt-3' type="file" name="image5"></div>
			</div>
			<div class="text-center">
				<button class="btn btn-primary mt-4 px-4 py-2 w-50">Submit</button>
			</div>
		</form>
</template>

<script>
	export default {
		data() {
			return {
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
		}
	};
</script>

<style scope>
	.checkboxes {
		display: grid;
		grid-template-columns: repeat(8,1fr);
	}
	input[type=file] {
		width: 50%;
	}
	/*input[type=file]:last-child {
		width: 50%;
	}
	input[type=file]:nth-last-child(2) {
		width: 50%;
	}*/
</style>