<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;

class BrandsController extends Controller
{
    public function index()
    {
    	$brands = Brand::all();
    	return $brands;
    }
}
