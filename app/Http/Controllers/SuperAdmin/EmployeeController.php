<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\DB;

class EmployeeController extends BaseController
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
        $employee = DB::table('employees')->get();
        return view('superadmin.Employees');
    }

    public function list(Request $request)
    {
        $employee = DB::table('employees')->select('employee_id', 'e_name', 'work_task', 'n_of_h_week', 'last_spot')->get();
        return response()->json($employee);
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

        $this->validate($request, [
            'EmployeeName' => 'required',
            'EmployeeEmail' => 'required|email',
        ]);
        $data = [
            'e_name' => $request->EmployeeName,
            'e_email' => $request->EmployeeEmail,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        DB::table('Employees')->insert($data);
        return redirect()->back();
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
    public function edit(Request $request)
    {

        $this->validate($request, [
            'EmployeeName' => 'required',
            'EmployeeEmail' => 'required|email',
            'EmployeeTel' => 'required|numeric',
        ]);
        $data = [
            'e_name' => $request->EmployeeName,
            'e_email' => $request->EmployeeEmail,
            'e_tel' => $request->EmployeeTel,
            'n_of_h_week' => $request->WeeklyHours,
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $id = explode('0.',  $request->id);

        DB::table('Employees')
            ->where('employee_id', $id[0])
            ->update($data);

        return redirect()->back();
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
        $id = explode('0.', $id);
        $employee = Employee::where('employee_id', $id[0])->delete();
        // $employee->delete();
        return redirect()->back();
    }
}
