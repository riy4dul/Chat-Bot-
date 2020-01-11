<!-- jQuery -->
<script src="{{ asset('backend/js/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('backend/js/bootstrap.bundle.min.js') }}"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{ asset('backend/js/morris.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('backend/js/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('backend/js/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('backend/js/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('backend/js/jquery.knob.js') }}"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="{{ asset('backend/js/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('backend/js/bootstrap-datepicker.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('backend/js/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('backend/js/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('backend/js/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('backend/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('backend/js/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('backend/js/demo.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('backend/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('backend/js/dataTables.bootstrap4.js') }}"></script>
<!-- CK Editor -->
<script src="{{ asset('backend/js/ckeditor.js') }}"></script>
<!-- Toastr js -->
<script src="{{ asset('backend/js/toastr.min.js') }}"></script>
<!-- fence box js -->
<script src="{{ asset('backend/js/jquery.fancybox.pack.js') }}"></script>
<!-- Date time picker js-->
<script src="{{ asset('backend/js/bootstrap-datetimepicker.min.js') }}"></script>
{{--vue js--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.17/vue.js"></script>--}}

<!-- toaster js -->
<script>
            @if (Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch (type) {
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
</script>

<script>
    $(function () {
        $('#datetimepicker1').datetimepicker({
            format: "dd MM yyyy - HH:11 P",
            showMeridian: true,
            autoclose: true,
            todayBtn: true
        });
    })
</script>


{{--<script>--}}
{{--$(document).ready(function () {--}}
{{--$("#form-submit").click(function () {--}}
{{--var status = 0;--}}
{{--if ($("#brand_name").val() === '') {--}}
{{--status++;--}}
{{--$("#brand_name").css("borderColor", "red");--}}
{{--} else {--}}
{{--$("#brand_name").css("borderColor", "#ccc");--}}
{{--}--}}

{{--if ($("#brand_model").val() === '') {--}}
{{--status++;--}}
{{--$("#brand_model").css("borderColor", "red");--}}
{{--} else {--}}
{{--$("#brand_model").css("borderColor", "#ccc");--}}
{{--}--}}

{{--if ($("#brand_price").val() === '') {--}}
{{--status++;--}}
{{--$("#brand_price").css("borderColor", "red");--}}
{{--} else {--}}
{{--$("#brand_price").css("borderColor", "#ccc");--}}
{{--}--}}

{{--if ($("#brand_image_link").val() === '') {--}}
{{--status++;--}}
{{--$("#brand_image_link").css("borderColor", "red");--}}
{{--} else {--}}
{{--$("#brand_image_link").css("borderColor", "#ccc");--}}
{{--}--}}

{{--if ($("#brand_description").val() === '') {--}}
{{--status++;--}}
{{--$("#brand_description").css("borderColor", "red");--}}
{{--} else {--}}
{{--$("#brand_description").css("borderColor", "#ccc");--}}
{{--}--}}
{{--if ($("#brand_specifications").val() === '') {--}}
{{--status++;--}}
{{--$("#brand_specifications").css("borderColor", "red");--}}
{{--} else {--}}
{{--$("#brand_specifications").css("borderColor", "#ccc");--}}
{{--}--}}

{{--if (status === 0) {--}}
{{--$("#brand-form").submit();--}}
{{--}--}}
{{--});--}}
{{--});--}}
{{--</script>--}}
