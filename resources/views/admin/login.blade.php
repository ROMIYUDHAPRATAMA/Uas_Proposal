<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #f2f4f7;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
        }

        .login-wrapper {
            width: 100%;
            max-width: 380px;
            text-align: center;
        }

        .logo {
            margin-bottom: 20px;
            font-size: 22px;
            font-weight: 600;
            color: #0d6efd;
        }

        .login-card {
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            text-align: left;
        }

        .login-card h5 {
            text-align: center;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .form-control {
            height: 42px;
        }

        .btn-primary {
            height: 42px;
            font-weight: 600;
        }

        /* INPUT ICON */
        .input-icon {
            position: relative;
        }

        .input-icon i {
            position: absolute;
            top: 50%;
            right: 12px;
            transform: translateY(-50%);
            color: #6c757d;
            font-size: 16px;
        }

        .input-icon .form-control {
            padding-right: 40px;
        }
    </style>
</head>

<body>

<div class="login-wrapper">

    <!-- LOGO -->
    <div class="logo">
        <span style="color:#0d6efd;">G</span> Gopek Cipta Utama
    </div>

    <!-- CARD -->
    <div class="login-card">
        <h5>Masuk</h5>

        @if ($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login.process') }}">
            @csrf

            <!-- USERNAME -->
            <div class="mb-3 input-icon">
                <input type="email"
                       name="email"
                       class="form-control"
                       placeholder="Username"
                       required>
                <i class="bi bi-person"></i>
            </div>

            <!-- PASSWORD -->
            <div class="mb-3 input-icon">
                <input type="password"
                       name="password"
                       class="form-control"
                       placeholder="Password"
                       required>
                <i class="bi bi-lock"></i>
            </div>

            <!-- BUTTON -->
            <button type="submit" class="btn btn-primary w-100">
                Sign In
            </button>
        </form>
    </div>

</div>

</body>
</html>
