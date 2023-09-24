<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Products::all();
        return view('dashboard_admin_product',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        Products::create([
            'name'=>$request->name,
        ]);

        return redirect()->back()->with('success','data created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    
        $request->validate([
            'name' => 'required|string',
        ]);

        $products=Products::find($id);

        $products->update([
            'name'=>$request->name,
        ]);
        
        $products->save();



        return redirect()->back()->with('success','data created');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item=Products::find($id);
        $item->delete();
       return redirect()->back();
    }
}
