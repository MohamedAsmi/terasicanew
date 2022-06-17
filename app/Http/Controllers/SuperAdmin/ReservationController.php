<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Reservation;
use Yajra\DataTables\DataTables;
use App\Http\Requests\SystemAdmin\UpdateResevationRequest;

class ReservationController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    
    
    public function index()
    {
       return view('superadmin.Reservations');
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
    public function store(UpdateResevationRequest $request)
    {
        Reservation::insertRow([
            'r_name' => $request->r_name,
            'num_of_book' => $request->num_of_book,
            'date' => $request->date,
            'clock_time' => $request->clock_time,
        ]);

        return self::response('success', 'Created!');

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
        return view('superadmin.models.reservation.edit')->with([
            'resevations' => $resevations
        ]);

    }
    public function add_new()
    {
        return view('superadmin.models.reservation.add_new');
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
    public function list(){
        $model =Reservation::get();

        return DataTables::of($model)
        ->addColumn('edit', function ($model) {
            return '<a href="javascript:void(0)" class="load-modal" title="Edit"
                        data-url="' . route('reservation.edit', ['id' => $model->id]) . '">
                        <i class="fas fa-edit"></i>
                    </a>';
        })
        ->addColumn('delete', function ($model) {
            return '<a href="javascript:void(0)" class="delete" title="Delete"
                        data-url="' . route('reservation.delete', ['id' => $model->id]) . '">
                            <i class="fas fa-trash text-danger"></i>
                        </a>';
        })

        ->rawColumns(['edit','delete'])
        ->addIndexColumn()
        ->make(true);
    }
     public function delete($id)
    {
        Reservation::deleteById($id);
        return self::response('success', 'Deleted!');
    }
}