<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts.head')
@stack('css')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>


<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">




        @include('layouts.nav_bar')
        @include('layouts.left_bar')

        @php
        $url = url()->current();
        @endphp
        <!-- Content Wrapper. Contains page content -->
        @if(str_contains($url,'chats') != '')
        <div class="content-wrapper col-12 chat_wrapper">
        @else
        <div class="content-wrapper">
            @endif

            @yield('body')
        </div>

        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    {{-- <div id="modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"></div>
    <div id="delete-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-warning">
                    <h4 class="modal-title" id="primary-header-modalLabel">Delete</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true">
                        <i class="fas fa-close"></i>
                    </button>
                </div>
                <form class="form-horizontal" id="ajax-form" method="DELETE" data-notification='div'>
                    <div class="modal-body">
                        @csrf
                        Are your sure want to delete?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-warning" data-loading-text="Deleting...">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}
    
    <!-- ./wrapper -->
    @include('layouts.scripts')
    @stack('js')

</body>

</html>