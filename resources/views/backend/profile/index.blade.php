@extends('layout.backend.index')
@section('content')
    <style>
        ul li {
            list-style-type: none;
        }

        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }
    </style>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Profile</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ URL::to('portal/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Profile</li>
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
                    <div class="col-md-4 offset-4">
                        <!-- Widget: user widget style 1 -->
                        <div class="card card-widget widget-user">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header bg-info-active">
                                <h3 class="widget-user-username">{{ Auth::user()->name }}</h3>
                                <h5 class="widget-user-desc">{{ Auth::user()->type }}</h5>
                            </div>
                            <div class="widget-user-image">
                                @if(empty(Auth::user()->image))
                                    <img class="img-circle elevation-2" src="{{ asset('backend/img/bots.png') }}"
                                         style="width: 150px;"
                                         alt="User Avatar">
                                @else
                                    <a href="javascript:void(0);"
                                       data-toggle="modal" data-target="#changeProfile{{ Auth::user()->id }}"><img
                                                class="img-circle elevation-2"
                                                src="{{ asset('backend/img/users_image/' . $data->image )}}"
                                                style="width: 150px;" title="Click me to change profile picture"
                                                alt="User Avatar"></a>
                                @endif
                            </div>
                            <div class="card-footer" style="padding-top: 100px;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="description-block">
                                            <h5 class="description-header" style="font-weight: normal"><span
                                                        style="font-weight: bold">Email:</span>
                                                &nbsp;{{ Auth::user()->email }}</h5>
                                            <h5 class="description-header" style="font-weight: normal"><span
                                                        style="font-weight: bold">Phone:</span>
                                                &nbsp;{{ Auth::user()->phone }}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="description-block" style="text-align: center">
                                            <a class="btn btn-outline-primary"
                                               href="{{ URL::to('portal/profile/editProfile')}}"> <i
                                                        class="fa fa-edit"></i>&nbsp;Update
                                                Profile</a>&nbsp;
                                            <a class="btn btn-outline-primary"
                                               href="{{ URL::to('portal/profile/editPassword')}}"> <i
                                                        class="fa fa-edit"></i>&nbsp;Update Password</a>&nbsp;
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </div>
                        </div>
                        <!-- /.widget-user -->
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
    </div>
    <!-- profile picture change -->
    <div class="modal fade" id="changeProfile{{ Auth::user()->id }}" tabindex="-1"
         role="dialog"
         aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header"
                     style="background: #dc3545 !important;">
                    <h5 class="modal-title" id="exampleModalLabel"
                        style="color: #fff;text-align: center;">Profile Picture Update</h5>
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ URL::to('portal/profile/picture-update') }}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <div class="modal-body">
                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                            <img style="margin-bottom: 5px;text-align: center" class="img-circle elevation-2 center"
                                 id="uploadPreview" src="{{ asset('backend/img/users_image/' . $data->image )}}"/>
                            <input type="file" class="form-control requiredOL image" name="image" id="uploadImage"
                                   onchange="PreviewImage();">
                            <p class="help-block oError" style="color: red;margin-bottom: 0"></p>
                            @if($errors->has('image'))
                                <small class="text-danger"><i
                                            class="fa fa-warning"></i>&nbsp;{{ $errors->first('image') }}</small>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-success"><i class="fa fa-check"></i>&nbsp;Save
                            changes
                        </button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Close
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!-- End modal -->
@endsection
@section('script')
    <script type="text/javascript">

        function PreviewImage() {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

            oFReader.onload = function (oFREvent) {
                document.getElementById("uploadPreview").src = oFREvent.target.result;
            };
        };

        function PreviewImage_1() {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("uploadImage_1").files[0]);

            oFReader.onload = function (oFREvent) {
                document.getElementById("uploadPreview_1").src = oFREvent.target.result;
            };
        };

    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            var maxSize = '2048';
            var _validFileExtensions = [];
            var imgExtensions = [".jpg", ".jpeg", ".JPG", ".JPEG", ".png", "PNG"];
            var fileExtensions = [".jpg", ".jpeg", ".JPG", ".JPEG", ".png", "PNG"];

            function validateSingleInput(oInput) {
                if (oInput.type == "file") {
                    var sFileName = oInput.value;
                    if (sFileName.length > 0) {
                        if (oInput.className.match(/\bonlyImg\b/)) {
                            _validFileExtensions = imgExtensions;
                        } else {
                            _validFileExtensions = fileExtensions;
                        }
                        var blnValid = false;
                        for (var j = 0; j < _validFileExtensions.length; j++) {
                            var sCurExtension = _validFileExtensions[j];
                            if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                                blnValid = true;
                                break;
                            }
                        }
                        if (!blnValid) {
                            oInput.value = "";
                            return false;
                        }
                    }
                }
                return true;
            }

            function fileSizeValidate(fdata) {
                if (fdata.files && fdata.files[0]) {
                    var fsize = fdata.files[0].size / 1024;
                    if (fsize > maxSize) {
                        fdata.value = "";
                        return false;
                    } else {
                        return true;
                    }
                }
            }

//                For profile image

            $(document).on("change", ".image", function () {
                var noExtentionError = validateSingleInput(this);
                var noSizeError = fileSizeValidate(this);
                if (noExtentionError === false) {
                    $(this).siblings(".oError").show().text("Image must be JPG, JPEG, PNG, format.");
                    return false;
                } else {
                    $(this).siblings(".oError").hide();
                    if (noSizeError === false) {
                        $(this).siblings(".oError").show().text("Image must be less then 2 MB. ");
                        return false;
                    } else {
                        $(this).siblings(".oError").hide();
                    }
                }
            });
        });
    </script>
@stop