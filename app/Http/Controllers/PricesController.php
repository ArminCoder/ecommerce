<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Price;

class PricesController extends Controller
{
    public function index() 
    {
    	$prices = Price::all();

    	return $prices;
    }
}
