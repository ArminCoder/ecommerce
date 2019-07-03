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
    	$validator = $request->validate([
    		'name' => 'required',
    		'price' => 'required',
    		'category' => 'required',
    		'brand' => 'required',
    		'gender' => 'required',
    		// 'image1'=> 'required'
    	]);

        $message = 'Success! You have imported a new product!';

        $product = new Product([
        	'name' => $request->name,
        	'price' => $request->price,
        	'category' => $request->category,
        	'brand' => $request->brand,
        	'gender' => $request->gender,
            'size_35' => $request->size_35,
	        'size_36' => $request->size_36,
	        'size_37' => $request->size_37,
	        'size_38' => $request->size_38,
	        'size_39' => $request->size_39,
	        'size_40' => $request->size_40,
	        'size_41' => $request->size_41,
	        'size_42' => $request->size_42,
	        'size_43' => $request->size_43,
	        'size_44' => $request->size_44,
	        'size_45' => $request->size_45,
	        'size_46' => $request->size_46,
	        'size_47' => $request->size_47,
	        'size_48' => $request->size_48,
            "size_49" => $request->size_49,
            "image1" => 'test',
            "image2" => 'test',
            "image3" => 'test',
            "image4" => 'test',
            "image5" => 'test',
        ]);


        $product->save();

        return redirect('/dashboard/products/create')->header('success', $message);

        // return response(Product::all(), 200)->header('message', $message);
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
