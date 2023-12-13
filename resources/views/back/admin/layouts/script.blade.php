<!-- jQuery -->
<script src="{{ asset('assets/back/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('assets/back/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/back/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('assets/back/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('assets/back/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('assets/back/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('assets/back/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('assets/back/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('assets/back/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('assets/back/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('assets/back/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
</script>
<!-- Summernote -->
<script src="{{ asset('assets/back/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('assets/back/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/back/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/back/dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('assets/back/dist/js/pages/dashboard.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

<script>
    $('.btn-delete').on('click', function(e) {
        e.preventDefault();
        var form = $(this).closest('form');

        var url = form.attr('action');
        var method = form.attr('method');
        swal({
            title: 'are you sure ?',
            icon: 'warning',
            buttons: ["no", "yes"],
        }).then(function(value) {
            if (value) {
                form.submit();
            }
        });
    });
</script>
@yield('script')
