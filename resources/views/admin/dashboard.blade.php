@extends('welcome')

@section('content')
	<div id='app'>
		<div id="dashboard">
			@include('admin/navbar')
			<div class="row">
				<div class="col-2 p-0">
					@include('./admin/sidebar')
				</div>
				<div class="col-10">
					@yield('component')
				</div>
			</div>	
		</div>	
	</div>
@endsection	

@section('scripts')
        <script src="{{ asset('js/app.js') }}"></script>
@endsection