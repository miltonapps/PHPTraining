<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', '/home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/category/{name}', 'HomeController@show')->name('homeCategory');
Route::get('/home/search/{name}', 'HomeController@search');
Route::redirect('/home/search/', '/home');

Route::get('/details/{productid}', 'DetailsController@index')->name('details');