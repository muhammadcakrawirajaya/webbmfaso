<?php

namespace App\Http\Controllers;

use App\Models\EditLog;
use App\Models\Karyawan;
use App\Models\So;
use App\Models\Sto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class SoDataController extends Controller
{
    public function index(Request $request)
    {
        // Paginate
        $perPage = $request->get('per_page', 10);

        // Query utama dengan pagination
        $query = So::orderBy('created_at', 'desc');

        // Filter pencarian teks
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('id', 'LIKE', "%$search%")
                    ->orWhere('nama_so', 'LIKE', "%$search%")
                    ->orWhere('created_at', 'LIKE', "%$search%");
            });
        }

        // Paginate data utama
        $So = $query->paginate($perPage)->withQueryString();

        // Transform data
        $So->setCollection(
            $So->getCollection()->map(function ($so) {
                // Check created_by
                $createdBy = $so->created_by;

                if ($createdBy == 0) {
                    $createdByName = 'Generate by server';
                } else {
                    $karyawan = Karyawan::find($createdBy);
                    $createdByName = $karyawan ? $karyawan->nama : 'User tidak diketahui';
                }

                return [
                    'id' => $so->id,
                    'nama_so' => $so->nama_so,
                    'created_by' => $createdByName,
                    'date' => $so->created_at->format('Y-m-d'),
                    'time' => $so->created_at->format('H:i:s'),
                ];
            })
        );

        // dd($So);

        // Return ke view
        return view('telkomsel.menus.manageData.menu2', compact('So'));
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

        // Validasi data
        try {
            $request->validate([
                'nama_so' => 'required|string|max:255',
            ]);
            // Log::info('Validation passed successfully');
        } catch (ValidationException $e) {
            session()->flash('warning', 'Mohon Periksa Kembali Data yang anda Masukkan');
            return redirect()->back();
        }

        // Simpan Prosess
        try {
            // Log::info('Updating So...');

            DB::beginTransaction();

            So::create([
                'nama_so' => $request->nama_so,
                'created_by' => Auth::id(),
            ]);

            DB::commit();

            // Log::info('Transaction committed successfully');

            session()->flash('success', 'Data Berhasil Dibuat!');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();

            // Log::error('Error updating user', ['error' => $e->getMessage()]);

            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
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

        // Validasi data
        try {
            $request->validate([
                'nama_so' => 'required|string|max:255',
            ]);
            // Log::info('Validation passed successfully');
        } catch (ValidationException $e) {
            session()->flash('warning', 'Mohon Periksa Kembali Data yang anda Masukkan');
            return redirect()->back();
        }

        // Cari data berdasarkan ID
        $validated = So::findOrFail($id);

        if ($validated) {
            try {
                $log = EditLog::create([
                    'model_type' => 'so',
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

            $logCount = EditLog::where('model_type', 'so')
                ->where('model_id', $validated->id)
                ->count();

            if ($logCount > 5) {
                EditLog::where('model_type', 'so')
                    ->where('model_id', $validated->id)
                    ->orderBy('created_at', 'asc')
                    ->limit($logCount - 5)
                    ->delete();

                // Log::info('Log lama berhasil dihapus', ['deleted_logs' => $logCount - 5]);
            }
        }

        // Update data
        $validated->nama_so = $request->input('nama_so');
        $validated->updated_by = Auth::id();
        $validated->save();

        session()->flash('info', 'Data Berhasil Diedit!');
        return redirect()->back();
    }

    public function destroy($id)
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

        // Delete Prosess
        try {
            // Log::info('User id:' . $id . ' Access Granted, Starting Process...');

            // Query
            $so = So::findOrFail($id);
            $logs = EditLog::where('model_id', $id)
                ->where('model_type', 'so')
                ->get();
            $sto = Sto::where('id_so', $id)->get();

            // Check
            if ($sto->isEmpty()) {
                if (!$so && $logs->isEmpty()) {
                    // Log::warning('Data Not Found');
                    return redirect()->back()->with('error', 'Data tidak ditemukan.');
                }
            } else {
                // Log::warning('Data Masih Terhubung ');
                session()->flash('warning', 'Data SO Masih Terhubung Dengan Data STO, Mohon Hapus Hapus Data STO Terlebih Dahulu');
                return redirect()->back();
            }

            // Proses penghapusan
            // Log::info('Starting Deleting Database Data...');
            $so->delete();
            foreach ($logs as $log) {
                $log->delete();
            }

            // Log::info('555 COMPLETE');

            session()->flash('warning', 'Data Berhasil Dihapus!');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();

            // Log::error('Error updating user', ['error' => $e->getMessage()]);

            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
