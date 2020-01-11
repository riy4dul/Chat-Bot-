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
                        <div class="card card-primary">
                            <div class="card-header" style="background-color: #dc3545; color: #ffffff;">
                                <h3 class="card-title">Add New Brand</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="col-6">
                                    <form role="form" method="POST" action="{{ URL::to('portal/brand/store') }}"
                                          enctype="multipart/form-data" id="brand-form">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group{{ $errors->has('brand_name') ? ' has-error' : '' }}">
                                                <label for="brand_name">Name<span
                                                            class="mark">*</span></label>
                                                <select class="form-control requiredOL" name="brand_name"
                                                        id="brand_name">
                                                    <option value="">-- Select --</option>
                                                    @foreach($carBrandList AS $carBrand)
                                                        <option value="{{ $carBrand->car_brands_id }}"
                                                                @if($carBrand->car_brands_id == old('brand_name')) selected="selected" @endif>{{ $carBrand->car_brands_name }}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('brand_name'))
                                                    <small class="text-danger"><i
                                                                class="fa fa-warning"></i>&nbsp;{{ $errors->first('brand_name') }}
                                                    </small>
                                                @endif
                                            </div>
                                            <div class="form-group{{ $errors->has('brand_model') ? ' has-error' : '' }}">
                                                <label for="brand_model">Model Name<span
                                                            class="mark">*</span></label>
                                                <input type="text" class="form-control requiredOL" id="brand_model"
                                                       name="brand_model"
                                                       placeholder="Enter model name" value="{{ old('brand_model') }}">
                                                @if($errors->has('brand_model'))
                                                    <small class="text-danger"><i
                                                                class="fa fa-warning"></i>&nbsp;{{ $errors->first('brand_model') }}
                                                    </small>
                                                @endif
                                            </div>
                                            <div class="form-group{{ $errors->has('brand_price') ? ' has-error' : '' }}">
                                                <label for="brand_price">Price<span
                                                            class="mark">*</span></label>
                                                <input type="text" class="form-control requiredOL" id="brand_price"
                                                       name="brand_price"
                                                       placeholder="Enter price" value="{{ old('brand_price') }}"
                                                       onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                                @if($errors->has('brand_price'))
                                                    <small class="text-danger"><i
                                                                class="fa fa-warning"></i>&nbsp;{{ $errors->first('brand_price') }}
                                                    </small>
                                                @endif
                                            </div>
                                            <div class="form-group{{ $errors->has('brand_image_link') ? ' has-error' : '' }}">
                                                <label for="brand_image_link">Image Link<span
                                                            class="mark">*</span></label>
                                                <input type="text" class="form-control requiredOL" id="brand_image_link"
                                                       name="brand_image_link"
                                                       placeholder="Enter image link"
                                                       value="{{ old('brand_image_link') }}">
                                                @if($errors->has('brand_image_link'))
                                                    <small class="text-danger"><i
                                                                class="fa fa-warning"></i>&nbsp;{{ $errors->first('brand_image_link') }}
                                                    </small>
                                                @endif
                                            </div>
                                            <div class="form-group{{ $errors->has('brand_description') ? ' has-error' : '' }}">
                                                <label for="brand_description">Description<span
                                                            class="mark">*</span></label>
                                                <textarea class="form-control requiredOL" rows="4"
                                                          name="brand_description"
                                                          id="brand_description"
                                                          placeholder="Enter description">{{ old('brand_description') }}</textarea>
                                                @if($errors->has('brand_description'))
                                                    <small class="text-danger"><i
                                                                class="fa fa-warning"></i>&nbsp;{{ $errors->first('brand_description') }}
                                                    </small>
                                                @endif
                                            </div>
                                            <div class="form-group{{ $errors->has('brand_specifications') ? ' has-error' : '' }}">
                                                <label for="brand_specifications">Specification(Website URL or Facebook URL)<span
                                                            class="mark">*</span></label>
                                                <input type="text" class="form-control requiredOL"
                                                          name="brand_specifications"
                                                          id="brand_specifications"
                                                          placeholder="Enter specification" value="{{ old('brand_specifications') }}">
                                                @if($errors->has('brand_specifications'))
                                                    <small class="text-danger"><i
                                                                class="fa fa-warning"></i>&nbsp;{{ $errors->first('brand_specifications') }}
                                                    </small>
                                                @endif
                                            </div>
                                            <div class="form-group{{ $errors->has('brand_status') ? ' has-error' : '' }}">
                                                <label for="brand_status">Status<span
                                                            class="mark">*</span></label>
                                                <select class="form-control requiredOL" name="brand_status"
                                                        id="brand_status">
                                                    <option value="Active"
                                                            @if('Active' == old('brand_status')) selected="selected" @endif>
                                                        Active
                                                    </option>
                                                    <option value="Inactive"
                                                            @if('Inactive' == old('brand_status')) selected="selected" @endif>
                                                        Inactive
                                                    </option>
                                                </select>
                                                @if($errors->has('brand_status'))
                                                    <small class="text-danger"><i
                                                                class="fa fa-warning"></i>&nbsp;{{ $errors->first('brand_status') }}
                                                    </small>
                                                @endif
                                            </div>
                                            <div class="form-group{{ $errors->has('brand_latest_cars') ? ' has-error' : '' }}">
                                                <label for="brand_latest_cars">Latest Brand<span
                                                            class="mark">*</span></label>
                                                <select class="form-control requiredOL" name="brand_latest_cars"
                                                        id="brand_latest_cars">
                                                    <option value="Yes"
                                                            @if('Yes' == old('brand_latest_cars')) selected="selected" @endif>
                                                        Yes
                                                    </option>
                                                    <option value="No"
                                                            @if('No' == old('brand_latest_cars')) selected="selected" @endif>
                                                        No
                                                    </option>
                                                </select>
                                                @if($errors->has('brand_latest_cars'))
                                                    <small class="text-danger"><i
                                                                class="fa fa-warning"></i>&nbsp;{{ $errors->first('brand_latest_cars') }}
                                                    </small>
                                                @endif
                                            </div>
                                            <div class="form-group{{ $errors->has('brand_top_seller_cars') ? ' has-error' : '' }}">
                                                <label for="brand_top_seller_cars">Top Seller Brand<span
                                                            class="mark">*</span></label>
                                                <select class="form-control requiredOL" name="brand_top_seller_cars"
                                                        id="brand_top_seller_cars">
                                                    <option value="Yes"
                                                            @if('Yes' == old('brand_top_seller_cars')) selected="selected" @endif>
                                                        Yes
                                                    </option>
                                                    <option value="No"
                                                            @if('No' == old('brand_top_seller_cars')) selected="selected" @endif>
                                                        No
                                                    </option>
                                                </select>
                                                @if($errors->has('brand_top_seller_cars'))
                                                    <small class="text-danger"><i
                                                                class="fa fa-warning"></i>&nbsp;{{ $errors->first('brand_top_seller_cars') }}
                                                    </small>
                                                @endif
                                            </div>
                                            <div class="form-group{{ $errors->has('brand_gallery_cars') ? ' has-error' : '' }}">
                                                <label for="brand_gallery_cars">Gallery<span
                                                            class="mark">*</span></label>
                                                <select class="form-control requiredOL" name="brand_gallery_cars"
                                                        id="brand_gallery_cars">
                                                    <option value="Yes"
                                                            @if('Yes' == old('brand_gallery_cars')) selected="selected" @endif>
                                                        Yes
                                                    </option>
                                                    <option value="No"
                                                            @if('No' == old('brand_gallery_cars')) selected="selected" @endif>
                                                        No
                                                    </option>
                                                </select>
                                                @if($errors->has('brand_gallery_cars'))
                                                    <small class="text-danger"><i
                                                                class="fa fa-warning"></i>&nbsp;{{ $errors->first('brand_gallery_cars') }}
                                                    </small>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer">
                                            <button type="submit" id="form-submit"
                                                    class="btn btn-outline-primary toggle-disabled"><i
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

    <script>
        $('.wysihtml5-sandbox').contents().find('body').on("keydown",function() {
            console.log("Handler for .keypress() called.");
        });
    </script>
    {{--<script>--}}
    {{--$(document).on('change keyup', '.requiredOL', function(e){--}}
    {{--let Disabled = true;--}}
    {{--$(".requiredOL").each(function() {--}}
    {{--let value = this.value--}}
    {{--if ((value)&&(value.trim() !=''))--}}
    {{--{--}}
    {{--Disabled = false--}}
    {{--}else{--}}
    {{--Disabled = true--}}
    {{--return false--}}
    {{--}--}}
    {{--});--}}

    {{--if(Disabled){--}}
    {{--$('.toggle-disabled').prop("disabled", true);--}}
    {{--}else{--}}
    {{--$('.toggle-disabled').prop("disabled", false);--}}
    {{--}--}}
    {{--})--}}
    {{--</script>--}}
@stop