<template>
	<div>
		<heading>Users</heading>
		
		<table>
			  <tr class="tableHead">
			   	    <th v-for='row in table'>{{ row.cell }}</th>
			  </tr>
			  <tr class="tableRow" v-for='user in users' v-if='!user.isAdmin'>
			    	<td>{{ user.id }}</td>
			    	<td>{{ user.name }}</td>
			    	<td>{{ user.email }}</td>
			    	<td>{{ user.created_at }}</td>

			  </tr>
		</table>
	</div>
</template>

<script>
export default {
	data () {
        return {
        	table: [
        		{ cell: 'id'},
        		{ cell: 'name'},
        		{ cell: 'email'},
        		{ cell: 'created_at' },	    
        	],
	 		users: []
	 	}
	},
	mounted() {
		this.getUsers();
	},
	methods: {
		getUsers() {
			axios.get('/api/users')
			.then((res) => {
				console.log(res);
				this.users = res.data;
			})
		}
	}
};
</script>

<style scoped>
    table {
    	margin-top: 80px;
    	width: 100%;
		border: 1px solid #ccc;
    }
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