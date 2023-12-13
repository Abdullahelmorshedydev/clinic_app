<!DOCTYPE html>
<html lang="en">

@include('back.patient.layouts.head')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        @include('back.patient.layouts.preload')

        <!-- Navbar -->
        @include('back.patient.layouts.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('back.patient.layouts.sidebar')

        <!-- Content Wrapper. Contains page content -->
        @include('back.patient.layouts.content')
        <!-- /.content-wrapper -->
        @include('back.patient.layouts.footer')

        <!-- Control Sidebar -->
        @include('back.patient.layouts.aside')
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    @include('back.patient.layouts.script')
</body>

</html>