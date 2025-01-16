<?php

namespace App\Http\Controllers;

use App\Models\EditLog;
use App\Models\FeedbackPIC;
use App\Models\Karyawan;
use App\Models\Uic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class UicDataController extends Controller
{
    public function index(Request $request)
    {
        // Paginate
        $perPage = $request->get('per_page', 10);

        // Query utama dengan pagination
        $query = Uic::orderBy('created_at', 'desc');

        // Filter pencarian teks
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('id', 'LIKE', "%$search%")
                    ->orWhere('uic', 'LIKE', "%$search%")
                    ->orWhere('created_by', 'LIKE', "%$search%")
                    ->orWhere('created_at', 'LIKE', "%$search%");
            });
        }

        // Paginate data utama
        $uic = $query->paginate($perPage)->withQueryString();

        // Transform data
        $uic->setCollection(
            $uic->getCollection()->map(function ($uic) {
                $createdBy = $uic->created_by;

                if ($createdBy == 0) {
                    $createdByName = 'Generate by server';
                } else {
                    $karyawan = Karyawan::find($createdBy);
                    $createdByName = $karyawan ? $karyawan->nama : 'User tidak diketahui';
                }

                return [
                    'id' => $uic->id,
                    'uic' => $uic->uic,
                    'created_by' => $createdByName,
                    'date' => $uic->created_at->format('Y-m-d'),
                    'time' => $uic->created_at->format('H:i:s'),
                ];
            })
        );

        // dd($uic);

        // Return ke view
        return view('telkomsel.menus.manageData.menu4', compact('uic'));
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
        if ($user->role !== 'admin') {
            session()->flash('error', 'Anda tidak memiliki aksess untuk fungsi ini.');
            return redirect()->back();
        }

        // Validasi data
        try {
            $request->validate([
                'uic' => 'required|string|max:255',
            ]);
            // Log::info('Validation passed successfully');
        } catch (ValidationException $e) {
            session()->flash('warning', 'Mohon Periksa Kembali Data yang anda Masukkan');
            return redirect()->back();
        }

        // Simpan Prosess
        try {
            // Log::info('Updating uic...');

            DB::beginTransaction();

            Uic::create([
                'uic' => $request->uic,
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
        if ($user->role !== 'admin') {
            session()->flash('error', 'Anda tidak memiliki aksess untuk fungsi ini.');
            return redirect()->back();
        }

        // Validasi data
        try {
            $request->validate([
                'uic' => 'required|string|max:255',
            ]);
            // Log::info('Validation passed successfully');
        } catch (ValidationException $e) {
            session()->flash('warning', 'Mohon Periksa Kembali Data yang anda Masukkan');
            return redirect()->back();
        }

        // Cari data berdasarkan ID
        $validated = Uic::findOrFail($id);

        if ($validated) {
            try {
                $log = EditLog::create([
                    'model_type' => 'uic',
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

            $logCount = EditLog::where('model_type', 'uic')
                ->where('model_id', $validated->id)
                ->count();

            if ($logCount > 5) {
                EditLog::where('model_type', 'uic')
                    ->where('model_id', $validated->id)
                    ->orderBy('created_at', 'asc')
                    ->limit($logCount - 5)
                    ->delete();

                // Log::info('Log lama berhasil dihapus', ['deleted_logs' => $logCount - 5]);
            }
        }

        // Update data
        $validated->uic = $request->input('uic');
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
        if ($user->role !== 'admin') {
            session()->flash('error', 'Anda tidak memiliki aksess untuk fungsi ini.');
            return redirect()->back();
        }

        // Delete Prosess
        try {
            // Log::info('User id:' . $id . ' Access Granted, Starting Process...');

            // Query
            $uic = Uic::findOrFail($id);
            $logs = EditLog::where('model_id', $id)
                ->where('model_type', 'uic')
                ->get();
            $feedback_pic = FeedbackPIC::where('id_uic', $id)->get();

            // Check
            if ($feedback_pic->isEmpty()) {
                if (!$uic && $logs->isEmpty()) {
                    Log::warning('Data Not Found');
                    return redirect()->back()->with('error', 'Data tidak ditemukan.');
                }
            } else {
                // Log::warning('Data Masih Terhubung ');
                session()->flash('warning', 'Data UIC Masih Terhubung Dengan Data Feedback PIC, Mohon Hapus Hapus Data UIC Terlebih Dahulu');
                return redirect()->back();
            }

            // Proses penghapusan
            // Log::info('Starting Deleting Database Data...');
            $uic->delete();
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
