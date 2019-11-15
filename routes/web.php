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



// Route::get('/sample', function () {
//     return view('sample');
// });

// Route::post('/upload', 'HelloController@upload');
Route::group(['middleware' => 'auth'], function() {

Route::get('/items', 'ItemController@index')->name('items.index');
Route::get('/items/{item_id}', 'ItemController@detail')->name('items.detail');
Route::post('/items/{item_id}', 'ItemController@addCart');

Route::get('/cart', 'CartController@showCart')->name('cart.cart');
Route::post('/cart', 'CartController@showCart');

// Route::get('/items', function () {
//     return view('welcome');
// });
Route::get('/', 'HomeController@index')->name('home');

});

Auth::routes();
