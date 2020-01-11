@extends('layout.backend.index')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Delivery</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ URL::to('portal/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Spare Parts</li>
                        </ol>
                        </div><!-- /.col -->
                        </div><!-- /.row -->
                        <hr>
                        </div><!-- /.container-fluid -->
                    </div>
                    <!-- /.content-header -->
                    <!-- Main content -->
                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header" style="background-color: #dc3545; color: #ffffff;">
                                            <h3 class="card-title">Delivery Product</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <table id="brandList" class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th style="width:50px;">Spare Parts Id</th>
                                                        <th>Product Name</th>
                                                        <th>Product Price</th>
                                                        <th>Delivery<br>Fee</th>
                                                        <th>Total Amount</th>
                                                        <th>Customer Name</th>
                                                        <th>Customer Address</th>
                                                    <th style="width:50px;">Order Id</th >
                                                    <th>Delivery By </th>
                                                    <th>Payment Method </th>
                                                    <th>Delivery<br>Date</th>
                                                    <th>Description</th>
                                                    <th>Option</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($dataList as $data)
                                                <tr>
                                                    {{-- <td>{{ $data->sparePartsOrders->spare_parts_name }}</td>  --}}
                                                    <td>{{ $data->product_id }}</td>
                                                    <td>{{ $data->SpareParts->spare_parts_name }}</td>
                                                    <td>{{ $data->SpareParts->spare_parts_price }}.Tk</td>
                                                    <td>{{ $data->delivery_fee }}.Tk</td>
                                                    <td>{{ $data->SpareParts->spare_parts_price + $data->delivery_fee }}.Tk</td>
                                                    <td>{{ $data->SparePartsOrder->name }}</td>
                                                    <td>{{ $data->SparePartsOrder->address }}</td>
                                                    <td>{{ $data->order_id }}</td>
                                                    <td>{{ $data->delivery_by }}</td>
                                                    <td>
                                                        @if($data->payment_method  == 'cash_on_delivery')
                                                        {{'Cash On Delivery'}}
                                                        @elseif($data->payment_method  == 'baksh')
                                                        {{'Baksh'}}
                                                        @else
                                                        {{'Bank Transfar'}}
                                                        @endif
                                                    </td>
                                                    <td>{{ $data->delivery_date }}</td>
                                                    <td>{{ $data->description }}</td>
                                                    <td>
                                                        @if($data->SparePartsOrder->delivery == 'picked')
                                                        {{''}}
                                                        @elseif($data->SparePartsOrder->delivery == 'delivered')
                                                        {{''}}
                                                        @else
                                                        <a href="{{ url('portal/request/delivery/proceed/' .$data->order_id )}}" class="btn btn-outline-success"><i class="fa fa-check"></i>&nbsp;Proceed</a>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            @endsection
            @section('script')
            <script>
            $(function () {
            $('#brandList').DataTable(
            {"aaSorting": [[7, "desc"]]}
            );
            });
            </script>
            <script type="text/javascript">
            $(document).ready(function () {
            $('.fancebox').fancybox({
            openEffect: 'elastic',
            closeEffect: 'elastic',
            helpers: {
            title: {
            type: 'float'
            }
            }
            });
            });
            </script>
            @stop