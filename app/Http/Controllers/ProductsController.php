<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
	public function index(Request $request)
	{
		// dd(Product::first()->type , $request->type );
		// dd($request->type);
	    $products = Product::filter($request)->where('type', $request->type)->paginate(5);
	    // Procut::where('type', $request->type)->where('brand', $request->brand)->get()->paginate(5);
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
