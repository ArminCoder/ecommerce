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

		    return $products;

		// Product::filter()->paginate(20);

    //  	$products = Product::all();

	   // if($request->type)
	   // {
	   // 		$products = collect([]);

	   // 		$productData = Product::whereIn('type', $request->type)->paginate(5);

	   // 		foreach ($request->type as $key) {
	   // 			$products = $products->merge($productData->where('type', $key));
	   // 		}
	   // }

	   // if($request->gender)
	   // {
	   // 		$products = collect([]);

	   // 		$productData = Product::whereIn('gender', $request->gender)->paginate(5);

	   // 		foreach ($request->gender as $key) {
	   // 			$products = $products->merge($productData->where('gender', $key));
	   // 		}
	   // }	

// 	   if ($request->has('name')) {
//     $user->where('name', $request->input('name'));
// }

// // Search for a user based on their company.
// if ($request->has('company')) {
//     $user->where('company', $request->input('company'));
// }
	   

	   	// $products = Product::all();

		return response()->json($products);
	   

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
