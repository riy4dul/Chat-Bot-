@extends('layout.backend.index')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Loan Information</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ URL::to('portal/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Loan Information</li>
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
                                <h3 class="card-title">Add New Loan Info</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="col-6">
                                    <form role="form" method="POST" action="{{ URL::to('portal/loan-info/store') }}"
                                          enctype="multipart/form-data" id="brand-form">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group{{ $errors->has('loan_info_name') ? ' has-error' : '' }}">
                                                <label for="loan_info_name">Name<span
                                                            class="mark">*</span></label>
                                                <input type="text" class="form-control requiredOL" id="loan_info_name"
                                                       name="loan_info_name"
                                                       placeholder="Enter name" value="{{ old('loan_info_name') }}">
                                                @if($errors->has('loan_info_name'))
                                                    <small class="text-danger"><i
                                                                class="fa fa-warning"></i>&nbsp;{{ $errors->first('loan_info_name') }}
                                                    </small>
                                                @endif
                                            </div>
                                            <div class="form-group{{ $errors->has('loan_info_designation') ? ' has-error' : '' }}">
                                                <label for="loan_info_designation">Designation<span
                                                            class="mark">*</span></label>
                                                <input type="text" class="form-control requiredOL" id="loan_info_designation"
                                                       name="loan_info_designation"
                                                       placeholder="Enter designation" value="{{ old('loan_info_designation') }}">
                                                @if($errors->has('loan_info_designation'))
                                                    <small class="text-danger"><i
                                                                class="fa fa-warning"></i>&nbsp;{{ $errors->first('loan_info_designation') }}
                                                    </small>
                                                @endif
                                            </div>
                                            <div class="form-group{{ $errors->has('loan_info_phone') ? ' has-error' : '' }}">
                                                <label for="loan_info_phone">Phone Number<span
                                                            class="mark">*</span></label>
                                                <input type="text" class="form-control requiredOL" id="loan_info_phone"
                                                       name="loan_info_phone"
                                                       placeholder="Enter phone number" maxlength="13" value="{{ old('loan_info_phone') }}" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                                @if($errors->has('loan_info_phone'))
                                                    <small class="text-danger"><i
                                                                class="fa fa-warning"></i>&nbsp;{{ $errors->first('loan_info_phone') }}
                                                    </small>
                                                @endif
                                            </div>
                                            <div class="form-group{{ $errors->has('loan_info_status') ? ' has-error' : '' }}">
                                                <label for="loan_info_status">Status<span
                                                            class="mark">*</span></label>
                                                <select class="form-control requiredOL" name="loan_info_status"
                                                        id="loan_info_status">
                                                    <option value="Active"
                                                            @if('Active' == old('loan_info_status')) selected="selected" @endif>
                                                        Active
                                                    </option>
                                                    <option value="Inactive"
                                                            @if('Inactive' == old('loan_info_status')) selected="selected" @endif>
                                                        Inactive
                                                    </option>
                                                </select>
                                                @if($errors->has('loan_info_status'))
                                                    <small class="text-danger"><i
                                                                class="fa fa-warning"></i>&nbsp;{{ $errors->first('loan_info_status') }}
                                                    </small>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer">
                                            <button type="submit" id="form-submit"  class="btn btn-outline-primary"><i class="fa fa-plus"></i>&nbsp;Submit</button>
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