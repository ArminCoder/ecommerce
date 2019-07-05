<?php

namespace App\Http\Controllers;
use Auth;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
		if(Auth::user()->isAdmin)
	    { 
	        if (\Request::route()->uri == 'dashboard') { 
	        	return view('/admin/dashboard');
	        }
	        if (\Request::route()->uri == 'dashboard/main') { 
				return view('/admin/main');
	        }
	         if (\Request::route()->uri == 'dashboard/users') { 
				return view('/admin/user');
	        }
	        if (\Request::route()->uri == 'dashboard/products') { 
	            return view('/admin/products');
	        }
			if (\Request::route()->uri == 'dashboard/products/create') { 
				return view('/admin/create_product');
	        }
	    }
        else 
        {
        	return redirect('home');
        }	
    }
}
