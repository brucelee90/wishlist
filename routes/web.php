<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use \App\Models\Setting;
use \App\Models\Wishlist;

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




Route::middleware(['auth.shopify'])->group(function () {

    Route::get('/', function () {

        $shop = Auth::user();
        $settings = Setting::where('shop_id', $shop->name)->first();

        // dd($settings);


        return view('welcome', compact('settings'));

    })->name('welcome');

    // Route::view('/welcome', 'welcome');
    Route::view('/products', 'products');
    Route::view('/customer', 'customer');
    Route::view('/settings', 'settings');
    Route::get('/configureTheme', "SettingController@configureTheme");

    Route::get('/test', function () {

        $shop = Auth::user();

        $queryItemsArray = [];
        $wishlistItems = Wishlist::where('shop_id', '=', 'l4-wishlist.myshopify.com')->get();

        foreach ($wishlistItems as $item){
            array_push($queryItemsArray, '"gid://shopify/Product/'.$item->product_id.'"');
        }

        $queryItemsArray = implode(",",$queryItemsArray);

        $query = "
        {
          nodes(ids: [$queryItemsArray]) {
            ...on Product {
                id
                title
                handle
                createdAt
                priceRange{
                    maxVariantPrice{
                        amount
                    }
                }
            }
          }
        }";

        $result = $shop->api()->graph($query);
        return $result;
    });

});

