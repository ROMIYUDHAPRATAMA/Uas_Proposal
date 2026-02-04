<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Data Karyawan</title>
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
    display:block;
    padding:12px;
    color:#fff;
    text-decoration:none;
    border-radius:8px;
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
    padding:10px 15px;
    border-radius:30px;
    width:300px;
    border:1px solid #ddd
}

/* HEADER */
.header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:15px
}
.btn{
    background:#2563eb;
    color:#fff;
    padding:10px 16px;
    border:none;
    border-radius:10px;
    cursor:pointer;
    font-size:13px
}
.btn-edit{background:#f59e0b}
.btn-hapus{background:#dc2626}

/* TABLE */
.table-box{
    background:#fff;
    border-radius:18px;
    padding:20px;
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
    padding:5px 14px;
    border-radius:999px;
    font-size:12px;
    font-weight:600
}
.badge-aktif{background:#dcfce7;color:#166534}
.badge-non{background:#fee2e2;color:#991b1b}

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
    border-radius:14px;
    width:360px
}
.modal-content h3{margin-top:0}
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
.btn-cancel{background:#9ca3af}
</style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h2>
        GOPEK<br>
        <small style="font-weight:300;font-size:13px">CIPTA UTAMA</small>
    </h2>
    <div class="menu">
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="{{ route('admin.datakaryawan') }}" class="active">Data Karyawan</a>
        <a href="{{ route('admin.penilaian') }}">Penilaian</a>
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
    </div>

    <div class="header">
        <h2>Data Karyawan</h2>
        <button class="btn" onclick="openTambah()">+ Tambah Karyawan</button>
    </div>

    <div class="table-box">
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Jabatan</th>
                    <th>Status</th>
                    <th>Tanggal Bergabung</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Budi Santoso</td>
                    <td>bantoso@email.com</td>
                    <td>Manager</td>
                    <td><span class="badge badge-aktif">Aktif</span></td>
                    <td>03 Apr 2020</td>
                    <td>
                        <button class="btn btn-edit" onclick="openEdit()">Edit</button>
                        <button class="btn btn-hapus">Hapus</button>
                    </td>
                </tr>
                <tr>
                    <td>Dedi Xurniawan</td>
                    <td>dedikurna@email.com</td>
                    <td>Sales</td>
                    <td><span class="badge badge-non">Non-Aktif</span></td>
                    <td>27 Mar 2018</td>
                    <td>
                        <button class="btn btn-edit" onclick="openEdit()">Edit</button>
                        <button class="btn btn-hapus">Hapus</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- MODAL TAMBAH -->
<div id="modalTambah" class="modal">
    <div class="modal-content">
        <h3>Tambah Karyawan</h3>
        <form>
            <input type="text" placeholder="Nama Lengkap">
            <input type="email" placeholder="Email">
            <select>
                <option>Manager</option>
                <option>Finance</option>
                <option>Staff</option>
                <option>Marketing</option>
            </select>
            <select>
                <option>Aktif</option>
                <option>Non-Aktif</option>
            </select>
            <input type="date">
            <div class="modal-btn">
                <button class="btn">Simpan</button>
                <button type="button" class="btn btn-cancel" onclick="closeModal()">Batal</button>
            </div>
        </form>
    </div>
</div>

<!-- MODAL EDIT -->
<div id="modalEdit" class="modal">
    <div class="modal-content">
        <h3>Edit Karyawan</h3>
        <form>
            <input type="text" value="Budi Santoso">
            <input type="email" value="bantoso@email.com">
            <select>
                <option selected>Manager</option>
                <option>Staff</option>
            </select>
            <select>
                <option selected>Aktif</option>
                <option>Non-Aktif</option>
            </select>
            <input type="date" value="2020-04-03">
            <div class="modal-btn">
                <button class="btn btn-edit">Update</button>
                <button type="button" class="btn btn-cancel" onclick="closeModal()">Batal</button>
            </div>
        </form>
    </div>
</div>

<script>
function openTambah(){
    document.getElementById('modalTambah').style.display='flex';
}
function openEdit(){
    document.getElementById('modalEdit').style.display='flex';
}
function closeModal(){
    document.getElementById('modalTambah').style.display='none';
    document.getElementById('modalEdit').style.display='none';
}
</script>

</body>
</html>
