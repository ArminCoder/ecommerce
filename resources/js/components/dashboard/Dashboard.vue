<template>
	<div id="dashboard" class="container-fluid">
		<div class="row">
			<div class="navigation col-12 bg-dark">

			</div>
			<div class="col-3 bg-dark">
				<ul>
					<li></li>	
				</ul>


			</div>
			<div class="col-9">
				<router-view></router-view>
			</div>	
		</div>
	</div>
</template>

<script>
export default {
	components: {

	}
};
</script>