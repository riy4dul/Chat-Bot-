@extends('layout.backend.index')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ URL::to('portal/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
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
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h2>Total Available - {{ $carBrandCount }} </h2>

                                <p>Brand</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-car"></i>
                            </div>
                            <a href="{{ URL::to('portal/systemSetting/brand/list') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h2>Total Available - {{ $brandModelCount }} </h2>

                                <p>Car Model</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-car"></i>
                            </div>
                            <a href="{{ URL::to('portal/brand/list') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h2>Total Available - {{ $sparePartsCount }} </h2>

                                <p>Spare Parts</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-cogs"></i>
                            </div>
                            <a href="{{ URL::to('portal/spare-parts/list') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    {{--<div class="col-lg-3 col-6">--}}
                        {{--<!-- small box -->--}}
                        {{--<div class="small-box bg-warning">--}}
                            {{--<div class="inner">--}}
                                {{--<h3>65</h3>--}}

                                {{--<p>Unique Visitors</p>--}}
                            {{--</div>--}}
                            {{--<div class="icon">--}}
                                {{--<i class="ion ion-pie-graph"></i>--}}
                            {{--</div>--}}
                            {{--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection