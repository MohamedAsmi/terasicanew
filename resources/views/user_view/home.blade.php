@extends('user_view.master')
@section('page-title', '| Home')
@section('body')

    <!-- Content Header (Page header) -->
    <div class="slider-header content-header p-0">
        <div class="container-fluid p-0" style="position: relative;">
            <img src="{{ asset('img/slider-background-image.png') }}" alt="Snow" style="width:100%;">
            <div class="mask"></div>
            <div class="sl_centered textCenter-alignment">
                <h1 style="font-size: 50px;">Aurinkoista <span class="primary-text-cl">Terassikesää!</span></h1>
                <p class="">Kaikkien aikojen <span class="primary-text-cl">Terassikesä</span> on täällä!<br>
                    Löydä Suomen suosituimmat terassit helposti ja kätevästi<br>
                    <span class="primary-text-cl">Terassikesän</span> avulla.
                </p>
                <div class="search-container row mt-4 d-none d-md-block"><input type="search" name="" id=""
                        class="col-12 p-2">
                    <div class="search_icon"><i class="fa-solid fa-magnifying-glass"></i></div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content primary-color-g pb-5">
        <h2 class="textCenter-alignment pt-4">Suosituimmat terassit</h2>
        <div class="container-fluid mt-4">
            <!-- partial:index.partial.html -->
            <div class="gallery js-flickity mb-3" data-flickity-options='{ "wrapAround": true }'>
                <div class="gallery-cell-empty">

                </div>
                @foreach ($terrasica_stores as $terrasica_store)
                    <div class="gallery-cell">
                        <span class="points primary-text-cl textCenter-alignment" style="top: 15px;">
                            @if ($terrasica_store->store_status == 1)
                                Open
                            @else
                                Closed
                            @endif
                        </span>
                        <img src="{{ asset('img/ravintola-veljekset-cover 2.png') }}" alt="">
                        <span class="points pl-2" style="top: 105px;"><img src="{{ asset('img/smile.png') }}" alt=""
                                style="margin-top: -4px; width: 22px; height: 21px; margin-right: 10px;">4.5</span>
                        <div class="col-9" style="float: left;">
                            <h3 class="mt-4 pl-3">{{ $terrasica_store->store_name }}</h3>
                            <h5 class="pl-3">{{ $terrasica_store->store_description }}</h5>
                        </div>
                        <div class="col-3 mt-4" style="float: left;">
                            <div class="list-but"></div>
                            <div class="list-but-min"></div>
                        </div>
                    </div>
                @endforeach


            </div>
            <!-- partial -->
            <!-- partial:index.partial.html -->
            <h2 class="textCenter-alignment pt-4">Löydä suosikkisi</h2>
            <div class="gallery js-flickity mb-3" data-flickity-options='{ "wrapAround": true }'>
                <div class="gallery-cell-empty">

                </div>
                @foreach ($terrasica_stores as $terrasica_store)
                    <div class="gallery-cell">
                        <span class="points primary-text-cl textCenter-alignment" style="top: 15px;">
                            @if ($terrasica_store->store_status == 1)
                                Open
                            @else
                                Closed
                            @endif
                        </span>
                        <img src="{{ asset('img/ravintola-veljekset-cover 2.png') }}" alt="">
                        <span class="points pl-2" style="top: 105px;"><img src="{{ asset('img/smile.png') }}" alt=""
                                style="margin-top: -4px; width: 22px; height: 21px; margin-right: 10px;">4.5</span>
                        <div class="col-9" style="float: left;">
                            <h3 class="mt-4 pl-3">{{ $terrasica_store->store_name }}</h3>
                            <h5 class="pl-3">{{ $terrasica_store->store_description }}</h5>
                        </div>
                        <div class="col-3 mt-4" style="float: left;">
                            <div class="list-but"></div>
                            <div class="list-but-min"></div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- partial -->

        </div><!-- /.container-fluid -->
        <h2 class="textCenter-alignment pt-4"></h2>
        <div class="container-fluid mt-4 mb-4">
            <div class="row galler-set">
                <div class="col-10 col-md-5 offset-1">
                    <div class="row">
                        <div class="col-12">
                            <img src="{{ asset('img/helsinki-4984737_1920 1.png') }}" alt="" style="width: 100%;">
                            <h2 class="primary-text-cl-w">Helsingin terassit</h2>
                        </div>
                        <div class="col-6 mt-4">
                            <img src="{{ asset('img/jay-wennington-N_Y88TWmGwA-unsplash 1.png') }}" style="width:100%;"
                                alt="">
                            <div class="ge-icon">
                                <img src="{{ asset('img/food-icon.png') }}" alt="">
                                <h4 class="primary-text-cl">Ravintolat</h4>
                            </div>
                        </div>
                        <div class="col-6 mt-4">
                            <img src="{{ asset('img/nathan-dumlao-6VhPY27jdps-unsplash 1.png') }}" style="width:100%;"
                                alt="">
                            <div class="ge-icon">
                                <img src="{{ asset('img/coffee-icon.png') }}" alt="">
                                <h4 class="primary-text-cl">Kahvilat</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-none d-md-block col-md-5">
                    <div class="row">
                        <div class="col-12">
                            <img src="{{ asset('img/food-1050813_1920 1.png') }}" alt="" style="width: 100%;">
                            <h2 class="primary-text-cl-w">Terassikesä pinssit</h2>
                        </div>
                        <div class="col-6 mt-4">
                            <img src="{{ asset('img/adam-jaime-dmkmrNptMpw-unsplash 1.png') }}" style="width:100%;"
                                alt="">
                            <div class="ge-icon">
                                <img src="{{ asset('img/drinks-icon.png') }}" alt="">
                                <h4 class="primary-text-cl">Baarit</h4>
                            </div>
                        </div>
                        <div class="col-6 mt-4">
                            <img src="{{ asset('img/beer-garden-4465324_1920 1.png') }}" style="width:100%;"
                                alt="">
                            <div class="ge-icon">
                                <img src="{{ asset('img/Vector.png') }}" alt="">
                                <h4 class="primary-text-cl">Suurterassit</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-block d-md-none  col-10 offset-1 mt-5">
                    <div class="row">
                        <div class="col-12">
                            <img src="{{ asset('img/food-1050813_1920 1.png') }}" alt="" style="width: 100%;">
                            <h2 class="primary-text-cl-w">Terassikesä pinssit</h2>
                        </div>
                        <div class="col-6 mt-4">
                            <img src="{{ asset('img/adam-jaime-dmkmrNptMpw-unsplash 1.png') }}" style="width:100%;"
                                alt="">
                            <div class="ge-icon">
                                <img src="{{ asset('img/drinks-icon.png') }}" alt="">
                                <h4 class="primary-text-cl">Baarit</h4>
                            </div>
                        </div>
                        <div class="col-6 mt-4">
                            <img src="{{ asset('img/beer-garden-4465324_1920 1.png') }}" style="width:100%;"
                                alt="">
                            <div class="ge-icon">
                                <img src="{{ asset('img/Vector.png') }}" alt="">
                                <h4 class="primary-text-cl">Suurterassit</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="Campaing row mt-5 mb-4">
                <div class="col-10 offset-1 primary-color-w">
                    <h2 style="top: 45%; left: 45%; position: absolute;">Campaing</h2>
                </div>
            </div>
            <h2 class="textCenter-alignment pt-4">Uudet terassit <span class="primary-text-cl">Terassikesässä</span></h2>
            <div class="gallery js-flickity mb-3" data-flickity-options='{ "wrapAround": true }'>
                <div class="gallery-cell-empty">

                </div>
                <div class="gallery-cell">
                    <span class="points primary-text-cl textCenter-alignment" style="top: 15px;">Avoinna</span>
                    <img src="{{ asset('img/ravintola-veljekset-cover 2.png') }}" alt="">
                    <span class="points pl-2" style="top: 105px;"><img src="{{ asset('img/smile.png') }}"
                            alt=""
                            style="margin-top: -4px; width: 22px; height: 21px; margin-right: 10px;">4.5</span>
                    <div class="col-9" style="float: left;">
                        <h3 class="mt-4 pl-3">Ravintola Veljekset</h3>
                        <h5 class="pl-3">Ravintola Sipoon Söderkullassa</h5>
                    </div>
                    <div class="col-3 mt-4" style="float: left;">
                        <div class="list-but"></div>
                        <div class="list-but-min"></div>
                    </div>
                </div>
                <div class="gallery-cell">
                    <span class="points primary-text-cl textCenter-alignment" style="top: 15px;">Avoinna</span>
                    <img src="{{ asset('img/ravintola-veljekset-cover 2.png') }}" alt="">
                    <span class="points pl-2" style="top: 105px;"><img src="{{ asset('img/smile.png') }}"
                            alt=""
                            style="margin-top: -4px; width: 22px; height: 21px; margin-right: 10px;">4.5</span>
                    <div class="col-9" style="float: left;">
                        <h3 class="mt-4 pl-3">Ravintola Veljekset</h3>
                        <h5 class="pl-3">Ravintola Sipoon Söderkullassa</h5>
                    </div>
                    <div class="col-3 mt-4" style="float: left;">
                        <div class="list-but"></div>
                        <div class="list-but-min"></div>
                    </div>
                </div>
                <div class="gallery-cell">
                    <span class="points primary-text-cl textCenter-alignment" style="top: 15px;">Avoinna</span>
                    <img src="{{ asset('img/ravintola-veljekset-cover 2.png') }}" alt="">
                    <span class="points pl-2" style="top: 105px;"><img src="{{ asset('img/smile.png') }}"
                            alt=""
                            style="margin-top: -4px; width: 22px; height: 21px; margin-right: 10px;">4.5</span>
                    <div class="col-9" style="float: left;">
                        <h3 class="mt-4 pl-3">Ravintola Veljekset</h3>
                        <h5 class="pl-3">Ravintola Sipoon Söderkullassa</h5>
                    </div>
                    <div class="col-3 mt-4" style="float: left;">
                        <div class="list-but"></div>
                        <div class="list-but-min"></div>
                    </div>
                </div>
                <div class="gallery-cell">
                    <span class="points primary-text-cl textCenter-alignment" style="top: 15px;">Avoinna</span>
                    <img src="{{ asset('img/ravintola-veljekset-cover 2.png') }}" alt="">
                    <span class="points pl-2" style="top: 105px;"><img src="{{ asset('img/smile.png') }}"
                            alt=""
                            style="margin-top: -4px; width: 22px; height: 21px; margin-right: 10px;">4.5</span>
                    <div class="col-9" style="float: left;">
                        <h3 class="mt-4 pl-3">Ravintola Veljekset</h3>
                        <h5 class="pl-3">Ravintola Sipoon Söderkullassa</h5>
                    </div>
                    <div class="col-3 mt-4" style="float: left;">
                        <div class="list-but"></div>
                        <div class="list-but-min"></div>
                    </div>
                </div>
                <div class="gallery-cell">
                    <span class="points primary-text-cl textCenter-alignment" style="top: 15px;">Avoinna</span>
                    <img src="{{ asset('img/ravintola-veljekset-cover 2.png') }}" alt="">
                    <span class="points pl-2" style="top: 105px;"><img src="{{ asset('img/smile.png') }}"
                            alt=""
                            style="margin-top: -4px; width: 22px; height: 21px; margin-right: 10px;">4.5</span>
                    <div class="col-9" style="float: left;">
                        <h3 class="mt-4 pl-3">Ravintola Veljekset</h3>
                        <h5 class="pl-3">Ravintola Sipoon Söderkullassa</h5>
                    </div>
                    <div class="col-3 mt-4" style="float: left;">
                        <div class="list-but"></div>
                        <div class="list-but-min"></div>
                    </div>
                </div>
                <div class="gallery-cell">
                    <span class="points primary-text-cl textCenter-alignment" style="top: 15px;">Avoinna</span>
                    <img src="{{ asset('img/ravintola-veljekset-cover 2.png') }}" alt="">
                    <span class="points pl-2" style="top: 105px;"><img src="{{ asset('img/smile.png') }}"
                            alt=""
                            style="margin-top: -4px; width: 22px; height: 21px; margin-right: 10px;">4.5</span>
                    <div class="col-9" style="float: left;">
                        <h3 class="mt-4 pl-3">Ravintola Veljekset</h3>
                        <h5 class="pl-3">Ravintola Sipoon Söderkullassa</h5>
                    </div>
                    <div class="col-3 mt-4" style="float: left;">
                        <div class="list-but"></div>
                        <div class="list-but-min"></div>
                    </div>
                </div>
                <div class="gallery-cell">
                    <span class="points primary-text-cl textCenter-alignment" style="top: 15px;">Avoinna</span>
                    <img src="{{ asset('img/ravintola-veljekset-cover 2.png') }}" alt="">
                    <span class="points pl-2" style="top: 105px;"><img src="{{ asset('img/smile.png') }}"
                            alt=""
                            style="margin-top: -4px; width: 22px; height: 21px; margin-right: 10px;">4.5</span>
                    <div class="col-9" style="float: left;">
                        <h3 class="mt-4 pl-3">Ravintola Veljekset</h3>
                        <h5 class="pl-3">Ravintola Sipoon Söderkullassa</h5>
                    </div>
                    <div class="col-3 mt-4" style="float: left;">
                        <div class="list-but"></div>
                        <div class="list-but-min"></div>
                    </div>
                </div>
                <div class="gallery-cell">
                    <span class="points primary-text-cl textCenter-alignment" style="top: 15px;">Avoinna</span>
                    <img src="{{ asset('img/ravintola-veljekset-cover 2.png') }}" alt="">
                    <span class="points pl-2" style="top: 105px;"><img src="{{ asset('img/smile.png') }}"
                            alt=""
                            style="margin-top: -4px; width: 22px; height: 21px; margin-right: 10px;">4.5</span>
                    <div class="col-9" style="float: left;">
                        <h3 class="mt-4 pl-3">Ravintola Veljekset</h3>
                        <h5 class="pl-3">Ravintola Sipoon Söderkullassa</h5>
                    </div>
                    <div class="col-3 mt-4" style="float: left;">
                        <div class="list-but"></div>
                        <div class="list-but-min"></div>
                    </div>
                </div>
                <div class="gallery-cell">
                    <span class="points primary-text-cl textCenter-alignment" style="top: 15px;">Avoinna</span>
                    <img src="{{ asset('img/ravintola-veljekset-cover 2.png') }}" alt="">
                    <span class="points pl-2" style="top: 105px;"><img src="{{ asset('img/smile.png') }}"
                            alt=""
                            style="margin-top: -4px; width: 22px; height: 21px; margin-right: 10px;">4.5</span>
                    <div class="col-9" style="float: left;">
                        <h3 class="mt-4 pl-3">Ravintola Veljekset</h3>
                        <h5 class="pl-3">Ravintola Sipoon Söderkullassa</h5>
                    </div>
                    <div class="col-3 mt-4" style="float: left;">
                        <div class="list-but"></div>
                        <div class="list-but-min"></div>
                    </div>
                </div>
                <div class="gallery-cell">
                    <span class="points primary-text-cl textCenter-alignment" style="top: 15px;">Avoinna</span>
                    <img src="{{ asset('img/ravintola-veljekset-cover 2.png') }}" alt="">
                    <span class="points pl-2" style="top: 105px;"><img src="{{ asset('img/smile.png') }}"
                            alt=""
                            style="margin-top: -4px; width: 22px; height: 21px; margin-right: 10px;">4.5</span>
                    <div class="col-9" style="float: left;">
                        <h3 class="mt-4 pl-3">Ravintola Veljekset</h3>
                        <h5 class="pl-3">Ravintola Sipoon Söderkullassa</h5>
                    </div>
                    <div class="col-3 mt-4" style="float: left;">
                        <div class="list-but"></div>
                        <div class="list-but-min"></div>
                    </div>
                </div>
            </div>
            <h2 class="textCenter-alignment pt-4 primary-text-cl">Terassikesä <span
                    class="primary-text-cl-b">kaupungit</span></h2>
            <div class="d-none d-md-block">
                <div class="blog-list row">
                    <div class="card mt-4 col-3 offset-1">
                        <img class="card-img-top" src="{{ asset('img/blog-img.png') }}" alt="Card image cap">
                        <div class="card-body mb-4">
                            <h3>{Terrace-city}</h3>
                            <p class="card-text">Terasseja: {terrace-amount}</p>
                        </div>
                    </div>
                    <div class="card mt-4 col-3 ml-3">
                        <img class="card-img-top" src="{{ asset('img/blog-img.png') }}" alt="Card image cap">
                        <div class="card-body mb-4">
                            <h3>{Terrace-city}</h3>
                            <p class="card-text">Terasseja: {terrace-amount}</p>
                        </div>
                    </div>
                    <div class="card mt-4 col-3 ml-3">
                        <img class="card-img-top" src="{{ asset('img/blog-img.png') }}" alt="Card image cap">
                        <div class="card-body mb-4">
                            <h3>{Terrace-city}</h3>
                            <p class="card-text">Terasseja: {terrace-amount}</p>
                        </div>
                    </div>
                    <div class="card mt-4 col-3 offset-1">
                        <img class="card-img-top" src="{{ asset('img/blog-img.png') }}" alt="Card image cap">
                        <div class="card-body mb-4">
                            <h3>{Terrace-city}</h3>
                            <p class="card-text">Terasseja: {terrace-amount}</p>
                        </div>
                    </div>
                    <div class="card mt-4 col-3 ml-3">
                        <img class="card-img-top" src="{{ asset('img/blog-img.png') }}" alt="Card image cap">
                        <div class="card-body mb-4">
                            <h3>{Terrace-city}</h3>
                            <p class="card-text">Terasseja: {terrace-amount}</p>
                        </div>
                    </div>
                    <div class="card mt-4 col-3 ml-3">
                        <img class="card-img-top" src="{{ asset('img/blog-img.png') }}" alt="Card image cap">
                        <div class="card-body mb-4">
                            <h3>{Terrace-city}</h3>
                            <p class="card-text">Terasseja: {terrace-amount}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-block d-md-none">
                <div class="blog-list row">
                    <div class="card mt-4 col-5 offset-1">
                        <img class="card-img-top" src="{{ asset('img/blog-img.png') }}" alt="Card image cap">
                        <div class="card-body mb-4">
                            <h3>{Terrace-city}</h3>
                            <p class="card-text">Terasseja: {terrace-amount}</p>
                        </div>
                    </div>
                    <div class="card mt-4 col-5 ml-3">
                        <img class="card-img-top" src="{{ asset('img/blog-img.png') }}" alt="Card image cap">
                        <div class="card-body mb-4">
                            <h3>{Terrace-city}</h3>
                            <p class="card-text">Terasseja: {terrace-amount}</p>
                        </div>
                    </div>
                    <div class="card mt-4 col-5 offset-1">
                        <img class="card-img-top" src="{{ asset('img/blog-img.png') }}" alt="Card image cap">
                        <div class="card-body mb-4">
                            <h3>{Terrace-city}</h3>
                            <p class="card-text">Terasseja: {terrace-amount}</p>
                        </div>
                    </div>
                    <div class="card mt-4 col-5 ml-3">
                        <img class="card-img-top" src="{{ asset('img/blog-img.png') }}" alt="Card image cap">
                        <div class="card-body mb-4">
                            <h3>{Terrace-city}</h3>
                            <p class="card-text">Terasseja: {terrace-amount}</p>
                        </div>
                    </div>
                    <div class="card mt-4 col-5 offset-1">
                        <img class="card-img-top" src="{{ asset('img/blog-img.png') }}" alt="Card image cap">
                        <div class="card-body mb-4">
                            <h3>{Terrace-city}</h3>
                            <p class="card-text">Terasseja: {terrace-amount}</p>
                        </div>
                    </div>
                    <div class="card mt-4 col-5 ml-3">
                        <img class="card-img-top" src="{{ asset('img/blog-img.png') }}" alt="Card image cap">
                        <div class="card-body mb-4">
                            <h3>{Terrace-city}</h3>
                            <p class="card-text">Terasseja: {terrace-amount}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-block row mt-5">
                <div class=" col-10 offset-1">
                    <img src="{{ asset('img/blog-background-img.png') }}" width="100%" alt="">
                    <div class="text-cont">
                        <h2 class="primary-text-cl-w">Taas yksi palvelu lisää?!<br>
                            Mikä <span class="primary-text-cl">Terassikesä</span> on?</h2>
                        <br>
                        <h5 class="primary-text-cl-w">
                            Terassikesä on uusi alusta jolla löydät<br>
                            helposti ja vaivattomasti Suomen<br>
                            parhaat terassit, valitset parhaat -<br>
                            annokset ja tilaat ne suoraan terassille.<br>
                        </h5>
                    </div>
                    <div class="play_button">
                        <span>
                            <i class="fa-solid fa-circle-play primary-text-cl primary-color-w"></i><span
                                class="primary-text-cl" style="font-size: 30px;">Katso video</span>
                        </span>
                    </div>
                </div>

            </div>
            <div class="min-blog-con row mt-5">
                <div class="col-5 offset-1">
                    <h1 class="offset-1 mt-5 primary-text-cl-w">Lisää Terassisi<br>Terassikesään</h1>
                    <div class="offset-1 black_button primary-color-b p-3">
                        <h2 class="primary-text-cl">Liity kauppiasyhteisöön</h2>
                    </div>
                </div>
                <div class="col-5">
                    <h1 class="offset-1 mt-5 primary-text-cl-w">Miten Terassikesä syntyi</h1>
                    <div class="offset-1 black_button primary-color-b p-3">
                        <h2 class="primary-text-cl">Tutustu Terassikesään</h2>
                    </div>
                </div>
            </div>

            <h2 class="textCenter-alignment mt-4 pt-4">Terassiuutiset</span></h2>
            <div class="container-fluid mt-4 mb-4" id="Terassiuutiset">
                <!-- partial:index.partial.html -->
                <div class="gallery js-flickity mb-3" data-flickity-options='{ "wrapAround": true }'>
                    <div class="gallery-cell-empty"></div>
                    <div class="gallery-cell">
                        <span class="points primary-text-cl textCenter-alignment" style="top: 15px;">Terassiuutiset</span>
                        <div class="postion_alginment">
                            <h3 class="primary-text-cl-w" style="top: 105px;">{article-title}</h3>
                            <p class="primary-text-cl-w">{article-extract}</p>
                        </div>
                    </div>
                    <div class="gallery-cell">
                        <span class="points primary-text-cl textCenter-alignment" style="top: 15px;">Terassiuutiset</span>
                        <div class="postion_alginment">
                            <h3 class="primary-text-cl-w" style="top: 105px;">{article-title}</h3>
                            <p class="primary-text-cl-w">{article-extract}</p>
                        </div>
                    </div>
                    <div class="gallery-cell">
                        <span class="points primary-text-cl textCenter-alignment" style="top: 15px;">Terassiuutiset</span>
                        <div class="postion_alginment">
                            <h3 class="primary-text-cl-w" style="top: 105px;">{article-title}</h3>
                            <p class="primary-text-cl-w">{article-extract}</p>
                        </div>
                    </div>
                    <div class="gallery-cell">
                        <span class="points primary-text-cl textCenter-alignment" style="top: 15px;">Terassiuutiset</span>
                        <div class="postion_alginment">
                            <h3 class="primary-text-cl-w" style="top: 105px;">{article-title}</h3>
                            <p class="primary-text-cl-w">{article-extract}</p>
                        </div>
                    </div>
                    <div class="gallery-cell">
                        <span class="points primary-text-cl textCenter-alignment" style="top: 15px;">Terassiuutiset</span>
                        <div class="postion_alginment">
                            <h3 class="primary-text-cl-w" style="top: 105px;">{article-title}</h3>
                            <p class="primary-text-cl-w">{article-extract}</p>
                        </div>
                    </div>
                    <div class="gallery-cell">
                        <span class="points primary-text-cl textCenter-alignment" style="top: 15px;">Terassiuutiset</span>
                        <div class="postion_alginment">
                            <h3 class="primary-text-cl-w" style="top: 105px;">{article-title}</h3>
                            <p class="primary-text-cl-w">{article-extract}</p>
                        </div>
                    </div>
                    <div class="gallery-cell">
                        <span class="points primary-text-cl textCenter-alignment" style="top: 15px;">Terassiuutiset</span>
                        <div class="postion_alginment">
                            <h3 class="primary-text-cl-w" style="top: 105px;">{article-title}</h3>
                            <p class="primary-text-cl-w">{article-extract}</p>
                        </div>
                    </div>
                    <div class="gallery-cell">
                        <span class="points primary-text-cl textCenter-alignment" style="top: 15px;">Terassiuutiset</span>
                        <div class="postion_alginment">
                            <h3 class="primary-text-cl-w" style="top: 105px;">{article-title}</h3>
                            <p class="primary-text-cl-w">{article-extract}</p>
                        </div>
                    </div>
                    <div class="gallery-cell">
                        <span class="points primary-text-cl textCenter-alignment" style="top: 15px;">Terassiuutiset</span>
                        <div class="postion_alginment">
                            <h3 class="primary-text-cl-w" style="top: 105px;">{article-title}</h3>
                            <p class="primary-text-cl-w">{article-extract}</p>
                        </div>
                    </div>
                </div>
                <!-- partial -->


            </div>
        </div><!-- /.container-fluid -->

        <!-- Button trigger modal-->
        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCart">Launch modal</button> --}}
        <!-- Modal: modalCart -->
        <div class="modal fade" id="modalCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <!--Header-->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" style="background-color: black;">×</span>
                        </button>
                    </div>
                    <!--Body-->
                    <div class="modal-body">

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <img class="card-img-top" src="{{ asset('img/ravintola-veljekset-cover 2.png') }}"
                                        alt="Card image cap" style="border-radius: 10px">
                                    <th style="font-size: 25px">{item-name}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row" style="font-size: 20px">{item-description}</th>
                                </tr>
                                <tr>
                                    <th scope="row" style="font-size: 18px;color:#edca16f7">{item-price}</th>
                                </tr>

                                <tr>
                                    <th scope="row"></th>
                                </tr>
                                <tr>
                                    <th scope="row" style="font-size: 18px">{choice-title}</th>
                                </tr>
                                <tr>
                                    <th>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="groupOfRadioYellow" id="flexRadioDefault1">
                                            <label class="form-check-label" for="groupOfRadioYellow1">
                                                {choiceType-radio1}
                                            </label>
                                          </div>
                                          <div class="form-check">
                                            <input class="form-check-input" type="radio" name="groupOfRadioYellow" id="flexRadioDefault2" checked>
                                            <label class="form-check-label" for="groupOfRadioYellow2">
                                                {choiceType-radio2}
                                            </label>
                                          </div>
                                          <div class="form-check">
                                            <input class="form-check-input" type="radio" name="groupOfRadioYellow" id="flexRadioDefault2" checked>
                                            <label class="form-check-label" for="groupOfRadioYellow2">
                                                {choiceType-radio3}
                                            </label>
                                          </div>
                                          <div class="form-check">
                                            <input class="form-check-input" type="radio" name="groupOfRadioYellow" id="flexRadioDefault2" checked>
                                            <label class="form-check-label" for="groupOfRadioYellow2">
                                                {choiceType-radio4}
                                            </label>
                                          </div>
                                        </div>
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        <label for="">Lisätietoa / erityisohjeet</label>
                                        <textarea class="form-control" style="min-width: 100%"></textarea>
                                    </th>
                                </tr>
                                
                            </tbody>
                        </table>

                    </div>
                    <!--Footer-->
                    <div class="modal-footer">
                        {{-- <button type="button" class="btn btn-outline-primary" style="position: absolute;left: 20px;">Close</button> --}}
                        <div class="wrapper"
                            style="background-color: black;padding: 7px;position: relative; left: -15px;border-radius: 10px;width: 130px;">
                            <span class="minus" style="color: yellow;padding:16px">-</span>
                            <span class="num" style="color: yellow;padding:11px">1</span>
                            <span class="plus" style="color: yellow;padding:10px">+</span>
                        </div>
                        <script>
                            const plus = document.querySelector(".plus"),
                                minus = document.querySelector(".minus"),
                                num = document.querySelector(".num");
                            let a = 1;
                            plus.addEventListener("click", () => {
                                a++;
                                a = (a < 10) ? "0" + a : a;
                                num.innerText = a;
                            });

                            minus.addEventListener("click", () => {
                                if (a > 1) {
                                    a--;
                                    a = (a < 10) ? "0" + a : a;
                                    num.innerText = a;
                                }
                            });
                        </script>
                        <button class="btn btn-primary"
                            style="background-color: #edca16f7;width:315px;border-radius:10px"><span
                                style="float: left">Lisää ostoskoriin</span> <span class="primary-text-cl-b"
                                style="float: right">{item-sum}</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('js')
        <script src="{{ asset('js/custom.js') }}"></script>
    @endpush
@endsection
