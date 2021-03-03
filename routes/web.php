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
<<<<<<< HEAD
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

 // Category
 Route::resource('/category','CategoryController')->middleware('cekstatus');
 Route::resource('/product','ProductController');
 Route::resource('/user','UserController')->middleware('cekstatus');

=======

 // Category
 Route::resource('/category','CategoryController');
 Route::resource('/product','ProductController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
>>>>>>> 0d9070bea647a728bb23198d30ef4e40ac3ff4eb
