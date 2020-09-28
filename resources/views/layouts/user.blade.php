<!doctype html>
<html lang="en">


<!-- Mirrored from themesdesign.in/nazox/layouts/horizontal/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 27 Sep 2020 05:53:40 GMT -->
<head>

    <meta charset="utf-8" />
    <title>NATIONWIDE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="">

    <!-- jquery.vectormap css -->
    <link href="{{asset('assets/admin/')}}/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />

    <!-- DataTables -->
    <link href="{{asset('assets/admin/')}}/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{asset('assets/admin/')}}/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{asset('assets/admin/')}}/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('assets/admin/')}}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('assets/admin/')}}/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    @yield('css')
</head>

<body data-topbar="dark" data-layout="horizontal">

<!-- Begin page -->
<div id="layout-wrapper">

    <header id="page-topbar" style="margin-top: -10px;background-color: #4267b2">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="{{route('dashboard')}}" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="assets/images/logo-sm-dark.png" alt="" height="22">
                                </span>
                        <span class="logo-lg">
                                    <img src="assets/images/logo-dark.png" alt="" height="20">
                                </span>
                    </a>

                    <a href="{{route('dashboard')}}" class="logo logo-light">
                                <span class="logo-sm">
                                   asdasd
                                </span>
                        <span class="logo-lg">
                            <h4 style="color: white;margin-top: 15px;">NATIONWIDE</h4>
                                </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 font-size-24 d-lg-none header-item" data-toggle="collapse" data-target="#topnav-menu-content">
                    <i class="ri-menu-2-line align-middle"></i>
                </button>

                <!-- App Search-->


                <div class="dropdown dropdown-mega d-none d-lg-block ml-2">

                </div>
            </div>

            <div class="d-flex">

                <div class="dropdown d-inline-block d-lg-none ml-2">
                    <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ri-search-line"></i>
                    </button>

                </div>

                <div class="dropdown d-inline-block user-dropdown" style="margin-top: 8px;">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">



                        <span class="d-none d-xl-inline-block ml-1">{{Auth::user()->name}}</span>
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <!-- item-->
                        <a class="dropdown-item" href="{{route('user.change.password')}}"><i class="ri-lock-unlock-line align-middle mr-1"></i> Change Password</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="ri-shut-down-line align-middle mr-1 text-danger"></i> Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>



            </div>
        </div>
    </header>

    <div class="topnav">

    </div>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid" style="max-width: 100%">

                @yield('user')

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->

<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- JAVASCRIPT -->
<script src="{{asset('assets/admin/')}}/libs/jquery/jquery.min.js"></script>
<script src="{{asset('assets/admin/')}}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('assets/admin/')}}/libs/metismenu/metisMenu.min.js"></script>
<script src="{{asset('assets/admin/')}}/libs/simplebar/simplebar.min.js"></script>
<script src="{{asset('assets/admin/')}}/libs/node-waves/waves.min.js"></script>

<!-- apexcharts -->


<!-- jquery.vectormap map -->
<script src="{{asset('assets/admin/')}}/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="{{asset('assets/admin/')}}/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js"></script>

<!-- Required datatable js -->
<script src="{{asset('assets/admin/')}}/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{asset('assets/admin/')}}/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

<!-- Responsive examples -->
<script src="{{asset('assets/admin/')}}/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('assets/admin/')}}/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>



<script src="{{asset('assets/admin/')}}/js/app.js"></script>

@yield('js')

</body>

<!-- Mirrored from themesdesign.in/nazox/layouts/horizontal/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 27 Sep 2020 05:55:40 GMT -->
</html>
