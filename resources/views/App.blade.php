
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>CMS</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="http://project-cms.test/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="http://project-cms.test/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="http://project-cms.test/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="http://project-cms.test/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="http://project-cms.test/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="http://project-cms.test/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="http://project-cms.test/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="http://project-cms.test/plugins/summernote/summernote-bs4.min.css">
 <!-- -->
 <link rel="stylesheet" type="text/css" href="{{asset('css/styles.css')}}">
 
 @yield('css')

</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">




    @include('sections.Navbar')

    @include('sections.Aside')

    @yield('content')




  </div>

  <!-- ./wrapper -->





  <!-- jQuery -->
  <script src="http://project-cms.test/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="http://project-cms.test/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Sparkline -->
  <script src="http://project-cms.test/plugins/sparklines/sparkline.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Bootstrap 4 -->
  <script src="http://project-cms.test/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="http://project-cms.test/plugins/chart.js/Chart.min.js"></script>


  <!-- jQuery Knob Chart -->
  <script src="http://project-cms.test/plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="http://project-cms.test/plugins/moment/moment.min.js"></script>
  <script src="http://project-cms.test/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="http://project-cms.test/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="http://project-cms.test/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="http://project-cms.test/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="http://project-cms.test/dist/js/adminlte.js"></script>
  
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="http://project-cms.test/dist/js/pages/dashboard.js"></script>
  <script type="text/javascript" src="http://project-cms.test/js/jquery.validate.js"></script>


  @yield('scripts')
</body>
</html>