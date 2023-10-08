<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function stratification()
    {
        // dd('salom');

        $user = AUTH::user();
        $orders=Order::latest()->paginate(25);
        if ($user -> hasRole('admin') ) {
            return view('dashboard_admin',compact('orders'));
        }
        if ($user -> hasRole('customer') ) {
            $orders=Order::orderBy('created_at','desc')->paginate(25);
            return view('dashboard_customer',compact('orders'));
        }
    }

}

