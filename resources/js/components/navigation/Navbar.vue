<template>
	<div id="navHolder">
		<!--Navbar-->
		<nav class="navbar navbar-expand-lg navbar-dark primary-color">
		  <!-- Navbar brand -->
		  <a class="navbar-brand" href="/">
		  	<img id="logoImg" src="/img/logo.png" alt="">
		  </a>

		  <!-- Collapse button -->
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
		    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <!-- Collapsible content -->
		  <div class="collapse navbar-collapse" id="basicExampleNav">

		    <!-- Links -->
		    <ul class="navbar-nav m-auto">
	    	  <li class="nav-item">
		        <!-- <a class="nav-link" href="/">All Products</a> -->
		        <router-link class='nav-link' to='/'>All Products</router-link>
		      </li>
		      <li @click='showMenProducts' class="nav-item">
		        <a class="nav-link" href="#">Men</a>
		      </li>
		      <li @click='showWomenProducts' class="nav-item">
		        <a class="nav-link" href="#">Women</a>
		      </li>
		      <!-- <li class="nav-item">
		        <a class="nav-link" href="#">Kids</a>
		      </li> -->
		    </ul>
		    <form class="form-inline">
		      <div class="md-form my-0">
		        <input class="form-control mr-sm-4" type="text" placeholder="Search" aria-label="Search">
		      </div>
		    </form>
		  </div>
		  <!-- Collapsible content -->
		</nav>
		<!--/.Navbar-->
	</div>
</template>

<script>
	export default {
		methods: {
			showMenProducts() {
				console.log('TODO SHOW MEN SHOES');
			},
			showWomenProducts() {
				console.log('TODO SHOW WOMEN SHOES');
			}
		}
	};
</script>

<style scoped>
	#navHolder {
		position: fixed;
		width: 100%;
		background: #fff;
    	z-index: 2;
    	margin-top: 29px;
	}
	#logoImg {
		width: 140px;
	}
	.navbar-toggler {
		background: black;
	}
	nav {
		padding-top: 0;
	}
	form {
		margin-top: 5px;
	}
	a.nav-link {
		font-weight: 600;
		text-transform: uppercase;
		font-size: 1rem;
		margin: 0 10px;
		color: #0a0a0a !important;
	}
	a.nav-link:hover {
		border-bottom: 2px solid black;
	}
	#auth {
		margin: 0 10px 0 20px;
		display: flex;
	}
	#auth a {
		margin: 0 5px;
		color: #0a0a0a;
	}
</style>