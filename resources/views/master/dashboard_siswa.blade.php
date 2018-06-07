<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MERACHEL | @yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ URL::asset('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ URL::asset('adminlte/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ URL::asset('adminlte/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ URL::asset('adminlte/bower_components/jvectormap/jquery-jvectormap.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ URL::asset('adminlte/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ URL::asset('adminlte/dist/css/skins/_all-skins.min.css')}}">
  <!--css saya-->
  <link rel="stylesheet" href="{{ URL::asset('css/mystyle.css') }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini fixed">
<div class="wrapper">

<!--Header-->
  <header class="main-header">
    <!-- Logo -->
    <a href="{{'/siswa'}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>M</b>CL</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>MERACHEL</b> </span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!--Message-->

          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <ul class="menu">
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="{{URL::asset('adminlte/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Admin
                        <small><i class="fa fa-clock-o"></i>5 mins</small>
                      </h4>
                      <p>nc</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="{{URL::asset('adminlte/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Guru
                        <small><i class="fa fa-clock-o"></i>10 mins</small>
                      </h4>
                      <p>besok libur</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>

          <!--Notifications-->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua">...</i>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i>...
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Notifications</a></li>
            </ul>
          </li>

          <!--User-->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{URL::asset('adminlte/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{Session::get('username')}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{URL::asset('adminlte/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">

                <p>
                  <small>Hai,</small>
                  {{Session::get('nama')}}
                </p>
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{'/siswa/profil'}}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{'/logout'}}" class="btn btn-default btn-flat">Logout</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
<!--/Header-->

<!--sidebar-->
<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
        <li><a href="{{'/siswa/paket'}}"><i class="fa fa-circle-o text-yellow"></i> <span>Pilih Paket</span></a></li>
        <li><a href="{{ '/siswa/absensi' }}"><i class="fa fa-circle-o text-aqua"></i> <span>Absensi</span></a></li>
        <li><a href="{{'/siswa/jadwal'}}"><i class="fa fa-circle-o text-aqua"></i> <span>Jadwal Kursus</span></a></li>
        <li><a href="{{'/siswa/nilai'}}"><i class="fa fa-circle-o text-aqua"></i> <span>Nilai Hasil Belajar</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Pembayaran</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Sertifikat</span></a></li>
        <li><a href="{{ '/siswa/testimoni' }}"><i class="fa fa-circle-o text-aqua"></i> <span>Testimoni</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

<!--/Sidebar-->

<!--Content-->
@yield('content')
<!--/Content-->

<!--Footer-->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2018 <a href="{{ '/' }}">by DnizTechno</a>.</strong> All rights
    reserved.
  </footer>
<!--/Footer-->

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{ URL::asset('adminlte/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ URL::asset('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ URL::asset('adminlte/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ URL::asset('adminlte/dist/js/adminlte.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{ URL::asset('adminlte/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap  -->
<script src="{{ URL::asset('adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{ URL::asset('adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- SlimScroll -->
<script src="{{ URL::asset('adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{ URL::asset('adminlte/bower_components/chart.js/Chart.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="{{ URL::asset('adminlte/dist/js/pages/dashboard2.js')}}"></script>-->
<!-- AdminLTE for demo purposes -->
<script src="{{ URL::asset('adminlte/dist/js/demo.js')}}"></script>

@yield('javascript')

</body>
</html>
