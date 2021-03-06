<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Case Report</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.css"/>
    <!-- Theme style -->
    <link rel="stylesheet" href="/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{route('home')}}" class="nav-link">Home</a>
            </li>

            <!-- split buttons box -->
            <div class="card">
                <!-- Split button -->
                <div class="btn-group">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                            {{ session()->has('Project_id') ? \App\Project::find(session()->get('Project_id'))->Project_Title : 'Project'}}
                            <span class="caret"></span>
                        </a>
                        <span class="sr-only">Toggle Dropdown</span>
                        <div class="dropdown-menu" role="menu">
                            @foreach (getProjects() as $record)
                                <a class="dropdown-item"
                                   href="{{route('selectProject', $record->id)}}">{{$record->Project_Title}}</a>
                            @endforeach
                            <div class="dropdown-divider"></div>
                            <a href="{{route('ProjectReport')}}" class="dropdown-item">See All</a>
                        </div>
                    </li>
                </div>
            </div>
        </ul>
    </nav>
</div>


<!-- SEARCH FORM -->
{{--    <form class="form-inline ml-3">--}}
{{--      <div class="input-group input-group-sm">--}}
{{--        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">--}}
{{--        <div class="input-group-append">--}}
{{--          <button class="btn btn-navbar" type="submit">--}}
{{--            <i class="fas fa-search"></i>--}}
{{--          </button>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </form>--}}
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">

        <span class="brand-text font-weight-light">Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="{{route('home')}}" class="d-block">{{Auth::User()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('ProjectReport')}}" class="nav-link">
                        <i class="far fa-file nav-icon"></i>
                        <p>Projects</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('report')}}" class="nav-link">
                        <i class="far fa-file nav-icon"></i>
                        <p>Module Report</p>
                    </a>
                </li>
                @if(auth()->user()->role == 'admin')
                    <li class="nav-item">
                        <a href="{{route('register')}}" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>Register</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('profile')}}" class="nav-link">
                            <i class="far fa-address-book nav-icon"></i>
                            <p>Data User</p>
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-times"></i>
                        <p>Logout</p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Case Report</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Case Report</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <!-- /.card-header -->

                            @if(auth()->user()->role == 'admin')

                                <div class="pull-right">
                                    <a href="{{route('case', $module_id)}}" class="btn btn-primary btn-sm"> <i
                                            class="fa fa-plus"></i> Add New Case</a> </a>
                                    <a href="{{route('trashCase', $module_id)}}" class="btn btn-primary btn-sm"> <i
                                            class="fa fa-trash"></i> Recycle Bin</a> </a>
                                </div>

                            @endif


                            <form method="POST" action="{{route('postReport')}}">
                                @csrf
                            </form>

                            <div class="card-body">
                                <table id="report" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Modul Name</th>
                                        <th>Case Name</th>
                                        <th>Bug Priotity</th>
                                        <th>Bug Status</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.0.5
    </div>
    <strong>Copyright &copy; 2019-2020 <a href="#"></strong> All rights
    reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.js"></script>
<!-- AdminLTE App -->
<script src="/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/js/demo.js"></script>
<!-- page script -->
<script>
    $().ready(function () {
        $("#report").DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "{{route('report.getReportCase', $module_id)}}",
            "columns": [
                {data: 'Modul_id', orderable: false},
                {data: 'Case_Name', orderable: false},
                {data: 'Bug_Priority', orderable: false},
                {data: 'Bug_Status', orderable: false},
                {data: 'Des_case', orderable: false},
                {data: 'action', orderable: false, searchable: false, width: '15%', classname: 'center action'}

            ]
        });
    });
</script>
</body>
</html>
