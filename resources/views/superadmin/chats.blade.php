@extends('dashboard.master')
@section('page-title', '| Body')
@section('body')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 offset-1">
                <h1 class="m-0">Viestit</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


<section class="col-md-7 col-10 offset-1 primary-color-w" style="height: 100%;">

    <div class="row no-gutters" style="min-height: 90%;">
        <div class="col-md-5 border-right p-2">
            <div class="chatPostion2">
                <div class="row">
                    <div class="settings-tray col-md-8 mt-4 mb-5">
                        <span class="brand-text font-weight-light">Saapuneita viestejä (#0)</span>
                    </div>
                    <div class="search-box primary-color-w col-12">
                        <div class="row">
                            <div class="col-10">
                                <div class="input-wrapper primary-color-g rounded-0">
                                    <i class="material-icons">search</i>
                                    <input placeholder="Etsi" type="text" class="search_user rounded-0 primary-color-tr">
                                    {{-- <i class="fa fa-filter"></i> --}}
                                </div>
                            </div>
                            <!-- <div class="col-2">
                            <div class="input-wrapper">
                                {{-- <i class="material-icons">search</i>
                                <inputz placeholder="Search here" type="text"> --}}
                                <i class="fa fa-filter"></i>
                            </div>
                        </div> -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="row contect_list col-12">
                        @if( Auth::user()->is_admin == 2 || Auth::user()->is_admin == 1)
                        <!-- //////////////////////////////////////////////////////// -->
                            @php
                            $i = 0;
                            $io = [];
                            @endphp
                        <!-- ////////////////////////////////////////////////////////// -->
                            @foreach($Employees as $Employee)
                        
                            @php
                                if($i == 0){
                                    $cls = 'select_chat';
                                }else{
                                    $cls = '';
                                }
                                $time = explode(' ',$Employee->last_spot);
                                
                                if($time[0] === date('Y-m-d')){
                                    
                                    $time = explode(':',$time[1]);
                                    if($time[0] < 12){ $timeLine=$time[0].':'.$time[1].' am'; }else{ $timeLine=$time[0].':'.$time[1].' pm'; } $i++;
                                }else{
                                    $time = explode('-',$time[0]);
                                    if($time[1] == date('m') && $time[0] == date('Y')){
                                        if($time[2] == date('d')-1){
                                            $timeLine = 'Yesterday';
                                        } else {
                                            $timeLine = $time[1].'/'.$time[2];
                                        }
                                    }else {
                                        $timeLine = $time[1].'/'.$time[2];
                                    }
                                    
                                }
                            @endphp
                             
                            @if($Employee->type == 'single')
                           
                                <!-- //////////////////////////////////////////////////// -->
                                @if($Employee->e_email != Auth::user()->email)
                                    <!-- /////////////////////////////////////////////////// -->

                                    <div class="friend-drawer chat_lst friend-drawer--onhover col-12 pr-0" attr="lst_{{$i}}" attr_main="{{$Employee->e_email}}" attr_id="{{ $Employee->employee_id }}">
                                        <img class="profile-image" src="https://www.clarity-enhanced.net/wp-content/uploads/2020/06/optimus-prime.jpeg" alt="">
                                        <div class="text">
                                            <h6> {{$Employee->e_name}}</h6>
                                            <span class="lastMsg" style="color: #c4c4c4 !important;">{{$Employee->message}} </span>
                                        </div>
                                        <span class="time text-muted small" style="width: 80px;">
                                            {{$timeLine}}
                                        </span>
                                    </div>
                                    <hr class="w-100">
                                    <p>
                                    <span class="employee_btn offset-1 col-3 text-center primary-color primary-text-cl-w border-radius_9 mb-2 hide" attr="{{$Employee->employee_id}}" style="padding: 10px 0px;">{{$Employee->e_name}}</span>
                                    </p>
                               
                                @endif
                            
                                <!-- ///////////////////////////////////////////////////////////// -->
                            @else
                            @php 
                                if($Employee->e_email == auth()->user()->email){
                                    $lable = 'you';
                                }else{
                                    $lable = explode(' ',$Employee->e_name);
                                    $lable = $lable[0];
                                }
                                
                                $attr = '';
                                for($i = 0; $i < 20; $i++){
                                    $val = "team_members$i";
                                    $mark = ',';
                                    if(!empty($Employee->$val)){
                                        $attr .= $mark.$Employee->$val;  
                                    }
                                }
                                
                            @endphp
                                <div class="friend-drawer chat_lst friend-drawer--onhover col-12 pr-0" attr="lst_{{$i}}" attr_main="{{$Employee->type}}" attr_id="{{ $Employee->g_id }}">
                                    <img class="profile-image" src="https://www.clarity-enhanced.net/wp-content/uploads/2020/06/optimus-prime.jpeg" alt="">
                                    <div class="text">
                                        <h6>{{$Employee->group_name}}</h6>
                                        <span class="lastMsg" style="color: #c4c4c4 !important;">{{$lable}}@if(!empty($Employee->message)):  @endif{{$Employee->message}} </span>
                                    </div>
                                    <span class="time text-muted small" style="width: 80px;">
                                        {{$timeLine}}
                                    </span>
                                    
                                    <span class="group_lst hide" attr="{{ $Employee->g_id }}{{$attr}}"></span>

                                </div>
                                <hr class="w-100">
                               
                                
                            @endif
                        <!-- //////////////////////////////////////////////////////// -->
                        @endforeach
                    @else

                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="" style="min-width: 100%; height: 90%;position: absolute;">
            <div class="settings-tray primary-color-w mt-3">
                <div class="friend-drawer no-gutters">
                    <img class="profile-image" src="https://www.clarity-enhanced.net/wp-content/uploads/2020/06/robocop.jpg" alt="">
                    <div class="text m-auto" style="margin-left: 10px !important;">
                        <h5>Esko Esimerkki</h5>
                        {{-- <p class="text-muted">Esko Esimerkki</p> --}}
                    </div>
                    <div class="chat_menu-icon">
                        <i class="fa-solid fa-ellipsis-vertical"></i>
                        <ul id="select_menu" attr="0">
                            @if(Auth::user()->is_admin == 1)
                            <li value="create_team">Create Team</li>
                            <li value="edit_team" class="hide group_list">Edit Team</li>
                            <li value="add_emp" class="hide group_list">Add Employees The Team</li>
                            <li value="del_team" class="hide group_list">Delete Team</li>
                            @endif
                            <li value="set">Select</li>
                            <li value="set_a">Select All</li>
                            <li value="del">Delete Massage</li>
                        </ul>

                    </div>
                    {{-- <span class="settings-tray--right">
                            <i class="material-icons">cached</i>
                            <i class="material-icons">message</i>
                            <i class="material-icons">menu</i>
                        </span> --}}
                </div>
            </div>
            <div class="chat-panel chatPostion" style="min-width: 100%;">

            </div>
        </div>
        <div class="row msg_bar" style="height: 60px; width: 100%;">
            <div class="col-10 pr-0" style="height: 100%;">
                <div class="row chat-box-tray" style="height: 60px;">
                    <div class="col-1" style="padding: 4px;">
                        <img src='{{ asset("img/Memoji Boys.png")}}' style='width: 100%; margin:10%; float: right;'>
                    </div>

                    <input type="text" class="sent_message" name="response_msg" placeholder="Type your message here...">
                    <input type="hidden" class="sent_message" name="employeeId">
                    <input type="hidden" class="mainId" name="mainId">
                </div>

            </div>
            <div class="col-2 pl-0 primary-color-w send_msg" style="height: 100%;">
                <button type="submit" name="submit" class="chat_send_button"><i class="fa fa-paper-plane"></i></button>
            </div>
        </div>
        <span id="chat_count" attr="2" se_attr="2"></span>
        <span class="dataLength"></span>
        <span class="refreshCount" reloadcount="0"></span>
    </div>
    </div>
    <div class="modal fade" id="EmployeeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content primary-color-g" style="border-radius: 20px;">
                <span class="close"><i class="fa-solid fa-xmark"></i></span>
                <div class="delete-modal-body p-2">
                </div>
                <div class="addoredit-modal-body">
                    @if(Auth::user()->is_admin == 1)
                    <form action="" method="POST" class="pr-4 pl-4">
                        @csrf
                        <div class="form-content row">
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script class="chat_script" src="{{ asset('js/superadmin/chat.js') }}"></script>

<div id="chat_script">
    <script class="chat_script" src="{{ asset('js/superadmin/reloadpage.js') }}"></script>

</div>
@endsection