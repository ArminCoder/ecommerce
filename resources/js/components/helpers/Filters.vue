<template>
	<div>
		<div class="filters mt-2">
			<span class="label">Gender</span>
			<span v-for='gender in genderOptions'>
				<input @change='sendData' v-model='pickedGender' type='checkbox' :value='gender.option'>
				<span class="option">{{ gender.option }}</span>
			</span>
		</div>
		<div class="filters mt-2">
			<span class="label">Category</span>
			<span v-for='category in categories'>
				<input @change='sendData'  v-model='pickedCategory' type='checkbox' :value='category.name'>
				<span class="option">{{ category.name }}</span>
			</span>
		</div>	
		<div class="filters mt-2">
			<span class="label">Brand</span>
			<span v-for='brand in brands'>
				<input @change='sendData' v-model='pickedBrand' type='checkbox' :value='brand.name'>
				<span class="option">{{ brand.name }}</span>
			</span>
		</div>	
		<div class="filters mt-2">
			<span class="label">Price</span>
			<select @change='sendData' v-model='pickedPrice'>
				<option selected value="all">All</option>
				<option v-for='price in prices' :value="price.value">{{ price.name }}</option>
			</select>
		</div>	
	</div>
</template>

<script>
	import { eventBus } from '../../app.js';

	export default {
		data() {
			return {
				pickedGender: [],
				pickedCategory: [],
				pickedBrand: [],
				pickedPrice: 'all',
				genderOptions: [
					{ option : 'men'},
					{ option : 'women'}
				],
				brands: [],
				categories: [],
				prices: []						
			}
		},
		mounted() {
			this.getData();
			eventBus.$on('search', () => {
				this.pickedCategory = [];
				this.pickedGender = [];
				this.pickedBrand = [];
				this.pickedPrice = 'all';
			});	
		},
		methods: {
			getData() {
				axios.all([
				    axios.get('/api/brands'),
				    axios.get('/api/types'),
				    axios.get('/api/prices'),
				  ])
				  .then(axios.spread((brandsRes, typesRes, pricesRes) => {
				  	  console.log('RESPONSES:::,', brandsRes, typesRes, pricesRes);
				      this.brands = brandsRes.data;
				      this.categories = typesRes.data;
				      this.prices = pricesRes.data;
				  }));
			},
			sendData() {
				if(this.pickedPrice == 'all') {
					this.pickedPrice = '';
				}
				let data = { 
					pickedGender: this.pickedGender,
					pickedCategory: this.pickedCategory,
					pickedBrand: this.pickedBrand,
					pickedPrice: this.pickedPrice
				}
				eventBus.$emit('event', data);
			},
			pickCategory() {
				eventBus.$emit('event', this.pickedCategory);
			},
			pickBrand() {
			},
			pickPrice() {
			},
		},
	};
</script>

<style scoped>
	.filters {
		display: grid;

	}
	.filters span {
		display: flex;
		align-items: center;
		white-space: nowrap;
	}
	.label {
		font-size: 16px;
		font-weight: 900;
	}
	.option {
		text-transform: capitalize;
		padding-left: 10px;
		font-size: 15px;
	}
	input[type=checkbox] {
		-ms-transform: scale(1.2); /* IE */
		 -moz-transform: scale(1.2); /* FF */
		 -webkit-transform: scale(1.2); /* Safari and Chrome */
		 -o-transform: scale(1.2); /* Opera */
		transform: scale(1.2);
	}
</style>