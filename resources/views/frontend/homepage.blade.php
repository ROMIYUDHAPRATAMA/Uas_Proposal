<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Dashboard</title>
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

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 15px;
            font-size: 14px;
        }

        /* HEADER PUTIH */
        .page-header {
            background: #ffffff;
            padding: 14px 25px;
            border-bottom: 1px solid #ddd;
        }

        /* CONTENT */
        .content {
            padding: 25px;
        }

        .card {
            border: none;
            border-radius: 10px;
        }

        .stat-box {
            text-align: center;
            padding: 20px;
        }

        .stat-box h2 {
            font-weight: 700;
        }
    </style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <div class="profile-box d-flex align-items-center gap-2">
        <img src="{{ asset('img/avatar.png') }}">
        <div>
            <strong>Romi Yudha Pratama</strong><br>
            <small><i class="bi bi-geo-alt"></i> Tegal</small>
        </div>
    </div>

    <a href="{{ route('home') }}" class="active">
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
                 style="height:48px; margin-left:8px;">
        </div>

        <div class="topbar-right">
            <a href="{{ route('profile') }}"><i class="bi bi-person-circle" style="color: white"> RomiYudhaPratama</i></a>
            <a href="{{ route('password') }}"><i class="bi bi-gear" style="color: white;"> Ganti Password</i></a>
            <a href="{{ route('login') }}" class="text-white text-decoration-none">
                <i class="bi bi-box-arrow-right"></i> Sign Out
            </a>
        </div>
    </div>

    <!-- HEADER PUTIH (SAMA SEPERTI PENILAIAN) -->
    <div class="page-header">
        <h6 class="mb-0 d-flex align-items-center gap-2">
            <i class="bi bi-house-fill fs-5 text-primary"></i>
            Sistem HRIS Gopek Cipta Utama
        </h6>
    </div>

    <!-- CONTENT -->
    <div class="content">
        <div class="row g-3">

            <!-- CHART -->
            <div class="col-lg-8">
                <div class="card p-3">
                    <h6>Skor Penilaian</h6>
                    <div style="height:220px;">
                        <canvas id="scoreChart"></canvas>
                    </div>

                    <hr>
                    <h6>Riwayat Penilaian</h6>
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Score</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>20 Mei 2026</td>
                                <td>88</td>
                                <td>Selesai</td>
                            </tr>
                            <tr>
                                <td>17 April 2026</td>
                                <td>90</td>
                                <td>Selesai</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- RIGHT -->
            <div class="col-lg-4">
                <div class="card p-3 mb-3">
                    <h6>AI Recommendation</h6>
                    <ul>
                        <li>Tingkatkan soft skill komunikasi</li>
                        <li>Kinerja sangat baik bulan ini</li>
                    </ul>
                </div>

                <div class="card p-3 mb-3">
                    <h6>Statistik Kehadiran</h6>
                    <div class="row">
                        <div class="col stat-box">
                            <h2>95%</h2>
                            Kehadiran
                        </div>
                        <div class="col stat-box">
                            <h2>3</h2>
                            Terlambat
                        </div>
                    </div>
                </div>

                <div class="card p-3">
                    <h6>Pengumuman</h6>
                    <p>Rapat seluruh karyawan hari<br>
                        Selasa 25 Juni 2026</p>
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
            labels: ['Jan','Feb','Mar','Apr','Mei','Jun'],
            datasets: [{
                data: [40,60,70,80,95,95],
                borderColor: '#0d6efd',
                tension: 0.4,
                fill: false
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display:false } }
        }
    });
</script>

</body>
</html>
