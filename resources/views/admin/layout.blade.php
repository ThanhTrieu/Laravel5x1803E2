 <!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SB Admin - Dashboard</title>

    <!-- Bootstrap core CSS-->
    <link href="{{ asset('css/admin/bootstrap.css') }}" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="{{ asset('css/admin/all.min.css') }}" type="text/css">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/admin/sb-admin.min.css') }}" rel="stylesheet">

    <script src="{{ asset('js/admin/jquery-3.3.1.min.js') }}"></script>

    <script type="text/javascript">
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
    </script>
  </head>

  <body id="page-top">
    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
      <a class="navbar-brand mr-1" href="index.html">
        Admin Pages : <span>{{ Session::get('username') }}</span>
      </a>

    </nav>
    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="#">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="fas fa-fw fa-folder"></i>
            <span>Proructs</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.manufacture') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Manufactures</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="fas fa-fw fa-table"></i>
            <span>Systems</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="fas fa-fw fa-table"></i>
            <span>Categories</span></a>
        </li>
        <li class="nav-item">
          <form action="{{ route('admin.logout') }}" method="post">
            @csrf
            <button class="btn btn-block btn-info text-left" type="submit">
              Logout
            </button>
          </form>
        </li>
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">
          @yield('content')
        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Your Website 2018</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('js/admin/bootstrap.min.js') }}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/admin/sb-admin.min.js') }}"></script>
  </body>

</html>
