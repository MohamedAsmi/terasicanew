<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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

    public function list()
    {
        $employee = DB::table('employees')->select('employee_id', 'e_name', 'work_task', 'n_of_h_week', 'last_spot')->where('employee_id', '>', '1')->get();

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

        $Employees = Employee::where('e_email', '=', $request->EmployeeEmail)->first();

        if (!$Employees) {
            $data = [
                'e_name' => $request->EmployeeName,
                'e_email' => $request->EmployeeEmail,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            DB::table('Employees')->insert($data);
        }

        $user = User::where('email', '=', $request->EmployeeEmail)->first();

        if (!$user) {
            $main = Str::random(10);
            $passwod = Hash::make($main);

            $user = new user();
            $user->name = $request->EmployeeName;
            $user->email = $request->EmployeeEmail;
            $user->is_admin = 2;
            $user->password = $passwod;
            $user->save();


            $msg = '<tr><td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;" align="left">
                <h1 style="margin: 0px; line-height: 140%; text-align: center; word-wrap: break-word; font-weight: normal; font-family: arial,helvetica,sans-serif; font-size: 22px;">
                    Welcome to Terasica "' . $request->EmployeeName . '"
                </h1></td></tr></tbody></table><table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0"><tbody><tr>
            <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;" align="left">
                <div style="line-height: 140%; text-align: left; word-wrap: break-word;">
                    <p style="font-size: 14px; line-height: 140%;">This Email Include Your Account Details, So Please Keep It Safe.</p>
                    <p style="font-size: 14px; line-height: 140%;">&nbsp;</p>
                    <p style="font-size: 14px; line-height: 140%;"><span style="color: #f1c40f; font-size: 14px; line-height: 19.6px;">Email Address: ' . $request->EmployeeEmail . '</span></p>
                    <p style="font-size: 14px; line-height: 140%;"><span style="color: #f1c40f; font-size: 14px; line-height: 19.6px;">Login Password: ' . $main . '</span></p>
                    <p style="font-size: 14px; line-height: 140%;"><span style="color: #f1c40f; font-size: 14px; line-height: 19.6px;">Account Created Data:' . date('Y-m-d H:i:s') . '</span></p>';

            $mailData = [
                'Recipient' => $request->EmployeeEmail,
                'FromEmail' => env('Mail_From_Address'),
                'FromName' => env('MAIL_FROM_NAME'),
                'subject' => 'Terasica Employee',
                'body' => $msg
            ];
            $mail = Mail::send('emailTamplate', $mailData, function ($massage) use ($mailData) {
                $massage->to($mailData['Recipient'])
                    ->from($mailData['FromEmail'], $mailData['FromName'])
                    ->subject($mailData['subject']);
            });
        } elseif (!$Employees) {
            DB::table('users')
                ->where('email', $request->EmployeeEmail)
                ->update(['is_admin', 2]);
        }

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

        $employee_email = Employee::where('employee_id', $id[0])->select("employees.e_email")->get();

        if (!empty($employee_email[0]->e_email)) {
            DB::table('users')
                ->where('email', $employee_email[0]->e_email)
                ->update(['is_admin'=> 0]);

            $employee = Employee::where('employee_id', $id[0])->delete();
        }

        return redirect()->back();
    }
}
