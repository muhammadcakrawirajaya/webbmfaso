<?php

namespace App\Http\Controllers;

use App\Models\EditLog;
use App\Models\FeedbackPIC;
use App\Models\Karyawan;
use App\Models\Order;
use App\Models\StatusKendala;
use App\Models\Uic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class FeedbackPICDataController extends Controller
{
    public function index(Request $request)
    {
        // Paginate
        $perPage = $request->get('per_page', 10);

        // Query utama dengan pagination
        $query = FeedbackPIC::orderBy('created_at', 'desc');

        // Filter pencarian teks
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('id', 'LIKE', "%$search%")
                    ->orWhere('feedback_pic', 'LIKE', "%$search%")
                    ->orWhere('created_at', 'LIKE', "%$search%");
            });
        }

        // Paginate data utama
        $pic = $query->paginate($perPage)->withQueryString();

        // Transform data
        $pic->setCollection(
            $pic->getCollection()->map(function ($pic) {
                // Check created_by
                $createdBy = $pic->created_by;

                if ($createdBy == 0) {
                    $createdByName = 'Generate by server';
                } else {
                    $karyawan = Karyawan::find($createdBy);
                    $createdByName = $karyawan ? $karyawan->nama : 'User tidak diketahui';
                }

                // Check UIC
                $uic = $pic->id_uic;
                $uiccheck = Uic::find($uic);
                $uiccheck = $uiccheck ? $uiccheck->uic : 'uic tidak ada';

                // Check Status Kendala
                $status = $pic->id_status_kendala;
                $statuscheck = StatusKendala::find($status);
                $statuscheck = $statuscheck ? $statuscheck->status_kendala : 'so tidak ada';

                return [
                    'id' => $pic->id,
                    'feedback_pic' => $pic->feedback_pic,
                    'id_uic' => $pic->id_uic,
                    'uic' => $uiccheck,
                    'id_status_kendala' => $pic->id_status_kendala,
                    'status_kendala' => $statuscheck,
                    'created_by' => $createdByName,
                    'date' => $pic->created_at->format('Y-m-d'),
                    'time' => $pic->created_at->format('H:i:s'),
                ];
            })
        );

        // Data get for dropdown
        $status = StatusKendala::with('feedback_status')->get();
        $uics = Uic::with('feedbacks')->get();

        // Return ke view
        return view('telkomsel.menus.manageData.menu5', compact(['pic', 'status', 'uics']));
    }

    public function store(Request $request)
    {
        Log::info('picre data to Database Begin:', ['request' => $request->all()]);

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
                'pic' => 'required|string|max:255',
                'status' => 'required|string|max:255',
                'uic' => 'required|string|max:255',
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

            FeedbackPIC::create([
                'id_uic' => $request->uic,
                'feedback_pic' => $request->pic,
                'id_status_kendala' => $request->status,
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
        Log::info('Update data to Database Begin:', ['request' => $request->all()]);

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
                'pic' => 'required|string|max:255',
                'uic' => 'required|string|max:255',
                'status' => 'required|string|max:255',
            ]);
            // Log::info('Validation passed successfully');
        } catch (ValidationException $e) {
            session()->flash('warning', 'Mohon Periksa Kembali Data yang anda Masukkan');
            return redirect()->back();
        }

        // Cari data berdasarkan ID
        $validated = FeedbackPIC::findOrFail($id);

        if ($validated) {
            try {
                $log = EditLog::create([
                    'model_type' => 'pic',
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

            $logCount = EditLog::where('model_type', 'pic')
                ->where('model_id', $validated->id)
                ->count();

            if ($logCount > 5) {
                EditLog::where('model_type', 'pic')
                    ->where('model_id', $validated->id)
                    ->orderBy('created_at', 'asc')
                    ->limit($logCount - 5)
                    ->delete();

                // Log::info('Log lama berhasil dihapus', ['deleted_logs' => $logCount - 5]);
            }
        }

        // Update data
        $validated->feedback_pic = $request->input('pic');
        $validated->id_uic = $request->input('uic');
        $validated->id_status_kendala = $request->input('status');
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
        if ($user->role !== 'team leader') {
            session()->flash('error', 'Anda tidak memiliki aksess untuk fungsi ini.');
            return redirect()->back();
        }

        // Delete Process
        try {
            // Log::info('Data id:' . $id . ' Access Granted, Starting Process...');

            // Query untuk pic dan Log
            $pic = FeedbackPIC::findOrFail($id);
            $logs = EditLog::where('model_id', $id)
                ->where('model_type', 'pic')
                ->get();

            // Cek jika data tidak ditemukan
            if (!$pic && $logs->isEmpty()) {
                Log::warning('Data Not Found');
                return redirect()->back()->with('error', 'Data tidak ditemukan.');
            }

            // Cek apakah tabel order memiliki id_feedback yang sama
            $orders = Order::where('id_feedback', $id)->get();

            if ($orders->isNotEmpty()) {
                // Alert dengan konfirmasi
                session()->flash('warning', 'Data pic ini masih digunakan di tabel order. Apakah Anda ingin melanjutkan dan menghapusnya?');
                return redirect()->back()->with('confirm_delete', true)->with('pic_id', $id);
            }

            // Proses penghapusan pic dan Log
            // Log::info('Starting Deleting Database Data...');
            $pic->delete();
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
        // Log::info('Confirm delete pic and clear id_pic in orders');
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
            // Query
            Order::where('id_feedback', $id)->update(['id_feedback' => null]);
            $pic = FeedbackPIC::findOrFail($id);
            $logs = EditLog::where('model_id', $id)
            ->where('model_type', 'pic')
            ->get();

            foreach ($logs as $log) {
                $log->delete();
            }
            $pic->delete();

            // Log::info('555 COMPLETE');
            session()->flash('warning', 'Data pic berhasil dihapus dan id_pic di tabel order telah dikosongkan.');
            return redirect()->back();
        } catch (\Exception $e) {
            // Log::error('Error during confirm delete', ['error' => $e->getMessage()]);
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
