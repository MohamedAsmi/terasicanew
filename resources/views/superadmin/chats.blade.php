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
            <div class="chatPostion">
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
                        @if( Auth::user()->is_admin == 2)
                        @php
                        $i = 0;
                        @endphp
                        @foreach($Employees as $Employee)

                        @if($Employee->e_email != Auth::user()->email)
                        @php
                        if($i == 0){
                        $cls = 'select_chat';
                        }else{
                        $cls = '';
                        }
                        $time = explode(' ',$Employee->last_spot);
                        $time = explode(':',$time[1]);
                        if($time[0] < 12){ $timeLine=$time[0].':'.$time[1].' am'; }else{ $timeLine=$time[0].':'.$time[1].' pm'; } $i++; @endphp <div class="friend-drawer chat_lst friend-drawer--onhover col-12 pr-0 {{ $cls }}" attr_main="{{$Employee->e_email}}" attr_id="{{ $Employee->employee_id }}">
                            <img class="profile-image" src="https://www.clarity-enhanced.net/wp-content/uploads/2020/06/optimus-prime.jpeg" alt="">
                            <div class="text">
                                <h6>{{$Employee->e_name}}</h6>
                            </div>
                            <span class="time text-muted small" style="width: 80px;">
                                {{$timeLine}}
                            </span>
                    </div>
                    <hr class="w-100">
                    @endif
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
                    </div>
                    {{-- <span class="settings-tray--right">
                            <i class="material-icons">cached</i>
                            <i class="material-icons">message</i>
                            <i class="material-icons">menu</i>
                        </span> --}}
                </div>
            </div>
            <div class="chat-panel chatPostion" style="min-width: 100%; height: 90%;">

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
    </div>
    </div>

</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<div id="chat_script">
    <script src="{{ asset('js/superadmin/chat.js') }}"></script>
</div>
@endsection