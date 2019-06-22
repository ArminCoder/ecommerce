<template>
	<div>
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
		        <a class="nav-link" href="#">Men</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#">Women</a>
		      </li>
		       <li class="nav-item">
		        <a class="nav-link" href="#">Kids</a>
		      </li>
		    </ul>
		    <form class="form-inline">
		      <div class="md-form my-0">
		        <input class="form-control mr-sm-4" type="text" placeholder="Search" aria-label="Search">
		      </div>
		    </form>
		    <a class="fas fa-shopping-cart fa-2x"></a>
		  </div>
		  <!-- Collapsible content -->
		</nav>
		<!--/.Navbar-->
	</div>
</template>

<script>
	
</script>

<style scoped>
	#logoImg {
		width: 140px;
	}
	.navbar-toggler {
		background: black;
	}
	a.nav-link {
		font-weight: 600;
		text-transform: uppercase;
		font-size: 1rem;
		margin: 0 10px;
		color: #0a0a0a !important;
	}
</style>