<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Onlin Hospital</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('admin')}}/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin')}}/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('admin')}}/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin')}}/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('admin')}}/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{asset('admin')}}/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{asset('admin')}}/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{asset('admin')}}/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('admin')}}/plugins/timepicker/bootstrap-timepicker.min.css">
  
  <link rel="stylesheet" href="{{asset('admin')}}/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{asset('admin')}}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

  <link rel="stylesheet" 
          href="{{asset('admin')}}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>


<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{ route('hospital.home') }}" class="logo">
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Onlin</b>Hospital</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
              @if(count($comments) > 0 )
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">{{$comments->count()}}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have {{$comments->count()}} commnts</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  @foreach($comments as $comment)
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <img src="/storage/cover_images/{{$comment->image}}" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        {{$comment->name}}
                        <small><i class="fa fa-clock-o"></i> {{$comment->created_at}}</small>
                      </h4>
                      <p>{{$comment->about}}</p>
                    </a>
                  </li>
    
                  @endforeach

                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
                  @endif
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">{{$count->count()}}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have {{$count->count()}} notifications</li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{asset('admin')}}/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{asset('admin')}}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  {{ Auth::user()->name }}
                  <small>Member since  .. {{ Auth::user()->created_at }}</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">

                  <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>

                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
    <!-- END nav -->







  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('admin')}}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{route('department.home')}}">
              <i class="fa fa-hospital-o"></i> Departments</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user-md"></i>
            <span>Doctors</span>
            <span class="pull-right-container">
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('doctor.home')}}"><i class="fa fa-circle-o"></i>Doctors</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Cusomers</span>
            <span class="pull-right-container">
              <i class="fa fa-user-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('customer.home')}}"><i class="fa fa-user-o"></i> Customer</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="far fa-envelope-open"></i>
            <span>News</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('new.home')}}"><i class="far fa-envelope-open"></i> General News</a></li>

          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dollar"></i>
            <span>Price</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('price.home')}}"><i class="fa fa-dollar"></i> Price</a></li>

          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <a href="{{route('hospital.home')}}">Hospital</a>
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$count->count()}}</h3>

              <p>Customers Reserved</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$comments->count()}}<sup style="font-size: 20px">%</sup></h3>

              <p>Comments Rate</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$count->count()}}</h3>

              <p>Customers E-mail</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{$count->count()}} <sup style="font-size: 20px">%</sup></h3>

              <p>Customers Comments</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->





        <main class="py-4">
            @yield('content')
        </main>



<!-- jQuery 3 -->
<script src="{{asset('admin')}}/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('admin')}}/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('admin')}}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="{{asset('admin')}}/bower_components/raphael/raphael.min.js"></script>
<script src="{{asset('admin')}}/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="{{asset('admin')}}/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="{{asset('admin')}}/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="{{asset('admin')}}/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('admin')}}/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{asset('admin')}}/bower_components/moment/min/moment.min.js"></script>
<script src="{{asset('admin')}}/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="{{asset('admin')}}/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<script src="{{asset('admin')}}/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{asset('admin')}}/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('admin')}}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="{{asset('admin')}}/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="{{asset('admin')}}/bower_components/fastclick/lib/fastclick.js"></script>
<script src="{{asset('admin')}}/plugins/timepicker/bootstrap-timepicker.min.js"></script>

<!-- AdminLTE App -->
<script src="{{asset('admin')}}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('admin')}}/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('admin')}}/dist/js/demo.js"></script>

<script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>

<script src="{{asset('admin')}}/bower_components/ckeditor/ckeditor.js"></script>


<script>
  $(function () {
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>


<script>
  
     $('#datepicker').datepicker({
      autoclose: true
    }) 

</script>

<script>
    $('.timepicker').timepicker({
      showInputs: false
    })
</script>

  @include('sweetalert::alert')

</body>
</html>


