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
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Order No</th>
                        <th>Subscriber</th>
                        <th>Review</th>
                        <th>Price</th>
                        <th>Order Date</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{$order->orderid}}</td>
                        <td><img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">{{$order->subscribers}}</td>
                        <td><i class="fa fa-star on mr-2"></i>{{$order->review}}</td>
                        <td>{{$order->total}}</td>

                        @php
                            $LRtitle = stripos($order->itemid, ",");
                        @endphp
                        @if ($LRtitle == false)
                        @php
                            $price = $order->price;
                        @endphp
                        @else
                        @php
                            $parts = explode(",", $order->itemid);
                            $count = count($parts);
                            $price = 0;
                        @endphp
                            @foreach($parts as $part)
                            @php
                                $product = App\Product::findOrFail($part);
                                $price += $product->hinda;
                            @endphp
                            @endforeach
                        @endif
                        <td>{{$price}}</td>
                        <td>{{$order->created_at}}</td>
                        <td><a href="javascript:void(0)" class="load-modal" title="Edit" data-url="{{ route('orders.show', $order->id) }}"><i class="fa-solid fa-ellipsis on mr-2"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Order No</th>
                        <th>Subscriber</th>
                        <th>Review</th>
                        <th>Price</th>
                        <th>Order Date</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js"
        integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js" defer>
    </script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endsection
