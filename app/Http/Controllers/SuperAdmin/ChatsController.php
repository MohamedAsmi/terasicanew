<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Chat;
use App\Employee;
use App\GroupChat;
use App\Team_chat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\New_;
use PHPUnit\TextUI\XmlConfiguration\Group;
use stdClass;
use Carbon\Carbon;
use Symfony\Component\VarDumper\Cloner\Data;

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


        $gr_chat_sender = DB::table('users')
            ->where('users.id', auth()->user()->id)
            ->join('group_chats', 'users.id', '=', 'group_chats.sender_id')
            ->join('employees', 'group_chats.chat_email', '=', 'employees.e_email')
            ->join('chats', 'group_chats.chat_id', '=', 'chats.chat_id')
            ->where('chats.type', 'single')
            ->select('chats.*')
            ->get();

        $gr_chat_resive = DB::table('users')
            ->where('id', Auth::user()->id)
            ->join('employees',  'users.email', '=', 'employees.e_email')
            ->join('group_chats', 'employees.employee_id', '=', 'group_chats.receive_id')
            ->join('chats', 'group_chats.chat_id', '=', 'chats.chat_id')
            ->where('chats.type', 'single')
            ->select('chats.*')
            ->get();

        $groupChats = [];
        $allTeams = Team_chat::select('g_id')->get();

        $userid = Employee::where('e_email', auth()->user()->email)->select('employees.employee_id')->get();
        foreach ($allTeams as $teamid) {
            for ($i = 0; $i < 20; $i++) {
                $Teamlist = Team_chat::where('g_id', $teamid->g_id)
                    ->where('team_members' . $i, $userid[0]->employee_id)
                    ->select('*')
                    ->get();
                if (count($Teamlist) > 0) {
                    array_push($groupChats, $Teamlist);
                }
            }
        }
        // dd($groupChats);
        $groupChats_list = [];
        foreach ($groupChats as $groupChat) {
            $groupChatList = DB::table('group_chats')
                ->where('g_id', $groupChat[0]->g_id)
                ->join('chats', 'group_chats.chat_id', '=', 'chats.chat_id')
                ->join('users', 'group_chats.sender_id', '=', 'users.id')
                // ->where('id', auth()->user()->id)
                ->get();
            // if (count($groupChatList) > 0) {
            $groupChats_list[] = $groupChatList;
            // }
        }

        $senderList = [];
        ///////////////////////////////////////////////

        for ($i = 0; $i < count($gr_chat_sender); $i++) {
            $senderList['sender' . $i] = $gr_chat_sender[$i]->date;
        }

        // /////////////////////////////////////////////

        for ($q = 0; $q < count($gr_chat_resive); $q++) {
            $senderList['resive' . $q] = $gr_chat_resive[$q]->date;
        }

        ////////////////////////////////////////////
        $r = $i;
        foreach ($groupChats_list as $g_list) {
            for ($i = 0; $i < count($g_list); $i++) {
                $senderList['sender' . $r] = $g_list[$i]->date;
                $r++;
            }
        }

        sort($senderList);

        $r = 0;
        $chat = [
            "resive" => $gr_chat_resive,
            'sender' => $gr_chat_sender,
            "time_schedule" => $senderList
        ];


        $senderList2 = [];
        for ($i = count($senderList) - 1; $i >= 0;) {
            if (array_search($senderList[$i], $senderList2) === 0) {
                $i = $i - 1;
                continue;
            }
            if (empty(array_search($senderList[$i], $senderList2))) {
                $senderList2[$r] = $senderList[$i];
                $r++;
            }
            $i = $i - 1;
        }

        $Employees_list = [];
        $Employees = [];
        $emp_id_lsit = array('list');
        $group_lsit = array('list');
        foreach ($senderList2 as $date) {
            $dataChecking = DB::table('chats')
                ->where('date', $date)
                ->join('group_chats', 'chats.chat_id', '=', 'group_chats.chat_id')
                ->get();
            if ($dataChecking[0]->chat_email == auth()->user()->email) {
                $Employees_list = DB::table('chats')
                    ->where('date', $date)
                    ->join('group_chats', 'chats.chat_id', '=', 'group_chats.chat_id')
                    ->join('users', 'group_chats.sender_id', 'users.id')
                    ->join('employees', 'users.email', 'employees.e_email')
                    ->where('type', 'single')
                    ->select('employees.*', 'group_chats.*', 'chats.*')
                    ->get();
            } else {
                $Employees_list = DB::table('chats')
                    ->where('date', $date)
                    ->join('group_chats', 'chats.chat_id', '=', 'group_chats.chat_id')
                    ->join('employees', 'group_chats.receive_id', 'employees.employee_id')
                    ->where('type', 'single')
                    ->select('employees.*', 'group_chats.*', 'chats.*')
                    ->get();
            }


            if (count($Employees_list) <= 0) {
                // print_r($date);
                $Employees_list = DB::table('chats')
                    ->where('date', $date)
                    ->join('group_chats', 'chats.chat_id', '=', 'group_chats.chat_id')
                    ->join('team_chats', 'group_chats.g_id', '=', 'team_chats.g_id')
                    ->join('employees', 'group_chats.chat_email', 'employees.e_email')
                    ->where('type', 'group')
                    ->select('group_chats.*', 'chats.*', 'team_chats.*', 'employees.e_name', 'employees.e_email')
                    ->get();
            }

            // print_r($date);

            if ($Employees_list[0]->type == 'group' && empty(array_search($Employees_list[0]->g_id, $group_lsit))) {

                $Employees[] = [$Employees_list[0]];

                $group_lsit[] = $Employees_list[0]->g_id;
            } elseif ($Employees_list[0]->type == 'single' && empty(array_search($Employees_list[0]->employee_id, $emp_id_lsit))) {
                $Employees[] = [$Employees_list[0]];

                $emp_id_lsit[] =  $Employees_list[0]->employee_id;
            }
        }
        // dd($Employees);
        $Employees2 = Employee::select('employee_id', 'e_name', 'e_email', 'last_spot')->where('e_status', 1)->take(5)->get();

        for ($i = 0; $i < count($Employees2); $i++) {
            $Employees2[$i]->type = 'single';
        }
        foreach ($groupChats as $teamChat) {
            $teamChat[0]->last_spot = $teamChat[0]->created_at->format('Y-m-d h:i:s');
            $teamChat[0]->type = 'group';
            $Employees2[] = $teamChat[0];
        }
        $removedata = [];
        $finalrecord = [];

        for ($r = 0; $r < count($Employees); $r++) {

            foreach ($Employees[$r] as $employee) {
                for ($i = 0; $i < count($Employees2); $i++) {

                    if ($employee->type == 'single' && $Employees2[$i]->type == 'single') {
                        if ($employee->e_email == $Employees2[$i]->e_email) {
                            $employee->last_spot = $employee->date ? $employee->date : $employee->last_spot;
                            $removedata[] = $i;
                        }
                    } else {
                        if ($employee->g_id == $Employees2[$i]->g_id) {
                            $employee->last_spot = $employee->date ? $employee->date : $employee->last_spot;
                            $removedata[] = $i;
                        }
                    }
                }
                array_push($finalrecord, $employee);
            }
        }
        foreach ($removedata as $data) {
            $Employees2[$data] = '';
        }
        foreach ($Employees2 as $employee) {
            if (!empty($employee)) {
                $employee->message = $employee->message ? $employee->message : '';
                $employee->sender_id = $employee->sender_id ? $employee->sender_id : '';
                $employee->e_name = $employee->e_name ? $employee->e_name : '';
                $employee->e_email = $employee->e_email ? $employee->e_email : '';

                array_push($finalrecord, $employee);
            }
        }
        // dd($finalrecord);
        return view('superadmin.chats')->with('Employees', $finalrecord);
    }
    /////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////
    public function list($id)
    {

        if ($_GET['type'] == 'group') {

            $groupChats = [];
            $allTeams = Team_chat::select('g_id')->get();
            foreach ($allTeams as $teamid) {
                for ($i = 0; $i < 20; $i++) {
                    $Teamlist = Team_chat::where('g_id', $teamid->g_id)
                        ->where('team_members' . $i, auth()->user()->id)
                        ->select('g_id')
                        ->get();

                    if (count($Teamlist) > 0) {
                        array_push($groupChats, $Teamlist);
                    }
                }
            }


            $gr_chat_sender = DB::table('group_chats')
                ->where('g_id', $id)
                ->join('chats', 'group_chats.chat_id', '=', 'chats.chat_id')
                ->join('users', 'group_chats.sender_id', '=', 'users.id')
                ->where('id', auth()->user()->id)
                ->select('chats.*', "users.name")
                ->get();

            $gr_chat_resive = DB::table('group_chats')
                ->where('g_id', $id)
                ->join('chats', 'group_chats.chat_id', '=', 'chats.chat_id')
                ->where('chats.type', 'group')
                ->where('group_chats.sender_id', '!=', auth()->user()->id)
                ->join('users', 'group_chats.sender_id', 'users.id')
                ->select('chats.*', 'users.name')
                ->get();

            $senderList[] = new stdClass;
            for ($i = 0; $i < count($gr_chat_sender); $i++) {
                $senderList['sender' . $i] = $gr_chat_sender[$i]->date . "-rs" . $gr_chat_sender[$i]->chat_id;
            }

            for ($i = 0; $i < count($gr_chat_resive); $i++) {
                $senderList['resive' . $i] = $gr_chat_resive[$i]->date . "-rs" . $gr_chat_resive[$i]->chat_id;
            }
            // $gr_chat_resive = [];

        } else {
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
                    ->where('chats.type', 'single')
                    ->select('chats.*')
                    ->get();

                $gr_chat_resive = DB::table('employees')
                    ->where('employee_id', $id)
                    ->join('users', 'employees.e_email', '=', 'users.email')
                    ->join('group_chats', 'users.id', '=', 'group_chats.sender_id')
                    ->join('chats', 'group_chats.chat_id', '=', 'chats.chat_id')
                    ->where('group_chats.chat_email', auth()->user()->email)
                    ->where('chats.type', 'single')
                    ->select('chats.*')
                    ->get();


                $senderList[] = new stdClass;
                ///////////////////////////////////////////////

                for ($i = 0; $i < count($gr_chat_sender); $i++) {
                    $senderList['sender' . $i] = $gr_chat_sender[$i]->date . "-rs" . $gr_chat_sender[$i]->chat_id;
                }

                // /////////////////////////////////////////////

                for ($i = 0; $i < count($gr_chat_resive); $i++) {
                    $senderList['resive' . $i] = $gr_chat_resive[$i]->date . "-rs" . $gr_chat_resive[$i]->chat_id;
                }
            } else {
                return 'fail';
            }
        }
        sort($senderList);

        $chat = [
            "resive" => $gr_chat_resive,
            'sender' => $gr_chat_sender,
            "time_schedule" => $senderList
        ];

        return $chat;
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

        if ($request->chat_email == 'group') {
            $mail = auth()->user()->email;
            $type = 'group';
            $resiveBy = auth()->user()->id;
            $g_id = $request->employeeId;
        } else {
            $mail = $request->chat_email;
            $type = 'single';
            $resiveBy = $request->employeeId;
            $g_id = null;
        }

        $chat = new Chat();
        $chat->message = $request->response_msg;
        $chat->date = date('Y-m-d H:i:s');
        $chat->status = 1;
        $chat->chat_email = $mail;
        $chat->type = $type;
        $chat->save();

        $gr_chat = new GroupChat();
        $gr_chat->chat_id = $chat->id;
        $gr_chat->g_id = $g_id;
        $gr_chat->sender_id =  auth()->user()->id;
        $gr_chat->receive_id =  $resiveBy;
        $gr_chat->chat_email = $mail;
        $gr_chat->save();

        return response()->json($chat);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function createteam(Request $request)
    {
        $this->validate($request, [
            'TeamName' => 'required',
        ]);

        $chat = Team_chat::where('group_name',  $request->TeamName)->get();

        if (count($chat) > 0) {
            return redirect()->back()->with('Error', 'Team Name Already Exist');
        }
        $Team_chat = new Team_chat();
        $Team_chat->group_name = $request->TeamName;
        $Team_chat->team_members0 = 1;
        $Team_chat->status = 1;

        $Team_chat->save();

        return redirect()->back()->with('success', 'Team Created Successfuly');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addEmployeeToTeam(Request $request, $id)
    {
        $teamCH = Team_chat::where('g_id', $id)->get();
        $Team_chat = [];
        $ids = explode(',', $request->employee_ids);
        $w = 0;
        for ($r = 0; $r < count($ids); $r++) {
            $ext = false;
            for ($i = $w; $i < 20; $i++) {
                if($ext){
                    break;
                }
                if (empty($teamCH[0]['team_members' . $i])) {
                    $val = "team_members$i";
                    $Team_chat["team_members$i"] = $ids[$r];
                    $ext = true;
                    $w = $i+1;
                }
            }
        }

        
        Team_chat::where('g_id', $id)->update($Team_chat);

        return redirect()->back()->with('success','employee added');
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateTeam(Request $request, $id)
    {
        $this->validate($request, [
            'TeamName' => 'required',
        ]);

        $chat = Team_chat::where('group_name',  $request->TeamName)->get();

        if (count($chat) > 0) {
            return redirect()->back()->with('Error', 'Team Name Already Exist');
        } else {
            Team_chat::where('g_id', $id)->update(['group_name' => $request->TeamName]);
        }

        return redirect()->back()->with('success', 'Team Name Updated');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        foreach ($request->chat_ids as $chat_id) {
            $id = explode('0.', $chat_id);
            Chat::where('chat_id', $id[0])->delete();
            GroupChat::where('chat_id', $id[0])->delete();
        }

        return response()->json(["msg" => "Massage Delected Successfuly"]);
    }

    public function destroyTeam(Request $request)
    {
        foreach ($request->chat_ids as $chat_id) {
            $id = explode('0.', $chat_id);
            Chat::where('chat_id', $id[0])->delete();
            GroupChat::where('chat_id', $id[0])->delete();
        }

        return response()->json(["msg" => "Massage Delected Successfuly"]);
    }
}
