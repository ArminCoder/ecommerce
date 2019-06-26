<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
	public function index(Request $request)
	{
	   if($request->type)
	   {
	   		$products = collect([]);

	   		$productData = Product::whereIn('type', $request->type)->get();

	   		foreach ($request->type as $key) {
	   			$products = $products->merge($productData->where('type', $key));
	   		}
			return response()->json($products);
	   }
	   else
	   {
	   		$products = Product::all();
			return response()->json($products);
	   }	
	   

	}
	
	public function show(Product $product)
    {
        return $product;
    }   

    public function filter(Request $request)
	{
	    $dd('filtering successfull');
	} 
}
