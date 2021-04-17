<?php

namespace App\Http\Controllers;

use \Auth;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function configureTheme()
    {
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


        Setting::updateOrInsert(
            ['shop_id' => $shop->name],
            ['activated' => '1']
        );

        return 'Success';
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
    }

    /**
     * Display the specified re source.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
