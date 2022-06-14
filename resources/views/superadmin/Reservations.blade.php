@extends('dashboard.master')
@section('page-title', '| Body')
@section('body')
<style>
    div .dataTables_info{
        display: none;
    }
</style>
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
            <div class="row mb-4" style="width: 100%;">
                <div class="col-12 ">
                    <a href="javascript:void(0)" class="load-modal" title="Edit"
                        data-url="{{route('reservation.add_new')}}">
                        <button class="bg-light download_button primary-color-w add_employee"><i class="fa-solid fa-plus"></i> Kutsu työntekijä</button>
                    </a>
                </div>

            </div>
            <table id="reservation_list_update" class="table dt-responsive nowrap w-100 table-sm"
                data-url="{{ route('reservation.list') }}">
                <thead>
                    <tr>
                        <th>Varaajan nimi</th>
                        <th>Henkilömäärä</th>
                        <th>Päivämäärä</th>
                        <th>Date</th>
                        <th style="width: 6%;" class="text-center"></th>
                        <th style="width: 6%;" class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div><!-- /.container-fluid -->
    </section>

    @push('js')
        <script src="{{ asset('js/superadmin/reservation.js?t=' . config('app.t')) }}"></script>
    @endpush

@endsection
