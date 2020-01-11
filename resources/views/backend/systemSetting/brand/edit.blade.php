@extends('layout.backend.index')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Car Brand</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ URL::to('portal/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Car Brand</li>
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
                        <div class="card card-primary">
                            <div class="card-header" style="background-color: #dc3545; color: #ffffff;">
                                <h3 class="card-title">Update Car Brand</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="col-6">
                                    <form role="form" method="POST" action="{{ URL::to('portal/systemSetting/brand/update') }}"
                                          enctype="multipart/form-data" id="brand-form">
                                        <input type="hidden" name="car_brands_id" value="{{ $data->car_brands_id }}">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group{{ $errors->has('car_brands_name') ? ' has-error' : '' }}">
                                                <label for="car_brands_name">Description<span
                                                            class="mark">*</span></label>
                                                <input type="text" class="form-control requiredOL" name="car_brands_name"
                                                          id="car_brands_name"
                                                          placeholder="Enter description" value="{{ $data->car_brands_name }}">
                                                @if($errors->has('car_brands_name'))
                                                    <small class="text-danger"><i
                                                                class="fa fa-warning"></i>&nbsp;{{ $errors->first('car_brands_name') }}
                                                    </small>
                                                @endif
                                            </div>
                                            <div class="form-group{{ $errors->has('car_brands_status') ? ' has-error' : '' }}">
                                                <label for="car_brands_status">Status<span
                                                            class="mark">*</span></label>
                                                <select class="form-control requiredOL" name="car_brands_status"
                                                        id="car_brands_status">
                                                    <option value="Active"
                                                            @if('Active' == $data->car_brands_status) selected="selected" @endif>
                                                        Active
                                                    </option>
                                                    <option value="Inactive"
                                                            @if('Inactive' == $data->car_brands_status) selected="selected" @endif>
                                                        Inactive
                                                    </option>
                                                </select>
                                                @if($errors->has('car_brands_status'))
                                                    <small class="text-danger"><i
                                                                class="fa fa-warning"></i>&nbsp;{{ $errors->first('car_brands_status') }}
                                                    </small>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer">
                                            <button type="submit" id="form-submit"  class="btn btn-outline-primary"><i class="fa fa-edit"></i>&nbsp;Update</button>
                                        </div>
                                    </form>
                                </div>
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
        $(document).on("keyup change focusout", ".form-control.requiredOL", function () {
            if ($(this).val() == '') {
                $(this).addClass("errorInput");
                $(this).parent("div").addClass("has-error");
                $(this).siblings(".text-danger").removeClass("hide");
                $(this).siblings(".oError").removeClass("hide");
                $(this).css("borderColor", "red");
            } else {
                $(this).removeClass("errorInput");
                $(this).parents("div").removeClass("has-error");
                $(this).siblings(".text-danger").addClass("hide");
                $(this).siblings(".oError").addClass("hide");
                $(this).css("borderColor", "#ccc");
            }
        });
    </script>
@stop