<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>AI Recommendation</title>
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
    display:block;
    padding:12px;
    color:#fff;
    text-decoration:none;
    border-radius:10px;
    margin-bottom:6px;
    font-size:14px
}
.menu a.active,.menu a:hover{background:rgba(255,255,255,.2)}

/* MAIN */
.main{flex:1;padding:25px}

/* TOP BAR */
.topbar{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px
}
.search{
    background:#fff;
    padding:10px 16px;
    border-radius:30px;
    width:280px;
    border:1px solid #ddd
}

/* AI INSIGHT */
.ai-box{
    background:#fff;
    padding:20px;
    border-radius:16px;
    box-shadow:0 10px 25px rgba(0,0,0,.05);
    margin-bottom:20px
}

/* CHART */
.chart-box{
    background:#fff;
    padding:20px;
    border-radius:16px;
    box-shadow:0 10px 25px rgba(0,0,0,.05);
    margin-bottom:20px
}
.chart-wrapper{height:220px}

/* TABLE */
.table-box{
    background:#fff;
    padding:20px;
    border-radius:16px;
    box-shadow:0 10px 25px rgba(0,0,0,.05)
}
table{width:100%;border-collapse:collapse}
th,td{padding:14px;border-bottom:1px solid #eee;font-size:14px;text-align:left}
tbody tr:hover{background:#f3f4f6}

/* SCORE */
.score-high{color:#16a34a;font-weight:700}
.score-medium{color:#2563eb;font-weight:700}
.score-low{color:#dc2626;font-weight:700}

/* BADGE */
.badge{
    padding:4px 14px;
    border-radius:999px;
    font-size:12px;
    font-weight:600;
    display:inline-block
}
.badge-high{background:#dcfce7;color:#166534}
.badge-medium{background:#e0e7ff;color:#3730a3}
.badge-low{background:#fee2e2;color:#991b1b}

/* BUTTON */
.btn{
    padding:6px 12px;
    border:none;
    border-radius:8px;
    font-size:12px;
    color:#fff;
    cursor:pointer
}
.btn-promote{background:#16a34a}
.btn-train{background:#2563eb}
</style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h2>PT GOPEK<br><small style="font-weight:300;font-size:13px">CIPTA UTAMA</small></h2>
    <div class="menu">
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="{{ route('admin.datakaryawan') }}">Data Karyawan</a>
        <a href="{{ route('admin.penilaian') }}">Penilaian</a>
        <a href="{{ route('admin.airecommendation') }}" class="active">AI Recommendation</a>
        <a href="{{ route('admin.laporan') }}">Laporan</a>
        <a href="{{ route('admin.pengaturan') }}">Pengaturan</a>
        <a href="{{ route('admin.login') }}">Logout</a>
    </div>
</div>

<!-- MAIN -->
<div class="main">

<div class="topbar">
    <input class="search" placeholder="Search...">
</div>

<h2>AI Recommendation</h2>

<!-- AI INSIGHT -->
<div class="ai-box" id="aiInsight">
    <strong>AI Insight</strong>
    <p>Analisis otomatis berdasarkan skor kinerja karyawan.</p>
</div>

<!-- CHART -->
<div class="chart-box">
    <strong>Grafik Potensi Karyawan</strong>
    <div class="chart-wrapper">
        <canvas id="potensiChart"></canvas>
    </div>
</div>

<!-- TABLE -->
<div class="table-box">
<strong>Daftar Karyawan Berpotensi</strong>
<table id="tabel">
<thead>
<tr>
    <th>Nama</th>
    <th>Departemen</th>
    <th>Skor</th>
    <th>Rekomendasi</th>
    <th>Aksi</th>
</tr>
</thead>
<tbody>
<tr data-skor="87">
    <td>Arif Saputra</td>
    <td>Produksi</td>
    <td class="skor">87</td>
    <td class="rekom"></td>
    <td class="aksi"></td>
</tr>
<tr data-skor="90">
    <td>Lani Wijaya</td>
    <td>Marketing</td>
    <td class="skor">90</td>
    <td class="rekom"></td>
    <td class="aksi"></td>
</tr>
<tr data-skor="85">
    <td>Budi Santoso</td>
    <td>Produksi</td>
    <td class="skor">85</td>
    <td class="rekom"></td>
    <td class="aksi"></td>
</tr>
</tbody>
</table>
</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const rows = document.querySelectorAll('#tabel tbody tr');
let high=0, medium=0, low=0;

rows.forEach(row=>{
    const skor = parseInt(row.dataset.skor);
    const skorTd = row.querySelector('.skor');
    const rekomTd = row.querySelector('.rekom');
    const aksiTd = row.querySelector('.aksi');

    if(skor >= 90){
        skorTd.className='skor score-high';
        rekomTd.innerHTML='<span class="badge badge-high">High</span>';
        aksiTd.innerHTML='<button class="btn btn-promote">Promosi</button>';
        high++;
    }else if(skor >= 80){
        skorTd.className='skor score-medium';
        rekomTd.innerHTML='<span class="badge badge-medium">Medium</span>';
        aksiTd.innerHTML='<button class="btn btn-train">Pelatihan</button>';
        medium++;
    }else{
        skorTd.className='skor score-low';
        rekomTd.innerHTML='<span class="badge badge-low">Low</span>';
        aksiTd.innerHTML='-';
        low++;
    }
});

document.getElementById('aiInsight').innerHTML +=
`<p><strong>${high}</strong> kandidat promosi dan <strong>${medium}</strong> kandidat pelatihan.</p>`;

new Chart(document.getElementById('potensiChart'),{
    type:'doughnut',
    data:{
        labels:['High','Medium','Low'],
        datasets:[{
            data:[high,medium,low],
            backgroundColor:['#22c55e','#2563eb','#dc2626']
        }]
    },
    options:{plugins:{legend:{position:'bottom'}}}
});
</script>

</body>
</html>
