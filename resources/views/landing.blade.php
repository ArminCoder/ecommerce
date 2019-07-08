@extends('welcome')

@section('content')
    <div id="app">
		@include('layouts.guest')
		<router-view></router-view>
    </div>
@endsection

@section('scripts')
        <script src="{{ asset('js/app.js') }}"></script>
@endsection