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

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid col-md-10">
            <table id="reservation-list" class="table dt-responsive nowrap w-100 table-sm"
                data-url="{{ route('reservation.list') }}">
                <thead>
                    <tr>
                        <th>Varaajan nimi</th>
                        <th>Henkilömäärä</th>
                        <th>Päivämäärä</th>
                        <th>Date</th>

                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


    {{-- <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script> --}}
    @push('js')
        <script src="{{ asset('js/superadmin/reservation.js?t=' . config('app.t')) }}"></script>
    @endpush

@endsection
