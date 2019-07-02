<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function() {
	return view('landing');
});

Route::get('/dashboard', function() {
	return view('admin/dashboard');
});

Route::get('/dashboard', 'DashboardController@index');
Route::get('/dashboard/main', function() {
	return view('/admin/main');
});
Route::get('/dashboard/users', function() {
	return view('/admin/user');
});
Route::get('/dashboard/products', function() {
	return view('/admin/products');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
