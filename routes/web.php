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




Route::middleware(['auth.shopify'])->group(function () {

    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');

    Route::view('/welcome', 'welcome');
    Route::view('/products', 'products');
    Route::view('/customer', 'customer');
    Route::view('/settings', 'settings');

    Route::get('/test', function (){
        $shop = Auth::user();
        $request = $shop->api()->rest('GET', '/admin/themes.json');
        // $request = $shop->api()->graph('{ shop { name } }');
        $themes = $request['body']->container['themes'];


        $currentTheme = '';
        foreach ($themes as $theme){
            if ($theme['role'] == 'main'){
                $currentTheme = $theme['id'];
            }
        }

        $snippet = '<h1>TEST<h1/>';
        $assetArray = array('asset'=> array('key' => 'snippets/l4-wishlist-app.liquid', 'value' => $snippet));

        $shop->api()->rest('PUT', '/admin/api/2021-01/themes/'.$currentTheme.'/assets.json', $assetArray);

       return 'Success';
    });

});
