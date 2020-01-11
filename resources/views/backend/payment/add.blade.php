@extends('layout.backend.index')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Payment Information</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ URL::to('portal/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Payment Information</li>
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
                                            <h3 class="card-title">Payment Information</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body" id="app">
                                            <div class="col-6">
                                                <form role="form" method="POST" action="{{ URL::to('portal/request/delivery/payment/'.$order->spare_parts_id) }}"
                                                    enctype="multipart/form-data" id="brand-form">
                                                    {{-- <input type="hidden" name="brand_id" value="{{ $data->brand_id }}"> --}}
                                                    @csrf
                                                    <div class="card-body">
                                                        {{-- product id --}}
                                                        <div class="form-group">
                                                            <label for="brand_model">Product Id<span
                                                            class="mark">*</span></label>
                                                            <input type="text" class="form-control requiredOL" id="brand_model"name="product_id" value="{{$order->spare_parts_id}}"readonly>
                                                            @if($errors->has('brand_model'))
                                                            <small class="text-danger"><i
                                                            class="fa fa-warning"></i>&nbsp;{{ $errors->first('brand_model') }}
                                                            </small>
                                                            @endif
                                                        </div>
                                                        {{-- product name --}}
                                                        <div class="form-group">
                                                            <label for="brand_model">Product Name<span
                                                            class="mark">*</span></label>
                                                            <input type="text" class="form-control requiredOL" id="brand_model"name="product_name" value="{{$order->SpareParts->spare_parts_name}}"readonly>
                                                            @if($errors->has('brand_model'))
                                                            <small class="text-danger"><i
                                                            class="fa fa-warning"></i>&nbsp;{{ $errors->first('brand_model') }}
                                                            </small>
                                                            @endif
                                                        </div>
                                                        {{-- order id --}}
                                                        <div class="form-group">
                                                            <label for="brand_model">Order Id<span
                                                            class="mark">*</span></label>
                                                            <input type="text" class="form-control requiredOL" id="brand_model"name="order_id"value="{{$order->spare_parts_orders_id}}" readonly>
                                                        </div>
                                                        {{-- delivered by --}}
                                                        <div class="form-group">
                                                            <label for="brand_model">Delivered By<span
                                                            class="mark">*</span></label>
                                                            <input type="text" class="form-control requiredOL" id="brand_model"name="delivered_by"value="{{$order->Delivery->delivery_by}}" readonly>
                                                        </div>
                                                        {{-- payment method --}}
                                                        <div class="form-group">
                                                            <label for="brand_model">Payment Method<span
                                                            class="mark">*</span></label>
                                                            <input type="text" class="form-control requiredOL" id="brand_model"name="payment_method"value="{{ $order->Delivery->payment_method }}" readonly>
                                                        </div>
                                                        
                                                        {{-- product price --}}
                                                        <div class="form-group">
                                                            <label for="product_price">Product Price<span
                                                            class="mark">*</span></label>
                                                            <input type="text" class="form-control reserve-form empty iconified" name="product_price" id="product_price" value="{{ $order->SpareParts->spare_parts_price }}" readonly>
                                                        </div>

                                                        {{-- delivery fee --}}
                                                        <div class="form-group">
                                                            <label for="delivery_fee">Delivery Fee<span
                                                            class="mark">*</span></label>
                                                            <input type="text" class="form-control reserve-form empty iconified" name="delivery_fee" id="delivery_fee" value="{{ $order->Delivery->delivery_fee }}" readonly>
                                                        </div>

                                                       

                                                        {{-- amount received by --}}
                                                        <div class="form-group">
                                                            <label for="confirmed_by">Confirmed By<span
                                                            class="mark">*</span></label>
                                                            <input type="text" class="form-control reserve-form empty iconified" name="confirmed_by" id="confirmed_by" value="{{ Auth::user()->name }}" readonly>
                                                        </div>

                                                         {{-- total amount --}}
                                                        <div class="form-group">
                                                            <label for="total_amount">Total Amount<span
                                                            class="mark">*</span></label>
                                                            <input type="text" class="form-control reserve-form empty iconified" name="total_amount" id="total_amount" value="{{ $order->SpareParts->spare_parts_price + $order->Delivery->delivery_fee }}" readonly>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="cash_received">Cash Received<span
                                                            class="mark">*</span></label>
                                                            <input type="number" class="form-control reserve-form empty iconified" name="cash_received" v-model="cash_received" id="cash_received">
                                                            @if($errors->has('cash_received'))
                                                            <small class="text-danger"><i
                                                            class="fa fa-warning"></i>&nbsp;{{ $errors->first('cash_received') }}
                                                            </small>
                                                            @endif
                                                        </div>
{{-- 
                                                        <input placeholder="Type here" type="text" > --}}

                                                        <div class="form-group">
                                                            <label for="due_price">Due</label>
                                                            <input type="text" class="form-control reserve-form empty iconified" v-model=due name="due_price" id="due_price">
                                                            @if($errors->has('due_price'))
                                                            <small class="text-danger"><i
                                                            class="fa fa-warning"></i>&nbsp;{{ $errors->first('due_price') }}
                                                            </small>
                                                            @endif
                                                        </div>
                                                        
                                                    </div>
                                                    <!-- /.card-body -->
                                                    <div class="card-footer">
                                                        <button type="submit" id="form-submit"  class="btn btn-outline-primary"><i class="fa fa-edit"></i>&nbsp; Submit Request</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    
                                        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

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
@section('script')
<script>
let vm = new Vue({
        el:'#app',
        data: {
        total_amount: '{{ $order->SpareParts->spare_parts_price + $order->Delivery->delivery_fee }}',
        cash_received: ''
        },
        computed: {
        due: function(){
        return this.total_amount - this.cash_received;
        },
            }
        })

</script>
@stop