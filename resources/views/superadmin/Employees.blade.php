@extends('dashboard.master')
@section('page-title', '| Body')
@section('body')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <!-- <div class="row mb-2">
            <div class="col-sm-6">
               
            </div> /.col
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard v1</li>
                </ol>
            </div> /.col
        </div>-->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<!-- Main content -->
<section class="content">
    <div class="row">
        <ul>
            @error('EmployeeName')<li class="text-danger">{{ $message }}</li>@enderror
            @error('EmployeeEmail')<li class="text-danger">{{ $message }}</li>@enderror
            @error('EmployeeTel')<li class="text-danger">{{ $message }}</li>@enderror

        </ul>
    </div>
    <div class="container-fluid">
        <!-- partial:index.partial.html -->
        <div class="drag-container"></div>
        <div class="row" style="width: 100%;">
            <div class="col-12">
                <h2 class="col-4 left_alignment">Työntekijät</h2>
                <button class="bg-light download_button primary-color-w add_employee"><i class="fa-solid fa-plus"></i> Kutsu työntekijä</button>
                <button class="bg-light download_button primary-color-w"><i class="fa-solid fa-download"></i> Lataa kuukausittainen raportti</button>
            </div>
            <div class="col-12 mt-4 mb-3">
                <span class="left_alignment mt-1">
                    <h4 class="text__color">Työntekijöitä yhteensä:</h4>
                </span>
                <span class="left_alignment row_button ml-3 primary-color primary-text-cl-w">15</span>
                <button class="bg-light download_button primary-color-w">Valitse kuukausi</button>

            </div>
        </div>

        <table id="employee_list" class="display table dt-responsive nowrap w-100 table-sm" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Työtehtävä</th>
                    <th>Tuntimäärä tällä viikolla</th>
                    <th>Viimeksi paikalla</th>
                    <th class="none-attr"></th>
                    <th class="none-attr"></th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <!-- Modal -->
        <div class="modal fade" id="EmployeeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content primary-color-g" style="border-radius: 20px;">
                    <div class="delete-modal-body p-4">
                    </div>
                    <div class="addoredit-modal-body">
                        <h2 class="w-90 text-center title mt-4 mb-3">Muokkaa työntekijää:<br>{worker-name}</h2>
                        <button type="button" class="btn mt-3 mb-3" attr="close" style="position: absolute; top: 15px; right: 20px;"> &times;</button>

                        <form action="" method="POST" class="pr-4 pl-4">
                            @csrf
                            <div class="form-content row">

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</script>
@push('js')
<script src="{{ asset('js/superadmin/employee.js?t=' . config('app.t')) }}"></script>
@endpush
@endsection