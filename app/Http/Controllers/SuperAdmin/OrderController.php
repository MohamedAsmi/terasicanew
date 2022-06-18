<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\Orders;

class OrderController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  public function __construct()
    {
        $this->middleware('is_superadmin');
    }

    public function index()
    {
        $orders = Orders::join('subscribers','orders.subscriberid','subscribers.id')
        ->join('products','orders.itemid','products.id')
        ->select('subscribers.name as subscribers','products.review as review','products.hinda as price','orders.*')
        ->get();

        $data['orders'] = $orders;
       return view('superadmin.orders', $data);
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orders = Orders::join('subscribers','orders.subscriberid','subscribers.id')
        ->join('products','orders.itemid','products.id')
        ->where('orders.id',$id)
        ->select('subscribers.name as subscribers','products.review as review','products.p_name as name','products.hinda as price','orders.*')
        ->first();

       $data['orders'] = $orders;
       return view('superadmin.models.orders.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
