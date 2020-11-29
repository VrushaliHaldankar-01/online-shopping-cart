<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('welcome','App\Http\Controllers\ProductController@home')->name('welcome');
Route::get('product_details','App\Http\Controllers\ProductController@index')->name('pro_details');
Route::get('add-to-cart/{products}','App\Http\Controllers\ProductController@addtocart')->name('add-cart')->middleware('auth');
Route::get('cart','App\Http\Controllers\ProductController@cart')->name('cart');
Route::get('cart/{id}','App\Http\Controllers\ProductController@destroy')->name('remove')->middleware('auth');

Route::get('cart/{id}/{quantity2}','App\Http\Controllers\ProductController@increase')->name('increase');
Route::get('cart/{id}/{quantity}/{price}','App\Http\Controllers\ProductController@decrease')->name('decrease');
Route::get('checkout','App\Http\Controllers\ProductController@checkout')->name('checkout');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
