<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Profil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #eef1f4;
            font-family: 'Segoe UI', sans-serif;
        }

        /* SIDEBAR */
        .sidebar {
            width: 240px;
            height: 100vh;
            background: #053b6f;
            position: fixed;
            color: #fff;
        }

        .profile-box {
            padding: 15px;
            background: #062f55;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .profile-box img {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            border: 2px solid #fff;
        }

        .sidebar a {
            display: block;
            padding: 25px 20px;
            color: #fff;
            text-decoration: none;
            font-size: 14px;
        }

        .sidebar a.active,
        .sidebar a:hover {
            background: #1aa090;
        }

        /* MAIN */
        .main {
            margin-left: 240px;
        }

        /* TOPBAR */
        .topbar {
            background: #0b75b8;
            padding: 12px 25px;
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 18px;
            font-size: 14px;
        }

        /* HEADER */
        .page-header {
            background: #ffffff;
            padding: 14px 25px;
            border-bottom: 1px solid #ddd;
        }

        /* CONTENT */
        .content {
            padding: 30px;
        }

        .card {
            border: none;
            border-radius: 10px;
        }

        .profile-avatar {
            width: 110px;
            height: 110px;
            border-radius: 50%;
            object-fit: cover;
        }

        .profile-name {
            font-weight: 700;
            margin-top: 10px;
        }

        .btn-save {
            background: #0d6efd;
            color: #fff;
            padding: 8px 25px;
        }
    </style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <div class="profile-box">
        <img src="{{ asset('img/avatar.png') }}">
        <div>
            <strong>RomiYudhaPratama</strong><br>
            <small><i class="bi bi-geo-alt"></i> Tegal</small>
        </div>
    </div>

    <a href="{{ route('home') }}">
        <i class="bi bi-house"></i> Dashboard
    </a>
    <a href="{{ route('penilaian') }}">
        <i class="bi bi-bar-chart"></i> Penilaian
    </a>
</div>

<!-- MAIN -->
<div class="main">

    <!-- TOPBAR -->
    <div class="topbar">
        <!-- LOGO -->
        <div class="logo d-flex align-items-center" style="height:56px;">
            <span style="font-size:36px;font-weight:800;color:#ffffff;">G</span>
            <img src="{{ asset('img/logo/tehgopek.png') }}"
                 style="height:48px;margin-left:8px;">
        </div>

        <div class="topbar-right">
            <a href="{{ route('profile') }}"><i class="bi bi-person-circle" style="color: white"> RomiYudhaPratama</i></a>
            <a href="{{ route('password') }}"><i class="bi bi-gear" style="color: white;"> Ganti Password</i></a>
            <a href="{{ route('login') }}" class="text-white text-decoration-none">
                <i class="bi bi-box-arrow-right"></i> Sign Out
            </a>
        </div>
    </div>

    <!-- HEADER -->
    <div class="page-header">
        <h6 class="mb-0 d-flex align-items-center gap-2">
            <i class="bi bi-person-fill fs-5 text-primary"></i>
            Profil
        </h6>
    </div>

    <!-- CONTENT -->
    <div class="content">
        <div class="card p-4">

            <!-- PROFILE HEADER -->
            <div class="text-center mb-4">
                <img src="{{ asset('img/avatar.png') }}" class="profile-avatar">
                <div class="profile-name">RomiYudhaPratama</div>
                <small>Staff Keuangan</small><br>
                <small>Finance</small>
            </div>

            <!-- FORM -->
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" value="RomiYudhaPratama">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" value="romiyudha@gmail.com">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jabatan</label>
                            <input type="text" class="form-control" value="Staff Keuangan">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Departemen</label>
                            <input type="text" class="form-control" value="Finance">
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-save">
                                SIMPAN
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>
