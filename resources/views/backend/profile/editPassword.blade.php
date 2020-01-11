@extends('layout.backend.index')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Password</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ URL::to('portal/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Update Password</li>
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
                                <h3 class="card-title">Update Password</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="col-6">
                                    <form role="form" method="POST" action="{{ URL::to('portal/profile/updatePassword') }}"
                                          enctype="multipart/form-data" id="brand-form">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group{{ $errors->has('old_password') ? ' has-error' : '' }}">
                                                <label for="password">Old Password&nbsp;<span
                                                            class="mark">*</span></label>
                                                <input type="password" class="form-control requiredOL"
                                                       name="old_password" id="old_password"
                                                       value="{{ old('old_password') }}">
                                                @if($errors->has('old_password'))
                                                    <small class="text-danger"><i
                                                                class="fa fa-warning"></i>&nbsp;{{ $errors->first('old_password') }}
                                                    </small>
                                                @endif
                                            </div>
                                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                <label for="password">Password&nbsp;<span class="mark">*</span></label>
                                                <input type="password" class="form-control requiredOL" name="password"
                                                       id="password" value="{{ old('password')}}">
                                                @if($errors->has('password'))
                                                    <small class="text-danger"><i
                                                                class="fa fa-warning"></i>&nbsp;{{ $errors->first('password') }}
                                                    </small>
                                                @endif
                                            </div>
                                            <div class="form-group{{ $errors->has('re_password') ? ' has-error' : '' }}">
                                                <label for="re_password">Confirm Password&nbsp;<span
                                                            class="mark">*</span></label>
                                                <input type="password" class="form-control requiredOL"
                                                       name="re_password" id="re_password"
                                                       value="{{ old('re_password') }}">
                                                @if($errors->has('re_password'))
                                                    <small class="text-danger"><i
                                                                class="fa fa-warning"></i>&nbsp;{{ $errors->first('re_password') }}
                                                    </small>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer">
                                            <button type="submit" id="form-submit" class="btn btn-outline-primary"><i class="fa fa-edit"></i>&nbsp;Update
                                            </button>
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