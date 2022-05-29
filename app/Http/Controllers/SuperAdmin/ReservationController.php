<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

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
    public function list(){
        $rows = DB::table('client_user_clients as ec')
            ->join('users as u', 'ec.client_user_id', '=', 'u.id')
            ->join('clients as c', 'ec.client_id', '=', 'c.id')
            ->where('c.status', BaseModel::STATUS_ACTIVE)
            ->select(
                'ec.*',
                'u.first_name as employee_name',
                'u.last_name as last_name',
                'c.client_name as client_name',
                'c.code as client_code'
            );

        return DataTables::of($rows)

            ->addColumn('actions', function ($rows) {
                return '<a href="javascript:void(0)" class="delete" title="Delete"
                    data-url="' . route('clientuser-clients.delete', ['id' => $rows->id]) . '">
                        <i class=" dripicons-trash text-danger"></i>
                    </a>';
            })
            ->rawColumns(['actions'])
            ->addIndexColumn()
            ->make(true);
    }
}