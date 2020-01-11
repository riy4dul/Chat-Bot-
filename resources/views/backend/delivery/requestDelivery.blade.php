@extends('layout.backend.index')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Request for Delivery</h1>
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
                                            <h3 class="card-title">Request for Delivery</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <div class="col-6">
                                                <form role="form" method="POST" action="{{ URL::to('portal/request/delivery/add') }}"
                                                    enctype="multipart/form-data" id="brand-form">
                                                    {{-- <input type="hidden" name="brand_id" value="{{ $data->brand_id }}"> --}}
                                                    @csrf
                                                    <div class="card-body">
                                                        <div class="form-group{{ $errors->has('delivery_by') ? ' has-error' : '' }}">
                                                            <label for="brand_name">Delivery Man<span
                                                            class="mark">*</span></label>
                                                            <select class="form-control requiredOL" id="delivery_by" name="delivery_by">
                                                                <option value="">-- Select --</option>
                                                                <option value="abul">Abul</option>
                                                                <option value="babul">Babul</option>
                                                                <option value="habul">Habul</option>
                                                            </select>
                                                            @if($errors->has('delivery_by'))
                                                            <small class="text-danger"><i
                                                            class="fa fa-warning"></i>&nbsp;{{ $errors->first('delivery_by') }}
                                                            </small>
                                                            @endif
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="brand_name">Payment Method<span
                                                            class="mark">*</span></label>
                                                            <select class="form-control requiredOL" id="payment_method" name="payment_method">
                                                                <option value="">-- Select --</option>
                                                                <option value="cash_on_delivery">Cash on delivery</option>
                                                                <option value="baksh">Baksh</option>
                                                                <option value="bank_transfar">Bank Transfar</option>
                                                            </select>
                                                            @if($errors->has('payment_method'))
                                                            <small class="text-danger"><i
                                                            class="fa fa-warning"></i>&nbsp;{{ $errors->first('payment_method') }}
                                                            </small>
                                                            @endif
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="brand_model">Product Id<span
                                                            class="mark">*</span></label>
                                                            <input type="text" class="form-control requiredOL" id="brand_model"name="product_id" value="{{ $data->spare_parts_id }}"readonly>
                                                            @if($errors->has('brand_model'))
                                                            <small class="text-danger"><i
                                                            class="fa fa-warning"></i>&nbsp;{{ $errors->first('brand_model') }}
                                                            </small>
                                                            @endif
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="brand_model">Order Id<span
                                                            class="mark">*</span></label>
                                                            <input type="text" class="form-control requiredOL" id="brand_model"name="order_id"value="{{ $id}}" readonly>
                                                        </div>

                                                        <div class="form-group"><input type="text" class="form-control reserve-form empty iconified" name="delivery_date" id="datetimepicker1" placeholder="&#xf017;  Time">
                                                             @if($errors->has('delivery_date'))
                                                            <small class="text-danger"><i
                                                            class="fa fa-warning"></i>&nbsp;{{ $errors->first('delivery_date') }}
                                                            </small>
                                                            @endif
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="delivery_fee">Delivery Fee<span
                                                            class="mark">*</span></label>
                                                            <input type="text" class="form-control reserve-form empty iconified" name="delivery_fee" id="delivery_fee" placeholder="Delivery Fee">

                                                            @if($errors->has('delivery_fee'))
                                                            <small class="text-danger"><i
                                                            class="fa fa-warning"></i>&nbsp;{{ $errors->first('delivery_fee') }}
                                                            </small>
                                                            @endif
                                                        </div>
                                                        
                                                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                                            <label for="description">Description<span
                                                            class="mark">*</span></label>
                                                            <textarea class="form-control requiredOL" rows="4" name="description"
                                                            id="description"
                                                            placeholder="Enter description">{{-- {{ $data->description }} --}}</textarea>
                                                            @if($errors->has('description'))
                                                            <small class="text-danger"><i
                                                            class="fa fa-warning"></i>&nbsp;{{ $errors->first('description') }}
                                                            </small>
                                                            @endif
                                                        </div>
                                                        
                                                    </div>
                                                    <!-- /.card-body -->
                                                    <div class="card-footer">
                                                        <button type="submit" id="form-submit"  class="btn btn-outline-primary"><i class="fa fa-edit"></i>&nbsp;Request confirm</button>
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
                {{-- @section('script')
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
                // $(document).on("keyup change focusout", "#brand_name", function () {
                //     if ($(this).val() != '') {
                //         $('#form-submit').removeAttr('disabled');
                //     } else {
                //         $('#form-submit').attr('disabled');
                //     }
                // });
                </script>
                @stop --}}