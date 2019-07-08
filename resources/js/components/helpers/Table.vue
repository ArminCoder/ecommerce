<template>
	<table>
		  <tr class="tableHead">
		   	    <th v-for='row in table'>{{ row.cell }}</th>
		  </tr>
		  <tr class="tableRow" v-for='product in products'>
		    	<td><img :src="product.image1" :alt="product.nameS"></td>
		    	<td>{{ product.name }}</td>
		    	<td>${{ product.price }}</td>
		    	<td>{{ product.brand }}</td>
		    	<td>{{ product.category }}</td>
		    	<td>{{ product.gender }}</td>
		    	<td class="sizeTableCell">
					<span v-if='product.size_35'>{{ 35 }}</span>
					<span v-if='product.size_36'>{{ 36 }}</span>
					<span v-if='product.size_37'>{{ 37 }}</span>
					<span v-if='product.size_38'>{{ 38 }}</span>
					<span v-if='product.size_39'>{{ 39 }}</span>
					<span v-if='product.size_40'>{{ 40 }}</span>
					<span v-if='product.size_41'>{{ 41 }}</span>
					<span v-if='product.size_42'>{{ 42 }}</span>
					<span v-if='product.size_43'>{{ 43 }}</span>
					<span v-if='product.size_44'>{{ 44 }}</span>
					<span v-if='product.size_45'>{{ 45 }}</span>
					<span v-if='product.size_46'>{{ 46 }}</span>
					<span v-if='product.size_47'>{{ 47 }}</span>
					<span v-if='product.size_48'>{{ 48 }}</span>
					<span v-if='product.size_49'>{{ 49 }}</span>
		        </td>
		        <td>
		        	
		        </td>
		  </tr>
	</table>
</template>

<script>
export default {

  name: 'Table',

  data () {
    return {

    }
  }
};
</script>

<style scoped>
	.tableHead {
    	font-size: 15px;
    	text-transform: capitalize;
    	background: #ccc;
    	color: #fff;
    	font-weight: bold;
    	text-shadow: 1px 1px 1px black;
	}
    .tableRow {
    	background: #f2f2f2;
    	font-size: 14px;
    	padding: 5px;
    }
</style>