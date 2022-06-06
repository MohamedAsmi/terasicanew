<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Chat;
use App\Employee;
use App\GroupChat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\New_;
use stdClass;

class ChatsController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['is_admin']);
    }

    public function index()
    {
        $Employees = Employee::select('employee_id', 'e_name', 'e_email', 'last_spot')->where('e_status', 1)->get();

        return view('superadmin.chats')->with('Employees', $Employees);
    }

    public function list($id)
    {
        $user = DB::table('employees')
            ->where('employee_id', $id)
            ->join('users', 'employees.e_email', '=', 'users.email')
            ->get();
        if ($user[0]->id != auth()->user()->id) {
            $gr_chat_sender = DB::table('users')
                ->where('users.id', auth()->user()->id)
                ->join('group_chats', 'users.id', '=', 'group_chats.sender_id')
                ->join('employees', 'group_chats.chat_email', '=', 'employees.e_email')
                ->join('chats', 'group_chats.chat_id', '=', 'chats.chat_id')
                ->where('employee_id', $id)
                ->select('chats.*')
                ->get();

            $gr_chat_resive = DB::table('employees')
                ->where('employee_id', $id)
                ->join('users', 'employees.e_email', '=', 'users.email')
                ->join('group_chats', 'users.id', '=', 'group_chats.sender_id')
                ->join('chats', 'group_chats.chat_id', '=', 'chats.chat_id')
                ->where('group_chats.chat_email',auth()->user()->email)
                ->select('chats.*')
                ->get();

           
            $senderList[] = new stdClass;
            ///////////////////////////////////////////////

            for ($i=0; $i < count($gr_chat_sender); $i++) { 
                $senderList['sender'.$i] = $gr_chat_sender[$i]->date;
            }

            // /////////////////////////////////////////////

            for ($i=0; $i < count($gr_chat_resive); $i++) { 
                $senderList['resive'.$i] = $gr_chat_resive[$i]->date;
            }
            sort($senderList);

            $chat = [
                "resive" => $gr_chat_resive,
                'sender' => $gr_chat_sender,
                "time_schedule" => $senderList
            ];
           return $chat;
        }else{
            return 'fail';
        }
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
            'response_msg' => 'required',
            'employeeId' => 'required',
        ]);

        $chat = new Chat();
        $chat->message = $request->response_msg;
        $chat->date = date('Y-m-d H:i:s');
        $chat->status = 1;
        $chat->chat_email = $request->chat_email;
        $chat->type = 'single';
        $chat->save();

        $gr_chat = new GroupChat();
        $gr_chat->chat_id = $chat->id;
        $gr_chat->sender_id =  auth()->user()->id;
        $gr_chat->receive_id =  $request->employeeId;
        $gr_chat->chat_email = $request->chat_email;
        $gr_chat->save();

        return response()->json($chat);
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
}
