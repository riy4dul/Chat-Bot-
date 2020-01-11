@extends('layout.backend.index')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Spare Parts</h1>
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
                        <div class="card card-primary">
                            <div class="card-header" style="background-color: #dc3545; color: #ffffff;">
                                <h3 class="card-title">Add New Spare Parts</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="col-6">
                                    <form role="form" method="POST" action="{{ URL::to('portal/spare-parts/store') }}"
                                          enctype="multipart/form-data" id="brand-form">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group{{ $errors->has('spare_parts_brand') ? ' has-error' : '' }}">
                                                <label for="spare_parts_brand">Brand Name<span
                                                            class="mark">*</span></label>
                                                <select class="form-control requiredOL" name="spare_parts_brand"
                                                        id="brand_name">
                                                    <option value="">-- Select --</option>
                                                    @foreach($carBrandList AS $carBrand)
                                                        <option value="{{ $carBrand->car_brands_id }}"@if($carBrand->car_brands_id == old('spare_parts_brand')) selected="selected" @endif>{{ $carBrand->car_brands_name }}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('spare_parts_brand'))
                                                    <small class="text-danger"><i
                                                                class="fa fa-warning"></i>&nbsp;{{ $errors->first('spare_parts_brand') }}
                                                    </small>
                                                @endif
                                            </div>
                                            <div class="form-group{{ $errors->has('spare_parts_model') ? ' has-error' : '' }}">
                                                <label for="spare_parts_model">Model Name<span
                                                            class="mark">*</span></label>
                                                <input type="text" class="form-control requiredOL"
                                                       id="spare_parts_model"
                                                       name="spare_parts_model"
                                                       placeholder="Enter model name"
                                                       value="{{ old('spare_parts_model') }}">
                                                @if($errors->has('spare_parts_model'))
                                                    <small class="text-danger"><i
                                                                class="fa fa-warning"></i>&nbsp;{{ $errors->first('spare_parts_model') }}
                                                    </small>
                                                @endif
                                            </div>
                                            <div class="form-group{{ $errors->has('spare_parts_name') ? ' has-error' : '' }}">
                                                <label for="spare_parts_name">Parts Name<span
                                                            class="mark">*</span></label>
                                                <input type="text" class="form-control requiredOL"
                                                       id="spare_parts_name"
                                                       name="spare_parts_name"
                                                       placeholder="Enter parts name"
                                                       value="{{ old('spare_parts_name') }}">
                                                @if($errors->has('spare_parts_name'))
                                                    <small class="text-danger"><i
                                                                class="fa fa-warning"></i>&nbsp;{{ $errors->first('spare_parts_name') }}
                                                    </small>
                                                @endif
                                            </div>
                                            <div class="form-group{{ $errors->has('spare_parts_stock') ? ' has-error' : '' }}">
                                                <label for="spare_parts_stock">Parts Stock<span
                                                            class="mark">*</span></label>
                                                <select class="form-control requiredOL" name="spare_parts_stock"
                                                        id="spare_parts_stock">
                                                    <option value="Yes"
                                                            @if('Yes' == old('spare_parts_stock')) selected="selected" @endif>
                                                        Yes
                                                    </option>
                                                    <option value="No"
                                                            @if('No' == old('spare_parts_stock')) selected="selected" @endif>
                                                        No
                                                    </option>
                                                </select>
                                                @if($errors->has('spare_parts_stock'))
                                                    <small class="text-danger"><i
                                                                class="fa fa-warning"></i>&nbsp;{{ $errors->first('spare_parts_stock') }}
                                                    </small>
                                                @endif
                                            </div>
                                            <div class="form-group{{ $errors->has('spare_parts_image') ? ' has-error' : '' }}">
                                                <label for="spare_parts_image">Parts Image Link<span
                                                            class="mark">*</span></label>
                                                <input type="text" class="form-control requiredOL"
                                                       id="spare_parts_image"
                                                       name="spare_parts_image"
                                                       placeholder="Enter parts image link"
                                                       value="{{ old('spare_parts_image') }}">
                                                @if($errors->has('spare_parts_image'))
                                                    <small class="text-danger"><i
                                                                class="fa fa-warning"></i>&nbsp;{{ $errors->first('spare_parts_image') }}
                                                    </small>
                                                @endif
                                            </div>
                                            <div class="form-group{{ $errors->has('spare_parts_price') ? ' has-error' : '' }}">
                                                <label for="spare_parts_price">Parts Price<span
                                                            class="mark">*</span></label>
                                                <input type="text" class="form-control requiredOL"
                                                       id="spare_parts_price"
                                                       name="spare_parts_price"
                                                       placeholder="Enter parts price"
                                                       value="{{ old('spare_parts_price') }}" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                                @if($errors->has('spare_parts_price'))
                                                    <small class="text-danger"><i
                                                                class="fa fa-warning"></i>&nbsp;{{ $errors->first('spare_parts_price') }}
                                                    </small>
                                                @endif
                                            </div>
                                            <div class="form-group{{ $errors->has('spare_parts_status') ? ' has-error' : '' }}">
                                                <label for="spare_parts_status">Status<span
                                                            class="mark">*</span></label>
                                                <select class="form-control requiredOL" name="spare_parts_status"
                                                        id="spare_parts_status">
                                                    <option value="Active"
                                                            @if('Active' == old('spare_parts_status')) selected="selected" @endif>
                                                        Active
                                                    </option>
                                                    <option value="Inactive"
                                                            @if('Inactive' == old('spare_parts_status')) selected="selected" @endif>
                                                        Inactive
                                                    </option>
                                                </select>
                                                @if($errors->has('spare_parts_status'))
                                                    <small class="text-danger"><i
                                                                class="fa fa-warning"></i>&nbsp;{{ $errors->first('spare_parts_status') }}
                                                    </small>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer">
                                            <button type="submit" id="form-submit" class="btn btn-outline-primary"><i
                                                        class="fa fa-plus"></i>&nbsp;Submit
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