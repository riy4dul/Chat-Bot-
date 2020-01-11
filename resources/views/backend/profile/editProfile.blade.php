@extends('layout.backend.index')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Profile Setting</h1>
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
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header" style="background-color: #dc3545; color: #ffffff;">
                                <h3 class="card-title">Update Profile</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="col-6">
                                    <form role="form" method="POST" action="{{ URL::to('portal/profile/update') }}"
                                          enctype="multipart/form-data" id="brand-form">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                <label for="name">Name<span
                                                            class="mark">*</span></label>
                                                <input type="text" class="form-control requiredOL" id="name"
                                                       name="name"
                                                       placeholder="Enter name" value="{{ $data->name }}">
                                                @if($errors->has('name'))
                                                    <small class="text-danger"><i
                                                                class="fa fa-warning"></i>&nbsp;{{ $errors->first('name') }}
                                                    </small>
                                                @endif
                                            </div>
                                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                <label for="email">Email<span
                                                            class="mark">*</span></label>
                                                <input type="text" class="form-control requiredOL" id="email"
                                                       name="email"
                                                       placeholder="Enter email" value="{{ $data->email }}">
                                                @if($errors->has('email'))
                                                    <small class="text-danger"><i
                                                                class="fa fa-warning"></i>&nbsp;{{ $errors->first('email') }}
                                                    </small>
                                                @endif
                                            </div>
                                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                                <label for="phone">Phone Number<span
                                                            class="mark">*</span></label>
                                                <input type="text" class="form-control requiredOL" id="phone"
                                                       name="phone"
                                                       placeholder="Enter phone number" maxlength="13"
                                                       value="{{ $data->phone }}"
                                                       onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                                @if($errors->has('phone'))
                                                    <small class="text-danger"><i
                                                                class="fa fa-warning"></i>&nbsp;{{ $errors->first('phone') }}
                                                    </small>
                                                @endif
                                            </div>
                                            <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                                <label for="image">Image<span
                                                            class="mark">*</span></label>
                                                @if(!empty($data->image))
                                                    <img style="margin-bottom: 5px" class="img-responsive img-rounded"
                                                         id="uploadPreview" width="300px" height="300px"
                                                         src="{{ asset('backend/img/users_image/' . $data->image )}}"/>
                                                @else
                                                    <img style="margin-bottom: 5px" class="img-responsive img-rounded"
                                                         id="uploadPreview" width="200px" height="200px"
                                                         src="{{ asset('backend/img/bots.png' )}}"/>
                                                @endif
                                                <input type="file" class="form-control requiredOL image" name="image"
                                                       id="uploadImage" onchange="PreviewImage();">
                                                <p class="help-block oError" style="color: red;margin-bottom: 0"></p>
                                                @if($errors->has('image'))
                                                    <small class="text-danger"><i
                                                                class="fa fa-warning"></i>&nbsp;{{ $errors->first('image') }}
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

//                For award image

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
    <script type="text/javascript">

        function PreviewImage() {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

            oFReader.onload = function (oFREvent) {
                document.getElementById("uploadPreview").src = oFREvent.target.result;
            };
        }
        ;

    </script>
@stop
