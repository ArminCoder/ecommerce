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
       // $product_id = $request->session()->get('product_id');
       // $product_color = $request->session()->get('product_color');
       // $product_size = $request->session()->get('product_size');

        $product = session('product');
        // dd(session('product'));


        return response()->json($product);

        // return response()->json([
        //     'product_id' => $product_id,
        //     'product_color' => $product_color,
        //     'product_size' => $product_size
        // ]);
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
        session(['product' => $request->product]);
        // $productID = session('product_id');
        // $productID = array();

        // array_push($productID, $request->id );

        // array_push( session('product_id'), $request->id);

        // session(['product_id']);

        // session(['product_id' => $request->id ]);
        // session(['product_color' => $request->image ]);
        // session(['product_size' => $request->size ]);
        return response()->json(session()->all());
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
