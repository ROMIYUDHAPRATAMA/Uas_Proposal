<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('frontend.register');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'division' => 'required|string'
        ]);

        // Simpan user baru
        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'division' => $request->division,
        ]);

        // Redirect ke login
        return redirect()->route('login')
            ->with('success', 'Registrasi berhasil, silakan login');
    }
}
