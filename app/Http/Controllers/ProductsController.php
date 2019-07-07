<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Storage;


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
        $successMessage = 'Success! You have imported a new product!';

    	$validator = $request->validate([
    		'name' => 'required',
    		'price' => 'required',
    		'category' => 'required',
    		'brand' => 'required',
    		'gender' => 'required',
    		'image1' => 'image | max:1999',
    	]);
       
        if ($request->hasFile('image1')) 
        {
           $image1Name = $request->file('image1')->getClientOriginalName(); 
           $image1Path = $request->file('image1')->storeAs('public/img/products', $image1Name);
           $image1Path = '/img/products/' . $image1Name;

        }

         if ($request->hasFile('image2')) 
        {  $image2Name = $request->file('image2')->getClientOriginalName();
           $request->file('image2')->storeAs('public/img/products', $image2Name);
           $image2Path = '/img/products/' . $image2Name;
        }
        else
        {
            $image2Path = '';
        }    

         if ($request->hasFile('image3')) 
        {  $image3Name = $request->file('image3')->getClientOriginalName();
           $request->file('image3')->storeAs('public/img/products', $image3Name);
           $image3Path = '/img/products/' . $image3Name;
        }
        else
        {
            $image3Path = '';
        }    

         if ($request->hasFile('image4')) 
        {  $image4Name = $request->file('image4')->getClientOriginalName();
           $request->file('image4')->storeAs('public/img/products', $image4Name);
           $image4Path = '/img/products/' . $image4Name;
        }
        else
        {
            $image4Path = '';
        }    

         if ($request->hasFile('image5')) 
        {  $image5Name = $request->file('image5')->getClientOriginalName();
           $request->file('image5')->storeAs('public/img/products', $image5Name);
           $image5Path = '/img/products/' . $image5Name;
        }
        else
        {
            $image5Path = '';
        }    
        $product = new Product([
        	'name' => $request->name,
        	'price' => $request->price,
        	'type' => $request->category,
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
            "image1" =>  $image1Path,
            "image2" =>  $image2Path,
            "image3" =>  $image3Path,
            "image4" =>  $image4Path,
            "image5" =>  $image5Path
        ]);

        $product->save();

        return response()->json(['message' => 'Success!']);

        // return redirect('/dashboard/products/create')->withResponse()->json([
        //     'message' => 'success'
        // ]);

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
        $product =  Product::where('id', $id)->get();
        
        $product->destroy();
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
