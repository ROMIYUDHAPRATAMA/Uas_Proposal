<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Dashboard HRM</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
*{box-sizing:border-box;font-family:Segoe UI,Arial,sans-serif}
body{margin:0;background:#f4f7fb;display:flex}

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
    padding:12px;
    color:#fff;
    text-decoration:none;
    border-radius:10px;
    margin-bottom:6px
}
.menu a:hover,.menu a.active{
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
    padding:10px 15px;
    border-radius:30px;
    width:300px;
    border:1px solid #ddd
}
.profile{display:flex;align-items:center;gap:10px}
.avatar{width:38px;height:38px;border-radius:50%;background:#ccc}

/* CARDS */
.cards{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:20px;
    margin-bottom:25px
}
.card{
    background:#fff;
    padding:20px;
    border-radius:16px;
    box-shadow:0 10px 25px rgba(0,0,0,.06)
}
.card h3{margin:0;font-size:14px;color:#6b7280}
.card h2{margin:10px 0 0}

/* CHART */
.chart-box{
    background:#fff;
    padding:22px;
    border-radius:18px;
    box-shadow:0 10px 25px rgba(0,0,0,.05);
    margin-bottom:25px
}

/* BOTTOM */
.bottom{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:20px
}

/* AI INSIGHT */
.ai-box{
    background:linear-gradient(135deg,#2563eb,#1e40af);
    color:#fff;
    padding:22px;
    border-radius:18px;
    box-shadow:0 10px 25px rgba(0,0,0,.1)
}
.ai-box h3{margin-top:0}
.ai-box ul{padding-left:18px;margin:10px 0 0}
.ai-box li{margin-bottom:6px;font-size:14px}

/* TABLE */
.table-box{
    background:#fff;
    padding:22px;
    border-radius:18px;
    box-shadow:0 10px 25px rgba(0,0,0,.05)
}
table{width:100%;border-collapse:collapse}
th,td{
    padding:12px;
    border-bottom:1px solid #eee;
    font-size:14px;
    text-align:left
}
th{color:#6b7280}
tbody tr:hover{background:#f3f4f6}

/* BADGE */
.badge{
    padding:4px 12px;
    border-radius:999px;
    font-size:12px;
    font-weight:600
}
.badge-done{background:#dcfce7;color:#166534}
</style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h2>GOPEK<br><small style="font-weight:300;font-size:13px">CIPTA UTAMA</small></h2>
    <div class="menu">
        <a href="{{ route('admin.dashboard') }}" class="active">Dashboard</a>
        <a href="{{ route('admin.datakaryawan') }}">Data Karyawan</a>
        <a href="{{ route('admin.penilaian') }}">Penilaian</a>
        <a href="{{ route('admin.airecommendation') }}">AI Recommendation</a>
        <a href="{{ route('admin.laporan') }}">Laporan</a>
        <a href="{{ route('admin.pengaturan') }}">Pengaturan</a>
        <a href="{{ route('admin.logout') }}">Logout</a>
    </div>
</div>

<!-- MAIN -->
<div class="main">

    <div class="topbar">
        <input class="search" placeholder="Search...">
        <div class="profile">
            <span>Admin HRD</span>
            <div class="avatar"></div>
        </div>
    </div>

    <h2>Sistem HRM Gopek Cipta Utama</h2>

    <!-- SUMMARY -->
    <div class="cards">
        <div class="card"><h3>Jumlah Karyawan Aktif</h3><h2>152</h2></div>
        <div class="card"><h3>Penilaian Bulan Ini</h3><h2>34</h2></div>
        <div class="card"><h3>Top Performer</h3><h2>Dewi Lestari</h2></div>
        <div class="card"><h3>Rata-rata Skor</h3><h2>85 / 100</h2></div>
    </div>

    <!-- CHART -->
    <div class="chart-box">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:10px">
            <div>
                <h3 style="margin:0">📈 Rata-rata Skor Karyawan</h3>
                <small style="color:#6b7280">Periode Januari – Desember</small>
            </div>
            <select style="padding:6px 10px;border-radius:8px;border:1px solid #ddd">
                <option>Per Bulan</option>
                <option>Per Tahun</option>
            </select>
        </div>
        <canvas id="chart" height="120"></canvas>
    </div>

    <!-- BOTTOM -->
    <div class="bottom">

        <!-- AI INSIGHT -->
        <div class="ai-box">
            <h3>🤖 AI Insight</h3>
            <p>
                <strong>5 karyawan</strong> berpotensi menjadi supervisor dalam
                <strong>3 bulan ke depan</strong>.
            </p>
            <ul>
                <li>Fokus pada tim Marketing & Produksi</li>
                <li>Rekomendasi pelatihan leadership</li>
                <li>Evaluasi performa lanjutan</li>
            </ul>
        </div>

        <!-- TABLE -->
        <div class="table-box">
            <h3>📋 Daftar Penilaian Terbaru</h3>
            <table>
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Departemen</th>
                        <th>Skor</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Andi Wijaya</td>
                        <td>Produksi</td>
                        <td><strong>88</strong></td>
                        <td><span class="badge badge-done">Selesai</span></td>
                    </tr>
                    <tr>
                        <td>Sinta Lestari</td>
                        <td>Finance</td>
                        <td><strong>92</strong></td>
                        <td><span class="badge badge-done">Selesai</span></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
new Chart(chart,{
    type:'line',
    data:{
        labels:['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'],
        datasets:[{
            data:[70,75,72,78,76,78,80,85,88,84,82,85],
            borderColor:'#2563eb',
            backgroundColor:'rgba(37,99,235,.15)',
            fill:true,
            tension:.4,
            pointRadius:4
        }]
    },
    options:{
        plugins:{legend:{display:false}},
        scales:{y:{ticks:{stepSize:5}}}
    }
});
</script>

</body>
</html>
