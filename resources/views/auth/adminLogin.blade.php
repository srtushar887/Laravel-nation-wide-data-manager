<!doctype html>
<html lang="en">


<!-- Mirrored from themesdesign.in/nazox/layouts/horizontal/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 27 Sep 2020 05:58:35 GMT -->
<head>

    <meta charset="utf-8" />
    <title>Admin | Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/admin/')}}/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="{{asset('assets/admin/')}}/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('assets/admin/')}}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('assets/admin/')}}/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body class="auth-body-bg">
<div class="home-btn d-none d-sm-block">
    <a href="index.html"><i class="mdi mdi-home-variant h2 text-white"></i></a>
</div>
<div>
    <div class="container-fluid p-0">
        <div class="row no-gutters">
            <div class="col-lg-4">
                <div class="authentication-page-content p-4 d-flex align-items-center min-vh-100">
                    <div class="w-100">
                        <div class="row justify-content-center">
                            <div class="col-lg-9">
                                <div>
                                    <div class="text-center">
                                        <div>
                                            CURISTRACKER NATION WIDE
                                        </div>

                                        <h4 class="font-size-18 mt-4">Welcome Back !</h4>
                                        <p class="text-muted">Sign in to continue .</p>
                                    </div>

                                    <div class="p-2 mt-5">
                                        <form class="form-horizontal" action="{{route('admin.login.submit')}}"  method="post">
                                            @csrf

                                            <div class="form-group auth-form-group-custom mb-4">
                                                <i class="ri-user-2-line auti-custom-input-icon"></i>
                                                <label for="username">Email</label>
                                                <input type="text" class="form-control" name="email" id="username" placeholder="Enter username">
                                            </div>

                                            <div class="form-group auth-form-group-custom mb-4">
                                                <i class="ri-lock-2-line auti-custom-input-icon"></i>
                                                <label for="userpassword">Password</label>
                                                <input type="password" class="form-control" name="password" id="userpassword" placeholder="Enter password">
                                            </div>


                                            <div class="mt-4 text-center">
                                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                                            </div>

                                            <div class="mt-4 text-center">
                                                <a href="auth-recoverpw.html" class="text-muted"><i class="mdi mdi-lock mr-1"></i> Forgot your password?</a>
                                            </div>
                                        </form>
                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="authentication-bg" style="background-image: url('https://cdn.wallpapersafari.com/11/52/YxRayv.jpeg');height: 100%">
                    <div class="bg-overlay"></div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- JAVASCRIPT -->
<script src="{{asset('assets/admin/')}}/libs/jquery/jquery.min.js"></script>
<script src="{{asset('assets/admin/')}}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('assets/admin/')}}/libs/metismenu/metisMenu.min.js"></script>
<script src="{{asset('assets/admin/')}}/libs/simplebar/simplebar.min.js"></script>
<script src="{{asset('assets/admin/')}}/libs/node-waves/waves.min.js"></script>

<script src="{{asset('assets/admin/')}}/js/app.js"></script>

</body>

<!-- Mirrored from themesdesign.in/nazox/layouts/horizontal/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 27 Sep 2020 05:58:35 GMT -->
</html>
