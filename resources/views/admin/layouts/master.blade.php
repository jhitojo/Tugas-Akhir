<!DOCTYPE html>
<html>

@include('admin.layouts.head')

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- header -->
  @include('admin.layouts.header')
  <!-- End of header -->


  <!-- Sidebar -->
  @include('admin.layouts.sidebar')
  <!-- End of Sidebar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <!-- Begin Page Content -->
    @yield('main-content')
    <!-- /.container-fluid -->

  </div>
  <!-- /.content-wrapper -->
  
  <!-- footer -->
  @include('admin.layouts.footer')
  <!-- End of footer -->

</body>
</html>
