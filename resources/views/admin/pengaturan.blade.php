<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Pengaturan</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
/* ================= THEME ================= */
:root{
    --bg:#f4f7fb;
    --card:#ffffff;
    --text:#111827;
    --muted:#6b7280;
    --primary:#2563eb;
    --border:#e5e7eb;
}
body.dark{
    --bg:#0f172a;
    --card:#1e293b;
    --text:#f8fafc;
    --muted:#94a3b8;
    --border:#334155;
}

/* ================= BASE ================= */
*{box-sizing:border-box;font-family:Segoe UI,Arial,sans-serif}
body{
    margin:0;
    background:var(--bg);
    color:var(--text);
    display:flex;
    transition:.3s;
}

/* ================= SIDEBAR ================= */
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

/* ================= MAIN ================= */
.main{flex:1;padding:28px}

/* ================= HEADER ================= */
.header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:25px
}
.search{
    padding:10px 16px;
    border-radius:30px;
    border:1px solid var(--border);
    width:300px
}
.avatar{
    width:38px;height:38px;
    border-radius:50%;
    background:#c7d2fe
}

/* ================= SECTION ================= */
.section{margin-bottom:30px}
.section h3{margin:0 0 15px;font-size:16px}

/* ================= CARD ================= */
.card{
    background:var(--card);
    border-radius:18px;
    padding:20px;
    box-shadow:0 10px 25px rgba(0,0,0,.05)
}

/* ================= ROW ================= */
.row{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:12px 0;
    border-bottom:1px solid var(--border)
}
.row:last-child{border-bottom:none}

/* ================= TOGGLE ================= */
.toggle{
    width:44px;height:24px;
    background:#cbd5e1;
    border-radius:20px;
    position:relative;
    cursor:pointer
}
.toggle::after{
    content:'';
    width:20px;height:20px;
    background:#fff;
    border-radius:50%;
    position:absolute;
    top:2px;left:2px;
    transition:.3s
}
.toggle.active{background:var(--primary)}
.toggle.active::after{left:22px}

/* ================= FORM ================= */
select,input{
    padding:8px 12px;
    border-radius:10px;
    border:1px solid var(--border);
    background:var(--card);
    color:var(--text)
}

/* ================= COMPANY ================= */
.company{display:flex;align-items:center;gap:15px}
.company img{height:42px}

/* ================= BUTTON ================= */
.btn{
    padding:10px 18px;
    border-radius:12px;
    border:none;
    cursor:pointer;
    font-size:14px
}
.btn-primary{background:var(--primary);color:#fff}
.btn-muted{background:#e5e7eb}

/* ================= MODAL ================= */
.modal{
    display:none;
    position:fixed;
    inset:0;
    background:rgba(0,0,0,.4);
    justify-content:center;
    align-items:center;
    z-index:999
}
.modal-box{
    background:var(--card);
    padding:25px;
    width:360px;
    border-radius:18px
}
.modal-box h3{margin-top:0}
.modal-box input{width:100%;margin-bottom:10px}
.modal-actions{display:flex;gap:10px;justify-content:flex-end}
</style>
</head>

<body id="body">

<!-- SIDEBAR -->
<div class="sidebar">
    <h2>PT GOPEK<br><small style="font-weight:300;font-size:13px">CIPTA UTAMA</small></h2>
    <div class="menu">
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="{{ route('admin.datakaryawan') }}">Data Karyawan</a>
        <a href="{{ route('admin.penilaian') }}">Penilaian</a>
        <a href="{{ route('admin.airecommendation') }}">AI Recommendation</a>
        <a href="{{ route('admin.laporan') }}">Laporan</a>
        <a href="{{ route('admin.pengaturan') }}" class="active">Pengaturan</a>
        <a href="{{ route('admin.login') }}">Logout</a>
    </div>
</div>

<!-- MAIN -->
<div class="main">

    <div class="header">
        <input class="search" placeholder="Cari pengaturan...">
        <div class="avatar"></div>
    </div>

    <!-- AKUN -->
    <div class="section">
        <h3>Akun Admin</h3>
        <div class="card">
            <div class="company">
                <div class="avatar"></div>
                <div>
                    <strong>Rina Susanto</strong><br>
                    <small style="color:var(--muted)">rina@gopek.co.id</small>
                </div>
            </div>
        </div>
    </div>

    <!-- PREFERENSI -->
    <div class="section">
        <h3>Preferensi</h3>
        <div class="card">
            <div class="row">
                <span>Dark Mode</span>
                <div class="toggle" id="themeToggle"></div>
            </div>
            <div class="row">
                <span>Bahasa</span>
                <select><option>Indonesia</option><option>English</option></select>
            </div>
        </div>
    </div>

    <!-- PERUSAHAAN -->
    <div class="section">
        <h3>Perusahaan</h3>
        <div class="card">
            <div class="company">
                <img id="logoPreview" src="/logo.png">
                <input type="file" id="logoInput" hidden>
                <button class="btn btn-muted" onclick="logoInput.click()">Upload Logo</button>
            </div>
        </div>
    </div>

    <!-- ROLE -->
    <div class="section">
        <h3>Hak Akses & Role</h3>
        <div class="card">
            <div class="row">
                <span>Rina Susanto</span>
                <select><option>Admin</option><option>HRD</option></select>
            </div>
        </div>
    </div>

    <!-- KEAMANAN -->
    <div class="section">
        <h3>Keamanan</h3>
        <div class="card">
            <div class="row">
                <span>Perbarui Sandi</span>
                <button class="btn btn-muted" onclick="openPassword()">Ganti Password</button>
            </div>
        </div>
    </div>

    <button class="btn btn-primary">Simpan Perubahan</button>

</div>

<!-- MODAL PASSWORD -->
<div class="modal" id="passwordModal">
<div class="modal-box">
<h3>Perbarui Sandi</h3>
<input type="password" id="oldPass" placeholder="Password Lama">
<input type="password" id="newPass" placeholder="Password Baru">
<input type="password" id="confirmPass" placeholder="Konfirmasi Password Baru">
<div class="modal-actions">
<button class="btn btn-muted" onclick="closePassword()">Batal</button>
<button class="btn btn-primary" onclick="savePassword()">Simpan</button>
</div>
</div>
</div>

<script>
/* DARK MODE */
const body=document.getElementById('body');
const toggle=document.getElementById('themeToggle');
if(localStorage.theme==='dark'){body.classList.add('dark');toggle.classList.add('active')}
toggle.onclick=()=>{
    body.classList.toggle('dark');
    toggle.classList.toggle('active');
    localStorage.theme=body.classList.contains('dark')?'dark':'light';
}

/* LOGO PREVIEW */
logoInput.onchange=e=>logoPreview.src=URL.createObjectURL(e.target.files[0]);

/* PASSWORD */
function openPassword(){passwordModal.style.display='flex'}
function closePassword(){passwordModal.style.display='none'}
function savePassword(){
    if(newPass.value.length<8)return alert('Minimal 8 karakter');
    if(newPass.value!==confirmPass.value)return alert('Konfirmasi tidak cocok');
    alert('Password valid (siap backend)');
    closePassword();
}
</script>

</body>
</html>
