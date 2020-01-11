<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bot Man | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('layout/backend/headerScript')
    <style>
        .modal, .modal-open {
            overflow: auto;
        }
        body {
            padding-right: 0 !important;
            margin: 0 auto !important;
        }
        html {
            overflow-y: scroll !important;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
    @include('layout/backend/header')
    <!-- END Navbar -->
    <!-- Main Sidebar Container -->
    @include('layout/backend/sidebar')
    <!-- END Main Sidebar Container -->

    @yield('content')

    <!-- Footer-content -->
    @include('layout/backend/footer')
    <!-- End Footer-content -->
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
    <!-- Footer Script Js -->
    @include('layout/backend/footerScript')
    <!-- Footer Script Js -->
    @yield('script')
</body>
</html>
