<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
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

    public function show($category)
    {
        $products = \App\Product::paginate(9);

        $cagetories = collect(new \App\Category);
        $cagetories = $cagetories->merge(\App\Category::all());
        $cagetories->prepend(new \App\Category(['name' => 'All']));
        return view('home', ['products' => $products, 'categories' => $cagetories, 'currentCategory' => $category ]);
        // return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return $this->show("All");
    }

}
