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

// Frontend
Route::get('/', 'FrontendController@home');
Route::get('/home', 'FrontendController@home')->name('home');
Route::get('/collection', 'FrontendController@collection')->name('frontend.collection');
Route::get('/details/{id}', 'FrontendController@details');
Route::get('/category/{id}', 'FrontendController@show')->name('collection.show');


Route::get('/buynow/{id}', 'CartController@buynow')->name('cart.buy');

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Product
Route::resource('/product','ProductController');

// User
Route::resource('/user','UserController')->middleware('cekstatus');

// Category
Route::resource('/category','CategoryController')->middleware('cekstatus');

// Order
Route::get('/order/{type?}', 'OrderController@order');
Route::post('toggledeliver/{orderId}', 'OrderController@toggledeliver')->name('toggle.deliver');

// Cart
Route::get('/buynow/{id}', 'CartController@buynow')->name('cart.buy');
Route::resource('/cart', 'CartController');
