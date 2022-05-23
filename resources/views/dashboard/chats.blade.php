@extends('dashboard.master')
@section('page-title', '| Body')
@section('body')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <section class="container-fluid col-md-10">

        <div class="row no-gutters">
            <div class="col-md-4 border-right">
                <div class="settings-tray col-md-8">
                    <span class="brand-text font-weight-light">Saapuneita viestejä (#0)</span>
                </div>
                <div class="search-box">
                    <div class="row">
                        <div class="col-10">
                            <div class="input-wrapper">
                                <i class="material-icons">search</i>
                                <input placeholder="Search here" type="text">
                                {{-- <i class="fa fa-filter"></i> --}}
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-wrapper">
                                {{-- <i class="material-icons">search</i>
                                <input placeholder="Search here" type="text"> --}}
                                <i class="fa fa-filter"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="friend-drawer friend-drawer--onhover">
                    <img class="profile-image"
                        src="https://www.clarity-enhanced.net/wp-content/uploads/2020/06/robocop.jpg" alt="">
                    <div class="text">
                        <h6>Robo Cop</h6>
                        <p class="text-muted">Hey, you're arrested!</p>
                    </div>
                    <span class="time text-muted small">13:21</span>
                </div>
                <hr>
                <div class="friend-drawer friend-drawer--onhover">
                    <img class="profile-image"
                        src="https://www.clarity-enhanced.net/wp-content/uploads/2020/06/optimus-prime.jpeg" alt="">
                    <div class="text">
                        <h6>Optimus</h6>
                        <p class="text-muted">Wanna grab a beer?</p>
                    </div>
                    <span class="time text-muted small">00:32</span>
                </div>
                <hr>
                <div class="friend-drawer friend-drawer--onhover ">
                    <img class="profile-image"
                        src="https://www.clarity-enhanced.net/wp-content/uploads/2020/06/real-terminator.png" alt="">
                    <div class="text">
                        <h6>Skynet</h6>
                        <p class="text-muted">Seen that canned piece of s?</p>
                    </div>
                    <span class="time text-muted small">13:21</span>
                </div>
                <hr>
                <div class="friend-drawer friend-drawer--onhover">
                    <img class="profile-image" src="https://www.clarity-enhanced.net/wp-content/uploads/2020/06/termy.jpg"
                        alt="">
                    <div class="text">
                        <h6>Termy</h6>
                        <p class="text-muted">Im studying spanish...</p>
                    </div>
                    <span class="time text-muted small">13:21</span>
                </div>
                <hr>
                <div class="friend-drawer friend-drawer--onhover">
                    <img class="profile-image" src="https://www.clarity-enhanced.net/wp-content/uploads/2020/06/rick.jpg"
                        alt="">
                    <div class="text">
                        <h6>Richard</h6>
                        <p class="text-muted">I'm not sure...</p>
                    </div>
                    <span class="time text-muted small">13:21</span>
                </div>
                <hr>
                <div class="friend-drawer friend-drawer--onhover">
                    <img class="profile-image"
                        src="https://www.clarity-enhanced.net/wp-content/uploads/2020/06/rachel.jpeg" alt="">
                    <div class="text">
                        <h6>XXXXX</h6>
                        <p class="text-muted">Hi, wanna see something?</p>
                    </div>
                    <span class="time text-muted small">13:21</span>
                </div>
            </div>
            <div class="col-md-8">
                <div class="settings-tray">
                    <div class="friend-drawer no-gutters friend-drawer--grey">
                        <img class="profile-image"
                            src="https://www.clarity-enhanced.net/wp-content/uploads/2020/06/robocop.jpg" alt="">
                        <div class="text">
                            <h5>Esko Esimerkki</h5>
                            {{-- <p class="text-muted">Esko Esimerkki</p> --}}
                        </div>
                        {{-- <span class="settings-tray--right">
                            <i class="material-icons">cached</i>
                            <i class="material-icons">message</i>
                            <i class="material-icons">menu</i>
                        </span> --}}
                    </div>
                </div>
                <div class="chat-panel">
                    <div class="row no-gutters">
                        <div class="col-md-3">
                            <div class="chat-bubble chat-bubble--left">
                                Hello dude!
                            </div>
                        </div>
                    </div>
                    <div class="row no-gutters">
                        <div class="col-md-3 offset-md-9">
                            <div class="chat-bubble chat-bubble--right">
                                Hello dude!
                            </div>
                        </div>
                    </div>
                    <div class="row no-gutters">
                        <div class="col-md-3 offset-md-9">
                            <div class="chat-bubble chat-bubble--right">
                                Hello dude!
                            </div>
                        </div>
                    </div>
                    <div class="row no-gutters">
                        <div class="col-md-3">
                            <div class="chat-bubble chat-bubble--left">
                                Hello dude!
                            </div>
                        </div>
                    </div>
                    <div class="row no-gutters">
                        <div class="col-md-3">
                            <div class="chat-bubble chat-bubble--left">
                                Hello dude!
                            </div>
                        </div>
                    </div>
                    <div class="row no-gutters">
                        <div class="col-md-3">
                            <div class="chat-bubble chat-bubble--left">
                                Hello dude!
                            </div>
                        </div>
                    </div>
                    <div class="row no-gutters">
                        <div class="col-md-3 offset-md-9">
                            <div class="chat-bubble chat-bubble--right">
                                Hello dude!
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="chat-box-tray">
                                <i class="material-icons">sentiment_very_satisfied</i>
                                <input type="text" placeholder="Type your message here...">
                                <i class="material-icons">mic</i>
                                <i class="fa fa-paper-plane"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection
