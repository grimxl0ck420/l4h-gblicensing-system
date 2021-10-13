<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{site_name()}} | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
    <!-- Editor -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.2.0/skins/content/default/content.min.css">

  
  <!-- Daterange picker -->
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="{{asset('css/dataTables.checkboxes.css')}}">

  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
   
    </ul>

 
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
      <span class="brand-text font-weight-light ml-5">{{site_name()}} </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         <li class="nav-item">
          <a href="{{route('home')}}" class="nav-link  @if(\Request::is('admin')    ) active  @endif">
              <i class="nav-icon fas fa-home text-secondary"></i>
              <p class="text">Dashboard</p>
            </a>
          </li>
        
       

          <li class="nav-item has-treeview @if( \Request::is('admin/virtualserver/*') || Request::is('admin/virtualserver') || \Request::is('admin/license/*') || Request::is('admin/license') || \Request::is('admin/server/*') || Request::is('admin/server') || \Request::is('admin/proxy/*') || Request::is('admin/proxy') || \Request::is('admin/software/*') || Request::is('admin/software')  ) menu-open @endif">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-sticky-note"></i>
              <p>
                License System
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: @if(\Request::is('admin/virtualserver/*') || Request::is('admin/virtualserver') || \Request::is('admin/license/*') || Request::is('admin/license') || \Request::is('admin/server/*') || Request::is('admin/server') || \Request::is('admin/proxy/*') || Request::is('admin/proxy') || \Request::is('admin/software/*') || Request::is('admin/software') ) block @else none @endif;">
           
       
            <li class="nav-item">
          <a href="{{route('licenses')}}" class="nav-link  @if(\Request::is('admin/license/*') || Request::is('admin/license') ) active @endif">
              <i class="nav-icon fas fa-ticket-alt text-secondary"></i>
              <p class="text">Licenses</p>
            </a>
          </li>
          <li class="nav-item">
          <a href="{{route('servers')}}" class="nav-link  @if(\Request::is('admin/server/*') || Request::is('admin/server') ) active @endif">
              <i class="nav-icon fa fa-server text-info"></i>
              <p>Servers</p>
            </a>
          </li>
          <li class="nav-item">
          <a href="{{route('proxies')}}" class="nav-link  @if(\Request::is('admin/proxy/*') || Request::is('admin/proxy') ) active @endif">
              <i class="nav-icon fa fa-desktop text-danger"></i>
              <p>Proxies</p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="{{route('softwares')}}" class="nav-link  @if(\Request::is('admin/software/*') || Request::is('admin/software') ) active @endif">
              <i class="nav-icon fas fa-mobile text-warning"></i>
              <p>Softwares</p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="{{route('virtualserver')}}" class="nav-link  @if(\Request::is('admin/virtualserver/*') || Request::is('admin/virtualserver') ) active @endif">
              <i class="nav-icon fas fa-server text-warning"></i>
              <p>Virtual Servers</p>
            </a>
          </li>


            </ul>
          </li>
          
          <li class="nav-item has-treeview @if(\Request::is('admin/reseller/*') || Request::is('admin/reseller') || \Request::is('admin/level/*') || Request::is('admin/level') ) menu-open @endif">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-portrait"></i>
              <p>
                Resellers System
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: @if(\Request::is('admin/reseller/*') || Request::is('admin/reseller') || \Request::is('admin/level/*') || Request::is('admin/level') ) block @else none @endif;">
           
       

              <li class="nav-item ">
            <a href="{{route('resellers')}}" class="nav-link  @if(\Request::is('admin/reseller/*') || Request::is('admin/reseller') ) active @endif">
              <i class="nav-icon fas fa-user-friends text-secondary"></i>
              <p>Resellers</p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="{{route('levels')}}" class="nav-link  @if(\Request::is('admin/level/*') || Request::is('admin/level') ) active @endif">
              <i class="nav-icon fas fa-level-up-alt text-warning"></i>
              <p>Reseller Levels</p>
            </a>
          </li>


            </ul>
          </li>

          <li class="nav-item has-treeview @if(\Request::is('admin/blacklist/*') || Request::is('admin/blacklist') || \Request::is('admin/whitelist/*') || Request::is('admin/whitelist') ) menu-open @endif">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-door-open"></i>
              <p>
                Firewall System
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: @if(\Request::is('admin/blacklist/*') || Request::is('admin/blacklist') || \Request::is('admin/whitelist/*') || Request::is('admin/whitelist') ) block @else none @endif;">
           
       

              <li class="nav-item ">
            <a href="{{route('whitelist')}}" class="nav-link  @if(\Request::is('admin/whitelist/*') || Request::is('admin/whitelist') ) active @endif">
              <i class="nav-icon fas fa-check-circle text-secondary"></i>
              <p>Whitelist</p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="{{route('blacklist')}}" class="nav-link  @if(\Request::is('admin/blacklist/*') || Request::is('admin/blacklist') ) active @endif">
              <i class="nav-icon fas fa-ban text-warning"></i>
              <p>Blacklist</p>
            </a>
          </li>


            </ul>
          </li>
          <li class="nav-item has-treeview  @if(\Request::is('admin/logs') || \Request::is('admin/api/*') ||  Request::is('admin/api') || \Request::is('admin/buyer/*') || Request::is('admin/buyer') || \Request::is('admin/message/*') || Request::is('admin/message') || Request::is('admin/settings')  ) menu-open @endif">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-sliders-h"></i>
              <p>
                Settings System
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview"  style="display: @if(\Request::is('admin/logs') || \Request::is('admin/buyer/*') || Request::is('admin/buyer') || \Request::is('admin/api/*') || Request::is('admin/api') || \Request::is('admin/message/*') || Request::is('admin/message') || Request::is('admin/settings')   ) block @else none @endif;" >
           
            <li class="nav-item">
          <a href="{{route('setting.view')}}" class="nav-link  @if(\Request::is('admin/settings/*') || Request::is('admin/settings') ) active @endif">
              <i class="nav-icon fas fa-cogs text-secondary"></i>
              <p>General Settings</p>
            </a>
          </li>
          <li class="nav-item">
          <a href="{{route('buyer')}}" class="nav-link  @if(\Request::is('admin/buyer/*') || Request::is('admin/buyer') ) active @endif">
              <i class="nav-icon fas fa-search-dollar text-primary"></i>
              <p>Buyers</p>
            </a>
          </li>
    

          <li class="nav-item">
          <a href="{{route('api.view')}}" class="nav-link  @if(\Request::is('admin/api/*') || Request::is('admin/api') ) active @endif">
              <i class="nav-icon fas fa-angle-double-up text-warning"></i>
              <p>Api Settings</p>
            </a>
          </li>
            <li class="nav-item">
          <a href="{{route('message.index')}}" class="nav-link  @if(\Request::is('admin/message/*') || Request::is('admin/message') ) active @endif">
              <i class="nav-icon fas fa-envelope text-info"></i>
              <p>Message</p>
            </a>
          </li>
           
         
          <li class="nav-item">
          <a href="{{route('profile')}}" class="nav-link  @if(\Request::is('admin/profile') ) active @endif">
              <i class="nav-icon fas fa-scroll text-danger"></i>
              <p>Profile</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('logout')}}" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt text-warning"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

@yield('content')

          
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2019-2020 <a href="https://license4host.com">License4Host</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 4
    </div>
  </footer>


<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Select2 -->


<!-- ChartJS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- Editor -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.2.0/tinymce.min.js"></script>

<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
<script src="{{asset('plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-input-spinner@1.13.3/src/bootstrap-input-spinner.min.js"></script>
<script src="{{asset('js/dataTables.checkboxes.min.js')}}"></script>
<script src="{{asset('js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('js/select2.full.min.js')}}"></script>


<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>

@yield('endfooter')
</body>
</html>
