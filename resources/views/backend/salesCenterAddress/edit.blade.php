@extends('layout.backend.index')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Sales Center Address</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ URL::to('portal/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Sales Center Address</li>
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
                                <h3 class="card-title">Update Sales Center Address</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="col-6">
                                    <form role="form" method="POST" action="{{ URL::to('portal/sales-center/update') }}"
                                          enctype="multipart/form-data" id="brand-form">
                                        @csrf
                                        <input type="hidden" name="sales_center_id" value="{{ $data->sales_center_id }}">
                                        <div class="card-body">
                                            <div class="form-group{{ $errors->has('sales_center_address') ? ' has-error' : '' }}">
                                                <label for="sales_center_address">Address<span
                                                            class="mark">*</span></label>
                                                <textarea rows="4" class="form-control requiredOL"
                                                          id="sales_center_address"
                                                          name="sales_center_address"
                                                          placeholder="Enter address">{{ $data->sales_center_address }}</textarea>
                                                @if($errors->has('sales_center_address'))
                                                    <small class="text-danger"><i
                                                                class="fa fa-warning"></i>&nbsp;{{ $errors->first('sales_center_address') }}
                                                    </small>
                                                @endif
                                            </div>
                                            <div class="form-group{{ $errors->has('sales_center_city') ? ' has-error' : '' }}">
                                                <label for="sales_center_city">City<span
                                                            class="mark">*</span></label>
                                                <input type="text" class="form-control requiredOL"
                                                       id="sales_center_city"
                                                       name="sales_center_city"
                                                       placeholder="Enter city" value="{{ $data->sales_center_city }}">
                                                @if($errors->has('sales_center_city'))
                                                    <small class="text-danger"><i
                                                                class="fa fa-warning"></i>&nbsp;{{ $errors->first('sales_center_city') }}
                                                    </small>
                                                @endif
                                            </div>
                                            <div class="form-group{{ $errors->has('sales_center_phone') ? ' has-error' : '' }}">
                                                <label for="sales_center_phone">Phone Number<span
                                                            class="mark">*</span></label>
                                                <input type="text" class="form-control requiredOL"
                                                       id="sales_center_phone"
                                                       name="sales_center_phone"
                                                       placeholder="Enter phone number" maxlength="13"
                                                       value="{{ $data->sales_center_phone }}"
                                                       onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                                @if($errors->has('sales_center_phone'))
                                                    <small class="text-danger"><i
                                                                class="fa fa-warning"></i>&nbsp;{{ $errors->first('sales_center_phone') }}
                                                    </small>
                                                @endif
                                            </div>
                                            <div class="form-group{{ $errors->has('sales_center_working_hours') ? ' has-error' : '' }}">
                                                <label for="sales_center_working_hours">Working Hours<span
                                                            class="mark">*</span></label>
                                                <input type="text" class="form-control requiredOL"
                                                       id="sales_center_working_hours"
                                                       name="sales_center_working_hours"
                                                       placeholder="Enter working hours"
                                                       value="{{ $data->sales_center_working_hours }}">
                                                @if($errors->has('sales_center_working_hours'))
                                                    <small class="text-danger"><i
                                                                class="fa fa-warning"></i>&nbsp;{{ $errors->first('sales_center_working_hours') }}
                                                    </small>
                                                @endif
                                            </div>
                                            <div class="form-group{{ $errors->has('sales_center_working_days') ? ' has-error' : '' }}">
                                                <label for="sales_center_working_days">Working Days<span
                                                            class="mark">*</span></label>
                                                <input type="text" class="form-control requiredOL"
                                                       id="sales_center_working_days"
                                                       name="sales_center_working_days"
                                                       placeholder="Enter working days"
                                                       value="{{ $data->sales_center_working_days }}">
                                                @if($errors->has('sales_center_working_days'))
                                                    <small class="text-danger"><i
                                                                class="fa fa-warning"></i>&nbsp;{{ $errors->first('sales_center_working_days') }}
                                                    </small>
                                                @endif
                                            </div>
                                            <div class="form-group{{ $errors->has('sales_center_status') ? ' has-error' : '' }}">
                                                <label for="sales_center_status">Status<span
                                                            class="mark">*</span></label>
                                                <select class="form-control requiredOL" name="sales_center_status"
                                                        id="sales_center_status">
                                                    <option value="Active"
                                                            @if('Active' == $data->sales_center_status) selected="selected" @endif>
                                                        Active
                                                    </option>
                                                    <option value="Inactive"
                                                            @if('Inactive' == $data->sales_center_status) selected="selected" @endif>
                                                        Inactive
                                                    </option>
                                                </select>
                                                @if($errors->has('sales_center_status'))
                                                    <small class="text-danger"><i
                                                                class="fa fa-warning"></i>&nbsp;{{ $errors->first('sales_center_status') }}
                                                    </small>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer">
                                            <button type="submit" id="form-submit" class="btn btn-outline-primary"><i
                                                        class="fa fa-edit"></i>&nbsp;Update
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
    <script>
        $(function () {
            $('#sales_center_working_hours').daterangepicker({
                // timePicker         : true,
                // timePickerIncrement: 30,
                // format             : 'MM/DD/YYYY h:mm A',
                format: 'LT',
                pickDate: false
            });
        });
    </script>
@stop