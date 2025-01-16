<?php

namespace App\Http\Controllers;

use App\Models\EditLog;
use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

use function Laravel\Prompts\error;

class ManageUserController extends Controller
{
    public function index(Request $request)
    {
        // Paginate
        $perPage = $request->get('per_page', 10);

        // Query utama
        $query = User::with('karyawan')->orderBy('created_at', 'asc');

        // Filter pencarian teks
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('id', 'LIKE', "%$search%")
                    ->orWhere('division', 'LIKE', "%$search%")
                    ->orWhere('role', 'LIKE', "%$search%");
            });

            $query->orWhereHas('karyawan', function ($q) use ($search) {
                $q->where('nama', 'LIKE', "%$search%")
                    ->orWhere('telegram', 'LIKE', "%$search%");
            });
        }

        // Paginate data utama
        $users = $query->paginate($perPage)->withQueryString();

        // debug
        // dd(Storage::exists('public/' . $users->karyawan->foto));

        // Return ke view
        return view('telkomsel.menus.manageData.userManagement', compact('users'));
    }

    public function store(Request $request)
    {
        // Log::info('Store data to Database Begin:', ['request' => $request->all()]);

        // Log check
        if (!Auth::check()) {
            session()->flash('info', 'Mohon Login Kembali untuk Melanjutkan aktivitas');
            return redirect('/login');
        }
        $user = Auth::user();
        if ($user->role !== 'team leader') {
            session()->flash('error', 'Anda tidak memiliki aksess untuk fungsi ini.');
            return redirect()->back();
        }

        // Validasi semua field
        try {
            $request->validate([
                'nama' => 'required|string|max:255',
                'username' => 'required|unique:users,username',
                'password' => 'required|string|min:8',
                'telegram' => 'required|string',
                'role' => 'required|string',
                'division' => 'required|string',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ], [
                'nama.required' => 'Nama wajib diisi.',
                // 'nama.string' => 'Nama harus berupa teks.',
                'nama.max' => 'Nama maksimal 255 karakter.',
                'username.required' => 'Username wajib diisi.',
                'username.unique' => 'Username sudah digunakan.',
                'password.required' => 'Password wajib diisi.',
                // 'password.string' => 'Password harus berupa teks.',
                'password.min' => 'Password minimal 8 karakter.',
                'telegram.required' => 'Telegram wajib diisi.',
                // 'telegram.string' => 'Telegram harus berupa teks.',
                'role.required' => 'Role wajib dipilih.',
                // 'role.string' => 'Role harus berupa teks.',
                'division.required' => 'Division wajib dipilih.',
                // 'division.string' => 'Division harus berupa teks.',
            ]);
            // Log::info('Validation passed successfully');
        } catch (ValidationException $e) {
            session()->flash('warning',  'Mohon Periksa Kembali Data yang Anda Masukkan.');
            return redirect()->back()->withInput();
        }

        // Division restrics
        if ($request->role === 'team leader') {
            if ($user->division !== 'aso') {
                session()->flash('error', 'Anda tidak memiliki aksess untuk fungsi ini.');
                return redirect()->back();
            }
        }

        // Tele check
        $telegram = $request->telegram;
        if (strpos($telegram, '@') !== 0) {
            $telegram = '@' . $telegram;
            // Log::info('Menambahkan "@" di awal username Telegram', ['telegram' => $telegram]);
        }

        // Store prosess
        DB::beginTransaction();
        try {
            // Log::info('Validation successful, proceeding to save user.');

            // Database user
            $user = User::create([
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'division' => $request->division,
                'role' => $request->role,
            ]);

            // Server try foto
            $path = null;
            if ($request->hasFile('foto')) {
                $path = $request->file('foto')->store('karyawan', 'public');
                Log::info('Foto berhasil disimpan', ['path' => $path]);
            } else {
                Log::info('No file uploaded');
            }

            // Database Karyawan
            $karyawanData = [
                'id_user' => $user->id,
                'nama' => $request->nama,
                'telegram' => $telegram,
                'foto' => $path,
            ];
            Karyawan::create($karyawanData);
            DB::commit();

            // Log::info('User added successfully', ['user_id' => $user->id]);

            // Log::info('555 COMPLETE');

            session()->flash('success', 'Data Berhasil Dibuat!');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            // Log::error('Error adding user', ['error' => $e->getMessage()]);

            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {
        // Log::info('Update User Request Accessed', ['request' => $request->all(), 'id' => $id]);

        // Log check
        if (!Auth::check()) {
            session()->flash('info', 'Mohon Login Kembali untuk Melanjutkan aktivitas');
            return redirect('/login');
        }
        $user = Auth::user();
        if ($user->role !== 'team leader') {
            session()->flash('error', 'Anda tidak memiliki aksess untuk fungsi ini.');
            return redirect()->back();
        }



        // Cari data berdasarkan ID
        $validated = User::findOrFail($id);

        if ($validated) {
            try {
                $log = EditLog::create([
                    'model_type' => 'users',
                    'model_id' => $validated->id,
                    'edit_data' => json_encode($validated),
                ]);

                // Log::info('Data to log', [
                //     'edit_data' => $validated,
                // ]);

                // Log::info('EditLog created successfully', ['log' => $log]);
            } catch (\Exception $e) {
                Log::error('Failed to create EditLog', ['error' => $e->getMessage()]);
            }

            $logCount = EditLog::where('model_type', 'users')
                ->where('model_id', $validated->id)
                ->count();

            if ($logCount > 5) {
                EditLog::where('model_type', 'users')
                    ->where('model_id', $validated->id)
                    ->orderBy('created_at', 'asc')
                    ->limit($logCount - 5)
                    ->delete();

                // Log::info('Log lama berhasil dihapus', ['deleted_logs' => $logCount - 5]);
            }
        }

        // Update data
        $validated->division = $request->input('division');
        $validated->role = $request->input('role');
        $validated->updated_by = Auth::id();
        $validated->save();

        session()->flash('info', 'Data Berhasil Diedit!');
        return redirect()->back();
    }

    public function destroy(string $id)
    {
        // Log::info('Delete User Request Accessed');

        // Log check
        if (!Auth::check()) {
            session()->flash('info', 'Mohon Login Kembali untuk Melanjutkan aktivitas');
            return redirect('/login');
        }
        $user = Auth::user();
        if ($user->role !== 'team leader') {
            session()->flash('error', 'Anda tidak memiliki aksess untuk fungsi ini.');
            return redirect()->back();
        }

        try {
            Log::info('User id:' . $id . ' Access Granted, Starting Process...');

            // Query utama
            $user = User::find($id);
            $logs = EditLog::where('model_id', $id)
                ->where('model_type', 'users')
                ->get();
            if (!$user) {
                // Log::warning('Data User Not Found');
                session()->flash('warning', 'Data Tidak Ditemukan');
                return redirect()->back();
            }

            // Validation
            if ($id == 1 || $id == Auth::id()) {
                // Log::warning('Deletion denied for user with ID 1 or logged-in user.');
                session()->flash('warning', 'Anda tidak bisa menghapus diri sendiri');
                return redirect()->back();
            }

            // Try delete foto in server
            if ($user->karyawan && $user->karyawan->foto) {
                Storage::disk('public')->delete($user->karyawan->foto);
                // Log::info('Foto Karyawan Has Been Deleted');
            }
            // else {
            //     Log::info('User Does Not Have a Photo');
            // }

            // Delete in Database
            // Log::info('Starting Deleting Database Data...');
            foreach ($logs as $log) {
                $log->delete();
            }

            if ($user->karyawan) {
                $user->karyawan->delete();
                $user->delete();
            }

            // Log::info('Deletion process complete.');

            session()->flash('warning', 'Data Berhasil Dihapus!');
            return redirect()->back();
        } catch (\Exception $e) {
            // Log::error('Error deleting user', ['error' => $e->getMessage()]);

            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
