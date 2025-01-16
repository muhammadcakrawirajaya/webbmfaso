<?php

namespace App\Http\Controllers;

use App\Models\EditLog;
use App\Models\Karyawan;
use App\Models\Order;
use App\Models\So;
use App\Models\Sto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class StoDataController extends Controller
{
    public function index(Request $request)
    {
        // Paginate
        $perPage = $request->get('per_page', 10);

        // Query utama dengan pagination
        $query = Sto::orderBy('created_at', 'desc');

        // Filter pencarian teks
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('id', 'LIKE', "%$search%")
                    ->orWhere('nama_sto', 'LIKE', "%$search%")
                    ->orWhere('nama_tl', 'LIKE', "%$search%")
                    ->orWhere('created_by', 'LIKE', "%$search%")
                    ->orWhere('created_at', 'LIKE', "%$search%");
            });
        }

        // Paginate data utama
        $Sto = $query->paginate($perPage)->withQueryString();

        // Transform data
        $Sto->setCollection(
            $Sto->getCollection()->map(function ($sto) {
                // Check created_by
                $createdBy = $sto->created_by;

                if ($createdBy == 0) {
                    $createdByName = 'Generate by server';
                } else {
                    $karyawan = Karyawan::find($createdBy);
                    $createdByName = $karyawan ? $karyawan->nama : 'User tidak diketahui';
                }

                // Check so
                $so = $sto->id_so;
                $socheck = So::find($so);
                $socheck = $socheck ? $socheck->nama_so : 'so tidak ada';

                return [
                    'id' => $sto->id,
                    'nama_sto' => $sto->nama_sto,
                    'nama_so' => $socheck,
                    'id_so' => $sto->id_so,
                    'nama_tl' => $sto->nama_tl,
                    'created_by' => $createdByName,
                    'date' => $sto->created_at->format('Y-m-d'),
                    'time' => $sto->created_at->format('H:i:s'),
                ];
            })
        );

        // Data get for dropdown
        $so = So::with('so_sto')->get();

        // Return ke view
        return view('telkomsel.menus.manageData.menu3', compact(['Sto', 'so']));
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
                'nama_sto' => 'required|string|max:255',
                'namatl' => 'required|string|max:255',
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

            Sto::create([
                'nama_sto' => $request->nama_sto,
                'id_so' => $request->so,
                'nama_tl' => $request->namatl,
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
        // Log::info('Update data to Database Begin:', ['request' => $request->all()]);

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
                'nama_sto' => 'required|string|max:255',
                'nama_tl' => 'required|string|max:255',
            ]);
            // Log::info('Validation passed successfully');
        } catch (ValidationException $e) {
            session()->flash('warning', 'Mohon Periksa Kembali Data yang anda Masukkan');
            return redirect()->back();
        }

        // Cari data berdasarkan ID
        $validated = Sto::findOrFail($id);

        if ($validated) {
            try {
                $log = EditLog::create([
                    'model_type' => 'sto',
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

            $logCount = EditLog::where('model_type', 'sto')
                ->where('model_id', $validated->id)
                ->count();

            if ($logCount > 5) {
                EditLog::where('model_type', 'sto')
                    ->where('model_id', $validated->id)
                    ->orderBy('created_at', 'asc')
                    ->limit($logCount - 5)
                    ->delete();

                // Log::info('Log lama berhasil dihapus', ['deleted_logs' => $logCount - 5]);
            }
        }

        // Update data
        $validated->nama_sto = $request->input('nama_sto');
        $validated->id_so = $request->input('so');
        $validated->nama_tl = $request->input('nama_tl');
        $validated->updated_by = Auth::id();
        $validated->save();

        session()->flash('info', 'Data Berhasil Diedit!');
        return redirect()->back();
    }

    public function destroy($id)
    {
        // Log::info('Destroy data to Database Begin, try to check log access...');

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

        // Delete Process
        try {
            // Log::info('Data id:' . $id . ' Access Granted, Starting Process...');

            // Query untuk Sto dan Log
            $sto = Sto::findOrFail($id);
            $logs = EditLog::where('model_id', $id)
                ->where('model_type', 'sto')
                ->get();

            // Cek jika data tidak ditemukan
            if (!$sto && $logs->isEmpty()) {
                // Log::warning('Data Not Found');
                return redirect()->back()->with('error', 'Data tidak ditemukan.');
            }

            // Cek apakah tabel order memiliki id_sto yang sama
            $orders = Order::where('id_sto', $id)->get();

            if ($orders->isNotEmpty()) {
                // Alert dengan konfirmasi
                session()->flash('warning', 'Data STO ini masih digunakan di tabel order. Apakah Anda ingin melanjutkan dan menghapusnya?');
                return redirect()->back()->with('confirm_delete', true)->with('sto_id', $id);
            }

            // Proses penghapusan STO dan Log
            // Log::info('Starting Deleting Database Data...');
            $sto->delete();
            foreach ($logs as $log) {
                $log->delete();
            }

            // Log::info('555 COMPLETE');
            session()->flash('warning', 'Data berhasil dihapus!');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();

            // Log::error('Error updating user', ['error' => $e->getMessage()]);

            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function confirmDestroy($id)
    {
        // Log::info('Confirm delete STO and clear id_sto in orders');
        if (!Auth::check()) {
            session()->flash('info', 'Mohon Login Kembali untuk Melanjutkan aktivitas');
            return redirect('/login');
        }
        $user = Auth::user();
        if ($user->role !== 'admin') {
            session()->flash('error', 'Anda tidak memiliki aksess untuk fungsi ini.');
            return redirect()->back();
        }

        try {
            // Query
            Order::where('id_sto', $id)->update(['id_sto' => null]);
            $sto = Sto::findOrFail($id);
            $logs = EditLog::where('model_id', $id)
                ->where('model_type', 'sto')
                ->get();

            foreach ($logs as $log) {
                $log->delete();
            }
            $sto->delete();

            // Log::info('555 COMPLETE');
            session()->flash('warning', 'Data STO berhasil dihapus dan id_sto di tabel order telah dikosongkan.');
            return redirect()->back();
        } catch (\Exception $e) {
            // Log::error('Error during confirm delete', ['error' => $e->getMessage()]);
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
