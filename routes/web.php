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
// Route::get('/collection', 'FrontendController@collection')->name('frontend.collection');
Route::get('/details/{id}', 'FrontendController@details');
// Route::get('/category/{id}', 'FrontendController@show')->name('collection.show');
Route::get('order/{id}', 'OrderController@index');
Route::post('order/{id}', 'OrderController@order');
Route::get('checkout', 'OrderController@checkout');
Route::delete('checkout/{id}', 'OrderController@delete');
Route::get('konfirmasi', 'OrderController@konfirmasi_ubah');
Route::post('konfirmasiyes', 'OrderController@konfirmasi_update');

Route::get('/buynow/{id}', 'CartController@buynow')->name('cart.buy');
// Cart
Route::resource('/cart', 'CartController');

// address
Route::resource('/address', 'AddressController');

// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('home');

// Product
Route::resource('/product','ProductController');

// User
Route::resource('/user','UserController')->middleware('cekstatus');

// Category
Route::resource('/category','CategoryController')->middleware('cekstatus');


Route::get('/transaksi', 'TransaksiController@index');
Route::post('transaksi/konfirmasi-cod/{id}', 'TransaksiController@konfirmasi_cod');
Route::post('transaksi/konfirmasi-transaksi/{id}', 'TransaksiController@konfirmasi_transaksi');
Route::post('transaksi/batal-konfirmasi-transaksi/{id}', 'TransaksiController@batal_konfirmasi_transaksi');
Route::get('transaksi/transaksi-detail/{id}','TransaksiController@pesanan_detail');

// Order
Route::get('/order/{type?}', 'OrderController@order');
Route::post('toggledeliver/{orderId}', 'OrderController@toggledeliver')->name('toggle.deliver');

// payment
Route::get('shipping-info', 'CheckoutController@shipping')->name('checkout.shipping');
Route::get('/payment', 'CheckoutController@payment')->name('checkout.payment');
Route::post('/store-payment', 'CheckoutController@storePayment')->name('payment.store');
