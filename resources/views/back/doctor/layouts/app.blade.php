<!DOCTYPE html>
<html lang="en">

@include('back.doctor.layouts.head')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        @include('back.doctor.layouts.preload')

        <!-- Navbar -->
        @include('back.doctor.layouts.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('back.doctor.layouts.sidebar')

        <!-- Content Wrapper. Contains page content -->
        @include('back.doctor.layouts.content')
        <!-- /.content-wrapper -->
        @include('back.doctor.layouts.footer')

        <!-- Control Sidebar -->
        @include('back.doctor.layouts.aside')
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    @include('back.doctor.layouts.script')
</body>

</html>