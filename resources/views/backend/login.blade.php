<?php
echo header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
echo header("Cache-Control: post-check=0, pre-check=0", false);
echo header("Pragma: no-cache");
echo header('Content-Type: text/html');
?>
        <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bot Man | Login</title>
    <link rel="stylesheet" href="{{ asset('backend/css/adminlte.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/toastr.css') }}">

    <script src="{{ asset('backend/js/jquery.min.js')}}"></script>
    <script src="{{ asset('backend/js/bootstrap.js')}}"></script>
    <script src="{{ asset('backend/js/toastr.min.js')}}"></script>
    <style>
        @media (min-width: 768px) {
            .omb_row-sm-offset-3 div:first-child[class*="col-"] {
                margin-left: 25%;
            }
        }

        .omb_login .omb_authTitle {
            text-align: center;
            line-height: 300%;
        }

        .omb_logo {
            text-align: center;
        }

        .omb_login .omb_socialButtons a {
            color: white;
            opacity: 0.9;
        }

        .omb_login .omb_socialButtons a:hover {
            color: white;
            opacity: 1;
        }

        .omb_login .omb_socialButtons .omb_btn-facebook {
            background: #3b5998;
        }

        .omb_login .omb_socialButtons .omb_btn-twitter {
            background: #00aced;
        }

        .omb_login .omb_socialButtons .omb_btn-google {
            background: #c32f10;
        }

        .omb_login .omb_loginOr {
            position: relative;
            font-size: 1.5em;
            color: #aaa;
            margin-top: 1em;
            margin-bottom: 1em;
            padding-top: 0.5em;
            padding-bottom: 0.5em;
        }

        .omb_login .omb_loginOr .omb_hrOr {
            background-color: #cdcdcd;
            height: 1px;
            margin-top: 0px !important;
            margin-bottom: 0px !important;
        }

        .omb_login .omb_loginOr .omb_spanOr {
            display: block;
            position: absolute;
            left: 50%;
            top: -0.6em;
            margin-left: -1.5em;
            background-color: white;
            width: 3em;
            text-align: center;
        }

        .omb_login .omb_loginForm .input-group.i {
            width: 2em;
        }

        .omb_login .omb_loginForm .help-block {
            color: red;
        }

        @media (min-width: 768px) {
            .omb_login .omb_forgotPwd {
                text-align: right;
                margin-top: 10px;
            }
        }

        #particles {
            width: 100%;
            height: 100%;
            overflow: hidden;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            position: absolute;
            z-index: -2;
        }

        body {
            margin: 0;
            padding: 0;
        }

        canvas {
            background: white;
            width: 100%;
            height: 100%;
            overflow: hidden;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            position: absolute;
            z-index: -2;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="omb_login" style="margin-top: 150px;">
        <div class="omb_logo">
            <img src="{{ asset('backend/img/bots - login.png') }}" class="img-circle elevation-2" alt="">
        </div>
        <h3 class="omb_authTitle">Bot Man Login</h3>
        <div class="row omb_row-sm-offset-3">
            <div class="col-xs-12 col-sm-6">
                <form class="omb_loginForm" action="{{ url('login')}}" autocomplete="off" method="POST">
                    @csrf
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control requiredOL email" name="email" id="email"
                                   placeholder="Enter email" aria-label="email" required
                                   aria-describedby="basic-addon1">
                        </div>
                        @if($errors->has('email'))
                            <small class="text-danger error-email"><i
                                        class="fa fa-warning"></i>&nbsp;{{ $errors->first('email') }}</small>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2"><i class="fa fa-lock"></i></span>
                            </div>
                            <input type="password" class="form-control requiredOL password" name="password"
                                   id="password" placeholder="Password" required aria-label="password"
                                   aria-describedby="basic-addon2">
                        </div>
                        @if($errors->has('password'))
                            <small class="text-danger error-password"><i
                                        class="fa fa-warning"></i>&nbsp;{{ $errors->first('password') }}</small>
                        @endif
                    </div>
                    <button type="submit" id="form-submit" disabled="disabled"
                            class="btn btn-lg btn-primary btn-block toggle-disabled">
                        Login
                    </button>
                </form>
            </div>
        </div>
        <div class="row omb_row-sm-offset-3">
            <div class="col-xs-12 col-sm-3"></div>
            <div class="col-xs-12 col-sm-3">
                <p class="omb_forgotPwd">
                    <a href="#">Forgot password?</a>
                </p>
            </div>
        </div>
    </div>
</div>
<div id="particles"></div>
<!--        <canvas id="myCanvas"></canvas>-->
<div class="clearfix"></div>
@include('layout/backend/loginScript')
<script>
    $(document).on('change keyup', '.requiredOL', function (e) {
        let Disabled = true;
        $(".requiredOL").each(function () {
            let value = this.value
            if ((value) && (value.trim() != '')) {
                Disabled = false
            } else {
                Disabled = true
                return false
            }
        });

        if (Disabled) {
            $('.toggle-disabled').prop("disabled", true);
        } else {
            $('.toggle-disabled').prop("disabled", false);
        }
    })
</script>
</body>
</html>