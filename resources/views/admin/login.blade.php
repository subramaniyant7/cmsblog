<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cpanel | Log in</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
    <link rel="stylesheet" href="{{ URL::asset(FRONTENDURL . ADMIN . '/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset(FRONTENDURL . ADMIN . '/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset(FRONTENDURL . ADMINCSS . '/adminlte.min2167.css?v=3.2.0') }}">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
        <img src="{{ URL::asset(FRONTENDURL.ADMIN.'/images/logo.png') }}" alt="GoHealthe Logo" class="brand-image elevation-3"
            style="margin-bottom:1em;">
            <br>
            <a href="{{ url(ADMINURL) }}"><b>Login</b></a>
        </div>
        @include('admin.notification')
        <div class="card">
            <div class="card-body login-card-body">
                <form action="{{ url(ADMINURL.'/login') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="User Name" name="admin_name" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="admin_password"
                            required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                            <!-- <div style="text-align:right;margin-top:1em;">
                                <a href="{{url(FRONTENDURL.'cmsadmin/forgotpassword')}}">Forgot Password</a>
                            </div> -->
                        </div>


                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ URL::asset(FRONTENDURL . ADMIN . '/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset(FRONTENDURL . ADMIN . '/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset(FRONTENDURL . ADMINJS . '/adminlte.min2167.js?v=3.2.0') }}"></script>
</body>

</html>
