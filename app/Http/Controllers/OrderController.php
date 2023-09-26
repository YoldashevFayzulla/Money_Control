<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    
    public function create(){
        return view('dashboard_custumer_create');
    }
    public function store(Request $request){
        $request->validate([
            'product_id' => 'required',
            'kg' => 'required|numeric',
        ]);
        // dd($request->product_id);
        Order::create([
            'user_id'=>$request->user_id,
            'product_id'=>$request->product_id,
            'kg'=>$request->kg,
        ]);
        $orders=Order::all();
        return redirect()->route('dashboard');
    }       
    public function delete($id){

        $user=Order::find($id);
        $user->delete();
        return redirect()->back();
    }
}
