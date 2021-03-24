<!DOCTYPE html>
<html>

@include('seller.layouts.head')

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- header -->
  @include('seller.layouts.header')
  <!-- End of header -->


  <!-- Sidebar -->
  @include('seller.layouts.sidebar')
  <!-- End of Sidebar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <!-- Begin Page Content -->
    @yield('main-content')
    <!-- /.container-fluid -->

  </div>
  <!-- /.content-wrapper -->
  
  <!-- footer -->
  @include('seller.layouts.footer')
  <!-- End of footer -->

</body>
</html>
