<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        // Return
        return view('auth.login');
    }

    public function store(Request $request)
    {
        // Validasi email dan password
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:8'
        ], [
            'username.required' => 'Username Wajib Diisi',
            'username.max' => 'username tidak boleh lebih dari 255 karakter',
            'password.required' => 'Password Wajib Diisi',
            'password.min' => 'password tidak boleh kurang dari 8 karakter',
        ]);

        // Inisiasi
        $credentials = $request->only('username', 'password');
        $remember = $request->has('remember');

        // Log Prosess
        if (Auth::attempt($credentials, $remember)) {
            $user = Auth::user();
            $fotoPath = $user->karyawan->foto
                ? asset('storage/' . $user->karyawan->foto)
                : asset('assets/images/logo-brand.png');

            if ($user->role == 'admin' || $user->role == 'team leader') {
                $request->session()->put('id', $user->id);
                $request->session()->put('division', $user->division);
                $request->session()->put('role', $user->role);
                $request->session()->put('nama', $user->karyawan->nama);
                $request->session()->put('foto', $fotoPath);
                return redirect()->intended('/Dashboard');
            } else {
                Auth::logout();
                return redirect('login')->withErrors('Akun sudah tidak memiliki akses')->withInput();
            }
        } else {
            return redirect('login')->withErrors('Username atau password yang anda masukkan salah')->withInput();
        }
    }

    public function logout()
    {
        // Log Prosess
        Auth::logout();

        // Return
        return redirect('login');
    }
}
