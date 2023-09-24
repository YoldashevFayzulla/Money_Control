<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function stratification()
    {
        // dd('salom');


        $user = AUTH::user();
        if ($user -> hasRole('admin') ) {
            return view('dashboard_admin');
        }
        if ($user -> hasRole('customer') ) {
            $products=Products::all();
            return view('dashboard_customer',compact('products'));
        }
    }

}

