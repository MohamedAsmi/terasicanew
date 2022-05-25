<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts.head')
@stack('css')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">




        @include('layouts.nav_bar')
        @include('layouts.left_bar')


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container-fluid mt-4">
                <div class="row text-center">

                    <div class="col-12 ml-2">
                        <div class="row body-design mb-4">
                            @yield('body')
                        </div>
                    </div>
                </div>
                @include('layouts.scripts')
                @stack('js')
            </div>
        </div>
    </div>
</body>

</html>
