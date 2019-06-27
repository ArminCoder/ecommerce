<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
	public function index(Request $request)
	{
			$products = Product::all();

		    if ($request->type) {
		        $products = $products->whereIn('type', $request->type);
		    }

		    if ($request->gender) {
		        $products = $products->whereIn('gender', $request->gender);
		    }

		    if ($request->brand) {
		        $products = $products->whereIn('brand', $request->brand);
		    }

		    if ($request->price) {
		    	if($request->price == 'all')
		    	{
		        	return $products;
		    	}	
		    	if($request->price == 201)
		    	{
		        	$products = $products->where('price', '>=', $request->price);
		    	}	
		    	else
		    	{
		        	$products = $products->where('price', '<=', $request->price);
		    	}	
		    }

		    return $products;

		return response()->json($products);
	}
	
	public function show(Product $product)
    {
        return $product;
    }   
}
