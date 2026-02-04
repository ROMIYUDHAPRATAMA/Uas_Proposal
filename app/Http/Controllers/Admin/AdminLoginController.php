<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Ambil data admin
        $admin = DB::table('admins')
            ->where('email', $request->email)
            ->first();

        // Cek login
        if ($admin && Hash::check($request->password, $admin->password)) {
            return redirect()->route('admin.dashboard');
        }

        // Jika gagal
        return back()->withErrors([
            'login' => 'Email atau password salah'
        ]);
    }

    public function logout()
    {
        return redirect()->route('login');
    }
}
