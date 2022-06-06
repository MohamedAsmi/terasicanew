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
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- partial:index.partial.html -->
            <div class="drag-container"></div>
            <div class="row" style="width: 100%;">
                <div class="col-12">
                    <h2 class="col-4 left_alignment">Salikartta</h2>
                    <button class="bg-light download_button primary-color-w"><i class="fa-solid fa-plus"></i> Lisää kategoria</button>
                    <a href="javascript:void(0)" class="load-modal" title="Edit"
                        data-url="{{route('product.add_new')}}">
                        <button class="bg-light download_button primary-color-w"><i class="fa-solid fa-plus"></i> Lisää tuote</button>
                    </a>
                    <button class="bg-light download_button primary-color-w">Muokkaa kategorioita</button>
                </div>
                <div class="col-12 mt-4 mb-3">
                    <span class="left_alignment mt-1">
                        <h4 class="text__color">Pöytiä yhteensä:</h4>
                    </span>
                    <span class="left_alignment row_button ml-3 primary-color primary-text-cl-w">15</span>
                    <span class="left_alignment row_button primary-color-b primary-text-cl">Kaikki</span>
                    <span class="left_alignment row_button primary-color-b primary-text-cl">Alkuruoat</span>
                    <span class="left_alignment row_button primary-color-b primary-text-cl">Pääruoka</span>
                    <span class="left_alignment row_button primary-color-b primary-text-cl">Juomat</span>
                </div>
            </div>
            {{-- <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Tuote</th>
                        <th>Osio</th>
                        <th>Hinta</th>
                        <th>Viimeinen muokkaus</th>
                        <th>Status</th>
                        <th class="none-attr"></th>
                        <th class="none-attr"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><span class="circle-logo"></span>{item-name}</td>
                        <td>{items-category}</td>
                        <td>{item-total-price}</td>
                        <td>{latest-edit}</td>
                        <td>{status}</td>
                        <td><span class="left_alignment row_button">Muokkaa</span></td>
                        <td><span class="left_alignment row_button">Poista</span></td>
                    </tr>
                    <tr>
                        <td><span class="circle-logo"></span>{item-name}</td>
                        <td>{items-category}</td>

                        <td>{item-total-price}

                        </td>
                        <td>{latest-edit}</td>
                        <td>{status}</td>
                        <td><span class="left_alignment row_button">Muokkaa</span></td>
                        <td><span class="left_alignment row_button">Poista</span></td>
                    </tr>
                    <tr>
                        <td><span class="circle-logo"></span>{item-name}</td>
                        <td>{items-category}</td>
                        <td>{item-total-price}

                        </td>
                        <td>{latest-edit}</td>
                        <td>{status}</td>
                        <td><span class="left_alignment row_button">Muokkaa</span></td>
                        <td><span class="left_alignment row_button">Poista</span></td>
                    </tr>
                    <tr>
                        <td><span class="circle-logo"></span>{item-name}</td>
                        <td>{items-category}</td>
                        <td>{item-total-price}

                        </td>
                        <td>{latest-edit}</td>
                        <td>{status}</td>
                        <td><span class="left_alignment row_button">Muokkaa</span></td>
                        <td><span class="left_alignment row_button">Poista</span></td>
                    </tr>
                    <tr>
                        <td><span class="circle-logo"></span>{item-name}</td>
                        <td>{items-category}</td>
                        <td>{item-total-price}

                        </td>
                        <td>{latest-edit}</td>
                        <td>{status}</td>
                        <td><span class="left_alignment row_button">Muokkaa</span></td>
                        <td><span class="left_alignment row_button">Poista</span></td>
                    </tr>
                    <tr>
                        <td><span class="circle-logo"></span>{item-name}</td>
                        <td></td>
                        <td>{item-total-price}

                        </td>
                        <td></td>
                        <td>{status}</td>
                        <td><span class="left_alignment row_button">Muokkaa</span></td>
                        <td><span class="left_alignment row_button">Poista</span></td>
                    </tr>
                    <tr>
                        <td><span class="circle-logo"></span>{item-name}</td>
                        <td></td>
                        <td>{item-total-price}

                        </td>
                        <td></td>
                        <td>{status}</td>
                        <td><span class="left_alignment row_button">Muokkaa</span></td>
                        <td><span class="left_alignment row_button">Poista</span></td>
                    </tr>
                    <tr>
                        <td><span class="circle-logo"></span>{item-name}</td>
                        <td></td>
                        <td>{item-total-price}

                        </td>
                        <td></td>
                        <td>{status}</td>
                        <td><span class="left_alignment row_button">Muokkaa</span></td>
                        <td><span class="left_alignment row_button">Poista</span></td>
                    </tr>
                    <tr>
                    <td><span class="circle-logo"></span>{item-name}</td>
                        <td></td>
                        <td>{item-total-price}

                        </td>
                        <td></td>
                        <td>{status}</td>
                        <td><span class="left_alignment row_button">Muokkaa</span></td>
                        <td><span class="left_alignment row_button">Poista</span></td>
                    </tr>
                    <tr>
                        <td><span class="circle-logo"></span>{item-name}</td>
                        <td></td>
                        <td>{item-total-price}

                        </td>
                        <td></td>
                        <td>{status}</td>
                        <td><span class="left_alignment row_button">Muokkaa</span></td>
                        <td><span class="left_alignment row_button">Poista</span></td>
                    </tr>
                    <tr>
                        <td><span class="circle-logo"></span>{item-name}</td>
                        <td></td>
                        <td>{item-total-price}

                        </td>
                        <td></td>
                        <td>{status}</td>
                        <td><span class="left_alignment row_button">Muokkaa</span></td>
                        <td><span class="left_alignment row_button">Poista</span></td>
                    </tr>

                </tbody>
                
            </table> --}}
            <table id="product_list_update" class="table dt-responsive nowrap w-100 table-sm"
                    data-url="{{ route('product.list') }}">
                <thead>
                    <tr>
                        <th>Tuote</th>
                        <th>Osio</th>
                        <th>Hinta</th>
                        <th>Viimeinen muokkaus</th>
                        <th>Status</th>
                        <th class="none-attr"></th>
                        <th class="none-attr"></th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </section>
   @push('js')
        <script src="{{ asset('js/superadmin/product.js?t=' . config('app.t')) }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    @endpush
@endsection