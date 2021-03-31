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

/* wishlist.test//?shop=l4-wishlist.myshopify.com */

Route::get('/', function () {
    return view('welcome');
})->middleware(['auth.shopify'])->name('welcome');

Route::view('/welcome', 'welcome');
Route::view('/products', 'products');
Route::view('/customer', 'customer');
Route::view('/settings', 'settings');
