<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #f1f3f6;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
        }

        .auth-wrapper {
            width: 100%;
            max-width: 380px;
            text-align: center;
        }

        .logo {
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .logo span {
            color: #0d6efd;
        }

        .auth-card {
            background: #e0e0e0;
            padding: 25px;
            border-radius: 8px;
        }

        .auth-card h6 {
            margin-bottom: 15px;
            font-weight: 600;
        }

        .input-group-text {
            background: #f8f9fa;
        }

        .form-control, .form-select {
            height: 42px;
        }

        .btn-primary {
            height: 42px;
            font-weight: 600;
        }

        .auth-footer {
            font-size: 13px;
            margin-top: 10px;
        }

        .auth-footer a {
            font-weight: 600;
            text-decoration: none;
        }
    </style>
</head>

<body>

<div class="auth-wrapper">
    <!-- LOGO -->
    <div class="logo">
        <span>G</span> Gopek Cipta Utama
    </div>

    <!-- CARD -->
    <div class="auth-card">
        <h6>Register</h6>

        @if ($errors->any())
            <div class="alert alert-danger text-start">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register.store') }}">
            @csrf

            <!-- NAME -->
            <div class="input-group mb-2">
                <input type="text" name="name" class="form-control"
                       placeholder="Username" value="{{ old('name') }}" required>
                <span class="input-group-text"><i class="bi bi-person"></i></span>
            </div>

            <!-- EMAIL -->
            <div class="input-group mb-2">
                <input type="email" name="email" class="form-control"
                       placeholder="Email" value="{{ old('email') }}" required>
                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
            </div>

            <!-- PASSWORD -->
            <div class="input-group mb-2">
                <input type="password" name="password" class="form-control"
                       placeholder="Password" required>
                <span class="input-group-text"><i class="bi bi-lock"></i></span>
            </div>

            <!-- CONFIRM PASSWORD -->
            <div class="input-group mb-2">
                <input type="password" name="password_confirmation" class="form-control"
                       placeholder="Confirm password" required>
                <span class="input-group-text"><i class="bi bi-lock"></i></span>
            </div>

            <!-- DIVISION -->
            <div class="mb-2">
                <select name="division" class="form-select" required>
                    <option value="">Division</option>
                    <option value="HR">HR</option>
                    <option value="IT">IT</option>
                    <option value="Finance">Finance</option>
                </select>
            </div>

            <!-- TERMS -->
            <div class="form-check mb-3 text-start">
                <input class="form-check-input" type="checkbox" required>
                <label class="form-check-label" style="font-size:13px;">
                    I accept the Terms and conditions
                </label>
            </div>

            <button type="submit" class="btn btn-primary w-100">
                Create an account
            </button>
        </form>

        <div class="auth-footer">
            Already have an account?
            <a href="{{ route('login') }}">Login here</a>
        </div>
    </div>
</div>

</body>
</html>
