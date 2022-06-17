<?php

namespace App\Http\Controllers;

use App\terrasica_stores;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TerrasicaStoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $terrasica_stores = DB::table('terrasica_stores')->select('terrasica_stores.*')->get();

        // dd($terrasica_stores);
        return view('user_view.home')->with('terrasica_stores',$terrasica_stores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user_view.home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        // 'store_name'=>'required',
        // 'store_description'=>'',
        // ]);

        // $input = $request->all();
        // $input['store_status'] = $request->store_status == 'open' ? 1 : 0;
        // $input['status'] = $request->status == 'active' ? 1 : 0;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\terrasica_stores  $terrasica_stores
     * @return \Illuminate\Http\Response
     */
    public function show(terrasica_stores $terrasica_stores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\terrasica_stores  $terrasica_stores
     * @return \Illuminate\Http\Response
     */
    public function edit(terrasica_stores $terrasica_stores)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\terrasica_stores  $terrasica_stores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, terrasica_stores $terrasica_stores)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\terrasica_stores  $terrasica_stores
     * @return \Illuminate\Http\Response
     */
    public function destroy(terrasica_stores $terrasica_stores)
    {
        //
    }
}
