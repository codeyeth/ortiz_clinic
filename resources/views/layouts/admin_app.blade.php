<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset ('/admin_template/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset ('/admin_template/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset ('/admin_template/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset ('/admin_template/bower_components/jvectormap/jquery-jvectormap.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset ('/admin_template/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset ('/admin_template/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset ('/admin_template/dist/css/skins/_all-skins.min.css')}}">
    <link rel="stylesheet" href="{{ asset ('/admin_template/plugins/iCheck/all.css') }}">
    
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      
      <!-- Icon -->
      <link rel="shortcut icon" href="/template/img/image.png">
      
      <!-- Google Font -->
      <link rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
      
      @livewireStyles
      
    </head>
    <body class="hold-transition skin-black-light sidebar-mini">
      <div class="wrapper">
        
        @include('inc.admin_navbar')
        
        @include('inc.admin_sidebar')        
        
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          
          @include('inc.breadcrumb')        
          
          <section class="content">
            
            <div class="row">
              @yield('content')
            </div>
            
          </div>
        </div>
        <!-- /.content-wrapper -->
        
        <footer class="main-footer">
          <div class="pull-right hidden-xs" hidden>
            <b>Version</b> 1.0.0
          </div>
          <strong>Copyright &copy; 2021 <a href="">Ortiz Medical Skin Clinic</a>.</strong> All rights
          reserved.
        </footer>
        
        
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
          <!-- Create the tabs -->
          <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
          </ul>
          <!-- Tab panes -->
          <div class="tab-content">
            <!-- Home tab content -->
            
            <div class="tab-pane" id="control-sidebar-home-tab">
            </div>
            <!-- /.tab-pane -->
            
            <div class="tab-pane" id="control-sidebar-settings-tab">
            </div>
            
          </div>
        </aside>
        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
          immediately after the control sidebar -->
          <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->
        
        @livewireScripts
        
        <script>
          //APPOINTMENT SUCCESS CLOSE THE ALERT IN 3 SECONDS
          Livewire.on('testimonialSuccess', e => {
              setTimeout(function(){ 
                  $(".alert").alert('close')
              }, 3000);
          })
      </script>
        
        <!-- jQuery 3 -->
        <script src="{{ asset ('/admin_template/bower_components/jquery/dist/jquery.min.js')}}"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="{{ asset ('/admin_template/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
        <!-- FastClick -->
        <script src="{{ asset ('/admin_template/bower_components/fastclick/lib/fastclick.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset ('/admin_template/dist/js/adminlte.min.js')}}"></script>
        <!-- Sparkline -->
        <script src="{{ asset ('/admin_template/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
        <!-- jvectormap  -->
        <script src="{{ asset ('/admin_template/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
        <script src="{{ asset ('/admin_template/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
        <!-- SlimScroll -->
        <script src="{{ asset ('/admin_template/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
        <!-- ChartJS -->
        <script src="{{ asset ('/admin_template/bower_components/chart.js/Chart.js')}}"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{ asset ('/admin_template/dist/js/pages/dashboard2.js')}}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{ asset ('/admin_template/dist/js/demo.js')}}"></script>
        <!-- DataTables -->
        <script src="{{ asset ('/admin_template/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{ asset ('/admin_template/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
        
        <script src="{{ asset ('/admin_template/plugins/iCheck/icheck.min.js') }}"></script>
        
        <!-- page script -->
        <script>
          $(function () {
            $('#example1').DataTable()
            /*
            $('#example1').DataTable({
              'paging'      : true,
              'lengthChange': false,
              'searching'   : false,
              'ordering'    : true,
              'info'        : true,
              'autoWidth'   : false
            })
            */
          })
        </script>
        
        {{-- <script>
          $(function () {
            $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
              checkboxClass: 'icheckbox_minimal-blue',
              radioClass   : 'iradio_minimal-blue'
            })
          })
        </script> --}}
        
      </body>
      </html>
      