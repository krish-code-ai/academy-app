<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manual Admin Password Reset</title>
    <link rel="stylesheet" href="{{ asset('admin/css/adminlte.css') }}">
</head>
<body class="login-page bg-body-secondary">
    <div class="login-box">
        <div class="login-logo">
            <b>Admin</b> Manual Reset
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <h2 class="mb-3">Reset Password</h2>
                @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.manual.reset') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email" required />
                        <div class="input-group-text"><i class="bi bi-envelope"></i></div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="New Password" required />
                        <div class="input-group-text"><i class="bi bi-lock"></i></div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required />
                        <div class="input-group-text"><i class="bi bi-lock-fill"></i></div>
                    </div>

                    <div class="col-12">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Reset Password</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <script src="{{ asset('admin/js/adminlte.js') }}"></script>
</body>
</html>
