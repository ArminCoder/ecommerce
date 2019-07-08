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


Route::get('/dashboard', 'DashboardController@index');

Route::get('/dashboard/main', 'DashboardController@index');

Route::get('/dashboard/users', 'DashboardController@index');

Route::get('/dashboard/products', 'DashboardController@index');

Route::get('/dashboard/products/create', 'DashboardController@index');

Route::resource('products', 'ProductsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
