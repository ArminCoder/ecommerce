<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Cart;
use App\Product;


class ShoppingCartController extends Controller
{
    public function index(Request $request)
    {

    }
	
	public function show(Product $product)
    {

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
    	dd(\Request::ip());
    	if(Auth::user()) {
    		$user_id = Auth::id();
    		$guest = 0;
    	}
    	else {
    		$user_id = null;
    		$guest = 1;
    	}

    	$product = new Cart([
    		'user_id' => $user_id,
    		'isGuest' => $guest,
    		'product_id' => $request->id
    	]);

    	$product->save();

    	return response()->json(['message' => 'Product added to cart!']);
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
