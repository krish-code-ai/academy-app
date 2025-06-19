<!doctype html>
<html lang="en">
<!--begin::Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Admin | Register Page</title>
    <link rel="stylesheet" href="{{ asset('admin/css/adminlte.css') }}">

</head>
<!--end::Head-->
<!--begin::Body-->

<body class="register-page bg-body-secondary">
    <div class="register-box">
        <div class="register-logo">
            <a href="../index2.html"><b>Admin</b>LTE</a>
        </div>
        <!-- /.register-logo -->
        <div class="card">
            <div class="card-body register-card-body">
                <p class="register-box-msg">Register a new membership</p>
                <form action="{{url('/admin/register')}}" method="post">
                    {{ csrf_field() }}
                    <div class="input-group mb-3">
                        <input type="text" name="name" class="form-control @if($errors->get('name')) is-invalid @endif" placeholder="Full Name" required />
                        <div class="input-group-text"><span class="bi bi-person"></span></div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control @if($errors->get('email')) is-invalid @endif" placeholder="Email" required />
                        <div class="input-group-text"><span class="bi bi-envelope"></span></div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control @if($errors->get('password')) is-invalid @endif" placeholder="Password" required />
                        <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password_confirmation"  class="form-control" placeholder="Confirm Password" required>
                        <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
                    </div>

                    <!--begin::Row-->
                    <div class="row">

                        <!-- /.col -->
                        <div class="col-4">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Sign In</button>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!--end::Row-->
                </form>
                <p class="mb-0">
                    <a href="login.html" class="text-center"> I already have a membership </a>
                </p>
            </div>
            <!-- /.register-card-body -->
        </div>
    </div>
    <script src="{{ asset('admin/js/adminlte.js') }}"></script>

</body>
<!--end::Body-->

</html>
