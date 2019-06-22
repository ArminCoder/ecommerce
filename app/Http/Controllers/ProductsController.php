<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
	public function index()
	{
	    $products = Product::all();

	    return response()->json($products);
	}
	
	public function show(Product $product)
    {
        return $product;
    }    
}