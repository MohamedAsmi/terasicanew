<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Reservation;
use App\Http\Requests\SystemAdmin\UpdateResevationRequest;

class TableMapController extends BaseController
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
        return view('superadmin.tablemap');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $resevations=Reservation::getById($id);
        return view('superadmin.models.shapes.edit')->with([
            'resevations' => $resevations
        ]);

    }

    public function delete($id)
    {
        Reservation::deleteById($id);
        return self::response('success', 'Deleted!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateResevationRequest $request, $id)
    {
        Reservation::updateById($id, $request->except('_token'));
        return self::response('success', 'Updated!');
        // return self::redirectWithResultAndMessage(
        //     'reservation-update',
        //     'success',
        //     'reservation Update Successfi!'
        // );
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
