<?php

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminPenilaianController;
use App\Http\Controllers\Admin\AirecomendationController;
use App\Http\Controllers\Admin\DataKaryawanController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\PengaturanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.process');

// REGISTER
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

// DASHBOARD
Route::get('/dashboard', [HomeController::class, 'index'])->name('home');

// PENILAIAN
Route::get('/penilaian', [PenilaianController::class, 'index'])->name('penilaian');

// profile
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

// password
Route::get('/password', [PasswordController::class, 'index'])->name('password');

// admin login
Route::get('/admin/login', [AdminLoginController::class, 'index'])->name('admin.login');
Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login.process');
Route::get('/admin/login', [AdminLoginController::class, 'logout'])->name('admin.logout');

// admin dashboard
Route::get('/admin/dashboard', [AdminHomeController::class, 'index'])->name('admin.dashboard');

// admin datakaryawan
Route::get('/admin/data karyawan', [DataKaryawanController::class, 'index'])->name('admin.datakaryawan');

// admin penilaian
Route::get('/admin/penilaian', [AdminPenilaianController::class, 'index'])->name('admin.penilaian');

// admin ai recommendation
Route::get('/admin/ai-recommendation', [AirecomendationController::class, 'index'])->name('admin.airecommendation');
// admin laporan
Route::get('/admin/laporan', [LaporanController::class, 'index'])->name('admin.laporan');

// admin pengaturan
Route::get('/admin/pengaturan', [PengaturanController::class, 'index'])->name('admin.pengaturan');


