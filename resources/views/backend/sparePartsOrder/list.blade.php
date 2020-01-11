@extends('layout.backend.index')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Spare Parts Order</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ URL::to('portal/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Spare Parts</li>
                        </ol>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <hr>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header" style="background-color: #dc3545; color: #ffffff;">
                                <h3 class="card-title">Spare Parts Order List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="brandList" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Parts Name</th>
                                        <th>Customer Name</th>
                                        <th>Customer Address</th>
                                        <th>Customer Phone</th>
                                        <th>Status</th>
                                        <th>Delivery</th>
                                        <th class="text-center">Option</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($dataList as $data)
                                        <tr>
                                            <td>{{ $data->SpareParts->spare_parts_name }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->address }}</td>
                                            <td>{{ $data->phone }}</td>
                                            <td>
                                                @if($data->confirmation  == 'confirmed')
                                                    <div class="color-palette-set">
                                                        <div class="bg-success color-palette"><span>Confirmed</span>
                                                        </div>
                                                    </div>
                                                @elseif($data->confirmation  == 'not confirmed')
                                                    <div class="color-palette-set">
                                                        <div class="bg-warning color-palette"><span>Not Confirmed</span>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="color-palette-set">
                                                        <div class="bg-danger color-palette"><span>Rejected</span></div>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                @if($data->delivery  == 'picked')
                                                    <div class="color-palette-set">
                                                        <div class="bg-warning color-palette"><span>Picked</span></div>
                                                    </div>
                                                @elseif($data->delivery  == 'delivered')
                                                    <div class="color-palette-set">
                                                        <div class="bg-success color-palette"><span>Delivered</span>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="color-palette-set">
                                                        <div class="bg-danger color-palette"><span>Not Delivered</span>
                                                        </div>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                @if($data->delivery  == 'delivered')
                                                @elseif($data->delivery  == 'picked')
                                                    <a href="{{ url('portal/request/delivery/payment/' .$data->spare_parts_orders_id )}}"
                                                       class="btn btn-outline-success"><i class="fa fa-check"></i>&nbsp;Delivered</a>
                                                @elseif($data->confirmation  == 'confirmed')
                                                    <a href="{{ url('portal/request/delivery/' .$data->spare_parts_orders_id )}}"
                                                       class="btn btn-outline-primary"><i class="fa fa-edit"></i>&nbsp;Request
                                                        for delivery</a>
                                                @else
                                                    <a title="Reject Order" class="btn btn-outline-danger"
                                                       href="javascript:void(0);" data-toggle="modal"
                                                       data-target="#rejected{{ $data->spare_parts_orders_id }}"><i
                                                                class="fa fa-times"></i>&nbsp;Rejected</a>
                                                    @if($data->confirmation == 'confirmed')
                                                        <a class="btn btn-outline-danger" href="javascript:void(0);"
                                                           data-toggle="modal"
                                                           data-target="#inActive{{ $data->spare_parts_orders_id }}"><i
                                                                    class="fa fa-ban"></i>&nbsp;Not Confirmed</a>
                                                    @else
                                                        <a class="btn btn-outline-success" href="javascript:void(0);"
                                                           data-toggle="modal"
                                                           data-target="#active{{ $data->spare_parts_orders_id }}"><i
                                                                    class="fa fa-check"></i>&nbsp;Confirmed</a>
                                                    @endif
                                                <!--  Model For Inactive car model-->
                                                    <div class="modal fade"
                                                         id="inActive{{ $data->spare_parts_orders_id }}" tabindex="-1"
                                                         role="dialog"
                                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header"
                                                                     style="background: #dc3545 !important;">
                                                                    <h5 class="modal-title" id="exampleModalLabel"
                                                                        style="color: #fff;text-align: center;">Are you
                                                                        sure UnConfirmed this Order?
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal"
                                                                            aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="POST"
                                                                          action="{{ URL::to('portal/spare_parts_orders/inActive') }}">
                                                                        @csrf
                                                                        <input type="hidden"
                                                                               name="spare_parts_orders_id"
                                                                               id="spare_parts_orders_id"
                                                                               value="{{ $data->spare_parts_orders_id }}"/>
                                                                        <div class="modal-footer"
                                                                             style="text-align: center;text-align: -webkit-center;">
                                                                            <button type="button"
                                                                                    class="btn btn-outline-danger"
                                                                                    data-dismiss="modal"><i
                                                                                        class="fa fa-close"></i>&nbsp;Close
                                                                            </button>
                                                                            <button type="submit"
                                                                                    class="btn btn-outline-success"><i
                                                                                        class="fa fa-check"></i>&nbsp;yes
                                                                            </button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Inactive Model -->
                                                    <!--  Model For active car model-->
                                                    <div class="modal fade"
                                                         id="active{{ $data->spare_parts_orders_id }}" tabindex="-1"
                                                         role="dialog"
                                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header"
                                                                     style="background: #dc3545 !important;">
                                                                    <h5 class="modal-title" id="exampleModalLabel"
                                                                        style="color: #fff;text-align: center;">Are you
                                                                        sure
                                                                        Confirmed This order?
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal"
                                                                            aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="POST"
                                                                          action="{{ URL::to('portal/spare_parts_orders/active') }}">
                                                                        @csrf
                                                                        <input type="hidden"
                                                                               name="spare_parts_orders_id"
                                                                               id="spare_parts_orders_id"
                                                                               value="{{ $data->spare_parts_orders_id }}"/>
                                                                        <div class="modal-footer"
                                                                             style="text-align: center;text-align: -webkit-center;">
                                                                            <button type="button"
                                                                                    class="btn btn-outline-danger"
                                                                                    data-dismiss="modal"><i
                                                                                        class="fa fa-close"></i>&nbsp;Close
                                                                            </button>
                                                                            <button type="submit"
                                                                                    class="btn btn-outline-success"><i
                                                                                        class="fa fa-check"></i>&nbsp;Yes
                                                                            </button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Inactive Model -->
                                                    <!--  Model For Rejected Order model-->
                                                    <div class="modal fade"
                                                         id="rejected{{ $data->spare_parts_orders_id }}" tabindex="-1"
                                                         role="dialog"
                                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header"
                                                                     style="background: #dc3545 !important;">
                                                                    <h5 class="modal-title" id="exampleModalLabel"
                                                                        style="color: #fff;text-align: center;">Are you
                                                                        sure
                                                                        Reject This order?
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal"
                                                                            aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="POST"
                                                                          action="{{ URL::to('portal/spare_parts_orders/rejected') }}">
                                                                        @csrf
                                                                        <input type="hidden"
                                                                               name="spare_parts_orders_id"
                                                                               id="spare_parts_orders_id"
                                                                               value="{{ $data->spare_parts_orders_id }}"/>
                                                                        <div class="modal-footer"
                                                                             style="text-align: center;text-align: -webkit-center;">
                                                                            <button type="button"
                                                                                    class="btn btn-outline-danger"
                                                                                    data-dismiss="modal"><i
                                                                                        class="fa fa-close"></i>&nbsp;Close
                                                                            </button>
                                                                            <button type="submit"
                                                                                    class="btn btn-outline-success"><i
                                                                                        class="fa fa-check"></i>&nbsp;Yes
                                                                            </button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Inactive Model -->
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    {{--
                                    <tr>
                                       <td class="text-center" colspan="6"></td>
                                       <td class="text-left" colspan="2">
                                          <a href="{{ URL::to('portal/spare-parts/add') }}">
                                          <button class="btn btn-outline-primary"><i class="fa fa-plus"></i>&nbsp;Add
                                          New
                                          </button>
                                          </a>
                                       </td>
                                    </tr>
                                    --}}
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
                {"aaSorting": [[1, "asc"]]}
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