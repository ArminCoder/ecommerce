<template>
	<div>
		<div class="filters mt-2">
			<span class="label">Gender</span>
			<span v-for='gender in genderOptions'>
				<input type='checkbox'>
				<span class="option">{{ gender.option }}</span>
			</span>
		</div>
		<div class="filters mt-2">
			<span class="label">Category</span>
			<span v-for='category in categories'>
				<input type='checkbox'>
				<span class="option">{{ category.name }}</span>
			</span>
		</div>	
		<div class="filters mt-2">
			<span class="label">Brand</span>
			<span v-for='brand in brands'>
				<input type='checkbox'>
				<span class="option">{{ brand.name }}</span>
			</span>
		</div>	
		<div class="filters mt-2">
			<span class="label">Price</span>
			<span v-for='price in prices'>
				<input type='checkbox'>
				<span class="option">{{ price.value }}</span>
			</span>
		</div>	
	</div>
</template>

<script>
	export default {
		data() {
			return {
				genderOptions: [
					{ option : 'men'},
					{ option : 'women'},
					{ option : 'kids'},
				],
				brands: [
					{ name: 'Nike'},
					{ name: 'Adidas'},
					{ name: 'Puma'},
					{ name: 'Jordan'},
					{ name: 'Vans'},
					{ name: 'Converse'},
					{ name: 'Under Armour'},
					{ name: 'New Balance'},
					{ name: 'Johnston and Murphy'},
					{ name: 'Bostonian'},
					{ name: 'Fila'},
					{ name: 'LeBron'},
					{ name: 'Testoni'},
					{ name: 'Berluti'},
					{ name: 'ASICS'},
					{ name: 'Tommy Hilfiger'},
					{ name: 'Other'}
				],
				categories: [ 
					{ name: 'Lifestyle'},
					{ name: 'Running'},
					{ name: 'Athletic'},
					{ name: 'Gym'},
					{ name: 'Slip-on'},
					{ name: 'High-Top'},
					{ name: 'Lace-up'},
				],
				prices: [ 
					{ value: '50$ and Under'},
					{ value: '100$ and Under'},
					{ value: '150$ and Under'},
					{ value: '200$ and Under'},
					{ value: '200$ and Over'}
				]						
			}
		}
	};
</script>

<style scoped>
	.filters {
		display: grid;

	}
	.filters span {
		display: flex;
		align-items: center;
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