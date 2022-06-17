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
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->

            <div class="row ">
                <div class="row col-md-9">
                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="info-box">
                            <div class="info-box-content">
                                <span class="info-box-text">Climate</span>
                                <span class="info-box-number">13,648</span>
                                <span class="info-box-number"><i class="fas fa-cloud-sun-rain"></i> 13,648</span>

                            </div>
                            <div class="svg-item">
                                <svg width="100%" height="100%" viewBox="0 0 40 40" class="donut">
                                    <circle class="donut-hole" cx="20" cy="20" r="15.91549430918954" fill="#fff">
                                    </circle>
                                    <circle class="donut-ring" cx="20" cy="20" r="15.91549430918954" fill="transparent"
                                        stroke-width="3.5"></circle>
                                    <circle class="donut-segment donut-segment-2" cx="20" cy="20" r="15.91549430918954"
                                        fill="transparent" stroke-width="3.5" stroke-dasharray="69 31"
                                        stroke-dashoffset="25">
                                    </circle>
                                    <g class="donut-text donut-text-1">

                                        <text y="50%" transform="translate(0, 2)">
                                            <tspan x="50%" text-anchor="middle" class="donut-percent">+69%</tspan>
                                        </text>
                                        <text y="60%" transform="translate(0, 2)">
                                            <tspan x="50%" text-anchor="middle" class="donut-data"></tspan>
                                        </text>
                                    </g>
                                </svg>
                            </div>


                        </div>

                    </div>
                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="info-box">
                            <div class="info-box-content">
                                <span class="info-box-text">Climate</span>
                                <span class="info-box-number">13,648</span>
                                <span class="info-box-number"><i class="fas fa-cloud-sun-rain"></i> 13,648</span>

                            </div>
                            <div class="svg-item">
                                <svg width="100%" height="100%" viewBox="0 0 40 40" class="donut">
                                    <circle class="donut-hole" cx="20" cy="20" r="15.91549430918954" fill="#fff">
                                    </circle>
                                    <circle class="donut-ring" cx="20" cy="20" r="15.91549430918954" fill="transparent"
                                        stroke-width="3.5"></circle>
                                    <circle class="donut-segment donut-segment-2" cx="20" cy="20" r="15.91549430918954"
                                        fill="transparent" stroke-width="3.5" stroke-dasharray="69 31"
                                        stroke-dashoffset="25">
                                    </circle>
                                    <g class="donut-text donut-text-1">

                                        <text y="50%" transform="translate(0, 2)">
                                            <tspan x="50%" text-anchor="middle" class="donut-percent">+69%</tspan>
                                        </text>
                                        <text y="60%" transform="translate(0, 2)">
                                            <tspan x="50%" text-anchor="middle" class="donut-data"></tspan>
                                        </text>
                                    </g>
                                </svg>
                            </div>


                        </div>

                    </div>
                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="info-box">
                            <div class="info-box-content">
                                <span class="info-box-text">Climate</span>
                                <span class="info-box-number">13,648</span>
                                <span class="info-box-number"><i class="fas fa-cloud-sun-rain"></i> 13,648</span>

                            </div>
                            <div class="svg-item">
                                <svg width="100%" height="100%" viewBox="0 0 40 40" class="donut">
                                    <circle class="donut-hole" cx="20" cy="20" r="15.91549430918954" fill="#fff">
                                    </circle>
                                    <circle class="donut-ring" cx="20" cy="20" r="15.91549430918954" fill="transparent"
                                        stroke-width="3.5"></circle>
                                    <circle class="donut-segment donut-segment-2" cx="20" cy="20" r="15.91549430918954"
                                        fill="transparent" stroke-width="3.5" stroke-dasharray="69 31"
                                        stroke-dashoffset="25">
                                    </circle>
                                    <g class="donut-text donut-text-1">

                                        <text y="50%" transform="translate(0, 2)">
                                            <tspan x="50%" text-anchor="middle" class="donut-percent">+69%</tspan>
                                        </text>
                                        <text y="60%" transform="translate(0, 2)">
                                            <tspan x="50%" text-anchor="middle" class="donut-data"></tspan>
                                        </text>
                                    </g>
                                </svg>
                            </div>


                        </div>

                    </div>
                    <div class="col-md-12 col-sm-6 col-12">
                        <div id="chart">
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-6 col-12">
                        <div class="container-fluid">
                            <div class="row mt-4">
                                <div class="col-6">
                                    <div class="row">
                                        <div class="text-left d-flex" style="width:100%;">
                                            <h3 style="font-weight:900;">Uudet Viestit</h3>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-4" style="width:100%;">
                                            <img src="dist/img/a.png" width="30" height="30"
                                                class="rounded-circle mb-2"
                                                style="width:auto;height: 53px;transform: rotate(5deg);">
                                        </div>
                                        <div class="col-8" style="width:100%;">
                                            <p style="font-size:20px;font-weight:600;">Elli Esimerkki</p>
                                            <p style="font-size:20px;color:grey;">Onko tilaus tehty?</p>

                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-4" style="width:100%;">
                                            <img src="dist/img/a.png" width="30" height="30"
                                                class="rounded-circle mb-2"
                                                style="width:auto;height: 53px;transform: rotate(5deg);">
                                        </div>
                                        <div class="col-8" style="width:100%;">
                                            <p style="font-size:20px;font-weight:600;">Elli Esimerkki</p>
                                            <p style="font-size:20px;color:grey;">Onko tilaus tehty?</p>

                                        </div>
                                    </div>
                                    <div class="row mt-4 mb-4">
                                        <div class="col-4" style="width:100%;">
                                            <img src="dist/img/a.png" width="30" height="30"
                                                class="rounded-circle mb-2"
                                                style="width:auto;height: 53px;transform: rotate(5deg);">
                                        </div>
                                        <div class="col-8" style="width:100%;">
                                            <p style="font-size:20px;font-weight:600;">Elli Esimerkki</p>
                                            <p style="font-size:20px;color:grey;">Onko tilaus tehty?</p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="text-left d-flex" style="width:100%;">
                                            <h3 style="font-weight:900;">Uudet Viestit</h3>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-4" style="width:100%;">
                                            <img src="dist/img/a.png" width="30" height="30"
                                                class="rounded-circle mb-2"
                                                style="width:auto;height: 53px;transform: rotate(5deg);">
                                        </div>
                                        <div class="col-8" style="width:100%;">
                                            <p style="font-size:20px;font-weight:600;">Elli Esimerkki</p>
                                            <p style="font-size:20px;color:grey;">Onko tilaus tehty?</p>

                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-4" style="width:100%;">
                                            <img src="dist/img/a.png" width="30" height="30"
                                                class="rounded-circle mb-2"
                                                style="width:auto;height: 53px;transform: rotate(5deg);">
                                        </div>
                                        <div class="col-8" style="width:100%;">
                                            <p style="font-size:20px;font-weight:600;">Elli Esimerkki</p>
                                            <p style="font-size:20px;color:grey;">Onko tilaus tehty?</p>

                                        </div>
                                    </div>
                                    <div class="row mt-4 mb-4">
                                        <div class="col-4" style="width:100%;">
                                            <img src="dist/img/a.png" width="30" height="30"
                                                class="rounded-circle mb-2"
                                                style="width:auto;height: 53px;transform: rotate(5deg);">
                                        </div>
                                        <div class="col-8" style="width:100%;">
                                            <p style="font-size:20px;font-weight:600;">Elli Esimerkki</p>
                                            <p style="font-size:20px;color:grey;">Onko tilaus tehty?</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row col-md-3">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="text-center mt-3 pb-3 mb-3 d-flex" style="width:100%;">
                                <div class="image" style="width:100%;">
                                    <img src="dist/img/a.png" width="30" height="30" class="rounded-circle mb-2"
                                        style="width:auto;height: 179px;outline: #faa51a  solid 0px;transform: rotate(5deg);background-color: #faa51a;">
                                    <p class="mt-4" style="font-size: 37px;font-weight:900;">Justus Berner</p>
                                    <p style="font-size: 20px;font-weight:400;color:grey;">CEO Terassikesä
                                    </p>

                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="text-left d-flex" style="width:100%;">
                                <h3 style="font-weight:900;">Uudet Viestit</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3" style="width:100%;">
                                <img src="dist/img/a.png" width="30" height="30" class="rounded-circle mb-2"
                                    style="width:auto;height: 53px;transform: rotate(5deg);">
                            </div>
                            <div class="col-9" style="width:100%;">
                                <p style="font-size:20px;font-weight:600;">Elli Esimerkki</p>
                                <p style="font-size:20px;color:grey;">Onko tilaus tehty?</p>

                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-3" style="width:100%;">
                                <img src="dist/img/a.png" width="30" height="30" class="rounded-circle mb-2"
                                    style="width:auto;height: 53px;transform: rotate(5deg);">
                            </div>
                            <div class="col-9" style="width:100%;">
                                <p style="font-size:20px;font-weight:600;">Elli Esimerkki</p>
                                <p style="font-size:20px;color:grey;">Onko tilaus tehty?</p>

                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-3" style="width:100%;">
                                <img src="dist/img/a.png" width="30" height="30" class="rounded-circle mb-2"
                                    style="width:auto;height: 53px;transform: rotate(5deg);">
                            </div>
                            <div class="col-9" style="width:100%;">
                                <p style="font-size:20px;font-weight:600;">Elli Esimerkki</p>
                                <p style="font-size:20px;color:grey;">Onko tilaus tehty?</p>

                            </div>
                        </div>
                    </div>

                </div>

            </div>



        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <script>
        /*var options = {
            series: [{
                data: [400, 430, 448, 470, 540, 580, 690, 1100, 1200, 1380]
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                }
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'dark',
                    gradientToColors: ['#faa51a'],
                    shadeIntensity: 1,
                    type: 'vertical',
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [0, 0, 50, 50]
                },
            },
            dataLabels: {
                enabled: false
            },
            xaxis: {
                categories: ['South Korea', 'Canada', 'United Kingdom', 'Netherlands', 'Italy', 'France', 'Japan',
                    'United States', 'China', 'Germany'
                ],
            }
        };
        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
        */
        var options = {
          series: [{
          name: 'Marine Sprite',
          data: [44, 55, 41, 37, 22, 43, 21, 30, 40, 36, 28, 32, 23, 13, 5]
        }, {
          name: 'Striking Calf',
          data: [53, 32, 33, 52, 13, 43, 32, 25, 22, 20, 21, 24, 20, 12, 10]
        }, {
          name: 'Tank Picture',
          data: [12, 17, 11, 9, 15, 11, 20, 15, 22, 43, 21, 30, 25, 24, 15]
        }, {
          name: 'Bucket Slope',
          data: [9, 7, 5, 8, 6, 9, 4, 7, 5, 4, 6, 8, 5, 12, 15]
        }, {
          name: 'Reborn Kid',
          data: [25, 12, 19, 32, 25, 24, 10, 12, 22, 43, 21, 30, 24, 21, 18]
        }],
          chart: {
          type: 'bar',
          height: 350,
          stacked: true
        },
        plotOptions: {
          bar: {
            borderRadius: 5,
            columnWidth: '15%',
          },
        },
        stroke: {
          width: 1,
          colors: ['#fff']
          //colors: ["transparent"]
        },
        title: {
          text: '100% Stacked Bar'
        },
        xaxis: {
          categories: [2008, 2009, 2010, 2011, 2012, 2013, 2014, 2015, 2016, 2017, 2018, 2019, 2020, 2021, 2022],
        },
        tooltip: {
          y: {
            formatter: function (val) {
              return val + "K"
            }
          }
        },
        fill: {
          opacity: 1

        },
        dataLabels: {
          enabled: false
        },
        legend: {
          position: 'top',
          horizontalAlign: 'left',
          offsetX: 40
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>
@endsection
