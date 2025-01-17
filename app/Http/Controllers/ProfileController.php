<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::with('karyawan')->where('id', Auth::id())->first();
        // dd($user);
        return View('telkomsel.menus.toolsMenu.menu2', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'nama' => 'required|string|max:255',
            'telegram' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'password' => 'required|string|max:255',
            'password' => 'nullable|string|min:8',
        ]);

        // Ambil data user berdasarkan ID
        $user = User::findOrFail($id);
        $karyawan = $user->karyawan;

        // Jika ada foto yang diunggah
        if ($request->hasFile('foto')) {
            if ($karyawan->foto && file_exists(storage_path('app/public/' . $karyawan->foto))) {
                unlink(storage_path('app/public/' . $karyawan->foto));
            }

            $fotoPath = $request->file('foto')->store('karyawan', 'public');
            $karyawan->foto = $fotoPath;
        }

        // Update data karyawan dan user

        $karyawan->nama = $request->input('nama');
        $karyawan->telegram = $request->input('telegram');

        $user->update([
            'username' => $request->username,
            'role' => $request->role,
            'division' => $request->division,
        ]);

        $karyawan->save();


        return redirect()->route('toolsMenu2.index')->with('success', 'Data berhasil diupdate');
    }

    // public function update(Request $request)
    // {
    //     $request->validate([
    //         'nama' => 'required|string|max:255',
    //         'telegram' => 'nullable|string|max:255',
    //         'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    //         'password' => 'required|string|max:255',
    //         'password' => 'nullable|string|min:8',
    //     ]);

    //     $user = User::findOrFail('id');
    //     // dd($user);
    //     $karyawan = $user->karyawan;

    //     // Update data karyawan
    //     $karyawan->update([
    //         'nama' => $request->nama,
    //         'telegram' => $request->telegram,
    //         'foto' => $request->hasFile('foto') ? $request->file('foto')->store('karyawan', 'public') : $karyawan->foto,
    //     ]);

    //     // Update password jika diisi
    //     if ($request->filled('password') && $request->filled('password')) {
    //         $user->update([
    //             'username' => $request->password,
    //             'password' => Hash::make($request->password),
    //         ]);
    //     }

    //     return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
    // }
}
