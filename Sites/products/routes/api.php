<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * Show the product.
 *
 * @return \Illuminate\Contracts\Support\Renderable
 */
Route::get('products/{id}', function($id) {
    return \App\Product::find($id);
});

Route::get('products', function() {
    // If the Content-Type and Accept headers are set to 'application/json', 
    // this will return a JSON structure. This will be cleaned up later.
    return \App\Product::all();
});

Route::post('products', function(Request $request) {
    return \App\Product::create($request->all());
});