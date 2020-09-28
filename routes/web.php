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

Route::get('/', 'PagesController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/products-overview/{id}', 'PagesController@getProducts')->name('products.index');

Route::get('product-details/{id}', 'PagesController@productOverview')->name('product.details');

Route::get('/add-to-cart/{id}', 'CartController@addToCart')->name('cart.addToCart');

Route::get('/shoppingcart', 'CartController@getCart')->name('cart.shoppingcart');

Route::get('/remove-item/{id}', 'CartController@removeItem')->name('cart.removeItem');

Route::get('/remove-all-items/{id}', 'CartController@removeAllItems')->name('cart.removeAllItems');