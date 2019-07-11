<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($productId)
    {
        $product = \App\Product::find($productId);

        $cagetories = collect(new \App\Category);
        $cagetories = $cagetories->merge(\App\Category::all());
        $cagetories->prepend(new \App\Category(['name' => 'All']));
        return view('details', ['product' => $product, 'categories' => $cagetories, 'currentCategory' => $product->category()->first()->name ]);
    }
}
