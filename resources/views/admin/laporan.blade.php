<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Laporan</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
*{box-sizing:border-box;font-family:Segoe UI,Arial,sans-serif}
body{margin:0;background:#f5f7fb;display:flex}

/* SIDEBAR */
.sidebar{
    width:240px;
    background:linear-gradient(180deg,#3b82f6,#2563eb);
    color:#fff;
    min-height:100vh;
    padding:20px
}
.sidebar h2{margin-bottom:30px;line-height:1.2}
.menu a{
    display:flex;
    align-items:center;
    gap:10px;
    padding:12px;
    color:#fff;
    text-decoration:none;
    border-radius:10px;
    margin-bottom:6px;
    font-size:14px
}
.menu a.active,.menu a:hover{
    background:rgba(255,255,255,.2)
}

/* MAIN */
.main{flex:1;padding:25px}

/* TOP BAR */
.topbar{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:25px
}
.search{
    background:#fff;
    padding:10px 16px;
    border-radius:30px;
    width:300px;
    border:1px solid #ddd
}
.profile{
    width:36px;height:36px;
    border-radius:50%;
    background:#e5e7eb
}

/* TITLE */
h2{margin:0 0 20px}

/* FILTER */
.filters{
    display:flex;
    gap:15px;
    margin-bottom:25px
}
select{
    padding:10px 14px;
    border-radius:12px;
    border:1px solid #ddd;
    background:#fff;
    font-size:14px
}

/* REPORT LIST */
.report-list{
    display:flex;
    flex-direction:column;
    gap:15px
}
.report-card{
    background:#fff;
    padding:18px 22px;
    border-radius:16px;
    box-shadow:0 10px 25px rgba(0,0,0,.05);
    display:flex;
    justify-content:space-between;
    align-items:center
}
.report-info h4{
    margin:0 0 6px;
    font-size:16px
}
.report-info p{
    margin:0;
    color:#6b7280;
    font-size:14px
}
.report-date{
    font-size:13px;
    color:#374151
}
</style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h2>
        PT GOPEK<br>
        <small style="font-weight:300;font-size:13px">CIPTA UTAMA</small>
    </h2>

    <div class="menu">
         <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="{{ route('admin.datakaryawan') }}">Data Karyawan</a>
        <a href="{{ route('admin.penilaian') }}">Penilaian</a>
        <a href="{{ route('admin.airecommendation') }}">AI Recommendation</a>
        <a href="{{ route('admin.laporan') }}" class="active">Laporan</a>
        <a href="{{ route('admin.pengaturan') }}">Pengaturan</a>
        <a href="{{ route('admin.login') }}">Logout</a>
    </div>
</div>

<!-- MAIN -->
<div class="main">

    <!-- TOP BAR -->
    <div class="topbar">
        <input class="search" placeholder="Search laporan...">
        <div class="profile"></div>
    </div>

    <h2>Laporan</h2>

    <!-- FILTER -->
    <div class="filters">
        <select>
            <option>Semua Laporan</option>
            <option>Laporan Kinerja</option>
            <option>Laporan Penilaian</option>
            <option>Laporan Kehadiran</option>
        </select>

        <select>
            <option>Tahun Ini</option>
            <option>2025</option>
            <option>2024</option>
            <option>2023</option>
        </select>
    </div>

    <!-- REPORT LIST -->
    <div class="report-list">

        <div class="report-card">
            <div class="report-info">
                <h4>Laporan Kinerja Bulanan</h4>
                <p>Ringkasan penilaian kinerja per bulan</p>
            </div>
            <div class="report-date">31 Maret 2025</div>
        </div>

        <div class="report-card">
            <div class="report-info">
                <h4>Laporan Penilaian Tahunan</h4>
                <p>Seluruh penilaian kinerja tahunan</p>
            </div>
            <div class="report-date">15 Januari 2025</div>
        </div>

        <div class="report-card">
            <div class="report-info">
                <h4>Laporan Kehadiran</h4>
                <p>Data kehadiran karyawan triwulanan</p>
            </div>
            <div class="report-date">05 Desember 2024</div>
        </div>

    </div>

</div>

</body>
</html>
