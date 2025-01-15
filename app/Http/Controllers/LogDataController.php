<?php

namespace App\Http\Controllers;

use App\Models\EditLog;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class LogDataController extends Controller
{
    public function index(Request $request)
    {
        // Paginate
        $perPage = $request->get('per_page', 10);

        // Query utama dengan pagination
        $query = EditLog::orderBy('created_at', 'desc');

        // Filter pencarian teks
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('id', 'LIKE', "%$search%")
                    ->orWhere('model_type', 'LIKE', "%$search%")
                    ->orWhere('edit_data', 'LIKE', "%$search%")
                    ->orWhere('created_at', 'LIKE', "%$search%");
            });
        }

        // Paginate data utama
        $editLogs = $query->paginate($perPage)->withQueryString();

        // Transform data untuk ditampilkan di view
        $editLogs->setCollection(
            $editLogs->getCollection()->map(function ($log) {
                // Decode JSON edit_data
                $editData = json_decode($log->edit_data, true);

                // Ambil nama updated_by
                $updatedById = $editData['updated_by'] ?? null;
                $updatedByName = null;

                if ($updatedById) {
                    $karyawan = Karyawan::find($updatedById);
                    $updatedByName = $karyawan ? $karyawan->nama : 'Unknown';
                }

                return [
                    'model_type' => $log->model_type,
                    'edit_data' => $editData,
                    'updated_by' => $updatedByName,
                    'date' => $log->created_at->format('Y-m-d'),
                    'time' => $log->created_at->format('H:i:s'),
                ];
            })
        );

        // Return ke view
        return view('telkomsel.menus.manageData.menu1', compact('editLogs'));
    }
}
