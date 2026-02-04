<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Penilaian</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- ChartJS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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

        .sidebar .profile-box {
            padding: 15px;
            background: #062f55;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .profile-box img {
            width: 45px;
            height: 45px;
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

        .logo {
            font-size: 22px;
            font-weight: 700;
        }

        .logo span {
            color: #ff9800;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 15px;
            font-size: 14px;
        }

        /* CONTENT */
        .content {
            padding: 25px;
        }

        .card {
            border: none;
            border-radius: 10px;
        }

        .summary-box {
            text-align: center;
            padding: 20px;
        }

        .summary-box h3 {
            font-weight: 700;
            margin-bottom: 0;
        }

        .summary-box small {
            color: #666;
        }
    </style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">

    <!-- PROFILE -->
    <div class="profile-box d-flex align-items-center gap-2">
        <img src="{{ asset('img/avatar.png') }}">
        <div>
            <strong>Romi Yudha Pratama</strong><br>
            <small><i class="bi bi-geo-alt"></i> Tegal</small>
        </div>
    </div>

    <a href="{{ route('home') }}">
        <i class="bi bi-house"></i> Dashboard
    </a>
    <a href="{{ route('penilaian') }}" class="active">
        <i class="bi bi-bar-chart"></i> Penilaian
    </a>
</div>

<!-- MAIN -->
<div class="main">
    <!-- TOPBAR -->
    <div class="topbar">
        <div class="logo d-flex align-items-center gap-2">
    <!-- Huruf G -->
    <span style="
        font-size:34px;
        font-weight:800;
        color:#ffffff;
        line-height:1;
        display:flex;
        align-items:center;
    ">
        G
    </span>

    <!-- Logo Teh Gopek -->
    <img src="{{ asset('img/logo/tehgopek.png') }}"
         alt="Teh Gopek"
         style="
            height:51px;
            object-fit:contain;
            vertical-align:middle;
         ">
</div>


        <div class="topbar-right">
            <a href="{{ route('profile') }}"><i class="bi bi-person-circle" style="color: white"> RomiYudhaPratama</i></a>
            <a href="{{ route('password') }}"><i class="bi bi-gear" style="color: white;"> Ganti Password</i></a>
            <a href="#" class="text-white text-decoration-none">
                <i class="bi bi-box-arrow-right"></i> Sign Out
            </a>
        </div>
    </div>

    <!-- HEADER TITLE -->
    <div class="bg-white p-3 border-bottom">
        <h6 class="mb-0 d-flex align-items-center gap-2">
            <i class="bi bi-house-fill fs-5 text-primary"></i>
            Sistem HRIS Gopek Cipta Utama
</h6>
    </div>

    <!-- CONTENT -->
    <div class="content">

        <!-- SUMMARY -->
        <div class="row g-3 mb-3">
            <div class="col-md-4">
                <div class="card summary-box">
                    <small>Score rata-rata bulan ini</small>
                    <h3>90</h3>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card summary-box">
                    <small>Status penilaian</small>
                    <h5>Selesai</h5>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card summary-box">
                    <small>Periode</small>
                    <h5>JUNI - DESEMBER</h5>
                </div>
            </div>
        </div>

        <!-- GRAFIK KECIL -->
        <div class="card p-3 mb-3">
            <h6>Distribusi Skor</h6>
            <div style="height:220px;">
                <canvas id="scoreChart"></canvas>
            </div>
        </div>

        <!-- TABLE & AI -->
        <div class="row g-3">
            <div class="col-md-8">
                <div class="card p-3">
                    <h6>Riwayat Penilaian</h6>
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Score</th>
                                <th>Nilai Atasan</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Jan 2026</td>
                                <td>91</td>
                                <td>70</td>
                                <td>Selesai</td>
                                <td>•••</td>
                            </tr>
                            <tr>
                                <td>Feb 2026</td>
                                <td>83</td>
                                <td>59</td>
                                <td>Selesai</td>
                                <td>•••</td>
                            </tr>
                            <tr>
                                <td>Mar 2026</td>
                                <td>88</td>
                                <td>60</td>
                                <td>Selesai</td>
                                <td>•••</td>
                            </tr>
                        </tbody>
                    </table>

                    <a href="#" class="text-decoration-none">
                        Detail <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-3">
                    <h6>
                        <i class="bi bi-exclamation-circle text-primary"></i>
                        AI Feedback
                    </h6>
                    <ul>
                        <li>Terus pertahankan kinerja anda</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- CHART -->
<script>
    new Chart(document.getElementById('scoreChart'), {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
            datasets: [{
                data: [45, 70, 50, 90, 65, 80],
                borderColor: '#0d6efd',
                tension: 0.4,
                fill: false,
                pointRadius: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false }
            }
        }
    });
</script>

</body>
</html>
