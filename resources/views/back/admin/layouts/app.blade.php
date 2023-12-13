<!DOCTYPE html>
<html lang="en">

@include('back.admin.layouts.head')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        @include('back.admin.layouts.preload')

        <!-- Navbar -->
        @include('back.admin.layouts.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('back.admin.layouts.sidebar')

        <!-- Content Wrapper. Contains page content -->
        @include('back.admin.layouts.content')
        <!-- /.content-wrapper -->
        @include('back.admin.layouts.footer')

        <!-- Control Sidebar -->
        @include('back.admin.layouts.aside')
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    @include('back.admin.layouts.script')
</body>

</html>