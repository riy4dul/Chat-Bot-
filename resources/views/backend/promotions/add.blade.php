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
                        <div class="card card-primary">
                            <div class="card-header" style="background-color: #dc3545; color: #ffffff;">
                                <h3 class="card-title">Add New Promotions</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="col-6">
                                    <form role="form" method="POST" action="{{ URL::to('portal/promotions/store') }}"
                                          enctype="multipart/form-data" id="brand-form">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group{{ $errors->has('promotion_description') ? ' has-error' : '' }}">
                                                <label for="promotion_description">Name<span
                                                            class="mark">*</span></label>
                                                <textarea rows="5" class="form-control requiredOL" id="promotion_description"
                                                       name="promotion_description"
                                                          placeholder="Enter description">{{ old('promotion_description') }}</textarea>
                                                @if($errors->has('promotion_description'))
                                                    <small class="text-danger"><i
                                                                class="fa fa-warning"></i>&nbsp;{{ $errors->first('promotion_description') }}
                                                    </small>
                                                @endif
                                            </div>
                                            <div class="form-group{{ $errors->has('promotion_status') ? ' has-error' : '' }}">
                                                <label for="promotion_status">Status<span
                                                            class="mark">*</span></label>
                                                <select class="form-control requiredOL" name="promotion_status"
                                                        id="promotion_status">
                                                    <option value="Active"
                                                            @if('Active' == old('promotion_status')) selected="selected" @endif>
                                                        Active
                                                    </option>
                                                    <option value="Inactive"
                                                            @if('Inactive' == old('promotion_status')) selected="selected" @endif>
                                                        Inactive
                                                    </option>
                                                </select>
                                                @if($errors->has('promotion_status'))
                                                    <small class="text-danger"><i
                                                                class="fa fa-warning"></i>&nbsp;{{ $errors->first('promotion_status') }}
                                                    </small>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer">
                                            <button type="submit" id="form-submit"  class="btn  btn-outline-primary"><i class="fa fa-plus"></i>&nbsp;Submit</button>
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
        $(function () {
            $('#brand_specifications').wysihtml5({
                toolbar: {fa: true},
                "image": false,
            })
        })
    </script>
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