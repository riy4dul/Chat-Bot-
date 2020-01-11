@extends('layout.backend.index')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Promotions</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ URL::to('portal/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Promotions</li>
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
                                <h3 class="card-title">Promotions List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="brandList" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th style="width: 15%">Option</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($dataList as $data)
                                        <tr>
                                            <td>{{ $data->promotion_description }}</td>
                                            <td>
                                                @if($data->promotion_status == 'Active')
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
                                                <a href="{{ url('portal/promotions/edit/' .$data->promotion_id )}}"
                                                   class="btn btn-outline-primary"><i class="fa fa-edit"></i>&nbsp;Update</a>
                                                @if($data->promotion_status == 'Active')
                                                    <a class="btn btn-outline-danger" href="javascript:void(0);"
                                                       data-toggle="modal" data-target="#inActive{{ $data->promotion_id }}"><i class="fa fa-ban"></i>&nbsp;Inactive</a>
                                                @else
                                                    <a class="btn btn-outline-success" href="javascript:void(0);"
                                                       data-toggle="modal" data-target="#active{{ $data->promotion_id }}"><i class="fa fa-check"></i>&nbsp;Active</a>
                                            @endif
                                            <!--  Model For Inactive car model-->
                                                <div class="modal fade" id="inActive{{ $data->promotion_id }}" tabindex="-1" role="dialog"
                                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header" style="background: #dc3545 !important;">
                                                                <h5 class="modal-title" id="exampleModalLabel" style="color: #fff;text-align: center;">Are you
                                                                    sure active this car model?</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="POST"
                                                                      action="{{ URL::to('portal/promotions/inActive') }}">
                                                                    {{ csrf_field() }}
                                                                    <input type="hidden" name="promotion_id" id="promotion_id"
                                                                           value="{{ $data->promotion_id }}"/>
                                                                    <div class="modal-footer"
                                                                         style="text-align: center;text-align: -webkit-center;">
                                                                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Close</button>
                                                                        <button type="submit" class="btn btn-outline-success"><i class="fa fa-ban"></i>&nbsp;Inactive
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Inactive Model -->
                                                <!--  Model For active car model-->
                                                <div class="modal fade" id="active{{ $data->promotion_id }}" tabindex="-1" role="dialog"
                                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header" style="background: #dc3545 !important;">
                                                                <h5 class="modal-title" id="exampleModalLabel" style="color: #fff;text-align: center;">Are you sure inactive this car model?</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="POST"
                                                                      action="{{ URL::to('portal/promotions/active') }}">
                                                                    {{ csrf_field() }}
                                                                    <input type="hidden" name="promotion_id" id="promotion_id"
                                                                           value="{{ $data->promotion_id }}"/>
                                                                    <div class="modal-footer"
                                                                         style="text-align: center;text-align: -webkit-center;">
                                                                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Close</button>
                                                                        <button type="submit" class="btn btn-outline-success"><i class="fa fa-check"></i>&nbsp;Active
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Inactive Model -->
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td class="text-center" colspan="2"></td>
                                        <td class="text-left" colspan="1">
                                            <a href="{{ URL::to('portal/promotions/add') }}">
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