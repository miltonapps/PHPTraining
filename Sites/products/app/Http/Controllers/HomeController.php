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

        if ($category !== 'All')
        {
            $products = \App\Category::where('name', '=', $category)->firstOrFail()->products()->paginate(9);
        }
        return view('home', ['products' => $products, 'categories' => $cagetories, 'currentCategory' => $category, 'currentProduct' => null]);
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

    public function search($keyword)
    {
        $products = collect(new \App\Product);

        $cagetories = collect(new \App\Category);
        $cagetories = $cagetories->merge(\App\Category::all());
        $cagetories->prepend(new \App\Category(['name' => 'All']));
        $category = 'All';

        if ($keyword !== 'All')
        {
            $productList = \App\Product::where('name', 'LIKE', "%$keyword%")->paginate(9);
            $wordCount = count($productList);
            if ($wordCount > 0)
            {
                $products=$productList;
            }
        }
        return view('home', ['products' => $products, 'categories' => $cagetories, 'currentCategory' => $category, 'currentProduct' => null ]);
    }
}
