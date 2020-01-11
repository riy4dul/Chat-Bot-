@extends('layout.backend.index')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Brand</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ URL::to('portal/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Brand</li>
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
                                <h3 class="card-title">Brand List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="brandList" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Brand</th>
                                        <th>Model</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th style="width: 20%">Option</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($dataList as $data)
                                        <tr>
                                            <td>
                                                @if(empty($data->brand_image_link))
                                                    <img width="40px" height="40px" border="0" class="img-circle"
                                                         src="{{ asset('backend/img/bots.png') }}"/>
                                                @else
                                                    <a class="fancebox fancybox.image" Title="{{ $data->brand_model }}"
                                                       href="{{ asset($data->brand_image_link )}}"><img width="40px"
                                                                                                        height="40px"
                                                                                                        border="0"
                                                                                                        class="img-circle"
                                                                                                        src="{{ asset($data->brand_image_link )}}"/></a>
                                                @endif
                                            </td>
                                            <td>{{ $data->car_brands_name }}</td>
                                            <td>{{ $data->brand_model }}</td>
                                            <td>{{ $data->brand_price }}</td>
                                            <td>
                                                @if($data->brand_status == 'Active')
                                                    <div class="color-palette-set">
                                                        <div class="bg-success color-palette"><span>Active</span></div>
                                                    </div>
                                                @else
                                                    <div class="color-palette-set">
                                                        <div class="bg-danger color-palette"><span>Inactive</span></div>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                <a class="btn btn-outline-info" href="javascript:void(0);"
                                                   data-toggle="modal" data-target="#viewMore{{ $data->brand_id }}"><i
                                                            class="fa fa-info"></i>&nbsp;View More</a>
                                                <a href="{{ url('portal/brand/edit/' .$data->brand_id )}}"
                                                   class="btn btn-outline-primary"><i class="fa fa-edit"></i>&nbsp;Update</a>
                                                @if($data->brand_status == 'Active')
                                                    <a class="btn btn-outline-danger" href="javascript:void(0);"
                                                       data-toggle="modal" data-target="#inActive{{ $data->brand_id }}"><i
                                                                class="fa fa-ban"></i>&nbsp;Inactive</a>
                                                @else
                                                    <a class="btn btn-outline-success" href="javascript:void(0);"
                                                       data-toggle="modal" data-target="#active{{ $data->brand_id }}"><i
                                                                class="fa fa-check"></i>&nbsp;Active</a>
                                            @endif
                                            <!--  Model For Inactive car model-->
                                                <div class="modal fade" id="inActive{{ $data->brand_id }}" tabindex="-1"
                                                     role="dialog"
                                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header"
                                                                 style="background: #dc3545 !important;">
                                                                <h5 class="modal-title" id="exampleModalLabel"
                                                                    style="color: #fff;text-align: center;">Are you
                                                                    sure active this car model?</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="POST"
                                                                      action="{{ URL::to('portal/brand/inActive') }}">
                                                                    @csrf
                                                                    <input type="hidden" name="brand_id" id="brand_id"
                                                                           value="{{ $data->brand_id }}"/>
                                                                    <div class="modal-footer"
                                                                         style="text-align: center;text-align: -webkit-center;">
                                                                        <button type="button"
                                                                                class="btn btn-outline-danger"
                                                                                data-dismiss="modal"><i
                                                                                    class="fa fa-close"></i>&nbsp;Close
                                                                        </button>
                                                                        <button type="submit"
                                                                                class="btn btn-outline-success"><i
                                                                                    class="fa fa-ban"></i>&nbsp;Inactive
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Inactive Model -->
                                                <!--  Model For active car model-->
                                                <div class="modal fade" id="active{{ $data->brand_id }}" tabindex="-1"
                                                     role="dialog"
                                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header"
                                                                 style="background: #dc3545 !important;">
                                                                <h5 class="modal-title" id="exampleModalLabel"
                                                                    style="color: #fff;text-align: center;">Are you sure
                                                                    inactive this car model?</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="POST"
                                                                      action="{{ URL::to('portal/brand/active') }}">
                                                                    @csrf
                                                                    <input type="hidden" name="brand_id" id="brand_id"
                                                                           value="{{ $data->brand_id }}"/>
                                                                    <div class="modal-footer"
                                                                         style="text-align: center;text-align: -webkit-center;">
                                                                        <button type="button"
                                                                                class="btn btn-outline-danger"
                                                                                data-dismiss="modal"><i
                                                                                    class="fa fa-close"></i>&nbsp;Close
                                                                        </button>
                                                                        <button type="submit"
                                                                                class="btn btn-outline-success"><i
                                                                                    class="fa fa-check"></i>&nbsp;Active
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Inactive Model -->
                                                <!-- view more -->
                                                <div class="modal fade bd-example-modal-lg" id="viewMore{{ $data->brand_id }}" tabindex="-1"
                                                     role="dialog"
                                                     aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header"
                                                                 style="background: #dc3545 !important;">
                                                                <h5 class="modal-title" id="exampleModalLabel"
                                                                    style="color: #fff;text-align: center;">{{ $data->brand_model }} Details</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <table class="table table-bordered table-hover">
                                                                    <tbody>
                                                                    <tr>
                                                                        <th>Description</th>
                                                                        <td>{{ $data->brand_description }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Specification URL</th>
                                                                        <td>{{$data->brand_specifications }}</td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End view More -->
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td class="text-center" colspan="5"></td>
                                        <td class="text-left" colspan="1">
                                            <a href="{{ URL::to('portal/brand/add') }}">
                                                <button class="btn btn-outline-primary"><i class="fa fa-plus"></i>&nbsp;Add
                                                    New
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
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
            $('#brandList').DataTable();
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