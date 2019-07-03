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

    public function create(Request $request)
    {


    }        

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	dd($request);
    	$request->validate([
    		'name' => 'required',
    		'price' => 'required',
    		'type' => 'required',
    		'brand' => 'required',
    		'gender' => 'required',
    		// 'image1'=> 'required'
    	]);
        $message = 'Success! You have imported a new product!';

        return response(Product::all(), 200)->header('message', $message);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
