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
// Cart
Route::resource('/cart', 'CartController');

// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('home');

//Dashboard Admin
Route::resource('/dashboard_admin','AdminController')->middleware('cekstatus');

//Dashboard seller
Route::resource('/dashboard_seller','SellerController');

// Product
Route::resource('/product','ProductController');
// Product seller
Route::get('/product_seller','ProductController@index_seller')->name('product.index_seller');
Route::get('/create_seller','ProductController@create_seller')->name('product.create_seller');
Route::post('/store_seller','ProductController@store_seller')->name('product.store_seller');
Route::get('/edit_seller/{id}','ProductController@edit_seller')->name('product.edit_seller');
Route::PATCH('/update_seller/{id}','ProductController@update_seller')->name('product.update_seller');
Route::delete('/destroy_seller/{id}','ProductController@destroy_seller')->name('product.destroy_seller');

// User
Route::resource('/user','UserController')->middleware('cekstatus');

// Category
Route::resource('/category','CategoryController')->middleware('cekstatus');

// Order
Route::get('/order/{type?}', 'OrderController@order');
Route::post('toggledeliver/{orderId}', 'OrderController@toggledeliver')->name('toggle.deliver');


Route::get('shipping-info', 'CheckoutController@shipping')->name('checkout.shipping');