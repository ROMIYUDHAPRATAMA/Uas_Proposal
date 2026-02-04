<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Penilaian</title>
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

/* CARDS */
.cards{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:20px;
    margin:20px 0
}
.card{
    background:#fff;
    padding:18px;
    border-radius:16px;
    box-shadow:0 10px 25px rgba(0,0,0,.06);
    display:flex;
    gap:14px;
    align-items:center
}
.icon{
    width:44px;
    height:44px;
    border-radius:12px;
    display:flex;
    align-items:center;
    justify-content:center;
    color:#fff;
    font-size:18px
}
.done{background:#22c55e}
.wait{background:#f59e0b}
.top{background:#3b82f6}

/* CHART */
.chart-box{
    background:#fff;
    padding:16px;
    border-radius:16px;
    box-shadow:0 10px 25px rgba(0,0,0,.05);
    margin-bottom:25px
}
.chart-wrapper{
    height:220px;
}
.chart-wrapper canvas{
    max-height:200px !important;
}

/* TABLE */
.table-box{
    background:#fff;
    padding:20px;
    border-radius:16px;
    box-shadow:0 10px 25px rgba(0,0,0,.05)
}
table{width:100%;border-collapse:collapse}
th,td{
    padding:14px;
    border-bottom:1px solid #eee;
    font-size:14px;
    text-align:left
}
tbody tr:hover{background:#f3f4f6}

/* BADGE */
.badge{
    padding:4px 14px;
    border-radius:999px;
    font-size:12px;
    font-weight:600
}
.badge-done{background:#dcfce7;color:#166534}
.badge-wait{background:#fef3c7;color:#92400e}

/* BUTTON */
.btn{
    padding:6px 12px;
    border:none;
    border-radius:8px;
    color:#fff;
    font-size:12px;
    cursor:pointer
}
.btn-add{background:#2563eb}
.btn-edit{background:#f59e0b}
.btn-del{background:#dc2626}
.btn-cancel{background:#9ca3af}

/* MODAL */
.modal{
    display:none;
    position:fixed;
    inset:0;
    background:rgba(0,0,0,.4);
    justify-content:center;
    align-items:center
}
.modal-content{
    background:#fff;
    padding:20px;
    border-radius:16px;
    width:360px
}
.modal-content input,
.modal-content select{
    width:100%;
    padding:10px;
    margin:8px 0;
    border-radius:8px;
    border:1px solid #ddd
}
.modal-btn{
    display:flex;
    gap:10px;
    margin-top:10px
}
</style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h2>GOPEK<br><small style="font-weight:300;font-size:13px">CIPTA UTAMA</small></h2>
    <div class="menu">
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="{{ route('admin.datakaryawan') }}">Data Karyawan</a>
        <a href="{{ route('admin.penilaian') }}" class="active">Penilaian</a>
        <a href="{{ route('admin.airecommendation') }}">AI Recommendation</a>
        <a href="{{ route('admin.laporan') }}">Laporan</a>
        <a href="{{ route('admin.pengaturan') }}">Pengaturan</a>
        <a href="{{ route('admin.login') }}">Logout</a>
    </div>
</div>

<!-- MAIN -->
<div class="main">

<div class="topbar">
    <input class="search" placeholder="Search...">
    <button class="btn btn-add" onclick="openTambah()">+ Tambah Penilaian</button>
</div>

<h2>Penilaian</h2>

<!-- CARDS -->
<div class="cards">
    <div class="card"><div class="icon done">✔</div>Penilaian Selesai</div>
    <div class="card"><div class="icon wait">⏱</div>Penilaian Tertunda</div>
    <div class="card"><div class="icon top">🏆</div>Top Performer</div>
</div>

<!-- CHART -->
<div class="chart-box">
    <h3 style="margin-top:0">Distribusi Skor</h3>
    <div class="chart-wrapper">
        <canvas id="chart"></canvas>
    </div>
</div>

<!-- TABLE -->
<div class="table-box">
<h3 style="margin-top:0">Daftar Penilaian</h3>
<table>
<thead>
<tr>
    <th>Nama</th>
    <th>Skor</th>
    <th>Status</th>
    <th>Tanggal</th>
    <th>Aksi</th>
</tr>
</thead>
<tbody>
<tr>
    <td>Dewi Lestari</td>
    <td><strong>90</strong></td>
    <td><span class="badge badge-done">Selesai</span></td>
    <td>03 Nov 2025</td>
    <td>
        <button class="btn btn-edit" onclick="openEdit('Dewi Lestari',90,'Selesai','2025-11-03')">Edit</button>
        <button class="btn btn-del" onclick="hapus()">Hapus</button>
    </td>
</tr>
<tr>
    <td>Rina Kurniawan</td>
    <td><strong>84</strong></td>
    <td><span class="badge badge-wait">Tertunda</span></td>
    <td>01 Nov 2025</td>
    <td>
        <button class="btn btn-edit" onclick="openEdit('Rina Kurniawan',84,'Tertunda','2025-11-01')">Edit</button>
        <button class="btn btn-del" onclick="hapus()">Hapus</button>
    </td>
</tr>
</tbody>
</table>
</div>

</div>

<!-- MODAL TAMBAH -->
<div id="modalTambah" class="modal">
<div class="modal-content">
<h3>Tambah Penilaian</h3>
<input placeholder="Nama">
<input type="number" placeholder="Skor">
<select>
    <option>Selesai</option>
    <option>Tertunda</option>
</select>
<input type="date">
<div class="modal-btn">
<button class="btn btn-add">Simpan</button>
<button class="btn btn-cancel" onclick="closeModal()">Batal</button>
</div>
</div>
</div>

<!-- MODAL EDIT -->
<div id="modalEdit" class="modal">
<div class="modal-content">
<h3>Edit Penilaian</h3>
<input id="e_nama">
<input type="number" id="e_skor">
<select id="e_status">
    <option>Selesai</option>
    <option>Tertunda</option>
</select>
<input type="date" id="e_tanggal">
<div class="modal-btn">
<button class="btn btn-edit">Update</button>
<button class="btn btn-cancel" onclick="closeModal()">Batal</button>
</div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('chart');
new Chart(ctx,{
    type:'bar',
    data:{
        labels:['0–20','21–40','41–60','61–80','81–100'],
        datasets:[{
            data:[25,30,45,35,20],
            backgroundColor:'#2563eb',
            borderRadius:8,
            barThickness:36
        }]
    },
    options:{
        responsive:true,
        maintainAspectRatio:false,
        plugins:{legend:{display:false}},
        scales:{y:{beginAtZero:true,ticks:{stepSize:10}}}
    }
});

function openTambah(){modalTambah.style.display='flex'}
function openEdit(n,s,st,t){
    e_nama.value=n;
    e_skor.value=s;
    e_status.value=st;
    e_tanggal.value=t;
    modalEdit.style.display='flex';
}
function closeModal(){
    modalTambah.style.display='none';
    modalEdit.style.display='none';
}
function hapus(){
    if(confirm('Yakin hapus data?')) alert('Data dihapus (dummy)');
}
</script>

</body>
</html>
