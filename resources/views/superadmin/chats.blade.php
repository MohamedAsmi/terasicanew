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
                <div class="">
                    <div class="row">
                        <div class="friend-drawer friend-drawer--onhover col-12">
                            <img class="profile-image" src="https://www.clarity-enhanced.net/wp-content/uploads/2020/06/robocop.jpg" alt="">
                            <div class="text">
                                <h6>Robo Cop</h6>
                                <p class="text-muted">Hey, you're arrested!</p>
                            </div>
                            <span class="time text-muted small">13:21</span>
                        </div>
                        <hr>
                        <div class="friend-drawer friend-drawer--onhover col-12">
                            <img class="profile-image" src="https://www.clarity-enhanced.net/wp-content/uploads/2020/06/optimus-prime.jpeg" alt="">
                            <div class="text">
                                <h6>Optimus</h6>
                                <p class="text-muted">Wanna grab a beer?</p>
                            </div>
                            <span class="time text-muted small">00:32</span>
                        </div>
                        <hr>
                        <div class="friend-drawer friend-drawer--onhover col-12 ">
                            <img class="profile-image" src="https://www.clarity-enhanced.net/wp-content/uploads/2020/06/real-terminator.png" alt="">
                            <div class="text">
                                <h6>Skynet</h6>
                                <p class="text-muted">Seen that canned piece of s?</p>
                            </div>
                            <span class="time text-muted small">13:21</span>
                        </div>
                        <hr>
                        <div class="friend-drawer friend-drawer--onhover col-12">
                            <img class="profile-image" src="https://www.clarity-enhanced.net/wp-content/uploads/2020/06/termy.jpg" alt="">
                            <div class="text">
                                <h6>Termy</h6>
                                <p class="text-muted">Im studying spanish...</p>
                            </div>
                            <span class="time text-muted small">13:21</span>
                        </div>
                        <hr>
                        <div class="friend-drawer friend-drawer--onhover col-12">
                            <img class="profile-image" src="https://www.clarity-enhanced.net/wp-content/uploads/2020/06/rick.jpg" alt="">
                            <div class="text">
                                <h6>Richard</h6>
                                <p class="text-muted">I'm not sure...</p>
                            </div>
                            <span class="time text-muted small">13:21</span>
                        </div>
                        <hr>
                        <div class="friend-drawer friend-drawer--onhover col-12">
                            <img class="profile-image" src="https://www.clarity-enhanced.net/wp-content/uploads/2020/06/rachel.jpeg" alt="">
                            <div class="text">
                                <h6>XXXXX</h6>
                                <p class="text-muted">Hi, wanna see something?</p>
                            </div>
                            <span class="time text-muted small">13:21</span>
                        </div>
                        <div class="friend-drawer friend-drawer--onhover col-12">
                            <img class="profile-image" src="https://www.clarity-enhanced.net/wp-content/uploads/2020/06/rachel.jpeg" alt="">
                            <div class="text">
                                <h6>XXXXX</h6>
                                <p class="text-muted">Hi, wanna see something?</p>
                            </div>
                            <span class="time text-muted small">13:21</span>
                        </div>
                        <div class="friend-drawer friend-drawer--onhover col-12">
                            <img class="profile-image" src="https://www.clarity-enhanced.net/wp-content/uploads/2020/06/rachel.jpeg" alt="">
                            <div class="text">
                                <h6>XXXXX</h6>
                                <p class="text-muted">Hi, wanna see something?</p>
                            </div>
                            <span class="time text-muted small">13:21</span>
                        </div>
                        <div class="friend-drawer friend-drawer--onhover col-12">
                            <img class="profile-image" src="https://www.clarity-enhanced.net/wp-content/uploads/2020/06/rachel.jpeg" alt="">
                            <div class="text">
                                <h6>XXXXX</h6>
                                <p class="text-muted">Hi, wanna see something?</p>
                            </div>
                            <span class="time text-muted small">13:21</span>
                        </div>
                        <div class="friend-drawer friend-drawer--onhover col-12">
                            <img class="profile-image" src="https://www.clarity-enhanced.net/wp-content/uploads/2020/06/rachel.jpeg" alt="">
                            <div class="text">
                                <h6>XXXXX</h6>
                                <p class="text-muted">Hi, wanna see something?</p>
                            </div>
                            <span class="time text-muted small">13:21</span>
                        </div>
                        <div class="friend-drawer friend-drawer--onhover col-12">
                            <img class="profile-image" src="https://www.clarity-enhanced.net/wp-content/uploads/2020/06/rachel.jpeg" alt="">
                            <div class="text">
                                <h6>XXXXX</h6>
                                <p class="text-muted">Hi, wanna see something?</p>
                            </div>
                            <span class="time text-muted small">13:21</span>
                        </div>
                        <div class="friend-drawer friend-drawer--onhover col-12">
                            <img class="profile-image" src="https://www.clarity-enhanced.net/wp-content/uploads/2020/06/rachel.jpeg" alt="">
                            <div class="text">
                                <h6>XXXXX</h6>
                                <p class="text-muted">Hi, wanna see something?</p>
                            </div>
                            <span class="time text-muted small">13:21</span>
                        </div>
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
                    <div class="row no-gutters mt-3">
                        <div class="col-1">
                            <img src='{{ asset("img/Memoji Boys.png")}}' style='width: 60%; margin:10%;'>
                        </div>
                        <div class="col-md-10">
                            <span class="resive_massage">
                                Hello dude!
                            </span>
                        </div>
                    </div>
                    <div class="row no-gutters mt-3">
                        <div class="col-10 offset-1">
                            <span class="sender_massage">
                                Hello dude!
                            </span>
                        </div>
                        <div class="col-1">
                            <img src='{{ asset("img/Memoji Boys.png")}}' style='width: 60%; margin:10%; float: right;'>
                        </div>
                    </div>
                    <div class="row no-gutters mt-3">
                        <div class="col-10 offset-1">
                            <span class="sender_massage">
                                Hello dude!
                            </span>
                        </div>
                        <div class="col-1">
                            <img src='{{ asset("img/Memoji Boys.png")}}' style='width: 60%; margin:10%; float: right;'>
                        </div>
                    </div>
                    <div class="row no-gutters mt-3">
                        <div class="col-1">
                            <img src='{{ asset("img/Memoji Boys.png")}}' style='width: 60%; margin:10%;'>
                        </div>
                        <div class="col-md-10">
                            <span class="resive_massage">
                                Hello dude!
                            </span>
                        </div>
                    </div>
                    <div class="row no-gutters mt-3">
                        <div class="col-1">
                            <img src='{{ asset("img/Memoji Boys.png")}}' style='width: 60%; margin:10%;'>
                        </div>
                        <div class="col-md-10">
                            <span class="resive_massage">
                                Hello dude!
                            </span>
                        </div>
                    </div>
                    <div class="row no-gutters mt-3">
                        <div class="col-1">
                            <img src='{{ asset("img/Memoji Boys.png")}}' style='width: 60%; margin:10%;'>
                        </div>
                        <div class="col-md-10">
                            <span class="resive_massage">
                                Hello dude!
                            </span>
                        </div>
                    </div>
                    <div class="row no-gutters mt-3">
                        <div class="col-10 offset-1">
                            <span class="sender_massage">
                                Hello dude!
                            </span>
                        </div>
                        <div class="col-1">
                            <img src='{{ asset("img/Memoji Boys.png")}}' style='width: 60%; margin:10%; float: right;'>
                        </div>
                    </div>
                    <div class="row no-gutters mt-3">
                        <div class="col-10 offset-1">
                            <span class="sender_massage">
                                Hello dude!
                            </span>
                        </div>
                        <div class="col-1">
                            <img src='{{ asset("img/Memoji Boys.png")}}' style='width: 60%; margin:10%; float: right;'>
                        </div>
                    </div>
                    <div class="row no-gutters mt-3">
                        <div class="col-10 offset-1">
                            <span class="sender_massage">
                                Hello dude!
                            </span>
                        </div>
                        <div class="col-1">
                            <img src='{{ asset("img/Memoji Boys.png")}}' style='width: 60%; margin:10%; float: right;'>
                        </div>
                    </div>
                    <div class="row no-gutters mt-3">
                        <div class="col-10 offset-1">
                            <span class="sender_massage">
                                Hello dude!
                            </span>
                        </div>
                        <div class="col-1">
                            <img src='{{ asset("img/Memoji Boys.png")}}' style='width: 60%; margin:10%; float: right;'>
                        </div>
                    </div>
                    <div class="row no-gutters mt-3">
                        <div class="col-10 offset-1">
                            <span class="sender_massage">
                                Hello dude!
                            </span>
                        </div>
                        <div class="col-1">
                            <img src='{{ asset("img/Memoji Boys.png")}}' style='width: 60%; margin:10%; float: right;'>
                        </div>
                    </div>
                    <div class="row no-gutters mt-3">
                        <div class="col-10 offset-1">
                            <span class="sender_massage">
                                Hello dude!
                            </span>
                        </div>
                        <div class="col-1">
                            <img src='{{ asset("img/Memoji Boys.png")}}' style='width: 60%; margin:10%; float: right;'>
                        </div>
                    </div>
                    <div class="row no-gutters mt-3">
                        <div class="col-10 offset-1">
                            <span class="sender_massage">
                                Hello dude!
                            </span>
                        </div>
                        <div class="col-1">
                            <img src='{{ asset("img/Memoji Boys.png")}}' style='width: 60%; margin:10%; float: right;'>
                        </div>
                    </div>
                    <div class="row no-gutters mt-3">
                        <div class="col-10 offset-1">
                            <span class="sender_massage">
                                Hello dude!
                            </span>
                        </div>
                        <div class="col-1">
                            <img src='{{ asset("img/Memoji Boys.png")}}' style='width: 60%; margin:10%; float: right;'>
                        </div>
                    </div>
                    <div class="row no-gutters mt-3" style="margin-bottom: 80px !important;">
                        <div class="col-10 offset-1">
                            <span class="sender_massage">
                                Hello dude!
                            </span>
                        </div>
                        <div class="col-1">
                            <img src='{{ asset("img/Memoji Boys.png")}}' style='width: 60%; margin:10%; float: right;'>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row msg_bar" style="height: 60px; width: 100%;">
                <div class="col-10 pr-0" style="height: 100%;">
                    <div class="row chat-box-tray" style="height: 60px;">
                        <div class="col-1" style="padding: 4px;">
                            <img src='{{ asset("img/Memoji Boys.png")}}' style='width: 100%; margin:10%; float: right;'>
                        </div>
                        <input type="text" class="sent_message" placeholder="Type your message here...">
                    </div>

                </div>
                <div class="col-2 pl-0 primary-color-w" style="height: 100%;">
                    <i class="fa fa-paper-plane chat_send_button"></i>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection