<?php

use Illuminate\Http\Request;
use App\Product;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Products
Route::get('/products', 'ProductsController@index');

// Brands
Route::get('/brands', 'BrandsController@index');

// Types
Route::get('/types', 'TypeController@index');

// Prices
Route::get('/prices', 'PricesController@index');

// Single product
Route::get('/products/{product}', 'ProductsController@show');

// Users
Route::get('/users', 'UsersController@index');