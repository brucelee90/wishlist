<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
                onlineStorePreviewUrl
                featuredImage {
      	            originalSrc
      	        }
      	        totalInventory
                priceRange{
                    maxVariantPrice{
                        amount
                        currencyCode
                    }
                }
            }
          }
        }";

        $products = $shop->api()->graph($query);

        return view('partials.wishlist-table', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        Wishlist::updateOrCreate($request->all());

        return 'success';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Wishlist $wishlist)
    {
        $item = Wishlist::where('shop_id', '=', $request['shop_id'])->where('customer_id', '=',$request['customer_id'])->where('product_id', '=', $request['product_id'])->first();
        return $item;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Wishlist $wishlist)
    {
        //
        $item = Wishlist::where('shop_id', '=', $request['shop_id'])->where('customer_id', '=',$request['customer_id'])->where('product_id', '=', $request['product_id'])->first();

        return Wishlist::destroy($item->id);
    }
}
